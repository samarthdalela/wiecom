<?php
// require_once __DIR__ . '/../vendor/autoload.php';

// $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../config');
// $dotenv->load();

// class EasebuzzIntegration {
//     private $apiKey;
//     private $salt;
//     private $env;
//     private $returnUrl;
//     private $conn;

//     public function __construct($db) {
//         $this->conn = $db;
//         $this->loadConfig();
//     }

//     private function loadConfig() {
//         $this->apiKey = 'KHQEZNXWNW';
//         $this->salt ='HORAXV54UI';
//         // $this->env = $_ENV['EASEBUZZ_ENV'] ?? 'test';
//         $this->returnUrl = $_ENV['returnUrl'] ?? 'https://0fbb-103-165-89-10.ngrok-free.app/payment_response.php';
//     }

//     public function createPaymentRequest($orderId, $amount, $customerInfo) {
//         try {
//             if (!$this->validateOrderId($orderId) || !$this->validateAmount($amount)) {
//                 throw new Exception("Invalid order ID or amount.");
//             }

//             $postData = [
//                 "key" => $this->apiKey,
//                 "txnid" => $orderId,
//                 "amount" => number_format($amount, 2, '.', ''),
//                 "firstname" => $customerInfo['name'] ?? 'Customer',
//                 "email" => $customerInfo['email'] ?? 'test@test.com',
//                 "phone" => $customerInfo['mobile'] ?? '9999999999',
//                 "productinfo" => "REGISTRATION",
//                 "surl" => $this->returnUrl,
//                 "furl" => $this->returnUrl,
//                 "udf1" => "",
//                 "udf2" => "",
//                 "udf3" => "",
//                 "udf4" => "",
//                 "udf5" => "",
//                 "udf6" => "",
//                 "udf7" => "",
//                 "udf8" => "",
//                 "udf9" => "",
//                 "udf10" => ""
//             ];

//             // Correct Easebuzz hash generation
//             $hashString = $postData['key']."|".$postData['txnid']."|".$postData['amount']."|".$postData['productinfo']."|".$postData['firstname']."|".$postData['email']."|".$postData['udf1']."|".$postData['udf2']."|".$postData['udf3']."|".$postData['udf4']."|".$postData['udf5']."|".$postData['udf6']."|".$postData['udf7']."|".$postData['udf8']."|".$postData['udf9']."|".$postData['udf10']."|".$this->salt;
            
//             $postData['hash'] = strtolower(hash('sha512', $hashString));

//             $this->logTransaction($orderId, json_encode($postData), null, 'INITIATED');
//             return $postData;
//         } catch (Exception $e) {
//             error_log("Payment request creation error: " . $e->getMessage());
//             throw $e;
//         }
//     }

//     public function getPaymentUrl() {
//         return $this->env === 'test'
//             ? 'https://testpay.easebuzz.in/payment/initiateLink'
//             : 'https://pay.easebuzz.in/payment/initiateLink';
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

//     // Add other necessary methods like processResponse, etc.
// }


// require_once __DIR__ . '/../vendor/autoload.php';

// // Load environment variables
// try {
//     $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../config');
//     $dotenv->load();
// } catch (Exception $e) {
//     error_log("Dotenv loading failed: " . $e->getMessage());
// }

// class EasebuzzIntegration {
//     private $merchantId;
//     private $apiKey;
//     private $salt;
//     private $env;
//     private $returnUrl;
//     private $conn;
//     private $isTestMode;

//     public function __construct($db) {
//         $this->conn = $db;
//         $this->loadConfig();
//     }

//     private function loadConfig() {
//         // Load from environment variables with fallbacks
//         $this->merchantId ='KHQEZNXWNW';
//         $this->apiKey = $_ENV['EASEBUZZ_API_KEY'] ?? 'KHQEZNXWNW';
//         $this->salt = $_ENV['EASEBUZZ_SALT'] ?? 'HORAXV54UI';
//         $this->env = $_ENV['EASEBUZZ_ENV'] ?? 'test';
        
//         $this->isTestMode = ($this->env === 'test');
        
//         // Construct return URL
//         $baseUrl = $_ENV['BASE_URL'] ?? 'https://0fbb-103-165-89-10.ngrok-free.app';
//         $this->returnUrl = $_ENV['returnUrl'] ?? rtrim($baseUrl, '/') . '/newWiecom/payment_response.php';
        
