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
                :root {
            --primary-blue: rgba(70, 12, 82, 0.99);
            --accent-blue: rgba(91, 2, 109, 0.99);
            --light-blue: rgba(232, 217, 235, 0.99);
            --gold: #f39c12;
            --text-dark: #2c3e50;
            --primarySecond: rgba(91, 2, 109, 0.99);
        }
        .imagel{
            border-radius: 100px;
            width:200px;
            height:230px


        }
        .section-title{
            background: linear-gradient(135deg, var(--primary-blue) 20%, var(--primarySecond) 100%);
        }
        .speaker-slider {
            background: linear-gradient(135deg, var(--light-blue) 20%, var(--primary-blue) 100%);
            min-height: 100vh;
            /* padding: 60px 0; */
        }
        
        .speaker-card {
            /* background: rgba(255, 255, 255, 0.95); */
            background: linear-gradient(135deg, var(--primarySecond) 10%, var(--gold) 100%);
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(70, 12, 82, 0.2);
            overflow: hidden;
            height: 480px;
            position: relative;
            border: 2px solid var(--light-blue);
        }
        
        .speaker-photo-section {
            height: 60%;
            position: relative;
            overflow: hidden;
        }
        
        /* .photo-placeholder {
            width: 50%;
            height: 100%;
            float: left;
            background-size: cover;
            background-position: center;
            position: relative;
        }
         */
        .photo-left {
            background: linear-gradient(45deg, var(--primary-blue), var(--gold));
        }
        
        .photo-right {
            background: linear-gradient(45deg, var(--accent-blue), var(--light-blue));
        }
        
        .photo-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(70, 12, 82, 0.3);
            display: flex;
            align-items: center;
            justify-content: center;
        }
