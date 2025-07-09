<?php
  echo <<<HTML
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPWIECON 2025</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css"
        rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="images/logo-1.jpg">


    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css"
        rel="stylesheet">
    <style>
        .venue-section {
            background-image: url("images/mountains-dehradun.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            z-index: 10;
        }

        .img-fluid {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.78), rgba(247, 243, 247, 0.99));

            backdrop-filter: blur(15px);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.08);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: sticky;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);

        }

        .footer {
            background: linear-gradient(135deg, rgba(171, 103, 186, 0.78), rgba(91, 2, 109, 0.99));
            backdrop-filter: blur(15px);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.08);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: sticky;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }

        .header {
            background: linear-gradient(135deg, rgba(228, 200, 234, 0.78), rgba(91, 2, 109, 0.99));
            backdrop-filter: blur(15px);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.08);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: sticky;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }

        .newText {
            color: rgba(91, 2, 109, 0.99);
        }

        .newBg {
            background-color: rgba(91, 2, 109, 0.99);

        }

        .btnNew {
            background: rgba(91, 2, 109, 0.99);
        }


        .header.scrolled {
            background: rgba(255, 255, 255, 0.99);
            box-shadow: 0 8px 40px rgba(0, 0, 0, 0.12);
            backdrop-filter: blur(20px);
        }

        /* Logo Section - Centered */
        .logos-row {
            padding: 1.5rem 0;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        .logos-section {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 3rem;
            flex-wrap: wrap;
        }

        .logo-container {
            padding: 0.5rem;
            transition: transform 0.3s ease;
        }

        .logo-container:hover {
            transform: translateY(-5px);
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
        }

        .logo-img {
            max-height: 80px;
            width: auto;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            filter: brightness(1.02) contrast(1.05);
        }

        .logo-img:hover {
            transform: scale(1.08);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);
            filter: brightness(1.1) contrast(1.1);
        }

        /* Navigation - Centered */
        .navbar {
            padding: 1rem 0;
            background: #d0a8d3;
        }

        .navbar-nav {
            display: flex;
            justify-content: space-evenly;
            align-items: center;
            /* flex-wrap: wrap; */
            gap: 0.1rem;
            width: 100%;
        }

        .nav-item {
            margin: 0 0.1rem;
        }

        .text-justify {
            text-align: justify;
        }

        .nav-link {
            font-weight: 600;
            font-size: 0.8rem;
            color: #2c3e50 !important;
            padding: 0.2rem 0.3rem !important;
            position: relative;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            text-decoration: none;
            border-radius: 8px;
            display: flex;
            align-items: start;
            gap: 0.5rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            background: rgba(255, 255, 255, 0.7);
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        .nav-link:hover {
            color: #ffffff !important;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
            border-color: transparent;
        }

        .nav-link i {
            font-size: 1rem;
            transition: transform 0.3s ease;
        }

        .nav-link:hover i {
            transform: scale(1.2);
        }

        /* Modern underline effect */
        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 3px;
            bottom: -2px;
            left: 50%;
            background: linear-gradient(90deg, #667eea, #764ba2);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            transform: translateX(-50%);
            border-radius: 2px;
        }

        .nav-link:hover::after {
            width: 90%;
        }

        /* Mobile Menu Button */
        .navbar-toggler {
            border: none;
            padding: 0.75rem 1rem;
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.1), rgba(118, 75, 162, 0.1));
            border-radius: 12px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }

        .navbar-toggler:hover {
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.2), rgba(118, 75, 162, 0.2));
            transform: scale(1.05);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
        }

        .navbar-toggler:focus {
            box-shadow: 0 0 0 0.25rem rgba(102, 126, 234, 0.25);
            outline: none;
        }

        /* .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath
            stroke='rgba%2844, 62, 80, 0.8%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='m4 7h22M4 15h22M4
            23h22'/%3e%3c/svg%3e");
            transition: transform 0.3s ease;
            } */

        .navbar-toggler:hover .navbar-toggler-icon {
            transform: rotate(90deg);
        }

        .logo-container {
            padding: 0.5rem 0;
        }

        .logo-img {
            max-height: 70px;
            width: auto;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .logo-slider {
            width: 100%;
            overflow: hidden;
            padding: 60px 0;
        }

        .logo-track {
            display: flex;
            animation: slide 20s linear infinite;
            gap: 80px;
            width: fit-content;
        }

        .logo-slide {
            display: flex;
            align-items: center;
            justify-content: center;
            min-width: 200px;
            height: 80px;
            transition: all 0.3s ease;
        }

        .logo-slide:hover {
            transform: translateY(-5px);
        }

        .textColour {
            color: #ffffff;
        }

        .logo {
            width: 160px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            font-weight: 600;
            color: #1a1a1a;
            border: 2px solid #f0f0f0;
            border-radius: 12px;
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
        }

        .logo:hover {
            border-color: #e0e0e0;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transform: scale(1.05);
        }

        .logo:nth-child(1) {
            color: #6366f1;
            border-color: #e0e7ff;
        }

        .logo:nth-child(2) {
            color: #8b5cf6;
            border-color: #ede9fe;
        }

        .logo:nth-child(3) {
            color: #06b6d4;
            border-color: #cffafe;
        }

        .logo:nth-child(4) {
            color: #10b981;
            border-color: #d1fae5;
        }

        .logo:nth-child(5) {
            color: #f59e0b;
            border-color: #fef3c7;
        }

        .logo:nth-child(6) {
            color: #ef4444;
            border-color: #fee2e2;
        }

        @keyframes slide {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-50%);
            }
        }

        .logo-slider:hover .logo-track {
            animation-play-state: paused;
        }

        @media (max-width: 768px) {
            .logo-slider {
                padding: 40px 0;
            }

            .logo-track {
                gap: 40px;
                animation-duration: 15s;
            }

            .logo-slide {
                min-width: 150px;
                height: 60px;
            }

            .logo {
                width: 120px;
                height: 50px;
                font-size: 14px;
            }

            .logo-img {
                width: 80px;
            }
        }

        /* Fade edges for infinite effect */
        .logo-slider::before,
        .logo-slider::after {
            content: '';
            position: absolute;
            top: 0;
            width: 100px;
            height: 100%;
            z-index: 2;
            pointer-events: none;
        }

        .logo-slider::before {
            left: 0;
            background: linear-gradient(to right, rgba(255, 255, 255, 1), rgba(255, 255, 255, 0));
        }

        .logo-slider::after {
            right: 0;
            background: linear-gradient(to left, rgba(255, 255, 255, 1), rgba(255, 255, 255, 0));
        }

        .logo-slider {
            position: relative;
        }

        /* Mobile optimizations */
        @media (max-width: 991.98px) {
            .navbar-collapse {
                background: rgba(255, 255, 255, 0.98);
                backdrop-filter: blur(10px);
                border-radius: 12px;
                padding: 1rem;
                margin-top: 1rem;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            }

            .navbar-nav .nav-link {
                text-align: center;
                margin: 0.25rem 0;
                border-radius: 6px;
                background: rgba(0, 123, 255, 0.05);
            }

            .navbar-nav .nav-link:hover {
                background: rgba(0, 123, 255, 0.1);
                transform: none;
            }

            .logo-img {
                max-height: 60px;
            }
        }

        .borderNW {
            border: 4px solid var(--primary-blue);
        }

        /* Add some body padding to account for fixed header */
        body {
            /* padding-top: 50px; */
            background: linear-gradient(135deg, var(--light-blue) 0%, #ffffff 50%, #f8f9fa 100%);

        }

        /* Hero section styles */
        .hero-area {
            min-height: 100vh;
            position: relative;
        }

        .text-shadow {
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .bgNew {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: 1px solid hwb(0 100% 0% / 0.651);
            background-color: #4b164cc1;
            color: rgb(239, 235, 235);
            border-radius: 20px;
        }

        .highlight-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: 1px solid hwb(0 100% 0% / 0.651);
            background-color: #4b164cc1;
            color: rgb(239, 235, 235);
        }

        .highlight-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .highlight-cardf {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: 1px solid hwb(0 100% 0% / 0.651);
            background-color: #4b164c54;
            color: rgb(239, 235, 235);
        }

        .highlight-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .animate-bounce {
            animation: bounce 2s infinite;
        }

        @keyframes bounce {

            0%,
            20%,
            50%,
            80%,
            100% {
                transform: translateY(0);
            }

            40% {
                transform: translateY(-10px);
            }

            60% {
                transform: translateY(-5px);
            }
        }

        /* About section styles */
        .about-card,
        .objective-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .about-card:hover,
        .objective-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
        }

        .section-divider {
            transition: transform 0.3s ease;
        }

        .section-header:hover .section-divider {
            transform: scaleX(1.2);
        }

        /* Date cards hover effect */
        .date-card {
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .date-card:hover {
            transform: translateY(-3px);
            background: rgba(255, 255, 255, 0.2) !important;
        }

        /* IEEE section card */
        .ieee-badge {
            transition: transform 0.3s ease;

        }

        .badge {
            background: rgba(91, 2, 109, 0.99);
        }

        .ieee-section-card:hover .ieee-badge {
            transform: rotate(5deg) scale(1.1);
        }

        /* Back to top button */
        #backToTop {
            transition: all 0.3s ease;
        }

        #backToTop:hover {
            transform: scale(1.1);
        }

        /* Conference date highlight animation */
        .conference-date-highlight {
            animation: pulse 3s infinite;
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.05);
            }

            100% {
                transform: scale(1);
            }
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .hero-area {
                min-height: 90vh;
            }

            .display-3 {
                font-size: 2.5rem;
            }

            .hero-actions .btn {
                display: block;
                margin: 0.5rem auto;
                width: 80%;
            }
        }

        /* Smooth link hover animations */
        .nav-link {
            position: relative;
            overflow: hidden;
        }

        .nav-link::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(0, 123, 255, 0.1), transparent);
            transition: left 0.5s;
        }

        .nav-link:hover::before {
            left: 100%;
        }

        /* new content styles start here */
        :root {
            --primary-blue: rgba(70, 12, 82, 0.99);
            --accent-blue: rgba(91, 2, 109, 0.99);
            --light-blue: rgba(232, 217, 235, 0.99);
            --gold: #f39c12;
            --text-dark: #2c3e50;
        }

        .committee-hero {
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--accent-blue) 100%);
            color: white;
            padding: 4rem 0;
            position: relative;
            overflow: hidden;
        }

        .committee-hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse"><path d="M 10 0 L 0 0 0 10" fill="none" stroke="rgba(255,255,255,0.1)" stroke-width="0.5"/></pattern></defs><rect width="100" height="100" fill="url(%23grid)" /></svg>');
            opacity: 0.3;
        }

        .committee-hero .container {
            position: relative;
            z-index: 1;
        }

        .borderNW {
            border: 2px solid var(--light-blue) !important;
        }

        .bg-light {
            background-color: var(--light-blue) !important;
        }

        .text-primary {
            color: var(--primary-blue) !important;
        }

        .btn-outline-primary {
            color: var(--primary-blue);
            border-color: var(--primary-blue);
        }

        .btn-outline-primary:hover {
            background-color: var(--primary-blue);
            border-color: var(--primary-blue);
        }

        .border-primary {
            border-color: var(--primary-blue) !important;
        }

        .border-start.border-primary {
            border-left-color: var(--primary-blue) !important;
        }

        .list-group-item .bi-check-circle-fill {
            color: var(--primary-blue) !important;
        }

        .alert-info {
            background-color: var(--light-blue);
            border-color: var(--accent-blue);
            color: var(--text-dark);
        }

        .alert-warning {
            background-color: #fff3cd;
            border-color: var(--gold);
            color: var(--text-dark);
        }

        .bg-warning.bg-opacity-25 {
            background-color: rgba(243, 156, 18, 0.25) !important;
        }

        .accordion-button:not(.collapsed) {
            background-color: var(--light-blue);
            color: var(--text-dark);
        }

        .accordion-button:focus {
            border-color: var(--accent-blue);
            box-shadow: 0 0 0 0.25rem rgba(91, 2, 109, 0.25);
        }

        .card-header {
            border-bottom: 1px solid var(--light-blue);
        }

        a {
            color: var(--accent-blue);
        }

        a:hover {
            color: var(--primary-blue);
        }

        /* content style end herer  */
    </style>


