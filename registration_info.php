<?php
require_once './config/database.php';
session_start();

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php");
    exit();
}

$database = new Database();
$conn = $database->connect();

$sql = "SELECT * from tblupwiecon2025
        ORDER BY iRegId DESC";
$stmt = $conn->prepare($sql);
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Joined Payment and Registration Info</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
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
<div class="container mt-5">

    <h2>Registration Details</h2>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead class="table-dark">
                <tr>
                  
                    <th>Registrant ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Category</th>
                    <th>Nationality</th>
                    <th>IEEEMember</th>
                    <th>EarlyBird</th>
                    <th>Campus</th>
                    <th>Paper Title</th>
                    <th>Paper ID</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($data)): ?>
                    <?php foreach ($data as $row): ?>
                        <tr>
                           
                                  <td><?= htmlspecialchars($row['iRegId']) ?></td>
                            <td><?= htmlspecialchars($row['sName']) ?></td>
                            <td><?= htmlspecialchars($row['sEmail']) ?></td>
                            <td><?= htmlspecialchars($row['sMobile']) ?></td>
                            <td><?= htmlspecialchars($row['sCategory']) ?></td>
                            <td><?= htmlspecialchars($row['sNationality']) ?></td>
                            <td><?= htmlspecialchars($row['sIEEEMember']) ?></td>
                            <td><?= htmlspecialchars($row['sEarlyBird']) ?></td>
                            <td><?= htmlspecialchars($row['sCampus']) ?></td>
                            <td><?= htmlspecialchars($row['sPaperTitle']) ?></td>
                            <td><?= htmlspecialchars($row['sPaperId']) ?></td>
                            <td><?= htmlspecialchars($row['dtCreated']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="19" class="text-center">No data found</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>
