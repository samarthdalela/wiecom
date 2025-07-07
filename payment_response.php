<?php
// payment_response.php - Enhanced Conference Payment Response Handler
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Load Composer's autoloader for PHPMailer
require_once __DIR__ . '/vendor/autoload.php';

// Include required files
require_once 'config/database.php';
require_once 'classes/ConferenceRegistration.php';
require_once 'classes/ConferencePayment.php';
require_once 'classes/BillDeskIntegration.php';
require_once 'classes/EmailNotification.php';


// Initialize database connection
try {
    $database = new Database();
    $db = $database->connect();
} catch (Exception $e) {
    error_log("Database connection failed: " . $e->getMessage());
    die("Database connection failed. Please try again later.");
}

// Initialize classes
$registration = new ConferenceRegistration($db);
$payment = new ConferencePayment($db);
// $billDesk = new BillDeskIntegration($db);
$emailNotification = new EmailNotification();

try {
    // Get response from BillDesk (both POST and GET methods)
    $response = $_POST['msg'] ?? $_GET['msg'] ?? '';
    
    // For testing purposes, create a mock response if none received
    if (empty($response) && isset($_GET['test'])) {
        $testOrderId = $_GET['order_id'] ?? 'UPWIECON2025_TEST_' . time();
        $testAmount = $_GET['amount'] ?? '5.00';
        $testStatus = $_GET['status'] ?? 'SUCCESS'; // SUCCESS, FAILED, PENDING, CANCELLED
        
        // Create mock BillDesk response format
        $mockResponseParts = [
            'TESTMERCHANT',           // Merchant ID
            $testOrderId,             // Order ID
            $testAmount,              // Amount
            'TXN' . time(),          // Transaction ID
            'BANK' . time(),         // Bank Transaction ID
            $testStatus === 'SUCCESS' ? '0300' : '0002', // Status code
            $testStatus === 'SUCCESS' ? '0300' : '0002', // Response code
            $testStatus === 'SUCCESS' ? 'Transaction Successful' : 'Transaction Failed', // Response message
            date('Y-m-d H:i:s'),     // Transaction date
            'NA', 'NA', 'NA', 'NA', 'NA', // Additional info fields
            'TESTSECURITY',           // Security ID
        ];
        $mockResponse = implode('|', $mockResponseParts);
        $checksum = strtoupper(hash_hmac('sha256', $mockResponse, 'TEST_CHECKSUM_KEY'));
        $response = $mockResponse . '|' . $checksum;
        
        error_log("MOCK RESPONSE CREATED: " . $response);
    }
    
    if (empty($response)) {
        throw new Exception("No payment response received from gateway");
    }
    
    error_log("PAYMENT RESPONSE RECEIVED: " . $response);
    
    // Process BillDesk response
    $responseData = $billDesk->processResponse($response);
    error_log("PROCESSED RESPONSE DATA: " . json_encode($responseData));
    
    // Get payment record by order ID
    $paymentRecord = $payment->getPaymentByOrderId($responseData['order_id']);
    
    if (!$paymentRecord) {
        // Try to find payment record by partial order ID match
        $orderIdParts = explode('_', $responseData['order_id']);
        if (count($orderIdParts) >= 2) {
            $regId = $orderIdParts[1];
            $paymentRecord = $payment->getPaymentByRefId($regId);
        }
        
        if (!$paymentRecord) {
            throw new Exception("Payment record not found for Order ID: " . $responseData['order_id']);
        }
    }
    
    error_log("PAYMENT RECORD FOUND: " . json_encode($paymentRecord));
    
    // Update payment status
    $updateSuccess = $payment->updatePaymentStatus(
        $paymentRecord['RefId'],
        $responseData['order_id'],
        $responseData['amount'],
        $responseData['status'],
        $responseData['txn_id'],
        $responseData['raw_response']
    );
    
    if (!$updateSuccess) {
        error_log("Failed to update payment status for RefId: " . $paymentRecord['RefId']);
    }
    
    // Get registration details
    $registrationDetails = $registration->getRegistrationById($paymentRecord['RefId']);
    
    if (!$registrationDetails) {
        throw new Exception("Registration details not found for RefId: " . $paymentRecord['RefId']);
    }
    
    error_log("REGISTRATION DETAILS: " . json_encode($registrationDetails));
    
    // Send email notifications with enhanced error handling
    $emailSent = false;
    $emailError = '';
    $emailAttempts = [];
    
    try {
        if ($responseData['status'] === 'SUCCESS') {
            error_log("Attempting to send SUCCESS email to: " . $registrationDetails['sEmail']);
            $emailSent = $emailNotification->sendPaymentConfirmation($registrationDetails, $responseData);
            $emailAttempts[] = ['type' => 'success_email', 'result' => $emailSent];
            error_log("SUCCESS email result: " . ($emailSent ? 'SENT' : 'FAILED'));
        } elseif (in_array($responseData['status'], ['FAILED', 'CANCELLED'])) {
            error_log("Attempting to send FAILURE email to: " . $registrationDetails['sEmail']);
            $emailSent = $emailNotification->sendPaymentFailure($registrationDetails, $responseData);
            $emailAttempts[] = ['type' => 'failure_email', 'result' => $emailSent];
            error_log("FAILURE email result: " . ($emailSent ? 'SENT' : 'FAILED'));
        }
        
        // If primary email failed, try a simple backup email
        if (!$emailSent && in_array($responseData['status'], ['SUCCESS', 'FAILED', 'CANCELLED'])) {
            error_log("Primary email failed, trying simple backup method");
            $backupSent = sendSimpleEmail($registrationDetails, $responseData);
            $emailAttempts[] = ['type' => 'backup_email', 'result' => $backupSent];
            error_log("Backup email result: " . ($backupSent ? 'SENT' : 'FAILED'));
            
            if ($backupSent) {
                $emailSent = true;
            }
        }
        
    } catch (Exception $emailException) {
        $emailError = $emailException->getMessage();
        error_log("Email notification error: " . $emailError);
        
        // Final fallback - simple mail function
        try {
            $fallbackSent = sendFallbackEmail($registrationDetails, $responseData);
            $emailAttempts[] = ['type' => 'fallback_email', 'result' => $fallbackSent];
            error_log("Fallback email result: " . ($fallbackSent ? 'SENT' : 'FAILED'));
            
            if ($fallbackSent) {
                $emailSent = true;
            }
        } catch (Exception $fallbackException) {
            error_log("All email methods failed: " . $fallbackException->getMessage());
            $emailError = "All email delivery methods failed: " . $fallbackException->getMessage();
        }
    }
    
    // Log final email status
    error_log("FINAL EMAIL STATUS: " . ($emailSent ? 'SUCCESS' : 'FAILED') . 
              " | Attempts: " . json_encode($emailAttempts) . 
              " | Error: " . $emailError);
    
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPWIECON 2025 - Payment Result</title>
    <style>
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
        padding: 20px;
    }

    .result-container {
        background: white;
        border-radius: 15px;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        padding: 40px;
        width: 100%;
        max-width: 700px;
        text-align: center;
    }

    .conference-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 20px;
        border-radius: 8px;
        margin-bottom: 30px;
    }

    .status-icon {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        margin: 0 auto 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 50px;
        color: white;
    }

    .success-icon {
        background: linear-gradient(135deg, #27ae60, #2ecc71);
    }

    .failure-icon {
        background: linear-gradient(135deg, #e74c3c, #c0392b);
    }

    .pending-icon {
        background: linear-gradient(135deg, #f39c12, #e67e22);
    }

    .cancelled-icon {
        background: linear-gradient(135deg, #95a5a6, #7f8c8d);
    }

    .result-title {
        font-size: 32px;
        margin-bottom: 15px;
        color: #333;
    }

    .result-message {
        font-size: 18px;
        color: #666;
        margin-bottom: 30px;
        line-height: 1.5;
    }

    .email-status {
        padding: 15px;
        border-radius: 8px;
        margin: 20px 0;
        font-size: 14px;
    }

    .email-success {
        background: #d4edda;
        border: 1px solid #c3e6cb;
        color: #155724;
    }

    .email-failed {
        background: #f8d7da;
        border: 1px solid #f5c6cb;
        color: #721c24;
    }

    .details-section {
        background: #f8f9fa;
        border-radius: 10px;
        padding: 25px;
        margin: 25px 0;
        text-align: left;
    }

    .section-title {
        font-size: 20px;
        font-weight: 600;
        color: #333;
        margin-bottom: 20px;
        text-align: center;
        padding-bottom: 10px;
        border-bottom: 2px solid #667eea;
    }

    .detail-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 15px;
    }

    .detail-item {
        display: flex;
        justify-content: space-between;
        padding: 10px 0;
        border-bottom: 1px solid #eee;
    }

    .detail-label {
        font-weight: 600;
        color: #333;
    }

    .detail-value {
        color: #666;
        text-align: right;
    }

    .amount-highlight {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 15px;
        border-radius: 8px;
        margin: 20px 0;
    }

    .btn {
        display: inline-block;
        padding: 12px 25px;
        border: none;
        border-radius: 8px;
        text-decoration: none;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
        min-width: 150px;
        margin: 10px;
    }

    .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    }

    .btn-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
    }

    .btn-secondary {
        background: #6c757d;
        color: white;
    }

    .status-badge {
        display: inline-block;
        padding: 5px 15px;
        border-radius: 20px;
        font-size: 14px;
        font-weight: 600;
        text-transform: uppercase;
    }

    .debug-info {
        background: #f1f3f4;
        border: 1px solid #dadce0;
        border-radius: 8px;
        padding: 15px;
        margin: 20px 0;
        text-align: left;
        font-size: 12px;
        color: #5f6368;
    }

    @media (max-width: 768px) {
        .detail-grid {
            grid-template-columns: 1fr;
        }

        .result-container {
            padding: 20px;
        }
    }
    </style>
</head>

<body>
    <div class="result-container">
        <div class="conference-header">
            <h1>UPWIECON 2025</h1>
            <p>IEEE Uttarakhand Women in Engineering Conference</p>
        </div>

        <?php if ($responseData['status'] === 'SUCCESS'): ?>
        <div class="status-icon success-icon">✓</div>
        <h1 class="result-title" style="color: #27ae60;">Payment Successful!</h1>
        <p class="result-message">Congratulations! Your registration payment has been processed successfully.</p>

        <?php elseif ($responseData['status'] === 'PENDING'): ?>
        <div class="status-icon pending-icon">⏳</div>
        <h1 class="result-title" style="color: #f39c12;">Payment Pending</h1>
        <p class="result-message">Your payment is being processed. You will receive a confirmation once completed.</p>

        <?php elseif ($responseData['status'] === 'CANCELLED'): ?>
        <div class="status-icon cancelled-icon">✕</div>
        <h1 class="result-title" style="color: #95a5a6;">Payment Cancelled</h1>
        <p class="result-message">Your payment was cancelled. You can retry the payment at any time.</p>

        <?php else: ?>
        <div class="status-icon failure-icon">✕</div>
        <h1 class="result-title" style="color: #e74c3c;">Payment Failed</h1>
        <p class="result-message">Unfortunately, your payment could not be processed. Please try again.</p>
        <?php endif; ?>

        <!-- Email Status Notification -->
        <div class="email-status <?php echo $emailSent ? 'email-success' : 'email-failed'; ?>">
            <?php if ($emailSent): ?>
            ✓ Email notification sent successfully to <?php echo htmlspecialchars($registrationDetails['sEmail']); ?>
            <?php else: ?>
            ⚠ Email notification could not be sent. Please save your registration details.
            <?php if (!empty($emailError)): ?>
            <br><small>Technical details: <?php echo htmlspecialchars($emailError); ?></small>
            <?php endif; ?>
            <?php endif; ?>
        </div>

        <!-- Registration Details -->
        <div class="details-section">
            <h3 class="section-title">Registration Details</h3>
            <div class="detail-grid">
                <div class="detail-item">
                    <span class="detail-label">Registration ID:</span>
                    <span class="detail-value"><?php echo htmlspecialchars($registrationDetails['iRegId']); ?></span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">Name:</span>
                    <span class="detail-value"><?php echo htmlspecialchars($registrationDetails['sName']); ?></span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">Email:</span>
                    <span class="detail-value"><?php echo htmlspecialchars($registrationDetails['sEmail']); ?></span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">Mobile:</span>
                    <span class="detail-value"><?php echo htmlspecialchars($registrationDetails['sMobile']); ?></span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">Category:</span>
                    <span class="detail-value"><?php echo htmlspecialchars($registrationDetails['sCategory']); ?></span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">IEEE Member:</span>
                    <span
                        class="detail-value"><?php echo htmlspecialchars($registrationDetails['sIEEEMember']); ?></span>
                </div>
            </div>
        </div>

        <!-- Payment Details -->
        <div class="details-section">
            <h3 class="section-title">Payment Details</h3>
            <div class="detail-grid">
                <div class="detail-item">
                    <span class="detail-label">Order ID:</span>
                    <span class="detail-value"><?php echo htmlspecialchars($responseData['order_id']); ?></span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">Transaction ID:</span>
                    <span class="detail-value"><?php echo htmlspecialchars($responseData['txn_id']); ?></span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">Status:</span>
                    <span class="detail-value">
                        <span class="status-badge" style="background: <?php 
                            echo $responseData['status'] === 'SUCCESS' ? '#d4edda; color: #155724' : 
                                ($responseData['status'] === 'PENDING' ? '#fff3cd; color: #856404' : '#f8d7da; color: #721c24'); 
                        ?>">
                            <?php echo $responseData['status']; ?>
                        </span>
                    </span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">Response:</span>
                    <span class="detail-value"><?php echo htmlspecialchars($responseData['response_message']); ?></span>
                </div>
            </div>

            <div class="amount-highlight">
                <div style="font-size: 16px; margin-bottom: 5px;">Registration Fee</div>
                <div style="font-size: 28px; font-weight: bold;">
                    ₹<?php echo number_format($responseData['amount'], 2); ?></div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div style="margin-top: 30px;">
            <?php if ($responseData['status'] === 'SUCCESS'): ?>
            <a href="Default.php" class="btn btn-primary">Return to Home</a>
            <a href="mailto:ieeeconference@nielit.ac.in?subject=UPWIECON2025 Registration Confirmation&body=Registration ID: <?php echo $registrationDetails['iRegId']; ?>"
                class="btn btn-secondary">Contact Support</a>
            <?php else: ?>
            <a href="registrationform.php" class="btn btn-primary">Try Again</a>
            <a href="mailto:ieeeconference@nielit.ac.in?subject=UPWIECON2025 Payment Issue&body=Order ID: <?php echo $responseData['order_id']; ?>"
                class="btn btn-secondary">Contact Support</a>
            <?php endif; ?>
        </div>

        <!-- Debug Information (only show in development) -->
        <?php if (isset($_GET['debug']) || isset($_GET['test'])): ?>
        <div class="debug-info">
            <strong>Debug Information:</strong><br>
            Response Data: <?php echo json_encode($responseData, JSON_PRETTY_PRINT); ?><br>
            Email Attempts: <?php echo json_encode($emailAttempts, JSON_PRETTY_PRINT); ?><br>
            Raw Response: <?php echo htmlspecialchars(substr($response, 0, 200)) . '...'; ?>
        </div>
        <?php endif; ?>
    </div>
</body>

</html>

<?php
    
} catch (Exception $e) {
    error_log("Payment processing error: " . $e->getMessage());
    error_log("Stack trace: " . $e->getTraceAsString());
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPWIECON 2025 - Payment Error</title>
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

    .error-container {
        background: white;
        border-radius: 15px;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        padding: 40px;
        text-align: center;
        max-width: 500px;
        width: 100%;
    }

    .error-icon {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, #e74c3c, #c0392b);
        border-radius: 50%;
        margin: 0 auto 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 40px;
        color: white;
    }

    .btn {
        display: inline-block;
        padding: 12px 25px;
        margin: 20px 10px 0;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        text-decoration: none;
        border-radius: 8px;
        font-weight: 600;
        transition: transform 0.2s ease;
    }

    .btn:hover {
        transform: translateY(-2px);
    }

    .btn-secondary {
        background: #6c757d;
    }
    </style>
</head>

<body>
    <div class="error-container">
        <div class="error-icon">⚠</div>
        <h1 style="color: #e74c3c; margin-bottom: 15px;">Payment Processing Error</h1>
        <p style="color: #666; margin-bottom: 20px; line-height: 1.5;">
            An error occurred while processing your payment response. Please try again or contact support.
        </p>
        <p style="color: #999; font-size: 14px; margin-bottom: 30px;">
            Error: <?php echo htmlspecialchars($e->getMessage()); ?>
        </p>
        <a href="registrationform.php" class="btn">Try Again</a>
        <a href="mailto:ieeeconference@nielit.ac.in?subject=UPWIECON2025 Payment Error"
            class="btn btn-secondary">Contact Support</a>
    </div>
</body>

</html>
<?php
}

