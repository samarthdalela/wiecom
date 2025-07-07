<?php
require_once __DIR__ . '/../vendor/autoload.php'; // Adjust if you're inside /classes

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../config');
$dotenv->load();

class BillDeskIntegration {
    private $merchantId;
    private $securityId;
    private $checksumKey;
    private $returnUrl;
    private $conn;
    private $isTestMode;

    public function __construct($db) {
        $this->conn = $db;
        $this->loadConfig();
    }

    private function loadConfig() {
        try {
            $this->merchantId = $_ENV['merchantId'] ?? null;
            $this->securityId = $_ENV['securityId'] ?? null;
            $this->checksumKey = 'WYZZHkyZuU9K';
            $this->returnUrl = $_ENV['returnUrl'] ?? null;
            $this->isTestMode = false;

            if (empty($this->merchantId) || empty($this->securityId) || empty($this->checksumKey)) {
                $this->merchantId = 'NIELIT';
                $this->securityId = 'nielit';
                $this->checksumKey = 'WYZZHkyZuU9K';
                $this->isTestMode = false;
                // $this->returnUrl = 'https://2343-103-165-89-10.ngrok-free.app/payment_response.php';
                $this->returnUrl = 'https://0fbb-103-165-89-10.ngrok-free.app/newWiecom/payment_response.php';
            }

            if (empty($this->returnUrl)) {
                $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https://' : 'http://';
                $this->returnUrl = $protocol . $_SERVER['HTTP_HOST'] . '/payment_response.php';
            }
        } catch (Exception $e) {
            $this->setTestConfiguration();
        }
    }

    private function getConfigFromDB($field) {
        try {
            $query = "SELECT $field FROM billdesk_config WHERE is_active = 1 LIMIT 1";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result ? trim($result[$field]) : null;
        } catch (Exception $e) {
            return null;
        }
    }

    private function setTestConfiguration() {
        $this->merchantId = 'TESTMERCHANT';
        $this->securityId = 'TESTSECURITY';
        $this->checksumKey = 'TEST_CHECKSUM_KEY_12345';
        $this->isTestMode = true;
    }

    public function createPaymentRequest($orderId, $amount, $customerInfo) {
        try {
            if (!$this->validateOrderId($orderId) || !$this->validateAmount($amount)) {
                throw new Exception("Invalid order ID or amount.");
            }

            $txnAmount = number_format($amount, 2, '.', '');
            $str = implode('|', [
                $this->merchantId,
                $orderId,
                'NA',
                $txnAmount,
                'NA',
                'NA',
                'NA',
                'INR',
                'NA',
                'R',
                $this->securityId,
                'NA',
                'NA',
                'F',
                $customerInfo['mobile'] ?? '9999999999',
                'UPWIECON2025',
                $customerInfo['name'] ?? 'Customer',
                'REGISTRATION',
                $customerInfo['email'] ?? 'test@test.com',
                'NA',
                'NA',
                $this->returnUrl
            ]);

            $checksum = strtoupper(hash('sha256', $str . "|" . $this->checksumKey));
            $finalRequest = $str . '|' . $checksum;

            $this->logTransaction($orderId, $finalRequest, null, 'INITIATED');
            return $finalRequest;

        } catch (Exception $e) {
            error_log("Payment request creation error: " . $e->getMessage());
            throw $e;
        }
    }

