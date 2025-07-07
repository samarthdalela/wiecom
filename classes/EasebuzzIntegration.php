<?php
require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../config');
$dotenv->load();

class EasebuzzIntegration {
    private $apiKey;
    private $salt;
    private $env; // 'test' or 'prod'
    private $returnUrl;
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
        $this->loadConfig();
    }


        private function loadConfig() {
            // 🔒 Hardcoded Easebuzz test credentials
            $this->apiKey = '9H1XnB3h';
            $this->salt = '1LtMJ5HZrG';
            $this->env = 'test';
            $this->returnUrl = 'https://0fbb-103-165-89-10.ngrok-free.app/newWiecom/payment_response.php';
        }
        
    

    public function createPaymentRequest($orderId, $amount, $customerInfo) {
        try {
            if (!$this->validateOrderId($orderId) || !$this->validateAmount($amount)) {
                throw new Exception("Invalid order ID or amount.");
            }

            $postData = [
                "key"         => $this->apiKey,
                "txnid"       => $orderId,
                "amount"      => number_format($amount, 2, '.', ''),
                "firstname"   => $customerInfo['name'] ?? 'Customer',
                "email"       => $customerInfo['email'] ?? 'test@easebuzz.in',
                "phone"       => $customerInfo['mobile'] ?? '9999999999',
                "productinfo" => "REGISTRATION",
                "surl"        => $this->returnUrl,
                "furl"        => $this->returnUrl,
            ];

            // Generate hash string (SHA-512 with 13 empty fields between email and salt)
            $hashString = implode('|', [
                $postData['key'],
                $postData['txnid'],
                $postData['amount'],
                $postData['productinfo'],
                $postData['firstname'],
                $postData['email'],
                '', '', '', '', '', '', '', '', '', // 13 empty UDF fields
                $this->salt
            ]);
            $postData['hash'] = strtolower(hash('sha512', $hashString));

            $this->logTransaction($orderId, json_encode($postData), null, 'INITIATED');
            return $postData;

        } catch (Exception $e) {
            error_log("Easebuzz createPaymentRequest error: " . $e->getMessage());
            throw $e;
        }
    }

    public function getPaymentUrl() {
        return $this->env === 'test'
            ? 'https://testpay.easebuzz.in/payment/initiateLink'  
            : 'https://pay.easebuzz.in/payment/initiateLink';     // ✅ Correct!
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
            error_log("Easebuzz logTransaction error: " . $e->getMessage());
        }
    }
}

// require_once __DIR__ . '/../vendor/autoload.php';

// $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../config');
// $dotenv->load();

// class EasebuzzIntegration {
//     private $apiKey;
//     private $salt;
//     private $env; // 'test' or 'prod'
//     private $returnUrl;
//     private $conn;
//     public function __construct($db) {
//         $this->conn = $db;
//         $this->loadConfig();
//     }

//     private function loadConfig() {
//         $this->apiKey = $_ENV['EASEBUZZ_API_KEY'] ?? 'YOUR_TEST_API_KEY';
//         $this->salt = $_ENV['EASEBUZZ_SALT'] ?? 'YOUR_TEST_SALT';
//         $this->env = $_ENV['EASEBUZZ_ENV'] ?? 'test';
//         $this->returnUrl = $_ENV['returnUrl'] ?? 'https://yourdomain.com/payment_response.php';
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
//                 // Add udf fields if required
//             ];

//             // Hash string as per Easebuzz docs
//             $hashString = $postData['key']."|".$postData['txnid']."|".$postData['amount']."|".$postData['productinfo']."|".$postData['firstname']."|".$postData['email']."|||||||||||".$this->salt;
//             $postData['hash'] = strtolower(hash('sha512', $hashString));

//             $this->logTransaction($orderId, json_encode($postData), null, 'INITIATED');
//             return $postData;
//         } catch (Exception $e) {
//             error_log("Payment request creation error: " . $e->getMessage());
//             throw $e;
//         }
//     }

//     public function processResponse($response) {
//         if (empty($response)) {
//             throw new Exception("Empty response");
//         }

//         $status = $response['status'] ?? 'FAILED';
//         $hash = $response['hash'] ?? '';
//         $orderId = $response['txnid'] ?? '';
//         $amount = $response['amount'] ?? 0;
//         $productinfo = $response['productinfo'] ?? '';
//         $firstname = $response['firstname'] ?? '';
//         $email = $response['email'] ?? '';

//         // Reconstruct hash for verification (reverse order for response)
//         $hashSequence = $this->salt."|".$status."|||||||||||".$email."|".$firstname."|".$productinfo."|".$amount."|".$orderId."|".$this->apiKey;
//         $expectedHash = strtolower(hash('sha512', $hashSequence));

//         if ($hash !== $expectedHash) {
//             throw new Exception("Hash verification failed");
//         }

//         $result = [
//             'order_id' => $orderId,
//             'amount' => floatval($amount),
//             'status' => $status,
//             'response_message' => $response['error_Message'] ?? '',
//             'txn_id' => $response['easebuzz_id'] ?? '',
//             'customer_name' => $firstname,
//             'customer_email' => $email,
//             'raw_response' => json_encode($response)
//         ];

//         $this->logTransaction($orderId, null, json_encode($response), $status);
//         return $result;
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

//     public function getConfig() {
//         return [
//             'api_key' => $this->apiKey,
//             'salt' => $this->salt,
//             'return_url' => $this->returnUrl,
//             'gateway_url' => $this->getPaymentUrl(),
//             'environment' => $this->env
//         ];
//     }

//     public function debugResponse($response) {
//         error_log("=== EASEBUZZ DEBUG RESPONSE ===");
//         foreach ($response as $key => $value) {
//             error_log("Field [$key]: $value");
//         }
//         error_log("=== END DEBUG ===");
//     }
// }