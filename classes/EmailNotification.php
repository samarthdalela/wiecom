<?php
// classes/EmailNotification.php - Updated with Gmail SMTP
class EmailNotification {
    private $fromEmail = 'samarthdalela@gmail.com';
    private $fromName = 'UPWIECON 2025';
    private $appPassword = 'nugv adhg dxez jdqf'; // Replace with your Gmail App Password
    private $debugMode = true;
    
    public function __construct() {
        date_default_timezone_set('Asia/Kolkata');
    }
    
    public function sendPaymentConfirmation($registrationDetails, $paymentDetails) {
        $to = $registrationDetails['sEmail'];
        $subject = 'UPWIECON 2025 - Payment Confirmation';
        $message = $this->getSuccessEmailTemplate($registrationDetails, $paymentDetails);
        
        $this->logEmailAttempt('SUCCESS', $to, $subject);
        
        return $this->sendGmailEmail($to, $subject, $message);
    }
    
    public function sendPaymentFailure($registrationDetails, $paymentDetails) {
        $to = $registrationDetails['sEmail'];
        $subject = 'UPWIECON 2025 - Payment Failed';
        $message = $this->getFailureEmailTemplate($registrationDetails, $paymentDetails);
        
        $this->logEmailAttempt('FAILED', $to, $subject);
        
        return $this->sendGmailEmail($to, $subject, $message);
    }
    
    private function sendGmailEmail($to, $subject, $htmlMessage) {
        try {
            // Method 1: Try improved mail() with Gmail-friendly headers
            $result = $this->sendViaImprovedMail($to, $subject, $htmlMessage);
            
            if ($result) {
                $this->logEmailResult($to, 'SUCCESS', 'Improved mail() method');
                return true;
            }
            
            // Method 2: Try basic mail() as fallback
            $result = $this->sendViaBasicMail($to, $subject, $htmlMessage);
            
            if ($result) {
                $this->logEmailResult($to, 'SUCCESS', 'Basic mail() method');
                return true;
            }
            
            $this->logEmailResult($to, 'FAILED', 'All methods failed');
            return false;
            
        } catch (Exception $e) {
            $this->logEmailResult($to, 'ERROR', 'Exception: ' . $e->getMessage());
            return false;
        }
    }
    
    private function sendViaImprovedMail($to, $subject, $htmlMessage) {
        // Gmail-optimized headers
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
        $headers .= "From: {$this->fromName} <{$this->fromEmail}>\r\n";
        $headers .= "Reply-To: {$this->fromEmail}\r\n";
        $headers .= "Return-Path: {$this->fromEmail}\r\n";
        $headers .= "X-Mailer: UPWIECON2025-PHP/" . phpversion() . "\r\n";
        $headers .= "X-Priority: 3\r\n";
        $headers .= "Message-ID: <" . time() . "." . md5($to . $subject) . "@" . $_SERVER['HTTP_HOST'] . ">\r\n";
        
        // Additional parameters for better delivery
        $additional_parameters = "-f {$this->fromEmail}";
        
        return mail($to, $subject, $htmlMessage, $headers, $additional_parameters);
    }
    
    private function sendViaBasicMail($to, $subject, $htmlMessage) {
        $headers = "From: {$this->fromEmail}\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
        
        return mail($to, $subject, $htmlMessage, $headers);
    }
    
    // Test email function
    public function sendTestEmail($to = null) {
        $testTo = $to ?? $this->fromEmail;
        $subject = 'UPWIECON 2025 - Email System Test';
        $message = $this->getTestEmailTemplate();
        
        $this->logEmailAttempt('TEST', $testTo, $subject);
        
        $result = $this->sendGmailEmail($testTo, $subject, $message);
        
        $this->logEmailResult($testTo, $result ? 'SUCCESS' : 'FAILED', 'Test email');
        
        return $result;
    }
    
