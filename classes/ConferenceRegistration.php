<?php
// classes/ConferenceRegistration.php - Enhanced version

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
                   iAmount, sIP, dtCreated) 
                  VALUES 
                  (:sEventName, :sCampus, :sNielit, :sIEEEMember, :sNationality, :sEarlyBird,
                   :sCategory, :sPaperId, :sPaperTitle, :sName, :sMobile, :sEmail, :sPaperUpload,
                   :iAmount, :sIP, NOW())";
        
        try {
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
                $registrationId = $this->conn->lastInsertId();
                error_log("Registration created successfully with ID: " . $registrationId);
                return $registrationId;
            } else {
                $errorInfo = $stmt->errorInfo();
                error_log("Registration creation failed: " . json_encode($errorInfo));
                return false;
            }
        } catch (PDOException $e) {
            error_log("Database error in createRegistration: " . $e->getMessage());
            
            // Check for duplicate entry errors
            if ($e->getCode() == 23000) {
                if (strpos($e->getMessage(), 'sEmail') !== false) {
                    throw new Exception("Email address already registered");
                } elseif (strpos($e->getMessage(), 'sMobile') !== false) {
                    throw new Exception("Mobile number already registered");
                }
            }
            throw new Exception("Failed to create registration: " . $e->getMessage());
        }
    }
    
    public function getRegistrationById($id) {
        $query = "SELECT * FROM tblUPWIECON2025 WHERE iRegId = :id";
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Database error in getRegistrationById: " . $e->getMessage());
            return false;
        }
    }
    
    public function getRegistrationByEmail($email) {
        $query = "SELECT * FROM tblUPWIECON2025 WHERE sEmail = :email LIMIT 1";
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($result) {
                error_log("Found existing registration for email: " . $email . " with ID: " . $result['iRegId']);
            }
            
            return $result;
        } catch (PDOException $e) {
            error_log("Database error in getRegistrationByEmail: " . $e->getMessage());
            return false;
        }
    }
    
    public function getRegistrationByMobile($mobile) {
        $query = "SELECT * FROM tblUPWIECON2025 WHERE sMobile = :mobile LIMIT 1";
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':mobile', $mobile);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($result) {
                error_log("Found existing registration for mobile: " . $mobile . " with ID: " . $result['iRegId']);
            }
            
            return $result;
        } catch (PDOException $e) {
            error_log("Database error in getRegistrationByMobile: " . $e->getMessage());
            return false;
        }
    }
    
    public function checkDuplicateRegistration($email, $mobile) {
        $query = "SELECT iRegId, sEmail, sMobile FROM tblUPWIECON2025 
                  WHERE sEmail = :email OR sMobile = :mobile LIMIT 1";
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':mobile', $mobile);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($result) {
                $duplicateType = '';
                if ($result['sEmail'] === $email) {
                    $duplicateType = 'email';
                } elseif ($result['sMobile'] === $mobile) {
                    $duplicateType = 'mobile';
                }
                
                return [
                    'exists' => true,
                    'registration_id' => $result['iRegId'],
                    'duplicate_type' => $duplicateType,
                    'existing_email' => $result['sEmail'],
                    'existing_mobile' => $result['sMobile']
                ];
            }
            
            return ['exists' => false];
        } catch (PDOException $e) {
            error_log("Database error in checkDuplicateRegistration: " . $e->getMessage());
            return ['exists' => false, 'error' => $e->getMessage()];
        }
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
        $amount = isset($pricingMatrix[$key]) ? $pricingMatrix[$key] : 0;
        
        error_log("Amount calculation: Category=$category, EarlyBird=$earlyBird, Nationality=$nationality, IEEE=$ieeeMember, Email=$email, Amount=$amount");
        
        return $amount;
    }
    
    public function getAllRegistrations($limit = 50, $offset = 0, $filters = []) {
        $whereClause = "WHERE 1=1";
        $params = [];
        
        // Add filters
        if (!empty($filters['email'])) {
            $whereClause .= " AND sEmail LIKE :email";
            $params[':email'] = '%' . $filters['email'] . '%';
        }
        
        if (!empty($filters['category'])) {
            $whereClause .= " AND sCategory = :category";
            $params[':category'] = $filters['category'];
        }
        
        if (!empty($filters['ieee_member'])) {
            $whereClause .= " AND sIEEEMember = :ieee_member";
            $params[':ieee_member'] = $filters['ieee_member'];
        }
        
        if (!empty($filters['nationality'])) {
            $whereClause .= " AND sNationality = :nationality";
            $params[':nationality'] = $filters['nationality'];
        }
        
        $query = "SELECT * FROM tblUPWIECON2025 $whereClause 
                  ORDER BY dtCreated DESC 
                  LIMIT :limit OFFSET :offset";
        
        try {
            $stmt = $this->conn->prepare($query);
            
            // Bind filter parameters
            foreach ($params as $key => $value) {
                $stmt->bindValue($key, $value);
            }
            
            $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
            $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
            $stmt->execute();
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Database error in getAllRegistrations: " . $e->getMessage());
            return [];
        }
    }
    
    public function getRegistrationCount($filters = []) {
        $whereClause = "WHERE 1=1";
        $params = [];
        
        // Add filters (same as above)
        if (!empty($filters['email'])) {
            $whereClause .= " AND sEmail LIKE :email";
            $params[':email'] = '%' . $filters['email'] . '%';
        }
        
        if (!empty($filters['category'])) {
            $whereClause .= " AND sCategory = :category";
            $params[':category'] = $filters['category'];
        }
        
        $query = "SELECT COUNT(*) as total FROM tblUPWIECON2025 $whereClause";
        
        try {
            $stmt = $this->conn->prepare($query);
            
            // Bind filter parameters
            foreach ($params as $key => $value) {
                $stmt->bindValue($key, $value);
            }
            
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
        } catch (PDOException $e) {
            error_log("Database error in getRegistrationCount: " . $e->getMessage());
            return 0;
        }
    }
    
    public function getRegistrationStats() {
        $query = "SELECT 
                    COUNT(*) as total_registrations,
                    SUM(CASE WHEN sCategory = 'Professional/Industry' THEN 1 ELSE 0 END) as professional_count,
                    SUM(CASE WHEN sCategory = 'Academic/Faculty' THEN 1 ELSE 0 END) as academic_count,
                    SUM(CASE WHEN sCategory = 'Student' THEN 1 ELSE 0 END) as student_count,
                    SUM(CASE WHEN sIEEEMember = 'Yes' THEN 1 ELSE 0 END) as ieee_members,
                    SUM(CASE WHEN sNationality = 'Indian' THEN 1 ELSE 0 END) as indian_participants,
                    SUM(CASE WHEN sNationality = 'Foreign' THEN 1 ELSE 0 END) as foreign_participants,
                    SUM(CASE WHEN sEarlyBird = 'Yes' THEN 1 ELSE 0 END) as early_bird_registrations,
                    SUM(iAmount) as total_registration_amount,
                    AVG(iAmount) as average_registration_amount
                  FROM tblUPWIECON2025";
        
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            $stats = $stmt->fetch(PDO::FETCH_ASSOC);
            
            // Calculate additional statistics
            $stats['professional_percentage'] = $stats['total_registrations'] > 0 ? 
                round(($stats['professional_count'] / $stats['total_registrations']) * 100, 2) : 0;
            $stats['academic_percentage'] = $stats['total_registrations'] > 0 ? 
                round(($stats['academic_count'] / $stats['total_registrations']) * 100, 2) : 0;
            $stats['student_percentage'] = $stats['total_registrations'] > 0 ? 
                round(($stats['student_count'] / $stats['total_registrations']) * 100, 2) : 0;
            $stats['ieee_percentage'] = $stats['total_registrations'] > 0 ? 
                round(($stats['ieee_members'] / $stats['total_registrations']) * 100, 2) : 0;
            
            return $stats;
        } catch (PDOException $e) {
            error_log("Database error in getRegistrationStats: " . $e->getMessage());
            return [
                'total_registrations' => 0,
                'professional_count' => 0,
                'academic_count' => 0,
                'student_count' => 0,
                'ieee_members' => 0,
                'indian_participants' => 0,
                'foreign_participants' => 0,
                'early_bird_registrations' => 0,
                'total_registration_amount' => 0,
                'average_registration_amount' => 0
            ];
        }
    }
    
    public function updateRegistration($id, $data) {
        $query = "UPDATE tblUPWIECON2025 SET 
                    sName = :sName,
                    sMobile = :sMobile,
                    sCategory = :sCategory,
                    sIEEEMember = :sIEEEMember,
                    sNationality = :sNationality,
                    sEarlyBird = :sEarlyBird,
                    sPaperId = :sPaperId,
                    sPaperTitle = :sPaperTitle,
                    iAmount = :iAmount,
                    dtUpdated = NOW()
                  WHERE iRegId = :id";
        
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':sName', $data['name']);
            $stmt->bindParam(':sMobile', $data['mobile']);
            $stmt->bindParam(':sCategory', $data['category']);
            $stmt->bindParam(':sIEEEMember', $data['ieee_member']);
            $stmt->bindParam(':sNationality', $data['nationality']);
            $stmt->bindParam(':sEarlyBird', $data['early_bird']);
            $stmt->bindParam(':sPaperId', $data['paper_id']);
            $stmt->bindParam(':sPaperTitle', $data['paper_title']);
            $stmt->bindParam(':iAmount', $data['amount']);
            
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Database error in updateRegistration: " . $e->getMessage());
            return false;
        }
    }
    
    public function deleteRegistration($id) {
        // Soft delete - mark as deleted instead of actually deleting
        $query = "UPDATE tblUPWIECON2025 SET 
                    sStatus = 'DELETED',
                    dtUpdated = NOW()
                  WHERE iRegId = :id";
        
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Database error in deleteRegistration: " . $e->getMessage());
            return false;
        }
    }
    
    public function searchRegistrations($searchTerm, $limit = 20) {
        $searchTerm = '%' . $searchTerm . '%';
        $query = "SELECT * FROM tblUPWIECON2025 
                  WHERE (sName LIKE :searchTerm 
                         OR sEmail LIKE :searchTerm 
                         OR sMobile LIKE :searchTerm 
                         OR iRegId LIKE :searchTerm)
                    AND (sStatus IS NULL OR sStatus != 'DELETED')
                  ORDER BY dtCreated DESC 
                  LIMIT :limit";
        
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':searchTerm', $searchTerm);
            $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Database error in searchRegistrations: " . $e->getMessage());
            return [];
        }
    }
    
    public function getRecentRegistrations($limit = 10) {
        $query = "SELECT * FROM tblUPWIECON2025 
                  WHERE (sStatus IS NULL OR sStatus != 'DELETED')
                  ORDER BY dtCreated DESC 
                  LIMIT :limit";
        
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Database error in getRecentRegistrations: " . $e->getMessage());
            return [];
        }
    }
    
    public function validateRegistrationData($data) {
        $errors = [];
        
        // Validate required fields
        if (empty($data['name']) || strlen(trim($data['name'])) < 2) {
            $errors['name'] = 'Name must be at least 2 characters long';
        }
        
        if (empty($data['email']) || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Please enter a valid email address';
        }
        
        if (empty($data['mobile']) || !preg_match('/^[0-9]{10}$/', preg_replace('/\D/', '', $data['mobile']))) {
            $errors['mobile'] = 'Please enter a valid 10-digit mobile number';
        }
        
        if (empty($data['category']) || !in_array($data['category'], ['Professional/Industry', 'Academic/Faculty', 'Student'])) {
            $errors['category'] = 'Please select a valid category';
        }
        
        if (empty($data['ieee_member']) || !in_array($data['ieee_member'], ['Yes', 'No'])) {
            $errors['ieee_member'] = 'Please select IEEE membership status';
        }
        
        if (empty($data['nationality']) || !in_array($data['nationality'], ['Indian', 'Foreign'])) {
            $errors['nationality'] = 'Please select nationality';
        }
        
        if (empty($data['early_bird']) || !in_array($data['early_bird'], ['Yes', 'No'])) {
            $errors['early_bird'] = 'Please select early bird registration option';
        }
        
        if (empty($data['amount']) || !is_numeric($data['amount']) || $data['amount'] <= 0) {
            $errors['amount'] = 'Invalid registration amount';
        }
        
        return $errors;
    }
    
    public function exportRegistrationsCSV($filters = []) {
        $registrations = $this->getAllRegistrations(1000, 0, $filters); // Get up to 1000 records
        
        $csvData = [];
        $csvData[] = [
            'Registration ID',
            'Name',
            'Email',
            'Mobile',
            'Category',
            'IEEE Member',
            'Nationality',
            'Early Bird',
            'Paper ID',
            'Paper Title',
            'Amount',
            'Registration Date',
            'IP Address'
        ];
        
        foreach ($registrations as $reg) {
            $csvData[] = [
                $reg['iRegId'],
                $reg['sName'],
                $reg['sEmail'],
                $reg['sMobile'],
                $reg['sCategory'],
                $reg['sIEEEMember'],
                $reg['sNationality'],
                $reg['sEarlyBird'],
                $reg['sPaperId'] ?? '',
                $reg['sPaperTitle'] ?? '',
                $reg['iAmount'],
                $reg['dtCreated'],
                $reg['sIP']
            ];
        }
        
        return $csvData;
    }
    
    public function logRegistrationActivity($registrationId, $activity, $details = null) {
        $query = "INSERT INTO registration_activity_log 
                  (registration_id, activity, details, created_at) 
                  VALUES (:registration_id, :activity, :details, NOW())";
        
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':registration_id', $registrationId);
            $stmt->bindParam(':activity', $activity);
            $stmt->bindParam(':details', json_encode($details));
            $stmt->execute();
        } catch (PDOException $e) {
            error_log("Failed to log registration activity: " . $e->getMessage());
            // Don't throw exception as logging is not critical
        }
    }
}

} // End of class_exists check
?>