<?php
// Include the database connection class
require_once './config/database.php';

// Check if user is logged in
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php");
    exit();
}

// Create database connection
$database = new Database();
$conn = $database->connect();

// Fetch transactions from payment_transaction_log
$sql = "SELECT request_data, response_data FROM payment_transaction_log ORDER BY id DESC";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Format JSON nicely
function formatJson($jsonString) {
    $data = json_decode($jsonString, true);
    if (json_last_error() !== JSON_ERROR_NONE) {
        return '<pre>' . htmlspecialchars($jsonString) . '</pre>';
    }
    return '<pre>' . htmlspecialchars(json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES)) . '</pre>';
}

// Extract key request/response info
function extractKeyInfo($jsonString, $type) {
    $data = json_decode($jsonString, true);
    if (json_last_error() !== JSON_ERROR_NONE || !is_array($data)) {
        return ['Error' => 'Invalid JSON'];
    }

    if ($type === 'request') {
        return [
            'Transaction ID' => $data['txnid'] ?? 'N/A',
            'Amount' => $data['amount'] ?? 'N/A',
            'Customer' => $data['firstname'] ?? 'N/A',
            'Email' => $data['email'] ?? 'N/A',
            'Product' => $data['productinfo'] ?? 'N/A'
        ];
    } else {
        $token = isset($data['session_token']) ? substr($data['session_token'], 0, 20) . '...' : 'N/A';
        return [
            'Success' => (!empty($data['success']) && $data['success'] === true) ? 'Yes' : 'No',
            'Session Token' => $token,
            'Status' => $data['status'] ?? 'N/A'
        ];
    }
}

// Load email logs from /logs folder
$emailLogs = [];
$logDir = __DIR__ . '/logs';

if (is_dir($logDir)) {
    $files = scandir($logDir);
    foreach ($files as $file) {
        if (preg_match('/^email_results_\d{4}-\d{2}-\d{2}\.txt$/', $file)) {
            $content = file_get_contents($logDir . '/' . $file);
            $emailLogs[] = [
                'filename' => $file,
                'content' => $content
            ];
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment Transaction Log</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .json-data { max-width: 500px; overflow-x: auto; }
        .key-info { background-color: #f9f9f9; padding: 10px; margin: 5px 0; }
        .toggle-btn { background-color: #4CAF50; color: white; padding: 5px 10px; border: none; cursor: pointer; }
        pre { white-space: pre-wrap; word-wrap: break-word; font-size: 12px; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="./dashboard.php">
            <i class="fas fa-tachometer-alt me-2"></i>Admin Panel
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <!-- <li class="nav-item"><a class="nav-link" href="price_list.php"><i class="fas fa-list-alt me-1"></i>View Price List</a></li> -->
                <li class="nav-item"><a class="nav-link" href="./transaction_log.php"><i class="fas fa-file-invoice-dollar me-1"></i>View Transaction Log</a></li>
                <li class="nav-item"><a class="nav-link" href="email_log.php"><i class="fas fa-envelope me-1"></i>View Email Log</a></li>
                <li class="nav-item"><a class="nav-link" href="registration_info.php"><i class="fas fa-users me-1"></i>View Registration Info</a></li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        <i class="fas fa-user-circle me-1"></i>Admin
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i>Settings</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <a class="dropdown-item text-danger" href="logout.php" onclick="return confirmLogout()">
                                <i class="fas fa-sign-out-alt me-2"></i>Logout
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-4">
    <h2>Email Logs</h2>
    <?php if (!empty($emailLogs)): ?>
        <div class="mt-5">
        
            <div class="accordion" id="emailLogAccordion">
                <?php foreach ($emailLogs as $index => $log): ?>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading<?= $index ?>">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $index ?>" aria-expanded="false" aria-controls="collapse<?= $index ?>">
                                <?= htmlspecialchars($log['filename']) ?>
                            </button>
                        </h2>
                        <div id="collapse<?= $index ?>" class="accordion-collapse collapse" aria-labelledby="heading<?= $index ?>" data-bs-parent="#emailLogAccordion">
                            <div class="accordion-body">
                                <pre><?= htmlspecialchars($log['content']) ?></pre>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php else: ?>
        <div class="mt-5">
            <h5>No email logs found in <code>/logs</code>.</h5>
        </div>
    <?php endif; ?>
</div>

<!-- JS Scripts -->
<script>
    function toggleJson(id) {
        const el = document.getElementById(id);
        if (el) el.style.display = (el.style.display === 'none') ? 'block' : 'none';
    }

    function confirmLogout() {
        return confirm('Are you sure you want to logout?');
    }

    document.addEventListener('DOMContentLoaded', function() {
        const currentPage = window.location.pathname.split('/').pop();
        const navLinks = document.querySelectorAll('.navbar-nav .nav-link');
        navLinks.forEach(link => {
            if (link.getAttribute('href') === currentPage) {
                link.classList.add('active');
            }
        });
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
