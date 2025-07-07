<?php
// process_conference_registration.php - Enhanced with duplicate email handling and IEEE ID
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include required files
require_once 'config/database.php';
require_once 'classes/ConferenceRegistration.php';
require_once 'classes/ConferencePayment.php';
require_once 'classes/FileUploadHandler.php';
// require_once 'classes/BillDeskIntegration.php';
require_once 'classes/EasebuzzIntegration.php';
require_once 'utils/ValidationHelper.php';

// Initialize database connection
try {
    $database = new Database();
    $db = $database->connect();
} catch (Exception $e) {
    $_SESSION['error'] = 'Database connection failed. Please try again later.';
    $_SESSION['form_data'] = $_POST;
    header('Location: registrationform.php?error=1');
    exit;
}

// Initialize classes
$registration = new ConferenceRegistration($db);
$payment = new ConferencePayment($db);
$fileHandler = new FileUploadHandler('uploads/papers/');
// $billDesk = new BillDeskIntegration($db);
$easebuzz = new EasebuzzIntegration($db);

try {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Sanitize and validate input data
        $name = ValidationHelper::sanitizeInput($_POST['txtName']);
        $email = ValidationHelper::sanitizeInput($_POST['txtEmail']);
        $mobile = ValidationHelper::sanitizeInput($_POST['txtMobile']);
        $category = ValidationHelper::sanitizeInput($_POST['ddlCategory']);
        $ieeeeMember = ValidationHelper::sanitizeInput($_POST['rdbIEEEMember']);
        $nationality = ValidationHelper::sanitizeInput($_POST['rdbNationality']);
        $earlyBird = ValidationHelper::sanitizeInput($_POST['rdbEarlyBird']);
        $nielit = isset($_POST['rdbNielit']) ? ValidationHelper::sanitizeInput($_POST['rdbNielit']) : null;
        $paperId = isset($_POST['txtPaperId']) ? ValidationHelper::sanitizeInput($_POST['txtPaperId']) : null;
        $paperTitle = isset($_POST['txtPaperTitle']) ? ValidationHelper::sanitizeInput($_POST['txtPaperTitle']) : null;
        $amount = floatval($_POST['txtAmount']);
        
        // ✅ NEW: Handle IEEE ID
        $ieeeId = isset($_POST['txtIEEEId']) ? ValidationHelper::sanitizeInput($_POST['txtIEEEId']) : null;
        
        // Comprehensive validation
        $errors = [];
        
        // Validate required fields
        if (!ValidationHelper::validateRequired($name) || strlen($name) < 2) {
            $errors[] = "Name must be at least 2 characters long";
        }
        
        if (!ValidationHelper::validateEmail($email)) {
            $errors[] = "Invalid email address format";
        }
        
        if (!ValidationHelper::validateMobile($mobile)) {
            $errors[] = "Invalid mobile number. Please enter a 10-digit number";
        }
        
        if ($category == '0') {
            $errors[] = "Please select a participant category";
        }
        
        if (empty($ieeeeMember) || !in_array($ieeeeMember, ['1', '2'])) {
            $errors[] = "Please select IEEE membership status";
        }
        
        if (empty($nationality) || !in_array($nationality, ['1', '2'])) {
            $errors[] = "Please select nationality";
        }
        
        if (empty($earlyBird) || !in_array($earlyBird, ['1', '2'])) {
            $errors[] = "Please select early bird registration option";
        }
        
        if ($amount <= 0) {
            $errors[] = "Invalid registration amount";
        }
        
        // ✅ NEW: Validate IEEE ID if IEEE member is selected
        if ($ieeeeMember == '1') {
            if (empty($ieeeId)) {
                $errors[] = "IEEE Member ID is required for IEEE members";
            } elseif (!preg_match('/^[0-9]{8}$/', $ieeeId)) {
                $errors[] = "IEEE Member ID must be exactly 8 digits";
            }
            // ✅ NEW: Check for duplicate IEEE ID (optional but recommended)
             else {
                $existingIEEEId = $registration->getRegistrationByIEEEId($ieeeId);
                if ($existingIEEEId && $existingIEEEId['sEmail'] !== $email) {
                    $errors[] = "This IEEE Member ID is already registered with another email address. Please verify your IEEE ID or contact support.";
                }
            }
        }
        
        // Check for duplicate email registration
        $existingUser = $registration->getRegistrationByEmail($email);
        if ($existingUser) {
            $errors[] = "A registration with this email address already exists. Registration ID: " . $existingUser['iRegId'] . ". If you need to make changes, please contact support.";
        }
        
        // Check for duplicate mobile number (optional but recommended)
        $cleanMobile = ValidationHelper::cleanMobileNumber($mobile);
        $existingMobile = $registration->getRegistrationByMobile($cleanMobile);
        if ($existingMobile && $existingMobile['sEmail'] !== $email) {
            $errors[] = "This mobile number is already registered with another email address. Please use a different mobile number or contact support.";
        }
        
        // Validate amount calculation
        $calculatedAmount = $registration->calculateAmount($category, $earlyBird, $nationality, $ieeeeMember, $email);
        if (abs($amount - $calculatedAmount) > 0.01) {
            $errors[] = "Amount mismatch detected. Expected: ₹" . number_format($calculatedAmount, 2) . ", Received: ₹" . number_format($amount, 2) . ". Please refresh the page and try again.";
        }
        
        // Handle file upload if IEEE member
        $paperUploadUrl = null;
        if ($ieeeeMember == '1' && isset($_FILES['paperUpload']) && $_FILES['paperUpload']['size'] > 0) {
            $fileValidation = ValidationHelper::validateFileUpload($_FILES['paperUpload']);
            if (!empty($fileValidation)) {
                $errors = array_merge($errors, $fileValidation);
            } else {
                $uploadResult = $fileHandler->uploadFile($_FILES['paperUpload']);
                if ($uploadResult['success']) {
                    $paperUploadUrl = $uploadResult['url'];
                    error_log("File uploaded successfully: " . $paperUploadUrl);
                } else {
                    $errors[] = "File upload failed: " . $uploadResult['message'];
                }
            }
        }
        
        // Paper details validation for IEEE members
        if ($ieeeeMember == '1') {
            $paperErrors = ValidationHelper::validatePaperDetails($paperId, $paperTitle, $ieeeeMember);
            if (!empty($paperErrors)) {
                $errors = array_merge($errors, array_values($paperErrors));
            }
        }
        
        // If there are validation errors, redirect back with errors
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['form_data'] = $_POST;
            error_log("Registration validation failed: " . json_encode($errors));
            header('Location: registrationform.php?error=1');
            exit;
        }
        
        // Get client IP address
        $ipAddress = $_SERVER['REMOTE_ADDR'];
        if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ipAddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        
        // Convert category to text
        $categoryText = '';
        switch($category) {
            case '1':
                $categoryText = 'Professional/Industry';
                break;
            case '2':
                $categoryText = 'Academic/Faculty';
                break;
            case '3':
                $categoryText = 'Student';
                break;
        }
        
        // Convert other fields to text
        $ieeeeMemberText = ($ieeeeMember == '1') ? 'Yes' : 'No';
        $nationalityText = ($nationality == '1') ? 'Indian' : 'Foreign';
        $earlyBirdText = ($earlyBird == '1') ? 'Yes' : 'No';
        $nielitText = $nielit ? (($nielit == '1') ? 'Yes' : 'No') : 'No';
        
        // Prepare registration data
        $registrationData = [
            'event_name' => 'UPWIECON2025',
            'campus' => 'Uttarakhand',
            'nielit' => $nielitText,
            'ieee_member' => $ieeeeMemberText,
            'ieee_id' => $ieeeId, // ✅ NEW: Include IEEE ID in registration data
            'nationality' => $nationalityText,
            'early_bird' => $earlyBirdText,
            'category' => $categoryText,
            'paper_id' => $paperId,
            'paper_title' => $paperTitle,
            'name' => $name,
            'mobile' => $cleanMobile,
            'email' => $email,
            'paper_upload' => $paperUploadUrl,
            'amount' => $amount,
            'ip_address' => $ipAddress
        ];
        
        // ✅ NEW: Enhanced logging with IEEE ID
        error_log("Registration attempt: " . json_encode([
            'email' => $email,
            'name' => $name,
            'category' => $categoryText,
            'ieee_member' => $ieeeeMemberText,
            'ieee_id' => $ieeeId,
            'amount' => $amount,
            'ip' => $ipAddress
        ]));
        
        // Begin database transaction
        $db->beginTransaction();
        
        try {
            // Create registration record
            $registrationId = $registration->createRegistration($registrationData);
            
            if (!$registrationId) {
                throw new Exception("Failed to create registration record");
            }
            
            error_log("Registration created successfully with ID: " . $registrationId . ($ieeeId ? " (IEEE ID: " . $ieeeId . ")" : ""));
            
            // Create payment record
            $paymentCreated = $payment->createPaymentRecord($registrationId);
            
            if (!$paymentCreated) {
                throw new Exception("Failed to create payment record");
            }
            
            // Generate unique order ID
            $orderId = 'UPWIECON2025_' . $registrationId . '_' . time();
            
            // Prepare customer info for payment
            $customerInfo = [
                'name' => $name,
                'email' => $email,
                'mobile' => $cleanMobile
            ];
            
            // Create Easebuzz payment request
            $paymentRequest = $easebuzz->createPaymentRequest($orderId, $amount, $customerInfo);

            if (!$paymentRequest) {
                throw new Exception("Failed to create payment request");
            }

            // Update payment record with order ID
            $paymentUpdated = $payment->updatePaymentStatus($registrationId, $orderId, $amount, 'INITIATED');
            
            if (!$paymentUpdated) {
                throw new Exception("Failed to update payment record with order ID");
            }
            
            // Commit transaction
            $db->commit();
            
            // Store registration info in session
            $_SESSION['registration_id'] = $registrationId;
            $_SESSION['order_id'] = $orderId;
            $_SESSION['customer_name'] = $name;
            $_SESSION['customer_email'] = $email;
            $_SESSION['registration_amount'] = $amount;
            
            error_log("Registration and payment setup completed successfully for Registration ID: " . $registrationId);
            
            // Easebuzz payment gateway URL
            $easebuzzUrl = $easebuzz->getPaymentUrl();

            ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redirecting to Payment Gateway</title>
    <!-- <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0;
        padding: 20px;
    }

    .redirect-container {
        background: white;
        border-radius: 15px;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        padding: 40px;
        text-align: center;
        max-width: 600px;
        width: 100%;
    }

    .success-icon {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 50%;
        margin: 0 auto 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 40px;
        color: white;
    }

    .redirect-title {
        font-size: 24px;
        color: #333;
        margin-bottom: 10px;
    }

    .redirect-message {
        color: #666;
        margin-bottom: 30px;
        line-height: 1.5;
    }

    .spinner {
        border: 4px solid #f3f3f3;
        border-top: 4px solid #667eea;
        border-radius: 50%;
        width: 50px;
        height: 50px;
        animation: spin 1s linear infinite;
        margin: 20px auto;
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    .registration-details {
        background: #f8f9fa;
        border-radius: 8px;
        padding: 20px;
        margin: 20px 0;
        text-align: left;
    }

    .detail-row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 10px;
        padding: 8px 0;
        border-bottom: 1px solid #eee;
    }

    .detail-label {
        font-weight: 600;
        color: #333;
    }

    .detail-value {
        color: #666;
        font-weight: 500;
    }

    .amount-highlight {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 15px;
        border-radius: 8px;
        margin: 20px 0;
        text-align: center;
    }

    .countdown {
        color: #667eea;
        font-weight: 600;
        margin-top: 20px;
        font-size: 16px;
    }

    .manual-redirect {
        margin-top: 20px;
        padding: 15px;
        background: #fff3cd;
        border: 1px solid #ffeaa7;
        border-radius: 8px;
        color: #856404;
    }

    .btn-manual {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 12px 30px;
        border: none;
        border-radius: 8px;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        text-decoration: none;
        display: inline-block;
        margin-top: 10px;
        transition: transform 0.2s ease;
    }

    .btn-manual:hover {
        transform: translateY(-2px);
    }

    /* ✅ NEW: IEEE ID highlight styling */
    .ieee-highlight {
        background: #e8f5e8;
        border: 1px solid #c3e6cb;
        border-radius: 6px;
        padding: 8px 12px;
        color: #155724;
        font-weight: 600;
    }

    @media (max-width: 768px) {
        .redirect-container {
            padding: 20px;
        }

        .detail-row {
            flex-direction: column;
            gap: 5px;
        }
    }
    </style> -->
    <style>
    :root {
        --primary-blue: rgba(70, 12, 82, 0.99);
        --primary-bluebg: rgba(70, 12, 82, 0.49);
        --accent-blue: rgba(91, 2, 109, 0.99);
        --light-blue: rgba(232, 217, 235, 0.99);
        --gold: #f39c12;
        --goldbg: rgba(243, 156, 18, 0.46);
        --text-dark: #2c3e50;
        --primarySecond: rgba(91, 2, 109, 0.49);
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(135deg, var(--primarySecond ) 0%, var(--primary-blue) 100%);
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0;
        padding: 20px;
    }

    .redirect-container {
        background: white;
        border-radius: 15px;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        padding: 40px;
        text-align: center;
        max-width: 600px;
        width: 100%;
    }

    .success-icon {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, var(--primary-blue) 0%, var(--accent-blue) 100%);
        border-radius: 50%;
        margin: 0 auto 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 40px;
        color: white;
    }

    .redirect-title {
        font-size: 24px;
        color: var(--text-dark);
        margin-bottom: 10px;
    }

    .redirect-message {
        color: #666;
        margin-bottom: 30px;
        line-height: 1.5;
    }

    .spinner {
        border: 4px solid #f3f3f3;
        border-top: 4px solid var(--primary-blue);
        border-radius: 50%;
        width: 50px;
        height: 50px;
        animation: spin 1s linear infinite;
        margin: 20px auto;
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    .registration-details {
        background: #f8f9fa;
        border-radius: 8px;
        padding: 20px;
        margin: 20px 0;
        text-align: left;
    }

    .detail-row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 10px;
        padding: 8px 0;
        border-bottom: 1px solid #eee;
    }

    .detail-label {
        font-weight: 600;
        color: var(--text-dark);
    }

    .detail-value {
        color: #666;
        font-weight: 500;
    }

    .amount-highlight {
        background: linear-gradient(135deg, var(--primary-blue) 0%, var(--accent-blue) 100%);
        color: white;
        padding: 15px;
        border-radius: 8px;
        margin: 20px 0;
        text-align: center;
    }

    .countdown {
        color: var(--primary-blue);
        font-weight: 600;
        margin-top: 20px;
        font-size: 16px;
    }

    .manual-redirect {
        margin-top: 20px;
        padding: 15px;
        background: #fff3cd;
        border: 1px solid #ffeaa7;
        border-radius: 8px;
        color: #856404;
    }

    .btn-manual {
        background: linear-gradient(135deg, var(--primary-blue) 0%, var(--accent-blue) 100%);
        color: white;
        padding: 12px 30px;
        border: none;
        border-radius: 8px;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        text-decoration: none;
        display: inline-block;
        margin-top: 10px;
        transition: transform 0.2s ease;
    }

    .btn-manual:hover {
        transform: translateY(-2px);
    }

    /* ✅ UPDATED: IEEE ID highlight styling */
    .ieee-highlight {
        background: var(--light-blue);
        border: 1px solid rgba(70, 12, 82, 0.3);
        border-radius: 6px;
        padding: 8px 12px;
        color: var(--text-dark);
        font-weight: 600;
    }

    @media (max-width: 768px) {
        .redirect-container {
            padding: 20px;
        }

        .detail-row {
            flex-direction: column;
            gap: 5px;
        }
    }