/*         
        .photo-placeholder {
            color: white;
            font-size: 24px;
            opacity: 0.9;
        } */
        
        .speaker-details {
            height: 40%;
            padding: 30px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background: linear-gradient(180deg, var(--light-blue) 0%, rgba(255, 255, 255, 0.95) 100%);
        }
        
        .speaker-name {
            font-size: 24px;
            font-weight: 700;
            color: var(--primary-blue);
            margin-bottom: 10px;
        }
        
        .speaker-title {
            font-size: 16px;
            color: var(--gold);
            font-weight: 600;
            margin-bottom: 8px;
        }
        
        .speaker-organization {
            font-size: 14px;
            color: var(--text-dark);
            line-height: 1.4;
        }
        
        .carousel-control-prev,
        .carousel-control-next {
            width: 50px;
            height: 50px;
            background: var(--accent-blue);
            border-radius: 50%;
            top: 50%;
            transform: translateY(-50%);
            border: 2px solid var(--gold);
        }
        
        .carousel-control-prev:hover,
        .carousel-control-next:hover {
            background: var(--primary-blue);
        }
        
        .carousel-control-prev {
            left: -25px;
        }
        
        .carousel-control-next {
            right: -25px;
        }
        
        .carousel-indicators {
            bottom: -50px;
        }
        
        .carousel-indicators button {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            margin: 0 5px;
            background-color: var(--light-blue);
            border: 2px solid var(--gold);
        }
        
        .carousel-indicators button.active {
            background-color: var(--gold);
        }
        
        .section-title {
            text-align: center;
            color: white;
            margin-bottom: 50px;
            padding-top:50px;
            padding-bottom:50px
        }
        
        .section-title h2 {
            font-size: 3rem;
            font-weight: 300;
            margin-bottom: 15px;
            color: white;
        }
        
        .section-title p {
            font-size: 1.2rem;
            opacity: 0.9;
            color: rgba(255, 255, 255, 0.9);
        }
        
        /* Accent elements */
        .speaker-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--gold) 0%, var(--accent-blue) 100%);
        }
        
        @media (max-width: 768px) {
            .speaker-card {
                height: 450px;
            }
            
            .speaker-name {
                font-size: 20px;
            }
            
            .speaker-details {
                padding: 20px;
            }
            
            .section-title h2 {
                font-size: 2rem;
            }
        }
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

        /* style sheet temp start here */

        .speakers-section {
            background: linear-gradient(135deg, rgba(171, 103, 186, 0.78), rgba(91, 2, 109, 0.99));
            min-height: 40vh;
            position: relative;
            overflow: hidden;
            margin-top: 30px;
        }

        .speakers-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.1);
        }

        .content-wrapper {
            position: relative;
            z-index: 2;
        }

        .pulse-animation {
            animation: pulse 2s infinite;
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

        .floating-icons {
            position: absolute;
            opacity: 0.1;
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-20px);
            }
        }

        .icon-1 {
            top: 20%;
            left: 10%;
            animation-delay: 0s;
        }

        .icon-2 {
            top: 60%;
            right: 15%;
            animation-delay: 2s;
        }

        .icon-3 {
            bottom: 30%;
            left: 20%;
            animation-delay: 4s;
        }





        /* style sheet temp end herer  */
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

    <!-- <div class="speakers-section d-flex align-items-center justify-content-center position-relative">
     
        <i class="fas fa-microphone fa-3x text-white floating-icons icon-1"></i>
        <i class="fas fa-users fa-3x text-white floating-icons icon-2"></i>
        <i class="fas fa-star fa-3x text-white floating-icons icon-3"></i>

        <div class="content-wrapper text-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-md-10">
                        <div class="pulse-animation">
                            <i class="fas fa-microphone-alt fa-4x text-white mb-4 opacity-75"></i>
                        </div>
                        <h2 class="display-4 fw-bold text-white mb-3">
                            Speakers
                        </h2>
                        <p class="lead text-white-50 mb-4 fs-3">
                            Will be declared soon....
                        </p>
                        <div class="d-flex justify-content-center align-items-center">
                            <div class="spinner-grow text-light me-3" role="status" style="width: 1rem; height: 1rem;">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            <span class="text-white-50 fs-6">Stay tuned for exciting announcements</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->









    <!-- content end  -->
    <section class="speaker-slider">
    <!-- NATIONAL SPEAKERS SECTION -->
    <div class="section-title">
        <h2>National Speakers</h2>
        <p>Distinguished Leaders and Experts</p>
    </div>
    <div class="container" style=" padding-bottom:100px ">
        
        <div id="nationalSpeakerCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#nationalSpeakerCarousel" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#nationalSpeakerCarousel" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#nationalSpeakerCarousel" data-bs-slide-to="2"></button>
                <button type="button" data-bs-target="#nationalSpeakerCarousel" data-bs-slide-to="3"></button>
                <button type="button" data-bs-target="#nationalSpeakerCarousel" data-bs-slide-to="4"></button>
                <button type="button" data-bs-target="#nationalSpeakerCarousel" data-bs-slide-to="5"></button>
                <button type="button" data-bs-target="#nationalSpeakerCarousel" data-bs-slide-to="6"></button>
                <button type="button" data-bs-target="#nationalSpeakerCarousel" data-bs-slide-to="7"></button>
                <button type="button" data-bs-target="#nationalSpeakerCarousel" data-bs-slide-to="8"></button>
                <button type="button" data-bs-target="#nationalSpeakerCarousel" data-bs-slide-to="9"></button>
                <button type="button" data-bs-target="#nationalSpeakerCarousel" data-bs-slide-to="10"></button>
                <button type="button" data-bs-target="#nationalSpeakerCarousel" data-bs-slide-to="11"></button>
                <button type="button" data-bs-target="#nationalSpeakerCarousel" data-bs-slide-to="12"></button>
                <button type="button" data-bs-target="#nationalSpeakerCarousel" data-bs-slide-to="13"></button>
            </div>
            
            <div class="carousel-inner">
                <!-- Speaker 1 -->
                <div class="carousel-item active">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 col-md-8">
                            <div class="speaker-card ">
                                <div class="speaker-photo-section">
                                    <div class="photo-single">
                                        <div class="photo-overlay">
                                            <i class="fas fa-user photo-placeholder"><img src="images\preetibansal.jpg" alt="" class='imagel'></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="speaker-details">
                                    <div class="speaker-name">Dr. Preeti Banzal</div>
                                    <div class="speaker-title">Adviser/Scientist 'G'</div>
                                    <div class="speaker-organization">Principal Scientific Adviser to the Government of India</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Speaker 2 -->
                <div class="carousel-item">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 col-md-8">
                            <div class="speaker-card">
                                <div class="speaker-photo-section">
                                    <div class="photo-single">
                                        <div class="photo-overlay">
                                        <i class="fas fa-user photo-placeholder"><img src="images\Neena phuja.png" alt="" class='imagel'></i>

                                        </div>
                                    </div>
                                </div>
                                <div class="speaker-details">
                                    <div class="speaker-name">Dr. Neena Phuja</div>
                                    <div class="speaker-title">Executive Member</div>
                                    <div class="speaker-organization">National Council for Vocational Education and Training (NCVET), Ministry of Skill Development, Government of India</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Speaker 3 -->
                <div class="carousel-item">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 col-md-8">
                            <div class="speaker-card">
                                <div class="speaker-photo-section">
                                    <div class="photo-single">
                                        <div class="photo-overlay">
                                        <i class="fas fa-user photo-placeholder"><img src="images\Tripta Thakur.jpg" alt="" class='imagel'></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="speaker-details">
                                    <div class="speaker-name">Dr. Tripta Thakur</div>
                                    <div class="speaker-title">Director General</div>
                                    <div class="speaker-organization">National Power Training Institute (NPTI)</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Speaker 4 -->
                <div class="carousel-item">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 col-md-8">
                            <div class="speaker-card">
                                <div class="speaker-photo-section">
                                    <div class="photo-single">
                                        <div class="photo-overlay">
                                        <i class="fas fa-user photo-placeholder"><img src="images\SN Singh.jpg" alt="" class='imagel'></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="speaker-details">
                                    <div class="speaker-name">Professor S N Singh</div>
                                    <div class="speaker-title">IEEE Fellow, Director</div>
                                    <div class="speaker-organization">Atal Bihari Vajpayee- Indian Institute of Information Technology and Management (ABV-IIITM), Gwalior, India</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                
                <!-- Speaker 4.1 -->
                <div class="carousel-item">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 col-md-8">
                            <div class="speaker-card">
                                <div class="speaker-photo-section">
                                    <div class="photo-single">
                                        <div class="photo-overlay">
                                        <i class="fas fa-user photo-placeholder"><img src="images\Mohm. Rihan.jpg" alt="" class='imagel'></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="speaker-details">
                                    <div class="speaker-name">Professor Mohammad Rihan </div>
                                    <div class="speaker-title">Director General,</div>
                                    <div class="speaker-organization">National Institute of Solar Energy (NISE), Ministry of New and Renewable Energy</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                
                <!-- Speaker 4.2 -->
                <div class="carousel-item">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 col-md-8">
                            <div class="speaker-card">
                                <div class="speaker-photo-section">
                                    <div class="photo-single">
                                        <div class="photo-overlay">
                                        <i class="fas fa-user photo-placeholder"><img src="images\Ram k Sharma.jpg" alt="" class='imagel'></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="speaker-details">
                                    <div class="speaker-name">Dr. Ram K Sharma</div>
                                    <div class="speaker-title">Vice Chancellor and Chairperson,  </div>
                                    <div class="speaker-organization">Board of Management, UPES </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Speaker 5 -->
                <div class="carousel-item">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 col-md-8">
                            <div class="speaker-card">
                                <div class="speaker-photo-section">
                                    <div class="photo-single">
                                        <div class="photo-overlay">
                                        <i class="fas fa-user photo-placeholder"><img src="images\Sweta Khurana.jpg" alt="" class='imagel'></i>

                                        </div>
                                    </div>
                                </div>
                                <div class="speaker-details">
                                    <div class="speaker-name">Ms. Shweta Khurana</div>
                                    <div class="speaker-title">Senior Director, </div>
                                    <div class="speaker-organization">Asia Pacific & Japan - Government Partnerships & Initiatives, 
