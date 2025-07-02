<?php
// payment_response.php - Conference Payment Response Handler
session_start();

// Include required files
require_once 'config/database.php';
require_once 'classes/ConferenceRegistration.php';
require_once 'classes/ConferencePayment.php';
require_once 'classes/BillDeskIntegration.php';
require_once 'classes/EmailNotification.php';

// Initialize database connection
$database = new Database();
$db = $database->connect();

// Initialize classes
$registration = new ConferenceRegistration($db);
$payment = new ConferencePayment($db);
$billDesk = new BillDeskIntegration($db);
$emailNotification = new EmailNotification();

try {
    // Get response from BillDesk
    $response = $_POST['msg'] ?? '';
    
    if (empty($response)) {
        throw new Exception("No payment response received");
    }
    
    // Process BillDesk response
    $responseData = $billDesk->processResponse($response);
    
    // Get payment record
    $paymentRecord = $payment->getPaymentByOrderId($responseData['order_id']);
    
    if (!$paymentRecord) {
        throw new Exception("Payment record not found");
    }
    
    // Update payment status
    $payment->updatePaymentStatus(
        $paymentRecord['RefId'],
        $responseData['order_id'],
        $responseData['amount'],
        $responseData['status'],
        $responseData['txn_id'],
        $responseData['raw_response']
    );
    
    // Get registration details
    $registrationDetails = $registration->getRegistrationById($paymentRecord['RefId']);
    
    // Log the email attempt details
    error_log("EMAIL ATTEMPT: Status=" . $responseData['status'] . ", Email=" . $registrationDetails['sEmail'] . ", OrderID=" . $responseData['order_id']);
    
    // Send email notifications with detailed logging
    $emailSent = false;
    $emailError = '';
    
    try {
        if ($responseData['status'] === 'SUCCESS') {
            error_log("Attempting to send SUCCESS email to: " . $registrationDetails['sEmail']);
            $emailSent = $emailNotification->sendPaymentConfirmation($registrationDetails, $responseData);
            error_log("SUCCESS email result: " . ($emailSent ? 'SENT' : 'FAILED'));
        } elseif ($responseData['status'] === 'FAILED' || $responseData['status'] === 'CANCELLED') {
            error_log("Attempting to send FAILURE email to: " . $registrationDetails['sEmail']);
            $emailSent = $emailNotification->sendPaymentFailure($registrationDetails, $responseData);
            error_log("FAILURE email result: " . ($emailSent ? 'SENT' : 'FAILED'));
        }
        
        // If email failed, try a simple backup email
        if (!$emailSent && ($responseData['status'] === 'SUCCESS' || $responseData['status'] === 'FAILED' || $responseData['status'] === 'CANCELLED')) {
            error_log("Primary email failed, trying backup method");
            $emailSent = $emailNotification->sendTestEmail($registrationDetails['sEmail']);
            error_log("Backup email result: " . ($emailSent ? 'SENT' : 'FAILED'));
        }
        
    } catch (Exception $emailException) {
        $emailError = $emailException->getMessage();
        error_log("Email notification error: " . $emailError);
        
        // Try simple fallback email
        try {
            $fallbackSubject = "UPWIECON 2025 - Payment " . $responseData['status'];
            $fallbackMessage = "Dear " . $registrationDetails['sName'] . ",\n\n";
            $fallbackMessage .= "Your payment status: " . $responseData['status'] . "\n";
            $fallbackMessage .= "Registration ID: " . $registrationDetails['iRegId'] . "\n";
            $fallbackMessage .= "Order ID: " . $responseData['order_id'] . "\n\n";
            $fallbackMessage .= "Best regards,\nUPWIECON 2025 Team";
            
            $fallbackHeaders = "From: samarthdalela@gmail.com\r\nContent-Type: text/plain; charset=UTF-8";
            
            $fallbackResult = mail($registrationDetails['sEmail'], $fallbackSubject, $fallbackMessage, $fallbackHeaders);
            error_log("Fallback email result: " . ($fallbackResult ? 'SENT' : 'FAILED'));
            
            if ($fallbackResult) {
                $emailSent = true;
            }
            
        } catch (Exception $fallbackException) {
            error_log("Fallback email also failed: " . $fallbackException->getMessage());
        }
    }
    
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

    .conference-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 20px;
        border-radius: 8px;
        margin-bottom: 30px;
    }

    .conference-title {
        font-size: 24px;
        margin-bottom: 5px;
    }

    .conference-subtitle {
        font-size: 16px;
        opacity: 0.9;
    }

    .email-status {
        background: #fff3cd;
        border: 1px solid #ffeaa7;
        color: #856404;
        padding: 10px;
        border-radius: 5px;
        margin: 15px 0;
        font-size: 14px;
    }

    .email-success {
        background: #d4edda;
        border-color: #c3e6cb;
        color: #155724;
    }

    .email-failed {
        background: #f8d7da;
        border-color: #f5c6cb;
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

    .amount-label {
        font-size: 16px;
        margin-bottom: 5px;
    }

    .amount-value {
        font-size: 28px;
        font-weight: bold;
    }

    .action-buttons {
        margin-top: 30px;
        display: flex;
        gap: 15px;
        justify-content: center;
        flex-wrap: wrap;
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

    .btn-success {
        background: linear-gradient(135deg, #27ae60, #2ecc71);
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

    .status-success {
        background: #d4edda;
        color: #155724;
    }

    .status-failed {
        background: #f8d7da;
        color: #721c24;
    }

    .status-pending {
        background: #fff3cd;
        color: #856404;
    }

    .status-cancelled {
        background: #e2e3e5;
        color: #383d41;
    }

    @media (max-width: 768px) {
        .detail-grid {
            grid-template-columns: 1fr;
        }

        .action-buttons {
            flex-direction: column;
            align-items: center;
        }

        .btn {
            width: 100%;
            max-width: 300px;
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
            <div class="conference-title">UPWIECON 2025</div>
            <div class="conference-subtitle">IEEE Uttarakhand Women in Engineering Conference</div>
        </div>

        <?php if ($responseData['status'] === 'SUCCESS'): ?>
        <div class="status-icon success-icon">✓</div>
        <h1 class="result-title" style="color: #27ae60;">Payment Successful!</h1>
        <p class="result-message">
            Congratulations! Your registration payment has been processed successfully.
        </p>
        <?php elseif ($responseData['status'] === 'PENDING'): ?>
        <div class="status-icon pending-icon">⏳</div>
        <h1 class="result-title" style="color: #f39c12;">Payment Pending</h1>
        <p class="result-message">
            Your payment is being processed. You will receive a confirmation once the payment is completed.
        </p>
        <?php elseif ($responseData['status'] === 'CANCELLED'): ?>
        <div class="status-icon cancelled-icon">✕</div>
        <h1 class="result-title" style="color: #95a5a6;">Payment Cancelled</h1>
        <p class="result-message">
            Your payment was cancelled. Your registration details have been saved and you can complete the payment
            later.
        </p>
        <?php else: ?>
        <div class="status-icon failure-icon">✕</div>
        <h1 class="result-title" style="color: #e74c3c;">Payment Failed</h1>
        <p class="result-message">
            Unfortunately, your payment could not be processed. Your registration details have been saved for your
            convenience.
        </p>
        <?php endif; ?>

        <!-- Email Status Notification -->
        <?php if ($responseData['status'] === 'SUCCESS' || $responseData['status'] === 'FAILED' || $responseData['status'] === 'CANCELLED'): ?>
        <div class="email-status <?php echo $emailSent ? 'email-success' : 'email-failed'; ?>">
            <?php if ($emailSent): ?>
            ✓ Email notification sent successfully to <?php echo htmlspecialchars($registrationDetails['sEmail']); ?>
            <?php else: ?>
            ⚠ Email notification could not be sent. Please save your registration details.
            <?php if (!empty($emailError)): ?>
            <br><small>Error: <?php echo htmlspecialchars($emailError); ?></small>
            <?php endif; ?>
            <?php endif; ?>
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
                    <span class="detail-label">Participant Name:</span>
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
                    <span class="detail-label">Payment Status:</span>
                    <span class="detail-value">
                        <span class="status-badge status-<?php echo strtolower($responseData['status']); ?>">
                            <?php echo $responseData['status']; ?>
                        </span>
                    </span>
                </div>

                <div class="detail-item">
                    <span class="detail-label">Response Message:</span>
                    <span class="detail-value"><?php echo htmlspecialchars($responseData['response_message']); ?></span>
                </div>
            </div>

            <div class="amount-highlight">
                <div class="amount-label">Registration Fee</div>
                <div class="amount-value">₹<?php echo number_format($responseData['amount'], 2); ?></div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="action-buttons">
            <?php if ($responseData['status'] === 'SUCCESS'): ?>
            <a href="mailto:support@nielit.ac.in?subject=UPWIECON2025 Registration Confirmation&body=Registration ID: <?php echo $registrationDetails['iRegId']; ?>"
                class="btn btn-secondary">
                Contact Support
            </a>
            <?php elseif ($responseData['status'] === 'FAILED' || $responseData['status'] === 'CANCELLED'): ?>
            <a href="registrationform.php" class="btn btn-primary">
                Try Again
            </a>
            <a href="mailto:support@nielit.ac.in?subject=UPWIECON2025 Payment Issue&body=Order ID: <?php echo $responseData['order_id']; ?>"
                class="btn btn-secondary">
                Contact Support
            </a>
            <?php else: ?>
            <a href="mailto:support@nielit.ac.in?subject=UPWIECON2025 Payment Query&body=Order ID: <?php echo $responseData['order_id']; ?>"
                class="btn btn-secondary">
                Contact Support
            </a>
            <?php endif; ?>
        </div>

        <?php if ($responseData['status'] === 'SUCCESS'): ?>
        <div style="margin-top: 30px; padding: 20px; background: #e8f5e8; border-radius: 8px;">
            <h4 style="color: #27ae60; margin-bottom: 10px;">Next Steps:</h4>
            <ul style="text-align: left; color: #666; line-height: 1.6;">
                <li>Please save your Registration ID: <strong><?php echo $registrationDetails['iRegId']; ?></strong>
                </li>
                <li>Conference details and schedule will be sent closer to the event date</li>
                <li>For any queries, contact us at support@nielit.ac.in</li>
                <?php if (!$emailSent): ?>
                <li><strong>Important:</strong> Email notification failed. Please contact support with your Registration
                    ID.</li>
                <?php endif; ?>
            </ul>
        </div>
        <?php endif; ?>
    </div>
</body>

</html>

<?php
    
} catch (Exception $e) {
    // Log the main error
    error_log("Payment processing error: " . $e->getMessage());
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
            An error occurred while processing your payment response.
            Please try again or contact support for assistance.
        </p>
        <p style="color: #999; font-size: 14px; margin-bottom: 30px;">
            Error: <?php echo htmlspecialchars($e->getMessage()); ?>
        </p>
        <a href="registrationform.php" class="btn">Try Again</a>
        <a href="mailto:samarthdalela@gmail.com?subject=UPWIECON2025 Payment Error" class="btn btn-secondary">Contact
            Support</a>
    </div>
</body>

</html>
<?php
}
?>