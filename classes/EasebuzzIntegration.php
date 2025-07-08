<?php
// classes/EasebuzzIntegration.php - Debug Version with Enhanced Logging

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
        // Production credentials
        $this->apiKey = 'KHQEZNXWNW';
        $this->salt = 'HORAXV54UI';
        $this->env = 'production';
        
        // Production return URL - Update this to your actual domain
        $this->returnUrl = 'https://d592-2401-4900-820b-e56e-3cb7-8bcd-7139-e97b.ngrok-free.app/abc/payment_response.php';
        
        error_log("EaseBuzz Production Config Loaded - API Key: {$this->apiKey}");
    }

    /**
     * Create payment request and get session token from EaseBuzz
     */
    public function createPaymentRequest($orderId, $amount, $customerInfo) {
        try {
            error_log("=== STARTING PAYMENT REQUEST CREATION ===");
            error_log("Order ID: " . $orderId);
            error_log("Amount: " . $amount);
            error_log("Customer Info: " . json_encode($customerInfo));

            if (!$this->validateOrderId($orderId) || !$this->validateAmount($amount)) {
                throw new Exception("Invalid order ID or amount.");
            }

            // Sanitize customer info for production
            $sanitizedName = $this->sanitizeName($customerInfo['name'] ?? 'Customer');
            $sanitizedEmail = $this->sanitizeEmail($customerInfo['email'] ?? '');
            $sanitizedPhone = $this->sanitizePhone($customerInfo['mobile'] ?? '');
            
            error_log("Sanitized Name: " . $sanitizedName);
            error_log("Sanitized Email: " . $sanitizedEmail);
            error_log("Sanitized Phone: " . $sanitizedPhone);
            
            $postData = [
                "key" => $this->apiKey,
                "txnid" => $orderId,
                "amount" => number_format($amount, 2, '.', ''),
                "firstname" => $sanitizedName,
                "email" => $sanitizedEmail,
                "phone" => $sanitizedPhone,
                "productinfo" => "UPWIECON2025 Registration",
                "surl" => $this->returnUrl,
                "furl" => $this->returnUrl,
                "udf1" => "UPWIECON2025",
                "udf2" => "CONFERENCE",
                "udf3" => date('Y-m-d'),
                "udf4" => "",
                "udf5" => "",
                "udf6" => "",
                "udf7" => "",
                "udf8" => "",
                "udf9" => "",
                "udf10" => ""
            ];

            error_log("POST DATA PREPARED: " . json_encode($postData));

            // Generate hash for production
            $hashString = $postData['key']."|".$postData['txnid']."|".$postData['amount']."|".$postData['productinfo']."|".$postData['firstname']."|".$postData['email']."|".$postData['udf1']."|".$postData['udf2']."|".$postData['udf3']."|".$postData['udf4']."|".$postData['udf5']."|".$postData['udf6']."|".$postData['udf7']."|".$postData['udf8']."|".$postData['udf9']."|".$postData['udf10']."|".$this->salt;
            
            error_log("HASH STRING: " . $hashString);
            
            $postData['hash'] = strtolower(hash('sha512', $hashString));
            
            error_log("GENERATED HASH: " . $postData['hash']);

            // Call EaseBuzz API to get session token
            error_log("=== CALLING EASEBUZZ API ===");
            $apiResponse = $this->callEaseBuzzAPI($postData);

            error_log("API RESPONSE RECEIVED: " . json_encode($apiResponse));

            if ($apiResponse['success']) {
                // Log successful session creation
                $this->logTransaction($orderId, json_encode($postData), json_encode($apiResponse), 'SESSION_CREATED');
                
                error_log("✅ EaseBuzz Session Token Created Successfully");
                error_log("Order ID: " . $orderId);
                error_log("Session Token: " . $apiResponse['session_token']);
                
                $paymentUrl = $this->getPaymentPageUrl() . $apiResponse['session_token'];
                error_log("Generated Payment URL: " . $paymentUrl);
                
                // Test the payment URL accessibility
                $urlTest = $this->testPaymentURL($paymentUrl);
                error_log("Payment URL Test Result: " . json_encode($urlTest));
                
                // Return multiple options for payment
                return [
                    'success' => true,
                    'session_token' => $apiResponse['session_token'],
                    'payment_url' => $paymentUrl,
                    'alternative_url' => $this->getAlternativePaymentUrl($apiResponse['session_token']),
                    'form_method' => 'GET',
                    'redirect_url' => $paymentUrl,
                    'url_test_result' => $urlTest,
                    'debug_info' => [
                        'api_key' => substr($this->apiKey, 0, 4) . '***',
                        'order_id' => $orderId,
                        'amount' => $amount,
                        'hash_generated' => true,
                        'api_call_success' => true,
                        'session_token_length' => strlen($apiResponse['session_token'])
                    ]
                ];
            } else {
                error_log("❌ EaseBuzz API Error: " . $apiResponse['error']);
                throw new Exception("EaseBuzz API Error: " . $apiResponse['error']);
            }
            
        } catch (Exception $e) {
            error_log("💥 Production Payment Request Error: " . $e->getMessage());
            error_log("Stack Trace: " . $e->getTraceAsString());
            throw $e;
        }
    }

    /**
     * Test if payment URL is accessible
     */
    private function testPaymentURL($url) {
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_NOBODY => true, // HEAD request only
            CURLOPT_TIMEOUT => 10,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_USERAGENT => 'UPWIECON2025-URLTest/1.0'
        ]);

        $response = curl_exec($curl);
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $error = curl_error($curl);
        curl_close($curl);

        return [
            'url' => $url,
            'http_code' => $httpCode,
            'accessible' => ($httpCode === 200),
            'error' => $error,
            'test_time' => date('Y-m-d H:i:s')
        ];
    }

    /**
     * Get alternative payment URL formats
     */
    private function getAlternativePaymentUrl($sessionToken) {
        $alternatives = [
            'direct' => 'https://pay.easebuzz.in/payment/page/' . $sessionToken,
            'with_slash' => 'https://pay.easebuzz.in/payment/page/' . $sessionToken . '/',
            'query_param' => 'https://pay.easebuzz.in/payment/page?token=' . $sessionToken,
            'access_key' => 'https://pay.easebuzz.in/payment/page?access_key=' . $sessionToken
        ];
        
        error_log("Alternative Payment URLs: " . json_encode($alternatives));
        return $alternatives;
    }

    /**
     * Call EaseBuzz API to get session token
     */
    private function callEaseBuzzAPI($postData) {
        $apiUrl = $this->getInitiateUrl();
        
        error_log("📡 Making API Call to: " . $apiUrl);
        error_log("📦 POST Data: " . json_encode($postData));
        
        // Initialize cURL
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => $apiUrl,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => http_build_query($postData),
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/x-www-form-urlencoded',
                'User-Agent: UPWIECON2025-System/1.0'
            ],
            CURLOPT_SSL_VERIFYPEER => true,
            CURLOPT_SSL_VERIFYHOST => 2,
            CURLOPT_VERBOSE => true
        ]);

        $response = curl_exec($curl);
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $curlError = curl_error($curl);
        $curlInfo = curl_getinfo($curl);
        curl_close($curl);

        // Detailed logging
        error_log("🔍 cURL Info: " . json_encode($curlInfo));
        error_log("📡 HTTP Code: " . $httpCode);
        error_log("📝 Response Length: " . strlen($response));
        error_log("📄 Raw Response: " . $response);

        if ($curlError) {
            error_log("❌ cURL Error: " . $curlError);
            return [
                'success' => false,
                'error' => "Network Error: {$curlError}"
            ];
        }

        if ($httpCode !== 200) {
            error_log("❌ HTTP Error: " . $httpCode);
            return [
                'success' => false,
                'error' => "HTTP Error {$httpCode}: Invalid response from payment gateway"
            ];
        }

        // Parse JSON response
        $decodedResponse = json_decode($response, true);
        
        if (json_last_error() !== JSON_ERROR_NONE) {
            error_log("❌ JSON Parse Error: " . json_last_error_msg());
            return [
                'success' => false,
                'error' => "Invalid JSON response from payment gateway"
            ];
        }

        error_log("✅ Decoded Response: " . json_encode($decodedResponse));

        // Check EaseBuzz response format
        if (isset($decodedResponse['status']) && $decodedResponse['status'] == 1) {
            error_log("🎉 SUCCESS! Session token received: " . $decodedResponse['data']);
            return [
                'success' => true,
                'session_token' => $decodedResponse['data'],
                'raw_response' => $response
            ];
        } else {
            $errorMsg = $decodedResponse['error_desc'] ?? 'Unknown payment gateway error';
            error_log("❌ API Error: " . $errorMsg);
            return [
                'success' => false,
                'error' => $errorMsg,
                'raw_response' => $response
            ];
        }
    }

    /**
     * Get EaseBuzz initiate API URL (for session token creation)
     */
    private function getInitiateUrl() {
        return 'https://pay.easebuzz.in/payment/initiateLink';
    }

    /**
     * Get payment page URL (where user goes with session token)
     */
    public function getPaymentPageUrl() {
        return 'https://pay.easebuzz.in/pay/';
    }

    /**
     * Create direct payment form as fallback
     */
    public function createDirectPaymentForm($orderId, $amount, $customerInfo) {
        error_log("=== CREATING DIRECT PAYMENT FORM ===");
        
        // Instead of getting session token, create direct form data
        $sanitizedName = $this->sanitizeName($customerInfo['name'] ?? 'Customer');
        $sanitizedEmail = $this->sanitizeEmail($customerInfo['email'] ?? '');
        $sanitizedPhone = $this->sanitizePhone($customerInfo['mobile'] ?? '');
        
        $formData = [
            "key" => $this->apiKey,
            "txnid" => $orderId,
            "amount" => number_format($amount, 2, '.', ''),
            "firstname" => $sanitizedName,
            "email" => $sanitizedEmail,
            "phone" => $sanitizedPhone,
            "productinfo" => "UPWIECON2025 Registration",
            "surl" => $this->returnUrl,
            "furl" => $this->returnUrl,
            "udf1" => "UPWIECON2025",
            "udf2" => "CONFERENCE",
            "udf3" => date('Y-m-d'),
            "udf4" => "",
            "udf5" => "",
            "udf6" => "",
            "udf7" => "",
            "udf8" => "",
            "udf9" => "",
            "udf10" => ""
        ];

        // Generate hash
        $hashString = $formData['key']."|".$formData['txnid']."|".$formData['amount']."|".$formData['productinfo']."|".$formData['firstname']."|".$formData['email']."|".$formData['udf1']."|".$formData['udf2']."|".$formData['udf3']."|".$formData['udf4']."|".$formData['udf5']."|".$formData['udf6']."|".$formData['udf7']."|".$formData['udf8']."|".$formData['udf9']."|".$formData['udf10']."|".$this->salt;
        
        $formData['hash'] = strtolower(hash('sha512', $hashString));

        error_log("📋 Direct Form Data: " . json_encode($formData));

        return [
            'success' => true,
            'form_method' => 'POST',
            'form_action' => 'https://pay.easebuzz.in/pay/initiateLink',
            'form_data' => $formData,
            'debug_info' => [
                'form_fields_count' => count($formData),
                'hash_length' => strlen($formData['hash']),
                'order_id' => $orderId
            ]
        ];
    }

    // Rest of the methods remain the same...
    public function processResponse($response) {
        error_log("=== PROCESSING PAYMENT RESPONSE ===");
        error_log("Raw Response: " . json_encode($response));
        
        try {
            if (empty($response) || !is_array($response)) {
                throw new Exception("Invalid payment response received");
            }

            // Extract response data
            $orderId = $response['txnid'] ?? '';
            $status = $response['status'] ?? 'FAILED';
            $amount = $response['amount'] ?? 0;
            
            error_log("Extracted - Order ID: $orderId, Status: $status, Amount: $amount");
            
            // Verify hash for security
            $hashValid = $this->verifyResponseHash($response);
            error_log("Hash Verification: " . ($hashValid ? 'VALID' : 'INVALID'));

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
                'gateway' => 'EASEBUZZ_PRODUCTION',
                'hash_verified' => $hashValid,
                'raw_response' => json_encode($response)
            ];

            // Log transaction response
            $this->logTransaction($orderId, null, json_encode($response), $result['status']);

            error_log("✅ Payment Response Processed Successfully");
            error_log("Final Result: " . json_encode($result));

            return $result;

        } catch (Exception $e) {
            error_log("💥 Payment Response Processing Error: " . $e->getMessage());
            
            return [
                'success' => false,
                'order_id' => $response['txnid'] ?? 'UNKNOWN',
                'amount' => floatval($response['amount'] ?? 0),
                'status' => 'FAILED',
                'transaction_id' => '',
                'response_message' => 'Response processing failed: ' . $e->getMessage(),
                'gateway' => 'EASEBUZZ_PRODUCTION',
                'raw_response' => json_encode($response)
            ];
        }
    }

    private function verifyResponseHash($response) {
        $receivedHash = $response['hash'] ?? '';
        
        if (empty($receivedHash)) {
            error_log("❌ No hash found in response");
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
        
        error_log("Hash Verification Details:");
        error_log("Received Hash: " . $receivedHash);
        error_log("Expected Hash: " . $expectedHash);
        error_log("Hash String: " . $hashSequence);
        
        $isValid = hash_equals($expectedHash, strtolower($receivedHash));
        error_log("Hash Match: " . ($isValid ? 'YES' : 'NO'));
        
        return $isValid;
    }

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

    private function getStatusMessage($status) {
        switch (strtolower($status)) {
            case 'success': return 'Payment completed successfully';
            case 'failure':
            case 'failed': return 'Payment failed. Please try again.';
            case 'pending': return 'Payment is being processed';
            case 'cancelled': return 'Payment cancelled by user';
            default: return 'Payment could not be completed';
        }
    }

    // Sanitization methods
    private function sanitizeName($name) {
        $sanitized = preg_replace('/[^a-zA-Z0-9\s\.]/', '', trim($name));
        $sanitized = substr($sanitized, 0, 50);
        return strlen($sanitized) >= 2 ? $sanitized : 'Conference Participant';
    }

    private function sanitizeEmail($email) {
        $sanitized = filter_var(trim($email), FILTER_VALIDATE_EMAIL);
        if (!$sanitized) {
            throw new Exception("Valid email address is required for payment processing");
        }
        return $sanitized;
    }

    private function sanitizePhone($phone) {
        $sanitized = preg_replace('/\D/', '', $phone);
        $sanitized = strlen($sanitized) >= 10 ? substr($sanitized, -10) : '';
        if (strlen($sanitized) !== 10) {
            throw new Exception("Valid 10-digit mobile number is required for payment processing");
        }
        return $sanitized;
    }

    public function validateOrderId($orderId) {
        $isValid = preg_match('/^[A-Za-z0-9_-]+$/', $orderId) && strlen($orderId) <= 50 && strlen($orderId) >= 5;
        error_log("Order ID Validation: $orderId -> " . ($isValid ? 'VALID' : 'INVALID'));
        return $isValid;
    }

    public function validateAmount($amount) {
        $isValid = is_numeric($amount) && $amount >= 1 && $amount <= 1000000;
        error_log("Amount Validation: $amount -> " . ($isValid ? 'VALID' : 'INVALID'));
        return $isValid;
    }

    // public function logTransaction($orderId, $request, $response = null, $status = 'INITIATED') {
    //     try {
    //         error_log("📝 Logging Transaction: OrderID=$orderId, Status=$status");
            
    //         $query = "INSERT INTO payment_transaction_log 
    //                   (gateway, order_id, request_data, response_data, status, created_at) 
    //                   VALUES (:gateway, :order_id, :request_data, :response_data, :status, NOW())";

    //         $stmt = $this->conn->prepare($query);
    //         $result = $stmt->execute([
    //             ':gateway' => 'EASEBUZZ_PRODUCTION',
    //             ':order_id' => $orderId,
    //             ':request_data' => $request,
    //             ':response_data' => $response,
    //             ':status' => $status
    //         ]);
            
    //         error_log("Transaction Log Result: " . ($result ? 'SUCCESS' : 'FAILED'));
            
    //     } catch (Exception $e) {
    //         error_log("💥 Transaction Log Error: " . $e->getMessage());
    //     }
    // }
public function logTransaction($orderId, $request, $response = null, $status = 'INITIATED') {
    try {
        // Ensure consistent timezone
        date_default_timezone_set('Asia/Kolkata');
        
        $currentTime = date('Y-m-d H:i:s');
        error_log("📝 Logging Transaction: OrderID=$orderId, Status=$status, Time=$currentTime");
        
        $query = "INSERT INTO payment_transaction_log 
                  (gateway, order_id, request_data, response_data, status, created_at) 
                  VALUES (:gateway, :order_id, :request_data, :response_data, :status, :created_at)";

        $stmt = $this->conn->prepare($query);
        $result = $stmt->execute([
            ':gateway' => 'EASEBUZZ_PRODUCTION',
            ':order_id' => $orderId,
            ':request_data' => $request,
            ':response_data' => $response,
            ':status' => $status,
            ':created_at' => $currentTime  // Use PHP time instead of MySQL NOW()
        ]);
        
        if ($result) {
            error_log("✅ Transaction Log SUCCESS: Inserted at $currentTime");
            
            // Get the inserted ID for reference
            $insertedId = $this->conn->lastInsertId();
            error_log("📄 Transaction Log ID: $insertedId");
        } else {
            error_log("❌ Transaction Log FAILED: Database insertion failed");
            
            // Log PDO error info for debugging
            $errorInfo = $stmt->errorInfo();
            if ($errorInfo[0] !== '00000') {
                error_log("💥 PDO Error: " . json_encode($errorInfo));
            }
        }
        
        return $result;
        
    } catch (Exception $e) {
        error_log("💥 Transaction Log Error: " . $e->getMessage());
        error_log("📍 Error Details: File=" . $e->getFile() . ", Line=" . $e->getLine());
        
        // Return false to indicate failure
        return false;
    } catch (PDOException $e) {
        error_log("💥 Database Error in Transaction Log: " . $e->getMessage());
        error_log("📊 Error Code: " . $e->getCode());
        
        return false;
    }
}
    // Production configuration check
    public function getProductionStatus() {
        return [
            'environment' => 'PRODUCTION',
            'gateway' => 'EASEBUZZ',
            'api_key' => substr($this->apiKey, 0, 4) . '***',
            'return_url' => $this->returnUrl,
            'initiate_url' => $this->getInitiateUrl(),
            'payment_page_url' => $this->getPaymentPageUrl(),
            'status' => 'ACTIVE'
        ];
    }
}
?>