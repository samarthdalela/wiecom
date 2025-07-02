<?php
// classes/EmailNotification.php - Enhanced with better error handling and multiple delivery methods
class EmailNotification {
    private $fromEmail = 'samarthdalela@gmail.com';
    private $fromName = 'UPWIECON 2025';
    private $replyToEmail = 'ieeeconference@nielit.ac.in';
    private $appPassword = 'nugv adhg dxez jdqf'; // Gmail App Password
    private $debugMode = true;
    private $maxRetries = 3;
    private $retryDelay = 2; // seconds
    
    public function __construct() {
        date_default_timezone_set('Asia/Kolkata');
        
        // Ensure logs directory exists
        if (!is_dir('logs')) {
            mkdir('logs', 0755, true);
        }
    }
    
    public function sendPaymentConfirmation($registrationDetails, $paymentDetails) {
        $to = $registrationDetails['sEmail'];
        $subject = 'UPWIECON 2025 - Payment Confirmation & Registration Success';
        $htmlMessage = $this->getSuccessEmailTemplate($registrationDetails, $paymentDetails);
        $textMessage = $this->getSuccessEmailTextTemplate($registrationDetails, $paymentDetails);
        
        $this->logEmailAttempt('PAYMENT_SUCCESS', $to, $subject, $paymentDetails['order_id']);
        
        $result = $this->sendEmailWithRetry($to, $subject, $htmlMessage, $textMessage);
        
        $this->logEmailResult($to, $result ? 'SUCCESS' : 'FAILED', 'Payment confirmation email', $paymentDetails['order_id']);
        
        return $result;
    }
    
    public function sendPaymentFailure($registrationDetails, $paymentDetails) {
        $to = $registrationDetails['sEmail'];
        $subject = 'UPWIECON 2025 - Payment Issue Notification';
        $htmlMessage = $this->getFailureEmailTemplate($registrationDetails, $paymentDetails);
        $textMessage = $this->getFailureEmailTextTemplate($registrationDetails, $paymentDetails);
        
        $this->logEmailAttempt('PAYMENT_FAILED', $to, $subject, $paymentDetails['order_id']);
        
        $result = $this->sendEmailWithRetry($to, $subject, $htmlMessage, $textMessage);
        
        $this->logEmailResult($to, $result ? 'SUCCESS' : 'FAILED', 'Payment failure email', $paymentDetails['order_id']);
        
        return $result;
    }
    
    private function sendEmailWithRetry($to, $subject, $htmlMessage, $textMessage = '') {
        $attempts = 0;
        $lastError = '';
        
        while ($attempts < $this->maxRetries) {
            $attempts++;
            
            try {
                // Method 1: Try enhanced mail() with optimal headers
                $result = $this->sendViaEnhancedMail($to, $subject, $htmlMessage, $textMessage);
                
                if ($result) {
                    $this->logEmailResult($to, 'SUCCESS', "Enhanced mail() method - attempt $attempts");
                    return true;
                }
                
                // Method 2: Try basic HTML mail
                $result = $this->sendViaBasicHTMLMail($to, $subject, $htmlMessage);
                
                if ($result) {
                    $this->logEmailResult($to, 'SUCCESS', "Basic HTML mail() method - attempt $attempts");
                    return true;
                }
                
                // Method 3: Try plain text mail as fallback
                $result = $this->sendViaPlainTextMail($to, $subject, $textMessage ?: strip_tags($htmlMessage));
                
                if ($result) {
                    $this->logEmailResult($to, 'SUCCESS', "Plain text mail() method - attempt $attempts");
                    return true;
                }
                
                $lastError = "All mail methods failed on attempt $attempts";
                
            } catch (Exception $e) {
                $lastError = "Exception on attempt $attempts: " . $e->getMessage();
                $this->logEmailResult($to, 'ERROR', $lastError);
            }
            
            // Wait before retry (except on last attempt)
            if ($attempts < $this->maxRetries) {
                sleep($this->retryDelay);
            }
        }
        
        $this->logEmailResult($to, 'FAILED', "All $attempts attempts failed. Last error: $lastError");
        return false;
    }
    
