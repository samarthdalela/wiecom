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
            // $this->merchantId = $_ENV['BILLDESK_MERCHANT_ID'] ?? $this->getConfigFromDB('merchant_id');
            // $this->securityId = $_ENV['BILLDESK_SECURITY_ID'] ?? $this->getConfigFromDB('security_id');
            // $this->checksumKey = $_ENV['BILLDESK_CHECKSUM_KEY'] ?? $this->getConfigFromDB('checksum_key');
            // $this->returnUrl = $_ENV['BILLDESK_RETURN_URL'] ?? $this->getConfigFromDB('return_url');
            // $this->isTestMode = ($_ENV['BILLDESK_TEST_MODE'] ?? 'false') === 'true';
            $this->merchantId = $_ENV['merchantId'];
            $this->securityId = $_ENV['securityId'];
            $this->checksumKey = $_ENV['checksumKey'];
            $this->isTestMode = false;

            if (empty($this->merchantId) || empty($this->securityId) || empty($this->checksumKey)) {
                $this->merchantId = 'NIELIT';
                $this->securityId = 'nielit';
                $this->checksumKey = 'WYZZHkyZuU9K';
                $this->isTestMode = false;
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
        if (count($responseArray) < 23) {
            throw new Exception("Incomplete response: expected 23 fields, got " . count($responseArray));
        }

        list(
            $merchantId, $customerID, , $txnAmount, , $status, , $currencyType, , $typeField1,
            $securityId, $txnId, $bankTxnId, $typeField2,
            $mobile, , $name, , $email, , , $returnUrl, $receivedChecksum
        ) = $responseArray;

        $responseWithoutChecksum = implode('|', array_slice($responseArray, 0, 22));
        $expectedChecksum = strtoupper(hash('sha256', $responseWithoutChecksum . "|" . $this->checksumKey));

        if (!hash_equals($expectedChecksum, $receivedChecksum)) {
            throw new Exception("Checksum verification failed");
        }

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
            'txn_date' => date('Y-m-d H:i:s'),
            'customer_mobile' => $mobile,
            'customer_name' => $name,
            'customer_email' => $email,
            'raw_response' => $response
        ];

        $this->logTransaction($customerID, null, $response, $statusClean);
        return $result;
    }

    private function getPaymentStatus($code) {
        $code = strtoupper(trim($code));
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
                return 'Unknown status';
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
        error_log("=== DEBUG RESPONSE ===");
        $fields = explode('|', $response);
        foreach ($fields as $i => $f) {
            error_log("Field [$i]: $f");
        }
        error_log("=== END DEBUG ===");
    }
}

// classes/BillDeskIntegration.php - Production Ready with Administrator Option
// class BillDeskIntegration {
//     private $merchantId;
//     private $securityId;
//     private $checksumKey;
//     private $returnUrl;
//     private $conn;
    
//     public function __construct($db) {
//         $this->conn = $db;
//         $this->loadConfig();
//     }
    
//     private function loadConfig() {
//         // ✅ NIELIT Production Credentials
//         $this->merchantId = 'NIELIT';
//         $this->securityId = 'nielit';
//         $this->checksumKey = 'WYZZHkyZuU9K';
        
//         // ✅ Production Return URL
//         $this->returnUrl = 'http://localhost/wiecom/payment_response.php';
        
//         error_log("BillDesk Production Config Loaded: MerchantID={$this->merchantId}");
//     }
    
//     public function createPaymentRequest($orderId, $amount, $customerInfo) {
//         // ✅ Using proven working 22-field format
        
//         $customerID = $orderId;
//         $filler1 = "NA";
//         $bankID = "NA";
//         $txnAmount = number_format($amount, 2, '.', '');
//         $filler2 = "NA";
//         $filler3 = "NA";
//         $currencyType = "INR";
//         $itemCode = "NA";
//         $typeField1 = "R";
//         $filler4 = "NA";
//         $filler5 = "NA";
//         $typeField2 = "F";
        
//         // Additional fields
//         $additionalField1 = $customerInfo['mobile'];
//         $additionalField2 = "UPWIECON2025";
//         $additionalField3 = $customerInfo['name'];
//         $additionalField4 = "REGISTRATION";
//         $additionalField5 = $customerInfo['email'];
//         $additionalField6 = "NA";
//         $additionalField7 = "NA";
//         $typeField3 = $this->returnUrl;
        
//         // Construct string with 22 fields
//         $str = $this->merchantId . "|" . 
//                $customerID . "|" . 
//                $filler1 . "|" . 
//                $txnAmount . "|" . 
//                $bankID . "|" . 
//                $filler2 . "|" . 
//                $filler3 . "|" . 
//                $currencyType . "|" . 
//                $itemCode . "|" . 
//                $typeField1 . "|" . 
//                $this->securityId . "|" . 
//                $filler4 . "|" . 
//                $filler5 . "|" . 
//                $typeField2 . "|" . 
//                $additionalField1 . "|" . 
//                $additionalField2 . "|" . 
//                $additionalField3 . "|" . 
//                $additionalField4 . "|" . 
//                $additionalField5 . "|" . 
//                $additionalField6 . "|" . 
//                $additionalField7 . "|" . 
//                $typeField3;
        
