<?php

// classes/EasebuzzIntegration.php - Enhanced to match BillDesk structure

// Include required dependencies
require_once __DIR__ . '/../vendor/autoload.php';

// Load environment variables
if (class_exists('Dotenv\Dotenv')) {
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../config');
    $dotenv->load();
}

class EasebuzzIntegration
{
    private $apiKey;
    private $salt;
    private $env; // 'test' or 'prod'
    private $returnUrl;
    private $conn;
    private $isTestMode;

    public function __construct($db)
    {
        $this->conn = $db;
        $this->loadConfig();
    }

    private function loadConfig()
    {
        // Load configuration from environment variables
        $this->apiKey = $_ENV['EASEBUZZ_API_KEY'] ?? 'YOUR_TEST_API_KEY';
        $this->salt = $_ENV['EASEBUZZ_SALT'] ?? 'YOUR_TEST_SALT';
        $this->env = $_ENV['EASEBUZZ_ENV'] ?? 'test';
        $this->isTestMode = ($this->env === 'test');

        // Set return URLs
        $baseUrl = $_ENV['BASE_URL'] ?? 'https://yourdomain.com';
        $this->returnUrl = $baseUrl . '/payment_response.php';

        // Log configuration (without sensitive data)
        error_log("EaseBuzz Config Loaded - Environment: " . $this->env . ", Return URL: " . $this->returnUrl);
    }

    /**
     * Create payment request similar to BillDesk structure
     * @param string $orderId - Unique order ID
     * @param float $amount - Payment amount
     * @param array $customerInfo - Customer information (name, email, mobile)
     * @return array|false - Payment request data or false on failure
     */
    public function createPaymentRequest($orderId, $amount, $customerInfo)
    {
        try {
            // Validate input parameters
            if (!$this->validateOrderId($orderId)) {
                throw new Exception("Invalid order ID format: " . $orderId);
            }

            if (!$this->validateAmount($amount)) {
                throw new Exception("Invalid amount: " . $amount);
            }

            if (!$this->validateCustomerInfo($customerInfo)) {
                throw new Exception("Invalid customer information provided");
            }

            // Prepare payment data similar to BillDesk structure
            $paymentData = [
                "key" => $this->apiKey,
                "txnid" => $orderId,
                "amount" => number_format($amount, 2, '.', ''),
                "firstname" => $this->sanitizeCustomerName($customerInfo['name'] ?? 'Customer'),
                "email" => $customerInfo['email'] ?? 'test@test.com',
                "phone" => $this->sanitizePhoneNumber($customerInfo['mobile'] ?? '9999999999'),
                "productinfo" => "UPWIECON2025_REGISTRATION",
                "surl" => $this->returnUrl, // Success URL
                "furl" => $this->returnUrl, // Failure URL
                "service_provider" => "payu_paisa",

                // Additional BillDesk-style parameters
                "udf1" => "CONFERENCE_REG",
                "udf2" => "UPWIECON2025",
                "udf3" => date('Y-m-d H:i:s'),
                "udf4" => "",
                "udf5" => "",
                "udf6" => "",
                "udf7" => "",
                "udf8" => "",
                "udf9" => "",
                "udf10" => ""
            ];

            // Generate hash - EaseBuzz uses specific hash sequence
            $hashString = $this->generateHashString($paymentData);
            $paymentData['hash'] = strtolower(hash('sha512', $hashString));

            // Log transaction for audit trail
            $this->logTransaction($orderId, json_encode($paymentData), null, 'INITIATED');

            // Log success
            error_log("EaseBuzz Payment Request Created - Order ID: " . $orderId . ", Amount: ₹" . $amount);

            return $paymentData;

        } catch (Exception $e) {
            error_log("EaseBuzz Payment Request Creation Error: " . $e->getMessage());
            error_log("Stack trace: " . $e->getTraceAsString());
            return false;
        }
    }