    private function sendViaEnhancedMail($to, $subject, $htmlMessage, $textMessage = '') {
        try {
            // Create multipart boundary
            $boundary = md5(time() . rand());
            
            // Enhanced headers for better deliverability
            $headers = "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: multipart/alternative; boundary=\"$boundary\"\r\n";
            $headers .= "From: {$this->fromName} <{$this->fromEmail}>\r\n";
            $headers .= "Reply-To: {$this->replyToEmail}\r\n";
            $headers .= "Return-Path: {$this->fromEmail}\r\n";
            $headers .= "X-Mailer: UPWIECON2025-PHP/" . phpversion() . "\r\n";
            $headers .= "X-Priority: 3\r\n";
            $headers .= "X-MSMail-Priority: Normal\r\n";
            $headers .= "Importance: Normal\r\n";
            $headers .= "Message-ID: <" . time() . "." . md5($to . $subject) . "@" . ($_SERVER['HTTP_HOST'] ?? 'nielit.ac.in') . ">\r\n";
            $headers .= "Date: " . date('r') . "\r\n";
            
            // Build multipart body
            $body = "--$boundary\r\n";
            
            // Plain text part
            if (!empty($textMessage)) {
                $body .= "Content-Type: text/plain; charset=UTF-8\r\n";
                $body .= "Content-Transfer-Encoding: 8bit\r\n\r\n";
                $body .= $textMessage . "\r\n\r\n";
                $body .= "--$boundary\r\n";
            }
            
            // HTML part
            $body .= "Content-Type: text/html; charset=UTF-8\r\n";
            $body .= "Content-Transfer-Encoding: 8bit\r\n\r\n";
            $body .= $htmlMessage . "\r\n\r\n";
            $body .= "--$boundary--";
            
            // Additional parameters for better delivery
            $additionalParams = "-f {$this->fromEmail}";
            
            return mail($to, $subject, $body, $headers, $additionalParams);
            
        } catch (Exception $e) {
            error_log("Enhanced mail error: " . $e->getMessage());
            return false;
        }
    }
    
    private function sendViaBasicHTMLMail($to, $subject, $htmlMessage) {
        try {
            $headers = "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
            $headers .= "From: {$this->fromName} <{$this->fromEmail}>\r\n";
            $headers .= "Reply-To: {$this->replyToEmail}\r\n";
            $headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";
            
            return mail($to, $subject, $htmlMessage, $headers);
            
        } catch (Exception $e) {
            error_log("Basic HTML mail error: " . $e->getMessage());
            return false;
        }
    }
    
    private function sendViaPlainTextMail($to, $subject, $textMessage) {
        try {
            $headers = "From: {$this->fromName} <{$this->fromEmail}>\r\n";
            $headers .= "Reply-To: {$this->replyToEmail}\r\n";
            $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
            
            return mail($to, $subject, $textMessage, $headers);
            
        } catch (Exception $e) {
            error_log("Plain text mail error: " . $e->getMessage());
            return false;
        }
    }
    
    // Test email function with enhanced debugging
    public function sendTestEmail($to = null, $testType = 'basic') {
        $testTo = $to ?? $this->fromEmail;
        $subject = 'UPWIECON 2025 - Email System Test (' . strtoupper($testType) . ')';
        $htmlMessage = $this->getTestEmailTemplate($testType);
        $textMessage = $this->getTestEmailTextTemplate($testType);
        
        $this->logEmailAttempt('TEST_EMAIL', $testTo, $subject, 'TEST_' . time());
        
        $result = $this->sendEmailWithRetry($testTo, $subject, $htmlMessage, $textMessage);
        
        $this->logEmailResult($testTo, $result ? 'SUCCESS' : 'FAILED', "Test email ($testType)");
        
        return $result;
    }
    
