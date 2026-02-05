<?php
// classes/GmailSMTPMailer.php
class GmailSMTPMailer
{
    private $host = 'smtp.gmail.com';
    private $port = 587;
    private $username = 'samarthdalela@gmail.com';
    private $password = 'nugv adhg dxez jdqf'; // Use App Password, NOT regular password
    private $fromEmail = 'samarthdalela@gmail.com';
    private $fromName = 'UPWIECON 2026';

    public function __construct()
    {
        // Set error reporting
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
    }

    public function sendEmail($to, $subject, $htmlMessage, $textMessage = '')
    {
        try {
            // If no text version provided, create one from HTML
            if (empty($textMessage)) {
                $textMessage = strip_tags($htmlMessage);
            }

            // Create boundary for multipart email
            $boundary = md5(time());

            // Email headers
            $headers = $this->buildHeaders($boundary);

            // Email body
            $body = $this->buildBody($htmlMessage, $textMessage, $boundary);

            // Send email using mail() with proper headers for Gmail
            $result = mail($to, $subject, $body, $headers);

            if ($result) {
                error_log("Gmail email sent successfully to: $to");
                return true;
            } else {
                error_log("Gmail email failed to: $to");
                return false;
            }

        } catch (Exception $e) {
            error_log("Gmail SMTP Error: " . $e->getMessage());
            return false;
        }
    }

    private function buildHeaders($boundary)
    {
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: multipart/alternative; boundary=\"$boundary\"\r\n";
        $headers .= "From: {$this->fromName} <{$this->fromEmail}>\r\n";
        $headers .= "Reply-To: {$this->fromEmail}\r\n";
        $headers .= "Return-Path: {$this->fromEmail}\r\n";
        $headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";
        $headers .= "X-Priority: 3\r\n";

        return $headers;
    }

    private function buildBody($htmlMessage, $textMessage, $boundary)
    {
        $body = "--$boundary\r\n";
        $body .= "Content-Type: text/plain; charset=UTF-8\r\n";
        $body .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
        $body .= $textMessage . "\r\n";

        $body .= "--$boundary\r\n";
        $body .= "Content-Type: text/html; charset=UTF-8\r\n";
        $body .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
        $body .= $htmlMessage . "\r\n";

        $body .= "--$boundary--";

        return $body;
    }

    // Test connection
    public function testConnection()
    {
        $testEmail = $this->fromEmail;
        $subject = "UPWIECON 2026 - Gmail SMTP Test";
        $message = "<h2>Gmail SMTP Test Successful!</h2><p>This email was sent via Gmail SMTP at " . date('Y-m-d H:i:s') . "</p>";

        return $this->sendEmail($testEmail, $subject, $message);
    }
}

// Alternative PHPMailer approach (more reliable)
class PHPMailerGmail
{
    private $smtp_host = 'smtp.gmail.com';
    private $smtp_port = 587;
    private $smtp_user = 'samarthdalela@gmail.com';
    private $smtp_pass = 'nugv adhg dxez jdqf'; // App Password

    public function sendHTML($to, $subject, $htmlBody)
    {
        // This requires PHPMailer library
        // Download from: https://github.com/PHPMailer/PHPMailer

        if (!class_exists('PHPMailer\PHPMailer\PHPMailer')) {
            // Fallback to simple mail if PHPMailer not available
            return $this->fallbackMail($to, $subject, $htmlBody);
        }

        try {
            $mail = new PHPMailer\PHPMailer\PHPMailer(true);

            // Server settings
            $mail->isSMTP();
            $mail->Host = $this->smtp_host;
            $mail->SMTPAuth = true;
            $mail->Username = $this->smtp_user;
            $mail->Password = $this->smtp_pass;
            $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = $this->smtp_port;

            // Recipients
            $mail->setFrom($this->smtp_user, 'UPWIECON 2026');
            $mail->addAddress($to);

            // Content
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body = $htmlBody;

            $mail->send();
            return true;

        } catch (Exception $e) {
            error_log("PHPMailer Error: " . $e->getMessage());
            return false;
        }
    }

    private function fallbackMail($to, $subject, $htmlBody)
    {
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=UTF-8\r\n";
        $headers .= "From: UPWIECON 2026 <{$this->smtp_user}>\r\n";

        return mail($to, $subject, $htmlBody, $headers);
    }
}

// Updated EmailNotification class with Gmail integration
class EmailNotificationWithGmail
{
    private $gmailMailer;
    private $debugMode = true;

    public function __construct()
    {
        $this->gmailMailer = new GmailSMTPMailer();
        date_default_timezone_set('Asia/Kolkata');
    }

    public function sendPaymentConfirmation($registrationDetails, $paymentDetails)
    {
        $to = $registrationDetails['sEmail'];
        $subject = 'UPWIECON 2026 - Payment Confirmation';
        $htmlMessage = $this->getSuccessEmailTemplate($registrationDetails, $paymentDetails);

        $this->logEmailAttempt('SUCCESS', $to, $subject);

        $result = $this->gmailMailer->sendEmail($to, $subject, $htmlMessage);

        $this->logEmailResult($to, $result ? 'SUCCESS' : 'FAILED', 'Gmail SMTP attempt');

        return $result;
    }

    public function sendPaymentFailure($registrationDetails, $paymentDetails)
    {
        $to = $registrationDetails['sEmail'];
        $subject = 'UPWIECON 2026 - Payment Failed';
        $htmlMessage = $this->getFailureEmailTemplate($registrationDetails, $paymentDetails);

        $this->logEmailAttempt('FAILED', $to, $subject);

        $result = $this->gmailMailer->sendEmail($to, $subject, $htmlMessage);

        $this->logEmailResult($to, $result ? 'SUCCESS' : 'FAILED', 'Gmail SMTP attempt');

        return $result;
    }

    public function testGmailSetup()
    {
        return $this->gmailMailer->testConnection();
    }

    private function logEmailAttempt($type, $to, $subject)
    {
        if ($this->debugMode) {
            error_log("GMAIL EMAIL ATTEMPT: Type=$type, To=$to, Subject=$subject");
        }
    }

    private function logEmailResult($to, $status, $method)
    {
        error_log("GMAIL EMAIL RESULT: To=$to, Status=$status, Method=$method, Time=" . date('Y-m-d H:i:s'));
    }

    private function getSuccessEmailTemplate($registration, $payment)
    {
        // Your existing success email template
        return '<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>Payment Success</title></head>
<body>
    <h1>Payment Successful!</h1>
    <p>Dear ' . htmlspecialchars($registration['sName']) . ',</p>
    <p>Your payment has been processed successfully.</p>
    <p><strong>Registration ID:</strong> ' . htmlspecialchars($registration['iRegId']) . '</p>
    <p><strong>Amount:</strong> ₹' . number_format($payment['amount'], 2) . '</p>
    <p>Thank you for registering!</p>
</body>
</html>';
    }

    private function getFailureEmailTemplate($registration, $payment)
    {
        // Your existing failure email template
        return '<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>Payment Failed</title></head>
<body>
    <h1>Payment Failed</h1>
    <p>Dear ' . htmlspecialchars($registration['sName']) . ',</p>
    <p>Unfortunately, your payment could not be processed.</p>
    <p><strong>Registration ID:</strong> ' . htmlspecialchars($registration['iRegId']) . '</p>
    <p><strong>Status:</strong> ' . htmlspecialchars($payment['status']) . '</p>
    <p>Please try again or contact support.</p>
</body>
</html>';
    }
}
?>