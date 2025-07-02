<?php
// classes/ConferenceRegistration.php

// Prevent multiple inclusions
if (!class_exists('ConferenceRegistration')) {

class ConferenceRegistration {
    private $conn;
    
    public function __construct($db) {
        $this->conn = $db;
    }
    
    public function createRegistration($data) {
        $query = "INSERT INTO tblUPWIECON2025 
                  (sEventName, sCampus, sNielit, sIEEEMember, sNationality, sEarlyBird, 
                   sCategory, sPaperId, sPaperTitle, sName, sMobile, sEmail, sPaperUpload, 
                   iAmount, sIP) 
                  VALUES 
                  (:sEventName, :sCampus, :sNielit, :sIEEEMember, :sNationality, :sEarlyBird,
                   :sCategory, :sPaperId, :sPaperTitle, :sName, :sMobile, :sEmail, :sPaperUpload,
                   :iAmount, :sIP)";
        
        $stmt = $this->conn->prepare($query);
        
        // Bind parameters
        $stmt->bindParam(':sEventName', $data['event_name']);
        $stmt->bindParam(':sCampus', $data['campus']);
        $stmt->bindParam(':sNielit', $data['nielit']);
        $stmt->bindParam(':sIEEEMember', $data['ieee_member']);
        $stmt->bindParam(':sNationality', $data['nationality']);
        $stmt->bindParam(':sEarlyBird', $data['early_bird']);
        $stmt->bindParam(':sCategory', $data['category']);
        $stmt->bindParam(':sPaperId', $data['paper_id']);
        $stmt->bindParam(':sPaperTitle', $data['paper_title']);
        $stmt->bindParam(':sName', $data['name']);
        $stmt->bindParam(':sMobile', $data['mobile']);
        $stmt->bindParam(':sEmail', $data['email']);
        $stmt->bindParam(':sPaperUpload', $data['paper_upload']);
        $stmt->bindParam(':iAmount', $data['amount']);
        $stmt->bindParam(':sIP', $data['ip_address']);
        
        if ($stmt->execute()) {
            return $this->conn->lastInsertId();
        }
        return false;
    }
    
    public function getRegistrationById($id) {
        $query = "SELECT * FROM tblUPWIECON2025 WHERE iRegId = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function getRegistrationByEmail($email) {
        $query = "SELECT * FROM tblUPWIECON2025 WHERE sEmail = :email";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function calculateAmount($category, $earlyBird, $nationality, $ieeeMember, $email = '') {
        // Special case for test email
        if ($email === 'samarthdalela@gmail.com') {
            return 5.00;
        }
        
        // Pricing matrix based on the C# code
        $pricingMatrix = [
            // Indian Delegates
            "1_1_1_1" => 9000.00,   // Professional, Early Bird, Indian, IEEE
            "2_1_1_1" => 4000.00,   // Academic, Early Bird, Indian, IEEE
            "3_1_1_1" => 2500.00,   // Student, Early Bird, Indian, IEEE
            "1_1_1_2" => 10000.00,  // Professional, Early Bird, Indian, Non-IEEE
            "2_1_1_2" => 5000.00,   // Academic, Early Bird, Indian, Non-IEEE
            "3_1_1_2" => 2500.00,   // Student, Early Bird, Indian, Non-IEEE
            "1_2_1_1" => 7000.00,   // Professional, Regular, Indian, IEEE
            "2_2_1_1" => 3000.00,   // Academic, Regular, Indian, IEEE
            "3_2_1_1" => 2500.00,   // Student, Regular, Indian, IEEE
            "1_2_1_2" => 8000.00,   // Professional, Regular, Indian, Non-IEEE
            "2_2_1_2" => 4000.00,   // Academic, Regular, Indian, Non-IEEE
            "3_2_1_2" => 2500.00,   // Student, Regular, Indian, Non-IEEE
            
            // Foreign Delegates
            "1_1_2_1" => 25800.00,  // Professional, Early Bird, Foreign, IEEE
            "2_1_2_1" => 12900.00,  // Academic, Early Bird, Foreign, IEEE
            "3_1_2_1" => 8600.00,   // Student, Early Bird, Foreign, IEEE
            "1_1_2_2" => 34400.00,  // Professional, Early Bird, Foreign, Non-IEEE
            "2_1_2_2" => 17200.00,  // Academic, Early Bird, Foreign, Non-IEEE
            "3_1_2_2" => 8600.00,   // Student, Early Bird, Foreign, Non-IEEE
            "1_2_2_1" => 17200.00,  // Professional, Regular, Foreign, IEEE
            "2_2_2_1" => 8600.00,   // Academic, Regular, Foreign, IEEE
            "3_2_2_1" => 8600.00,   // Student, Regular, Foreign, IEEE
            "1_2_2_2" => 25800.00,  // Professional, Regular, Foreign, Non-IEEE
            "2_2_2_2" => 12900.00,  // Academic, Regular, Foreign, Non-IEEE
            "3_2_2_2" => 8600.00    // Student, Regular, Foreign, Non-IEEE
        ];
        
        $key = $category . "_" . $earlyBird . "_" . $nationality . "_" . $ieeeMember;
        return isset($pricingMatrix[$key]) ? $pricingMatrix[$key] : 0;
    }
    
    public function getAllRegistrations($limit = 50, $offset = 0) {
        $query = "SELECT * FROM tblUPWIECON2025 ORDER BY dtCreated DESC LIMIT :limit OFFSET :offset";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getRegistrationCount() {
        $query = "SELECT COUNT(*) as total FROM tblUPWIECON2025";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    }
}

} // End of class_exists check
?>