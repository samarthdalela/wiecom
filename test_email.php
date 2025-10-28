<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Autoload PHPMailer (make sure it's installed via Composer or included manually)
require 'vendor/autoload.php'; // If using Composer
// require_once 'classes/PHPMailer/PHPMailer.php'; // Manual alternative
// require_once 'classes/PHPMailer/SMTP.php';
// require_once 'classes/PHPMailer/Exception.php';

header('Content-Type: application/json');

// Email details
$to = 'samarthdalela@gmail.com';
$subject = 'Test Email from UPWIECON';
$body = 'This is a test email from the registration form.';

// Create PHPMailer instance
$mail = new PHPMailer(true);

try {
    // SMTP configuration
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com'; // Or smtp.nielit.ac.in if using Google Workspace
    $mail->SMTPAuth   = true;
    $mail->Username   = 'ieeeconference@nielit.ac.in';      // Your Gmail or Workspace email
    $mail->Password   = 'kvyw myci rdfd tuja';      // App password (not your main email password)
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    // Sender and recipient
    $mail->setFrom('ieeeconference@nielit.ac.in', 'UPWIECON 2025');
    $mail->addAddress($to);
    $mail->addReplyTo('ieeeconference@nielit.ac.in');

    // Content
    $mail->isHTML(false); // Change to true for HTML
    $mail->Subject = $subject;
    $mail->Body    = $body;

    $mail->send();
    echo json_encode(['success' => true]);

} catch (Exception $e) {
    echo json_encode(['success' => false, 'error' => $mail->ErrorInfo]);
}
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Autoload PHPMailer (make sure it's installed via Composer or included manually)
require 'vendor/autoload.php'; // If using Composer
// require_once 'classes/PHPMailer/PHPMailer.php'; // Manual alternative
// require_once 'classes/PHPMailer/SMTP.php';
// require_once 'classes/PHPMailer/Exception.php';

header('Content-Type: application/json');

// Email details
$to = 'samarthdalela@gmail.com';
$subject = 'Test Email from UPWIECON';
$body = 'This is a test email from the registration form.';

// Create PHPMailer instance
$mail = new PHPMailer(true);

try {
    // SMTP configuration
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com'; // Or smtp.nielit.ac.in if using Google Workspace
    $mail->SMTPAuth   = true;
    $mail->Username   = 'ieeeconference@nielit.ac.in';      // Your Gmail or Workspace email
    $mail->Password   = 'kvyw myci rdfd tuja';      // App password (not your main email password)
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    // Sender and recipient
    $mail->setFrom('ieeeconference@nielit.ac.in', 'UPWIECON 2025');
    $mail->addAddress($to);
    $mail->addReplyTo('ieeeconference@nielit.ac.in');

    // Content
    $mail->isHTML(false); // Change to true for HTML
    $mail->Subject = $subject;
    $mail->Body    = $body;

    $mail->send();
    echo json_encode(['success' => true]);

} catch (Exception $e) {
    echo json_encode(['success' => false, 'error' => $mail->ErrorInfo]);
}