International Government Affairs Group, Intel
</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

  <!-- Speaker 6 -->
                <div class="carousel-item">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 col-md-8">
                            <div class="speaker-card">
                                <div class="speaker-photo-section">
                                    <div class="photo-single">
                                        <div class="photo-overlay">
                                        <i class="fas fa-user photo-placeholder"><img src="images\Dr. MAMTA.jpg" alt="" class='imagel'></i>

                                        </div>
                                    </div>
                                </div>
                                <div class="speaker-details">
                                    <div class="speaker-name">Dr. Mamta Pant Abichandani </div>
                                    <div class="speaker-title">Director & Head Policy Affairs & Communications at Infineon Technologies</div>
                                    <div class="speaker-organization">Infineon Technologies</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


  <!-- Speaker 7 -->
                <div class="carousel-item">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 col-md-8">
                            <div class="speaker-card">
                                <div class="speaker-photo-section">
                                    <div class="photo-single">
                                        <div class="photo-overlay">
                                        <i class="fas fa-user photo-placeholder"><img src="images\Dr. manju.png" alt="" class='imagel'></i>

                                        </div>
                                    </div>
                                </div>
                                <div class="speaker-details">
                                    <div class="speaker-name">Dr Manju Khari</div>
                                    <div class="speaker-title">Professor</div>
                                    <div class="speaker-organization">JNU</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

  <!-- Speaker 8 -->
                <div class="carousel-item">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 col-md-8">
                            <div class="speaker-card">
                                <div class="speaker-photo-section">
                                    <div class="photo-single">
                                        <div class="photo-overlay">
                                        <i class="fas fa-user photo-placeholder"><img src="images\Asheesh Kumar.jpg" alt="" class='imagel'></i>

                                        </div>
                                    </div>
                                </div>
                                <div class="speaker-details">
                                    <div class="speaker-name">Professor Asheesh Kumar Singh </div>
                                    <div class="speaker-title">Professor</div>
                                    <div class="speaker-organization">Motilal Nehru National Institute of Technology Allahabad, Prayagraj, India</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
  <!-- Speaker 9 -->
                <div class="carousel-item">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 col-md-8">
                            <div class="speaker-card">
                                <div class="speaker-photo-section">
                                    <div class="photo-single">
                                        <div class="photo-overlay">
                                        <i class="fas fa-user photo-placeholder"><img src="images\Rishi.jpg" alt="" class='imagel'></i>

                                        </div>
                                    </div>
                                </div>
                                <div class="speaker-details">
                                    <div class="speaker-name">Dr. Rishi Mohan Bhatnagar</div>
                                    <div class="speaker-title">Co-Founder</div>
                                    <div class="speaker-organization">India & Global CTO â€“ AA2IT</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
  <!-- Speaker 10 -->
                <div class="carousel-item">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 col-md-8">
                            <div class="speaker-card">
                                <div class="speaker-photo-section">
                                    <div class="photo-single">
                                        <div class="photo-overlay">
                                        <i class="fas fa-user photo-placeholder"><img src="images\abhijeet.png" alt="" class='imagel'></i>

                                        </div>
                                    </div>
                                </div>
                                <div class="speaker-details">
                                    <div class="speaker-name">Mr. Abhijeet Sinha</div>
                                    <div class="speaker-title">National Program Director</div>
                                    <div class="speaker-organization">Ease of Doing Business, (EoDB)</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
  <!-- Speaker 11 -->
                <div class="carousel-item">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 col-md-8">
                            <div class="speaker-card">
                                <div class="speaker-photo-section">
                                    <div class="photo-single">
                                        <div class="photo-overlay">
                                        <i class="fas fa-user photo-placeholder"><img src="images\astha.jpg" alt="" class='imagel'></i>

                                        </div>
                                    </div>
                                </div>
                                <div class="speaker-details">
                                    <div class="speaker-name">Ms. Astha Kukreti</div>
                                    <div class="speaker-title">Executive Director</div>
                                    <div class="speaker-organization">Ease of Doing Business (EoDB)</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
  <!-- Speaker 12 -->
                <div class="carousel-item">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 col-md-8">
                            <div class="speaker-card">
                                <div class="speaker-photo-section">
                                    <div class="photo-single">
                                        <div class="photo-overlay">
                                        <i class="fas fa-user photo-placeholder"><img src="images\swaweta.jpg" alt="" class='imagel'></i>

                                        </div>
                                    </div>
                                </div>
                                <div class="speaker-details">
                                    <div class="speaker-name">Ms. Shaweta Berry</div>
                                    <div class="speaker-title">Founder & CEO</div>
                                    <div class="speaker-organization">Mahanadaya Universal Consultancy Private Limited</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <button class="carousel-control-prev" type="button" data-bs-target="#nationalSpeakerCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#nationalSpeakerCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
    </div>

    <!-- INTERNATIONAL SPEAKERS SECTION -->
    <br>
    <br>
    <div class="section-title">
        <h2>International Speakers</h2>
        <p>Global Experts and Leaders</p>
    </div>
    <div class="container" style="margin-top: 80px; padding-bottom:100px ">
        
        <div id="internationalSpeakerCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#internationalSpeakerCarousel" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#internationalSpeakerCarousel" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#internationalSpeakerCarousel" data-bs-slide-to="2"></button>
                <button type="button" data-bs-target="#internationalSpeakerCarousel" data-bs-slide-to="3"></button>
                <button type="button" data-bs-target="#internationalSpeakerCarousel" data-bs-slide-to="4"></button>
                <button type="button" data-bs-target="#internationalSpeakerCarousel" data-bs-slide-to="5"></button>
                <button type="button" data-bs-target="#internationalSpeakerCarousel" data-bs-slide-to="6"></button>
                <button type="button" data-bs-target="#internationalSpeakerCarousel" data-bs-slide-to="7"></button>
                <button type="button" data-bs-target="#internationalSpeakerCarousel" data-bs-slide-to="8"></button>
                <button type="button" data-bs-target="#internationalSpeakerCarousel" data-bs-slide-to="9"></button>
                <button type="button" data-bs-target="#internationalSpeakerCarousel" data-bs-slide-to="10"></button>
                <!-- <button type="button" data-bs-target="#internationalSpeakerCarousel" data-bs-slide-to="11"></button>
                <button type="button" data-bs-target="#internationalSpeakerCarousel" data-bs-slide-to="12"></button> -->
            </div>
            
            <div class="carousel-inner">