//         // Enhanced logging
//         error_log("=== EASEBUZZ CONFIG LOADED ===");
//         error_log("Merchant ID: " . $this->merchantId);
//         error_log("API Key: " . $this->apiKey);
//         error_log("Salt: " . $this->salt);
//         error_log("Environment: " . $this->env);
//         error_log("Test Mode: " . ($this->isTestMode ? 'YES' : 'NO'));
//         error_log("Return URL: " . $this->returnUrl);
//         error_log("Gateway URL: " . $this->getInitiateUrl());
//         error_log("===============================");
//     }

//     /**
//      * Create payment request and get gateway redirect data
//      */
//     public function createPaymentRequest($orderId, $amount, $customerInfo) {
//         try {
//             if (!$this->validateOrderId($orderId) || !$this->validateAmount($amount)) {
//                 throw new Exception("Invalid order ID or amount.");
//             }

//             // Sanitize customer info
//             $sanitizedCustomer = $this->sanitizeCustomerInfo($customerInfo);

//             // Create payment data
//             $postData = [
//                 "key" => trim($this->apiKey),
//                 "txnid" => trim($orderId),
//                 "amount" => number_format($amount, 2, '.', ''),
//                 "firstname" => $sanitizedCustomer['name'],
//                 "email" => $sanitizedCustomer['email'],
//                 "phone" => $sanitizedCustomer['phone'],
//                 "productinfo" => "Conference Registration",
//                 "surl" => $this->returnUrl,
//                 "furl" => $this->returnUrl,
//                 "udf1" => "UPWIECON2025",
//                 "udf2" => "MID_" . $this->merchantId,
//                 "udf3" => $this->env,
//                 "udf4" => "",
//                 "udf5" => "",
//                 "udf6" => "",
//                 "udf7" => "",
//                 "udf8" => "",
//                 "udf9" => "",
//                 "udf10" => ""
//             ];

//             // Generate hash
//             $hashString = $postData['key']."|".$postData['txnid']."|".$postData['amount']."|".$postData['productinfo']."|".$postData['firstname']."|".$postData['email']."|".$postData['udf1']."|".$postData['udf2']."|".$postData['udf3']."|".$postData['udf4']."|".$postData['udf5']."|".$postData['udf6']."|".$postData['udf7']."|".$postData['udf8']."|".$postData['udf9']."|".$postData['udf10']."|".$this->salt;
            
//             $postData['hash'] = strtolower(hash('sha512', $hashString));

//             // Debug logging
//             error_log("=== PAYMENT REQUEST DEBUG ===");
//             error_log("Order ID: " . $orderId);
//             error_log("Amount: " . $amount);
//             error_log("Customer: " . json_encode($sanitizedCustomer));
//             error_log("Hash String: " . $hashString);
//             error_log("Generated Hash: " . $postData['hash']);
//             error_log("API URL: " . $this->getInitiateUrl());
//             error_log("===============================");

//             // Log transaction
//             $this->logTransaction($orderId, json_encode($postData), null, 'INITIATED');

//             // Call EaseBuzz API
//             $sessionResponse = $this->initiatePayment($postData);
            
//             if (isset($sessionResponse['status']) && $sessionResponse['status'] == 1) {
//                 // Success
//                 error_log("✅ EaseBuzz API Success: Session token received - " . $sessionResponse['data']);
                
//                 return [
//                     'success' => true,
//                     'session_token' => $sessionResponse['data'],
//                     'gateway_url' => $this->getPaymentGatewayUrl()
//                 ];
//             } else {
//                 // API Error
//                 $errorDesc = $sessionResponse['error_desc'] ?? 'Unknown API error';
//                 $responseData = $sessionResponse['data'] ?? 'No additional data';
//                 $status = $sessionResponse['status'] ?? 'Unknown';
                
//                 error_log("❌ EaseBuzz API Error:");
//                 error_log("Status: " . $status);
//                 error_log("Error: " . $errorDesc);
//                 error_log("Data: " . $responseData);
//                 error_log("Full Response: " . json_encode($sessionResponse));
                
//                 throw new Exception("EaseBuzz API Error: " . $errorDesc);
//             }

//         } catch (Exception $e) {
//             error_log("❌ Payment request creation failed: " . $e->getMessage());
//             return [
//                 'success' => false,
//                 'error' => $e->getMessage()
//             ];
//         }
//     }

//     /**
//      * Call EaseBuzz API with enhanced error handling
//      */
//     private function initiatePayment($postData) {
//         $url = $this->getInitiateUrl();
        