    /**
     * Process payment response similar to BillDesk structure
     * @param array $response - Payment gateway response
     * @return array - Standardized response format
     */
    public function processResponse($response)
    {
        try {
            if (empty($response)) {
                throw new Exception("Empty payment response received");
            }

            // Extract response data
            $status = $response['status'] ?? 'FAILED';
            $hash = $response['hash'] ?? '';
            $orderId = $response['txnid'] ?? '';
            $amount = $response['amount'] ?? 0;
            $productinfo = $response['productinfo'] ?? '';
            $firstname = $response['firstname'] ?? '';
            $email = $response['email'] ?? '';
            $phone = $response['phone'] ?? '';
            $easebuzzId = $response['easebuzz_id'] ?? '';
            $bankRefNum = $response['bank_ref_num'] ?? '';
            $errorMessage = $response['error_Message'] ?? '';

            // Verify hash for security
            if (!$this->verifyResponseHash($response)) {
                throw new Exception("Hash verification failed - possible tampering detected");
            }

            // Standardize status similar to BillDesk
            $standardizedStatus = $this->standardizeStatus($status);

            // Create standardized response format (similar to BillDesk)
            $result = [
                'success' => ($standardizedStatus === 'SUCCESS'),
                'order_id' => $orderId,
                'amount' => floatval($amount),
                'status' => $standardizedStatus,
                'response_message' => $errorMessage ?: $this->getStatusMessage($status),
                'transaction_id' => $easebuzzId,
                'bank_reference_number' => $bankRefNum,
                'gateway_response_code' => $status,
                'payment_method' => $response['mode'] ?? 'UNKNOWN',
                'customer_name' => $firstname,
                'customer_email' => $email,
                'customer_phone' => $phone,
                'payment_date' => date('Y-m-d H:i:s'),
                'gateway' => 'EASEBUZZ',
                'raw_response' => json_encode($response)
            ];

            // Log transaction response
            $this->logTransaction($orderId, null, json_encode($response), $standardizedStatus);

            error_log("EaseBuzz Payment Response Processed - Order ID: " . $orderId . ", Status: " . $standardizedStatus);

            return $result;

        } catch (Exception $e) {
            error_log("EaseBuzz Response Processing Error: " . $e->getMessage());

            // Return error response in standardized format
            return [
                'success' => false,
                'order_id' => $response['txnid'] ?? 'UNKNOWN',
                'amount' => floatval($response['amount'] ?? 0),
                'status' => 'FAILED',
                'response_message' => 'Response processing failed: ' . $e->getMessage(),
                'transaction_id' => '',
                'bank_reference_number' => '',
                'gateway_response_code' => 'ERROR',
                'payment_method' => 'UNKNOWN',
                'customer_name' => $response['firstname'] ?? '',
                'customer_email' => $response['email'] ?? '',
                'customer_phone' => $response['phone'] ?? '',
                'payment_date' => date('Y-m-d H:i:s'),
                'gateway' => 'EASEBUZZ',
                'raw_response' => json_encode($response)
            ];
        }
    }

    /**
     * Get payment gateway URL - similar to BillDesk structure
     * @param bool $testMode - Optional test mode override
     * @return string - Payment gateway URL
     */
    public function getPaymentUrl($testMode = null)
    {
        $useTestMode = $testMode !== null ? $testMode : $this->isTestMode;

        $url = $useTestMode
            ? 'https://testpay.easebuzz.in/payment/initiateLink'
            : 'https://pay.easebuzz.in/payment/initiateLink';

        error_log("EaseBuzz Payment URL: " . $url . " (Test Mode: " . ($useTestMode ? 'Yes' : 'No') . ")");

        return $url;
    }

    /**
     * Generate hash string for EaseBuzz
     * @param array $data - Payment data
     * @return string - Hash string
     */
    private function generateHashString($data)
    {
        // EaseBuzz hash sequence for request
        return $data['key'] . "|" .
            $data['txnid'] . "|" .
            $data['amount'] . "|" .
            $data['productinfo'] . "|" .
            $data['firstname'] . "|" .
            $data['email'] . "|" .
            ($data['udf1'] ?? '') . "|" .
            ($data['udf2'] ?? '') . "|" .
            ($data['udf3'] ?? '') . "|" .
            ($data['udf4'] ?? '') . "|" .
            ($data['udf5'] ?? '') . "|" .
            ($data['udf6'] ?? '') . "|" .
            ($data['udf7'] ?? '') . "|" .
            ($data['udf8'] ?? '') . "|" .
            ($data['udf9'] ?? '') . "|" .
            ($data['udf10'] ?? '') . "|" .
            $this->salt;
    }

