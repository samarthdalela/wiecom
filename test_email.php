<?php
// test_email.php - Email testing script
session_start();

// Include required files
require_once 'config/database.php';
require_once 'classes/EmailNotification.php';

// Set headers for JSON response
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

try {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        throw new Exception('Only POST method allowed');
    }

    $action = $_POST['action'] ?? '';
    
    if ($action === 'send_test') {
        // Initialize email notification
        $emailNotification = new EmailNotification();
        
        // Send test email
        $result = $emailNotification->sendTestEmail();
        
        if ($result) {
            echo json_encode([
                'success' => true,
                'message' => 'Test email sent successfully'
            ]);
        } else {
            echo json_encode([
                'success' => false,
                'error' => 'Failed to send test email'
            ]);
        }
        
    } elseif ($action === 'check_config') {
        $emailNotification = new EmailNotification();
        $config = $emailNotification->checkEmailConfig();
        
        echo json_encode([
            'success' => true,
            'config' => $config
        ]);
        
    } elseif ($action === 'test_payment_email') {
        // Test payment confirmation email with mock data
        $mockRegistration = [
            'iRegId' => 'TEST_001',
            'sName' => 'Test User',
            'sEmail' => 'samarthdalela@gmail.com',
            'sMobile' => '9876543210',
            'sCategory' => 'Student',
            'sIEEEMember' => 'Yes',
            'sNationality' => 'Indian'
        ];
        
        $mockPayment = [
            'order_id' => 'UPWIECON2025_TEST_' . time(),
            'txn_id' => 'TXN_TEST_' . time(),
            'amount' => 5.00,
            'status' => 'SUCCESS'
        ];
        
        $emailNotification = new EmailNotification();
        $result = $emailNotification->sendPaymentConfirmation($mockRegistration, $mockPayment);
        
        if ($result) {
            echo json_encode([
                'success' => true,
                'message' => 'Test payment confirmation email sent successfully'
            ]);
        } else {
            echo json_encode([
                'success' => false,
                'error' => 'Failed to send test payment confirmation email'
            ]);
        }
        
    } else {
        throw new Exception('Invalid action specified');
    }
    
} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'error' => $e->getMessage()
    ]);
}
?>