//         $curl = curl_init();
//         curl_setopt_array($curl, [
//             CURLOPT_URL => $url,
//             CURLOPT_RETURNTRANSFER => true,
//             CURLOPT_POST => true,
//             CURLOPT_POSTFIELDS => http_build_query($postData),
//             CURLOPT_TIMEOUT => 30,
//             CURLOPT_HTTPHEADER => [
//                 'Content-Type: application/x-www-form-urlencoded',
//                 'User-Agent: Mozilla/5.0 (compatible; EaseBuzz-PHP-Client/1.0)',
//                 'Accept: application/json'
//             ],
//             CURLOPT_SSL_VERIFYPEER => false,
//             CURLOPT_SSL_VERIFYHOST => false
//         ]);

//         $response = curl_exec($curl);
//         $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
//         $error = curl_error($curl);
//         curl_close($curl);

//         // Log API call details
//         error_log("=== API CALL DETAILS ===");
//         error_log("URL: " . $url);
//         error_log("HTTP Code: " . $httpCode);
//         error_log("cURL Error: " . ($error ?: 'None'));
//         error_log("Raw Response: " . $response);
//         error_log("========================");

//         if ($error) {
//             throw new Exception("cURL Error: " . $error);
//         }

//         if ($httpCode !== 200) {
//             throw new Exception("HTTP Error $httpCode: " . $response);
//         }

//         $decodedResponse = json_decode($response, true);
        
//         if (json_last_error() !== JSON_ERROR_NONE) {
//             throw new Exception("Invalid JSON response: " . $response);
//         }

//         return $decodedResponse;
//     }

//     /**
//      * Sanitize customer information
//      */
//     private function sanitizeCustomerInfo($customerInfo) {
//         $sanitized = [
//             'name' => preg_replace('/[^a-zA-Z0-9\s\.]/', '', trim($customerInfo['name'] ?? 'Customer')),
//             'email' => filter_var($customerInfo['email'] ?? 'test@test.com', FILTER_VALIDATE_EMAIL) ?: 'test@test.com',
//             'phone' => preg_replace('/\D/', '', substr($customerInfo['mobile'] ?? '9999999999', -10))
//         ];

//         // Ensure minimum lengths
//         if (strlen($sanitized['name']) < 2) $sanitized['name'] = 'Customer';
//         if (strlen($sanitized['phone']) < 10) $sanitized['phone'] = '9999999999';

//         return $sanitized;
//     }

//     /**
//      * Get EaseBuzz initiate API URL
//      */
//     private function getInitiateUrl() {
//         return $this->isTestMode 
//             ? 'https://testpay.easebuzz.in/payment/initiateLink'
//             : 'https://pay.easebuzz.in/payment/initiateLink';
//     }

//     /**
//      * Get payment gateway URL for redirect
//      */
//     public function getPaymentGatewayUrl() {
//         return $this->isTestMode
//             ? 'https://testpay.easebuzz.in/payment/page/'
//             : 'https://pay.easebuzz.in/payment/page/';
//     }

//     /**
//      * Legacy method for backward compatibility
//      */
//     public function getPaymentUrl() {
//         return $this->getInitiateUrl();
//     }

//     /**
//      * Process payment response from EaseBuzz
//      */
//     public function processResponse($response) {
//         try {
//             if (empty($response) || !is_array($response)) {
//                 throw new Exception("Invalid payment response received");
//             }

//             // Log raw response
//             error_log("=== PROCESSING PAYMENT RESPONSE ===");
//             error_log("Raw Response: " . json_encode($response));

//             // Extract response data
//             $orderId = $response['txnid'] ?? '';
//             $status = $response['status'] ?? 'FAILED';
//             $amount = $response['amount'] ?? 0;
            
//             // Verify hash for security
//             $hashValid = $this->verifyResponseHash($response);
//             if (!$hashValid) {
//                 error_log("⚠️ Hash verification failed for response");
//             }

//             // Create standardized response
//             $result = [
//                 'success' => strtolower($status) === 'success',
//                 'order_id' => $orderId,
//                 'amount' => floatval($amount),
//                 'status' => $this->standardizeStatus($status),
//                 'transaction_id' => $response['easebuzz_id'] ?? $response['txnref'] ?? '',
//                 'bank_reference' => $response['bank_ref_num'] ?? '',
//                 'payment_method' => $response['mode'] ?? 'UNKNOWN',
//                 'response_message' => $response['error_Message'] ?? $this->getStatusMessage($status),
//                 'customer_name' => $response['firstname'] ?? '',
//                 'customer_email' => $response['email'] ?? '',
//                 'payment_date' => date('Y-m-d H:i:s'),
//                 'gateway' => 'EASEBUZZ',
//                 'merchant_id' => $this->merchantId,
//                 'hash_verified' => $hashValid,
//                 'raw_response' => json_encode($response)
//             ];