<!-- International Speaker 1 -->
<div class="carousel-item active">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
            <div class="speaker-card">
                <div class="speaker-photo-section">
                    <div class="photo-single">
                        <div class="photo-overlay">
                            <i class="fas fa-user photo-placeholder"><img src="images\Mary.jpg" alt="" class='imagel'></i>
                        </div>
                    </div>
                </div>
                <div class="speaker-details">
                    <div class="speaker-name">Ms. Mary Ellen Randall</div>
                    <div class="speaker-title">IEEE Fellow, President</div>
                    <div class="speaker-organization">Ascot Technologies, Inc.</div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- International Speaker 2 -->
<div class="carousel-item">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
            <div class="speaker-card">
                <div class="speaker-photo-section">
                    <div class="photo-single">
                        <div class="photo-overlay">
                            <i class="fas fa-user photo-placeholder"><img src="images\Celia.jpg" alt="" class='imagel'></i>
                        </div>
                    </div>
                </div>
                <div class="speaker-details">
                    <div class="speaker-name">Dr. Celia Shahnaz</div>
                    <div class="speaker-title">Professor</div>
                    <div class="speaker-organization">Bangladesh University of Engineering and Technology, Chair IEEE Women in Engineering, Nominations and Appointments</div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- International Speaker 3 -->
