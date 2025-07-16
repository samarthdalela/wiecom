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

    <style>
        .zoomed-out {
            justify-content: center;
            transform: scale(0.8);
            /* 80% of the original size */
            transform-origin: top center;
            /* Adjust origin to keep layout aligned */

        }

        html {
            background: linear-gradient(135deg, var(--light-blue) 0%, #ffffff 50%, #f8f9fa 100%) !important;
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
            ;
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
            background: linear-gradient(135deg, var(--light-blue) 0%, #ffffff 50%, #f8f9fa 100%) !important;

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

        body47 {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, var(--light-blue), #fff);
            padding: 10px 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .container47 {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 10px;
        }

        h147 {
            text-align: center;
            color: var(--primary-blue);
            font-size: 2.5rem;
            margin-bottom: 50px;
            font-weight: 700;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
        }

        .logo-scroller47 {
            overflow: hidden;
            background: linear-gradient(90deg, var(--primary-blue), var(--accent-blue));
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(70, 12, 82, 0.3);
            position: relative;
        }

        .logo-scroller47::before,
        .logo-scroller47::after {
            content: '';
            position: absolute;
            top: 0;
            width: 200px;
            height: 100%;
            z-index: 2;
            pointer-events: none;
        }

        .logo-scroller47::before {
            left: 0;
            background: linear-gradient(90deg, var(--primary-blue), transparent);
        }

        .logo-scroller47::after {
            right: 0;
            background: linear-gradient(270deg, var(--accent-blue), transparent);
        }

        .logo-track47 {
            display: flex;
            animation: scroll 25s linear infinite;
            width: calc(300px * 16);
            /* 8 logos * 2 sets * width */
        }

        .logo-item47 {
            flex: 0 0 300px;
            height: 120px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 20px;
            background: var(--light-blue);
            border-radius: 15px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .logo-item47::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, var(--gold), transparent);
            opacity: 0.7;
            transition: left 2s ease;
        }

        .logo-item47:hover::before {
            left: 100%;
        }

        .logo-item47:hover {
            transform: translateY(-5px) scale(1.05);
            box-shadow: 0 15px 30px rgba(171, 103, 186, 0.4);
        }

        /* 
        .logo47 {
            font-size: 1.8rem;
            font-weight: bold;
            color: var(--primary-blue);
            text-align: center;
            position: relative;
            z-index: 1;
            transition: color 0.3s ease;
        } */
        .logo47 {
            width: 100px;
            /* Adjust this size as needed */
            height: 100px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .logo47 img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
            display: block;
        }

        .logo-item47:hover .logo {
            color: var(--accent-blue);
        }

        /* Create duplicate set for seamless loop */
        @keyframes scroll {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(calc(-300px * 8));
                /* Move by width of one complete set */
            }
        }

        .logo-scroller47:hover .logo-track {
            animation-play-state: paused;
        }

        .subtitle47 {
            text-align: center;
            color: var(--text-dark);
            font-size: 1.2rem;
            margin-top: 30px;
            opacity: 0.8;
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .logo-item47 {
                flex: 0 0 250px;
            }

            .logo-track47 {
                width: calc(250px * 16);
            }

            @keyframes scroll {
                0% {
                    transform: translateX(0);
                }

                100% {
                    transform: translateX(calc(-250px * 8));
                }
            }

            h1 {
                font-size: 2rem;
            }
        }

        /* Add some sparkle effects */
        .sparkle47 {
            position: absolute;
            width: 4px;
            height: 4px;
            background: var(--gold);
            border-radius: 50%;
            animation: sparkle 2s infinite;
        }

        @keyframes sparkle {

            0%,
            100% {
                opacity: 0;
                transform: scale(0);
            }

            50% {
                opacity: 1;
                transform: scale(1);
            }
        }

        .logo-scroller10 {
            width: 100%;
            overflow: hidden;
            padding: 60px 0;
            position: relative;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
        }

        /* Smooth fade edges for better visual effect */
        .logo-scroller10::before,
        .logo-scroller10::after {
            content: '';
            position: absolute;
            top: 0;
            width: 150px;
            height: 100%;
            z-index: 2;
            pointer-events: none;
        }

        .logo-scroller10::before {
            left: 0;
            background: linear-gradient(to right, rgba(104, 79, 109, 0.4), transparent);
        }

        .logo-scroller10::after {
            right: 0;
            background: linear-gradient(to left, rgba(104, 79, 109, 0.4), transparent);
        }

        .logo-track10 {
            display: flex;
            animation: smoothScroll10 40s linear infinite;
            gap: 80px;
            align-items: center;
            /* Key fix: Set width to exactly fit one complete set plus buffer */
            width: max-content;
        }

        .logo-item10 {
            position: relative;
            min-width: 180px;
            width: 180px;
            height: 120px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: transform 0.3s ease, filter 0.3s ease;
            flex-shrink: 0;
        }

        .logo-item10:hover {
            transform: translateY(-10px) scale(1.1);
            filter: brightness(1.2);
        }

        .logo10 {
            width: 160px;
            height: 100px;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            border: 2px solid rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 10px;
            transition: all 0.3s ease;
            overflow: hidden;
        }

        .logo10:hover {
            background: rgba(255, 255, 255, 1);
            box-shadow: 0 12px 48px rgba(0, 0, 0, 0.15);
            border-color: rgba(102, 126, 234, 0.3);
        }

        .logo10 img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
            transition: transform 0.3s ease;
        }

        .logo10:hover img {
            transform: scale(1.05);
        }

        .sparkle10 {
            position: absolute;
            width: 8px;
            height: 8px;
            background: radial-gradient(circle, #ffd700, #ffed4e);
            border-radius: 50%;
            animation: sparkle10 2s ease-in-out infinite;
            opacity: 0;
        }

        @keyframes smoothScroll10 {
            0% {
                transform: translateX(0);
            }

            100% {
                /* Move exactly half the width to create seamless loop */
                transform: translateX(calc(-50% + 40px));
            }
        }

        @keyframes sparkle10 {

            0%,
            100% {
                opacity: 0;
                transform: scale(0.5);
            }

            50% {
                opacity: 1;
                transform: scale(1.2);
            }
        }

        /* Pause animation on hover */
        .logo-scroller10:hover .logo-track10 {
            animation-play-state: paused;
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .logo-scroller10 {
                padding: 40px 0;
            }

            .logo-track10 {
                gap: 60px;
                animation-duration: 35s;
            }

            .logo-item10 {
                min-width: 140px;
                width: 140px;
                height: 100px;
            }

            .logo10 {
                width: 120px;
                height: 80px;
                padding: 8px;
            }

            .logo-scroller10::before,
            .logo-scroller10::after {
                width: 100px;
            }
        }

        @media (max-width: 480px) {
            .logo-track10 {
                gap: 40px;
                animation-duration: 30s;
            }

            .logo-item10 {
                min-width: 120px;
                width: 120px;
                height: 80px;
            }

            .logo10 {
                width: 100px;
                height: 60px;
                padding: 5px;
            }
        }

        /* Additional styling for demo purposes */
        .container10 {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .title10 {
            text-align: center;
            color: white;
            margin-bottom: 40px;
            font-size: 2.5rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .subtitle10 {
            text-align: center;
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 60px;
            font-size: 1.2rem;
        }
    </style>


</head>

<body>
    <header id="header" class="header ">
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

                        <!-- </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./callforpaper.php" aria-label="Call for Papers">
                                <i class="bi bi-journal-text"></i>
                                CALL FOR PAPER
                            </a>
                        </li> -->
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


    <!-- Hero Banner Section -->
    <section class="hero-area position-relative overflow-hidden">
        <div class="hero-background">
            <img src="images/banner1.jpg" class="img-fluid w-100 h-100 position-absolute top-0 start-0"
                style="object-fit: cover; z-index: -1;" alt="Conference Banner">
            <div class="hero-overlay position-absolute top-0 start-0 w-100 h-100"
                style="background: linear-gradient(185deg, rgba(209, 176, 218, 0.685), rgba(27, 7, 29, 0.692)); z-index: 1;">
            </div>
        </div>

        <div class="container-fluid position-relative"
            style="z-index: 2; min-height: 100vh; display: flex; align-items: center;">
            <div class="row w-100 justify-content-center text-center textColour">
                <div class="col-lg-10 col-xl-8">
                    <div class="hero-content animate__animated animate__fadeInUp">
                        <div class="conference-badge mb-4">
                            <span class="badge px-4 py-2 rounded-pill fs-6 fw-bold">
                                <i class="bi bi-calendar-event me-2"></i>30-31 October 2025
                            </span>
                        </div>
                        <div class="bgNew">

                            <h1 class="display-3 fw-bold  text-shadow">
                                UPWIECON 2025
                            </h1>
                        </div>

                        <div class="hero-subtitle mb-5">
                            <h2 class="h3 fw-light mb-3">
                                1<sup>st</sup> IEEE Uttar Pradesh Section Women in Engineering
                            </h2>
                            <h3 class="h4 fw-normal">
                                International Conference on Electrical Electronics and Computer Engineering
                            </h3>
                        </div>

                        <div class="hero-highlights mb-5">
                            <div class="row g-4 justify-content-center">
                                <div class="col-md-4">
                                    <div class="highlight-card  backdrop-blur rounded-4 p-4 h-100">
                                        <i class="bi bi-award display-6 text-warning mb-3"></i>
                                        <h5 class="fw-bold">IEEE Xplore</h5>
                                        <p class="mb-0 small">All accepted papers will be submitted to IEEE Xplore
                                            Digital Library</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="highlight-card  backdrop-blur rounded-4 p-4 h-100">
                                        <i class="bi bi-people display-6 text-success mb-3"></i>
                                        <h5 class="fw-bold">Women in Engineering</h5>
                                        <p class="mb-0 small">Empowering women in STEM through networking and
                                            collaboration</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="highlight-card  backdrop-blur rounded-4 p-4 h-100">
                                        <i class="bi bi-globe display-6 text-info mb-3"></i>
                                        <h5 class="fw-bold">Global Platform</h5>
                                        <p class="mb-0 small">International conference bringing together researchers
                                            worldwide</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="hero-actions pb-2">
                            <a href="registration.php"
                                class="btn btn-warning btn-lg me-3 px-5 py-3 rounded-pill fw-bold">
                                <i class="bi bi-person-plus me-2"></i>Register Now
                            </a>
                            <a href="callforpaper.php" class="btn btn-light btn-lg px-5 py-3 rounded-pill fw-bold">
                                <i class="bi bi-file-earmark-text me-2"></i>Submit Paper
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Animated scroll indicator -->
        <div
            class="scroll-indicator position-absolute bottom-0 start-50 translate-middle-x mb-4 text-white text-center">
            <div class="animate-bounce">
                <i class="bi bi-chevron-down fs-3"></i>
            </div>
        </div>





    </section>

    <!-- About Section -->
    <section class="about-section py-5" style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);">
        <div class="container">
            <!-- About UPWIECON -->
            <div class="row mb-5">
                <div class="col-lg-12">
                    <div class="section-header text-center mb-5">
                        <h2 class="display-5 fw-bold newText mb-3">About UPWIECON 2025</h2>
                        <div class="section-divider mx-auto mb-4"
                            style="width: 100px; height: 4px; background: linear-gradient(45deg, #007bff, #0056b3); border-radius: 2px;">
                        </div>
                    </div>

                    <div class="about-card bg-white rounded-4 shadow-lg p-5 mb-5">
                        <div class="row align-items-center">
                            <div class="col-lg-8">
                                <p class="lead text-muted mb-4" style="text-align: justify; text-justify: inter-word;">
                                    The IEEE Uttar Pradesh Section Women in Engineering International Conference on
                                    Electrical Electronics and Computer Engineering
                                    <strong class="newText">(UPWIECON 2025)</strong> is a top-level International
                                    Conference covering broad topics in the areas of Electrical, Computer and
                                    Electronics Engineering.
                                </p>
                                <p class="text-muted" style="text-align: justify; text-justify: inter-word;">
                                    Organized by NIELIT Dehradun, India, <strong>UPWIECON</strong> is the flagship
                                    Conference of IEEE UP Section WIE Affinity Group, providing an excellent platform
                                    for researchers to present their work and connect with the global research
                                    community.
                                </p>
                            </div>
                            <div class="col-lg-4 text-center">
                                <div class="about-stats">
                                    <div class="stat-item mb-3">
                                        <h3 class="display-6 fw-bold newText">1<sup>st</sup></h3>
                                        <p class="text-muted mb-0">IEEE UP Section WIE Conference</p>
                                    </div>
                                    <div class="stat-item">
                                        <h3 class="display-6 fw-bold text-success">Global</h3>
                                        <p class="text-muted mb-0">Research Platform</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- About IEEE UP Section -->
            <div class="row mb-5">
                <div class="col-lg-12">
                    <div class="section-header mb-4">
                        <h3 class="h2 fw-bold newText mb-3">About IEEE UP Section</h3>
                    </div>

                    <div class="ieee-section-card newBg bg-gradient text-white rounded-4 p-5">
                        <div class="row align-items-center">
                            <div class="col-lg-3 text-center mb-4 mb-lg-0">
                                <div class="ieee-badge bg-white newText rounded-circle d-inline-flex align-items-center justify-content-center"
                                    style="width: 120px; height: 120px;">
                                    <div class="text-center">
                                        <div class="fw-bold h4 mb-0">1992</div>
                                        <small>Est.</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <p class="mb-3">
                                    Uttar Pradesh Section is located in Region 10 and is represented at the India
                                    Council. The Section was formed on 11 May 1992, having previously been a sub-section
                                    under the Delhi Section since 28 December 1970.
                                </p>
                                <p class="mb-0">
                                    IEEE UP Section interfaces with industries and academia through various technical
                                    and humanitarian activities, organizing events throughout the year to foster
                                    innovation and collaboration.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Objectives -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-header mb-4">
                        <h3 class="h2 fw-bold newText mb-3">Conference Objectives</h3>
                    </div>

                    <div class="objectives-intro bg-white rounded-4 shadow-lg p-5 mb-4">
                        <p class="lead text-muted text-center">
                            IEEE Uttar Pradesh Section Women in Engineering International Conference aims to bring
                            together research scholars, practicing scientists, and industrialists from across the world,
                            especially empowering women in engineering domains.
                        </p>
                    </div>

                    <div class="row g-4">
                        <div class="col-lg-6">
                            <div class="objective-card bg-white rounded-4 shadow-lg p-4 h-100">
                                <div class="objective-icon newText mb-3">
                                    <i class="bi bi-people-fill display-5"></i>
                                </div>
                                <h5 class="fw-bold newText mb-3">Networking Opportunities for Women</h5>
                                <p class="text-muted mb-0">Bringing together professionals from diverse backgrounds,
                                    providing ample opportunities for networking and collaboration in the engineering
                                    community.</p>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="objective-card bg-white rounded-4 shadow-lg p-4 h-100">
                                <div class="objective-icon text-success mb-3">
                                    <i class="bi bi-lightbulb-fill display-5"></i>
                                </div>
                                <h5 class="fw-bold text-success mb-3">Knowledge Sharing</h5>
                                <p class="text-muted mb-0">Invited talks from eminent personalities across the globe
                                    offering valuable insights into the latest advancements in engineering fields.</p>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="objective-card bg-white rounded-4 shadow-lg p-4 h-100">
                                <div class="objective-icon text-warning mb-3">
                                    <i class="bi bi-trophy-fill display-5"></i>
                                </div>
                                <h5 class="fw-bold text-warning mb-3">Professional Development</h5>
                                <p class="text-muted mb-0">Pre-conference tutorials and workshops providing attendees
                                    with opportunities to enhance their skills and knowledge in cutting-edge
                                    technologies.</p>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="objective-card bg-white rounded-4 shadow-lg p-4 h-100">
                                <div class="objective-icon text-info mb-3">
                                    <i class="bi bi-presentation display-5"></i>
                                </div>
                                <h5 class="fw-bold text-info mb-3">Research Presentation</h5>
                                <p class="text-muted mb-0">Featured referred paper presentations by female presenters,
                                    allowing participants to share research findings with a global audience of experts.
                                </p>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="objective-card bg-gradient text-white rounded-4 shadow-lg p-4"
                                style="background: linear-gradient(135deg, #6f42c1, #5a2d8f) !important;">
                                <div class="objective-icon text-warning mb-3">
                                    <i class="bi bi-heart-fill display-5"></i>
                                </div>
                                <h5 class="fw-bold text-warning mb-3">Empowerment in Social and Personal Roles</h5>
                                <p class="mb-0">The conference inspires women to embrace their independence,
                                    assertiveness, and leadership in both their personal lives and within their
                                    communities, fostering a culture of empowerment and inclusion.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="">
            <!-- <h2 class="title10">Our Partners & Sponsors</h2> -->
            <p class="subtitle10">Trusted by leading organizations worldwide</p>

            <div class="logo-scroller10">
                <div class="logo-track10">
                    <!-- First set of logos -->
                    <div class="logo-item10">
                        <div class="logo10">
                            <img src="./images/1.png" alt="Partner 1">
                        </div>
                        <div class="sparkle10" style="top: 20%; left: 20%; animation-delay: 0s;"></div>
                    </div>

                    <div class="logo-item10">
                        <div class="logo10">
                            <img src="./images/2.png" alt="Partner 2">
                        </div>
                        <div class="sparkle10" style="top: 70%; right: 20%; animation-delay: 0.5s;"></div>
                    </div>

                    <div class="logo-item10">
                        <div class="logo10">
                            <img src="./images/3.png" alt="Partner 3">
                        </div>
                        <div class="sparkle10" style="top: 30%; left: 70%; animation-delay: 1s;"></div>
                    </div>

                    <div class="logo-item10">
                        <div class="logo10">
                            <img src="./images/4.png" alt="Partner 4">
                        </div>
                        <div class="sparkle10" style="top: 80%; left: 30%; animation-delay: 1.5s;"></div>
                    </div>

                    <div class="logo-item10">
                        <div class="logo10">
                            <img src="./images/5.png" alt="Partner 5">
                        </div>
                        <div class="sparkle10" style="top: 40%; right: 30%; animation-delay: 2s;"></div>
                    </div>

                    <div class="logo-item10">
                        <div class="logo10">
                            <img src="./images/6.png" alt="Partner 6">
                        </div>
                        <div class="sparkle10" style="top: 60%; left: 50%; animation-delay: 0.3s;"></div>
                    </div>

                    <div class="logo-item10">
                        <div class="logo10">
                            <img src="./images/7.png" alt="Partner 7">
                        </div>
                        <div class="sparkle10" style="top: 25%; right: 40%; animation-delay: 0.8s;"></div>
                    </div>

                    <div class="logo-item10">
                        <div class="logo10">
                            <img src="./images/8.png" alt="Partner 8">
                        </div>
                        <div class="sparkle10" style="top: 75%; left: 60%; animation-delay: 1.3s;"></div>
                    </div>

                    <div class="logo-item10">
                        <div class="logo10">
                            <img src="./images/9.png" alt="Partner 9">
                        </div>
                        <div class="sparkle10" style="top: 35%; right: 25%; animation-delay: 1.8s;"></div>
                    </div>

                    <div class="logo-item10">
                        <div class="logo10">
                            <img src="./images/10.png" alt="Partner 10">
                        </div>
                        <div class="sparkle10" style="top: 55%; left: 40%; animation-delay: 2.3s;"></div>
                    </div>

                    <div class="logo-item10">
                        <div class="logo10">
                            <img src="./images/11.jpg" alt="Partner 11">
                        </div>
                        <div class="sparkle10" style="top: 45%; right: 60%; animation-delay: 0.7s;"></div>
                    </div>

                    <div class="logo-item10">
                        <div class="logo10">
                            <img src="./images/12.png" alt="Partner 12">
                        </div>
                        <div class="sparkle10" style="top: 65%; left: 25%; animation-delay: 1.2s;"></div>
                    </div>

                    <div class="logo-item10">
                        <div class="logo10">
                            <img src="./images/13.png" alt="Partner 13">
                        </div>
                        <div class="sparkle10" style="top: 30%; right: 50%; animation-delay: 1.7s;"></div>
                    </div>

                    <div class="logo-item10">
                        <div class="logo10">
                            <img src="./images/14.png" alt="Partner 14">
                        </div>
                        <div class="sparkle10" style="top: 70%; left: 45%; animation-delay: 2.2s;"></div>
                    </div>

                    <div class="logo-item10">
                        <div class="logo10">
                            <img src="./images/15.png" alt="Partner 15">
                        </div>
                        <div class="sparkle10" style="top: 50%; right: 35%; animation-delay: 0.4s;"></div>
                    </div>

                    <div class="logo-item10">
                        <div class="logo10">
                            <img src="./images/12.jpeg" alt="Partner 16">
                        </div>
                        <div class="sparkle10" style="top: 40%; left: 55%; animation-delay: 0.9s;"></div>
                    </div>

                    <!-- EXACT DUPLICATE SET for seamless loop -->
                    <div class="logo-item10">
                        <div class="logo10">
                            <img src="./images/1.png" alt="Partner 1">
                        </div>
                        <div class="sparkle10" style="top: 20%; left: 20%; animation-delay: 0s;"></div>
                    </div>

                    <div class="logo-item10">
                        <div class="logo10">
                            <img src="./images/2.png" alt="Partner 2">
                        </div>
                        <div class="sparkle10" style="top: 70%; right: 20%; animation-delay: 0.5s;"></div>
                    </div>

                    <div class="logo-item10">
                        <div class="logo10">
                            <img src="./images/3.png" alt="Partner 3">
                        </div>
                        <div class="sparkle10" style="top: 30%; left: 70%; animation-delay: 1s;"></div>
                    </div>

                    <div class="logo-item10">
                        <div class="logo10">
                            <img src="./images/4.png" alt="Partner 4">
                        </div>
                        <div class="sparkle10" style="top: 80%; left: 30%; animation-delay: 1.5s;"></div>
                    </div>

                    <div class="logo-item10">
                        <div class="logo10">
                            <img src="./images/5.png" alt="Partner 5">
                        </div>
                        <div class="sparkle10" style="top: 40%; right: 30%; animation-delay: 2s;"></div>
                    </div>

                    <div class="logo-item10">
                        <div class="logo10">
                            <img src="./images/6.png" alt="Partner 6">
                        </div>
                        <div class="sparkle10" style="top: 60%; left: 50%; animation-delay: 0.3s;"></div>
                    </div>

                    <div class="logo-item10">
                        <div class="logo10">
                            <img src="./images/7.png" alt="Partner 7">
                        </div>
                        <div class="sparkle10" style="top: 25%; right: 40%; animation-delay: 0.8s;"></div>
                    </div>

                    <div class="logo-item10">
                        <div class="logo10">
                            <img src="./images/8.png" alt="Partner 8">
                        </div>
                        <div class="sparkle10" style="top: 75%; left: 60%; animation-delay: 1.3s;"></div>
                    </div>

                    <div class="logo-item10">
                        <div class="logo10">
                            <img src="./images/9.png" alt="Partner 9">
                        </div>
                        <div class="sparkle10" style="top: 35%; right: 25%; animation-delay: 1.8s;"></div>
                    </div>

                    <div class="logo-item10">
                        <div class="logo10">
                            <img src="./images/10.png" alt="Partner 10">
                        </div>
                        <div class="sparkle10" style="top: 55%; left: 40%; animation-delay: 2.3s;"></div>
                    </div>

                    <div class="logo-item10">
                        <div class="logo10">
                            <img src="./images/11.jpg" alt="Partner 11">
                        </div>
                        <div class="sparkle10" style="top: 45%; right: 60%; animation-delay: 0.7s;"></div>
                    </div>

                    <div class="logo-item10">
                        <div class="logo10">
                            <img src="./images/12.png" alt="Partner 12">
                        </div>
                        <div class="sparkle10" style="top: 65%; left: 25%; animation-delay: 1.2s;"></div>
                    </div>

                    <div class="logo-item10">
                        <div class="logo10">
                            <img src="./images/13.png" alt="Partner 13">
                        </div>
                        <div class="sparkle10" style="top: 30%; right: 50%; animation-delay: 1.7s;"></div>
                    </div>

                    <div class="logo-item10">
                        <div class="logo10">
                            <img src="./images/14.png" alt="Partner 14">
                        </div>
                        <div class="sparkle10" style="top: 70%; left: 45%; animation-delay: 2.2s;"></div>
                    </div>

                    <div class="logo-item10">
                        <div class="logo10">
                            <img src="./images/15.png" alt="Partner 15">
                        </div>
                        <div class="sparkle10" style="top: 50%; right: 35%; animation-delay: 0.4s;"></div>
                    </div>

                    <div class="logo-item10">
                        <div class="logo10">
                            <img src="./images/12.jpeg" alt="Partner 16">
                        </div>
                        <div class="sparkle10" style="top: 40%; left: 55%; animation-delay: 0.9s;"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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


</body>

</html>

HTML

?>