//             // Log transaction response
//             $this->logTransaction($orderId, null, json_encode($response), $result['status']);

//             error_log("✅ Payment response processed: " . $result['status'] . " for Order " . $orderId);
//             error_log("===================================");

//             return $result;

//         } catch (Exception $e) {
//             error_log("❌ Payment response processing error: " . $e->getMessage());
            
//             return [
//                 'success' => false,
//                 'order_id' => $response['txnid'] ?? 'UNKNOWN',
//                 'amount' => floatval($response['amount'] ?? 0),
//                 'status' => 'FAILED',
//                 'transaction_id' => '',
//                 'response_message' => 'Response processing failed: ' . $e->getMessage(),
//                 'gateway' => 'EASEBUZZ',
//                 'merchant_id' => $this->merchantId,
//                 'raw_response' => json_encode($response)
//             ];
//         }
//     }

//     /**
//      * Verify response hash for security
//      */
//     private function verifyResponseHash($response) {
//         $receivedHash = $response['hash'] ?? '';
        
//         if (empty($receivedHash)) {
//             return false;
//         }

//         // Reconstruct hash for verification
//         $hashSequence = implode('|', [
//             $this->salt,
//             $response['status'] ?? '',
//             $response['udf10'] ?? '',
//             $response['udf9'] ?? '',
//             $response['udf8'] ?? '',
//             $response['udf7'] ?? '',
//             $response['udf6'] ?? '',
//             $response['udf5'] ?? '',
//             $response['udf4'] ?? '',
//             $response['udf3'] ?? '',
//             $response['udf2'] ?? '',
//             $response['udf1'] ?? '',
//             $response['email'] ?? '',
//             $response['firstname'] ?? '',
//             $response['productinfo'] ?? '',
//             $response['amount'] ?? '',
//             $response['txnid'] ?? '',
//             $this->apiKey
//         ]);

//         $expectedHash = strtolower(hash('sha512', $hashSequence));
        
//         return hash_equals($expectedHash, strtolower($receivedHash));
//     }

//     // Utility methods
//     private function standardizeStatus($status) {
//         switch (strtolower($status)) {
//             case 'success': return 'SUCCESS';
//             case 'failure':
//             case 'failed': return 'FAILED';
//             case 'pending': return 'PENDING';
//             case 'cancelled': return 'CANCELLED';
//             default: return 'FAILED';
//         }
//     }

//     private function getStatusMessage($status) {
//         switch (strtolower($status)) {
//             case 'success': return 'Payment completed successfully';
//             case 'failure':
//             case 'failed': return 'Payment failed';
//             case 'pending': return 'Payment is pending';
//             case 'cancelled': return 'Payment cancelled by user';
//             default: return 'Payment status unknown';
//         }
//     }

//     public function validateOrderId($orderId) {
//         return preg_match('/^[A-Za-z0-9_-]+$/', $orderId) && strlen($orderId) <= 50;
//     }

//     public function validateAmount($amount) {
//         return is_numeric($amount) && $amount > 0 && $amount <= 1000000;
//     }

//     public function logTransaction($orderId, $request, $response = null, $status = 'INITIATED') {
//         try {
//             $query = "INSERT INTO payment_transaction_log 
//                       (gateway, order_id, request_data, response_data, status, created_at) 
//                       VALUES (:gateway, :order_id, :request_data, :response_data, :status, NOW())";

//             $stmt = $this->conn->prepare($query);
//             $stmt->execute([
//                 ':gateway' => 'EASEBUZZ_' . $this->merchantId,
//                 ':order_id' => $orderId,
//                 ':request_data' => $request,
//                 ':response_data' => $response,
//                 ':status' => $status
//             ]);
//         } catch (Exception $e) {
//             error_log("Database logging error: " . $e->getMessage());
//         }
//     }