    /**
     * Verify response hash
     * @param array $response - Payment response
     * @return bool - Hash verification result
     */
    private function verifyResponseHash($response)
    {
        $receivedHash = $response['hash'] ?? '';
        if (empty($receivedHash)) {
            return false;
        }

        // EaseBuzz hash sequence for response (reverse order)
        $hashSequence = $this->salt . "|" .
            ($response['status'] ?? '') . "|" .
            ($response['udf10'] ?? '') . "|" .
            ($response['udf9'] ?? '') . "|" .
            ($response['udf8'] ?? '') . "|" .
            ($response['udf7'] ?? '') . "|" .
            ($response['udf6'] ?? '') . "|" .
            ($response['udf5'] ?? '') . "|" .
            ($response['udf4'] ?? '') . "|" .
            ($response['udf3'] ?? '') . "|" .
            ($response['udf2'] ?? '') . "|" .
            ($response['udf1'] ?? '') . "|" .
            ($response['email'] ?? '') . "|" .
            ($response['firstname'] ?? '') . "|" .
            ($response['productinfo'] ?? '') . "|" .
            ($response['amount'] ?? '') . "|" .
            ($response['txnid'] ?? '') . "|" .
            $this->apiKey;

        $expectedHash = strtolower(hash('sha512', $hashSequence));

        return hash_equals($expectedHash, strtolower($receivedHash));
    }

    /**
     * Standardize payment status similar to BillDesk
     * @param string $status - Gateway status
     * @return string - Standardized status
     */
    private function standardizeStatus($status)
    {
        switch (strtolower($status)) {
            case 'success':
                return 'SUCCESS';
            case 'failure':
            case 'failed':
                return 'FAILED';
            case 'pending':
                return 'PENDING';
            case 'cancelled':
            case 'cancel':
                return 'CANCELLED';
            default:
                return 'FAILED';
        }
    }

    /**
     * Get human-readable status message
     * @param string $status - Payment status
     * @return string - Status message
     */
    private function getStatusMessage($status)
    {
        switch (strtolower($status)) {
            case 'success':
                return 'Payment completed successfully';
            case 'failure':
            case 'failed':
                return 'Payment failed';
            case 'pending':
                return 'Payment is pending';
            case 'cancelled':
            case 'cancel':
                return 'Payment cancelled by user';
            default:
                return 'Payment status unknown';
        }
    }

    /**
     * Validate order ID format
     * @param string $orderId - Order ID to validate
     * @return bool - Validation result
     */
    public function validateOrderId($orderId)
    {
        return !empty($orderId) &&
            preg_match('/^[A-Za-z0-9_-]+$/', $orderId) &&
            strlen($orderId) >= 3 &&
            strlen($orderId) <= 50;
    }

    /**
     * Validate payment amount
     * @param float $amount - Amount to validate
     * @return bool - Validation result
     */
    public function validateAmount($amount)
    {
        return is_numeric($amount) &&
            $amount > 0 &&
            $amount <= 1000000 &&
            $amount >= 1;
    }

    /**
     * Validate customer information
     * @param array $customerInfo - Customer information
     * @return bool - Validation result
     */
    private function validateCustomerInfo($customerInfo)
    {
        return !empty($customerInfo['name']) &&
            !empty($customerInfo['email']) &&
            !empty($customerInfo['mobile']) &&
            filter_var($customerInfo['email'], FILTER_VALIDATE_EMAIL) &&
            preg_match('/^[0-9]{10}$/', preg_replace('/\D/', '', $customerInfo['mobile']));
    }

    /**
     * Sanitize customer name
     * @param string $name - Customer name
     * @return string - Sanitized name
     */
    private function sanitizeCustomerName($name)
    {
        // Remove special characters, keep only letters, numbers, spaces
        $sanitized = preg_replace('/[^a-zA-Z0-9\s]/', '', $name);
        return substr(trim($sanitized), 0, 50) ?: 'Customer';
    }

    /**
     * Sanitize phone number
     * @param string $phone - Phone number
     * @return string - Sanitized phone number
     */
    private function sanitizePhoneNumber($phone)
    {
        $cleaned = preg_replace('/\D/', '', $phone);
        return strlen($cleaned) >= 10 ? substr($cleaned, -10) : '9999999999';
    }

    /**
     * Log transaction for audit trail
     * @param string $orderId - Order ID
     * @param string $request - Request data
     * @param string $response - Response data
     * @param string $status - Transaction status
     */
    public function logTransaction($orderId, $request = null, $response = null, $status = 'INITIATED')
    {
        try {
            $query = "INSERT INTO payment_transaction_log 
                      (gateway, order_id, request_data, response_data, status, created_at) 
                      VALUES (:gateway, :order_id, :request_data, :response_data, :status, NOW())";

            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(':gateway', 'EASEBUZZ');
            $stmt->bindParam(':order_id', $orderId);
            $stmt->bindParam(':request_data', $request);
            $stmt->bindParam(':response_data', $response);
            $stmt->bindParam(':status', $status);
            $stmt->execute();

        } catch (Exception $e) {
            error_log("EaseBuzz Transaction Log Error: " . $e->getMessage());
            // Don't throw exception as logging is not critical for payment flow
        }
    }

