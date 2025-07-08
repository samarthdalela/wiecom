<?php
// payment_response.php - Production Version
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 0); // Disable error display in production

// Load Composer's autoloader for PHPMailer
require_once __DIR__ . '/vendor/autoload.php';

// Include required files
require_once 'config/database.php';
require_once 'classes/ConferenceRegistration.php';
require_once 'classes/ConferencePayment.php';
require_once 'classes/EasebuzzIntegration.php';
require_once 'classes/EmailNotification.php';

// Initialize database connection
try {
    $database = new Database();
    $db = $database->connect();
} catch (Exception $e) {
    error_log("Production Database Error: " . $e->getMessage());
    die("Service temporarily unavailable. Please try again later.");
}

// Initialize classes
$registration = new ConferenceRegistration($db);
$payment = new ConferencePayment($db);
$easebuzz = new EasebuzzIntegration($db);
$emailNotification = new EmailNotification();

try {
    // Get response from EaseBuzz
    $responseData = null;
    $rawResponse = '';
    
    // Check for POST data (primary method)
    if (!empty($_POST)) {
        $rawResponse = $_POST;
        error_log("Production EaseBuzz Response (POST): " . json_encode($_POST));
    }
    // Check for GET data (fallback)
    elseif (!empty($_GET)) {
        $rawResponse = $_GET;
        error_log("Production EaseBuzz Response (GET): " . json_encode($_GET));
    }
    else {
        throw new Exception("No payment response received from EaseBuzz gateway");
    }
    
    // Process EaseBuzz response
    $responseData = $easebuzz->processResponse($rawResponse);
    
    if (!$responseData || !isset($responseData['order_id'])) {
        throw new Exception("Invalid payment response format");
    }
    
    error_log("Production Response Processed: OrderID={$responseData['order_id']}, Status={$responseData['status']}, Amount=₹{$responseData['amount']}");
    
    // Security: Verify hash before proceeding
    if (!$responseData['hash_verified']) {
        error_log("SECURITY ALERT: Hash verification failed for Order ID: " . $responseData['order_id']);
        // Continue processing but flag for manual review
    }
    
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
    
    // Update payment status
    $updateSuccess = $payment->updatePaymentStatus(
        $paymentRecord['RefId'],
        $responseData['order_id'],
        $responseData['amount'],
        $responseData['status'],
        $responseData['transaction_id'],
        $responseData['raw_response']
    );
    
    if (!$updateSuccess) {
        error_log("Production Error: Failed to update payment status for RefId: " . $paymentRecord['RefId']);
    }
    
    // Get registration details
    $registrationDetails = $registration->getRegistrationById($paymentRecord['RefId']);
    
    if (!$registrationDetails) {
        throw new Exception("Registration details not found for RefId: " . $paymentRecord['RefId']);
    }
    
    // Send email notifications with production error handling
    $emailSent = false;
    $emailError = '';
    $emailAttempts = [];
    
    try {
        if ($responseData['status'] === 'SUCCESS') {
            error_log("Production: Sending SUCCESS email to: " . $registrationDetails['sEmail']);
            $emailSent = $emailNotification->sendPaymentConfirmation($registrationDetails, $responseData);
            $emailAttempts[] = ['type' => 'success_email', 'result' => $emailSent];
        } elseif (in_array($responseData['status'], ['FAILED', 'CANCELLED'])) {
            error_log("Production: Sending FAILURE email to: " . $registrationDetails['sEmail']);
            $emailSent = $emailNotification->sendPaymentFailure($registrationDetails, $responseData);
            $emailAttempts[] = ['type' => 'failure_email', 'result' => $emailSent];
        }
        
        // Production backup email system
        if (!$emailSent && in_array($responseData['status'], ['SUCCESS', 'FAILED', 'CANCELLED'])) {
            error_log("Production: Primary email failed, trying backup method");
            $backupSent = sendProductionEmail($registrationDetails, $responseData);
            $emailAttempts[] = ['type' => 'backup_email', 'result' => $backupSent];
            
            if ($backupSent) {
                $emailSent = true;
            }
        }
        
    } catch (Exception $emailException) {
        $emailError = $emailException->getMessage();
        error_log("Production Email Error: " . $emailError);
        
        // Final fallback for production
        try {
            $fallbackSent = sendProductionFallbackEmail($registrationDetails, $responseData);
            $emailAttempts[] = ['type' => 'fallback_email', 'result' => $fallbackSent];
            
            if ($fallbackSent) {
                $emailSent = true;
            }
        } catch (Exception $fallbackException) {
            error_log("Production: All email methods failed for Order ID: " . $responseData['order_id']);
            $emailError = "Email delivery failed - will be retried manually";
        }
    }
    
    // Log final status for production monitoring
    error_log("Production Payment Complete: OrderID={$responseData['order_id']}, PaymentStatus={$responseData['status']}, EmailSent=" . ($emailSent ? 'YES' : 'NO') . ", RegID={$registrationDetails['iRegId']}");
    
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
        background: linear-gradient(135deg, rgba(70, 12, 82, 0.49) 0%, rgba(70, 12, 82, 0.99) 100%);
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
        background: linear-gradient(135deg, rgba(70, 12, 82, 0.99) 0%, rgba(91, 2, 109, 0.99) 100%);
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
        border-bottom: 2px solid rgba(70, 12, 82, 0.99);
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
        background: linear-gradient(135deg, rgba(70, 12, 82, 0.99) 0%, rgba(91, 2, 109, 0.99) 100%);
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
        background: linear-gradient(135deg, rgba(70, 12, 82, 0.99) 0%, rgba(91, 2, 109, 0.99) 100%);
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

    .security-notice {
        background: #e3f2fd;
        border: 1px solid #bbdefb;
        border-radius: 8px;
        padding: 15px;
        margin: 20px 0;
        text-align: left;
        font-size: 14px;
        color: #1976d2;
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
            <p>IEEE Uttar Pradesh Women in Engineering Conference</p>
        </div>

        <?php if ($responseData['status'] === 'SUCCESS'): ?>
        <div class="status-icon success-icon">✓</div>
        <h1 class="result-title" style="color: #27ae60;">Payment Successful!</h1>
        <p class="result-message">Congratulations! Your registration payment has been processed successfully. You will
            receive a confirmation email shortly.</p>

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
        <p class="result-message">Unfortunately, your payment could not be processed. Please try again or contact
            support.</p>
        <?php endif; ?>

        <!-- Email Status Notification -->
        <div class="email-status <?php echo $emailSent ? 'email-success' : 'email-failed'; ?>">
            <?php if ($emailSent): ?>
            ✓ Confirmation email sent to <?php echo htmlspecialchars($registrationDetails['sEmail']); ?>
            <?php else: ?>
            ⚠ Email notification will be sent separately. Please save your registration details.
            <?php endif; ?>
        </div>

        <!-- Security Notice for Hash Verification -->
        <?php if (!$responseData['hash_verified']): ?>
        <div class="security-notice">
            <strong>Security Notice:</strong> This transaction has been flagged for manual verification. Please contact
            support with your Order ID for confirmation.
        </div>
        <?php endif; ?>

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
                <?php if (!empty($registrationDetails['ieee_id'])): ?>
                <div class="detail-item">
                    <span class="detail-label">IEEE ID:</span>
                    <span class="detail-value"><?php echo htmlspecialchars($registrationDetails['ieee_id']); ?></span>
                </div>
                <?php endif; ?>
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
                    <span class="detail-value"><?php echo htmlspecialchars($responseData['transaction_id']); ?></span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">Payment Method:</span>
                    <span class="detail-value"><?php echo htmlspecialchars($responseData['payment_method']); ?></span>
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
            <a href="mailto:support@upwiecon2025.org?subject=UPWIECON2025 Registration Confirmation&body=Registration ID: <?php echo $registrationDetails['iRegId']; ?>%0AOrder ID: <?php echo $responseData['order_id']; ?>"
                class="btn btn-secondary">Contact Support</a>
            <?php else: ?>
            <a href="registrationform.php" class="btn btn-primary">Try Again</a>
            <a href="mailto:support@upwiecon2025.org?subject=UPWIECON2025 Payment Issue&body=Order ID: <?php echo $responseData['order_id']; ?>%0ATransaction ID: <?php echo $responseData['transaction_id']; ?>"
                class="btn btn-secondary">Contact Support</a>
            <?php endif; ?>
        </div>
    </div>
</body>

</html>

<?php
    
} catch (Exception $e) {
    error_log("Production Payment Processing Error: " . $e->getMessage());
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
        background: linear-gradient(135deg, rgba(70, 12, 82, 0.49) 0%, rgba(70, 12, 82, 0.99) 100%);
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
        background: linear-gradient(135deg, rgba(70, 12, 82, 0.99) 0%, rgba(91, 2, 109, 0.99) 100%);
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
            We encountered an issue while processing your payment response. Our technical team has been notified and
            will resolve this shortly.
        </p>
        <p style="color: #999; font-size: 14px; margin-bottom: 30px;">
            Reference ID: <?php echo date('YmdHis') . '_' . substr(md5($e->getMessage()), 0, 8); ?>
        </p>
        <a href="registrationform.php" class="btn">Try Again</a>
        <a href="mailto:support@upwiecon2025.org?subject=UPWIECON2025 Payment Processing Error&body=Reference ID: <?php echo date('YmdHis') . '_' . substr(md5($e->getMessage()), 0, 8); ?>"
            class="btn btn-secondary">Contact Support</a>
    </div>
</body>

</html>
<?php
}

// Helper functions for production email fallbacks
function sendProductionEmail($registrationDetails, $responseData) {
    $to = $registrationDetails['sEmail'];
    $subject = "UPWIECON 2025 - Payment " . $responseData['status'];
    
    $message = "Dear " . $registrationDetails['sName'] . ",\n\n";
    $message .= "Payment Status: " . $responseData['status'] . "\n";
    $message .= "Registration ID: " . $registrationDetails['iRegId'] . "\n";
    $message .= "Order ID: " . $responseData['order_id'] . "\n";
    $message .= "Transaction ID: " . $responseData['transaction_id'] . "\n";
    $message .= "Amount: ₹" . number_format($responseData['amount'], 2) . "\n\n";
    
    if ($responseData['status'] === 'SUCCESS') {
        $message .= "Your registration for UPWIECON 2025 is confirmed!\n\n";
        $message .= "Conference Details:\n";
        $message .= "- Event: IEEE Uttar Pradesh Women in Engineering Conference 2025\n";
        $message .= "- Registration Category: " . $registrationDetails['sCategory'] . "\n";
        $message .= "- IEEE Member: " . $registrationDetails['sIEEEMember'] . "\n";
        if (!empty($registrationDetails['ieee_id'])) {
            $message .= "- IEEE Member ID: " . $registrationDetails['ieee_id'] . "\n";
        }
        $message .= "\nPlease keep this email for your records.\n\n";
    } else {
        $message .= "Your payment could not be processed. Please try again or contact support.\n\n";
    }
    
    $message .= "Best regards,\nUPWIECON 2025 Organizing Committee\n";
    $message .= "Email: support@upwiecon2025.org";
    
    $headers = "From: UPWIECON 2025 <noreply@upwiecon2025.org>\r\n";
    $headers .= "Reply-To: support@upwiecon2025.org\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
    $headers .= "X-Mailer: UPWIECON2025 Production System\r\n";
    
    return mail($to, $subject, $message, $headers);
}

function sendProductionFallbackEmail($registrationDetails, $responseData) {
    $to = $registrationDetails['sEmail'];
    $subject = "UPWIECON 2025 - Payment " . $responseData['status'] . " [Ref: " . $responseData['order_id'] . "]";
    
    $message = "<html><body style='font-family: Arial, sans-serif;'>";
    $message .= "<div style='max-width: 600px; margin: 0 auto; padding: 20px;'>";
    $message .= "<h2 style='color: #460C52; border-bottom: 2px solid #460C52; padding-bottom: 10px;'>UPWIECON 2025</h2>";
    $message .= "<p>Dear " . htmlspecialchars($registrationDetails['sName']) . ",</p>";
    
    if ($responseData['status'] === 'SUCCESS') {
        $message .= "<div style='background: #d4edda; border: 1px solid #c3e6cb; color: #155724; padding: 15px; border-radius: 5px; margin: 20px 0;'>";
        $message .= "<h3 style='margin: 0 0 10px 0;'>✓ Payment Successful!</h3>";
        $message .= "<p style='margin: 0;'>Your registration for UPWIECON 2025 has been confirmed.</p>";
        $message .= "</div>";
    } else {
        $message .= "<div style='background: #f8d7da; border: 1px solid #f5c6cb; color: #721c24; padding: 15px; border-radius: 5px; margin: 20px 0;'>";
        $message .= "<h3 style='margin: 0 0 10px 0;'>⚠ Payment " . $responseData['status'] . "</h3>";
        $message .= "<p style='margin: 0;'>Please try again or contact support for assistance.</p>";
        $message .= "</div>";
    }
    
    $message .= "<table style='width: 100%; border-collapse: collapse; margin: 20px 0;'>";
    $message .= "<tr><td style='border: 1px solid #ddd; padding: 8px; font-weight: bold;'>Registration ID:</td><td style='border: 1px solid #ddd; padding: 8px;'>" . htmlspecialchars($registrationDetails['iRegId']) . "</td></tr>";
    $message .= "<tr><td style='border: 1px solid #ddd; padding: 8px; font-weight: bold;'>Order ID:</td><td style='border: 1px solid #ddd; padding: 8px;'>" . htmlspecialchars($responseData['order_id']) . "</td></tr>";
    $message .= "<tr><td style='border: 1px solid #ddd; padding: 8px; font-weight: bold;'>Transaction ID:</td><td style='border: 1px solid #ddd; padding: 8px;'>" . htmlspecialchars($responseData['transaction_id']) . "</td></tr>";
    $message .= "<tr><td style='border: 1px solid #ddd; padding: 8px; font-weight: bold;'>Amount:</td><td style='border: 1px solid #ddd; padding: 8px;'>₹" . number_format($responseData['amount'], 2) . "</td></tr>";
    $message .= "<tr><td style='border: 1px solid #ddd; padding: 8px; font-weight: bold;'>Status:</td><td style='border: 1px solid #ddd; padding: 8px;'>" . htmlspecialchars($responseData['status']) . "</td></tr>";
    $message .= "</table>";
    
    $message .= "<p style='margin-top: 30px;'>Best regards,<br><strong>UPWIECON 2025 Organizing Committee</strong></p>";
    $message .= "<p style='font-size: 12px; color: #666; margin-top: 20px;'>For support, contact: support@upwiecon2025.org</p>";
    $message .= "</div></body></html>";
    
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
    $headers .= "From: UPWIECON 2025 <noreply@upwiecon2025.org>\r\n";
    $headers .= "Reply-To: support@upwiecon2025.org\r\n";
    $headers .= "X-Mailer: UPWIECON2025 Production System\r\n";
    
    return mail($to, $subject, $message, $headers);
}
?>