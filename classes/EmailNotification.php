<?php
// Enhanced EmailNotification.php with PHPMailer for better reliability
// Install PHPMailer: composer require phpmailer/phpmailer

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;

// class EmailNotification {
//     private $fromEmail = 'wieconnielit@gmail.com';
//     private $fromName = 'UPWIECON 2025';
//     private $replyToEmail = 'wieconnielit@gmail.com';
//     private $appPassword = 'htil fgrm hpwf mgbo'; // Gmail App Password
//     private $debugMode = true;
//     private $maxRetries = 3;
//     private $retryDelay = 2;
    
//     // SMTP Configuration
//     private $smtpHost = 'smtp.gmail.com';
//     private $smtpPort = 587;
//     private $smtpSecure = PHPMailer::ENCRYPTION_STARTTLS;
    
//     public function __construct() {
//         date_default_timezone_set('Asia/Kolkata');
        
//         if (!is_dir('logs')) {
//             mkdir('logs', 0755, true);
//         }
//     }

//     public function sendPaymentConfirmation($registrationDetails, $paymentDetails) {
//         $to = $registrationDetails['sEmail'];
//         $subject = 'UPWIECON 2025 - Payment Confirmation & Registration Success';
//         $htmlMessage = $this->getSuccessEmailTemplate($registrationDetails, $paymentDetails);
//         $textMessage = $this->getSuccessEmailTextTemplate($registrationDetails, $paymentDetails);
        
//         $this->logEmailAttempt('PAYMENT_SUCCESS', $to, $subject, $paymentDetails['order_id']);
//         $result = $this->sendEmailWithRetry($to, $subject, $htmlMessage, $textMessage);
//         $this->logEmailResult($to, $result ? 'SUCCESS' : 'FAILED', 'Payment confirmation email', $paymentDetails['order_id']);
        
//         return $result;
//     }

//     public function sendPaymentFailure($registrationDetails, $paymentDetails) {
//         $to = $registrationDetails['sEmail'];
//         $subject = 'UPWIECON 2025 - Payment Issue Notification';
//         $htmlMessage = $this->getFailureEmailTemplate($registrationDetails, $paymentDetails);
//         $textMessage = $this->getFailureEmailTextTemplate($registrationDetails, $paymentDetails);
        
//         $this->logEmailAttempt('PAYMENT_FAILED', $to, $subject, $paymentDetails['order_id']);
//         $result = $this->sendEmailWithRetry($to, $subject, $htmlMessage, $textMessage);
//         $this->logEmailResult($to, $result ? 'SUCCESS' : 'FAILED', 'Payment failure email', $paymentDetails['order_id']);
        
//         return $result;
//     }

//     private function sendEmailWithRetry($to, $subject, $htmlMessage, $textMessage = '') {
//         $attempts = 0;
//         $lastError = '';

//         while ($attempts < $this->maxRetries) {
//             $attempts++;

//             try {
//                 $result = $this->sendViaPHPMailer($to, $subject, $htmlMessage, $textMessage);

//                 if ($result['success']) {
//                     $this->logEmailResult($to, 'SUCCESS', "PHPMailer SMTP - attempt $attempts");
//                     return true;
//                 }

//                 $lastError = $result['error'];

//                 if ($this->isMailFunctionAvailable()) {
//                     $result = $this->sendViaBasicMail($to, $subject, $htmlMessage);
//                     if ($result) {
//                         $this->logEmailResult($to, 'SUCCESS', "Basic mail() fallback - attempt $attempts");
//                         return true;
//                     }
//                 }

//                 $lastError = "PHPMailer failed: {$lastError}, Basic mail also failed on attempt $attempts";

//             } catch (Exception $e) {
//                 $lastError = "Exception on attempt $attempts: " . $e->getMessage();
//                 $this->logEmailResult($to, 'ERROR', $lastError);
//             }

//             if ($attempts < $this->maxRetries) {
//                 sleep($this->retryDelay);
//             }
//         }

