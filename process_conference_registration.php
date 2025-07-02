<?php
// process_conference_registration.php
session_start();

// Include required files
require_once 'config/database.php';
require_once 'classes/ConferenceRegistration.php';
require_once 'classes/ConferencePayment.php';
require_once 'classes/FileUploadHandler.php';
require_once 'classes/BillDeskIntegration.php';
require_once 'utils/ValidationHelper.php';

// Initialize database connection
$database = new Database();
$db = $database->connect();

// Initialize classes
$registration = new ConferenceRegistration($db);
$payment = new ConferencePayment($db);
$fileHandler = new FileUploadHandler('uploads/papers/');
$billDesk = new BillDeskIntegration($db);

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
        
        // Validation
        $errors = [];
        
        if (!ValidationHelper::validateRequired($name) || strlen($name) < 2) {
            $errors[] = "Name must be at least 2 characters long";
        }
        
        if (!ValidationHelper::validateEmail($email)) {
            $errors[] = "Invalid email address";
        }
        
        if (!ValidationHelper::validateMobile($mobile)) {
            $errors[] = "Invalid mobile number";
        }
        
        if ($category == '0') {
            $errors[] = "Please select a category";
        }
        
        if (empty($ieeeeMember) || empty($nationality) || empty($earlyBird)) {
            $errors[] = "Please fill all required registration options";
        }
        
        if ($amount <= 0) {
            $errors[] = "Invalid amount";
        }
        
        // Check if user already exists
        $existingUser = $registration->getRegistrationByEmail($email);
        if ($existingUser) {
            $errors[] = "Registration with this email already exists";
        }
        
        // Validate amount calculation
        $calculatedAmount = $registration->calculateAmount($category, $earlyBird, $nationality, $ieeeeMember, $email);
        if (abs($amount - $calculatedAmount) > 0.01) {
            $errors[] = "Amount mismatch. Please refresh and try again.";
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
                } else {
                    $errors[] = $uploadResult['message'];
                }
            }
        }
        
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['form_data'] = $_POST;
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
        $nielitText = $nielit ? (($nielit == '1') ? 'Yes' : 'No') : null;
        
        // Prepare registration data
        $registrationData = [
            'event_name' => 'UPWIECON2025',
            'campus' => 'Uttarakhand',
            'nielit' => $nielitText,
            'ieee_member' => $ieeeeMemberText,
            'nationality' => $nationalityText,
            'early_bird' => $earlyBirdText,
            'category' => $categoryText,
            'paper_id' => $paperId,
            'paper_title' => $paperTitle,
            'name' => $name,
            'mobile' => $mobile,
            'email' => $email,
            'paper_upload' => $paperUploadUrl,
            'amount' => $amount,
            'ip_address' => $ipAddress
        ];
        
        // Create registration record
        $registrationId = $registration->createRegistration($registrationData);
        
        if (!$registrationId) {
            throw new Exception("Failed to create registration record");
        }
        
        // Create payment record
        $payment->createPaymentRecord($registrationId);
        
        // Generate unique order ID
        $orderId = 'UPWIECON2025_' . $registrationId . '_' . time();
        
        // Prepare customer info for payment
        $customerInfo = [
            'name' => $name,
            'email' => $email,
            'mobile' => $mobile
        ];
        
        // Create BillDesk payment request
        $paymentRequest = $billDesk->createPaymentRequest($orderId, $amount, $customerInfo);
        
        // Update payment record with order ID
        $payment->updatePaymentStatus($registrationId, $orderId, $amount, 'PENDING');
        
        // Store registration info in session
        $_SESSION['registration_id'] = $registrationId;
        $_SESSION['order_id'] = $orderId;
        $_SESSION['customer_name'] = $name;
        
        // BillDesk payment gateway URLs
        $billDeskUrl = 'https://pgi.billdesk.com/pgidsk/PGIMerchantPayment'; // Test URL
        // $billDeskUrl = 'https://www.billdesk.com/pgidsk/PGIMerchantPayment'; // Production URL
        
        ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redirecting to Payment Gateway</title>
    <style>
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
        max-width: 500px;
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
        padding: 5px 0;
        border-bottom: 1px solid #eee;
    }

    .detail-label {
        font-weight: 600;
        color: #333;
    }

    .detail-value {
        color: #666;
    }

    .countdown {
        color: #667eea;
        font-weight: 600;
        margin-top: 20px;
    }
    </style>
</head>

<body>
    <div class="redirect-container">
        <div class="success-icon">✓</div>
        <h2 class="redirect-title">Registration Successful!</h2>
        <p class="redirect-message">Your registration has been submitted successfully. You will now be redirected to the
            payment gateway to complete the payment.</p>

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
                <span class="detail-label">Category:</span>
                <span class="detail-value"><?php echo htmlspecialchars($categoryText); ?></span>
            </div>
            <div class="detail-row">
                <span class="detail-label"><strong>Amount:</strong></span>
                <span class="detail-value"><strong>₹<?php echo number_format($amount, 2); ?></strong></span>
            </div>
        </div>

        <div class="spinner"></div>
        <p class="countdown">Redirecting in <span id="countdown">5</span> seconds...</p>

        <form id="billDeskForm" method="POST" action="<?php echo $billDeskUrl; ?>">
            <input type="hidden" name="msg" value="<?php echo htmlspecialchars($paymentRequest); ?>">
        </form>

        <script>
        let countdown = 5;
        const countdownElement = document.getElementById('countdown');

        const timer = setInterval(function() {
            countdown--;
            countdownElement.textContent = countdown;

            if (countdown <= 0) {
                clearInterval(timer);
                document.getElementById('billDeskForm').submit();
            }
        }, 1000);

        // Also submit form if user clicks anywhere
        document.addEventListener('click', function() {
            if (countdown > 0) {
                clearInterval(timer);
                document.getElementById('billDeskForm').submit();
            }
        });
        </script>
    </div>
</body>

</html>
<?php
        
    } else {
        header('Location: registrationform.php');
        exit;
    }
    
} catch (Exception $e) {
    $_SESSION['error'] = 'Registration failed: ' . $e->getMessage();
    $_SESSION['form_data'] = $_POST;
    header('Location: registrationform.php?error=1');
    exit;
}
?>