<div class="carousel-item">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
            <div class="speaker-card">
                <div class="speaker-photo-section">
                    <div class="photo-single">
                        <div class="photo-overlay">
                            <i class="fas fa-user photo-placeholder"><img src="images\Valentina.jpg" alt="" class='imagel'></i>
                        </div>
                    </div>
                </div>
                <div class="speaker-details">
                    <div class="speaker-name">Professor Valentina Emilia Balas</div>
                    <div class="speaker-title">Professor</div>
                    <div class="speaker-organization">Aurel Vlaicu University of Arad, Romania</div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- International Speaker 4 -->
<div class="carousel-item">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
            <div class="speaker-card">
                <div class="speaker-photo-section">
                    <div class="photo-single">
                        <div class="photo-overlay">
                            <i class="fas fa-user photo-placeholder"><img src="images\S. OBAIDAT.png" alt="" class='imagel'></i>
                        </div>
                    </div>
                </div>
                <div class="speaker-details">
                    <div class="speaker-name">Professor Mohammad S. Obaidat</div>
                    <div class="speaker-title">Life Fellow, IEEE, Distinguished Professor</div>
                    <div class="speaker-organization">University of Jordan</div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- International Speaker 5 -->
<div class="carousel-item">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
            <div class="speaker-card">
                <div class="speaker-photo-section">
                    <div class="photo-single">
                        <div class="photo-overlay">
                            <i class="fas fa-user photo-placeholder"><img src="images\AKSHAY KUMAR.jpg" alt="" class='imagel'></i>
                        </div>
                    </div>
                </div>
                <div class="speaker-details">
                    <div class="speaker-name">Professor Akshay Kumar Rathore</div>
                    <div class="speaker-title">IEEE Fellow, Professor and Program Leader</div>
                    <div class="speaker-organization">Electrical Power Engineering at Singapore Institute of Technology (SIT)</div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- International Speaker 6 -->
