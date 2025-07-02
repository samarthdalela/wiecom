<?php
// classes/BillDeskIntegration.php
class BillDeskIntegration {
    private $merchantId;
    private $securityId;
    private $checksumKey;
    private $returnUrl;
    private $conn;
    
    public function __construct($db) {
        $this->conn = $db;
        $this->loadConfig();
    }
    
    private function loadConfig() {
        try {
            $query = "SELECT * FROM billdesk_config WHERE is_active = 1 LIMIT 1";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            $config = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($config) {
                $this->merchantId = $config['merchant_id'];
                $this->securityId = $config['security_id'];
                $this->checksumKey = $config['checksum_key'];
                $this->returnUrl = $config['return_url'];
            } else {
                // Default configuration for testing
                $this->merchantId = 'TESTMERCHANT';
                $this->securityId = 'TESTSECURITY';
                $this->checksumKey = 'TEST_CHECKSUM_KEY';
                $this->returnUrl = 'http://localhost/upwiecomphp/payment_response.php';
            }
        } catch (Exception $e) {
            // Fallback configuration
            $this->merchantId = 'TESTMERCHANT';
            $this->securityId = 'TESTSECURITY';
            $this->checksumKey = 'TEST_CHECKSUM_KEY';
            $this->returnUrl = 'http://localhost/upwiecomphp/payment_response.php';
        }
    }
    
    public function generateChecksum($data) {
        return strtoupper(hash_hmac('sha256', $data, $this->checksumKey));
    }
    
    public function verifyChecksum($response, $checksum) {
        $generatedChecksum = $this->generateChecksum($response);
        return hash_equals($generatedChecksum, $checksum);
    }
    
    public function createPaymentRequest($orderId, $amount, $customerInfo) {
        // BillDesk payment request format
        $data = array(
            $this->merchantId,                           // Merchant ID
            $orderId,                                    // Order ID
            number_format($amount, 2, '.', ''),          // Amount
            '356',                                       // Currency (INR)
            $this->returnUrl,                            // Return URL
            $customerInfo['name'],                       // Customer Name
            $customerInfo['email'],                      // Customer Email
            $customerInfo['mobile'],                     // Customer Mobile
            'NA',                                        // Additional Info 1
            'NA',                                        // Additional Info 2
            'NA',                                        // Additional Info 3
            'NA',                                        // Additional Info 4
            'NA',                                        // Additional Info 5
            date('Y-m-d H:i:s'),                        // Transaction Date
            $this->securityId                           // Security ID
        );
        
        // Create pipe-separated string
        $requestString = implode('|', $data);
        
        // Generate checksum
        $checksum = $this->generateChecksum($requestString);
        
        // Add checksum to request
        $finalRequest = $requestString . '|' . $checksum;
        
        return $finalRequest;
    }
    
    public function processResponse($response) {
        if (empty($response)) {
            throw new Exception("Invalid payment response - empty response received");
        }
        
        // Split response by pipe
        $responseArray = explode('|', $response);
        
        if (count($responseArray) < 15) {
            throw new Exception("Invalid response format - insufficient parameters");
        }
        
        // Extract response parameters
        $merchantId = $responseArray[0];
        $orderId = $responseArray[1];
        $amount = $responseArray[2];
        $txnId = $responseArray[3];
        $bankTxnId = $responseArray[4];
        $status = $responseArray[5];
        $responseCode = $responseArray[6];
        $responseMessage = $responseArray[7];
        $txnDate = $responseArray[8];
        $additionalInfo1 = $responseArray[9];
        $additionalInfo2 = $responseArray[10];
        $additionalInfo3 = $responseArray[11];
        $additionalInfo4 = $responseArray[12];
        $additionalInfo5 = $responseArray[13];
        $securityId = $responseArray[14];
        $checksum = $responseArray[15];
        
        // Verify merchant ID
        if ($merchantId !== $this->merchantId) {
            throw new Exception("Merchant ID mismatch");
        }
        
        // Verify checksum
        $responseWithoutChecksum = implode('|', array_slice($responseArray, 0, 15));
        
        if (!$this->verifyChecksum($responseWithoutChecksum, $checksum)) {
            throw new Exception("Checksum verification failed");
        }
        
        // Determine payment status
        $paymentStatus = 'FAILED';
        switch ($status) {
            case '0300':
                $paymentStatus = 'SUCCESS';
                break;
            case '0399':
                $paymentStatus = 'PENDING';
                break;
            case '0002':
                $paymentStatus = 'CANCELLED';
                break;
            default:
                $paymentStatus = 'FAILED';
                break;
        }
        
        return [
            'merchant_id' => $merchantId,
            'order_id' => $orderId,
            'amount' => floatval($amount),
            'txn_id' => $txnId,
            'bank_txn_id' => $bankTxnId,
            'status' => $paymentStatus,
            'response_code' => $responseCode,
            'response_message' => $responseMessage,
            'txn_date' => $txnDate,
            'additional_info1' => $additionalInfo1,
            'additional_info2' => $additionalInfo2,
            'additional_info3' => $additionalInfo3,
            'raw_response' => $response
        ];
    }
    
    public function getPaymentUrl($testMode = true) {
        if ($testMode) {
            return 'https://pgi.billdesk.com/pgidsk/PGIMerchantPayment';
        } else {
            return 'https://www.billdesk.com/pgidsk/PGIMerchantPayment';
        }
    }
    
    public function validateOrderId($orderId) {
        // Basic validation for order ID format
        return preg_match('/^[A-Za-z0-9_-]+$/', $orderId) && strlen($orderId) <= 50;
    }
    
    public function validateAmount($amount) {
        return is_numeric($amount) && $amount > 0 && $amount <= 1000000; // Max 10 lakhs
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
            // Log to file if database logging fails
            error_log("BillDesk Log Error: " . $e->getMessage());
        }
    }
    
    public function getConfig() {
        return [
            'merchant_id' => $this->merchantId,
            'security_id' => $this->securityId,
            'return_url' => $this->returnUrl
        ];
    }
}
?>