//     /**
//      * Get configuration for debugging
//      */
//     public function getConfig() {
//         return [
//             'gateway' => 'EASEBUZZ',
//             'merchant_id' => $this->merchantId,
//             'environment' => $this->env,
//             'test_mode' => $this->isTestMode,
//             'return_url' => $this->returnUrl,
//             'initiate_url' => $this->getInitiateUrl(),
//             'gateway_url' => $this->getPaymentGatewayUrl(),
//             'api_key_configured' => !empty($this->apiKey),
//             'salt_configured' => !empty($this->salt),
//             'api_key_preview' => substr($this->apiKey, 0, 4) . '***',
//             'version' => '2.0_FINAL'
//         ];
//     }
// }

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../config');
$dotenv->load();

class EasebuzzIntegration {
    private $apiKey;
    private $salt;
    private $env;
    private $returnUrl;
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
        $this->loadConfig();
    }

    private function loadConfig() {
        // Use the standard test credentials (same as your working code)
        $this->apiKey = 'KHQEZNXWNW';
        $this->salt = 'HORAXV54UI';
        // $this->env = 'test'; // Keep as test since you're using test credentials
        $this->returnUrl = $_ENV['returnUrl'] ?? 'https://0fbb-103-165-89-10.ngrok-free.app/newWiecom/payment_response.php';
        
        error_log("EaseBuzz Config Loaded - API Key: {$this->apiKey}, Return URL: {$this->returnUrl}");
    }

    public function createPaymentRequest($orderId, $amount, $customerInfo) {
        try {
            if (!$this->validateOrderId($orderId) || !$this->validateAmount($amount)) {
                throw new Exception("Invalid order ID or amount.");
            }

            // Sanitize customer info
            $sanitizedName = preg_replace('/[^a-zA-Z0-9\s\.]/', '', $customerInfo['name'] ?? 'Customer');
            $sanitizedEmail = filter_var($customerInfo['email'] ?? 'test@test.com', FILTER_VALIDATE_EMAIL) ?: 'test@test.com';
            $sanitizedPhone = preg_replace('/\D/', '', $customerInfo['mobile'] ?? '9999999999');
            $sanitizedPhone = strlen($sanitizedPhone) >= 10 ? substr($sanitizedPhone, -10) : '9999999999';
            $postData = [
                "key" => $this->apiKey,
                "txnid" => $orderId,
                "amount" => number_format($amount, 2, '.', ''),
                "firstname" => substr($sanitizedName ?: 'Customer', 0, 50),
                "email" => $sanitizedEmail,
                "phone" => $sanitizedPhone,
                "productinfo" => "REGISTRATION", // <-- Use a plain string here
                "surl" => $this->returnUrl,
                "furl" => $this->returnUrl,
                // ... rest of fields
            
            
     
                "udf1" => "",
                "udf2" => "",
                "udf3" => "",
                "udf4" => "",
                "udf5" => "",
                "udf6" => "",
                "udf7" => "",
                "udf8" => "",
                "udf9" => "",
                "udf10" => ""
            ];

            // Generate hash (exactly like your working code)
            $hashString = $postData['key']."|".$postData['txnid']."|".$postData['amount']."|".$postData['productinfo']."|".$postData['firstname']."|".$postData['email']."|".$postData['udf1']."|".$postData['udf2']."|".$postData['udf3']."|".$postData['udf4']."|".$postData['udf5']."|".$postData['udf6']."|".$postData['udf7']."|".$postData['udf8']."|".$postData['udf9']."|".$postData['udf10']."|".$this->salt;
            
            $postData['hash'] = strtolower(hash('sha512', $hashString));

            // Log transaction
            $this->logTransaction($orderId, json_encode($postData), null, 'INITIATED');
            
            error_log("EaseBuzz Payment Request Created: OrderID={$orderId}, Amount=₹{$amount}, Hash={$postData['hash']}");
            
            // Return exactly like your working code expects
            return $postData;
            
        } catch (Exception $e) {
            error_log("Payment request creation error: " . $e->getMessage());
            throw $e;
        }
    }

    public function getPaymentUrl() {
        return $this->env === 'test'
            ? 'https://pay.easebuzz.in/payment/initiateLink'
            : 'https://pay.easebuzz.in/payment/initiateLink';
    }

    public function validateOrderId($orderId) {
        return preg_match('/^[A-Za-z0-9_-]+$/', $orderId) && strlen($orderId) <= 50;
    }

    public function validateAmount($amount) {
        return is_numeric($amount) && $amount > 0 && $amount <= 1000000;
    }

    public function logTransaction($orderId, $request, $response = null, $status = 'INITIATED') {
        try {
            // Update to use proper payment_transaction_log table
            $query = "INSERT INTO payment_transaction_log 
                      (gateway, order_id, request_data, response_data, status, created_at) 
                      VALUES (:gateway, :order_id, :request_data, :response_data, :status, NOW())";

            $stmt = $this->conn->prepare($query);
            $stmt->execute([
                ':gateway' => 'EASEBUZZ',
                ':order_id' => $orderId,
                ':request_data' => $request,
                ':response_data' => $response,
                ':status' => $status
            ]);
        } catch (Exception $e) {
            error_log("Log error: " . $e->getMessage());
        }
    }

    /**
     * Process payment response from EaseBuzz
     */
    public function processResponse($response) {
        try {
            if (empty($response) || !is_array($response)) {
                throw new Exception("Invalid payment response received");
            }

            // Extract response data
            $orderId = $response['txnid'] ?? '';
            $status = $response['status'] ?? 'FAILED';
            $amount = $response['amount'] ?? 0;
            
            // Verify hash for security
            $hashValid = $this->verifyResponseHash($response);
            if (!$hashValid) {
                error_log("Hash verification failed for Order ID: " . $orderId);
            }

            // Create standardized response
            $result = [
                'success' => strtolower($status) === 'success',
                'order_id' => $orderId,
                'amount' => floatval($amount),
                'status' => $this->standardizeStatus($status),
                'transaction_id' => $response['easebuzz_id'] ?? $response['txnref'] ?? '',
                'bank_reference' => $response['bank_ref_num'] ?? '',
                'payment_method' => $response['mode'] ?? 'UNKNOWN',
                'response_message' => $response['error_Message'] ?? $this->getStatusMessage($status),
                'customer_name' => $response['firstname'] ?? '',
                'customer_email' => $response['email'] ?? '',
                'payment_date' => date('Y-m-d H:i:s'),
                'gateway' => 'EASEBUZZ',
                'hash_verified' => $hashValid,
                'raw_response' => json_encode($response)
            ];

            // Log transaction response
            $this->logTransaction($orderId, null, json_encode($response), $result['status']);

            error_log("EaseBuzz Payment Response: OrderID={$orderId}, Status={$result['status']}, Amount=₹{$result['amount']}");

            return $result;

        } catch (Exception $e) {
            error_log("EaseBuzz Response Processing Error: " . $e->getMessage());
            
            return [
                'success' => false,
                'order_id' => $response['txnid'] ?? 'UNKNOWN',
                'amount' => floatval($response['amount'] ?? 0),
                'status' => 'FAILED',
                'transaction_id' => '',
                'response_message' => 'Response processing failed: ' . $e->getMessage(),
                'gateway' => 'EASEBUZZ',
                'raw_response' => json_encode($response)
            ];
        }
    }

    /**
     * Verify response hash for security
     */
    private function verifyResponseHash($response) {
        $receivedHash = $response['hash'] ?? '';
        
        if (empty($receivedHash)) {
            return false;
        }

        // Reconstruct hash sequence for response verification
        $hashSequence = implode('|', [
            $this->salt,
            $response['status'] ?? '',
            $response['udf10'] ?? '',
            $response['udf9'] ?? '',
            $response['udf8'] ?? '',
            $response['udf7'] ?? '',
            $response['udf6'] ?? '',
            $response['udf5'] ?? '',
            $response['udf4'] ?? '',
            $response['udf3'] ?? '',
            $response['udf2'] ?? '',
            $response['udf1'] ?? '',
            $response['email'] ?? '',
            $response['firstname'] ?? '',
            $response['productinfo'] ?? '',
            $response['amount'] ?? '',
            $response['txnid'] ?? '',
            $this->apiKey
        ]);

        $expectedHash = strtolower(hash('sha512', $hashSequence));
        
        return hash_equals($expectedHash, strtolower($receivedHash));
    }

    /**
     * Standardize payment status
     */
    private function standardizeStatus($status) {
        switch (strtolower($status)) {
            case 'success': return 'SUCCESS';
            case 'failure':
            case 'failed': return 'FAILED';
            case 'pending': return 'PENDING';
            case 'cancelled': return 'CANCELLED';
            default: return 'FAILED';
        }
    }

    /**
     * Get status message
     */
    private function getStatusMessage($status) {
        switch (strtolower($status)) {
            case 'success': return 'Payment completed successfully';
            case 'failure':
            case 'failed': return 'Payment failed';
            case 'pending': return 'Payment is pending';
            case 'cancelled': return 'Payment cancelled by user';
            default: return 'Payment status unknown';
        }
    }
}

?>

