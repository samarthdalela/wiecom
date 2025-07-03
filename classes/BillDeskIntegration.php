<?php
// classes/BillDeskIntegration.php - Production Ready with Administrator Option
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
        // ✅ NIELIT Production Credentials
        $this->merchantId = 'NIELIT';
        $this->securityId = 'nielit';
        $this->checksumKey = 'WYZZHkyZuU9K';
        
        // ✅ Production Return URL
        $this->returnUrl = 'https://www.nielit.ac.in/upwiecon2025/payment_response.php';
        
        error_log("BillDesk Production Config Loaded: MerchantID={$this->merchantId}");
    }
    
    public function createPaymentRequest($orderId, $amount, $customerInfo) {
        // ✅ Using proven working 22-field format
        
        $customerID = $orderId;
        $filler1 = "NA";
        $bankID = "NA";
        $txnAmount = number_format($amount, 2, '.', '');
        $filler2 = "NA";
        $filler3 = "NA";
        $currencyType = "INR";
        $itemCode = "NA";
        $typeField1 = "R";
        $filler4 = "NA";
        $filler5 = "NA";
        $typeField2 = "F";
        
        // Additional fields
        $additionalField1 = $customerInfo['mobile'];
        $additionalField2 = "UPWIECON2025";
        $additionalField3 = $customerInfo['name'];
        $additionalField4 = "REGISTRATION";
        $additionalField5 = $customerInfo['email'];
        $additionalField6 = "NA";
        $additionalField7 = "NA";
        $typeField3 = $this->returnUrl;
        
        // Construct string with 22 fields
        $str = $this->merchantId . "|" . 
               $customerID . "|" . 
               $filler1 . "|" . 
               $txnAmount . "|" . 
               $bankID . "|" . 
               $filler2 . "|" . 
               $filler3 . "|" . 
               $currencyType . "|" . 
               $itemCode . "|" . 
               $typeField1 . "|" . 
               $this->securityId . "|" . 
               $filler4 . "|" . 
               $filler5 . "|" . 
               $typeField2 . "|" . 
               $additionalField1 . "|" . 
               $additionalField2 . "|" . 
               $additionalField3 . "|" . 
               $additionalField4 . "|" . 
               $additionalField5 . "|" . 
               $additionalField6 . "|" . 
               $additionalField7 . "|" . 
               $typeField3;
        
        // Generate checksum using working method
        $checksum = hash('sha256', $str . "|" . $this->checksumKey, false);
        $checksum = strtoupper($checksum);
        
        // Final message
        $msg = $str . '|' . $checksum;
        
        // Log for production monitoring
        error_log("BillDesk Payment Request Created - Order: $orderId, Amount: $txnAmount");
        
        return $msg;
    }
    
    public function getPaymentUrl() {
        // ✅ Production BillDesk URL
        return 'https://www.billdesk.com/pgidsk/PGIMerchantPayment';
    }
    
    public function processResponse($response) {
        if (empty($response)) {
            throw new Exception("Invalid payment response - empty response received");
        }
        
        error_log("Processing BillDesk response for production");
        
        $responseArray = explode('|', $response);
        
        if (count($responseArray) < 23) {
            throw new Exception("Invalid response format - got " . count($responseArray) . " fields, expected 23");
        }
        
        // Extract response parameters
        $merchantId = $responseArray[0];
        $customerID = $responseArray[1];
        $filler1 = $responseArray[2];
        $txnAmount = $responseArray[3];
        $bankID = $responseArray[4];
        $status = $responseArray[5];
        $filler3 = $responseArray[6];
        $currencyType = $responseArray[7];
        $itemCode = $responseArray[8];
        $typeField1 = $responseArray[9];
        $securityId = $responseArray[10];
        $txnId = $responseArray[11];
        $bankTxnId = $responseArray[12];
        $typeField2 = $responseArray[13];
        $additionalField1 = $responseArray[14]; // Mobile
        $additionalField2 = $responseArray[15]; // Conference ID
        $additionalField3 = $responseArray[16]; // Name
        $additionalField4 = $responseArray[17]; // Registration
        $additionalField5 = $responseArray[18]; // Email
        $additionalField6 = $responseArray[19];
        $additionalField7 = $responseArray[20];
        $returnUrl = $responseArray[21];
        $checksum = $responseArray[22];
        
        // Verify merchant credentials
        if ($merchantId !== $this->merchantId) {
            throw new Exception("Merchant ID mismatch");
        }
        
        if ($securityId !== $this->securityId) {
            throw new Exception("Security ID mismatch");
        }
        
        // Verify checksum
        $responseWithoutChecksum = implode('|', array_slice($responseArray, 0, 22));
        $expectedChecksum = hash('sha256', $responseWithoutChecksum . "|" . $this->checksumKey, false);
        $expectedChecksum = strtoupper($expectedChecksum);
        
        if (!hash_equals($expectedChecksum, $checksum)) {
            throw new Exception("Checksum verification failed");
        }
        
        // Determine payment status
        $paymentStatus = 'FAILED';
        $responseMessage = 'Transaction processed';
        
        switch ($status) {
            case '0300':
            case 'SUCCESS':
                $paymentStatus = 'SUCCESS';
                $responseMessage = 'Transaction successful';
                break;
            case '0399':
            case 'PENDING':
                $paymentStatus = 'PENDING';
                $responseMessage = 'Transaction pending';
                break;
            case '0002':
            case '0400':
            case 'CANCELLED':
                $paymentStatus = 'CANCELLED';
                $responseMessage = 'Transaction cancelled';
                break;
            default:
                $paymentStatus = 'FAILED';
                $responseMessage = 'Transaction failed';
                break;
        }
        
        return [
            'merchant_id' => $merchantId,
            'order_id' => $customerID,
            'amount' => floatval($txnAmount),
            'txn_id' => $txnId ?: 'NO_TXN_ID',
            'bank_txn_id' => $bankTxnId ?: 'NO_BANK_ID',
            'status' => $paymentStatus,
            'response_code' => $status,
            'response_message' => $responseMessage,
            'txn_date' => date('Y-m-d H:i:s'),
            'customer_mobile' => $additionalField1,
            'customer_name' => $additionalField3,
            'customer_email' => $additionalField5,
            'raw_response' => $response
        ];
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
            error_log("Failed to log transaction: " . $e->getMessage());
        }
    }
    
    public function getConfig() {
        return [
            'merchant_id' => $this->merchantId,
            'security_id' => $this->securityId,
            'return_url' => $this->returnUrl,
            'gateway_url' => $this->getPaymentUrl(),
            'environment' => 'PRODUCTION'
        ];
    }
}
?>