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

        /* Add some body padding to account for fixed header */
        body {
            /* padding-top: 50px; */
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

        /* section styles are here  */


        :root {
            --primary-blue: rgba(70, 12, 82, 0.99);
            --accent-blue: rgba(91, 2, 109, 0.99);
            --light-blue: rgba(225, 181, 234, 0.99);
            --gold: #f39c12;
            --text-dark: #2c3e50;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: var(--text-dark);
            background: linear-gradient(135deg, rgba(232, 217, 235, 0.99) 0%, #ffffff 50%, #f8f9fa 100%);

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

        .section-title {
            color: var(--primary-blue);
            border-bottom: 3px solid var(--gold);
            padding-bottom: 0.5rem;
            margin-bottom: 2rem;
            display: inline-block;
        }

        .committee-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            margin-bottom: 2rem;
            overflow: hidden;
            transition: all 0.3s ease;
            border-left: 5px solid var(--accent-blue);
        }

        .committee-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }

        .committee-header {
            background: linear-gradient(135deg, var(--light-blue) 0%, #f8f9fa 100%);
            padding: 1.5rem;
            border-bottom: 2px solid var(--accent-blue);
            position: relative;
        }

        .committee-header h3 {
            color: var(--primary-blue);
            margin: 0;
            font-weight: 700;
            font-size: 1.4rem;
        }

        .committee-header .icon {
            position: absolute;
            right: 1.5rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--accent-blue);
            font-size: 1.5rem;
        }

        .committee-body {
            padding: 1.5rem;
        }

        .member-item {
            padding: 0.75rem 0;
            border-bottom: 1px solid #e9ecef;
            display: flex;
            align-items: center;
        }

        .member-item:last-child {
            border-bottom: none;
        }

        .member-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, var(--accent-blue), var(--primary-blue));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            margin-right: 1rem;
            flex-shrink: 0;
        }

        .member-info {
            flex: 1;
        }

        .member-name {
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 0.25rem;
        }

        .member-affiliation {
            color: #6c757d;
            font-size: 0.9rem;
        }

        .stats-section {
            background: var(--light-blue);
            padding: 3rem 0;
            margin: 3rem 0;
        }

        .stat-card {
            text-align: center;
            padding: 2rem;
        }

        .stat-number {
            font-size: 3rem;
            font-weight: 700;
            color: var(--primary-blue);
            display: block;
        }

        .stat-label {
            color: #6c757d;
            text-transform: uppercase;
            font-size: 0.9rem;
            font-weight: 600;
            letter-spacing: 1px;
        }

        .patron-badge {
            background: linear-gradient(135deg, var(--gold), #e67e22);
            color: white;
            padding: 0.25rem 0.5rem;
            border-radius: 15px;
            font-size: 0.8rem;
            font-weight: 600;
            margin-left: 0.5rem;
        }

        .international-flag {
            width: 20px;
            height: 15px;
            border-radius: 2px;
            margin-right: 0.5rem;
            background: linear-gradient(45deg, #3498db, #2ecc71);
        }

        @media (max-width: 768px) {
            .committee-hero {
                padding: 2rem 0;
            }

            .member-item {
                flex-direction: column;
                align-items: flex-start;
                text-align: left;
            }

            .member-icon {
                margin-bottom: 0.5rem;
                margin-right: 0;
            }
        }

        /* section syle ends  */
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

    <!-- content start -->
    <section class="committee-hero">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="display-4 fw-bold mb-3">
                        <i class="fas fa-users me-3"></i>
                        IEEE UP-WIECON Committee
                    </h1>
                    <p class="lead mb-4">1st IEEE Uttar Pradesh Section Women in Engineering Conference</p>
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

    <!-- Statistics Section -->
    <section class="stats-section">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-6">
                    <div class="stat-card">
                        <span class="stat-number">150+</span>
                        <div class="stat-label">Committee Members</div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-card">
                        <span class="stat-number">15</span>
                        <div class="stat-label">Committees</div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-card">
                        <span class="stat-number">25+</span>
                        <div class="stat-label">International Advisors</div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-card">
                        <span class="stat-number">50+</span>
                        <div class="stat-label">Institutions</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Committee Sections -->
    <div class="container my-5">

        <!-- Chief Patrons -->
        <div class="committee-card">
            <div class="committee-header">
                <h3>Chief Patrons</h3>
                <i class="fas fa-crown icon"></i>
            </div>
            <div class="committee-body">
                <div class="member-item">
                    <div class="member-icon">SK</div>
                    <div class="member-info">
                        <div class="member-name">
                            Shri. S. Krishnan
                            <!-- <span class="patron-badge">Secretary</span> -->
                        </div>
                        <div class="member-affiliation">Ministry of Electronics & Information Technology (MeitY)</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">SN</div>
                    <div class="member-info">
                        <div class="member-name">Prof. (Dr.) Sri Niwas Singh</div>
                        <div class="member-affiliation">Director ABV-IIITM, Gwalior, India</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">MT</div>
                    <div class="member-info">
                        <div class="member-name">Prof. (Dr.) M M Tripathi</div>
                        <div class="member-affiliation">Director General, NIELIT, India</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Patrons -->
        <div class="committee-card">
            <div class="committee-header">
                <h3>Patrons</h3>
                <i class="fas fa-award icon"></i>
            </div>
            <div class="committee-body">
                <div class="member-item">
                    <div class="member-icon">YC</div>
                    <div class="member-info">
                        <div class="member-name">Prof. (Dr.) Yogesh Singh Chauhan</div>
                        <div class="member-affiliation">IIT Kanpur, Chair IEEE UP Section, India</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">NP</div>
                    <div class="member-info">
                        <div class="member-name">Dr. Neena Pahuja</div>
                        <div class="member-affiliation">Executive Member, National Council for Vocational Education and
                            Training</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">AS</div>
                    <div class="member-info">
                        <div class="member-name">Shri. Abhishek Singh</div>
                        <div class="member-affiliation">Additional Secretary, MeitY</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">PB</div>
                    <div class="member-info">
                        <div class="member-name">Dr. Preeti Banzal</div>
                        <div class="member-affiliation">Adviser, Principal Scientific Adviser</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Steering Committee -->
        <div class="committee-card">
            <div class="committee-header">
                <h3>Steering Committee</h3>
                <i class="fas fa-compass icon"></i>
            </div>
            <div class="committee-body">
                <div class="member-item">
                    <div class="member-icon">AS</div>
                    <div class="member-info">
                        <div class="member-name">Prof. (Dr.) Asheesh Kumar Singh</div>
                        <div class="member-affiliation">MNNIT Allahabad, India</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">JR</div>
                    <div class="member-info">
                        <div class="member-name">Prof. (Dr.) J. Ramkumar</div>
                        <div class="member-affiliation">IIT Kanpur, India</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">KV</div>
                    <div class="member-info">
                        <div class="member-name">Prof. (Dr.) Kumar Vaibhav Srivastava</div>
                        <div class="member-affiliation">IIT Kanpur</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">SK</div>
                    <div class="member-info">
                        <div class="member-name">Prof. (Dr.) Satish Kumar Singh</div>
                        <div class="member-affiliation">IIIT Allahabad, India</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">RK</div>
                    <div class="member-info">
                        <div class="member-name">Prof. (Dr.) Rajeev Kumar Singh</div>
                        <div class="member-affiliation">IIT BHU</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">AK</div>
                    <div class="member-info">
                        <div class="member-name">Prof. (Dr.) Avadesh Kumar</div>
                        <div class="member-affiliation">Galgotias University, Gr Noida</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- General Chairs -->
        <div class="committee-card">
            <div class="committee-header">
                <h3>General Chairs</h3>
                <i class="fas fa-chair icon"></i>
            </div>
            <div class="committee-body">
                <div class="member-item">
                    <div class="member-icon">MR</div>
                    <div class="member-info">
                        <div class="member-name">Prof. (Dr.) Mohammad Rihan</div>
                        <div class="member-affiliation">Director General, NISE, India, Chair Elect IEEE UP Section</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">TP</div>
                    <div class="member-info">
                        <div class="member-name">Ms. Tulika Pandey</div>
                        <div class="member-affiliation">Scientist G, MeitY</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">SV</div>
                    <div class="member-info">
                        <div class="member-name">Ms. Sunita Verma</div>
                        <div class="member-affiliation">Scientist G, MeitY</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">AN</div>
                    <div class="member-info">
                        <div class="member-name">Ms. Asha Nangia</div>
                        <div class="member-affiliation">Scientist G, MeitY, India</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">KS</div>
                    <div class="member-info">
                        <div class="member-name">Ms. Kirti Seth</div>
                        <div class="member-affiliation">Former CEO, SSC NASSCOM</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- General Co-Chairs -->
        <div class="committee-card">
            <div class="committee-header">
                <h3>General Co-Chairs</h3>
                <i class="fas fa-user-friends icon"></i>
            </div>
            <div class="committee-body">
                <div class="member-item">
                    <div class="member-icon">NT</div>
                    <div class="member-info">
                        <div class="member-name">Shri. Nishant Tripathi</div>
                        <div class="member-affiliation">Joint Registrar, NIELIT</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">HM</div>
                    <div class="member-info">
                        <div class="member-name">Shri. Himanshu Mohan</div>
                        <div class="member-affiliation">Scientist D, NIELIT</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Conference Organizing Chairs -->
        <div class="committee-card">
            <div class="committee-header">
                <h3>Conference Organizing Chairs</h3>
                <i class="fas fa-tasks icon"></i>
            </div>
            <div class="committee-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="member-item">
                            <div class="member-icon">SS</div>
                            <div class="member-info">
                                <div class="member-name">Dr. Smita Sharma</div>
                                <div class="member-affiliation">NIELIT Noida</div>
                            </div>
                        </div>
                        <div class="member-item">
                            <div class="member-icon">AP</div>
                            <div class="member-info">
                                <div class="member-name">Dr. Ayushi Prakash</div>
                                <div class="member-affiliation">AKGEC, Ghaziabad</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="member-item">
                            <div class="member-icon">TT</div>
                            <div class="member-info">
                                <div class="member-name">Dr. Twinkle Tripathi</div>
                                <div class="member-affiliation">IIT Kanpur</div>
                            </div>
                        </div>
                        <div class="member-item">
                            <div class="member-icon">SY</div>
                            <div class="member-info">
                                <div class="member-name">Dr. Suman Avdhesh Yadav</div>
                                <div class="member-affiliation">IILM University, India</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Conference Organizing Co-Chairs -->
        <div class="committee-card">
            <div class="committee-header">
                <h3>Conference Organizing Co-Chairs</h3>
                <i class="fas fa-users-cog icon"></i>
            </div>
            <div class="committee-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="member-item">
                            <div class="member-icon">SS</div>
                            <div class="member-info">
                                <div class="member-name">Dr. Shraddha Sagar</div>
                                <div class="member-affiliation">Galgotias University, Greater Noida</div>
                            </div>
                        </div>
                        <div class="member-item">
                            <div class="member-icon">AB</div>
                            <div class="member-info">
                                <div class="member-name">Ms. Anita Budhiraja</div>
                                <div class="member-affiliation">Scientist E, NIELIT</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="member-item">
                            <div class="member-icon">SV</div>
                            <div class="member-info">
                                <div class="member-name">Dr. Swati Vashisht</div>
                                <div class="member-affiliation">GL Bajaj ITM, Greater Noida, India</div>
                            </div>
                        </div>
                        <div class="member-item">
                            <div class="member-icon">VA</div>
                            <div class="member-info">
                                <div class="member-name">Dr. Veena Anand</div>
                                <div class="member-affiliation">ABV-IIITM Gwalior</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Ph.D. Colloquium Chairs -->
        <div class="committee-card">
            <div class="committee-header">
                <h3>Ph.D. Colloquium Chairs</h3>
                <i class="fas fa-graduation-cap icon"></i>
            </div>
            <div class="committee-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="member-item">
                            <div class="member-icon">PJ</div>
                            <div class="member-info">
                                <div class="member-name">Dr. Premlata Jena</div>
                                <div class="member-affiliation">IIT Roorkee</div>
                            </div>
                        </div>
                        <div class="member-item">
                            <div class="member-icon">NS</div>
                            <div class="member-info">
                                <div class="member-name">Dr. Neelam Srivastava</div>
                                <div class="member-affiliation">IET Lucknow</div>
                            </div>
                        </div>
                        <div class="member-item">
                            <div class="member-icon">VM</div>
                            <div class="member-info">
                                <div class="member-name">Dr. Vimala Mathew</div>
                                <div class="member-affiliation">Scientist E, NIELIT</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="member-item">
                            <div class="member-icon">PT</div>
                            <div class="member-info">
                                <div class="member-name">Dr. Prabhakar Tiwari</div>
                                <div class="member-affiliation">MMMUT, Gorakhpur</div>
                            </div>
                        </div>
                        <div class="member-item">
                            <div class="member-icon">GB</div>
                            <div class="member-info">
                                <div class="member-name">Dr. Garima Bhardwaj</div>
                                <div class="member-affiliation">Amity University, Greater Noida Campus (Allied)</div>
                            </div>
                        </div>
                        <div class="member-item">
                            <div class="member-icon">VV</div>
                            <div class="member-info">
                                <div class="member-name">Dr. Vandana Rani Verma</div>
                                <div class="member-affiliation">GCET Gr Noida</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Technical Program Committee -->
        <!-- <div class="committee-card">
    <div class="committee-header">
       <h3>Technical Program Committee</h3>
       <i class="fas fa-code icon"></i>
    </div>
    <div class="committee-body">
       <div class="row">
          <div class="col-md-6">
             <div class="member-item">
                <div class="member-icon">AP</div>
                <div class="member-info">
                   <div class="member-name">Shri. Anil Kumar Pandey</div>
                   <div class="member-affiliation">Advisor, NIELIT</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">SS</div>
                <div class="member-info">
                   <div class="member-name">Ms. Saritha S</div>
                   <div class="member-affiliation">Scientist F, NIELIT</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">SC</div>
                <div class="member-info">
                   <div class="member-name">Ms. Sheetal Chopra</div>
                   <div class="member-affiliation">Scientist E, NIELIT</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">CR</div>
                <div class="member-info">
                   <div class="member-name">Ms. Chetna Singh Rathor</div>
                   <div class="member-affiliation">Scientist-E, NIELIT</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">MG</div>
                <div class="member-info">
                   <div class="member-name">Ms. Minali Gupta</div>
                   <div class="member-affiliation">Scientist-C, NIELIT</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">MT</div>
                <div class="member-info">
                   <div class="member-name">Ms. Madhvi Tyagi</div>
                   <div class="member-affiliation">Deputy Director, NIELIT</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">RK</div>
                <div class="member-info">
                   <div class="member-name">Dr. Reena K K</div>
                   <div class="member-affiliation">Scientist D, NIELIT Calicut</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">SC</div>
                <div class="member-info">
                   <div class="member-name">Prof. Sudeshna Chakraborty</div>
                   <div class="member-affiliation">Galgotias University</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">MS</div>
                <div class="member-info">
                   <div class="member-name">Dr. Mridula Singh</div>
                   <div class="member-affiliation">Quantum University, Roorkee</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">PW</div>
                <div class="member-info">
                   <div class="member-name">Dr. Pratima Walde</div>
                   <div class="member-affiliation">Sharda University</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">SS</div>
                <div class="member-info">
                   <div class="member-name">Dr. Swapnil Srivastava</div>
                   <div class="member-affiliation">United College Engineering and Research, Allahabad</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">SN</div>
                <div class="member-info">
                   <div class="member-name">Smt. Sini S Nair</div>
                   <div class="member-affiliation">Scientist D, NIELIT Calicut</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">Q</div>
                <div class="member-info">
                   <div class="member-name">Dr. Qurratulain</div>
                   <div class="member-affiliation">Aligarh Muslim University</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">VG</div>
                <div class="member-info">
                   <div class="member-name">Dr. Vaishali Gupta</div>
                   <div class="member-affiliation">Bennett University, Greater Noida</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">PG</div>
                <div class="member-info">
                   <div class="member-name">Dr. Pallavi Goel</div>
                   <div class="member-affiliation">Galgotia College of Engineering & Technology</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">AK</div>
                <div class="member-info">
                   <div class="member-name">Dr. Ajay Kumar</div>
                   <div class="member-affiliation">JIIT University Noida</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">GJ</div>
                <div class="member-info">
                   <div class="member-name">Dr. Garima Jain</div>
                   <div class="member-affiliation">NIET Greater Noida</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">MD</div>
                <div class="member-info">
                   <div class="member-name">Dr. Mayank Dave</div>
                   <div class="member-affiliation">NIT Kurukshetra, India</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">DB</div>
                <div class="member-info">
                   <div class="member-name">Dr. Divya Bansal</div>
                   <div class="member-affiliation">Punjab Engineering College, Chandigarh</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">NS</div>
                <div class="member-info">
                   <div class="member-name">Dr. Neelam Singh</div>
                   <div class="member-affiliation">Graphic Era Hill University, India</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">AT</div>
                <div class="member-info">
                   <div class="member-name">Dr. Anuradha Taluja</div>
                   <div class="member-affiliation">AKGEC, Ghaziabad</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">R</div>
                <div class="member-info">
                   <div class="member-name">Dr. Rohaila</div>
                   <div class="member-affiliation">Teerthanker Mahaveer University, Moradabad</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">MC</div>
                <div class="member-info">
                   <div class="member-name">Dr. Meenakshi Chaudhary</div>
                   <div class="member-affiliation">MMMUT, Gorakhpur</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">KV</div>
                <div class="member-info">
                   <div class="member-name">Dr. Kimmi Verma</div>
                   <div class="member-affiliation">ABES Engineering College Ghaziabad</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">P</div>
                <div class="member-info">
                   <div class="member-name">Ms. Pallavi</div>
                   <div class="member-affiliation">Buddha Engineering College, Gorakhpur</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">RR</div>
                <div class="member-info">
                   <div class="member-name">Ms. Rupa Rani</div>
                   <div class="member-affiliation">AKGEC, Ghaziabad</div>
                </div>
             </div>
          </div>
          <div class="col-md-6">
             <div class="member-item">
                <div class="member-icon">YD</div>
                <div class="member-info">
                   <div class="member-name">Dr. Yajnaseni Dash</div>
                   <div class="member-affiliation">Bennett University</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">DS</div>
                <div class="member-info">
                   <div class="member-name">Dr. Damyanti Singh</div>
                   <div class="member-affiliation">IILM UNIVERSITY</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">VS</div>
                <div class="member-info">
                   <div class="member-name">Dr. Vandana Sharma</div>
                   <div class="member-affiliation">Christ University</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">AS</div>
                <div class="member-info">
                   <div class="member-name">Dr. Anupama Sharma</div>
                   <div class="member-affiliation">AKGEC, Ghaziabad</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">J</div>
                <div class="member-info">
                   <div class="member-name">Dr. Jyoti Sharma</div>
                   <div class="member-affiliation">UPES, Dehradun</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">SP</div>
                <div class="member-info">
                   <div class="member-name">Dr. Subhash Patil</div>
                   <div class="member-affiliation">NIT Kurukshetra</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">SK</div>
                <div class="member-info">
                   <div class="member-name">Dr. Sanjay Kumar</div>
                   <div class="member-affiliation">BHU</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">AK</div>
                <div class="member-info">
                   <div class="member-name">Dr. Archana Kaur</div>
                   <div class="member-affiliation">Amity University</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">NS</div>
                <div class="member-info">
                   <div class="member-name">Dr. Neha Singh</div>
                   <div class="member-affiliation">NIELIT Calicut</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">JS</div>
                <div class="member-info">
                   <div class="member-name">Dr. Jyoti Singh</div>
                   <div class="member-affiliation">NIELIT Calicut</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">SC</div>
                <div class="member-info">
                   <div class="member-name">Dr. Suman Chaudhary</div>
                   <div class="member-affiliation">NIELIT Calicut</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">AB</div>
                <div class="member-info">
                   <div class="member-name">Dr. Amit Bansal</div>
                   <div class="member-affiliation">NIELIT Calicut</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">KP</div>
                <div class="member-info">
                   <div class="member-name">Dr. Kiran Patil</div>
                   <div class="member-affiliation">NIELIT Calicut</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">AS</div>
                <div class="member-info">
                   <div class="member-name">Dr. Anil Sharma</div>
                   <div class="member-affiliation">NIELIT Calicut</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">VS</div>
                <div class="member-info">
                   <div class="member-name">Dr. Vaibhav Singh</div>
                   <div class="member-affiliation">NIELIT Calicut</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">DK</div>
                <div class="member-info">
                   <div class="member-name">Dr. Deepak Kumar</div>
                   <div class="member-affiliation">NIELIT Calicut</div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div> -->
        <div class="committee-card">
            <div class="committee-header">
                <h3>Technical Program Committee</h3>
                <i class="fas fa-code icon"></i>
            </div>
            <div class="committee-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="member-item">
                            <div class="member-icon">AP</div>
                            <div class="member-info">
                                <div class="member-name">Shri. Anil Kumar Pandey</div>
                                <div class="member-affiliation">Advisor, NIELIT</div>
                            </div>
                        </div>
                        <div class="member-item">
                            <div class="member-icon">SS</div>
                            <div class="member-info">
                                <div class="member-name">Ms. Saritha S</div>
                                <div class="member-affiliation">Scientist F, NIELIT</div>
                            </div>
                        </div>
                        <div class="member-item">
                            <div class="member-icon">SC</div>
                            <div class="member-info">
                                <div class="member-name">Ms. Sheetal Chopra</div>
                                <div class="member-affiliation">Scientist E, NIELIT</div>
                            </div>
                        </div>
                        <div class="member-item">
                            <div class="member-icon">CR</div>
                            <div class="member-info">
                                <div class="member-name">Ms. Chetna Singh Rathor</div>
                                <div class="member-affiliation">Scientist-E, NIELIT</div>
                            </div>
                        </div>
                        <div class="member-item">
                            <div class="member-icon">MG</div>
                            <div class="member-info">
                                <div class="member-name">Ms. Minali Gupta</div>
                                <div class="member-affiliation">Scientist-C, NIELIT</div>
                            </div>
                        </div>
                        <div class="member-item">
                            <div class="member-icon">MT</div>
                            <div class="member-info">
                                <div class="member-name">Ms. Madhvi Tyagi</div>
                                <div class="member-affiliation">Deputy Director, NIELIT</div>
                            </div>
                        </div>
                        <div class="member-item">
                            <div class="member-icon">RK</div>
                            <div class="member-info">
                                <div class="member-name">Dr. Reena K K</div>
                                <div class="member-affiliation">Scientist D, NIELIT Calicut</div>
                            </div>
                        </div>
                        <div class="member-item">
                            <div class="member-icon">SC</div>
                            <div class="member-info">
                                <div class="member-name">Prof. Sudeshna Chakraborty</div>
                                <div class="member-affiliation">Galgotias University</div>
                            </div>
                        </div>
                        <div class="member-item">
                            <div class="member-icon">MS</div>
                            <div class="member-info">
                                <div class="member-name">Dr. Mridula Singh</div>
                                <div class="member-affiliation">Quantum University, Roorkee</div>
                            </div>
                        </div>
                        <div class="member-item">
                            <div class="member-icon">PW</div>
                            <div class="member-info">
                                <div class="member-name">Dr. Pratima Walde</div>
                                <div class="member-affiliation">Sharda University</div>
                            </div>
                        </div>
                        <div class="member-item">
                            <div class="member-icon">RS</div>
                            <div class="member-info">
                                <div class="member-name">Prof. Ravi Shankar Singh</div>
                                <div class="member-affiliation">Department of Computer Science and Engineering, IIT BHU, Varanasi</div>
                            </div>
                        </div>
                    
                        <!-- <div class="member-item">
                            <div class="member-icon">DY</div>
                            <div class="member-info">
                                <div class="member-name">Prof. Divakar Yadav</div>
                                <div class="member-affiliation">IGNOU, Delhi</div>
                            </div>
                        </div> -->
                    
                        <!-- <div class="member-item">
                            <div class="member-icon">DV</div>
                            <div class="member-info">
                                <div class="member-name">Prof. Deo Prakash Vidyarthi</div>
                                <div class="member-affiliation">JNU, Delhi</div>
                            </div>
                        </div> -->
                        <div class="member-item">
                            <div class="member-icon">NG</div>
                            <div class="member-info">
                                <div class="member-name">Dr. Neha Gupta</div>
                                <div class="member-affiliation">GNIOT Group of Institutions</div>
                            </div>
    </div>
                    </div>
                    <div class="col-md-4">
                        <div class="member-item">
                            <div class="member-icon">SS</div>
                            <div class="member-info">
                                <div class="member-name">Dr. Swapnil Srivastava</div>
                                <div class="member-affiliation">United College Engineering and Research, Allahabad</div>
                            </div>
                        </div>
                        <div class="member-item">
                            <div class="member-icon">SN</div>
                            <div class="member-info">
                                <div class="member-name">Smt. Sini S Nair</div>
                                <div class="member-affiliation">Scientist D, NIELIT Calicut</div>
                            </div>
                        </div>
                        <div class="member-item">
                            <div class="member-icon">Q</div>
                            <div class="member-info">
                                <div class="member-name">Dr. Qurratulain</div>
                                <div class="member-affiliation">Aligarh Muslim University</div>
                            </div>
                        </div>
                        <div class="member-item">
                            <div class="member-icon">VG</div>
                            <div class="member-info">
                                <div class="member-name">Dr. Vaishali Gupta</div>
                                <div class="member-affiliation">Bennett University, Greater Noida</div>
                            </div>
                        </div>
                        <div class="member-item">
                            <div class="member-icon">PG</div>
                            <div class="member-info">
                                <div class="member-name">Dr. Pallavi Goel</div>
                                <div class="member-affiliation">Galgotia College of Engineering & Technology</div>
                            </div>
                        </div>
                        <div class="member-item">
                            <div class="member-icon">AK</div>
                            <div class="member-info">
                                <div class="member-name">Dr. Ajay Kumar</div>
                                <div class="member-affiliation">JIIT University Noida</div>
                            </div>
                        </div>
                        <div class="member-item">
                            <div class="member-icon">GJ</div>
                            <div class="member-info">
                                <div class="member-name">Dr. Garima Jain</div>
                                <div class="member-affiliation">NIET Greater Noida</div>
                            </div>
                        </div>
                        <div class="member-item">
                            <div class="member-icon">MD</div>
                            <div class="member-info">
                                <div class="member-name">Dr. Mayank Dave</div>
                                <div class="member-affiliation">NIT Kurukshetra, India</div>
                            </div>
                        </div>
                        <div class="member-item">
                            <div class="member-icon">DB</div>
                            <div class="member-info">
                                <div class="member-name">Dr. Divya Bansal</div>
                                <div class="member-affiliation">Punjab Engineering College, Chandigarh</div>
                            </div>
                        </div>
                        <div class="member-item">
                            <div class="member-icon">NS</div>
                            <div class="member-info">
                                <div class="member-name">Dr. Neelam Singh</div>
                                <div class="member-affiliation">Graphic Era Hill University, India</div>
                            </div>
                        </div>
                        <div class="member-item">
                            <div class="member-icon">AS</div>
                            <div class="member-info">
                                <div class="member-name">Dr. Anand Sharma</div>
                                <div class="member-affiliation">MNNIT, Allahabad</div>
                            </div>
                        </div>
                    
                        <div class="member-item">
                            <div class="member-icon">RK</div>
                            <div class="member-info">
                                <div class="member-name">Dr Rajiv Kumar Singh</div>
                                <div class="member-affiliation">IET, Lucknow</div>
                            </div>
                        </div>
                        


                    </div>
                    <div class="col-md-4">
                        <div class="member-item">
                            <div class="member-icon">AT</div>
                            <div class="member-info">
                                <div class="member-name">Dr. Anuradha Taluja</div>
                                <div class="member-affiliation">AKGEC, Ghaziabad</div>
                            </div>
                        </div>
                        <div class="member-item">
                            <div class="member-icon">R</div>
                            <div class="member-info">
                                <div class="member-name">Dr. Rohaila</div>
                                <div class="member-affiliation">Teerthanker Mahaveer University, Moradabad</div>
                            </div>
                        </div>
                        <div class="member-item">
                            <div class="member-icon">MC</div>
                            <div class="member-info">
                                <div class="member-name">Dr. Meenakshi Chaudhary</div>
                                <div class="member-affiliation">MMMUT, Gorakhpur</div>
                            </div>
                        </div>
                        <div class="member-item">
                            <div class="member-icon">KV</div>
                            <div class="member-info">
                                <div class="member-name">Dr. Kimmi Verma</div>
                                <div class="member-affiliation">ABES Engineering College Ghaziabad</div>
                            </div>
                        </div>
                        <div class="member-item">
                            <div class="member-icon">P</div>
                            <div class="member-info">
                                <div class="member-name">Ms. Pallavi</div>
                                <div class="member-affiliation">Buddha Engineering College, Gorakhpur</div>
                            </div>
                        </div>
                        <div class="member-item">
                            <div class="member-icon">RR</div>
                            <div class="member-info">
                                <div class="member-name">Ms. Rupa Rani</div>
                                <div class="member-affiliation">AKGEC, Ghaziabad</div>
                            </div>
                        </div>
                        <div class="member-item">
                            <div class="member-icon">YD</div>
                            <div class="member-info">
                                <div class="member-name">Dr. Yajnaseni Dash</div>
                                <div class="member-affiliation">Bennett University</div>
                            </div>
                        </div>
                        <div class="member-item">
                            <div class="member-icon">DS</div>
                            <div class="member-info">
                                <div class="member-name">Dr. Damyanti Singh</div>
                                <div class="member-affiliation">IILM UNIVERSITY</div>
                            </div>
                        </div>
                        <div class="member-item">
                            <div class="member-icon">VS</div>
                            <div class="member-info">
                                <div class="member-name">Dr. Vandana Sharma</div>
                                <div class="member-affiliation">Christ University</div>
                            </div>
                        </div>
                        <div class="member-item">
                            <div class="member-icon">AS</div>
                            <div class="member-info">
                                <div class="member-name">Dr. Anupama Sharma</div>
                                <div class="member-affiliation">AKGEC, Ghaziabad</div>
                            </div>
                        </div>
                        <div class="member-item">
                            <div class="member-icon">AV</div>
                            <div class="member-info">
                                <div class="member-name">Dr. Anshul Verma</div>
                                <div class="member-affiliation">BHU, Varanasi</div>
                            </div>
                        </div>
                    
                        <div class="member-item">
                            <div class="member-icon">AP</div>
                            <div class="member-info">
                                <div class="member-name">Dr. Avinash Kumar Pandey</div>
                                <div class="member-affiliation">IIIT, Lucknow</div>
                            </div>
         
                        </div>


               
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="committee-card">
    <div class="committee-header">
       <h3>Technical Program Committee</h3>
       <i class="fas fa-code icon"></i>
    </div>
    <div class="committee-body">
       <div class="row">
          <div class="col-md-6">
             <div class="member-item">
                <div class="member-icon">AP</div>
                <div class="member-info">
                   <div class="member-name">Shri. Anil Kumar Pandey</div>
                   <div class="member-affiliation">Advisor, NIELIT</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">SS</div>
                <div class="member-info">
                   <div class="member-name">Ms. Saritha S</div>
                   <div class="member-affiliation">Scientist F, NIELIT</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">SC</div>
                <div class="member-info">
                   <div class="member-name">Ms. Sheetal Chopra</div>
                   <div class="member-affiliation">Scientist E, NIELIT</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">CR</div>
                <div class="member-info">
                   <div class="member-name">Ms. Chetna Singh Rathor</div>
                   <div class="member-affiliation">Scientist-E, NIELIT</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">MG</div>
                <div class="member-info">
                   <div class="member-name">Ms. Minali Gupta</div>
                   <div class="member-affiliation">Scientist-C, NIELIT</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">MT</div>
                <div class="member-info">
                   <div class="member-name">Ms. Madhvi Tyagi</div>
                   <div class="member-affiliation">Deputy Director, NIELIT</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">RK</div>
                <div class="member-info">
                   <div class="member-name">Dr. Reena K K</div>
                   <div class="member-affiliation">Scientist D, NIELIT Calicut</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">SC</div>
                <div class="member-info">
                   <div class="member-name">Prof. Sudeshna Chakraborty</div>
                   <div class="member-affiliation">Galgotias University</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">MS</div>
                <div class="member-info">
                   <div class="member-name">Dr. Mridula Singh</div>
                   <div class="member-affiliation">Quantum University, Roorkee</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">PW</div>
                <div class="member-info">
                   <div class="member-name">Dr. Pratima Walde</div>
                   <div class="member-affiliation">Sharda University</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">SS</div>
                <div class="member-info">
                   <div class="member-name">Dr. Swapnil Srivastava</div>
                   <div class="member-affiliation">United College Engineering and Research, Allahabad</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">SN</div>
                <div class="member-info">
                   <div class="member-name">Smt. Sini S Nair</div>
                   <div class="member-affiliation">Scientist D, NIELIT Calicut</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">Q</div>
                <div class="member-info">
                   <div class="member-name">Dr. Qurratulain</div>
                   <div class="member-affiliation">Aligarh Muslim University</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">VG</div>
                <div class="member-info">
                   <div class="member-name">Dr. Vaishali Gupta</div>
                   <div class="member-affiliation">Bennett University, Greater Noida</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">PG</div>
                <div class="member-info">
                   <div class="member-name">Dr. Pallavi Goel</div>
                   <div class="member-affiliation">Galgotia College of Engineering & Technology</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">AK</div>
                <div class="member-info">
                   <div class="member-name">Dr. Ajay Kumar</div>
                   <div class="member-affiliation">JIIT University Noida</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">GJ</div>
                <div class="member-info">
                   <div class="member-name">Dr. Garima Jain</div>
                   <div class="member-affiliation">NIET Greater Noida</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">MD</div>
                <div class="member-info">
                   <div class="member-name">Dr. Mayank Dave</div>
                   <div class="member-affiliation">NIT Kurukshetra, India</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">DB</div>
                <div class="member-info">
                   <div class="member-name">Dr. Divya Bansal</div>
                   <div class="member-affiliation">Punjab Engineering College, Chandigarh</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">NS</div>
                <div class="member-info">
                   <div class="member-name">Dr. Neelam Singh</div>
                   <div class="member-affiliation">Graphic Era Hill University, India</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">AT</div>
                <div class="member-info">
                   <div class="member-name">Dr. Anuradha Taluja</div>
                   <div class="member-affiliation">AKGEC, Ghaziabad</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">R</div>
                <div class="member-info">
                   <div class="member-name">Dr. Rohaila</div>
                   <div class="member-affiliation">Teerthanker Mahaveer University, Moradabad</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">MC</div>
                <div class="member-info">
                   <div class="member-name">Dr. Meenakshi Chaudhary</div>
                   <div class="member-affiliation">MMMUT, Gorakhpur</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">KV</div>
                <div class="member-info">
                   <div class="member-name">Dr. Kimmi Verma</div>
                   <div class="member-affiliation">ABES Engineering College Ghaziabad</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">P</div>
                <div class="member-info">
                   <div class="member-name">Ms. Pallavi</div>
                   <div class="member-affiliation">Buddha Engineering College, Gorakhpur</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">RR</div>
                <div class="member-info">
                   <div class="member-name">Ms. Rupa Rani</div>
                   <div class="member-affiliation">AKGEC, Ghaziabad</div>
                </div>
             </div>
          </div>
          <div class="col-md-6">
             <div class="member-item">
                <div class="member-icon">YD</div>
                <div class="member-info">
                   <div class="member-name">Dr. Yajnaseni Dash</div>
                   <div class="member-affiliation">Bennett University</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">DS</div>
                <div class="member-info">
                   <div class="member-name">Dr. Damyanti Singh</div>
                   <div class="member-affiliation">IILM UNIVERSITY</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">VS</div>
                <div class="member-info">
                   <div class="member-name">Dr. Vandana Sharma</div>
                   <div class="member-affiliation">Christ University</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">AS</div>
                <div class="member-info">
                   <div class="member-name">Dr. Anupama Sharma</div>
                   <div class="member-affiliation">AKGEC, Ghaziabad</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">J</div>
                <div class="member-info">
                   <div class="member-name">Dr. Jyoti Sharma</div>
                   <div class="member-affiliation">UPES, Dehradun</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">SP</div>
                <div class="member-info">
                   <div class="member-name">Dr. Subhash Patil</div>
                   <div class="member-affiliation">NIT Kurukshetra</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">SK</div>
                <div class="member-info">
                   <div class="member-name">Dr. Sanjay Kumar</div>
                   <div class="member-affiliation">BHU</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">AK</div>
                <div class="member-info">
                   <div class="member-name">Dr. Archana Kaur</div>
                   <div class="member-affiliation">Amity University</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">NS</div>
                <div class="member-info">
                   <div class="member-name">Dr. Neha Singh</div>
                   <div class="member-affiliation">NIELIT Calicut</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">JS</div>
                <div class="member-info">
                   <div class="member-name">Dr. Jyoti Singh</div>
                   <div class="member-affiliation">NIELIT Calicut</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">SC</div>
                <div class="member-info">
                   <div class="member-name">Dr. Suman Chaudhary</div>
                   <div class="member-affiliation">NIELIT Calicut</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">AB</div>
                <div class="member-info">
                   <div class="member-name">Dr. Amit Bansal</div>
                   <div class="member-affiliation">NIELIT Calicut</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">KP</div>
                <div class="member-info">
                   <div class="member-name">Dr. Kiran Patil</div>
                   <div class="member-affiliation">NIELIT Calicut</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">AS</div>
                <div class="member-info">
                   <div class="member-name">Dr. Anil Sharma</div>
                   <div class="member-affiliation">NIELIT Calicut</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">VS</div>
                <div class="member-info">
                   <div class="member-name">Dr. Vaibhav Singh</div>
                   <div class="member-affiliation">NIELIT Calicut</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">DK</div>
                <div class="member-info">
                   <div class="member-name">Dr. Deepak Kumar</div>
                   <div class="member-affiliation">NIELIT Calicut</div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div> -->

        <!-- <div class="committee-card">
    <div class="committee-header">
        <h3>Technical Program Committee</h3>
        <i class="fas fa-code icon"></i>
    </div>
    <div class="committee-body">
        <div class="row">
            <div class="col-md-6">
                <div class="member-item">
                    <div class="member-icon">AP</div>
                    <div class="member-info">
                        <div class="member-name">Shri. Anil Kumar Pandey</div>
                        <div class="member-affiliation">Advisor, NIELIT</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">SS</div>
                    <div class="member-info">
                        <div class="member-name">Ms. Saritha S</div>
                        <div class="member-affiliation">Scientist F, NIELIT</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">SC</div>
                    <div class="member-info">
                        <div class="member-name">Ms. Sheetal Chopra</div>
                        <div class="member-affiliation">Scientist E, NIELIT</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">CR</div>
                    <div class="member-info">
                        <div class="member-name">Ms. Chetna Singh Rathor</div>
                        <div class="member-affiliation">Scientist-E, NIELIT</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">MG</div>
                    <div class="member-info">
                        <div class="member-name">Ms. Minali Gupta</div>
                        <div class="member-affiliation">Scientist-C, NIELIT</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">MT</div>
                    <div class="member-info">
                        <div class="member-name">Ms. Madhvi Tyagi</div>
                        <div class="member-affiliation">Deputy Director, NIELIT</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">RK</div>
                    <div class="member-info">
                        <div class="member-name">Dr. Reena K K</div>
                        <div class="member-affiliation">Scientist D, NIELIT Calicut</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">SC</div>
                    <div class="member-info">
                        <div class="member-name">Prof. Sudeshna Chakraborty</div>
                        <div class="member-affiliation">Galgotias University</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">MS</div>
                    <div class="member-info">
                        <div class="member-name">Dr. Mridula Singh</div>
                        <div class="member-affiliation">Quantum University, Roorkee</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">PW</div>
                    <div class="member-info">
                        <div class="member-name">Dr. Pratima Walde</div>
                        <div class="member-affiliation">Sharda University</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">SS</div>
                    <div class="member-info">
                        <div class="member-name">Dr. Swapnil Srivastava</div>
                        <div class="member-affiliation">United College Engineering and Research, Allahabad</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">SN</div>
                    <div class="member-info">
                        <div class="member-name">Smt. Sini S Nair</div>
                        <div class="member-affiliation">Scientist D, NIELIT Calicut</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">Q</div>
                    <div class="member-info">
                        <div class="member-name">Dr. Qurratulain</div>
                        <div class="member-affiliation">Aligarh Muslim University</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">VG</div>
                    <div class="member-info">
                        <div class="member-name">Dr. Vaishali Gupta</div>
                        <div class="member-affiliation">Bennett University, Greater Noida</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">PG</div>
                    <div class="member-info">
                        <div class="member-name">Dr. Pallavi Goel</div>
                        <div class="member-affiliation">Galgotia College of Engineering & Technology</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">AK</div>
                    <div class="member-info">
                        <div class="member-name">Dr. Ajay Kumar</div>
                        <div class="member-affiliation">JIIT University Noida</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">GJ</div>
                    <div class="member-info">
                        <div class="member-name">Dr. Garima Jain</div>
                        <div class="member-affiliation">NIET Greater Noida</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">MD</div>
                    <div class="member-info">
                        <div class="member-name">Dr. Mayank Dave</div>
                        <div class="member-affiliation">NIT Kurukshetra, India</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">DB</div>
                    <div class="member-info">
                        <div class="member-name">Dr. Divya Bansal</div>
                        <div class="member-affiliation">Punjab Engineering College, Chandigarh</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">NS</div>
                    <div class="member-info">
                        <div class="member-name">Dr. Neelam Singh</div>
                        <div class="member-affiliation">Graphic Era Hill University, India</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">AT</div>
                    <div class="member-info">
                        <div class="member-name">Dr. Anuradha Taluja</div>
                        <div class="member-affiliation">AKGEC, Ghaziabad</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">R</div>
                    <div class="member-info">
                        <div class="member-name">Dr. Rohaila</div>
                        <div class="member-affiliation">Teerthanker Mahaveer University, Moradabad</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">MC</div>
                    <div class="member-info">
                        <div class="member-name">Dr. Meenakshi Chaudhary</div>
                        <div class="member-affiliation">MMMUT, Gorakhpur</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">KV</div>
                    <div class="member-info">
                        <div class="member-name">Dr. Kimmi Verma</div>
                        <div class="member-affiliation">ABES Engineering College Ghaziabad</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">P</div>
                    <div class="member-info">
                        <div class="member-name">Ms. Pallavi</div>
                        <div class="member-affiliation">Buddha Engineering College, Gorakhpur</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">RR</div>
                    <div class="member-info">
                        <div class="member-name">Ms. Rupa Rani</div>
                        <div class="member-affiliation">AKGEC, Ghaziabad</div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="member-item">
                    <div class="member-icon">YD</div>
                    <div class="member-info">
                        <div class="member-name">Dr. Yajnaseni Dash</div>
                        <div class="member-affiliation">Bennett University</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">DS</div>
                    <div class="member-info">
                        <div class="member-name">Dr. Damyanti Singh</div>
                        <div class="member-affiliation">IILM UNIVERSITY</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">VS</div>
                    <div class="member-info">
                        <div class="member-name">Dr. Vandana Sharma</div>
                        <div class="member-affiliation">Christ University</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">AS</div>
                    <div class="member-info">
                        <div class="member-name">Dr. Anupama Sharma</div>
                        <div class="member-affiliation">AKGEC, Ghaziabad</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">J</div>
                    <div class="member-info">
                        <div class="member-name">Dr. Jaspreet</div>
                        <div class="member-affiliation">IET Lucknow</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">SS</div>
                    <div class="member-info">
                        <div class="member-name">Dr. Seema Srivastava</div>
                        <div class="member-affiliation">Bennett University</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">KJ</div>
                    <div class="member-info">
                        <div class="member-name">Ms. Kanika Jindal</div>
                        <div class="member-affiliation">NIET, Greater Noida</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">SS</div>
                    <div class="member-info">
                        <div class="member-name">Dr. Shikha Singh</div>
                        <div class="member-affiliation">MMMUT, Gorakhpur</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">SV</div>
                    <div class="member-info">
                        <div class="member-name">Dr. Sonali Vyas</div>
                        <div class="member-affiliation">UPES, Dehradun</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">GV</div>
                    <div class="member-info">
                        <div class="member-name">Dr. Gunjan Varshney</div>
                        <div class="member-affiliation">JSS University, Noida</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">IK</div>
                    <div class="member-info">
                        <div class="member-name">Dr. Inderjeet Kaur</div>
                        <div class="member-affiliation">AKGEC, Ghaziabad</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">PS</div>
                    <div class="member-info">
                        <div class="member-name">Ms. Parul Saini</div>
                        <div class="member-affiliation">IILM University Greater Noida</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">RG</div>
                    <div class="member-info">
                        <div class="member-name">Dr. Ruchi Gupta</div>
                        <div class="member-affiliation">AKGEC, Ghaziabad</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">PS</div>
                    <div class="member-info">
                        <div class="member-name">Dr. Pragya Singh</div>
                        <div class="member-affiliation">IIIT Allahabad</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">SK</div>
                    <div class="member-info">
                        <div class="member-name">Ms. Sarita Kaur</div>
                        <div class="member-affiliation">Scientist-D, NIELIT</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">AS</div>
                    <div class="member-info">
                        <div class="member-name">Dr. Arun Kumar Singh</div>
                        <div class="member-affiliation">REC Kannauj</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">AT</div>
                    <div class="member-info">
                        <div class="member-name">Dr. Akhilesh Tiwari</div>
                        <div class="member-affiliation">IIIT Allahabad</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">SS</div>
                    <div class="member-info">
                        <div class="member-name">Shri. Saket Saurabh</div>
                        <div class="member-affiliation">Scientist-C, NIELIT</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">RC</div>
                    <div class="member-info">
                        <div class="member-name">Dr. Roshini Chakraborti</div>
                        <div class="member-affiliation">ABV-IITM Gwalior</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">PK</div>
                    <div class="member-info">
                        <div class="member-name">Dr. Pramod Kumar</div>
                        <div class="member-affiliation">Swami Rama Himalayan University, Dehradun</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">AG</div>
                    <div class="member-info">
                        <div class="member-name">Dr. Akanksha Gupta</div>
                        <div class="member-affiliation">GEU Dehradun</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">GM</div>
                    <div class="member-info">
                        <div class="member-name">Dr. Gaurav Mittal</div>
                        <div class="member-affiliation">DEAL Dehradun</div>
                    </div>
                </div>
</div></div></div></div> -->


        <!-- Registration Committee Chairs -->
        <div class="committee-card">
            <div class="committee-header">
                <h3>Registration Committee Chairs</h3>
                <i class="fas fa-graduation-cap icon"></i>
            </div>
            <div class="committee-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="member-item">
                            <div class="member-icon">KP</div>
                            <div class="member-info">
                                <div class="member-name">Ms. Kanchan Panwar</div>
                                <div class="member-affiliation">Deputy Director, NIELIT</div>
                            </div>
                        </div>
                        <div class="member-item">
                            <div class="member-icon">KK</div>
                            <div class="member-info">
                                <div class="member-name">Ms. Kavita Kasturia</div>
                                <div class="member-affiliation">Deputy Director, NIELIT</div>
                            </div>
                        </div>
                        <div class="member-item">
                            <div class="member-icon">KD</div>
                            <div class="member-info">
                                <div class="member-name">Ms. Kalpna Dahiya</div>
                                <div class="member-affiliation">Deputy Director, NIELIT</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="member-item">
                            <div class="member-icon">SD</div>
                            <div class="member-info">
                                <div class="member-name">Shri Sharad Dixit</div>
                                <div class="member-affiliation">NIELIT</div>
                            </div>
                        </div>
                        <div class="member-item">
                            <div class="member-icon">SG</div>
                            <div class="member-info">
                                <div class="member-name">Dr. Shubhi Gupta</div>
                                <div class="member-affiliation">Amity University, Greater Noida, India</div>
                            </div>
                        </div>
                        <div class="member-item">
                            <div class="member-icon">AD</div>
                            <div class="member-info">
                                <div class="member-name">Ms. Alka Dilip</div>
                                <div class="member-affiliation">IIT Kanpur</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="committee-card">
            <div class="committee-header">
                <h3>Publication Committee</h3>
                <i class="fas fa-book icon"></i>
            </div>
            <div class="committee-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="member-item">
                            <div class="member-icon">AS</div>
                            <div class="member-info">
                                <div class="member-name">Dr. Amita Shukla</div>
                                <div class="member-affiliation">NIET, Greater Noida</div>
                            </div>
                        </div>
                        <div class="member-item">
                            <div class="member-icon">KK</div>
                            <div class="member-info">
                                <div class="member-name">Ms. Kavita Kasturia</div>
                                <div class="member-affiliation">Principal Private Secretary, NIELIT</div>
                            </div>
                        </div>
                        <div class="member-item">
                            <div class="member-icon">PC</div>
                            <div class="member-info">
                                <div class="member-name">Dr. Prateek Chaturvedi</div>
                                <div class="member-affiliation">Amity University</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="member-item">
                            <div class="member-icon">SA</div>
                            <div class="member-info">
                                <div class="member-name">Ms. Salma P Aayubi</div>
                                <div class="member-affiliation">Assistant Director, NIELIT</div>
                            </div>
                        </div>
                        <div class="member-item">
                            <div class="member-icon">IP</div>
                            <div class="member-info">
                                <div class="member-name">Dr. Indu Prabha</div>
                                <div class="member-affiliation">SRMPG Lucknow</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="committee-card">
            <div class="committee-header">
                <h3>Publicity Committee Chairs</h3>
                <i class="fas fa-bullhorn icon"></i>
            </div>
            <div class="committee-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="member-item">
                            <div class="member-icon">MS</div>
                            <div class="member-info">
                                <div class="member-name">Dr. Madhu Sharma Gaur</div>
                                <div class="member-affiliation">GL Bajaj, Greater Noida</div>
                            </div>
                        </div>
                        <div class="member-item">
                            <div class="member-icon">GS</div>
                            <div class="member-info">
                                <div class="member-name">Ms. G Sreedevi</div>
                                <div class="member-affiliation">Principal Technical Officer, NIELIT</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="member-item">
                            <div class="member-icon">SG</div>
                            <div class="member-info">
                                <div class="member-name">Mr. Saurabh Ghosh</div>
                                <div class="member-affiliation">MNNIT Prayagraj</div>
                            </div>
                        </div>
                        <div class="member-item">
                            <div class="member-icon">PS</div>
                            <div class="member-info">
                                <div class="member-name">Ms. Pooja Sharma</div>
                                <div class="member-affiliation">MNNIT Prayagraj</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="committee-card">
            <div class="committee-header">
                <h3>Finance Committee Chairs</h3>
                <i class="fas fa-coins icon"></i>
            </div>
            <div class="committee-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="member-item">
                            <div class="member-icon">RC</div>
                            <div class="member-info">
                                <div class="member-name">Dr. Raghavendra Chaudhary</div>
                                <div class="member-affiliation">IIT Kanpur</div>
                            </div>
                        </div>
                        <div class="member-item">
                            <div class="member-icon">RT</div>
                            <div class="member-info">
                                <div class="member-name">Shri. R K Tripathi</div>
                                <div class="member-affiliation">Joint Director, Finance, NIELIT</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="member-item">
                            <div class="member-icon">JK</div>
                            <div class="member-info">
                                <div class="member-name">Ms. Jagjit Kaur</div>
                                <div class="member-affiliation">Assistant Director, NIELIT</div>
                            </div>
                        </div>
                        <div class="member-item">
                            <div class="member-icon">AN</div>
                            <div class="member-info">
                                <div class="member-name">Ms. Anu Nain</div>
                                <div class="member-affiliation">Assistant Director, NIELIT</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="committee-card">
            <div class="committee-header">
                <h3>Sponsorship Committee</h3>
                <i class="fas fa-hand-holding-usd icon"></i>
            </div>
            <div class="committee-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="member-item">
                            <div class="member-icon">HM</div>
                            <div class="member-info">
                                <div class="member-name">Shri. Himanshu Mohan</div>
                                <div class="member-affiliation">Scientist D, NIELIT</div>
                            </div>
                        </div>
                        <div class="member-item">
                            <div class="member-icon">SS</div>
                            <div class="member-info">
                                <div class="member-name">Dr. Smita Sharma</div>
                                <div class="member-affiliation">NIELIT, New Delhi</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="member-item">
                            <div class="member-icon">SV</div>
                            <div class="member-info">
                                <div class="member-name">Dr. Shubhranshu Vikram Singh</div>
                                <div class="member-affiliation">Amity University Noida</div>
                            </div>
                        </div>
                        <div class="member-item">
                            <div class="member-icon">AP</div>
                            <div class="member-info">
                                <div class="member-name">Dr. Ayushi Prakash</div>
                                <div class="member-affiliation">AKGEC Ghaziabad</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="committee-card">
            <div class="committee-header">
                <h3>IT Infrastructure & Services Committee</h3>
                <i class="fas fa-network-wired icon"></i>
            </div>
            <div class="committee-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="member-item">
                            <div class="member-icon">MA</div>
                            <div class="member-info">
                                <div class="member-name">Shri. Manish Arora</div>
                                <div class="member-affiliation">Scientist F, NIELIT</div>
                            </div>
                        </div>
                        <div class="member-item">
                            <div class="member-icon">SS</div>
                            <div class="member-info">
                                <div class="member-name">Shri. Sushil Kumar Surana</div>
                                <div class="member-affiliation">Scientist E, NIELIT</div>
                            </div>
                        </div>
                        <div class="member-item">
                            <div class="member-icon">VM</div>
                            <div class="member-info">
                                <div class="member-name">Shri. Vikas Mittal</div>
                                <div class="member-affiliation">Scientist D, NIELIT</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="member-item">
                            <div class="member-icon">SB</div>
                            <div class="member-info">
                                <div class="member-name">Ms. Santosh Bharadwaj</div>
                                <div class="member-affiliation">Scientist C, NIELIT</div>
                            </div>
                        </div>
                        <div class="member-item">
                            <div class="member-icon">VK</div>
                            <div class="member-info">
                                <div class="member-name">Dr. Varun Kakar</div>
                                <div class="member-affiliation">BTKIT, Dawarahat</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="committee-card">
            <div class="committee-header">
                <h3>Hospitality & Local Management Committee</h3>
                <i class="fas fa-concierge-bell icon"></i>
            </div>
            <div class="committee-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="member-item">
                            <div class="member-icon">AG</div>
                            <div class="member-info">
                                <div class="member-name">Shri. Anurag Gupta</div>
                                <div class="member-affiliation">Scientist E, NIELIT Haridwar</div>
                            </div>
                        </div>
                        <div class="member-item">
                            <div class="member-icon">AS</div>
                            <div class="member-info">
                                <div class="member-name">Shri. Akhilesh Shukla</div>
                                <div class="member-affiliation">NIELIT Haridwar</div>
                            </div>
                        </div>
                        <div class="member-item">
                            <div class="member-icon">NS</div>
                            <div class="member-info">
                                <div class="member-name">Prof. Nishant Saxena</div>
                                <div class="member-affiliation">Tula’s Institute, Dehradun</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="member-item">
                            <div class="member-icon">SV</div>
                            <div class="member-info">
                                <div class="member-name">Prof. Sandeep Vijay</div>
                                <div class="member-affiliation">Maya Devi University, Selaqui, Dehradun</div>
                            </div>
                        </div>
                        <div class="member-item">
                            <div class="member-icon">KM</div>
                            <div class="member-info">
                                <div class="member-name">Dr. K C Mishra</div>
                                <div class="member-affiliation">WIT Dehradun</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="committee-card">
            <div class="committee-header">
                <h3>International Advisory Committee</h3>
                <i class="fas fa-globe icon"></i>
            </div>
            <div class="committee-body">
                <div class="row">
                    <!-- Column 1 -->
                    <div class="col-md-4">
                        <div class="member-item">
                            <div class="member-icon">HS</div>
                            <div class="member-info">
                                <div class="member-name">Dr. Heba Saleh</div>
                                <div class="member-affiliation">Chairwoman, Information Technology Institute (MCIT),
                                    Cairo, Egypt</div>
                            </div>
                        </div>
                        <div class="member-item">
                            <div class="member-icon">RB</div>
                            <div class="member-info">
                                <div class="member-name">Dr. Reem Bahgat</div>
                                <div class="member-affiliation">President, Egypt University of Informatics, Egypt</div>
                            </div>
                        </div>
                        <div class="member-item">
                            <div class="member-icon">ML</div>
                            <div class="member-info">
                                <div class="member-name">Prof. -Ming Liu</div>
                                <div class="member-affiliation">National Taipei University of Technology, Taiwan</div>
                            </div>
                        </div>
                        <div class="member-item">
                            <div class="member-icon">RS</div>
                            <div class="member-info">
                                <div class="member-name">Prof. Ram Sharma</div>
                                <div class="member-affiliation">Vice Chancellor and Chairperson, UPES, Dehradun</div>
                            </div>
                        </div>
                        <div class="member-item">
                            <div class="member-icon">FT</div>
                            <div class="member-info">
                                <div class="member-name">Prof. Francois Therin</div>
                                <div class="member-affiliation">Deputy Vice-Chancellor, University of Cyberjaya,
                                    Malaysia</div>
                            </div>
                        </div>
                        <div class="member-item">
                            <div class="member-icon">ML</div>
                            <div class="member-info">
                                <div class="member-name">Prof. Mark Lee</div>
                                <div class="member-affiliation">University of Birmingham, UK</div>
                            </div>
                        </div>
                        <div class="member-item">
                            <div class="member-icon">SG</div>
                            <div class="member-info">
                                <div class="member-name">Dr. S B Goyal</div>
                                <div class="member-affiliation">Director, Faculty of Information Technology, City
                                    University of Malaysia</div>
                            </div>
                        </div>
                        <div class="member-item">
                            <div class="member-icon">UM</div>
                            <div class="member-info">
                                <div class="member-name">Dr. Umar Muhammad Modibbo</div>
                                <div class="member-affiliation">Yola University, Nigeria</div>
                            </div>
                        </div>
                        <div class="member-item">
                            <div class="member-icon">VS</div>
                            <div class="member-info">
                                <div class="member-name">Prof. Vijay Singh</div>
                                <div class="member-affiliation">Uniformed Services University of the Health Sciences,
                                    United States</div>
                            </div>
                        </div>
                        <div class="member-item">
                            <div class="member-icon">JF</div>
                            <div class="member-info">
                                <div class="member-name">Prof. Jean-Pierre Fontaine</div>
                                <div class="member-affiliation">Professor, University of Clermont-Auvergne, France</div>
                            </div>
                        </div>
                        <div class="member-item">
                            <div class="member-icon">MD</div>
                            <div class="member-info">
                                <div class="member-name">Prof. Mario José Diván</div>
                                <div class="member-affiliation">Intel, Oregon, United States</div>
                            </div>
                        </div>
                        <div class="member-item">
                            <div class="member-icon">PH</div>
                            <div class="member-info">
                                <div class="member-name">Pao-Ann Hsiung</div>
                                <div class="member-affiliation">Director, Research Centre on AI and Sustainable
                                    Development, NCCU, Taiwan</div>
                            </div>
                        </div>
                        <div class="member-item">
                            <div class="member-icon">TH</div>
                            <div class="member-info">
                                <div class="member-name">Prof. Tzung-Pei Hong</div>
                                <div class="member-affiliation">National University of Kaohsiung, Taiwan</div>
                            </div>
                        </div>
                        <div class="member-item">
                            <div class="member-icon">CI</div>
                            <div class="member-info">
                                <div class="member-name">Prof. Celestine Iwendi</div>
                                <div class="member-affiliation">The University of Bolton, UK</div>
                            </div>
                        </div>
                        <div class="member-item">
                            <div class="member-icon">AE</div>
                            <div class="member-info">
                                <div class="member-name">Prof. Dr. Alexey Eremin</div>
                                <div class="member-affiliation">Otto von Guericke University</div>
                            </div>
                        </div>
                    
                        <div class="member-item">
                            <div class="member-icon">IS</div>
                            <div class="member-info">
                                <div class="member-name">Ivan I. Smalyukh</div>
                                <div class="member-affiliation">University of Colorado Boulder (United States)</div>
                            </div>
                        </div>
                    
                        <div class="member-item">
                            <div class="member-icon">JY</div>
                            <div class="member-info">
                                <div class="member-name">Jun Yamamoto</div>
                                <div class="member-affiliation">Kyoto University (Japan)</div>
                            </div>
                        </div>
                    
                        <div class="member-item">
                            <div class="member-icon">SZ</div>
                            <div class="member-info">
                                <div class="member-name">Slobodan Žumer Slovenia</div>
                                <div class="member-affiliation">University of Ljubljana and Jozef Stefan Institute</div>
                            </div>
                        </div>
                    
                        <div class="member-item">
                            <div class="member-icon">HK</div>
                            <div class="member-info">
                                <div class="member-name">Haegyeom Kim</div>
                                <div class="member-affiliation">Lawrence Berkeley National Lab</div>
                            </div>
                        </div>
                    
                        <div class="member-item">
                            <div class="member-icon">AK</div>
                            <div class="member-info">
                                <div class="member-name">Arvind Kumar Sharma</div>
                                <div class="member-affiliation">Enterprise Systems & ICT Head, Jakarta</div>
                            </div>
                        </div>
                    </div>

                    <!-- Column 2 -->
                    <div class="col-md-4">
                        <div class="member-item">
                            <div class="member-icon">SV</div>
                            <div class="member-info">
                                <div class="member-name">Prof. Sunil Vadera</div>
                                <div class="member-affiliation">Computer Science, University of Salford, England</div>
                            </div>
                        </div>
                        <div class="member-item">
                            <div class="member-icon">SB</div>
                            <div class="member-info">
                                <div class="member-name">Prof. Siddhartha Bhattacharyya</div>
                                <div class="member-affiliation">Senior Researcher, VSB - Technical University of Ostrava
                                </div>
                            </div>
                        </div>
                        <div class="member-item">
                            <div class="member-icon">FB</div>
                            <div class="member-info">
                                <div class="member-name">Dr. Francesco Benedetto</div>
                                <div class="member-affiliation">Vice President of the Artificial Intelligence
                                    Commission, Rome</div>
                            </div>
                        </div>
                        <div class="member-item">
                            <div class="member-icon">DT</div>
                            <div class="member-info">
                                <div class="member-name">Prof. Domenico Talia</div>
                                <div class="member-affiliation">University of Calabria</div>
                            </div>
                        </div>
                        <div class="member-item">
                            <div class="member-icon">PC</div>
                            <div class="member-info">
                                <div class="member-name">Prof. Paolo Ciancarini</div>
                                <div class="member-affiliation">Università di Bologna, Italy</div>
                            </div>
                        </div>
                        <div class="member-item">
                            <div class="member-icon">MB</div>
                            <div class="member-info">
                                <div class="member-name">Dr. Mohamed Bettaz</div>
                                <div class="member-affiliation">Czech Technical University in Prague</div>
                            </div>
                        </div>
                        <div class="member-item">
                            <div class="member-icon">JB</div>
                            <div class="member-info">
                                <div class="member-name">Prof. Jordi Mongay Batalla</div>
                                <div class="member-affiliation">Warsaw University of Technology, Poland</div>
                            </div>
                        </div>
                        <div class="member-item">
                            <div class="member-icon">AR</div>
                            <div class="member-info">
                                <div class="member-name">Prof. Akshay Rathore</div>
                                <div class="member-affiliation">Singapore Institute of Technology (SIT), Singapore</div>
                            </div>
                        </div>
                        <div class="member-item">
                            <div class="member-icon">KT</div>
                            <div class="member-info">
                                <div class="member-name">Prof. Kiran Trehan</div>
                                <div class="member-affiliation">Pro-Vice Chancellor Partnerships and Engagement,
                                    University of York, England</div>
                            </div>
                        </div>
                        <div class="member-item">
                            <div class="member-icon">AP</div>
                            <div class="member-info">
                                <div class="member-name">Dr. Anand Paul</div>
                                <div class="member-affiliation">Louisiana State University, Health Sciences Center, USA
                                </div>
                            </div>
                        </div>
                        <div class="member-item">
                            <div class="member-icon">NA</div>
                            <div class="member-info">
                                <div class="member-name">Prof. Nalin A. G. Arachchilage</div>
                                <div class="member-affiliation">RMIT University, Australia</div>
                            </div>
                        </div>
                        <div class="member-item">
                            <div class="member-icon">TT</div>
                            <div class="member-info">
                                <div class="member-name">Prof. Tien Anh Tran</div>
                                <div class="member-affiliation">University of Malta, Msida, Malta</div>
                            </div>
                        </div>
                        <div class="member-item">
                            <div class="member-icon">AG</div>
                            <div class="member-info">
                                <div class="member-name">Prof. Antonino Galletta</div>
                                <div class="member-affiliation">University of Messina, Italy</div>
                            </div>
                        </div>
                        <div class="member-item">
                            <div class="member-icon">AB</div>
                            <div class="member-info">
                                <div class="member-name">Dr. Ali Kashif Bashir</div>
                                <div class="member-affiliation">The Manchester Metropolitan University, UK</div>
                            </div>
                        </div>
                        <div class="member-item">
                            <div class="member-icon">GM</div>
                            <div class="member-info">
                                <div class="member-name">Dr. G. N. Manjunatha</div>
                                <div class="member-affiliation">Université Lille, France</div>
                            </div>
                        </div>
                    
                        <div class="member-item">
                            <div class="member-icon">JF</div>
                            <div class="member-info">
                                <div class="member-name">Prof. Jean-François, BLACH</div>
                                <div class="member-affiliation">Université d'Artois, France</div>
                            </div>
                        </div>
                    
                        <div class="member-item">
                            <div class="member-icon">RB</div>
                            <div class="member-info">
                                <div class="member-name">Prof. Rabah BOUKHERROUB</div>
                                <div class="member-affiliation">Université Lille</div>
                            </div>
                        </div>
                    
                        <div class="member-item">
                            <div class="member-icon">OJ</div>
                            <div class="member-info">
                                <div class="member-name">Prof. Olivier JOUBERT</div>
                                <div class="member-affiliation">CNRS-Université de Nantes</div>
                            </div>
                        </div>
                    
                        <div class="member-item">
                            <div class="member-icon">BR</div>
                            <div class="member-info">
                                <div class="member-name">Prof. Bertrand REUILLARD</div>
                                <div class="member-affiliation">Université Grenoble, France</div>
                            </div>
                        </div>
                    </div>

                    <!-- Column 3 -->
                    <div class="col-md-4">
                        <div class="member-item">
                            <div class="member-icon">SD</div>
                            <div class="member-info">
                                <div class="member-name">Prof. Subhasish Dasgupta</div>
                                <div class="member-affiliation">The George Washington University, USA</div>
                            </div>
                        </div>
                        <div class="member-item">
                            <div class="member-icon">NA</div>
                            <div class="member-info">
                                <div class="member-name">Prof. Najib BEN AOUN</div>
                                <div class="member-affiliation">Al-Baha University, Saudi Arabia</div>
                            </div>
                        </div>
                        <div class="member-item">
                            <div class="member-icon">ZB</div>
                            <div class="member-info">
                                <div class="member-name">Prof. Zakaria Boulouard</div>
                                <div class="member-affiliation">LIM, Hassan II University of Casablanca, Morocco</div>
                            </div>
                        </div>
                        <div class="member-item">
                            <div class="member-icon">VP</div>
                            <div class="member-info">
                                <div class="member-name">Prof. Vasileios Paliktzoglou</div>
                                <div class="member-affiliation">The University of Eastern Finland</div>
                            </div>
                        </div>
                        <div class="member-item">
                            <div class="member-icon">SK</div>
                            <div class="member-info">
                                <div class="member-name">Dr. Shakir Khan</div>
                                <div class="member-affiliation">Imam Muhammad ibn Saud Islamic University, Riyadh</div>
                            </div>
                        </div>
                        <div class="member-item">
                            <div class="member-icon">SO</div>
                            <div class="member-info">
                                <div class="member-name">Dr. Soufiane Ouariach</div>
                                <div class="member-affiliation">PhD, Abdelmalek Essaâdi University, Morocco</div>
                            </div>
                        </div>
                        <div class="member-item">
                            <div class="member-icon">ML</div>
                            <div class="member-info">
                                <div class="member-name">Prof. Mark Lee</div>
                                <div class="member-affiliation">University of Birmingham, UK</div>
                            </div>
                        </div>
                        <div class="member-item">
                            <div class="member-icon">CH</div>
                            <div class="member-info">
                                <div class="member-name">Prof. Chaminda Thushara Hewage</div>
                                <div class="member-affiliation">Cardiff Metropolitan University, United Kingdom</div>
                            </div>
                        </div>
                        <div class="member-item">
                            <div class="member-icon">SS</div>
                            <div class="member-info">
                                <div class="member-name">Dr. Sweta Sneha</div>
                                <div class="member-affiliation">Kennesaw State University, USA</div>
                            </div>
                        </div>
                        <div class="member-item">
                            <div class="member-icon">MM</div>
                            <div class="member-info">
                                <div class="member-name">Dr. Meenakshi Memoria</div>
                                <div class="member-affiliation">Dubai</div>
                            </div>
                        </div>
                        <div class="member-item">
                            <div class="member-icon">SJ</div>
                            <div class="member-info">
                                <div class="member-name">Dr. Sanjay Jasola</div>
                                <div class="member-affiliation">VC, DBS Global University, Dehradun</div>
                            </div>
                        </div>
                        <div class="member-item">
                            <div class="member-icon">MD</div>
                            <div class="member-info">
                                <div class="member-name">Dr. Mario Jose Divan Koller</div>
                                <div class="member-affiliation">Sr. AI Software Development Engineer, USA</div>
                            </div>
                        </div>
                        <div class="member-item">
                            <div class="member-icon">MK</div>
                            <div class="member-info">
                                <div class="member-name">Prof. Morgan Kiani</div>
                                <div class="member-affiliation">Texas Christian University, USA</div>
                            </div>
                        </div>
                        <div class="member-item">
                            <div class="member-icon">EV</div>
                            <div class="member-info">
                                <div class="member-name">Prof. Emilia Balas Valentina</div>
                                <div class="member-affiliation">Aurel Vlaicu University of Arad</div>
                            </div>
                        </div>
                        <div class="member-item">
                            <div class="member-icon">VS</div>
                            <div class="member-info">
                                <div class="member-name">Dr. Vishal Krishna Singh</div>
                                <div class="member-affiliation">University of Essex</div>
                            </div>
                        </div>

                        <div class="member-item">
                            <div class="member-icon">MR</div>
                            <div class="member-info">
                                <div class="member-name">Prof. Mario Di Renzo</div>
                                <div class="member-affiliation">University of Salento Italy</div>
                            </div>
                        </div>
                    
                        <div class="member-item">
                            <div class="member-icon">LA</div>
                            <div class="member-info">
                                <div class="member-name">Prof. Lars</div>
                                <div class="member-affiliation">Hildeschium university Germany</div>
                            </div>
                        </div>
                    
                        <div class="member-item">
                            <div class="member-icon">HT</div>
                            <div class="member-info">
                                <div class="member-name">Dr. Harsh Tiwari</div>
                                <div class="member-affiliation">South Korea</div>
                            </div>
                        </div>
                    
                        <div class="member-item">
                            <div class="member-icon">MY</div>
                            <div class="member-info">
                                <div class="member-name">Prof. Masahiro Yoshizawa-Fujita</div>
                                <div class="member-affiliation">Universita Degli Studi Di Padova</div>
                            </div>
                        </div>
                    
                        <div class="member-item">
                            <div class="member-icon">DS</div>
                            <div class="member-info">
                                <div class="member-name">Dr. Durga Prasad Sharma</div>
                                <div class="member-affiliation">Université du Littoral Côte d'Opale</div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>


    </div>





    <!-- content end  -->
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
                                            <p class="mb-0">1<sup>st</sup> September 2025</p>
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
                                <a href="./Default.php"
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleInternational() {
            // This would toggle showing more international advisors
            alert('Feature to show all international advisors would be implemented here');
        }

        function loadMoreCommittees() {
            // This would load the remaining committees
            alert('Feature to load remaining committees (Technical Program, Publication, Finance, etc.) would be implemented here');
        }

        // Add smooth scroll animation for cards
        const cards = document.querySelectorAll('.committee-card');
        const observer1 = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        });

        cards.forEach(card => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            card.style.transition = 'all 0.6s ease';
            observer.observe(card);
        });

        // Counter animation for stats
        function animateCounter(element, target) {
            let count = 0;
            const increment = target / 100;
            const timer = setInterval(() => {
                count += increment;
                if (count >= target) {
                    element.textContent = target + '+';
                    clearInterval(timer);
                } else {
                    element.textContent = Math.floor(count) + '+';
                }
            }, 20);
        }

        // Animate counters when they come into view
        const statNumbers = document.querySelectorAll('.stat-number');
        const statsObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const target = parseInt(entry.target.textContent);
                    animateCounter(entry.target, target);
                    statsObserver.unobserve(entry.target);
                }
            });
        });

        statNumbers.forEach(stat => {
            statsObserver.observe(stat);
        });
    </script>

</body>

</html>

HTML

?>