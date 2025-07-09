<?php
// Enhanced EmailNotification.php with PHPMailer for better reliability
// Install PHPMailer: composer require phpmailer/phpmailer

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class EmailNotification {
    private $fromEmail = 'wieconnielit@gmail.com';
    private $fromName = 'UPWIECON 2025';
    private $replyToEmail = 'wieconnielit@gmail.com';
    private $appPassword = 'htil fgrm hpwf mgbo'; // Gmail App Password
    private $debugMode = true;
    private $maxRetries = 3;
    private $retryDelay = 2;
    
    // SMTP Configuration
    private $smtpHost = 'smtp.gmail.com';
    private $smtpPort = 587;
    private $smtpSecure = PHPMailer::ENCRYPTION_STARTTLS;
    
    public function __construct() {
        date_default_timezone_set('Asia/Kolkata');
        
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
                $result = $this->sendViaPHPMailer($to, $subject, $htmlMessage, $textMessage);

                if ($result['success']) {
                    $this->logEmailResult($to, 'SUCCESS', "PHPMailer SMTP - attempt $attempts");
                    return true;
                }

                $lastError = $result['error'];

                if ($this->isMailFunctionAvailable()) {
                    $result = $this->sendViaBasicMail($to, $subject, $htmlMessage);
                    if ($result) {
                        $this->logEmailResult($to, 'SUCCESS', "Basic mail() fallback - attempt $attempts");
                        return true;
                    }
                }

                $lastError = "PHPMailer failed: {$lastError}, Basic mail also failed on attempt $attempts";

            } catch (Exception $e) {
                $lastError = "Exception on attempt $attempts: " . $e->getMessage();
                $this->logEmailResult($to, 'ERROR', $lastError);
            }

            if ($attempts < $this->maxRetries) {
                sleep($this->retryDelay);
            }
        }

        $this->logEmailResult($to, 'FAILED', "All $attempts attempts failed. Last error: $lastError");
        return false;
    }

    private function sendViaPHPMailer($to, $subject, $htmlMessage, $textMessage = '') {
        try {
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host = $this->smtpHost;
            $mail->SMTPAuth = true;
            $mail->Username = $this->fromEmail;
            $mail->Password = $this->appPassword;
            $mail->SMTPSecure = $this->smtpSecure;
            $mail->Port = $this->smtpPort;

            if ($this->debugMode) {
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;
                $mail->Debugoutput = function($str, $level) {
                    error_log("PHPMailer DEBUG: $str");
                };
            }

            $mail->setFrom($this->fromEmail, $this->fromName);
            $mail->addAddress($to);
            $mail->addReplyTo($this->replyToEmail, $this->fromName);

            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body = $htmlMessage;
            if (!empty($textMessage)) {
                $mail->AltBody = $textMessage;
            }

            $mail->addCustomHeader('X-Mailer', 'UPWIECON2025-PHPMailer');
            $mail->addCustomHeader('X-Priority', '3');

            $mail->send();
            return ['success' => true, 'error' => null];

        } catch (Exception $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }

    private function sendViaBasicMail($to, $subject, $htmlMessage) {
        try {
            $headers = "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
            $headers .= "From: {$this->fromName} <{$this->fromEmail}>\r\n";
            $headers .= "Reply-To: {$this->replyToEmail}\r\n";
            $headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";

            return mail($to, $subject, $htmlMessage, $headers);

        } catch (Exception $e) {
            error_log("Basic mail error: " . $e->getMessage());
            return false;
        }
    }

    private function isMailFunctionAvailable() {
        return function_exists('mail');
    }

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

    public function checkEmailConfig() {
        $config = [
            'phpmailer_available' => class_exists('PHPMailer\PHPMailer\PHPMailer'),
            'mail_function' => function_exists('mail'),
            'from_email' => $this->fromEmail,
            'smtp_host' => $this->smtpHost,
            'smtp_port' => $this->smtpPort,
            'server_name' => $_SERVER['HTTP_HOST'] ?? 'unknown',
            'php_version' => phpversion(),
            'timezone' => date_default_timezone_get(),
            'logs_directory' => is_dir('logs') && is_writable('logs'),
            'max_retries' => $this->maxRetries
        ];

        try {
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host = $this->smtpHost;
            $mail->SMTPAuth = true;
            $mail->Username = $this->fromEmail;
            $mail->Password = $this->appPassword;
            $mail->SMTPSecure = $this->smtpSecure;
            $mail->Port = $this->smtpPort;

            $mail->smtpConnect();
            $config['smtp_connection'] = 'SUCCESS';
            $mail->smtpClose();

        } catch (Exception $e) {
            $config['smtp_connection'] = 'FAILED: ' . $e->getMessage();
        }

        return $config;
    }

    // --- Templates ---
    private function getTestEmailTemplate($testType = 'basic') {
        return "<html><body><h2>Test Email</h2><p>This is a <strong>{$testType}</strong> test email from UPWIECON 2025.</p></body></html>";
    }

    private function getTestEmailTextTemplate($testType = 'basic') {
        return "This is a plain text test email from UPWIECON 2025. Test type: " . strtoupper($testType);
    }

    private function getSuccessEmailTemplate($registration, $payment) {
        return "<html><body><h2>Payment Successful</h2><p>Thank you, {$registration['sName']}, for registering.<br>Your payment of ₹{$payment['amount']} was successful.<br>Order ID: {$payment['order_id']}</p></body></html>";
    }

    private function getSuccessEmailTextTemplate($registration, $payment) {
        return <<<EOT
Dear {$registration['sName']},

Thank you for registering for UPWIECON 2025. Your payment has been successfully received.

Registration Details:
- Name: {$registration['sName']}
- Email: {$registration['sEmail']}
- Mobile: {$registration['sMobile']}
- Order ID: {$payment['order_id']}
- Payment Amount: ₹{$payment['amount']}

We look forward to your participation.

Regards,
UPWIECON 2025 Team
EOT;
    }

    private function getFailureEmailTemplate($registration, $payment) {
        return "<html><body><h2>Payment Failed</h2><p>Dear {$registration['sName']},<br>Your payment attempt for UPWIECON 2025 was not successful.<br>Order ID: {$payment['order_id']}<br>Please try again.</p></body></html>";
    }

    private function getFailureEmailTextTemplate($registration, $payment) {
        return <<<EOT
Dear {$registration['sName']},

We regret to inform you that your payment for UPWIECON 2025 was unsuccessful.

Please try again using the payment portal. If you've been charged, contact the support team with your details.

Order ID: {$payment['order_id']}
Email: {$registration['sEmail']}

Thank you for your interest.

Regards,
UPWIECON 2025 Team
EOT;
    }

    // --- Logging ---
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
}