</style>
</head>

<body>
    <div class="redirect-container">
        <div class="success-icon">✓</div>
        <h2 class="redirect-title">Registration Successful!</h2>
        <p class="redirect-message">
            Your registration has been submitted successfully. You will now be redirected to the secure payment gateway
            to complete your registration fee payment.
        </p>

        <div class="registration-details">
            <div class="detail-row">
                <span class="detail-label">Registration ID:</span>
                <span class="detail-value"><?php echo htmlspecialchars($registrationId); ?></span>
            </div>
            <div class="detail-row">
                <span class="detail-label">Order ID:</span>
                <span class="detail-value"><?php echo htmlspecialchars($orderId); ?></span>
            </div>
            <div class="detail-row">
                <span class="detail-label">Participant Name:</span>
                <span class="detail-value"><?php echo htmlspecialchars($name); ?></span>
            </div>
            <div class="detail-row">
                <span class="detail-label">Email:</span>
                <span class="detail-value"><?php echo htmlspecialchars($email); ?></span>
            </div>
            <div class="detail-row">
                <span class="detail-label">Mobile:</span>
                <span class="detail-value"><?php echo htmlspecialchars($cleanMobile); ?></span>
            </div>
            <div class="detail-row">
                <span class="detail-label">Category:</span>
                <span class="detail-value"><?php echo htmlspecialchars($categoryText); ?></span>
            </div>
            <div class="detail-row">
                <span class="detail-label">IEEE Member:</span>
                <span class="detail-value"><?php echo htmlspecialchars($ieeeeMemberText); ?></span>
            </div>
            <?php if ($ieeeId && $ieeeeMember == '1'): ?>
            <!-- ✅ NEW: Display IEEE ID if provided -->
            <div class="detail-row">
                <span class="detail-label">IEEE Member ID:</span>
                <span class="detail-value ieee-highlight"><?php echo htmlspecialchars($ieeeId); ?></span>
            </div>
            <?php endif; ?>
        </div>

        <div class="amount-highlight">
            <div style="font-size: 16px; margin-bottom: 5px;">Registration Fee</div>
            <div style="font-size: 24px; font-weight: bold;">₹<?php echo number_format($amount, 2); ?></div>
        </div>

        <div class="spinner"></div>
        <p class="countdown">Redirecting to payment gateway in <span id="countdown">8</span> seconds...</p>

        <div class="manual-redirect">
            <strong>Note:</strong> Please complete the payment to confirm your registration.
            <br>If you are not redirected automatically, click the button below:
            <br><button onclick="submitPaymentForm()" class="btn-manual">Proceed to Payment</button>
        </div>

        <!-- ✅ FIXED: Corrected form structure and action -->
        <form id="easebuzzForm" method="POST" action="<?php echo htmlspecialchars($easebuzzUrl); ?>" style="display: none;">
            <?php
            if (is_array($paymentRequest)) {
                foreach ($paymentRequest as $key => $value) {
                    echo '<input type="hidden" name="'.htmlspecialchars($key).'" value="'.htmlspecialchars($value).'">' . "\n";
                }
            }
            ?>
        </form>

        <script>
        // ✅ FIXED: Corrected JavaScript variables and functionality
        let countdown = 8;
        const countdownElement = document.getElementById('countdown');

        function submitPaymentForm() {
            try {
                const form = document.getElementById('easebuzzForm');
                if (form) {
                    console.log('Submitting payment form to Easebuzz...');
                    form.submit();
                } else {
                    console.error('Payment form not found!');
                    alert('Payment form not found. Please try again or contact support.');
                }
            } catch (error) {
                console.error('Error submitting payment form:', error);
                alert('Error redirecting to payment gateway. Please try again.');
            }
        }

        const timer = setInterval(function() {
            countdown--;
            if (countdownElement) {
                countdownElement.textContent = countdown;
            }

            if (countdown <= 0) {
                clearInterval(timer);
                submitPaymentForm();
            }
        }, 1000);

        // Also submit form if user clicks anywhere on the container (except the manual button)
        document.querySelector('.redirect-container').addEventListener('click', function(e) {
            if (countdown > 0 && !e.target.classList.contains('btn-manual') && !e.target.closest('.btn-manual')) {
                clearInterval(timer);
                countdown = 0;
                if (countdownElement) {
                    countdownElement.textContent = '0';
                }
                submitPaymentForm();
            }
        });

        // ✅ FIXED: Corrected console logging
        console.log('Payment request created:', {
            registrationId: <?php echo json_encode($registrationId); ?>,
            orderId: <?php echo json_encode($orderId); ?>,
            amount: <?php echo json_encode($amount); ?>,
            ieeeId: <?php echo json_encode($ieeeId); ?>,
            ieeeMember: <?php echo json_encode($ieeeeMemberText); ?>,
            gatewayUrl: <?php echo json_encode($easebuzzUrl); ?>
        });

        // Auto-focus prevention to avoid form submission issues
        document.addEventListener('DOMContentLoaded', function() {
            // Ensure countdown starts properly
            if (countdownElement) {
                countdownElement.textContent = countdown;
            }
            
            // Log form contents for debugging
            const form = document.getElementById('easebuzzForm');
            if (form) {
                console.log('Payment form found with', form.elements.length, 'fields');
            } else {
                console.error('Payment form not found on page load!');
            }
        });
        </script>
    </div>
</body>

</html>
<?php
            
        } catch (Exception $dbException) {
            // Rollback transaction
            $db->rollback();
            
            error_log("Database transaction failed: " . $dbException->getMessage());
            throw new Exception("Registration failed due to database error: " . $dbException->getMessage());
        }
        
    } else {
        $_SESSION['error'] = 'Invalid request method';
        header('Location: registrationform.php');
        exit;
    }
    
} catch (Exception $e) {
    error_log("Registration processing error: " . $e->getMessage());
    error_log("Stack trace: " . $e->getTraceAsString());
    
    $_SESSION['error'] = 'Registration failed: ' . $e->getMessage();
    $_SESSION['form_data'] = $_POST ?? [];
    
    header('Location: registrationform.php?error=1');
    exit;
}
?>