//         $this->logEmailResult($to, 'FAILED', "All $attempts attempts failed. Last error: $lastError");
//         return false;
//     }

//     private function sendViaPHPMailer($to, $subject, $htmlMessage, $textMessage = '') {
//         try {
//             $mail = new PHPMailer(true);
//             $mail->isSMTP();
//             $mail->Host = $this->smtpHost;
//             $mail->SMTPAuth = true;
//             $mail->Username = $this->fromEmail;
//             $mail->Password = $this->appPassword;
//             $mail->SMTPSecure = $this->smtpSecure;
//             $mail->Port = $this->smtpPort;

//             if ($this->debugMode) {
//                 $mail->SMTPDebug = SMTP::DEBUG_SERVER;
//                 $mail->Debugoutput = function($str, $level) {
//                     error_log("PHPMailer DEBUG: $str");
//                 };
//             }

//             $mail->setFrom($this->fromEmail, $this->fromName);
//             $mail->addAddress($to);
//             $mail->addReplyTo($this->replyToEmail, $this->fromName);

//             $mail->isHTML(true);
//             $mail->Subject = $subject;
//             $mail->Body = $htmlMessage;
//             if (!empty($textMessage)) {
//                 $mail->AltBody = $textMessage;
//             }

//             $mail->addCustomHeader('X-Mailer', 'UPWIECON2025-PHPMailer');
//             $mail->addCustomHeader('X-Priority', '3');

//             $mail->send();
//             return ['success' => true, 'error' => null];

//         } catch (Exception $e) {
//             return ['success' => false, 'error' => $e->getMessage()];
//         }
//     }

//     private function sendViaBasicMail($to, $subject, $htmlMessage) {
//         try {
//             $headers = "MIME-Version: 1.0\r\n";
//             $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
//             $headers .= "From: {$this->fromName} <{$this->fromEmail}>\r\n";
//             $headers .= "Reply-To: {$this->replyToEmail}\r\n";
//             $headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";

//             return mail($to, $subject, $htmlMessage, $headers);

//         } catch (Exception $e) {
//             error_log("Basic mail error: " . $e->getMessage());
//             return false;
//         }
//     }

//     private function isMailFunctionAvailable() {
//         return function_exists('mail');
//     }

//     public function sendTestEmail($to = null, $testType = 'basic') {
//         $testTo = $to ?? $this->fromEmail;
//         $subject = 'UPWIECON 2025 - Email System Test (' . strtoupper($testType) . ')';
//         $htmlMessage = $this->getTestEmailTemplate($testType);
//         $textMessage = $this->getTestEmailTextTemplate($testType);

//         $this->logEmailAttempt('TEST_EMAIL', $testTo, $subject, 'TEST_' . time());
//         $result = $this->sendEmailWithRetry($testTo, $subject, $htmlMessage, $textMessage);
//         $this->logEmailResult($testTo, $result ? 'SUCCESS' : 'FAILED', "Test email ($testType)");

//         return $result;
//     }

//     public function checkEmailConfig() {
//         $config = [
//             'phpmailer_available' => class_exists('PHPMailer\PHPMailer\PHPMailer'),
//             'mail_function' => function_exists('mail'),
//             'from_email' => $this->fromEmail,
//             'smtp_host' => $this->smtpHost,
//             'smtp_port' => $this->smtpPort,
//             'server_name' => $_SERVER['HTTP_HOST'] ?? 'unknown',
//             'php_version' => phpversion(),
//             'timezone' => date_default_timezone_get(),
//             'logs_directory' => is_dir('logs') && is_writable('logs'),
//             'max_retries' => $this->maxRetries
//         ];

//         try {
//             $mail = new PHPMailer(true);
//             $mail->isSMTP();
//             $mail->Host = $this->smtpHost;
//             $mail->SMTPAuth = true;
//             $mail->Username = $this->fromEmail;
//             $mail->Password = $this->appPassword;
//             $mail->SMTPSecure = $this->smtpSecure;
//             $mail->Port = $this->smtpPort;

