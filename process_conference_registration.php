<?php
// process_conference_registration.php - Correct Implementation with Simple Redirect
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include required files
require_once 'config/database.php';
require_once 'classes/ConferenceRegistration.php';
require_once 'classes/ConferencePayment.php';
require_once 'classes/FileUploadHandler.php';
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
        $ieeeId = isset($_POST['txtIEEEId']) ? ValidationHelper::sanitizeInput($_POST['txtIEEEId']) : null;
        
        // Basic validation (keeping it simple for this example)
        $errors = [];
        
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
        
        // Validate IEEE ID if IEEE member is selected
        if ($ieeeeMember == '1') {
            if (empty($ieeeId)) {
                $errors[] = "IEEE Member ID is required for IEEE members";
            } elseif (!preg_match('/^[0-9]{8}$/', $ieeeId)) {
                $errors[] = "IEEE Member ID must be exactly 8 digits";
            }
        }
        
        // Check for duplicate email registration
        $existingUser = $registration->getRegistrationByEmail($email);
        if ($existingUser) {
            $errors[] = "A registration with this email address already exists. Registration ID: " . $existingUser['iRegId'];
        }
        
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['form_data'] = $_POST;
            header('Location: registrationform.php?error=1');
            exit;
        }
        
        // Prepare data for registration
        $cleanMobile = ValidationHelper::cleanMobileNumber($mobile);
        $categoryText = '';
        switch($category) {
            case '1': $categoryText = 'Professional/Industry'; break;
            case '2': $categoryText = 'Academic/Faculty'; break;
            case '3': $categoryText = 'Student'; break;
        }
        
        $ieeeeMemberText = ($ieeeeMember == '1') ? 'Yes' : 'No';
        $nationalityText = ($nationality == '1') ? 'Indian' : 'Foreign';
        $earlyBirdText = ($earlyBird == '1') ? 'Yes' : 'No';
        $nielitText = $nielit ? (($nielit == '1') ? 'Yes' : 'No') : 'No';
        
        $registrationData = [
            'event_name' => 'UPWIECON2025',
            'campus' => 'Uttarakhand',
            'nielit' => $nielitText,
            'ieee_member' => $ieeeeMemberText,
            'ieee_id' => $ieeeId,
            'nationality' => $nationalityText,
            'early_bird' => $earlyBirdText,
            'category' => $categoryText,
            'paper_id' => $paperId,
            'paper_title' => $paperTitle,
            'name' => $name,
            'mobile' => $cleanMobile,
            'email' => $email,
            'paper_upload' => null,
            'amount' => $amount,
            'ip_address' => $_SERVER['REMOTE_ADDR']
        ];
        
        // Begin database transaction
        $db->beginTransaction();
        
        try {
            // Create registration record
            $registrationId = $registration->createRegistration($registrationData);
            if (!$registrationId) {
                throw new Exception("Failed to create registration record");
            }
            
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
            
            // Create EaseBuzz payment request (gets session token and payment URL)
            $paymentRequest = $easebuzz->createPaymentRequest($orderId, $amount, $customerInfo);

            if (!$paymentRequest['success']) {
                throw new Exception("Failed to create payment session: " . $paymentRequest['error']);
            }

            // Update payment record with order ID
            $paymentUpdated = $payment->updatePaymentStatus($registrationId, $orderId, $amount, 'INITIATED');
            if (!$paymentUpdated) {
                throw new Exception("Failed to update payment record with order ID");
            }
            
            // Commit transaction
            $db->commit();
            
            error_log("Registration and payment setup completed successfully for Registration ID: " . $registrationId . ", Payment URL: " . $paymentRequest['payment_url']);
            
            ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redirecting to Payment Gateway</title>
    <style>
    :root {
        --primary-blue: rgba(70, 12, 82, 0.99);
        --primary-bluebg: rgba(70, 12, 82, 0.49);
        --accent-blue: rgba(91, 2, 109, 0.99);
        --light-blue: rgba(232, 217, 235, 0.99);
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
        background: linear-gradient(135deg, var(--primarySecond) 0%, var(--primary-blue) 100%);
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
        animation: successPulse 2s ease-in-out infinite;
    }

    @keyframes successPulse {

        0%,
        100% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.1);
        }
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

    .ieee-highlight {
        background: var(--light-blue);
        border: 1px solid rgba(70, 12, 82, 0.3);
        border-radius: 6px;
        padding: 8px 12px;
        color: var(--text-dark);
        font-weight: 600;
    }

    .payment-info {
        background: #e8f5e8;
        border: 1px solid #c3e6cb;
        border-radius: 8px;
        padding: 15px;
        margin: 20px 0;
        text-align: left;
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
            Your registration has been submitted successfully. You will now be redirected to the secure EaseBuzz payment
            gateway to complete your registration fee payment.
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

        <!-- <div class="payment-info">
            <h4 style="color: #155724; margin-bottom: 10px;">🔒 Payment Information</h4>
            <p><strong>Session Token:</strong> <?php echo htmlspecialchars($paymentRequest['session_token']); ?></p>
            <p><strong>Payment URL:</strong> <a href="<?php echo htmlspecialchars($paymentRequest['payment_url']); ?>"
                    target="_blank">Click to open payment page</a></p>
        </div> -->

        <div class="spinner"></div>
        <p class="countdown">Redirecting to EaseBuzz payment gateway in <span id="countdown">5</span> seconds...</p>

        <div class="manual-redirect">
            <strong>Note:</strong> Please complete the payment to confirm your registration.
            <br>If you are not redirected automatically, click the button below:
            <br><a href="<?php echo htmlspecialchars($paymentRequest['payment_url']); ?>" class="btn-manual">Proceed to
                Payment</a>
        </div>

        <script>
        // Payment gateway redirect
        const paymentUrl = '<?php echo htmlspecialchars($paymentRequest['payment_url']); ?>';

        function redirectToPayment() {
            try {
                if (paymentUrl) {
                    console.log('Redirecting to payment gateway:', paymentUrl);
                    window.location.href = paymentUrl;
                } else {
                    console.error('Missing payment URL');
                    alert('Payment URL missing. Please use the manual link or contact support.');
                }
            } catch (error) {
                console.error('Error redirecting to payment gateway:', error);
                alert('Error redirecting to payment gateway. Please try again.');
            }
        }

        // Countdown timer
        let countdown = 5;
        const countdownElement = document.getElementById('countdown');

        const timer = setInterval(function() {
            countdown--;
            if (countdownElement) {
                countdownElement.textContent = countdown;
            }

            if (countdown <= 0) {
                clearInterval(timer);
                redirectToPayment();
            }
        }, 1000);

        // Click anywhere to proceed immediately
        document.querySelector('.redirect-container').addEventListener('click', function(e) {
            if (countdown > 0 && !e.target.closest('a') && !e.target.closest('.btn-manual')) {
                clearInterval(timer);
                countdown = 0;
                if (countdownElement) {
                    countdownElement.textContent = '0';
                }
                redirectToPayment();
            }
        });

        // Debug logging
        console.log('Payment redirect setup:', {
            registrationId: <?php echo json_encode($registrationId); ?>,
            orderId: <?php echo json_encode($orderId); ?>,
            amount: <?php echo json_encode($amount); ?>,
            ieeeId: <?php echo json_encode($ieeeId); ?>,
            ieeeMember: <?php echo json_encode($ieeeeMemberText); ?>,
            sessionToken: <?php echo json_encode($paymentRequest['session_token']); ?>,
            paymentUrl: paymentUrl
        });

        // Ensure countdown starts
        document.addEventListener('DOMContentLoaded', function() {
            if (countdownElement) {
                countdownElement.textContent = countdown;
            }

            console.log('✅ Payment redirect ready');
            console.log('Session Token:', <?php echo json_encode($paymentRequest['session_token']); ?>);
            console.log('Payment URL:', paymentUrl);
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