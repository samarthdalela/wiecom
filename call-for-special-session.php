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
        .textCenter {
            text-align: justify;
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

        /* new style starts here  */
        :root {
            --primary-blue: rgba(70, 12, 82, 0.99);
            --accent-blue: rgba(91, 2, 109, 0.99);
            --light-blue: rgba(232, 217, 235, 0.99);
            --gold: #f39c12;
            --text-dark: #2c3e50;
            --primarySecond: rgba(91, 2, 109, 0.99);
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

        /* new stayle end here */
        /* :root {
            --primary-blue: rgba(70, 12, 82, 0.99);
            --accent-blue: rgba(91, 2, 109, 0.99);
            --light-blue: rgba(232, 217, 235, 0.99);
            --gold: rgba(91, 2, 109, 0.99);
            --text-dark: #2c3e50;
        } */

        body {
            background: linear-gradient(135deg, var(--light-blue) 0%, #ffffff 50%, #f8f9fa 100%);

            color: var(--text-dark);

        }

        .text-primary {
            color: var(--primary-blue) !important;
        }

        .text-success {
            color: var(--accent-blue) !important;
        }

        .text-info {
            color: var(--primary-blue) !important;
        }

        .text-warning {
            color: var(--gold) !important;
        }

        .bg-success {
            background-color: var(--accent-blue) !important;
        }

        .bg-success.bg-opacity-10 {
            background-color: var(--light-blue) !important;
        }

        .bg-primary {
            background-color: var(--primary-blue) !important;
        }

        .bg-light {
            background-color: var(--light-blue) !important;
        }

        .border-success {
            border-color: var(--accent-blue) !important;
        }

        .border-primary {
            border-color: var(--primary-blue) !important;
        }

        .border-info {
            border-color: var(--primary-blue) !important;
        }

        .border-warning {
            border-color: var(--gold) !important;
        }

        .border-start.border-success {
            border-left-color: var(--accent-blue) !important;
        }

        .border-start.border-info {
            border-left-color: var(--primary-blue) !important;
        }

        .badge.bg-success {
            background-color: var(--accent-blue) !important;
        }

        .badge.bg-primary {
            background-color: var(--primary-blue) !important;
        }

        .btn-outline-primary {
            color: var(--primary-blue);
            border-color: var(--primary-blue);
        }

        .btn-outline-primary:hover {
            background-color: var(--primary-blue);
            border-color: var(--primary-blue);
        }

        .alert-info {
            background-color: var(--light-blue);
            border-color: var(--primary-blue);
            color: var(--text-dark);
        }

        .alert-light {
            background-color: #f8f9fa;
            border-color: var(--light-blue);
            color: var(--text-dark);
        }

        a {
            color: var(--accent-blue);
        }

        a:hover {
            color: var(--primary-blue);
        }

        .card-header {
            border-bottom: 1px solid var(--light-blue);
        }


        body5 {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, var(--light-blue) 0%, #ffffff 100%);
            min-height: 100vh;
            padding: 40px 20px;
        }

        .container5 {
            max-width: 1400px;
            margin: 0 auto;
        }

        .header5 {
            text-align: center;
            margin-bottom: 60px;
        }

        .main-title5 {
            font-size: 3.5rem;
            font-weight: bold;
            color: var(--primary-blue);
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
        }

        .subtitle5 {
            font-size: 1.3rem;
            color: var(--text-dark);
            opacity: 0.8;
            max-width: 600px;
            margin: 0 auto;
            line-height: 1.6;
        }

        .sessions-grid5 {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(600px, 1fr));
            gap: 40px;
            margin-bottom: 40px;
        }

        .session-card5 {
            background: white;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            transition: all 0.4s ease;
            border: 3px solid transparent;
            position: relative;
            overflow: hidden;
        }

        .session-card5::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 6px;
            background: linear-gradient(90deg, var(--primary-blue), var(--accent-blue), var(--primarySecond));
        }

        .session-card5:hover {
            transform: translateY(-10px);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
            border-color: var(--primarySecond);
        }

        .session-header5 {
            text-align: center;
            margin-bottom: 35px;
        }

        .session-number5 {
            display: inline-block;
            background: linear-gradient(135deg, var(--primary-blue), var(--accent-blue));
            color: white;
            padding: 12px 25px;
            border-radius: 25px;
            font-size: 1.1rem;
            font-weight: bold;
            margin-bottom: 15px;
            box-shadow: 0 4px 15px rgba(70, 12, 82, 0.3);
        }

        .session-title5 {
            font-size: 2rem;
            color: var(--text-dark);
            font-weight: bold;
            margin-bottom: 10px;
        }

        .session-description5 {
            color: var(--text-dark);
            opacity: 0.7;
            font-size: 1.1rem;
            line-height: 1.5;
        }

        .speakers-grid5 {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
            margin-top: 30px;
        }

        .speaker-card5 {
            background: var(--light-blue);
            border-radius: 15px;
            padding: 25px;
            text-align: center;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        .speaker-card5:hover {
            background: white;
            border-color: var(--primarySecond);
            transform: scale(1.02);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }

        .speaker-image5 {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin: 0 auto 20px;
            background: linear-gradient(135deg, var(--primary-blue), var(--accent-blue));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 2.5rem;
            font-weight: bold;
            border: 4px solid var(--primarySecond);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
        }

        .speaker-name5 {
            font-size: 1.3rem;
            font-weight: bold;
            color: var(--primary-blue);
            margin-bottom: 8px;
        }

        .speaker-title5 {
            color: var(--text-dark);
            opacity: 0.8;
            font-size: 1rem;
            line-height: 1.4;
        }

        .session-card5:nth-child(1) .session-number5 {
            /* background: linear-gradient(135deg, #e74c3c, #c0392b); */
            background: linear-gradient(135deg, var(--primarySecond), #e67e22);
        }

        .session-card5:nth-child(2) .session-number5 {
            /* background: linear-gradient(135deg, #27ae60, #229954); */
            background: linear-gradient(135deg, var(--primarySecond), #e67e22);
        }

        .session-card5:nth-child(3) .session-number5 {
            /* background: linear-gradient(135deg, #3498db, #2980b9); */
            background: linear-gradient(135deg, var(--primarySecond), #e67e22);
        }

        .session-card5:nth-child(4) .session-number5 {
            background: linear-gradient(135deg, var(--primarySecond), #e67e22);
        }

        .time-badge5 {
            display: inline-block;
            background: var(--primarySecond);
            color: white;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: bold;
            margin-top: 15px;
        }

        @media (max-width: 768px) {
            .main-title5 {
                font-size: 2.5rem;
            }

            .sessions-grid5 {
                grid-template-columns: 1fr;
                gap: 30px;
            }

            .session-card5 {
                padding: 25px;
            }

            .speakers-grid5 {
                grid-template-columns: 1fr;
            }
        }

        /* new styles for the section start */
        body5 {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, var(--light-blue) 0%, #ffffff 100%);
            min-height: 100vh;
            padding: 40px 20px;
        }

        .container5 {
            max-width: 1400px;
            margin: 0 auto;
        }

        .header5 {
            text-align: center;
            margin-bottom: 60px;
        }

        .main-title5 {
            font-size: 3.5rem;
            font-weight: bold;
            color: var(--primary-blue);
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
        }

        .subtitle5 {
            font-size: 1.3rem;
            color: var(--text-dark);
            opacity: 0.8;
            max-width: 600px;
            margin: 0 auto;
            line-height: 1.6;
        }

        .sessions-grid5 {
            display: flex;
            flex-direction: column;
            gap: 40px;
            margin-bottom: 40px;
        }

        .session-card5 {
            background: white;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            transition: all 0.4s ease;
            border: 3px solid transparent;
            position: relative;
            overflow: hidden;
            width: 100%;
        }

        .session-card5::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 6px;
            background: linear-gradient(90deg, var(--primary-blue), #e67e22, var(--primarySecond));
        }

        .session-card5:hover {
            transform: translateY(-10px);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
            border-color: var(--primarySecond);
        }

        .session-header5 {
            text-align: center;
            margin-bottom: 35px;
        }

        .session-number5 {
            display: inline-block;
            background: linear-gradient(135deg, var(--primarySecond), #e67e22);
            color: white;
            padding: 12px 25px;
            border-radius: 25px;
            font-size: 1.1rem;
            font-weight: bold;
            margin-bottom: 15px;
            box-shadow: 0 4px 15px rgba(70, 12, 82, 0.3);
        }

        .session-title5 {
            font-size: 2rem;
            color: var(--text-dark);
            font-weight: bold;
            margin-bottom: 10px;
        }

        .session-description5 {
            color: var(--text-dark);
            opacity: 0.7;
            font-size: 1.1rem;
            line-height: 1.5;
        }

        .speakers-grid5 {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
            margin-top: 30px;
        }

        .speaker-card5 {
            /* background: var(--light-blue); */
            /* background: linear-gradient(135deg,   rgba(91, 2, 109, 0.301)
            ,  rgba(228, 205, 233, 0.301)); */
            background: linear-gradient(90deg, rgba(218, 150, 231, 0.605), rgb(250, 250, 250), rgba(218, 150, 231, 0.605));
            border-radius: 15px;
            padding: 25px;
            text-align: center;
            transition: all 0.3s ease;
            border: 2px solid var(--primary-blue);
        }

        .speaker-card5:hover {
            background: linear-gradient(90deg, rgba(218, 150, 231, 0.605), #e67d229a, rgba(218, 150, 231, 0.605));
            border-color: var(--primarySecond);
            transform: scale(1.02);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }

        .speaker-image5 {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            margin: 0 auto 20px;
            background: linear-gradient(135deg, var(--primary-blue), var(--accent-blue));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 2.5rem;
            font-weight: bold;
            border: 4px solid var(--primarySecond);

            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
        }

        .speaker-name5 {
            font-size: 1.3rem;
            font-weight: bold;
            color: var(--primary-blue);
            margin-bottom: 8px;
        }

        .speaker-title5 {
            color: var(--text-dark);
            opacity: 0.8;
            font-size: 1rem;
            line-height: 1.4;
        }

        .session-card5:nth-child(1) .session-number5 {
            background: linear-gradient(135deg, var(--primarySecond), #e67e22);
        }

        .session-card5:nth-child(2) .session-number5 {
            background: linear-gradient(135deg, var(--primarySecond), #e67e22);
        }

        .session-card5:nth-child(3) .session-number5 {
            background: linear-gradient(135deg, var(--primarySecond), #e67e22);
        }

        .session-card5:nth-child(4) .session-number5 {
            background: linear-gradient(135deg, var(--primarySecond), #e67e22);
        }

        .time-badge5 {
            display: inline-block;
            background: var(--primarySecond);
            color: white;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: bold;
            margin-top: 15px;
        }

        @media (max-width: 768px) {
            .main-title5 {
                font-size: 2.5rem;
            }

            .session-card5 {
                padding: 25px;
            }

            .speakers-grid5 {
                grid-template-columns: 1fr;
            }
        }

        /* new styles for the section ends */
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

    <!-- body start  -->

    <section class="committee-hero">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="display-4 fw-bold mb-3">
                        <i class="fas fa-users me-3"></i>
                        SPECIAL SESSIONS
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
        <!-- <div class="card mb-4 border-start border-success border-4">
    <div class="card-header bg-success bg-opacity-10">
        <h2 class="h4 mb-0 text-success"><i class="bi bi-megaphone me-2"></i>Call for Special Sessions</h2>
    </div>
    <div class="card-body textCenter">
        <p class="lead">We are soliciting proposals for special sessions from female academicians and Researchers within the general scope of UPWIECON 2025.</p>
        
        <div class="row mb-4 textCenter">
            <div class="col-md-8">
                <p>The special sessions will take place from <span class="badge bg-success">30-31 October 2025</span> at the same venue as the main conference. It should complement the main technical program and serve to broaden the technical scope of the conference in emerging areas.</p>
                
                <p>The special session topic should be of sufficient significance and importance to attract interest from the researchers and practitioners from both academia and industry. We encourage the prospective special session organizers to submit well-planned proposals that are specific and detailed in justifying relevance and viability.</p>
            </div>
            <div class="col-md-4">
                <div class="card bg-light">
                    <div class="card-body text-center">
                        <i class="bi bi-calendar-event display-4 text-success mb-2"></i>
                        <h5 class="card-title">Special Sessions</h5>
                        <p class="card-text"><strong>30-31 October 2025</strong></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="alert alert-info border-start border-info border-4" role="alert">
            <h5 class="alert-heading"><i class="bi bi-info-circle me-2"></i>Submission Instructions</h5>
            <p class="mb-0">Please submit your proposals (with no more than <strong>3 pages</strong>) in PDF format on or before <strong>31st January 2025</strong> by email in the attached format to the Conference Chair: <a href="mailto:upwiecon@gmail.com" class="text-decoration-none">upwiecon@gmail.com</a>.</p>
        </div>

        <h5 class="text-primary mb-3"><i class="bi bi-file-text me-2"></i>Proposal Format</h5>
        <div class="list-group mb-4">
            <div class="list-group-item d-flex align-items-start">
                <span class="badge bg-primary rounded-pill me-3 mt-1">1</span>
                <span>Title of the Proposed Special Sessions, Special Session Acronym.</span>
            </div>
            <div class="list-group-item d-flex align-items-start">
                <span class="badge bg-primary rounded-pill me-3 mt-1">2</span>
                <span>Brief description of the area of concern (approx. 100 words), with a special focus on why this is an interesting and significant topic.</span>
            </div>
            <div class="list-group-item d-flex align-items-start">
                <span class="badge bg-primary rounded-pill me-3 mt-1">3</span>
                <span>The name and contact information of 2 or 3 special session chairs (highlighting their background) willing to promote and organize sufficient quality submissions to each special session.</span>
            </div>
            <div class="list-group-item d-flex align-items-start">
                <span class="badge bg-primary rounded-pill me-3 mt-1">4</span>
                <span>A list of potential reviewers with affiliations.</span>
            </div>
            <div class="list-group-item d-flex align-items-start">
                <span class="badge bg-primary rounded-pill me-3 mt-1">5</span>
                <span>Brief description of the proposed special session (Include the Abstract, scope, aim, the expected number of submissions, and special session program committee members)</span>
            </div>
            <div class="list-group-item d-flex align-items-start">
                <span class="badge bg-primary rounded-pill me-3 mt-1">6</span>
                <span>All proposals should be submitted by no later than the deadline. Early submission is highly encouraged. Draft Call for Papers (optional).</span>
            </div>
            <div class="list-group-item d-flex align-items-start">
                <span class="badge bg-primary rounded-pill me-3 mt-1">7</span>
                <span>Accepted and successfully presented papers may be eligible to the IEEE Xplore for possible proceedings after the paper has been reviewed.</span>
            </div>
            <div class="list-group-item d-flex align-items-start">
                <span class="badge bg-primary rounded-pill me-3 mt-1">8</span>
                <span>Any other information (e.g., Infrastructure/logistics support required)</span>
            </div>
        </div>

        <h5 class="text-primary mb-3"><i class="bi bi-calendar-check me-2"></i>Important Dates</h5>
        <div class="row g-3">
            <div class="col-md-6">
                <div class="card border-success">
                    <div class="card-body text-center">
                        <i class="bi bi-calendar-plus text-success fs-2 mb-2"></i>
                        <h6 class="card-title">Call Opens</h6>
                        <p class="card-text fw-bold text-success">1 February, 2025</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card border-warning">
                    <div class="card-body text-center">
                        <i class="bi bi-calendar-x text-warning fs-2 mb-2"></i>
                        <h6 class="card-title">Submission Deadline</h6>
                        <p class="card-text fw-bold text-warning">28 February, 2025</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card border-info">
                    <div class="card-body text-center">
                        <i class="bi bi-bell text-info fs-2 mb-2"></i>
                        <h6 class="card-title">Notification of Selection</h6>
                        <p class="card-text fw-bold text-info">10 March, 2025</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card border-primary">
                    <div class="card-body text-center">
                        <i class="bi bi-calendar-event text-primary fs-2 mb-2"></i>
                        <h6 class="card-title">Special Sessions Date</h6>
                        <p class="card-text fw-bold text-primary">30-31 October 2025</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="alert alert-light border mt-4" role="alert">
            <div class="text-center">
                <i class="bi bi-question-circle fs-3 text-muted mb-2"></i>
                <p class="mb-1">For any questions, please feel free to contact the Conference Chairs</p>
                <a href="mailto:ieeeconference@nielit.ac.in" class="btn btn-outline-primary">
                    <i class="bi bi-envelope me-2"></i>ieeeconference@nielit.ac.in
                </a>
            </div>
        </div>
    </div>
</div> -->

        <!-- Footer Note -->
        <!-- <div class="alert alert-light border text-center" role="alert">
    <p class="mb-0 fst-italic text-muted">
        <i class="bi bi-envelope me-2"></i>For any queries regarding submission, please contact the organizing team
    </p>
</div> -->
        <div class="body5">
            <div class="container5">
                <div class="header5">
                    <!-- <h1 class="main-title5">Special Sessions</h1> -->
                    <p class="subtitle5">Join our distinguished speakers for exclusive presentations on cutting-edge
                        topics and innovative research</p>
                </div>

                <div class="sessions-grid5">
                    <!-- Special Session 1 -->
                    <div class="session-card5">
                        <div class="session-header5">
                            <div class="session-number5">Special Session 1</div>
                            <h2 class="session-title5">Advanced approaches in Communication, Computer Sciences and Electrical Engineering</h2>
                            <!-- <p class="session-description5">Driving innovation in electrical, electronics, and computing
                                through AI and ML</p> -->
                                <br>
                            <div class="session-number5">Special Session Chairs</div>
                        </div>
                        <div class="speakers-grid5">
                            <div class="speaker-card5">
                                <img src="./images/s1 1.jpeg" alt="" class="speaker-image5">
                                <h3 class="speaker-name5">Dr. Smita Sharma</h3>
                                <p class="speaker-title5">National Institute of Electronics and Information Technology (NIELIT), India</p>
                            </div>
                            <div class="speaker-card5">
                                <img src="./images/s1 2.jpeg" alt="" class="speaker-image5">
                                <h3 class="speaker-name5">Dr. Suman Avdhesh Yadav</h3>
                                <p class="speaker-title5">IILM University, Greater Noida, India</p>
                            </div>
                        </div>

                        <div class="speakers-grid5">
                            <div class="speaker-card5">
                                <img src="./images/s1 3.jpeg" alt="" class="speaker-image5">
                                <h3 class="speaker-name5">Prof. S Vikram Singh</h3>
                                <p class="speaker-title5">Amity University, Greater Noida, India</p>
                            </div>

                        </div>

                    </div>

                    <!-- Special Session 2 -->
                    <div class="session-card5">
                        <div class="session-header5">
                            <div class="session-number5">Special Session 2</div>
                            <h2 class="session-title5">Artificial Intelligence and Machine Learning for Smart and
                                Intelligent Systems in Electrical, Electronics, and Computer Engineering</h2>
                            <!-- <p class="session-description5">Driving innovation in electrical, electronics, and computing
                                through AI and ML</p> -->
                                <br>
                            <div class="session-number5">Special Session Chairs</div>
                        </div>
                        <div class="speakers-grid5">
                            <div class="speaker-card5">
                                <img src="./images/s2 1.jpeg" alt="" class="speaker-image5">
                                <h3 class="speaker-name5">Dr. Divya Asija</h3>
                                <p class="speaker-title5">Amity University Uttar Pradesh, Noida, India</p>
                            </div>
                            <div class="speaker-card5">
                                <img src="./images/s2 2.jpeg" alt="" class="speaker-image5">
                                <h3 class="speaker-name5">Dr. R.K. Viral</h3>
                                <p class="speaker-title5">Affiliation: Amity University Uttar Pradesh, Noida, India</p>
                            </div>
                        </div>

                        <div class="speakers-grid5">
                            <div class="speaker-card5">
                                <img src="./images/s2 3.jpeg" alt="" class="speaker-image5">
                                <h3 class="speaker-name5">Dr. Hasmat Malik</h3>
                                <p class="speaker-title5">Universiti Teknologi Malaysia (UTM), Malaysia</p>
                            </div>

                        </div>

                    </div>

                    <!-- Special Session 3 -->
                    <div class="session-card5">
                        <div class="session-header5">
                            <div class="session-number5">Special Session 3</div>
                            <h2 class="session-title5">Artificial Intelligence, Machine Learning, Deep Learning, and IoT
                                in Next-Gen Automation</h2>
                            <!-- <p class="session-description5">Integrating AI, ML, DL, and IoT to shape the future of smart
                                systems

                            </p> -->
                            <br>
                            <div class="session-number5">Special Session Chairs</div>
                        </div>
                        <div class="speakers-grid5">
                            <div class="speaker-card5">
                                <img src="./images/s3 1.jpeg" alt="" class="speaker-image5">

                                <h3 class="speaker-name5">Dr. Naina Chaudhary</h3>
                                <p class="speaker-title5">Amity University in Tashkent, Uzbekistan</p>
                            </div>
                            <div class="speaker-card5">
                                <img src="./images/s3 2.jpeg" alt="" class="speaker-image5">
                                <h3 class="speaker-name5">Dr. Danish Ather</h3>
                                <p class="speaker-title5">Amity University in Tashkent, Uzbekistan</p>
                            </div>
                        </div>
                    </div>

                    <!-- Special Session 4 -->
                    <div class="session-card5">
                        <div class="session-header5">
                            <div class="session-number5">Special Session 4</div>
                            <h2 class="session-title5">VLSI Design and Technology</h2>
                            <!-- <p class="session-description5">Innovations in VLSI architectures, fabrication, and
                                integration</p> -->
                                <br>
                            <div class="session-number5">Special Session Chairs</div>
                        </div>
                        <div class="speakers-grid5">
                            <div class="speaker-card5">
                                <img src="./images/s4 1.jpeg" alt="" class="speaker-image5">
                                <h3 class="speaker-name5">Dr. Manisha Chahande</h3>
                                <p class="speaker-title5">Director of the Center of Excellence (CoE)<br>SoC TeamUp
                                    Semiconductor Pvt. Ltd.</p>
                            </div>
                            <!-- <div class="speaker-card5">
                        <img src="./images/s5 3.jpg" alt="" class="speaker-image5">
                        <h3 class="speaker-name5">Mr. Robert Johnson</h3>
                        <p class="speaker-title5">Digital Strategy Advisor<br>TechForward Inc</p>
                    </div> -->
                        </div>
                    </div>

                    <!-- Special Session 5 -->
                    <div class="session-card5">
                        <div class="session-header5">
                            <div class="session-number5">Special Session 5</div>
                            <h2 class="session-title5">Machine Learning Approaches for Big Data Processing, Security,
                                and Applications</h2>
                            <!-- <p class="session-description5">Harnessing intelligent algorithms to extract insights from
                                massive data volumes

                            </p> -->
                            <br>
                            <div class="session-number5">Special Session Chairs</div>
                        </div>
                        <div class="speakers-grid5">
                            <div class="speaker-card5">
                                <!-- <div class="speaker-image5">MS</div> -->
                                <img src="./images/s5 1.jpg" alt="" class="speaker-image5">
                                <h3 class="speaker-name5">Dr. Priyanka Tyagi</h3>
                                <p class="speaker-title5">GCET Greater Noida, India</p>
                            </div>
                            <div class="speaker-card5">
                                <img src="./images/s5 2.jpg" alt="" class="speaker-image5">
                                <h3 class="speaker-name5">Dr. Adriana Schiopoiu Burlea</h3>
                                <p class="speaker-title5">University of Craiova, Romania</p>
                            </div>

                        </div>

                        <div class="speakers-grid5">
                            <div class="speaker-card5">
                                <img src="./images/s5 3.jpg" alt="" class="speaker-image5">
                                <h3 class="speaker-name5">Dr. Sudeshna Chkraborty</h3>
                                <p class="speaker-title5">Galgotias University, India</p>
                            </div>
                            <div class="speaker-card5">
                                <img src="./images/s5 4.jpg" alt="" class="speaker-image5">
                                <h3 class="speaker-name5">Dr. Kirti Seth</h3>
                                <p class="speaker-title5">INHA University, Tashkent</p>
                            </div>
                        </div>
                    </div>



                    <div class="session-card5">
                        <div class="session-header5">
                            <div class="session-number5">Special Session 6</div>
                            <h2 class="session-title5">Converging Frontiers: Semiconductors and Computational Intelligence</h2>
                            <!-- <p class="session-description5">Harnessing intelligent algorithms to extract insights from
                                massive data volumes

                            </p> -->
                            <br>
                            <div class="session-number5">Special Session Chairs</div>
                        </div>
                        <div class="speakers-grid5">
                            <div class="speaker-card5">
                                <!-- <div class="speaker-image5">MS</div> -->
                                <img src="./images/s6 1.jpeg" alt="" class="speaker-image5">
                                <h3 class="speaker-name5">Dr. Neelam Singh</h3>
                                <p class="speaker-title5">Graphic Era (Deemed to be University), Dehradun, India</p>
                            </div>
                            <div class="speaker-card5">
                                <img src="./images/s6 2.jpeg" alt="" class="speaker-image5">
                                <h3 class="speaker-name5">Dr. Mridul Gupta</h3>
                                <p class="speaker-title5">Graphic Era (Deemed to be University), Dehradun, India</p>
                            </div>

                        </div>

                        <div class="speakers-grid5">
                            <div class="speaker-card5">
                                <img src="./images/s6 3.jpeg" alt="" class="speaker-image5">
                                <h3 class="speaker-name5">Dr. Divya Chaudhary</h3>
                                <p class="speaker-title5">Northeastern University, United States</p>
                            </div>
                            <div class="speaker-card5">
                                <img src="./images/s6 4.jpeg" alt="" class="speaker-image5">
                                <h3 class="speaker-name5">Ms. Vandana Rawat</h3>
                                <p class="speaker-title5">Graphic Era (Deemed to be University), Dehradun, India</p>
                            </div>
                        </div>
                    </div>



                    <div class="session-card5">
                        <div class="session-header5">
                            <div class="session-number5">Special Session 7</div>
                            <h2 class="session-title5">Data Analytics and Intelligent Decision Systems</h2>
                            <!-- <p class="session-description5">Harnessing intelligent algorithms to extract insights from
                                massive data volumes

                            </p> -->
                            <br>
                            <div class="session-number5">Special Session Chairs</div>
                        </div>
                        <div class="speakers-grid5">
                            <div class="speaker-card5">
                                <!-- <div class="speaker-image5">MS</div> -->
                                <img src="./images/s7 1.jpeg" alt="" class="speaker-image5">
                                <h3 class="speaker-name5">Dr. Mridula</h3>
                                <p class="speaker-title5">Quantum University Uttar Pradesh, India</p>
                            </div>
                            <div class="speaker-card5">
                                <img src="./images/s7 2.jpeg" alt="" class="speaker-image5">
                                <h3 class="speaker-name5">Dr. Dev Baloni</h3>
                                <p class="speaker-title5">Quantum University Uttar Pradesh, India</p>
                            </div>

                        </div>

                        <div class="speakers-grid5">
                            <div class="speaker-card5">
                                <img src="./images/s7 3.jpeg" alt="" class="speaker-image5">
                                <h3 class="speaker-name5">Dr. Anand Nayyar</h3>
                                <p class="speaker-title5">Duy Tan University Da Nang, Vietnam, Vietnam</p>
                            </div>
                            <!-- <div class="speaker-card5">
                                <img src="./images/s6 4.jpeg" alt="" class="speaker-image5">
                                <h3 class="speaker-name5">Ms. Vandana Rawat</h3>
                                <p class="speaker-title5">Graphic Era (Deemed to be University), Dehradun, India</p>
                            </div> -->
                        </div>
                    </div>

                    <div class="session-card5">
                        <div class="session-header5">
                            <div class="session-number5">Special Session 8</div>
                            <h2 class="session-title5">Secure and Sustainable Technologies for Digital Health and Precision Agriculture</h2>
                            <!-- <p class="session-description5">Harnessing intelligent algorithms to extract insights from
                                massive data volumes

                            </p> -->
                            <br>
                            <div class="session-number5">Special Session Chairs</div>
                        </div>
                        <div class="speakers-grid5">
                            <div class="speaker-card5">
                                <!-- <div class="speaker-image5">MS</div> -->
                                <img src="./images/s8 1.jpeg" alt="" class="speaker-image5">
                                <h3 class="speaker-name5">Dr. Jaspal Kaur Saini</h3>
                                <p class="speaker-title5">Dr B R Ambedkar NIT Jalandhar, Punjab, India</p>
                            </div>
                            <div class="speaker-card5">
                                <img src="./images/s8 2.jpeg" alt="" class="speaker-image5">
                                <h3 class="speaker-name5">Dr. Divya Bansal</h3>
                                <p class="speaker-title5">Punjab Engineering College, Chandigarh, India</p>
                            </div>

                        </div>

                        <div class="speakers-grid5">
                            <div class="speaker-card5">
                                <img src="./images/s8 3.jpeg" alt="" class="speaker-image5">
                                <h3 class="speaker-name5">Dr. Sri Devi Ravana</h3>
                                <p class="speaker-title5">University of Malaya, Kuala Lumpur</p>
                            </div>
                            <!-- <div class="speaker-card5">
                                <img src="./images/s6 4.jpeg" alt="" class="speaker-image5">
                                <h3 class="speaker-name5">Ms. Vandana Rawat</h3>
                                <p class="speaker-title5">Graphic Era (Deemed to be University), Dehradun, India</p>
                            </div> -->
                        </div>
                    </div>

              


                    <div class="session-card5">
                        <div class="session-header5">
                            <div class="session-number5">Special Session 9</div>
                            <h2 class="session-title5">Emerging Smart Healthcare Technologies, Internet of Things, and Blockchain in Disease Detection, Diagnosis, and Prognosis</h2>
                            <!-- <p class="session-description5">Harnessing intelligent algorithms to extract insights from
                                massive data volumes

                            </p> -->
                            <br>
                            <div class="session-number5">Special Session Chairs</div>
                        </div>
                        <div class="speakers-grid5">
                            <div class="speaker-card5">
                                <!-- <div class="speaker-image5">MS</div> -->
                                <img src="./images/s9 1.jpeg" alt="" class="speaker-image5">
                                <h3 class="speaker-name5">Dr. Prasanalakshmi Balaji</h3>
                                <p class="speaker-title5">King Khalid University, Saudi Arabia</p>
                            </div>
                            <div class="speaker-card5">
                                <img src="./images/s9 2.jpeg" alt="" class="speaker-image5">
                                <h3 class="speaker-name5">Dr. Mega Novita</h3>
                                <p class="speaker-title5">Universitas PGRI Semarang, Indonesia</p>
                            </div>

                        </div>

                        <div class="speakers-grid5">
                            <div class="speaker-card5">
                                <img src="./images/s9 3.jpeg" alt="" class="speaker-image5">
                                <h3 class="speaker-name5">Dr. Alok Singh Chauhan</h3>
                                <p class="speaker-title5">Galgotias University, India</p>
                            </div>
                            <!-- <div class="speaker-card5">
                                <img src="./images/s6 4.jpeg" alt="" class="speaker-image5">
                                <h3 class="speaker-name5">Ms. Vandana Rawat</h3>
                                <p class="speaker-title5">Graphic Era (Deemed to be University), Dehradun, India</p>
                            </div> -->
                        </div>
                    </div>


                    <div class="session-card5">
                        <div class="session-header5">
                            <div class="session-number5">Special Session 10</div>
                            <h2 class="session-title5">Data Communication & Secure Expert Systems</h2>
                            <!-- <p class="session-description5">Harnessing intelligent algorithms to extract insights from
                                massive data volumes

                            </p> -->
                            <br>
                            <div class="session-number5">Special Session Chairs</div>
                        </div>
                        <div class="speakers-grid5">
                            <div class="speaker-card5">
                                <!-- <div class="speaker-image5">MS</div> -->
                                <img src="./images/s10 1.jpeg" alt="" class="speaker-image5">
                                <h3 class="speaker-name5">Dr. Vandna Rani Verma</h3>
                                <p class="speaker-title5">Galgotias College of Engineering & Technology Greater Noida, India</p>
                            </div>
                            <div class="speaker-card5">
                                <img src="./images/s10 2.jpeg" alt="" class="speaker-image5">
                                <h3 class="speaker-name5">Dr. Nonita Sharma</h3>
                                <p class="speaker-title5">Indira Gandhi Delhi Technical University for Women New Delhi, India</p>
                            </div>

                        </div>

                        <div class="speakers-grid5">
                            <div class="speaker-card5">
                                <img src="./images/s10 3.jpeg" alt="" class="speaker-image5">
                                <h3 class="speaker-name5">Dr. Pradeepika Verma</h3>
                                <p class="speaker-title5">TIH-IIT Patna, India</p>
                            </div>
                            <!-- <div class="speaker-card5">
                                <img src="./images/s6 4.jpeg" alt="" class="speaker-image5">
                                <h3 class="speaker-name5">Ms. Vandana Rawat</h3>
                                <p class="speaker-title5">Graphic Era (Deemed to be University), Dehradun, India</p>
                            </div> -->
                         
                                <div class="speaker-card5">
                                    <img src="./images/s10 4.jpeg" alt="" class="speaker-image5">
                                    <h3 class="speaker-name5">Dr. Woinshet Ayatu</h3>
                                    <p class="speaker-title5">Wachamo University, Ethiopia</p>
                                </div>
                                <!-- <div class="speaker-card5">
                                    <img src="./images/s6 4.jpeg" alt="" class="speaker-image5">
                                    <h3 class="speaker-name5">Ms. Vandana Rawat</h3>
                                    <p class="speaker-title5">Graphic Era (Deemed to be University), Dehradun, India</p>
                                </div> -->
                        
                        </div>
                    </div>




                </div>
            </div>
</body>
</div>
</div>
<!-- body end -->
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
                                    <h3 class="display-6 fw-bold mb-0">30<sup>th</sup> - 31<sup>st</sup> October 2025
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
                        <div class="p-3 rounded-3 me-3" style="background: linear-gradient(45deg, #3b82f6, #8b5cf6);">
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
                        <div class="p-3 rounded-3 me-3" style="background: linear-gradient(45deg, #f56565, #ff8a65);">
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