//             $mail->smtpConnect();
//             $config['smtp_connection'] = 'SUCCESS';
//             $mail->smtpClose();

//         } catch (Exception $e) {
//             $config['smtp_connection'] = 'FAILED: ' . $e->getMessage();
//         }

//         return $config;
//     }

//     // --- Templates ---
//     private function getTestEmailTemplate($testType = 'basic') {
//         return "<html><body><h2>Test Email</h2><p>This is a <strong>{$testType}</strong> test email from UPWIECON 2025.</p></body></html>";
//     }

//     private function getTestEmailTextTemplate($testType = 'basic') {
//         return "This is a plain text test email from UPWIECON 2025. Test type: " . strtoupper($testType);
//     }

//     private function getSuccessEmailTemplate($registration, $payment) {
//         return "<html><body><h2>Payment Successful</h2><p>Thank you, {$registration['sName']}, for registering.<br>Your payment of ₹{$payment['amount']} was successful.<br>Order ID: {$payment['order_id']}</p></body></html>";
//     }

//     private function getSuccessEmailTextTemplate($registration, $payment) {
//         return <<<EOT
// Dear {$registration['sName']},

// Thank you for registering for UPWIECON 2025. Your payment has been successfully received.

// Registration Details:
// - Name: {$registration['sName']}
// - Email: {$registration['sEmail']}
// - Mobile: {$registration['sMobile']}
// - Order ID: {$payment['order_id']}
// - Payment Amount: ₹{$payment['amount']}

// We look forward to your participation.

// Regards,
// UPWIECON 2025 Team
// EOT;
//     }

//     private function getFailureEmailTemplate($registration, $payment) {
//         return "<html><body><h2>Payment Failed</h2><p>Dear {$registration['sName']},<br>Your payment attempt for UPWIECON 2025 was not successful.<br>Order ID: {$payment['order_id']}<br>Please try again.</p></body></html>";
//     }

//     private function getFailureEmailTextTemplate($registration, $payment) {
//         return <<<EOT
// Dear {$registration['sName']},

// We regret to inform you that your payment for UPWIECON 2025 was unsuccessful.

// Please try again using the payment portal. If you've been charged, contact the support team with your details.

// Order ID: {$payment['order_id']}
// Email: {$registration['sEmail']}

// Thank you for your interest.

// Regards,
// UPWIECON 2025 Team
// EOT;
//     }

//     // --- Logging ---
//     private function logEmailAttempt($type, $to, $subject, $orderId = null) {
//         $logData = [
//             'timestamp' => date('Y-m-d H:i:s'),
//             'type' => $type,
//             'to' => $to,
//             'subject' => $subject,
//             'order_id' => $orderId,
//             'server' => $_SERVER['HTTP_HOST'] ?? 'unknown',
//             'ip' => $_SERVER['REMOTE_ADDR'] ?? 'unknown'
//         ];

//         if ($this->debugMode) {
//             error_log("EMAIL ATTEMPT: " . json_encode($logData));
//         }

//         $this->writeToLogFile('email_attempts', $logData);
//     }

//     private function logEmailResult($to, $status, $method, $orderId = null) {
//         $logData = [
//             'timestamp' => date('Y-m-d H:i:s'),
//             'to' => $to,
//             'status' => $status,
//             'method' => $method,
//             'order_id' => $orderId
//         ];

//         error_log("EMAIL RESULT: " . json_encode($logData));
//         $this->writeToLogFile('email_results', $logData);
//     }