<div class="carousel-item">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
            <div class="speaker-card">
                <div class="speaker-photo-section">
                    <div class="photo-single">
                        <div class="photo-overlay">
                            <i class="fas fa-user photo-placeholder"><img src="images\SWETA ANEHA.jpg" alt="" class='imagel'></i>
                        </div>
                    </div>
                </div>
                <div class="speaker-details">
                    <div class="speaker-name">Professor Sweta Sneha</div>
                    <div class="speaker-title">Professor</div>
                    <div class="speaker-organization">Kennesaw State University, Georgia</div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- International Speaker 7 -->
<div class="carousel-item">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
            <div class="speaker-card">
                <div class="speaker-photo-section">
                    <div class="photo-single">
                        <div class="photo-overlay">
                            <i class="fas fa-user photo-placeholder"><img src="images\MEGA NOVITA.png" alt="" class='imagel'></i>
                        </div>
                    </div>
                </div>
                <div class="speaker-details">
                    <div class="speaker-name">Mega Novita</div>
                    <div class="speaker-title">Assistant professor</div>
                    <div class="speaker-organization">Universitas PGRI Semarang</div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- International Speaker 8 -->
<div class="carousel-item">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
            <div class="speaker-card">
                <div class="speaker-photo-section">
                    <div class="photo-single">
                        <div class="photo-overlay">
                            <i class="fas fa-user photo-placeholder"><img src="images\THILINI.jpg" alt="" class='imagel'></i>
                        </div>
                    </div>
                </div>
                <div class="speaker-details">
                    <div class="speaker-name">Ms. Thilini De Silva</div>
                    <div class="speaker-title">Dean of the Faculty of Business</div>
                    <div class="speaker-organization">NSBM Green University, Sri Lanka</div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- International Speaker 9 -->
