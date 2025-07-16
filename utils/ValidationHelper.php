<?php
// utils/ValidationHelper.php
class ValidationHelper {
    
    public static function validateEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }
    
    public static function validateMobile($mobile) {
        // Remove all non-numeric characters
        $cleanMobile = preg_replace('/\D/', '', $mobile);
        
        // Check if it's exactly 10 digits
        return preg_match('/^[0-9]{10}$/', $cleanMobile);
    }
    
    public static function validateRequired($value) {
        return !empty(trim($value));
    }
    
    public static function sanitizeInput($input) {
        if (is_null($input)) {
            return null;
        }
        return htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
    }
    
    public static function validateName($name) {
        $cleanName = trim($name);
        return strlen($cleanName) >= 2 && strlen($cleanName) <= 100;
    }
    
    public static function validateCategory($category) {
        return in_array($category, ['1', '2', '3']);
    }
    
    public static function validateRadioOption($value) {
        return in_array($value, ['1', '2']);
    }
    
    public static function validateAmount($amount) {
        return is_numeric($amount) && $amount > 0;
    }
    
    public static function validateFileUpload($file) {
        $errors = [];
        
        if (!$file || !isset($file['error'])) {
            return $errors; // File upload is optional
        }
        
        if ($file['error'] !== UPLOAD_ERR_OK) {
            switch ($file['error']) {
                case UPLOAD_ERR_INI_SIZE:
                case UPLOAD_ERR_FORM_SIZE:
                    $errors[] = 'File is too large';
                    break;
                case UPLOAD_ERR_PARTIAL:
                    $errors[] = 'File upload was not completed';
                    break;
                case UPLOAD_ERR_NO_FILE:
                    // No file uploaded - this is OK for optional uploads
                    break;
                case UPLOAD_ERR_NO_TMP_DIR:
                    $errors[] = 'Server configuration error - no temporary directory';
                    break;
                case UPLOAD_ERR_CANT_WRITE:
                    $errors[] = 'Server configuration error - cannot write file';
                    break;
                case UPLOAD_ERR_EXTENSION:
                    $errors[] = 'File upload blocked by server extension';
                    break;
                default:
                    $errors[] = 'Unknown file upload error';
                    break;
            }
            return $errors;
        }
        
        $allowedExtensions = ['pdf', 'doc', 'docx'];
        $maxSize = 3 * 1024 * 1024; // 3MB
        
        $fileExtension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        
        if (!in_array($fileExtension, $allowedExtensions)) {
            $errors[] = 'Invalid file format. Only PDF, DOC, and DOCX files are allowed.';
        }
        
        if ($file['size'] > $maxSize) {
            $errors[] = 'File size must be less than 3MB';
        }
        
        // Check for empty file
        if ($file['size'] == 0) {
            $errors[] = 'File appears to be empty';
        }
        
        // Basic security check - ensure file has content
        if (is_uploaded_file($file['tmp_name'])) {
            $fileContent = file_get_contents($file['tmp_name'], false, null, 0, 1024);
            if (empty($fileContent)) {
                $errors[] = 'File appears to be corrupted or empty';
            }
        }
        
        return $errors;
    }
    
    public static function validateIPAddress($ip) {
        return filter_var($ip, FILTER_VALIDATE_IP) !== false;
    }
    
    public static function cleanMobileNumber($mobile) {
        return preg_replace('/\D/', '', $mobile);
    }
    
    public static function formatMobileNumber($mobile) {
        $clean = self::cleanMobileNumber($mobile);
        if (strlen($clean) == 10) {
            return substr($clean, 0, 5) . '-' . substr($clean, 5);
        }
        return $clean;
    }
    
    public static function validateOrderId($orderId) {
        return preg_match('/^[A-Za-z0-9_-]+$/', $orderId) && strlen($orderId) <= 50;
    }
    
    public static function validateRegistrationData($data) {
        $errors = [];
        
        // Validate name
        if (!self::validateRequired($data['name']) || !self::validateName($data['name'])) {
            $errors['name'] = 'Name must be between 2 and 100 characters';
        }
        
        // Validate email
        if (!self::validateRequired($data['email']) || !self::validateEmail($data['email'])) {
            $errors['email'] = 'Please enter a valid email address';
        }
        
        // Validate mobile
        if (!self::validateRequired($data['mobile']) || !self::validateMobile($data['mobile'])) {
            $errors['mobile'] = 'Please enter a valid 10-digit mobile number';
        }
        
        // Validate category
        if (!self::validateRequired($data['category']) || !self::validateCategory($data['category'])) {
            $errors['category'] = 'Please select a valid category';
        }
        
        // Validate radio button selections
        if (!self::validateRequired($data['ieee_member']) || !self::validateRadioOption($data['ieee_member'])) {
            $errors['ieee_member'] = 'Please select IEEE membership status';
        }
        
        if (!self::validateRequired($data['nationality']) || !self::validateRadioOption($data['nationality'])) {
            $errors['nationality'] = 'Please select nationality';
        }
        
        if (!self::validateRequired($data['early_bird']) || !self::validateRadioOption($data['early_bird'])) {
            $errors['early_bird'] = 'Please select early bird registration option';
        }
        
        // Validate amount
        if (!self::validateRequired($data['amount']) || !self::validateAmount($data['amount'])) {
            $errors['amount'] = 'Invalid registration amount';
        }
        
        return $errors;
    }
    
    public static function generateSecureToken($length = 32) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $token = '';
        for ($i = 0; $i < $length; $i++) {
            $token .= $characters[random_int(0, strlen($characters) - 1)];
        }
        return $token;
    }
    
    public static function sanitizeFileName($filename) {
        // Remove path separators and other dangerous characters
        $filename = basename($filename);
        $filename = preg_replace('/[^a-zA-Z0-9._-]/', '_', $filename);
        
        // Limit length
        if (strlen($filename) > 100) {
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            $name = pathinfo($filename, PATHINFO_FILENAME);
            $filename = substr($name, 0, 90) . '.' . $ext;
        }
        
        return $filename;
    }
    
    public static function validatePaperDetails($paperId, $paperTitle, $isIEEEMember) {
        $errors = [];
        
        // If IEEE member, paper details might be required
        if ($isIEEEMember == '1') {
            // Paper ID and Title are optional but if provided should be valid
            if (!empty($paperId) && strlen(trim($paperId)) > 50) {
                $errors['paper_id'] = 'Paper ID should not exceed 50 characters';
            }
            
            if (!empty($paperTitle) && strlen(trim($paperTitle)) > 255) {
                $errors['paper_title'] = 'Paper title should not exceed 255 characters';
            }
        }
        
        return $errors;
    }
    
    public static function logValidationError($field, $value, $error) {
        $logData = [
            'timestamp' => date('Y-m-d H:i:s'),
            'field' => $field,
            'value' => substr($value, 0, 100), // Limit logged value length
            'error' => $error,
            'ip' => $_SERVER['REMOTE_ADDR'] ?? 'unknown'
        ];
        
        // Log to file (you can change this to database logging)
        error_log("Validation Error: " . json_encode($logData));
    }
    
    public static function isValidDate($date, $format = 'Y-m-d H:i:s') {
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) === $date;
    }
    
    public static function sanitizeArray($array) {
        $sanitized = [];
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $sanitized[$key] = self::sanitizeArray($value);
            } else {
                $sanitized[$key] = self::sanitizeInput($value);
            }
        }
        return $sanitized;
    }
}
?>