// Helper functions for email fallbacks
function sendSimpleEmail($registrationDetails, $responseData) {
    $to = $registrationDetails['sEmail'];
    $subject = "UPWIECON 2025 - Payment " . $responseData['status'];
    
    $message = "Dear " . $registrationDetails['sName'] . ",\n\n";
    $message .= "Your payment status: " . $responseData['status'] . "\n";
    $message .= "Registration ID: " . $registrationDetails['iRegId'] . "\n";
    $message .= "Order ID: " . $responseData['order_id'] . "\n";
    $message .= "Amount: ₹" . number_format($responseData['amount'], 2) . "\n\n";
    $message .= "Best regards,\nUPWIECON 2025 Team";
    
    $headers = "From: UPWIECON2025 <samarthdalela@gmail.com>\r\n";
    $headers .= "Reply-To: ieeeconference@nielit.ac.in\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
    
    return mail($to, $subject, $message, $headers);
}

function sendFallbackEmail($registrationDetails, $responseData) {
    $to = $registrationDetails['sEmail'];
    $subject = "UPWIECON 2025 - Payment " . $responseData['status'];
    
    $message = "<h2>UPWIECON 2025 - Payment " . $responseData['status'] . "</h2>";
    $message .= "<p>Dear " . htmlspecialchars($registrationDetails['sName']) . ",</p>";
    $message .= "<p>Payment Status: <strong>" . $responseData['status'] . "</strong></p>";
    $message .= "<p>Registration ID: " . htmlspecialchars($registrationDetails['iRegId']) . "</p>";
    $message .= "<p>Order ID: " . htmlspecialchars($responseData['order_id']) . "</p>";
    $message .= "<p>Amount: ₹" . number_format($responseData['amount'], 2) . "</p>";
    $message .= "<p>Best regards,<br>UPWIECON 2025 Team</p>";
    
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
    $headers .= "From: UPWIECON2025 <samarthdalela@gmail.com>\r\n";
    $headers .= "Reply-To: ieeeconference@nielit.ac.in\r\n";
    
    return mail($to, $subject, $message, $headers);
}
?>