//         // Generate checksum using working method
//         $checksum = hash('sha256', $str . "|" . $this->checksumKey, false);
//         $checksum = strtoupper($checksum);
        
//         // Final message
//         $msg = $str . '|' . $checksum;
        
//         // Log for production monitoring
//         error_log("BillDesk Payment Request Created - Order: $orderId, Amount: $txnAmount");
        
//         return $msg;
//     }
    
//     public function getPaymentUrl() {
//         // ✅ Production BillDesk URL
//         return 'https://www.billdesk.com/pgidsk/PGIMerchantPayment';
//     }
    
//     public function processResponse($response) {
//         if (empty($response)) {
//             throw new Exception("Invalid payment response - empty response received");
//         }
        
//         error_log("Processing BillDesk response for production");
        
//         $responseArray = explode('|', $response);
        
//         if (count($responseArray) < 23) {
//             throw new Exception("Invalid response format - got " . count($responseArray) . " fields, expected 23");
//         }
        
//         // Extract response parameters
//         $merchantId = $responseArray[0];
//         $customerID = $responseArray[1];
//         $filler1 = $responseArray[2];
//         $txnAmount = $responseArray[3];
//         $bankID = $responseArray[4];
//         $status = $responseArray[5];
//         $filler3 = $responseArray[6];
//         $currencyType = $responseArray[7];
//         $itemCode = $responseArray[8];
//         $typeField1 = $responseArray[9];
//         $securityId = $responseArray[10];
//         $txnId = $responseArray[11];
//         $bankTxnId = $responseArray[12];
//         $typeField2 = $responseArray[13];
//         $additionalField1 = $responseArray[14]; // Mobile
//         $additionalField2 = $responseArray[15]; // Conference ID
//         $additionalField3 = $responseArray[16]; // Name
//         $additionalField4 = $responseArray[17]; // Registration
//         $additionalField5 = $responseArray[18]; // Email
//         $additionalField6 = $responseArray[19];
//         $additionalField7 = $responseArray[20];
//         $returnUrl = $responseArray[21];
//         $checksum = $responseArray[22];
        
//         // Verify merchant credentials
//         if ($merchantId !== $this->merchantId) {
//             throw new Exception("Merchant ID mismatch");
//         }
        
//         if ($securityId !== $this->securityId) {
//             throw new Exception("Security ID mismatch");
//         }
        
//         // Verify checksum
//         $responseWithoutChecksum = implode('|', array_slice($responseArray, 0, 22));
//         $expectedChecksum = hash('sha256', $responseWithoutChecksum . "|" . $this->checksumKey, false);
//         $expectedChecksum = strtoupper($expectedChecksum);
        
//         if (!hash_equals($expectedChecksum, $checksum)) {
//             throw new Exception("Checksum verification failed");
//         }
        
//         // Determine payment status
//         $paymentStatus = 'FAILED';
//         $responseMessage = 'Transaction processed';
        
//         switch ($status) {
//             case '0300':
//             case 'SUCCESS':
//                 $paymentStatus = 'SUCCESS';
//                 $responseMessage = 'Transaction successful';
//                 break;
//             case '0399':
//             case 'PENDING':
//                 $paymentStatus = 'PENDING';
//                 $responseMessage = 'Transaction pending';
//                 break;
//             case '0002':
//             case '0400':
//             case 'CANCELLED':
//                 $paymentStatus = 'CANCELLED';
//                 $responseMessage = 'Transaction cancelled';
//                 break;
//             default:
//                 $paymentStatus = 'FAILED';
//                 $responseMessage = 'Transaction failed';
//                 break;
//         }
        
//         return [
//             'merchant_id' => $merchantId,
//             'order_id' => $customerID,
//             'amount' => floatval($txnAmount),
//             'txn_id' => $txnId ?: 'NO_TXN_ID',
//             'bank_txn_id' => $bankTxnId ?: 'NO_BANK_ID',
//             'status' => $paymentStatus,
//             'response_code' => $status,
//             'response_message' => $responseMessage,
//             'txn_date' => date('Y-m-d H:i:s'),
//             'customer_mobile' => $additionalField1,
//             'customer_name' => $additionalField3,
//             'customer_email' => $additionalField5,
//             'raw_response' => $response
//         ];
//     }
    
//     public function logTransaction($orderId, $request, $response = null, $status = 'INITIATED') {
//         try {
//             $query = "INSERT INTO billdesk_transaction_log 
//                       (order_id, request_data, response_data, status, created_at) 
//                       VALUES (:order_id, :request_data, :response_data, :status, NOW())";
            
//             $stmt = $this->conn->prepare($query);
//             $stmt->bindParam(':order_id', $orderId);
//             $stmt->bindParam(':request_data', $request);
//             $stmt->bindParam(':response_data', $response);
//             $stmt->bindParam(':status', $status);
            
//             $stmt->execute();
//         } catch (Exception $e) {
//             error_log("Failed to log transaction: " . $e->getMessage());
//         }
//     }
    
//     public function getConfig() {
//         return [
//             'merchant_id' => $this->merchantId,
//             'security_id' => $this->securityId,
//             'return_url' => $this->returnUrl,
//             'gateway_url' => $this->getPaymentUrl(),
//             'environment' => 'PRODUCTION'
//         ];
//     }
// }



?>