</head>

<body>
    <header id="header" class="header">
        <div class=" ">
            <!-- Top Row: Three Logos -->
            <div class="logos-row py-3">
                <div class="logos-section">
                    <div class="logo-container">
                        <a class="navbar-brand" href="Default.php">
                            <img src="images/logo1.png" alt="NIELIT Logo" class="logo-img img-fluid">
                        </a>
                    </div>
                    <div class="logo-container">
                        <a class="navbar-brand" href="Default.php">
                            <img src="images/ieee_up.jpg" alt="UPWIECON 2025 Logo" class="logo-img img-fluid">
                        </a>
                    </div>
                    <div class="logo-container">
                        <a class="navbar-brand" href="Default.php">
                            <img src="images/ieee_logo.jpg" alt="Conference Logo" class="logo-img img-fluid">
                        </a>
                    </div>
                </div>
            </div>

            <!-- Bottom Row: Navigation Menu -->
            <nav class="navbar navbar-expand-lg navbar-light py-2 border-top border-light border-opacity-25">
                <!-- Mobile menu button -->
                <button class="navbar-toggler mx-auto" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Navigation menu -->
                <div class="collapse navbar-collapse" id="navbarNavDropdown" style="zoom: 80%;">
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
                            <a class="nav-link" href="https://www.nielit.ac.in/upwiecon2025/proceedings.php"
                                aria-label="Proceedings">
                                <i class="bi bi-book me-1"></i>PROCEEDINGS
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://www.nielit.ac.in/upwiecon2025/gallery.php"
                                aria-label="Gallery">
                                <i class="bi bi-images me-1"></i>GALLERY
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://www.nielit.ac.in/upwiecon2025/awards.php"
                                aria-label="Awards">
                                <i class="bi bi-award me-1"></i>AWARDS
                            </a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link" href="./contact.php" aria-label="Contact">
                                <i class="bi bi-envelope"></i>
                                CONTACT
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./startProject.php" aria-label="Call for Papers">
                                <i class="bi bi-star-fill"></i>
                                STAR Project Competition
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <!-- body   -->
    <section class="committee-hero">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="display-4 fw-bold mb-3">
                        <i class="fas fa-users me-3"></i>
                        UPWIECON-2025
                    </h1>
                    <!-- <p class="lead mb-4">Instructions to Authors</p> -->
                    <!-- <div class="d-flex justify-content-center gap-4 flex-wrap">
                    <div class="text-center">
                        <i class="fas fa-crown fa-2x mb-2"></i>
                        <div>Chief Patrons</div>
                    </div>
                    <div class="text-center">
                        <i class="fas fa-award fa-2x mb-2"></i>
                        <div>Patrons</div>
                    </div>
                    <div class="text-center">
                        <i class="fas fa-cogs fa-2x mb-2"></i>
                        <div>Organizing Committee</div>
                    </div>
                    <div class="text-center">
                        <i class="fas fa-globe fa-2x mb-2"></i>
                        <div>International Advisory</div>
                    </div>
                </div> -->
                </div>
            </div>
        </div>
    </section>
    <div class="container my-5">
        <!-- Header -->

        <!-- <div class="text-center mb-5 pb-4 border-bottom border-primary border-3">
        <h1 class="display-4 fw-bold text-dark mb-2">UPWIECON-2025</h1>
        <p class="lead fst-italic text-muted">Instructions to Authors</p>
    </div> -->

        <!-- Introduction Section -->
        <div class="card mb-4  borderNW ">
            <div class="card-body">
                <p class="card-text fs-5 mb-3">
                    <span class="bg-warning bg-opacity-25 px-2 py-1 rounded fw-semibold">Manuscripts</span>,
                    which are here referred to as submissions/articles/papers are substantial pieces of academic
                    writing.
                    Manuscripts for UPWIECON-2025 will ONLY be accepted in electronic format through Microsoft CMT
                    online submission system.
                </p>

                <div class="d-grid gap-2 d-md-block mb-3">
                    <a href="https://cmt3.research.microsoft.com/" class="btn btn-outline-primary btn-lg"
                        target="_blank">
                        <i class="bi bi-file-earmark-text me-2"></i>Submit via Microsoft CMT
                    </a>
                </div>

                <p class="fst-italic text-muted">
                    Inability/difficulty in online submission must be addressed to organizing team.
                </p>
            </div>
        </div>

        <!-- Submission Requirements -->
        <div class="card borderNW ">
            <div class="card-header bg-light">
                <h2 class="h4 mb-0"><i class="bi bi-clipboard-check me-2"></i>Submission Requirements</h2>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex align-items-start">
                        <i class="bi bi-check-circle-fill text-primary me-3 mt-1"></i>
                        <span>Authors should only submit originally written, unpublished work to UPWIECON 2025.</span>
                    </li>
                    <li class="list-group-item d-flex align-items-start">
                        <i class="bi bi-check-circle-fill text-primary me-3 mt-1"></i>
                        <span>Submissions should strictly follow the recommended
                            <a href="https://www.ieee.org/content/dam/ieee-org/ieee/web/org/conferences/conference-template-a4.docx"
                                target="_blank" class="text-decoration-none">IEEE Conference Template</a>.
                        </span>
                    </li>
                    <li class="list-group-item d-flex align-items-start">
                        <i class="bi bi-check-circle-fill text-primary me-3 mt-1"></i>
                        <span>All references must follow the IEEE format of citation.</span>
                    </li>
                    <li class="list-group-item d-flex align-items-start">
                        <i class="bi bi-check-circle-fill text-primary me-3 mt-1"></i>
                        <span>Please prefer to limit your paper within <strong>6 pages</strong> in PDF format.</span>
                    </li>
                    <li class="list-group-item d-flex align-items-start">
                        <i class="bi bi-check-circle-fill text-primary me-3 mt-1"></i>
                        <span>All fonts must be embedded in the file.</span>
                    </li>
                    <li class="list-group-item d-flex align-items-start">
                        <i class="bi bi-check-circle-fill text-primary me-3 mt-1"></i>
                        <span>Fonts that require non-English language support are not allowed.</span>
                    </li>
                    <li class="list-group-item d-flex align-items-start">
                        <i class="bi bi-check-circle-fill text-primary me-3 mt-1"></i>
                        <span>The document should not have any password protection.</span>
                    </li>
                    <li class="list-group-item d-flex align-items-start">
                        <i class="bi bi-check-circle-fill text-primary me-3 mt-1"></i>
                        <span>Do not put your own page numbers in the manuscript.</span>
                    </li>
                    <li class="list-group-item d-flex align-items-start">
                        <i class="bi bi-check-circle-fill text-primary me-3 mt-1"></i>
                        <span>Do not put your header and footer in the manuscript.</span>
                    </li>
                    <li class="list-group-item d-flex align-items-start">
                        <i class="bi bi-check-circle-fill text-primary me-3 mt-1"></i>
                        <span>The decision regarding the acceptance of the papers is at the discretion of the Chair of
                            the recommendations of Technical Program Committee and weightage/comments given by PC
                            Members/Reviewers.</span>
                    </li>
                    <li class="list-group-item d-flex align-items-start">
                        <i class="bi bi-check-circle-fill text-primary me-3 mt-1"></i>
                        <span>Note that short manuscripts/abstracts are not considered.</span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Note to Authors -->
        <div class="alert alert-info borderNW" role="alert">
            <h4 class="alert-heading"><i class="bi bi-info-circle me-2"></i>Note to Authors</h4>
            <p class="mb-0">Papers submitted to UPWIECON 2025 need to include a <strong>quantitative discussion</strong>
                related to why and how the proposed/analysed/discussed technology, concept, process etc. is a
                significant technical improvement in its area.</p>
        </div>

        <!-- Out of Scope -->
        <div class="alert alert-warning borderNW" role="alert">
            <h4 class="alert-heading"><i class="bi bi-exclamation-triangle me-2"></i>Out of Scope</h4>
            <p class="mb-0">Papers that are principally cataloguing qualitative or managerial aspects like impact,
                effect, case-study, rise, journey, study etc. will be insufficient to be accepted and are outside our
                scope. Next to this, submissions focusing only on policy/decision making or economic aspects are
                unsuitable to be accepted in UPWIECON 2025.</p>
        </div>

        <!-- Types of Articles -->
        <div class="card mb-4 borderNW">
            <div class="card-header bg-light">
                <h2 class="h4 mb-0"><i class="bi bi-journal-text me-2"></i>Types of Articles</h2>
            </div>
            <div class="card-body">
                <p class="mb-4">UPWIECON 2025 authors can select from a variety of approaches for articles that fall
                    within the scope of this conference and IEEE. These article types include, but are not limited to:
                </p>

                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="card h-100 borderNW">
                            <div class="card-header bg-light">
                                <h5 class="mb-0"><i class="bi bi-microscope me-2"></i>Original Paper</h5>
                            </div>
                            <div class="card-body">
                                <p class="card-text text-justify">Describes the original work of author(s) in the form
                                    of an electronic manuscript, which may include abstract, key words, introduction,
                                    problem statement or justification, objective, approach, significance, research
                                    questions, limitations, definition of terms, referred or related work, methodology,
                                    technically in-depth investigation, details of experimental analysis, result and/or
                                    conclusion, further scope of work, references on the topic within the scope of
                                    UPWIECON 2025 and IEEE. This may include additional materials, including figures,
                                    tables, datasets, pictorial/graphical representations, and videos links.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card h-100 borderNW">
                            <div class="card-header bg-light">
                                <h5 class="mb-0"><i class="bi bi-book me-2"></i>Review Paper</h5>
                            </div>
                            <div class="card-body ">
                                <p class="card-text text-justify">A thorough compilation and succinct summary of
                                    research performed on the topic within the scope of UPWIECON 2025 and IEEE, in the
                                    form of an electronic manuscript, which may include abstract, key words,
                                    introduction, problem statement or justification, objective, approach, significance,
                                    research questions, limitations, definition of terms, referred or related work,
                                    technically in-depth investigation or comparison, conclusion, pros and cons,
                                    proposed scope of further work and references. This may include additional
                                    materials, including figures, tables, datasets, pictorial/graphical representations,
                                    and video links.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- References -->
        <div class="card mb-4 borderNW">
            <div class="card-header bg-light">
                <h2 class="h4 mb-0"><i class="bi bi-bookmark me-2"></i>References</h2>
            </div>
            <div class="card-body">
                <h5 class="text-primary">Self-Citations</h5>
                <p class="text-justify">To comply with ethical standards as well as to provide appropriate context for
                    published work, citations of the author's own articles should not be excessive.</p>

                <h5 class="text-primary">Citation Style</h5>
                <p class="text-justify">The list of references should only include works that are cited in the text and
                    that have been published or accepted for publication. Personal communications and unpublished works
                    should only be mentioned in the text. Do not use footnotes or endnotes as a substitute for a
                    reference list. The entries in the list should be numbered consecutively and cited in numerical
                    order, and citations in the text should be identified in IEEE referencing format.</p>
            </div>
        </div>

        <!-- After Acceptance -->
        <div class="card mb-4 borderNW">
            <div class="card-header bg-light">
                <h2 class="h4 mb-0"><i class="bi bi-check-square me-2"></i>After Acceptance</h2>
            </div>
            <div class="card-body">
                <div class="accordion" id="acceptanceAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#finalManuscript">
                                <i class="bi bi-file-earmark-check me-2"></i>Final Manuscript
                            </button>
                        </h2>
                        <div id="finalManuscript" class="accordion-collapse collapse show"
                            data-bs-parent="#acceptanceAccordion">
                            <div class="accordion-body text-justify">
                                After the confirmation of the acceptance of the manuscript from the end of UPWIECON
                                2025, author(s) will have to submit the final version of the manuscript which must
                                include the suggestions/changes as per instructions/improvement mentioned by the
                                Technical Program Committee/Program Committee Members/Reviewers in the comments, if any,
                                in the acceptance notification via email.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#copyrightTransfer">
                                <i class="bi bi-c-circle me-2"></i>Copyright Transfer
                            </button>
                        </h2>
                        <div id="copyrightTransfer" class="accordion-collapse collapse"
                            data-bs-parent="#acceptanceAccordion">
                            <div class="accordion-body text-justify">
                                Authors will be asked to transfer copyright of the manuscript to IEEE. This is a
                                mandatory requirement and will be an electronic process. Author(s) will be notified via
                                email for e-copyright transfer process. This will ensure the widest possible protection
                                and dissemination of information under copyright laws. In case of any difficulty in the
                                copyright transfer process, author(s) must connect with the conference organizers.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#preprint">
                                <i class="bi bi-printer me-2"></i>Preprint
                            </button>
                        </h2>
                        <div id="preprint" class="accordion-collapse collapse" data-bs-parent="#acceptanceAccordion">
                            <div class="accordion-body text-justify">
                                The camera-ready-paper is here referred to as Preprint, which will be the final version
                                of the manuscript at the end of the UPWIECON 2025. The preprint version of the eligible
                                manuscripts will be sent to IEEE for inclusion in IEEE Digital Library. UPWIECON 2025
                                organizing team will notify the corresponding author/author(s) with preprint copy of the
                                manuscript via email for their consent on the final version.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#manuscriptUpdate">
                                <i class="bi bi-arrow-clockwise me-2"></i>Update in Manuscript
                            </button>
                        </h2>
                        <div id="manuscriptUpdate" class="accordion-collapse collapse"
                            data-bs-parent="#acceptanceAccordion">
                            <div class="accordion-body text-justify">
                                Once the manuscript is accepted and if any changes are suggested by Technical Program
                                Committee/Program Committee Members/Reviewers in the acceptance notification or
                                otherwise, author(s) must include those changes without changing the essence of the
                                accepted version. These changes must be limited to <strong>20% part of the
                                    manuscript</strong>.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Other Guidelines -->
        <div class="card mb-4 border-start border-primary border-4">
            <div class="card-header bg-light">
                <h2 class="h4 mb-0"><i class="bi bi-gear me-2"></i>Other Guidelines</h2>
            </div>
            <div class="card-body">
                <div class="row g-4">
                    <div class="col-md-6">
                        <h5 class="text-primary "><i class="bi bi-shield-check me-2"></i>Ethics</h5>
                        <p class="text-justify">Originality of the manuscript submitted is the author(s) responsibility,
                            and author(s) must avoid duplicate submission and publication, plagiarism, and
                            self-plagiarism. All manuscript submissions will be screened against the <a
                                href="https://crosscheck.ieee.org/crosscheck/" target="_blank"
                                class="text-decoration-none">CrossCheck</a> database.</p>
                    </div>

                    <div class="col-md-6">
                        <h5 class="text-primary "><i class="bi bi-people me-2"></i>Co-Author Guidelines</h5>
                        <p class="text-justify">When an article is submitted, it is implied that publication has been
                            approved by all author(s)/co-author(s). Further, changes to the co-author list are not
                            permitted after the manuscript has been accepted. Exceptional cases may be considered by the
                            Editor.</p>
                    </div>

                    <div class="col-md-6">
                        <h5 class="text-primary"><i class="bi bi-person-check me-2"></i>Corresponding Author Guidelines
                        </h5>
                        <p class="text-justify">The Corresponding Author is here referred to the author who will be
                            doing the e-mail correspondence with UPWIECON 2025, irrespective of the author position in
                            author sequence. In addition to the content of manuscript, Corresponding Author will solely
                            be responsible for putting the name and details of other authors/co-authors in the
                            submission manuscript.</p>
                    </div>

                    <div class="col-md-6">
                        <h5 class="text-primary"><i class="bi bi-type me-2"></i>Headings</h5>
                        <p class="text-justify">Please prefer not to use more than three levels of displayed headings.
                        </p>
                    </div>

                    <div class="col-md-6">
                        <h5 class="text-primary"><i class="bi bi-alphabet me-2"></i>Abbreviations</h5>
                        <p class="text-justify">Abbreviations should be defined at first mention and used consistently
                            after that occurrence. If the abbreviation occurs first in the abstract, it should be
                            defined both there and at first mention in the text.</p>
                    </div>

                    <div class="col-md-6">
                        <h5 class="text-primary"><i class="bi bi-envelope me-2"></i>E-mailing and Notifications</h5>
                        <p class="text-justify">After the submission of the manuscripts in UPWIECON 2025 authors will be
                            notified by e-mail(s) only. UPWIECON 2025 will not be held liable for any lapses in e-mail
                            communication, like non-receipt of mail, mail going junk/spam folder and similar glitches
                            alike.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Note -->
        <div class="alert alert-light border text-center" role="alert">
            <p class="mb-0 fst-italic text-muted">
                <i class="bi bi-envelope me-2"></i>For any queries regarding submission, please contact the organizing
                team
            </p>
        </div>
    </div>












    <!--bodu closed  -->
    <!-- Venue & Important Dates Section -->
    <section class="venue-section py-5">
        <section class="py-5"
            style="background: linear-gradient(135deg, rgba(171, 103, 186, 0.418), rgba(91, 2, 109, 0.39)); color: white;">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="venue-content text-center">
                            <h2 class="display-5 fw-bold mb-4">Conference Venue</h2>
                            <div class="venue-logo mb-4">
                                <img src="images/logo1.png" alt="NIELIT Logo" class="img-fluid rounded-3 shadow-lg"
                                    style="max-width: 300px; height: auto;">
                            </div>

                            <div class="venue-info highlight-cardf backdrop-blur rounded-4 p-5 mb-5">
                                <h3 class="h4 fw-bold text-warning mb-3">
                                    Jaypee Residency Manor, Road Barlow Ganj, Mussoorie, Uttarakhand 248122, India</h3>
                                <div class="contact-info">
                                    <p class="mb-2">
                                        <i class="bi bi-envelope-fill me-2"></i>
                                        <strong>Email:</strong>
                                        <a href="mailto:ieeeconference@nielit.ac.in"
                                            class="text-warning text-decoration-none">ieeeconference@nielit.ac.in</a>
                                    </p>
                                    <p class="mb-0">
                                        <i class="bi bi-telephone-fill me-2"></i>
                                        <strong>Phone:</strong> (+91) 9650339961 / 9910719256
                                    </p>
                                </div>
                            </div>

                            <div class="important-dates">
                                <h3 class="h4 fw-bold text-warning mb-4">
                                    <i class="bi bi-calendar-check me-2"></i>Important Dates
                                </h3>

                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="date-card  backdrop-blur rounded-3 p-4 highlight-cardf">
                                            <h6 class="fw-bold text-warning mb-2">Paper Submission Opens</h6>
                                            <p class="mb-0">1<sup>st</sup> February 2025</p>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="date-card  backdrop-blur rounded-3 p-4 highlight-cardf">
                                            <h6 class="fw-bold text-warning mb-2">Rolling Acceptance (Round 1)</h6>
                                            <p class="mb-0">28<sup>th</sup> February 2025</p>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="date-card  backdrop-blur rounded-3 p-4 highlight-cardf">
                                            <h6 class="fw-bold text-warning mb-2">Rolling Acceptance (Round 2)</h6>
                                            <p class="mb-0">31<sup>st</sup> March 2025</p>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="date-card   rounded-3 p-4 highlight-cardf">
                                            <h6 class="fw-bold text-warning mb-2">Rolling Acceptance (Round 3)</h6>
                                            <p class="mb-0">31<sup>st</sup> May 2025</p>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="date-card  rounded-3 p-4 highlight-cardf">
                                            <h6 class="fw-bold text-warning mb-2">Rolling Acceptance (Round 4)</h6>
                                            <p class="mb-0">31<sup>st</sup> July 2025</p>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="date-card highlight-cardf rounded-3 p-4">
                                            <h6 class="fw-bold text-warning mb-2">Final Submission Deadline</h6>
                                            <p class="mb-0">30<sup>th</sup> August 2025</p>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="date-card highlight-cardf rounded-3 p-4">
                                            <h6 class="fw-bold text-warning mb-2">Early Bird Registration</h6>
                                            <p class="mb-0">1<sup>st</sup> August 2025</p>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="date-card highlight-cardf rounded-3 p-4">
                                            <h6 class="fw-bold text-warning mb-2">Camera Ready Submission</h6>
                                            <p class="mb-0">1<sup>st</sup> October 2025</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="conference-date-highlight mt-5">
                                    <div class="bg-warning text-dark rounded-4 p-4 d-inline-block">
                                        <h4 class="fw-bold mb-2">
                                            <i class="bi bi-star-fill me-2"></i>Conference Date
                                        </h4>
                                        <h3 class="display-6 fw-bold mb-0">30<sup>th</sup> - 31<sup>st</sup> October
                                            2025
                                        </h3>
                                    </div>
                                </div>

                                <div class="note mt-4">
                                    <p class="small text-warning-50">
                                        <i class="bi bi-info-circle me-1"></i>
                                        <strong>Note:</strong> Papers accepted in Round 1, 2 and 3 of Rolling Acceptance
                                        will be asked to pay registration fee early
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>

    <!-- Footer -->
    <footer class="footer position-relative overflow-hidden">
        <div class="position-absolute w-100 h-80" style="opacity: 0.1;">
            <div class="position-absolute rounded-circle"
                style="width: 300px; height: 300px; background: radial-gradient(circle, rgba(59, 130, 246, 0.3) 0%, transparent 70%); top: -150px; right: -150px; animation: float 6s ease-in-out infinite;">
            </div>
            <div class="position-absolute rounded-circle"
                style="width: 200px; height: 200px; background: radial-gradient(circle, rgba(147, 51, 234, 0.3) 0%, transparent 70%); bottom: -100px; left: -100px; animation: float 8s ease-in-out infinite reverse;">
            </div>
        </div>

        <div class="container position-relative py-3">
            <div class="row g-2">
                <!-- Navigation Menu Section -->
                <div class="col-lg-6">
                    <div class="h-100 p-3 rounded-4 position-relative"
                        style="background: rgba(255, 255, 255, 0.05); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.1);">
                        <div class="d-flex align-items-center mb-3">
                            <div class="p-3 rounded-3 me-3"
                                style="background: linear-gradient(45deg, #3b82f6, #8b5cf6);">
                                <i class="bi bi-grid-3x3-gap text-white fs-5"></i>
                            </div>
                            <h4 class="mb-0 text-white fw-bold">Quick Navigation</h4>
                        </div>

                        <div class="row g-2">
                            <div class="col-6">
                                <a href="https://nielit.ac.in/upwiecon2025/"
                                    class="nav-link-modern d-flex align-items-center p-2 rounded-3 text-decoration-none transition-all"
                                    style="background: rgba(59, 130, 246, 0.1); border: 1px solid rgba(59, 130, 246, 0.2); color: #e2e8f0;"
                                    onmouseover="this.style.background='rgba(59, 130, 246, 0.2)'; this.style.transform='translateY(-2px)'; this.style.boxShadow='0 8px 25px rgba(59, 130, 246, 0.3)';"
                                    onmouseout="this.style.background='rgba(59, 130, 246, 0.1)'; this.style.transform='translateY(0)'; this.style.boxShadow='none';">
                                    <i class="bi bi-house-door me-2 fs-5" style="color: #3b82f6;"></i>
                                    <span class="fw-medium">Home</span>
                                </a>
                            </div>
                            <div class="col-6">
                                <a href="callforpaper.php"
                                    class="nav-link-modern d-flex align-items-center p-2 rounded-3 text-decoration-none"
                                    style="background: rgba(147, 51, 234, 0.1); border: 1px solid rgba(147, 51, 234, 0.2); color: #e2e8f0;"
                                    onmouseover="this.style.background='rgba(147, 51, 234, 0.2)'; this.style.transform='translateY(-2px)'; this.style.boxShadow='0 8px 25px rgba(147, 51, 234, 0.3)';"
                                    onmouseout="this.style.background='rgba(147, 51, 234, 0.1)'; this.style.transform='translateY(0)'; this.style.boxShadow='none';">
                                    <i class="bi bi-file-earmark-text me-2 fs-5" style="color: #9333ea;"></i>
                                    <span class="fw-medium">Call for Paper</span>
                                </a>
                            </div>
                            <div class="col-6">
                                <a href="registration.php"
                                    class="nav-link-modern d-flex align-items-center p-2 rounded-3 text-decoration-none"
                                    style="background: rgba(16, 185, 129, 0.1); border: 1px solid rgba(16, 185, 129, 0.2); color: #e2e8f0;"
                                    onmouseover="this.style.background='rgba(16, 185, 129, 0.2)'; this.style.transform='translateY(-2px)'; this.style.boxShadow='0 8px 25px rgba(16, 185, 129, 0.3)';"
                                    onmouseout="this.style.background='rgba(16, 185, 129, 0.1)'; this.style.transform='translateY(0)'; this.style.boxShadow='none';">
                                    <i class="bi bi-person-plus me-2 fs-5" style="color: #10b981;"></i>
                                    <span class="fw-medium">Registration</span>
                                </a>
                            </div>
                            <div class="col-6">
                                <a href="contact.php"
                                    class="nav-link-modern d-flex align-items-center p-2 rounded-3 text-decoration-none"
                                    style="background: rgba(245, 101, 101, 0.1); border: 1px solid rgba(245, 101, 101, 0.2); color: #e2e8f0;"
                                    onmouseover="this.style.background='rgba(245, 101, 101, 0.2)'; this.style.transform='translateY(-2px)'; this.style.boxShadow='0 8px 25px rgba(245, 101, 101, 0.3)';"
                                    onmouseout="this.style.background='rgba(245, 101, 101, 0.1)'; this.style.transform='translateY(0)'; this.style.boxShadow='none';">
                                    <i class="bi bi-envelope me-2 fs-5" style="color: #f56565;"></i>
                                    <span class="fw-medium">Contact</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Map Section -->
                <div class="col-lg-6">
                    <div class="h-100 p-3 rounded-4 position-relative"
                        style="background: rgba(255, 255, 255, 0.05); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.1);">
                        <div class="d-flex align-items-center mb-3">
                            <div class="p-3 rounded-3 me-3"
                                style="background: linear-gradient(45deg, #f56565, #ff8a65);">
                                <i class="bi bi-geo-alt text-white fs-5"></i>
                            </div>
                            <h4 class="mb-0 text-white fw-bold">Find Us Here</h4>
                        </div>

                        <div class="map-container position-relative rounded-4 overflow-hidden mb-2"
                            style="box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);">
                            <!-- <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3443.997890382516!2d78.03416731512442!3d30.316495481798926!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39092919f2b00001%3A0x1234567890abcdef!2sNIELIT%20Dehradun!5e0!3m2!1sen!2sin!4v1234567890123!5m2!1sen!2sin"
                                width="100%" height="200" style="border:0; filter: grayscale(0.2) contrast(1.1);"
                                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                            </iframe> -->
                            <iframe width="100%" height="300" frameborder="0"
                                style="border:0; filter: grayscale(0.2) contrast(1.1);"
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6879.814712315349!2d78.08024279927668!3d30.43872809885764!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3908d0c4b72e7cb7%3A0xa5142eb25ce3c0f4!2sJaypee%20Residency%20Manor!5e0!3m2!1sen!2sin!4v1748511027150!5m2!1sen!2sin"
                                allowfullscreen>

                            </iframe>
                            <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3445.2482095580162!2d77.99284937556311!3d30.286994774802288!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39092b87b417273f%3A0xfb79cf6738499266!2sNIELIT%20Dehradun!5e0!3m2!1sen!2sin!4v1748493195158!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->

                            <div class="position-absolute top-0 start-0 w-100 h-100 pointer-events-none"
                                style="background: linear-gradient(45deg, rgba(59, 130, 246, 0.1), rgba(147, 51, 234, 0.1));">
                            </div>
                        </div>

                        <div class="location-info p-2 rounded-3" style="background: rgba(255, 255, 255, 0.08);">
                            <div class="d-flex align-items-start mb-1">
                                <i class="bi bi-building me-2 mt-1" style="color: #3b82f6;"></i>
                                <div>
                                    <p class="mb-1 text-white fw-medium">Jaypee Residency Manor</p>
                                    <p class="mb-0 small" style="color: #cbd5e1;">
                                        <i class="bi bi-pin-map me-1" style="color: #f56565;"></i>
                                        Road, Barlow Ganj, Mussoorie, Uttarakhand 248122
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Copyright -->
            <div class="row mt-3">
                <div class="col-12">
                    <div class="text-center pt-3" style="border-top: 1px solid rgba(255, 255, 255, 0.1);">
                        <div class="d-inline-flex align-items-center px-4 py-2 rounded-pill"
                            style="background: rgba(255, 255, 255, 0.05); backdrop-filter: blur(10px);">
                            <i class="bi bi-c-circle me-2" style="color: #3b82f6;"></i>
                            <span style="color: #cbd5e1;">Copyright 2025 NIELIT. All Rights Reserved</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <style>
            @keyframes float {

                0%,
                100% {
                    transform: translateY(0px);
                }

                50% {
                    transform: translateY(-20px);
                }
            }

            .nav-link-modern:hover {
                transform: translateY(-2px);
            }

            .transition-all {
                transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            }
        </style>
    </footer>

    <!-- Back to Top Button -->
    <button class="btn btn-warning position-fixed bottom-0 end-0 m-4 rounded-circle p-3 shadow-lg" id="backToTop"
        style="z-index: 999; display: none; width: 60px; height: 60px;">
        <i class="bi bi-arrow-up newText"></i>
    </button>

    <!-- Bootstrap 5 JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

    <script>
        // Add scroll effect to header (e.g. background color)
        window.addEventListener('scroll', function () {
            const header = document.getElementById('header');
            if (window.scrollY > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }

            // Header hide/show based on scroll direction
            let lastScrollTop = 0;
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            if (scrollTop > lastScrollTop && scrollTop > 100) {
                header.style.transform = 'translateY(-100%)'; // scroll down
            } else {
                header.style.transform = 'translateY(0)'; // scroll up
            }
            lastScrollTop = scrollTop;

            // Back to top button visibility
            const backToTopButton = document.getElementById('backToTop');
            if (window.scrollY > 300) {
                backToTopButton.style.display = 'block';
            } else {
                backToTopButton.style.display = 'none';
            }
        });

        // Back to top button functionality
        document.getElementById('backToTop').addEventListener('click', function () {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        // Smooth scrolling for internal anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Close mobile menu on link click
        document.querySelectorAll('.navbar-nav .nav-link').forEach(link => {
            link.addEventListener('click', function () {
                const navbar = document.querySelector('.navbar-collapse');
                if (navbar.classList.contains('show')) {
                    bootstrap.Collapse.getInstance(navbar).hide();
                }
            });
        });

        // Animate cards on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function (entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        document.querySelectorAll('.about-card, .objective-card, .date-card').forEach(card => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(30px)';
            card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            observer.observe(card);
        });
    </script>

</body>

</html>

HTML

?>