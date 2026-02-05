<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPWIECON 2026</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css"
        rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="images/logo-1.jpg">
    <link rel="stylesheet" href="style.css">
    <style>
        :root {
            --primary-pink: #FF2D95;
            --primary-blue: #00B4D8;
            --secondary-blue: #0096C7;
            --accent-pink: #FF6FB5;
            --deep-blue: #003459;
            --light-pink: #FFB3D9;
            --light-blue: #90E0EF;
            --accent-yellow: #FFC107;
            --dark-yellow: #FF9800;
            --glass-white: rgba(255, 255, 255, 0.7);
            --text-dark: #1a1a1a;
            --gradient-pink-blue: linear-gradient(135deg, #FF2D95 0%, #00B4D8 100%);
            --gradient-blue-pink: linear-gradient(135deg, #00B4D8 0%, #FF2D95 100%);
            --gradient-light: linear-gradient(135deg, #FFB3D9 0%, #90E0EF 100%);
        }

        .conference-badge .badge {
            background: var(--gradient-pink-blue) !important;
            border: none;
            box-shadow: 0 4px 15px rgba(255, 45, 149, 0.3);
        }

        .highlight-card {
            background: rgba(255, 255, 255, 0.85) !important;
            border: 1px solid rgba(0, 210, 255, 0.2) !important;
            color: var(--text-dark) !important;
            backdrop-filter: blur(10px);
        }

        .highlight-card i {
            background: var(--gradient-pink-blue);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .highlight-card h5 {
            color: var(--deep-blue) !important;
        }

        .btn-warning {
            background: var(--primary-pink) !important;
            border: none !important;
            color: white !important;
            box-shadow: 0 8px 20px rgba(255, 45, 149, 0.4);
            transition: all 0.3s ease;
        }

        .btn-warning:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 25px rgba(255, 45, 149, 0.5);
            background: var(--accent-pink) !important;
        }

        .btn-light {
            background: white !important;
            color: var(--primary-blue) !important;
            border: 2px solid var(--primary-blue) !important;
            transition: all 0.3s ease;
        }

        .btn-light:hover {
            background: var(--primary-blue) !important;
            color: white !important;
            transform: translateY(-3px);
        }

        .newText {
            color: white !important;
        }

        .section-divider {
            background: var(--gradient-pink-blue) !important;
        }

        .objective-card i {
            color: var(--primary-blue) !important;
        }

        .objective-card h5 {
            color: var(--deep-blue) !important;
        }

        .stat-yellow {
            color: #FFC107 !important;
            text-shadow: 0 2px 8px rgba(255, 193, 7, 0.5);
            font-weight: 900 !important;
        }
    </style>

<body>
    <header id="header" class="header ">
        <div class=" ">
            <!-- Top Row: Three Logos -->
            <div class="logos-row py-3">
                <div class="logos-section">
                    <div class="logo-container">
                        <a class="navbar-brand" href="Default.php">
                            <img src="images/logo1.png" alt="NIELIT Logo" class="logo-img img-fluid"
                                style="background:white">
                        </a>
                    </div>
                    <div class="logo-container">
                        <a class="navbar-brand" href="Default.php">
                            <img src="images/ieee_up.jpg" alt="UPWIECON 2026 Logo" class="logo-img img-fluid">
                        </a>
                    </div>
                    <!-- <div class="logo-container">
                        <a class="navbar-brand" href="Default.php">
                            <img src="images/ieee_logo.jpg" alt="Conference Logo" class="logo-img img-fluid">
                        </a>
                    </div> -->
                </div>
            </div>

            <!-- Bottom Row: Navigation Menu -->
            <nav class="navbar navbar-expand-lg navbar-light py-2 border-top border-light border-opacity-25 ">
                <!-- Mobile menu button -->
                <button class="navbar-toggler mx-auto" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Navigation menu -->
                <div class="collapse navbar-collapse" id="navbarNavDropdown" style="zoom: 84%;">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="./Default.php" aria-label="Home">
                                <i class="bi bi-house-door "></i>
                                HOME
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./papersub.php" aria-label="Paper Submission">
                                <i class="bi bi-file-earmark-text "></i>
                                SUBMISSION
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./call-for-special-session.php"
                                aria-label="Call for Special Session">
                                <i class="bi bi-megaphone "></i>
                                SPECIAL SESSION
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./speakers.php" aria-label="Speakers">
                                <i class="bi bi-person-badge "></i>
                                SPEAKERS
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./committee.php" aria-label="Committees">
                                <i class="bi bi-people "></i>
                                COMMITTEES
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./venue.php" aria-label="Venue">
                                <i class="bi bi-geo-alt "></i>
                                VENUE
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./conference-schedule.php" aria-label="Schedule">
                                <i class="bi bi-calendar-event "></i>
                                SCHEDULE
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./registration.php" aria-label="Registration">
                                <i class="bi bi-person-plus "></i>
                                REGISTRATION
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./callforpaper.php" aria-label="Call for Papers">
                                <i class="bi bi-journal-text"></i>
                                CALL FOR PAPER
                            </a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="https://www.nielit.ac.in/upwiecon2026/proceedings.php"
                                aria-label="Proceedings">
                                <i class="bi bi-book me-1"></i>PROCEEDINGS
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://www.nielit.ac.in/upwiecon2026/gallery.php"
                                aria-label="Gallery">
                                <i class="bi bi-images me-1"></i>GALLERY
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://www.nielit.ac.in/upwiecon2026/awards.php"
                                aria-label="Awards">
                                <i class="bi bi-award me-1"></i>AWARDS
                            </a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link" href="./contact.php" aria-label="Contact">
                                <i class="bi bi-envelope"></i>
                                CONTACT Us
                            </a>

                            <!-- </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./callforpaper.php" aria-label="Call for Papers">
                                <i class="bi bi-journal-text"></i>
                                CALL FOR PAPER
                            </a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link" href="./starProject.php" aria-label="Call for Papers">
                                <i class="bi bi-star-fill"></i>
                                STAR Project Competition
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>