<div class="carousel-item">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
            <div class="speaker-card">
                <div class="speaker-photo-section">
                    <div class="photo-single">
                        <div class="photo-overlay">
                            <i class="fas fa-user photo-placeholder"><img src="images\JEAN PIERRE.jpg" alt="" class='imagel'></i>
                        </div>
                    </div>
                </div>
                <div class="speaker-details">
                    <div class="speaker-name">Prof. Jean-Pierre Fontaine</div>
                    <div class="speaker-title">Professor</div>
                    <div class="speaker-organization">University of Clermont-Auvergne, France</div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- International Speaker 10 -->
<div class="carousel-item">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
            <div class="speaker-card">
                <div class="speaker-photo-section">
                    <div class="photo-single">
                        <div class="photo-overlay">
                            <i class="fas fa-user photo-placeholder"><img src="images\PAOLO.jpg" alt="" class='imagel'></i>
                        </div>
                    </div>
                </div>
                <div class="speaker-details">
                    <div class="speaker-name">Prof. Paolo Ciancarini</div>
                    <div class="speaker-title">Professor</div>
                    <div class="speaker-organization">UniversitÃ  di Bologna, Italy</div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- International Speaker 11 -->
<div class="carousel-item">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
            <div class="speaker-card">
                <div class="speaker-photo-section">
                    <div class="photo-single">
                        <div class="photo-overlay">
                            <i class="fas fa-user photo-placeholder"><img src="images\ANG WEE.png" alt="" class='imagel'></i>
                        </div>
                    </div>
                </div>
                <div class="speaker-details">
                    <div class="speaker-name">Mr. Ang Wee Seng</div>
                    <div class="speaker-title">Executive Director</div>
                    <div class="speaker-organization">Singapore Semiconductor Industry Association (SSIA)</div>
                </div>
            </div>
        </div>
    </div>
</div>





                <!-- International Speaker 1 -->
                <!-- <div class="carousel-item active">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 col-md-8">
                            <div class="speaker-card">
                                <div class="speaker-photo-section">
                                    <div class="photo-single">
                                        <div class="photo-overlay">
                                            <i class="fas fa-globe photo-placeholder"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="speaker-details">
                                    <div class="speaker-name">IEEE Fellow</div>
                                    <div class="speaker-title">Professor and Program Leader</div>
                                    <div class="speaker-organization">Electrical Power Engineering at Singapore Institute of Technology (SIT)</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                
                <!-- International Speaker 2 -->
                <!-- <div class="carousel-item">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 col-md-8">
                            <div class="speaker-card">
                                <div class="speaker-photo-section">
                                    <div class="photo-single">
                                        <div class="photo-overlay">
                                            <i class="fas fa-graduation-cap photo-placeholder"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="speaker-details">
                                    <div class="speaker-name">Professor</div>
                                    <div class="speaker-title">International Expert</div>
                                    <div class="speaker-organization">University of Clermont-Auvergne, France</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
            
            <button class="carousel-control-prev" type="button" data-bs-target="#internationalSpeakerCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#internationalSpeakerCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
    </div>
</section>


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
    
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> -->
    <script>
    // Initialize National Speakers Carousel
    var nationalCarousel = document.querySelector('#nationalSpeakerCarousel')
    var nationalCarouselInstance = new bootstrap.Carousel(nationalCarousel, {
        interval: 4000,
        wrap: true,
        pause: 'hover'
    })
    
    // Initialize International Speakers Carousel  
    var internationalCarousel = document.querySelector('#internationalSpeakerCarousel')
    var internationalCarouselInstance = new bootstrap.Carousel(internationalCarousel, {
        interval: 4000,
        wrap: true,
        pause: 'hover'
    })
    
    // Add smooth transitions
    // document.addEventListener('DOMContentLoaded', function() {
    //     const carouselItems = document.querySelectorAll('.carousel-item');
    //     carouselItems.forEach(item => {
    //         item.style.transition = 'transform 0.6s ease-in-out';
    //     });
    // });
</script>


</body>

</html>

HTML

?>