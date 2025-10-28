<?php
// classes/ConferenceRegistration.php - Enhanced version with IEEE ID

// Prevent multiple inclusions
if (!class_exists('ConferenceRegistration')) {

class ConferenceRegistration {
    private $conn;
    
    public function __construct($db) {
        $this->conn = $db;
    }
    
    public function createRegistration($data) {
        // ✅ UPDATED: Include IEEE ID in the insert query
        $query = "INSERT INTO tblupwiecon2025 
                  (sEventName, sCampus, sNielit, sIEEEMember, ieee_id, sNationality, sEarlyBird, 
                   sCategory, sPaperId, sPaperTitle, sName, sMobile, sEmail, sPaperUpload, 
                   iAmount, sIP, dtCreated) 
                  VALUES 
                  (:sEventName, :sCampus, :sNielit, :sIEEEMember, :ieee_id, :sNationality, :sEarlyBird,
                   :sCategory, :sPaperId, :sPaperTitle, :sName, :sMobile, :sEmail, :sPaperUpload,
                   :iAmount, :sIP, NOW())";
        
        try {
            $stmt = $this->conn->prepare($query);
            
            // Bind parameters
            $stmt->bindParam(':sEventName', $data['event_name']);
            $stmt->bindParam(':sCampus', $data['campus']);
            $stmt->bindParam(':sNielit', $data['nielit']);
            $stmt->bindParam(':sIEEEMember', $data['ieee_member']);
            $stmt->bindParam(':ieee_id', $data['ieee_id']); // ✅ NEW: Bind IEEE ID
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
                error_log("Registration created successfully with ID: " . $registrationId . 
                         ($data['ieee_id'] ? " (IEEE ID: " . $data['ieee_id'] . ")" : ""));
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
                } elseif (strpos($e->getMessage(), 'ieee_id') !== false) {
                    throw new Exception("IEEE ID already registered");
                }
            }
            throw new Exception("Failed to create registration: " . $e->getMessage());
        }
    }
    
    public function getRegistrationById($id) {
        $query = "SELECT * FROM tblupwiecon2025 WHERE iRegId = :id";
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
    
    // ALTER TABLE tblupwiecon2025 DROP INDEX unique_email;
    public function getRegistrationByEmail($email) {
        $query = "SELECT u.* FROM tblupwiecon2025 u 
                  JOIN tblupwiecon2025payment p ON u.iRegId = p.RefId 
                  WHERE u.sEmail = :email AND p.payment_status = 'SUCCESS' 
                  LIMIT 1;";
        
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
        $query = "SELECT * FROM tblupwiecon2025 WHERE sMobile = :mobile LIMIT 1";
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
    
    // ✅ NEW: Method to check registration by IEEE ID
    public function getRegistrationByIEEEId($ieeeId) {
        $query = "SELECT * FROM tblupwiecon2025 WHERE ieee_id = :ieee_id LIMIT 1";
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':ieee_id', $ieeeId);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($result) {
                error_log("Found existing registration for IEEE ID: " . $ieeeId . " with Registration ID: " . $result['iRegId']);
            }
            
            return $result;
        } catch (PDOException $e) {
            error_log("Database error in getRegistrationByIEEEId: " . $e->getMessage());
            return false;
        }
    }
    
    public function checkDuplicateRegistration($email, $mobile) {
        $query = "SELECT iRegId, sEmail, sMobile FROM tblupwiecon2025 
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
    
    // ✅ NEW: Enhanced duplicate check including IEEE ID
    public function checkDuplicateRegistrationWithIEEE($email, $mobile, $ieeeId = null) {
        $conditions = ["sEmail = :email", "sMobile = :mobile"];
        $params = [':email' => $email, ':mobile' => $mobile];
        
        if ($ieeeId) {
            $conditions[] = "ieee_id = :ieee_id";
            $params[':ieee_id'] = $ieeeId;
        }
        
        $query = "SELECT iRegId, sEmail, sMobile, ieee_id FROM tblupwiecon2025 
                  WHERE " . implode(' OR ', $conditions) . " LIMIT 1";
        
        try {
            $stmt = $this->conn->prepare($query);
            foreach ($params as $key => $value) {
                $stmt->bindValue($key, $value);
            }
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($result) {
                $duplicateType = '';
                if ($result['sEmail'] === $email) {
                    $duplicateType = 'email';
                } elseif ($result['sMobile'] === $mobile) {
                    $duplicateType = 'mobile';
                } elseif ($ieeeId && $result['ieee_id'] === $ieeeId) {
                    $duplicateType = 'ieee_id';
                }
                
                return [
                    'exists' => true,
                    'registration_id' => $result['iRegId'],
                    'duplicate_type' => $duplicateType,
                    'existing_email' => $result['sEmail'],
                    'existing_mobile' => $result['sMobile'],
                    'existing_ieee_id' => $result['ieee_id']
                ];
            }
            
            return ['exists' => false];
        } catch (PDOException $e) {
            error_log("Database error in checkDuplicateRegistrationWithIEEE: " . $e->getMessage());
            return ['exists' => false, 'error' => $e->getMessage()];
        }
    }
    
    public function calculateAmount($category, $earlyBird, $nationality, $ieeeMember, $email = '') {
        // Special case for test email
        if ($email === 'samarthdalela@gmail.com') {
            return 1.00;
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
        
        // ✅ NEW: Add IEEE ID filter
        if (!empty($filters['ieee_id'])) {
            $whereClause .= " AND ieee_id LIKE :ieee_id";
            $params[':ieee_id'] = '%' . $filters['ieee_id'] . '%';
        }
        
        $query = "SELECT * FROM tblupwiecon2025 $whereClause 
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
        
        // ✅ NEW: Add IEEE ID filter to count
        if (!empty($filters['ieee_id'])) {
            $whereClause .= " AND ieee_id LIKE :ieee_id";
            $params[':ieee_id'] = '%' . $filters['ieee_id'] . '%';
        }
        
        $query = "SELECT COUNT(*) as total FROM tblupwiecon2025 $whereClause";
        
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
        // ✅ ENHANCED: Include IEEE ID statistics
        $query = "SELECT 
                    COUNT(*) as total_registrations,
                    SUM(CASE WHEN sCategory = 'Professional/Industry' THEN 1 ELSE 0 END) as professional_count,
                    SUM(CASE WHEN sCategory = 'Academic/Faculty' THEN 1 ELSE 0 END) as academic_count,
                    SUM(CASE WHEN sCategory = 'Student' THEN 1 ELSE 0 END) as student_count,
                    SUM(CASE WHEN sIEEEMember = 'Yes' THEN 1 ELSE 0 END) as ieee_members,
                    SUM(CASE WHEN sIEEEMember = 'Yes' AND ieee_id IS NOT NULL AND ieee_id != '' THEN 1 ELSE 0 END) as ieee_members_with_id,
                    SUM(CASE WHEN sNationality = 'Indian' THEN 1 ELSE 0 END) as indian_participants,
                    SUM(CASE WHEN sNationality = 'Foreign' THEN 1 ELSE 0 END) as foreign_participants,
                    SUM(CASE WHEN sEarlyBird = 'Yes' THEN 1 ELSE 0 END) as early_bird_registrations,
                    SUM(iAmount) as total_registration_amount,
                    AVG(iAmount) as average_registration_amount
                  FROM tblupwiecon2025";
        
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
            
            // ✅ NEW: IEEE ID completion percentage
            $stats['ieee_id_completion_percentage'] = $stats['ieee_members'] > 0 ? 
                round(($stats['ieee_members_with_id'] / $stats['ieee_members']) * 100, 2) : 0;
            
            return $stats;
        } catch (PDOException $e) {
            error_log("Database error in getRegistrationStats: " . $e->getMessage());
            return [
                'total_registrations' => 0,
                'professional_count' => 0,
                'academic_count' => 0,
                'student_count' => 0,
                'ieee_members' => 0,
                'ieee_members_with_id' => 0,
                'indian_participants' => 0,
                'foreign_participants' => 0,
                'early_bird_registrations' => 0,
                'total_registration_amount' => 0,
                'average_registration_amount' => 0,
                'ieee_id_completion_percentage' => 0
            ];
        }
    }
    
    public function updateRegistration($id, $data) {
        // ✅ UPDATED: Include IEEE ID in update query
        $query = "UPDATE tblupwiecon2025 SET 
                    sName = :sName,
                    sMobile = :sMobile,
                    sCategory = :sCategory,
                    sIEEEMember = :sIEEEMember,
                    ieee_id = :ieee_id,
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
            $stmt->bindParam(':ieee_id', $data['ieee_id']); // ✅ NEW: Bind IEEE ID for update
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
        $query = "UPDATE tblupwiecon2025 SET 
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
        // ✅ UPDATED: Include IEEE ID in search
        $query = "SELECT * FROM tblupwiecon2025 
                  WHERE (sName LIKE :searchTerm 
                         OR sEmail LIKE :searchTerm 
                         OR sMobile LIKE :searchTerm 
                         OR ieee_id LIKE :searchTerm
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
        $query = "SELECT * FROM tblupwiecon2025 
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
        
        // ✅ NEW: Validate IEEE ID if IEEE member
        if (isset($data['ieee_member']) && $data['ieee_member'] === 'Yes') {
            if (empty($data['ieee_id'])) {
                $errors['ieee_id'] = 'IEEE Member ID is required for IEEE members';
            } elseif (!preg_match('/^[0-9]{8}$/', $data['ieee_id'])) {
                $errors['ieee_id'] = 'IEEE Member ID must be exactly 8 digits';
            }
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
        // ✅ UPDATED: Include IEEE ID in CSV export headers
        $csvData[] = [
            'Registration ID',
            'Name',
            'Email',
            'Mobile',
            'Category',
            'IEEE Member',
            'IEEE ID',
            'Nationality',
            'Early Bird',
            'Paper ID',
            'Paper Title',
            'Amount',
            'Registration Date',
            'IP Address'
        ];
        
        foreach ($registrations as $reg) {
            // ✅ UPDATED: Include IEEE ID in CSV export data
            $csvData[] = [
                $reg['iRegId'],
                $reg['sName'],
                $reg['sEmail'],
                $reg['sMobile'],
                $reg['sCategory'],
                $reg['sIEEEMember'],
                $reg['ieee_id'] ?? '',
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
    
    // ✅ NEW: Get IEEE members with their IDs
    public function getIEEEMembersWithIds($limit = 50, $offset = 0) {
        $query = "SELECT iRegId, sName, sEmail, ieee_id, sCategory, dtCreated 
                  FROM tblupwiecon2025 
                  WHERE sIEEEMember = 'Yes' 
                    AND ieee_id IS NOT NULL 
                    AND ieee_id != ''
                    AND (sStatus IS NULL OR sStatus != 'DELETED')
                  ORDER BY dtCreated DESC 
                  LIMIT :limit OFFSET :offset";
        
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
            $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Database error in getIEEEMembersWithIds: " . $e->getMessage());
            return [];
        }
    }
    
    // ✅ NEW: Get IEEE members without IDs (for follow-up)
    public function getIEEEMembersWithoutIds($limit = 50, $offset = 0) {
        $query = "SELECT iRegId, sName, sEmail, sCategory, dtCreated 
                  FROM tblupwiecon2025 
                  WHERE sIEEEMember = 'Yes' 
                    AND (ieee_id IS NULL OR ieee_id = '')
                    AND (sStatus IS NULL OR sStatus != 'DELETED')
                  ORDER BY dtCreated DESC 
                  LIMIT :limit OFFSET :offset";
        
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
            $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Database error in getIEEEMembersWithoutIds: " . $e->getMessage());
            return [];
        }
    }
    
    // ✅ NEW: Validate IEEE ID format and uniqueness
    public function validateIEEEId($ieeeId, $excludeRegistrationId = null) {
        $errors = [];
        
        // Format validation
        if (!preg_match('/^[0-9]{8}$/', $ieeeId)) {
            $errors[] = 'IEEE Member ID must be exactly 8 digits';
            return $errors;
        }
        
        // Uniqueness validation
        $query = "SELECT iRegId, sName, sEmail FROM tblupwiecon2025 
                  WHERE ieee_id = :ieee_id";
        
        if ($excludeRegistrationId) {
            $query .= " AND iRegId != :exclude_id";
        }
        
        $query .= " LIMIT 1";
        
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':ieee_id', $ieeeId);
            
            if ($excludeRegistrationId) {
                $stmt->bindParam(':exclude_id', $excludeRegistrationId, PDO::PARAM_INT);
            }
            
            $stmt->execute();
            $existing = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($existing) {
                $errors[] = 'This IEEE Member ID is already registered by ' . $existing['sName'] . ' (' . $existing['sEmail'] . ')';
            }
            
        } catch (PDOException $e) {
            error_log("Database error in validateIEEEId: " . $e->getMessage());
            $errors[] = 'Unable to validate IEEE ID at this time';
        }
        
        return $errors;
    }
    
    // ✅ NEW: Update only IEEE ID for existing registration
    public function updateIEEEId($registrationId, $ieeeId) {
        $query = "UPDATE tblupwiecon2025 SET 
                    ieee_id = :ieee_id,
                    dtUpdated = NOW()
                  WHERE iRegId = :registration_id";
        
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':ieee_id', $ieeeId);
            $stmt->bindParam(':registration_id', $registrationId, PDO::PARAM_INT);
            
            $result = $stmt->execute();
            
            if ($result) {
                error_log("IEEE ID updated successfully for Registration ID: " . $registrationId . " (IEEE ID: " . $ieeeId . ")");
            }
            
            return $result;
        } catch (PDOException $e) {
            error_log("Database error in updateIEEEId: " . $e->getMessage());
            return false;
        }
    }
    
    // ✅ NEW: Get IEEE statistics breakdown
    public function getIEEEStatistics() {
        $query = "SELECT 
                    COUNT(*) as total_ieee_members,
                    SUM(CASE WHEN ieee_id IS NOT NULL AND ieee_id != '' THEN 1 ELSE 0 END) as ieee_with_id,
                    SUM(CASE WHEN ieee_id IS NULL OR ieee_id = '' THEN 1 ELSE 0 END) as ieee_without_id,
                    SUM(CASE WHEN sCategory = 'Professional/Industry' AND sIEEEMember = 'Yes' THEN 1 ELSE 0 END) as ieee_professional,
                    SUM(CASE WHEN sCategory = 'Academic/Faculty' AND sIEEEMember = 'Yes' THEN 1 ELSE 0 END) as ieee_academic,
                    SUM(CASE WHEN sCategory = 'Student' AND sIEEEMember = 'Yes' THEN 1 ELSE 0 END) as ieee_student,
                    SUM(CASE WHEN sNationality = 'Indian' AND sIEEEMember = 'Yes' THEN 1 ELSE 0 END) as ieee_indian,
                    SUM(CASE WHEN sNationality = 'Foreign' AND sIEEEMember = 'Yes' THEN 1 ELSE 0 END) as ieee_foreign
                  FROM tblupwiecon2025 
                  WHERE sIEEEMember = 'Yes' 
                    AND (sStatus IS NULL OR sStatus != 'DELETED')";
        
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            $stats = $stmt->fetch(PDO::FETCH_ASSOC);
            
            // Calculate percentages
            if ($stats['total_ieee_members'] > 0) {
                $stats['ieee_id_completion_rate'] = round(($stats['ieee_with_id'] / $stats['total_ieee_members']) * 100, 2);
                $stats['professional_percentage'] = round(($stats['ieee_professional'] / $stats['total_ieee_members']) * 100, 2);
                $stats['academic_percentage'] = round(($stats['ieee_academic'] / $stats['total_ieee_members']) * 100, 2);
                $stats['student_percentage'] = round(($stats['ieee_student'] / $stats['total_ieee_members']) * 100, 2);
                $stats['indian_percentage'] = round(($stats['ieee_indian'] / $stats['total_ieee_members']) * 100, 2);
                $stats['foreign_percentage'] = round(($stats['ieee_foreign'] / $stats['total_ieee_members']) * 100, 2);
            } else {
                $stats['ieee_id_completion_rate'] = 0;
                $stats['professional_percentage'] = 0;
                $stats['academic_percentage'] = 0;
                $stats['student_percentage'] = 0;
                $stats['indian_percentage'] = 0;
                $stats['foreign_percentage'] = 0;
            }
            
            return $stats;
        } catch (PDOException $e) {
            error_log("Database error in getIEEEStatistics: " . $e->getMessage());
            return [
                'total_ieee_members' => 0,
                'ieee_with_id' => 0,
                'ieee_without_id' => 0,
                'ieee_professional' => 0,
                'ieee_academic' => 0,
                'ieee_student' => 0,
                'ieee_indian' => 0,
                'ieee_foreign' => 0,
                'ieee_id_completion_rate' => 0,
                'professional_percentage' => 0,
                'academic_percentage' => 0,
                'student_percentage' => 0,
                'indian_percentage' => 0,
                'foreign_percentage' => 0
            ];
        }
    }
    
    // ✅ NEW: Bulk update IEEE IDs (for admin use)
    public function bulkUpdateIEEEIds($updates) {
        $this->conn->beginTransaction();
        
        try {
            $query = "UPDATE tblupwiecon2025 SET 
                        ieee_id = :ieee_id,
                        dtUpdated = NOW()
                      WHERE iRegId = :registration_id";
            
            $stmt = $this->conn->prepare($query);
            $updatedCount = 0;
            
            foreach ($updates as $update) {
                $stmt->bindParam(':ieee_id', $update['ieee_id']);
                $stmt->bindParam(':registration_id', $update['registration_id'], PDO::PARAM_INT);
                
                if ($stmt->execute()) {
                    $updatedCount++;
                } else {
                    error_log("Failed to update IEEE ID for Registration ID: " . $update['registration_id']);
                }
            }
            
            $this->conn->commit();
            error_log("Bulk IEEE ID update completed: " . $updatedCount . " records updated");
            
            return [
                'success' => true,
                'updated_count' => $updatedCount,
                'total_attempted' => count($updates)
            ];
            
        } catch (Exception $e) {
            $this->conn->rollback();
            error_log("Bulk IEEE ID update failed: " . $e->getMessage());
            
            return [
                'success' => false,
                'error' => $e->getMessage(),
                'updated_count' => 0,
                'total_attempted' => count($updates)
            ];
        }
    }
}

} // End of class_exists check
?>