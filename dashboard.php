<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    // Redirect to login page
    header("Location: login.php");
    exit();
}
echo <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <i class="fas fa-tachometer-alt me-2"></i>Admin Panel
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="price_list.php">
                            <i class="fas fa-list-alt me-1"></i>View Price List
                        </a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link" href="./transaction_log.php">
                            <i class="fas fa-file-invoice-dollar me-1"></i>View Transaction Log
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="email_log.php">
                            <i class="fas fa-envelope me-1"></i>View Email Log
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="registration_info.php">
                            <i class="fas fa-users me-1"></i>View Registration Info
                        </a>
                    </li>
                </ul>
                
                <!-- User info and logout section -->
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
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h2>Welcome to the Admin Panel</h2>
                        <p class="text-muted">Select an option from the navigation bar to manage the system.</p>
                    </div>
                    <div>
                        <span class="badge bg-success">
                            <i class="fas fa-circle me-1"></i>Online
                        </span>
                    </div>
                </div>
                
                <!-- Quick stats cards -->
                <div class="row">
                    <!-- <div class="col-lg-3 col-md-6 mb-4">
                        <div class="card border-primary">
                            <div class="card-body text-center">
                                <i class="fas fa-list-alt fa-2x text-primary mb-2"></i>
                                <h5>Price List</h5>
                                <a href="price_list.php" class="btn btn-outline-primary btn-sm">View</a>
                            </div>
                        </div>
                    </div> -->
                    <center>
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="card border-success">
                            <div class="card-body text-center">
                                <i class="fas fa-file-invoice-dollar fa-2x text-success mb-2"></i>
                                <h5>Transactions</h5>
                                <a href="./transaction_log.php" class="btn btn-outline-success btn-sm">View</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="card border-info">
                            <div class="card-body text-center">
                                <i class="fas fa-envelope fa-2x text-info mb-2"></i>
                                <h5>Email Logs</h5>
                                <a href="email_log.php" class="btn btn-outline-info btn-sm">View</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="card border-warning">
                            <div class="card-body text-center">
                                <i class="fas fa-users fa-2x text-warning mb-2"></i>
                                <h5>Registrations</h5>
                                <a href="registration_info.php" class="btn btn-outline-warning btn-sm">View</a>
                            </div>
                        </div>
                    </div>
                    </center>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Bootstrap JS Bundle CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        function confirmLogout() {
            return confirm('Are you sure you want to logout?');
        }
        
        // Add active class to current page
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
</body>
</html>
HTML
?>