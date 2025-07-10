<?php
// classes/ConferencePayment.php
class ConferencePayment {
    private $conn;
    
    public function __construct($db) {
        $this->conn = $db;
    }
    
    public function createPaymentRecord($refId, $eventName = 'UPWIECON2025') {
        $query = "INSERT INTO tblupwiecon2025payment (RefId, EventName) VALUES (:RefId, :EventName)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':RefId', $refId);
        $stmt->bindParam(':EventName', $eventName);
        return $stmt->execute();
    }
    
    public function updatePaymentStatus($refId, $orderId, $amount, $status, $txnId = null, $response = null) {
        $query = "UPDATE tblupwiecon2025payment 
                  SET order_id = :order_id,
                      amount = :amount,
                      payment_status = :status,
                      billdesk_txn_id = :txn_id,
                      billdesk_response = :response,
                      payment_date = NOW(),
                      updated_at = NOW()
                  WHERE RefId = :ref_id";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':order_id', $orderId);
        $stmt->bindParam(':amount', $amount);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':txn_id', $txnId);
        $stmt->bindParam(':response', $response);
        $stmt->bindParam(':ref_id', $refId);
        
        return $stmt->execute();
    }
    
    public function getPaymentByOrderId($orderId) {
        $query = "SELECT p.*, r.sName, r.sEmail, r.sMobile 
                  FROM tblupwiecon2025payment p 
                  JOIN tblupwiecon2025 r ON r.iRegId = p.RefId 
                  WHERE p.order_id = :order_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':order_id', $orderId);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function getPaymentByRefId($refId) {
        $query = "SELECT * FROM tblupwiecon2025payment WHERE RefId = :ref_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':ref_id', $refId);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function getAllPayments($limit = 50, $offset = 0) {
        $query = "SELECT p.*, r.sName, r.sEmail, r.sCategory 
                  FROM tblupwiecon2025payment p 
                  JOIN tblupwiecon2025 r ON r.iRegId = p.RefId 
                  ORDER BY p.created_at DESC 
                  LIMIT :limit OFFSET :offset";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getPaymentStats() {
        $query = "SELECT 
                    COUNT(*) as total_payments,
                    COUNT(CASE WHEN payment_status = 'SUCCESS' THEN 1 END) as successful_payments,
                    COUNT(CASE WHEN payment_status = 'PENDING' THEN 1 END) as pending_payments,
                    COUNT(CASE WHEN payment_status = 'FAILED' THEN 1 END) as failed_payments,
                    SUM(CASE WHEN payment_status = 'SUCCESS' THEN amount ELSE 0 END) as total_revenue
                  FROM tblupwiecon2025payment";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>