    /**
     * Get configuration information (similar to BillDesk)
     * @return array - Configuration data
     */
    public function getConfig()
    {
        return [
            'gateway' => 'EASEBUZZ',
            'api_key' => substr($this->apiKey, 0, 10) . '...', // Masked for security
            'environment' => $this->env,
            'test_mode' => $this->isTestMode,
            'return_url' => $this->returnUrl,
            'gateway_url' => $this->getPaymentUrl(),
            'version' => '1.0'
        ];
    }

    /**
     * Debug response data (similar to BillDesk)
     * @param array $response - Response to debug
     */
    public function debugResponse($response)
    {
        if ($this->isTestMode) {
            error_log("=== EASEBUZZ DEBUG RESPONSE ===");
            error_log("Gateway: EaseBuzz");
            error_log("Environment: " . $this->env);
            error_log("Response Fields:");

            foreach ($response as $key => $value) {
                if ($key !== 'hash') { // Don't log hash for security
                    error_log("  [$key]: " . (is_array($value) ? json_encode($value) : $value));
                }
            }

            error_log("Hash Verification: " . ($this->verifyResponseHash($response) ? 'PASSED' : 'FAILED'));
            error_log("=== END EASEBUZZ DEBUG ===");
        }
    }

    /**
     * Get transaction status from database
     * @param string $orderId - Order ID
     * @return array|false - Transaction details or false
     */
    public function getTransactionStatus($orderId)
    {
        try {
            $query = "SELECT * FROM payment_transaction_log 
                      WHERE gateway = 'EASEBUZZ' AND order_id = :order_id 
                      ORDER BY created_at DESC LIMIT 1";

            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':order_id', $orderId);
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);

        } catch (Exception $e) {
            error_log("EaseBuzz Get Transaction Status Error: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Verify payment with EaseBuzz API (for additional security)
     * @param string $orderId - Order ID to verify
     * @return array|false - Verification result
     */
    public function verifyPayment($orderId)
    {
        // This would implement EaseBuzz's payment verification API
        // For now, return the logged transaction status
        return $this->getTransactionStatus($orderId);
    }
}
// require_once __DIR__ . '/../vendor/autoload.php'; // Adjust if you're inside /classes

// $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../config');
// $dotenv->load();

// class BillDeskIntegration {
//     private $merchantId;
//     private $securityId;
//     private $checksumKey;
//     private $returnUrl;
//     private $conn;
//     private $isTestMode;

//     public function __construct($db) {
//         $this->conn = $db;
//         $this->loadConfig();
//     }

//     private function loadConfig() {
//         try {
//             $this->merchantId = $_ENV['merchantId'] ?? null;
//             $this->securityId = $_ENV['securityId'] ?? null;
//             $this->checksumKey = 'WYZZHkyZuU9K';
//             $this->returnUrl = $_ENV['returnUrl'] ?? null;
//             $this->isTestMode = false;

//             if (empty($this->merchantId) || empty($this->securityId) || empty($this->checksumKey)) {
//                 $this->merchantId = 'NIELIT';
//                 $this->securityId = 'nielit';
//                 $this->checksumKey = 'WYZZHkyZuU9K';
//                 $this->isTestMode = false;
//                 // $this->returnUrl = 'https://2343-103-165-89-10.ngrok-free.app/payment_response.php';
//                 $this->returnUrl = 'https://0fbb-103-165-89-10.ngrok-free.app/newWiecom/payment_response.php';
//             }

//             if (empty($this->returnUrl)) {
//                 $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https://' : 'http://';
//                 $this->returnUrl = $protocol . $_SERVER['HTTP_HOST'] . '/payment_response.php';
//             }
//         } catch (Exception $e) {
//             $this->setTestConfiguration();
//         }
//     }

//     private function getConfigFromDB($field) {
//         try {
//             $query = "SELECT $field FROM billdesk_config WHERE is_active = 1 LIMIT 1";
//             $stmt = $this->conn->prepare($query);
//             $stmt->execute();
//             $result = $stmt->fetch(PDO::FETCH_ASSOC);
//             return $result ? trim($result[$field]) : null;
//         } catch (Exception $e) {
//             return null;
//         }
//     }

//     private function setTestConfiguration() {
//         $this->merchantId = 'TESTMERCHANT';
//         $this->securityId = 'TESTSECURITY';
//         $this->checksumKey = 'TEST_CHECKSUM_KEY_12345';
//         $this->isTestMode = true;
//     }

//     public function createPaymentRequest($orderId, $amount, $customerInfo) {
//         try {
//             if (!$this->validateOrderId($orderId) || !$this->validateAmount($amount)) {
//                 throw new Exception("Invalid order ID or amount.");
//             }

//             $txnAmount = number_format($amount, 2, '.', '');
//             $str = implode('|', [
//                 $this->merchantId,
//                 $orderId,
//                 'NA',
//                 $txnAmount,
//                 'NA',
//                 'NA',
//                 'NA',
//                 'INR',
//                 'NA',
//                 'R',
//                 $this->securityId,
//                 'NA',
//                 'NA',
//                 'F',
//                 $customerInfo['mobile'] ?? '9999999999',
//                 'UPWIECON2026',
//                 $customerInfo['name'] ?? 'Customer',
//                 'REGISTRATION',
//                 $customerInfo['email'] ?? 'test@test.com',
//                 'NA',
//                 'NA',
//                 $this->returnUrl
//             ]);

//             $checksum = strtoupper(hash('sha256', $str . "|" . $this->checksumKey));
//             $finalRequest = $str . '|' . $checksum;

//             $this->logTransaction($orderId, $finalRequest, null, 'INITIATED');
//             return $finalRequest;

//         } catch (Exception $e) {
//             error_log("Payment request creation error: " . $e->getMessage());
//             throw $e;
//         }
//     }

//     public function processResponse($response) {
//         if (empty($response)) {
//             throw new Exception("Empty response");
//         }

//         $responseArray = explode('|', $response);

//         // Log the response structure for debugging
//         error_log("BillDesk Response Debug - Total fields: " . count($responseArray));

//         // Your actual response has 26 fields based on the example you provided
//         if (count($responseArray) < 26) {
//             throw new Exception("Incomplete response: expected 26 fields, got " . count($responseArray));
//         }

//         // Corrected field mapping based on your actual response format:
//         // NIELIT|UPWIECON2026_60_1751619143|BHD58QF0PD3ATY|555109974322|1.00|HD5|NA|10|INR|DIRECT|NA|NA|0.00|04-07-2026 14:22:50|0300|NA|0789861859|UPWIECON2026|SAMARTH DALELA|REGISTRATION|samarthdalela@gmail.com|NA|NA|NA|PGS10001-Success|CCF90F2FB80201FD8E1509872F86EA3032D6ED64AB2CFB5A5CC08F4B1087F66A

//         $merchantId = $responseArray[0];        // NIELIT
//         $customerID = $responseArray[1];        // UPWIECON2026_60_1751619143 (Order ID)
//         $bankTxnId = $responseArray[2];         // BHD58QF0PD3ATY (Bank Transaction ID)
//         $txnId = $responseArray[3];             // 555109974322 (Transaction ID)
//         $txnAmount = $responseArray[4];         // 1.00 (Amount)
//         $field5 = $responseArray[5];            // HD5
//         $field6 = $responseArray[6];            // NA
//         $field7 = $responseArray[7];            // 10
//         $currencyType = $responseArray[8];      // INR
//         $field9 = $responseArray[9];            // DIRECT
//         $field10 = $responseArray[10];          // NA
//         $field11 = $responseArray[11];          // NA
//         $field12 = $responseArray[12];          // 0.00
//         $txnDate = $responseArray[13];          // 04-07-2026 14:22:50
//         $status = $responseArray[14];           // 0300 (ACTUAL STATUS CODE!)
//         $field15 = $responseArray[15];          // NA
//         $mobile = $responseArray[16];           // 0789861859
//         $conferenceId = $responseArray[17];     // UPWIECON2026
//         $name = $responseArray[18];             // SAMARTH DALELA
//         $regType = $responseArray[19];          // REGISTRATION
//         $email = $responseArray[20];            // samarthdalela@gmail.com
//         $field21 = $responseArray[21];          // NA
//         $field22 = $responseArray[22];          // NA
//         $field23 = $responseArray[23];          // NA
//         $gatewayResponse = $responseArray[24];  // PGS10001-Success
//         $receivedChecksum = $responseArray[25]; // Checksum

//         // Log the actual status for debugging
//         error_log("BillDesk Status Debug - Status Code: " . $status);
//         error_log("BillDesk Status Debug - Field 5 (previously used): " . $field5);

//         // For checksum verification, use fields 0-24 (excluding the checksum itself)
//         $responseWithoutChecksum = implode('|', array_slice($responseArray, 0, 25));
//         $expectedChecksum = strtoupper(hash('sha256', $responseWithoutChecksum . "|" . $this->checksumKey));

//         // Uncomment below lines if you want to verify checksum
//         // if (!hash_equals($expectedChecksum, $receivedChecksum)) {
//         //     error_log("Checksum mismatch - Expected: $expectedChecksum, Received: $receivedChecksum");
//         //     throw new Exception("Checksum verification failed");
//         // }

//         $statusClean = $this->getPaymentStatus($status);
//         $result = [
//             'merchant_id' => $merchantId,
//             'order_id' => $customerID,
//             'amount' => floatval($txnAmount),
//             'txn_id' => $txnId ?: 'NA',
//             'bank_txn_id' => $bankTxnId ?: 'NA',
//             'status' => $statusClean,
//             'response_code' => $status,
//             'response_message' => $this->getResponseMessage($status),
//             'txn_date' => $txnDate,
//             'customer_mobile' => $mobile,
//             'customer_name' => $name,
//             'customer_email' => $email,
//             'conference_id' => $conferenceId,
//             'registration_type' => $regType,
//             'gateway_response' => $gatewayResponse,
//             'raw_response' => $response
//         ];

//         // Log the final status for debugging
//         error_log("BillDesk Final Status: " . $statusClean . " for Order: " . $customerID);

//         $this->logTransaction($customerID, null, $response, $statusClean);
//         return $result;
//     }

//     private function getPaymentStatus($code) {
//         $code = strtoupper(trim($code));
//         error_log("BillDesk getPaymentStatus - Processing code: " . $code);

//         switch ($code) {
//             case '0300':
//             case 'SUCCESS':
//                 return 'SUCCESS';
//             case '0399':
//             case 'PENDING':
//                 return 'PENDING';
//             case '0002':
//             case '0400':
//             case 'CANCELLED':
//                 return 'CANCELLED';
//             case '0001':
//             case 'FAILED':
//             default:
//                 return 'FAILED';
//         }
//     }

//     private function getResponseMessage($code) {
//         $code = strtoupper(trim($code));
//         switch ($code) {
//             case '0300':
//             case 'SUCCESS':
//                 return 'Transaction successful';
//             case '0399':
//             case 'PENDING':
//                 return 'Transaction pending';
//             case '0002':
//             case '0400':
//             case 'CANCELLED':
//                 return 'Transaction cancelled';
//             case '0001':
//             case 'FAILED':
//                 return 'Transaction failed';
//             default:
//                 return 'Unknown status: ' . $code;
//         }
//     }

//     public function getPaymentUrl($testMode = null) {
//         $useTest = $testMode ?? $this->isTestMode;
//         return $useTest
//             ? 'https://pgi.billdesk.com/pgidsk/PGIMerchantPayment'
//             : 'https://www.billdesk.com/pgidsk/PGIMerchantPayment';
//     }

//     public function validateOrderId($orderId) {
//         return preg_match('/^[A-Za-z0-9_-]+$/', $orderId) && strlen($orderId) <= 50;
//     }

//     public function validateAmount($amount) {
//         return is_numeric($amount) && $amount > 0 && $amount <= 1000000;
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
//             error_log("Log error: " . $e->getMessage());
//         }
//     }

//     public function getConfig() {
//         return [
//             'merchant_id' => $this->merchantId,
//             'security_id' => $this->securityId,
//             'return_url' => $this->returnUrl,
//             'gateway_url' => $this->getPaymentUrl(),
//             'environment' => $this->isTestMode ? 'TEST' : 'PRODUCTION'
//         ];
//     }

//     public function isTestMode() {
//         return $this->isTestMode;
//     }

//     public function debugResponse($response) {
//         error_log("=== BILLDESK DEBUG RESPONSE ===");
//         $fields = explode('|', $response);
//         foreach ($fields as $i => $field) {
//             error_log("Field [$i]: $field");
//         }
//         error_log("Total Fields: " . count($fields));
//         error_log("Status Field (14): " . (isset($fields[14]) ? $fields[14] : 'NOT_FOUND'));
//         error_log("=== END DEBUG ===");
//     }
// }

?>