//     private function writeToLogFile($logType, $data) {
//         try {
//             $logFile = 'logs/' . $logType . '_' . date('Y-m-d') . '.txt';
//             $logLine = date('Y-m-d H:i:s') . " | " . json_encode($data) . "\n";
//             file_put_contents($logFile, $logLine, FILE_APPEND | LOCK_EX);
//         } catch (Exception $e) {
//             error_log("Failed to write to log file: " . $e->getMessage());
//         }
//     }
// }

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

    public function sendPaymentUnknown($registrationDetails, $paymentDetails) {
        $to = $registrationDetails['sEmail'];
        $subject = 'UPWIECON 2025 - Payment Status Under Review';
        $htmlMessage = $this->getUnknownStatusEmailTemplate($registrationDetails, $paymentDetails);
        $textMessage = $this->getUnknownStatusEmailTextTemplate($registrationDetails, $paymentDetails);
        
        $this->logEmailAttempt('PAYMENT_UNKNOWN', $to, $subject, $paymentDetails['order_id']);
        $result = $this->sendEmailWithRetry($to, $subject, $htmlMessage, $textMessage);
        $this->logEmailResult($to, $result ? 'SUCCESS' : 'FAILED', 'Payment unknown status email', $paymentDetails['order_id']);
        
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
        // return "<html><body><h2>Payment Successful</h2><p>Thank you, {$registration['sName']}, for registering.<br>Your payment of ₹{$payment['amount']} was successful.<br>Order ID: {$payment['order_id']}</p></body></html>";
        return "<html>
        <body style=\"font-family: Arial, sans-serif; line-height: 1.6; color: #333; margin: 0; padding: 0; background-color: #f4f4f4;\">
           <div style=\"max-width: 600px; margin: 0 auto; padding: 20px;\">
               <div style=\"background-color: #ffffff; border-radius: 10px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); overflow: hidden;\">
                   <!-- Header -->
                   <div style=\"background: linear-gradient(135deg, #27ae60, #2ecc71); padding: 30px 20px; text-align: center;\">
                       <div style=\"background-color: rgba(255,255,255,0.2); width: 80px; height: 80px; border-radius: 50%; margin: 0 auto 20px; display: flex; align-items: center; justify-content: center;\">
                           <div style=\"color: white; font-size: 40px;\">✓</div>
                       </div>
                       <h1 style=\"color: white; margin: 0; font-size: 28px; font-weight: bold;\">Payment Successful!</h1>
                       <p style=\"color: rgba(255,255,255,0.9); margin: 10px 0 0 0; font-size: 16px;\">Your registration is confirmed</p>
                   </div>
                   
                   <!-- Content -->
                   <div style=\"padding: 40px 30px;\">
                       <p style=\"font-size: 18px; margin-bottom: 25px; color: #2c3e50;\">
                           Dear <strong style=\"color: #27ae60;\">{$registration['sName']}</strong>,
                       </p>
                       
                       <p style=\"font-size: 16px; margin-bottom: 30px; line-height: 1.8;\">
                           Thank you for registering for <strong>UPWIECON 2025</strong>! We're excited to confirm that your payment has been successfully processed.
                       </p>
                       
                       <!-- Payment Details Box -->
                       <div style=\"background: linear-gradient(135deg, #f8f9fa, #e9ecef); border-left: 5px solid #27ae60; padding: 25px; border-radius: 8px; margin: 25px 0;\">
                           <h3 style=\"color: #2c3e50; margin: 0 0 15px 0; font-size: 18px;\">Payment Details</h3>
                           <table style=\"width: 100%; border-collapse: collapse;\">
                               <tr>
                                   <td style=\"padding: 8px 0; font-weight: bold; color: #555; width: 40%;\">Amount Paid:</td>
                                   <td style=\"padding: 8px 0; color: #27ae60; font-size: 18px; font-weight: bold;\">₹{$payment['amount']}</td>
                               </tr>
                               <tr>
                                   <td style=\"padding: 8px 0; font-weight: bold; color: #555;\">Order ID:</td>
                                   <td style=\"padding: 8px 0; color: #2c3e50; font-family: monospace; background-color: #f1f2f6; padding: 5px 10px; border-radius: 4px; font-size: 14px;\">{$payment['order_id']}</td>
                               </tr>
                               <tr>
                                   <td style=\"padding: 8px 0; font-weight: bold; color: #555;\">Status:</td>
                                   <td style=\"padding: 8px 0;\">
                                       <span style=\"background-color: #27ae60; color: white; padding: 4px 12px; border-radius: 20px; font-size: 12px; font-weight: bold;\">CONFIRMED</span>
                                   </td>
                               </tr>
                           </table>
                       </div>
                       
                       <!-- Next Steps -->
                       <div style=\"background-color: #e8f5e8; border: 1px solid #c3e6cb; padding: 20px; border-radius: 8px; margin: 25px 0;\">
                           <h3 style=\"color: #155724; margin: 0 0 10px 0; font-size: 16px;\">What's Next?</h3>
                           <ul style=\"margin: 0; padding-left: 20px; color: #155724;\">
                               <li style=\"margin-bottom: 8px;\">You will receive event details and schedule via email</li>
                               <li style=\"margin-bottom: 8px;\">Keep your Order ID for future reference</li>
                               <li>We look forward to your participation!</li>
                           </ul>
                       </div>
                       
                       <p style=\"font-size: 16px; margin-top: 30px; text-align: center; color: #7f8c8d;\">
                           Thank you for being part of <strong>UPWIECON 2025</strong>
                       </p>
                   </div>
                   
                   <!-- Footer -->
                   <div style=\"background-color: #34495e; padding: 25px; text-align: center;\">
                       <p style=\"color: #bdc3c7; margin: 0 0 10px 0; font-size: 14px;\">
                           <strong>UPWIECON 2025 Team</strong>
                       </p>
                       <p style=\"color: #95a5a6; margin: 0; font-size: 12px;\">
                           This is an automated confirmation email. Please save this for your records.
                       </p>
                   </div>
               </div>
           </div>
        </body>
        </html>";}

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
        return "<html>
        <body style=\"font-family: Arial, sans-serif; line-height: 1.6; color: #333; margin: 0; padding: 0; background-color: #f4f4f4;\">
           <div style=\"max-width: 600px; margin: 0 auto; padding: 20px;\">
               <div style=\"background-color: #ffffff; border-radius: 10px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); overflow: hidden;\">
                   <!-- Header -->
                   <div style=\"background: linear-gradient(135deg, #e74c3c, #c0392b); padding: 30px 20px; text-align: center;\">
                       <div style=\"background-color: rgba(255,255,255,0.2); width: 80px; height: 80px; border-radius: 50%; margin: 0 auto 20px; display: flex; align-items: center; justify-content: center;\">
                           <div style=\"color: white; font-size: 40px;\">✗</div>
                       </div>
                       <h1 style=\"color: white; margin: 0; font-size: 28px; font-weight: bold;\">Payment Unsuccessful</h1>
                       <p style=\"color: rgba(255,255,255,0.9); margin: 10px 0 0 0; font-size: 16px;\">We couldn't process your payment</p>
                   </div>
                   
                   <!-- Content -->
                   <div style=\"padding: 40px 30px;\">
                       <p style=\"font-size: 18px; margin-bottom: 25px; color: #2c3e50;\">
                           Dear <strong style=\"color: #e74c3c;\">{$registration['sName']}</strong>,
                       </p>
                       
                       <p style=\"font-size: 16px; margin-bottom: 25px; line-height: 1.8;\">
                           We're sorry to inform you that your payment for <strong>UPWIECON 2025</strong> could not be processed successfully.
                       </p>
                       
                       <!-- Payment Details Box -->
                       <div style=\"background: linear-gradient(135deg, #fff5f5, #fed7d7); border-left: 5px solid #e74c3c; padding: 25px; border-radius: 8px; margin: 25px 0;\">
                           <h3 style=\"color: #2c3e50; margin: 0 0 15px 0; font-size: 18px;\">Transaction Details</h3>
                           <table style=\"width: 100%; border-collapse: collapse;\">
                               <tr>
                                   <td style=\"padding: 8px 0; font-weight: bold; color: #555; width: 40%;\">Attempted Amount:</td>
                                   <td style=\"padding: 8px 0; color: #e74c3c; font-size: 18px; font-weight: bold;\">₹{$payment['amount']}</td>
                               </tr>
                               <tr>
                                   <td style=\"padding: 8px 0; font-weight: bold; color: #555;\">Order ID:</td>
                                   <td style=\"padding: 8px 0; color: #2c3e50; font-family: monospace; background-color: #f7fafc; padding: 5px 10px; border-radius: 4px; font-size: 14px;\">{$payment['order_id']}</td>
                               </tr>
                               <tr>
                                   <td style=\"padding: 8px 0; font-weight: bold; color: #555;\">Status:</td>
                                   <td style=\"padding: 8px 0;\">
                                       <span style=\"background-color: #e74c3c; color: white; padding: 4px 12px; border-radius: 20px; font-size: 12px; font-weight: bold;\">FAILED</span>
                                   </td>
                               </tr>
                           </table>
                       </div>
                       
                       <!-- Common Reasons -->
                       <div style=\"background-color: #fff8e1; border: 1px solid #ffcc02; padding: 20px; border-radius: 8px; margin: 25px 0;\">
                           <h3 style=\"color: #f57f17; margin: 0 0 15px 0; font-size: 16px;\">💡 Common Reasons for Payment Failure:</h3>
                           <ul style=\"margin: 0; padding-left: 20px; color: #f57f17; line-height: 1.6;\">
                               <li style=\"margin-bottom: 8px;\">Insufficient funds in your account</li>
                               <li style=\"margin-bottom: 8px;\">Incorrect card details or expired card</li>
                               <li style=\"margin-bottom: 8px;\">Network connectivity issues</li>
                               <li style=\"margin-bottom: 8px;\">Bank's security restrictions</li>
                               <li>Daily transaction limit exceeded</li>
                           </ul>
                       </div>
                       
                       <!-- Next Steps -->
                       <div style=\"background-color: #e3f2fd; border: 1px solid #2196f3; padding: 25px; border-radius: 8px; margin: 25px 0;\">
                           <h3 style=\"color: #0d47a1; margin: 0 0 15px 0; font-size: 16px;\">🔄 What to do next:</h3>
                           <ol style=\"margin: 0; padding-left: 20px; color: #0d47a1; line-height: 1.7;\">
                               <li style=\"margin-bottom: 10px;\"><strong>Check your account balance</strong> and ensure sufficient funds</li>
                               <li style=\"margin-bottom: 10px;\"><strong>Verify your card details</strong> are correct and not expired</li>
                               <li style=\"margin-bottom: 10px;\"><strong>Try a different payment method</strong> (different card/UPI/net banking)</li>
                               <li style=\"margin-bottom: 10px;\"><strong>Contact your bank</strong> if the issue persists</li>
                               <li><strong>Retry the payment</strong> after resolving the above</li>
                           </ol>
                       </div>
                       
                       <!-- Action Button -->
                       <div style=\"text-align: center; margin: 30px 0;\">
                           <a href=\"#\" style=\"background: linear-gradient(135deg, #3498db, #2980b9); color: white; padding: 15px 30px; text-decoration: none; border-radius: 25px; font-weight: bold; font-size: 16px; display: inline-block;\">
                               🔄 Try Payment Again
                           </a>
                       </div>
                       
                       
                       
                       <p style=\"font-size: 16px; margin-top: 30px; text-align: center; color: #7f8c8d;\">
                           We appreciate your interest in <strong>UPWIECON 2025</strong>
                       </p>
                   </div>
                   
                   <!-- Footer -->
                   <div style=\"background-color: #34495e; padding: 25px; text-align: center;\">
                       <p style=\"color: #bdc3c7; margin: 0 0 10px 0; font-size: 14px;\">
                           <strong>UPWIECON 2025 Team</strong>
                       </p>
                       <p style=\"color: #95a5a6; margin: 0; font-size: 12px;\">
                           This is an automated notification. Please do not reply directly to this email.
                       </p>
                   </div>
               </div>
           </div>
        </body>
        </html>";
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

    private function getUnknownStatusEmailTemplate($registration, $payment) {
        return <<<HTML
<html>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
    <div style="max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ddd; border-radius: 8px;">
        <h2 style="color: #e67e22; text-align: center; margin-bottom: 30px;">Payment Status Under Review</h2>
        
        <p>Dear <strong>{$registration['sName']}</strong>,</p>
        
        <p>Thank you for your interest in UPWIECON 2025. We have received your payment request, but the current status is under review.</p>
        
        <div style="background-color: #fff3cd; border: 1px solid #ffeaa7; padding: 15px; border-radius: 5px; margin: 20px 0;">
            <h3 style="color: #856404; margin-top: 0;">Payment Details:</h3>
            <ul style="margin: 10px 0; padding-left: 20px;">
                <li><strong>Order ID:</strong> {$payment['order_id']}</li>
                <li><strong>Amount:</strong> ₹{$payment['amount']}</li>
                <li><strong>Status:</strong> Under Review</li>
            </ul>
        </div>
        
        <div style="background-color: #d4edda; border: 1px solid #c3e6cb; padding: 15px; border-radius: 5px; margin: 20px 0;">
            <h3 style="color: #155724; margin-top: 0;">What happens next?</h3>
            <ul style="margin: 10px 0; padding-left: 20px;">
                <li>Our team is reviewing your payment status</li>
                <li>You will receive an update within 24-48 hours</li>
                <li>If payment is confirmed, you'll receive a confirmation email</li>
                <li>If there's an issue, we'll guide you through the next steps</li>
            </ul>
        </div>
        
        <div style="background-color: #f8d7da; border: 1px solid #f5c6cb; padding: 15px; border-radius: 5px; margin: 20px 0;">
            <h3 style="color: #721c24; margin-top: 0;">Important:</h3>
            <p style="margin: 10px 0;"><strong>Please do not attempt to pay again</strong> until you receive further instructions from our team.</p>
            <p style="margin: 10px 0;">If you have any urgent queries, please contact us with your Order ID: <strong>{$payment['order_id']}</strong></p>
        </div>
        
        <p style="margin-top: 30px;">Thank you for your patience and interest in UPWIECON 2025.</p>
        
        <hr style="border: none; height: 1px; background-color: #ddd; margin: 30px 0;">
        
        <p style="font-size: 12px; color: #666; text-align: center;">
            <strong>UPWIECON 2025 Team</strong><br>
            Email: {$this->replyToEmail}<br>
            This is an automated message. Please do not reply directly to this email.
        </p>
    </div>
</body>
</html>
HTML;
    }

    private function getUnknownStatusEmailTextTemplate($registration, $payment) {
        return <<<EOT
Dear {$registration['sName']},

Thank you for your interest in UPWIECON 2025. We have received your payment request, but the current status is under review.

PAYMENT DETAILS:
- Order ID: {$payment['order_id']}
- Amount: ₹{$payment['amount']}
- Status: Under Review

WHAT HAPPENS NEXT?
- Our team is reviewing your payment status
- You will receive an update within 24-48 hours
- If payment is confirmed, you'll receive a confirmation email
- If there's an issue, we'll guide you through the next steps

IMPORTANT:
Please do not attempt to pay again until you receive further instructions from our team.

If you have any urgent queries, please contact us with your Order ID: {$payment['order_id']}

Thank you for your patience and interest in UPWIECON 2025.

Regards,
UPWIECON 2025 Team
Email: {$this->replyToEmail}

This is an automated message. Please do not reply directly to this email.
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