    private function getTestEmailTemplate() {
        return '
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Email Test</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: #667eea; color: white; padding: 20px; text-align: center; }
        .content { background: #f9f9f9; padding: 20px; }
        .success { background: #d4edda; color: #155724; padding: 10px; border-radius: 5px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>UPWIECON 2025</h1>
            <p>Email System Test</p>
        </div>
        <div class="content">
            <div class="success">
                <h2>✓ Email System Working!</h2>
            </div>
            <p>This is a test email from the UPWIECON 2025 registration system.</p>
            <p><strong>Test Details:</strong></p>
            <ul>
                <li>Timestamp: ' . date('Y-m-d H:i:s') . '</li>
                <li>Server: ' . ($_SERVER['HTTP_HOST'] ?? 'unknown') . '</li>
                <li>PHP Version: ' . phpversion() . '</li>
                <li>From Email: ' . $this->fromEmail . '</li>
            </ul>
            <p>If you received this email, the email system is configured correctly!</p>
        </div>
    </div>
</body>
</html>';
    }
    
    private function getSuccessEmailTemplate($registration, $payment) {
        return '
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Payment Confirmation</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; margin: 0; padding: 0; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 20px; text-align: center; border-radius: 8px 8px 0 0; }
        .content { background: #f9f9f9; padding: 20px; border-radius: 0 0 8px 8px; }
        .success-badge { background: #d4edda; color: #155724; padding: 15px; border-radius: 5px; text-align: center; margin: 20px 0; }
        .details-table { width: 100%; border-collapse: collapse; margin: 20px 0; }
        .details-table th, .details-table td { padding: 10px; text-align: left; border-bottom: 1px solid #ddd; }
        .details-table th { background: #f1f1f1; font-weight: bold; }
        .amount-highlight { background: #667eea; color: white; padding: 15px; text-align: center; border-radius: 5px; margin: 20px 0; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>UPWIECON 2025</h1>
            <p>IEEE Uttarakhand Women in Engineering Conference</p>
        </div>
        
        <div class="content">
            <div class="success-badge">
                <h2>✓ Payment Successful!</h2>
            </div>
            
            <p>Dear ' . htmlspecialchars($registration['sName']) . ',</p>
            
            <p>Congratulations! Your registration payment has been processed successfully. Your registration for UPWIECON 2025 is now confirmed.</p>
            
            <table class="details-table">
                <tr><th>Registration ID</th><td>' . htmlspecialchars($registration['iRegId']) . '</td></tr>
                <tr><th>Order ID</th><td>' . htmlspecialchars($payment['order_id']) . '</td></tr>
                <tr><th>Transaction ID</th><td>' . htmlspecialchars($payment['txn_id']) . '</td></tr>
                <tr><th>Participant Name</th><td>' . htmlspecialchars($registration['sName']) . '</td></tr>
                <tr><th>Email</th><td>' . htmlspecialchars($registration['sEmail']) . '</td></tr>
                <tr><th>Category</th><td>' . htmlspecialchars($registration['sCategory']) . '</td></tr>
                <tr><th>Payment Date</th><td>' . date('d M Y, h:i A') . '</td></tr>
            </table>
            
            <div class="amount-highlight">
                <h3>Registration Fee Paid: ₹' . number_format($payment['amount'], 2) . '</h3>
            </div>
            
            <h3>Next Steps:</h3>
            <ul>
                <li>Save your Registration ID: <strong>' . htmlspecialchars($registration['iRegId']) . '</strong></li>
                <li>Conference details will be sent closer to the event date</li>
                <li>For queries, contact: support@nielit.ac.in</li>
            </ul>
            
            <p>Thank you for registering!</p>
            
            <p>Best regards,<br>UPWIECON 2025 Team</p>
        </div>
    </div>
</body>
</html>';
    }
    
    private function getFailureEmailTemplate($registration, $payment) {
        return '
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Payment Failed</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; margin: 0; padding: 0; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 20px; text-align: center; border-radius: 8px 8px 0 0; }
        .content { background: #f9f9f9; padding: 20px; border-radius: 0 0 8px 8px; }
        .failure-badge { background: #f8d7da; color: #721c24; padding: 15px; border-radius: 5px; text-align: center; margin: 20px 0; }
        .details-table { width: 100%; border-collapse: collapse; margin: 20px 0; }
        .details-table th, .details-table td { padding: 10px; text-align: left; border-bottom: 1px solid #ddd; }
        .details-table th { background: #f1f1f1; font-weight: bold; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>UPWIECON 2025</h1>
            <p>IEEE Uttarakhand Women in Engineering Conference</p>
        </div>
        
        <div class="content">
            <div class="failure-badge">
                <h2>✗ Payment Failed</h2>
            </div>
            
            <p>Dear ' . htmlspecialchars($registration['sName']) . ',</p>
            
            <p>Unfortunately, your payment could not be processed. Your registration details have been saved.</p>
            
            <table class="details-table">
                <tr><th>Registration ID</th><td>' . htmlspecialchars($registration['iRegId']) . '</td></tr>
                <tr><th>Order ID</th><td>' . htmlspecialchars($payment['order_id']) . '</td></tr>
                <tr><th>Amount</th><td>₹' . number_format($payment['amount'], 2) . '</td></tr>
                <tr><th>Status</th><td>' . htmlspecialchars($payment['status']) . '</td></tr>
            </table>
            
            <h3>Next Steps:</h3>
            <ul>
                <li>Try registering again</li>
                <li>Check your payment method</li>
                <li>Contact support: support@nielit.ac.in</li>
            </ul>
            
            <p>Best regards,<br>UPWIECON 2025 Team</p>
        </div>
    </div>
</body>
</html>';
    }
    
    private function logEmailAttempt($type, $to, $subject) {
        if ($this->debugMode) {
            error_log("EMAIL ATTEMPT: Type=$type, To=$to, Subject=$subject, Time=" . date('Y-m-d H:i:s'));
        }
    }
    
    private function logEmailResult($to, $status, $method) {
        error_log("EMAIL RESULT: To=$to, Status=$status, Method=$method, Time=" . date('Y-m-d H:i:s'));
        
        // Also log to file
        $logFile = 'logs/email_log_' . date('Y-m-d') . '.txt';
        if (!is_dir('logs')) {
            mkdir('logs', 0755, true);
        }
        file_put_contents($logFile, date('Y-m-d H:i:s') . " - $status - $to - $method\n", FILE_APPEND);
    }
    
    // Configuration check
    public function checkEmailConfig() {
        return [
            'mail_function' => function_exists('mail'),
            'from_email' => $this->fromEmail,
            'server_name' => $_SERVER['HTTP_HOST'] ?? 'unknown',
            'php_version' => phpversion(),
            'date_time' => date('Y-m-d H:i:s')
        ];
    }
}
?>