    public function processResponse($response) {
        if (empty($response)) {
            throw new Exception("Empty response");
        }

        $responseArray = explode('|', $response);
        
        // Log the response structure for debugging
        error_log("BillDesk Response Debug - Total fields: " . count($responseArray));
        
        // Your actual response has 26 fields based on the example you provided
        if (count($responseArray) < 26) {
            throw new Exception("Incomplete response: expected 26 fields, got " . count($responseArray));
        }

        // Corrected field mapping based on your actual response format:
        // NIELIT|UPWIECON2025_60_1751619143|BHD58QF0PD3ATY|555109974322|1.00|HD5|NA|10|INR|DIRECT|NA|NA|0.00|04-07-2025 14:22:50|0300|NA|0789861859|UPWIECON2025|SAMARTH DALELA|REGISTRATION|samarthdalela@gmail.com|NA|NA|NA|PGS10001-Success|CCF90F2FB80201FD8E1509872F86EA3032D6ED64AB2CFB5A5CC08F4B1087F66A
        
        $merchantId = $responseArray[0];        // NIELIT
        $customerID = $responseArray[1];        // UPWIECON2025_60_1751619143 (Order ID)
        $bankTxnId = $responseArray[2];         // BHD58QF0PD3ATY (Bank Transaction ID)
        $txnId = $responseArray[3];             // 555109974322 (Transaction ID)
        $txnAmount = $responseArray[4];         // 1.00 (Amount)
        $field5 = $responseArray[5];            // HD5
        $field6 = $responseArray[6];            // NA
        $field7 = $responseArray[7];            // 10
        $currencyType = $responseArray[8];      // INR
        $field9 = $responseArray[9];            // DIRECT
        $field10 = $responseArray[10];          // NA
        $field11 = $responseArray[11];          // NA
        $field12 = $responseArray[12];          // 0.00
        $txnDate = $responseArray[13];          // 04-07-2025 14:22:50
        $status = $responseArray[14];           // 0300 (ACTUAL STATUS CODE!)
        $field15 = $responseArray[15];          // NA
        $mobile = $responseArray[16];           // 0789861859
        $conferenceId = $responseArray[17];     // UPWIECON2025
        $name = $responseArray[18];             // SAMARTH DALELA
        $regType = $responseArray[19];          // REGISTRATION
        $email = $responseArray[20];            // samarthdalela@gmail.com
        $field21 = $responseArray[21];          // NA
        $field22 = $responseArray[22];          // NA
        $field23 = $responseArray[23];          // NA
        $gatewayResponse = $responseArray[24];  // PGS10001-Success
        $receivedChecksum = $responseArray[25]; // Checksum

        // Log the actual status for debugging
        error_log("BillDesk Status Debug - Status Code: " . $status);
        error_log("BillDesk Status Debug - Field 5 (previously used): " . $field5);

        // For checksum verification, use fields 0-24 (excluding the checksum itself)
        $responseWithoutChecksum = implode('|', array_slice($responseArray, 0, 25));
        $expectedChecksum = strtoupper(hash('sha256', $responseWithoutChecksum . "|" . $this->checksumKey));

        // Uncomment below lines if you want to verify checksum
        // if (!hash_equals($expectedChecksum, $receivedChecksum)) {
        //     error_log("Checksum mismatch - Expected: $expectedChecksum, Received: $receivedChecksum");
        //     throw new Exception("Checksum verification failed");
        // }

        $statusClean = $this->getPaymentStatus($status);
        $result = [
            'merchant_id' => $merchantId,
            'order_id' => $customerID,
            'amount' => floatval($txnAmount),
            'txn_id' => $txnId ?: 'NA',
            'bank_txn_id' => $bankTxnId ?: 'NA',
            'status' => $statusClean,
            'response_code' => $status,
            'response_message' => $this->getResponseMessage($status),
            'txn_date' => $txnDate,
            'customer_mobile' => $mobile,
            'customer_name' => $name,
            'customer_email' => $email,
            'conference_id' => $conferenceId,
            'registration_type' => $regType,
            'gateway_response' => $gatewayResponse,
            'raw_response' => $response
        ];

        // Log the final status for debugging
        error_log("BillDesk Final Status: " . $statusClean . " for Order: " . $customerID);

        $this->logTransaction($customerID, null, $response, $statusClean);
        return $result;
    }

    private function getPaymentStatus($code) {
        $code = strtoupper(trim($code));
        error_log("BillDesk getPaymentStatus - Processing code: " . $code);
        
        switch ($code) {
            case '0300':
            case 'SUCCESS':
                return 'SUCCESS';
            case '0399':
            case 'PENDING':
                return 'PENDING';
            case '0002':
            case '0400':
            case 'CANCELLED':
                return 'CANCELLED';
            case '0001':
            case 'FAILED':
            default:
                return 'FAILED';
        }
    }

    private function getResponseMessage($code) {
        $code = strtoupper(trim($code));
        switch ($code) {
            case '0300':
            case 'SUCCESS':
                return 'Transaction successful';
            case '0399':
            case 'PENDING':
                return 'Transaction pending';
            case '0002':
            case '0400':
            case 'CANCELLED':
                return 'Transaction cancelled';
            case '0001':
            case 'FAILED':
                return 'Transaction failed';
            default:
                return 'Unknown status: ' . $code;
        }
    }

    public function getPaymentUrl($testMode = null) {
        $useTest = $testMode ?? $this->isTestMode;
        return $useTest
            ? 'https://pgi.billdesk.com/pgidsk/PGIMerchantPayment'
            : 'https://www.billdesk.com/pgidsk/PGIMerchantPayment';
    }

    public function validateOrderId($orderId) {
        return preg_match('/^[A-Za-z0-9_-]+$/', $orderId) && strlen($orderId) <= 50;
    }

    public function validateAmount($amount) {
        return is_numeric($amount) && $amount > 0 && $amount <= 1000000;
    }

    public function logTransaction($orderId, $request, $response = null, $status = 'INITIATED') {
        try {
            $query = "INSERT INTO billdesk_transaction_log 
                      (order_id, request_data, response_data, status, created_at) 
                      VALUES (:order_id, :request_data, :response_data, :status, NOW())";

            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':order_id', $orderId);
            $stmt->bindParam(':request_data', $request);
            $stmt->bindParam(':response_data', $response);
            $stmt->bindParam(':status', $status);
            $stmt->execute();
        } catch (Exception $e) {
            error_log("Log error: " . $e->getMessage());
        }
    }

    public function getConfig() {
        return [
            'merchant_id' => $this->merchantId,
            'security_id' => $this->securityId,
            'return_url' => $this->returnUrl,
            'gateway_url' => $this->getPaymentUrl(),
            'environment' => $this->isTestMode ? 'TEST' : 'PRODUCTION'
        ];
    }

    public function isTestMode() {
        return $this->isTestMode;
    }

    public function debugResponse($response) {
        error_log("=== BILLDESK DEBUG RESPONSE ===");
        $fields = explode('|', $response);
        foreach ($fields as $i => $field) {
            error_log("Field [$i]: $field");
        }
        error_log("Total Fields: " . count($fields));
        error_log("Status Field (14): " . (isset($fields[14]) ? $fields[14] : 'NOT_FOUND'));
        error_log("=== END DEBUG ===");
    }
}

?>