    private function getTestEmailTemplate($testType = 'basic') {
        $timestamp = date('Y-m-d H:i:s');
        $serverInfo = [
            'PHP Version' => phpversion(),
            'Server' => $_SERVER['HTTP_HOST'] ?? 'unknown',
            'Mail Function' => function_exists('mail') ? 'Available' : 'Not Available',
            'Test Type' => strtoupper($testType),
            'Timestamp' => $timestamp
        ];
        
        return '
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Email System Test</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; background: #f5f5f5; margin: 0; padding: 20px; }
        .container { max-width: 600px; margin: 0 auto; background: white; border-radius: 10px; overflow: hidden; box-shadow: 0 0 20px rgba(0,0,0,0.1); }
        .header { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 30px; text-align: center; }
        .content { padding: 30px; }
        .success { background: #d4edda; color: #155724; padding: 15px; border-radius: 8px; margin: 20px 0; border-left: 4px solid #28a745; }
        .info-table { width: 100%; border-collapse: collapse; margin: 20px 0; }
        .info-table th, .info-table td { padding: 12px; text-align: left; border-bottom: 1px solid #ddd; }
        .info-table th { background: #f8f9fa; font-weight: bold; }
        .footer { background: #f8f9fa; padding: 20px; text-align: center; color: #666; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🎉 UPWIECON 2025</h1>
            <p>Email System Test - ' . strtoupper($testType) . '</p>
        </div>
        <div class="content">
            <div class="success">
                <h2>✅ Email System Working Successfully!</h2>
                <p>This test email confirms that the email notification system is functioning properly.</p>
            </div>
            
            <h3>System Information:</h3>
            <table class="info-table">
                ' . implode('', array_map(function($key, $value) {
                    return "<tr><th>$key</th><td>$value</td></tr>";
                }, array_keys($serverInfo), $serverInfo)) . '
            </table>
            
            <h3>Test Details:</h3>
            <p>If you received this email, the UPWIECON 2025 email notification system is configured correctly and ready to send registration confirmations and payment notifications.</p>
            
            <div style="background: #e3f2fd; padding: 15px; border-radius: 8px; margin: 20px 0;">
                <h4 style="margin-top: 0; color: #1976d2;">Next Steps:</h4>
                <ul>
                    <li>✅ Email delivery system is working</li>
                    <li>✅ HTML formatting is supported</li>
                    <li>✅ Headers and encoding are correct</li>
                    <li>🔄 System ready for production use</li>
                </ul>
            </div>
        </div>
        <div class="footer">
            <p>UPWIECON 2025 - IEEE Uttarakhand Women in Engineering Conference<br>
            <small>This is an automated test email from the registration system.</small></p>
        </div>
    </div>
</body>
</html>';
    }
    
    private function getTestEmailTextTemplate($testType = 'basic') {
        return "UPWIECON 2025 - Email System Test (" . strtoupper($testType) . ")

✅ EMAIL SYSTEM WORKING SUCCESSFULLY!

This test email confirms that the email notification system is functioning properly.

System Information:
- PHP Version: " . phpversion() . "
- Server: " . ($_SERVER['HTTP_HOST'] ?? 'unknown') . "
- Mail Function: " . (function_exists('mail') ? 'Available' : 'Not Available') . "
- Test Type: " . strtoupper($testType) . "
- Timestamp: " . date('Y-m-d H:i:s') . "

If you received this email, the UPWIECON 2025 email notification system is configured correctly and ready to send registration confirmations and payment notifications.

Next Steps:
✅ Email delivery system is working
✅ Text formatting is supported  
✅ Headers and encoding are correct
🔄 System ready for production use

---
UPWIECON 2025 - IEEE Uttarakhand Women in Engineering Conference
This is an automated test email from the registration system.";
    }
    
    private function getSuccessEmailTemplate($registration, $payment) {
        return '
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Registration Confirmation - UPWIECON 2025</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; margin: 0; padding: 0; background: #f5f5f5; }
        .container { max-width: 600px; margin: 0 auto; background: white; border-radius: 15px; overflow: hidden; box-shadow: 0 0 30px rgba(0,0,0,0.1); }
        .header { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 30px; text-align: center; }
        .content { padding: 30px; }
        .success-badge { background: #d4edda; color: #155724; padding: 20px; border-radius: 10px; text-align: center; margin: 20px 0; border: 2px solid #c3e6cb; }
        .details-table { width: 100%; border-collapse: collapse; margin: 20px 0; }
        .details-table th, .details-table td { padding: 12px; text-align: left; border-bottom: 1px solid #ddd; }
        .details-table th { background: #f8f9fa; font-weight: bold; width: 40%; }
        .amount-highlight { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 20px; text-align: center; border-radius: 10px; margin: 20px 0; }
        .footer { background: #f8f9fa; padding: 20px; text-align: center; color: #666; }
        .important-note { background: #fff3cd; border: 1px solid #ffeaa7; color: #856404; padding: 15px; border-radius: 8px; margin: 20px 0; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🎉 UPWIECON 2025</h1>
            <p>IEEE Uttarakhand Women in Engineering Conference</p>
            <h2>Registration Confirmed!</h2>
        </div>
        
        <div class="content">
            <div class="success-badge">
                <h2 style="margin: 0; font-size: 24px;">✅ Payment Successful!</h2>
                <p style="margin: 10px 0 0 0;">Your registration has been confirmed</p>
            </div>
            
            <p>Dear <strong>' . htmlspecialchars($registration['sName']) . '</strong>,</p>
            
            <p>Congratulations! Your registration payment has been processed successfully. Your participation in UPWIECON 2025 is now confirmed.</p>
            
            <h3>Registration Details:</h3>
            <table class="details-table">
                <tr><th>Registration ID</th><td><strong>' . htmlspecialchars($registration['iRegId']) . '</strong></td></tr>
                <tr><th>Order ID</th><td>' . htmlspecialchars($payment['order_id']) . '</td></tr>
                <tr><th>Transaction ID</th><td>' . htmlspecialchars($payment['txn_id']) . '</td></tr>
                <tr><th>Participant Name</th><td>' . htmlspecialchars($registration['sName']) . '</td></tr>
                <tr><th>Email</th><td>' . htmlspecialchars($registration['sEmail']) . '</td></tr>
                <tr><th>Mobile</th><td>' . htmlspecialchars($registration['sMobile']) . '</td></tr>
                <tr><th>Category</th><td>' . htmlspecialchars($registration['sCategory']) . '</td></tr>
                <tr><th>IEEE Member</th><td>' . htmlspecialchars($registration['sIEEEMember']) . '</td></tr>
                <tr><th>Nationality</th><td>' . htmlspecialchars($registration['sNationality']) . '</td></tr>
                <tr><th>Payment Date</th><td>' . date('d M Y, h:i A') . '</td></tr>
            </table>
            
            <div class="amount-highlight">
                <h3 style="margin: 0 0 10px 0;">Registration Fee Paid</h3>
                <div style="font-size: 28px; font-weight: bold;">₹' . number_format($payment['amount'], 2) . '</div>
            </div>
            
            <div class="important-note">
                <h4 style="margin-top: 0;">📋 Important Information:</h4>
                <ul style="margin: 0; padding-left: 20px;">
                    <li><strong>Save your Registration ID:</strong> ' . htmlspecialchars($registration['iRegId']) . '</li>
                    <li>Conference dates: <strong>30-31 October 2025</strong></li>
                    <li>Venue: <strong>Jaypee Residency Manor, Mussoorie, Uttarakhand</strong></li>
                    <li>Conference details and schedule will be sent closer to the event date</li>
                    <li>For any queries, contact: <strong>ieeeconference@nielit.ac.in</strong></li>
                </ul>
            </div>
            
            <p>Thank you for registering for UPWIECON 2025. We look forward to your participation in this prestigious conference!</p>
            
            <p>Best regards,<br>
            <strong>UPWIECON 2025 Organizing Team</strong><br>
            IEEE Uttarakhand Section Women in Engineering</p>
        </div>
        
        <div class="footer">
            <p><strong>UPWIECON 2025</strong><br>
            IEEE Uttarakhand Women in Engineering Conference<br>
            <small>This is an automated confirmation email. Please do not reply to this email.</small></p>
        </div>
    </div>
</body>
</html>';
    }
    
    private function getSuccessEmailTextTemplate($registration, $payment) {
        return "UPWIECON 2025 - Registration Confirmation

Dear " . $registration['sName'] . ",

✅ PAYMENT SUCCESSFUL!

Congratulations! Your registration payment has been processed successfully. Your participation in UPWIECON 2025 is now confirmed.

REGISTRATION DETAILS:
Registration ID: " . $registration['iRegId'] . "
Order ID: " . $payment['order_id'] . "
Transaction ID: " . $payment['txn_id'] . "
Participant Name: " . $registration['sName'] . "
Email: " . $registration['sEmail'] . "
Mobile: " . $registration['sMobile'] . "
Category: " . $registration['sCategory'] . "
IEEE Member: " . $registration['sIEEEMember'] . "
Nationality: " . $registration['sNationality'] . "
Payment Date: " . date('d M Y, h:i A') . "

REGISTRATION FEE PAID: ₹" . number_format($payment['amount'], 2) . "

IMPORTANT INFORMATION:
• Save your Registration ID: " . $registration['iRegId'] . "
• Conference dates: 30-31 October 2025
• Venue: Jaypee Residency Manor, Mussoorie, Uttarakhand
• Conference details and schedule will be sent closer to the event date
• For any queries, contact: ieeeconference@nielit.ac.in

Thank you for registering for UPWIECON 2025. We look forward to your participation in this prestigious conference!

Best regards,
UPWIECON 2025 Organizing Team
IEEE Uttarakhand Section Women in Engineering

---
This is an automated confirmation email. Please do not reply to this email.";
    }
    
    private function getFailureEmailTemplate($registration, $payment) {
        return '
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Payment Issue - UPWIECON 2025</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; margin: 0; padding: 0; background: #f5f5f5; }
        .container { max-width: 600px; margin: 0 auto; background: white; border-radius: 15px; overflow: hidden; box-shadow: 0 0 30px rgba(0,0,0,0.1); }
        .header { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 30px; text-align: center; }
        .content { padding: 30px; }
        .failure-badge { background: #f8d7da; color: #721c24; padding: 20px; border-radius: 10px; text-align: center; margin: 20px 0; border: 2px solid #f5c6cb; }
        .details-table { width: 100%; border-collapse: collapse; margin: 20px 0; }
        .details-table th, .details-table td { padding: 12px; text-align: left; border-bottom: 1px solid #ddd; }
        .details-table th { background: #f8f9fa; font-weight: bold; width: 40%; }
        .retry-section { background: #e3f2fd; padding: 20px; border-radius: 10px; margin: 20px 0; }
        .footer { background: #f8f9fa; padding: 20px; text-align: center; color: #666; }
        .btn { display: inline-block; padding: 12px 24px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; text-decoration: none; border-radius: 8px; font-weight: bold; margin: 10px 5px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>UPWIECON 2025</h1>
            <p>IEEE Uttarakhand Women in Engineering Conference</p>
            <h2>Payment Issue Notification</h2>
        </div>
        
        <div class="content">
            <div class="failure-badge">
                <h2 style="margin: 0; font-size: 24px;">⚠️ Payment Not Completed</h2>
                <p style="margin: 10px 0 0 0;">Your registration is saved, but payment needs to be completed</p>
            </div>
            
            <p>Dear <strong>' . htmlspecialchars($registration['sName']) . '</strong>,</p>
            
            <p>We received your registration for UPWIECON 2025, but unfortunately, your payment could not be processed at this time. Your registration details have been saved securely.</p>
            
            <h3>Registration Details:</h3>
            <table class="details-table">
                <tr><th>Registration ID</th><td><strong>' . htmlspecialchars($registration['iRegId']) . '</strong></td></tr>
                <tr><th>Order ID</th><td>' . htmlspecialchars($payment['order_id']) . '</td></tr>
                <tr><th>Participant Name</th><td>' . htmlspecialchars($registration['sName']) . '</td></tr>
                <tr><th>Email</th><td>' . htmlspecialchars($registration['sEmail']) . '</td></tr>
                <tr><th>Category</th><td>' . htmlspecialchars($registration['sCategory']) . '</td></tr>
                <tr><th>Registration Fee</th><td><strong>₹' . number_format($payment['amount'], 2) . '</strong></td></tr>
                <tr><th>Payment Status</th><td><span style="color: #721c24; font-weight: bold;">' . htmlspecialchars($payment['status']) . '</span></td></tr>
            </table>
            
            <div class="retry-section">
                <h3 style="margin-top: 0; color: #1976d2;">💡 Next Steps:</h3>
                <ul style="margin: 0; padding-left: 20px;">
                    <li><strong>Try again:</strong> You can retry the payment using the same registration details</li>
                    <li><strong>Check payment method:</strong> Ensure your card/bank account has sufficient funds</li>
                    <li><strong>Contact support:</strong> If the issue persists, please contact our support team</li>
                    <li><strong>Registration saved:</strong> Your registration ID (' . htmlspecialchars($registration['iRegId']) . ') is saved for future reference</li>
                </ul>
            </div>
            
            <div style="text-align: center; margin: 30px 0;">
                <a href="' . ($_SERVER['HTTP_HOST'] ?? 'www.nielit.ac.in') . '/upwiecon2025/registrationform.php" class="btn">Try Payment Again</a>
                <a href="mailto:ieeeconference@nielit.ac.in?subject=UPWIECON2025 Payment Issue - Reg ID: ' . htmlspecialchars($registration['iRegId']) . '" class="btn" style="background: #6c757d;">Contact Support</a>
            </div>
            
            <p><strong>Important:</strong> Your registration will be confirmed only after successful payment completion. Please complete the payment to secure your participation in UPWIECON 2025.</p>
            
            <p>Best regards,<br>
            <strong>UPWIECON 2025 Organizing Team</strong><br>
            IEEE Uttarakhand Section Women in Engineering</p>
        </div>
        
        <div class="footer">
            <p><strong>UPWIECON 2025</strong><br>
            IEEE Uttarakhand Women in Engineering Conference<br>
            <small>For support: ieeeconference@nielit.ac.in | Phone: (+91) 9650339961</small></p>
        </div>
    </div>
</body>
</html>';
    }
    
    private function getFailureEmailTextTemplate($registration, $payment) {
        return "UPWIECON 2025 - Payment Issue Notification

Dear " . $registration['sName'] . ",

⚠️ PAYMENT NOT COMPLETED

We received your registration for UPWIECON 2025, but unfortunately, your payment could not be processed at this time. Your registration details have been saved securely.

REGISTRATION DETAILS:
Registration ID: " . $registration['iRegId'] . "
Order ID: " . $payment['order_id'] . "
Participant Name: " . $registration['sName'] . "
Email: " . $registration['sEmail'] . "
Category: " . $registration['sCategory'] . "
Registration Fee: ₹" . number_format($payment['amount'], 2) . "
Payment Status: " . $payment['status'] . "

NEXT STEPS:
• Try again: You can retry the payment using the same registration details
• Check payment method: Ensure your card/bank account has sufficient funds  
• Contact support: If the issue persists, please contact our support team
• Registration saved: Your registration ID (" . $registration['iRegId'] . ") is saved for future reference

To retry payment, visit: " . ($_SERVER['HTTP_HOST'] ?? 'www.nielit.ac.in') . "/upwiecon2025/registrationform.php

For support, email: ieeeconference@nielit.ac.in
Subject: UPWIECON2025 Payment Issue - Reg ID: " . $registration['iRegId'] . "

IMPORTANT: Your registration will be confirmed only after successful payment completion. Please complete the payment to secure your participation in UPWIECON 2025.

Best regards,
UPWIECON 2025 Organizing Team
IEEE Uttarakhand Section Women in Engineering

---
For support: ieeeconference@nielit.ac.in | Phone: (+91) 9650339961";
    }
    
    private function logEmailAttempt($type, $to, $subject, $orderId = null) {
        $logData = [
            'timestamp' => date('Y-m-d H:i:s'),
            'type' => $type,
            'to' => $to,
            'subject' => $subject,
            'order_id' => $orderId,
            'server' => $_SERVER['HTTP_HOST'] ?? 'unknown',
            'ip' => $_SERVER['REMOTE_ADDR'] ?? 'unknown'
        ];
        
        if ($this->debugMode) {
            error_log("EMAIL ATTEMPT: " . json_encode($logData));
        }
        
        // Log to daily file
        $this->writeToLogFile('email_attempts', $logData);
    }
    
    private function logEmailResult($to, $status, $method, $orderId = null) {
        $logData = [
            'timestamp' => date('Y-m-d H:i:s'),
            'to' => $to,
            'status' => $status,
            'method' => $method,
            'order_id' => $orderId
        ];
        
        error_log("EMAIL RESULT: " . json_encode($logData));
        
        // Log to daily file
        $this->writeToLogFile('email_results', $logData);
    }
    
    private function writeToLogFile($logType, $data) {
        try {
            $logFile = 'logs/' . $logType . '_' . date('Y-m-d') . '.txt';
            $logLine = date('Y-m-d H:i:s') . " | " . json_encode($data) . "\n";
            file_put_contents($logFile, $logLine, FILE_APPEND | LOCK_EX);
        } catch (Exception $e) {
            error_log("Failed to write to log file: " . $e->getMessage());
        }
    }
    
    // Configuration and diagnostic methods
    public function checkEmailConfig() {
        return [
            'mail_function' => function_exists('mail'),
            'from_email' => $this->fromEmail,
            'reply_to_email' => $this->replyToEmail,
            'server_name' => $_SERVER['HTTP_HOST'] ?? 'unknown',
            'php_version' => phpversion(),
            'date_time' => date('Y-m-d H:i:s'),
            'timezone' => date_default_timezone_get(),
            'logs_directory' => is_dir('logs') && is_writable('logs'),
            'max_retries' => $this->maxRetries,
            'retry_delay' => $this->retryDelay . ' seconds'
        ];
    }
    
    public function getEmailLogs($date = null) {
        $date = $date ?? date('Y-m-d');
        $logs = [];
        
        $attemptsFile = 'logs/email_attempts_' . $date . '.txt';
        $resultsFile = 'logs/email_results_' . $date . '.txt';
        
        if (file_exists($attemptsFile)) {
            $logs['attempts'] = file($attemptsFile, FILE_IGNORE_NEW_LINES);
        }
        
        if (file_exists($resultsFile)) {
            $logs['results'] = file($resultsFile, FILE_IGNORE_NEW_LINES);
        }
        
        return $logs;
    }
    
    public function sendBulkTestEmails($emails, $testType = 'basic') {
        $results = [];
        
        foreach ($emails as $email) {
            $result = $this->sendTestEmail($email, $testType);
            $results[$email] = $result;
            
            // Small delay between emails to avoid overwhelming the server
            usleep(500000); // 0.5 seconds
        }
        
        return $results;
    }
}
?>