<?php
include 'header.php';
?>

<style>
    .textCenter {
        text-align: justify;
    }

    .hide-ieee,
    #ieee-header-logo {
        display: none !important;
    }

    /* .venue-section {
            background-image: url("images/caption.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            z-index: 10;
        } */

    .newText {
        color: var(--primary-blue);
    }

    .newBg {
        background-color: var(--primary-blue);
    }

    .btnNew {
        background: var(--gradient-pink-blue);
        color: white;
        border: none;
    }

    .header.scrolled {
        background: rgba(255, 255, 255, 0.99);
        box-shadow: 0 8px 40px rgba(255, 45, 149, 0.1);
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
        /* background: #d0a8d3; */
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
        border: 1px solid rgba(255, 45, 149, 0.2);
        background: var(--gradient-pink-blue);
        color: #ffffff;
        border-radius: 20px;
    }

    .highlight-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border: 1px solid rgba(0, 180, 216, 0.2);
        background: white;
        color: var(--text-dark);
    }

    .highlight-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0, 180, 216, 0.2);
        border-color: var(--primary-blue);
    }

    .highlight-cardf {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border: 1px solid rgba(255, 45, 149, 0.2);
        background: rgba(255, 255, 255, 0.9);
        color: var(--text-dark);
    }

    .highlight-cardf:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(255, 45, 149, 0.2);
        border-color: var(--primary-pink);
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
        border: 1px solid rgba(0, 180, 216, 0.1);
    }

    .about-card:hover,
    .objective-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 40px rgba(0, 180, 216, 0.15);
        border-color: var(--primary-blue);
    }

    .section-divider {
        height: 4px;
        background: var(--gradient-pink-blue);
        width: 80px;
        margin: 1rem auto;
        border-radius: 2px;
        transition: transform 0.3s ease;
    }

    .section-header:hover .section-divider {
        transform: scaleX(1.5);
    }

    /* Date cards hover effect */
    /* .date-card {
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.2);
            background: rgba(255, 255, 255, 0.1) !important;
        } */

    .date-card:hover {
        transform: translateY(-3px);
        background: rgba(255, 255, 255, 0.3) !important;
        border-color: var(--primary-pink);
    }

    /* IEEE section card */
    .ieee-badge {
        transition: transform 0.3s ease;
    }

    .badge {
        background: var(--gradient-pink-blue);
    }

    .ieee-section-card:hover .ieee-badge {
        transform: rotate(5deg) scale(1.1);
    }

    /* Back to top button */
    #backToTop {
        transition: all 0.3s ease;
        background: var(--primary-pink);
        color: white;
    }

    #backToTop:hover {
        transform: scale(1.1);
        background: var(--primary-blue);
    }

    /* Conference date highlight animation */
    .conference-date-highlight {
        animation: pulse3s 3s infinite;
    }

    @keyframes pulse3s {
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
        background: linear-gradient(90deg, transparent, rgba(255, 45, 149, 0.1), transparent);
        transition: left 0.5s;
    }

    .nav-link:hover::before {
        left: 100%;
    }

    body47 {
        font-family: 'Segoe UI', sans-serif;
        background: linear-gradient(135deg, var(--light-blue) 0%, #ffffff 50%, #f8f9fa 100%);
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
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.05);
    }

    .logo-scroller47 {
        overflow: hidden;
        background: white;
        border-radius: 20px;
        box-shadow: 0 20px 40px rgba(0, 180, 216, 0.1);
        position: relative;
        border: 1px solid rgba(0, 180, 216, 0.1);
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
        background: linear-gradient(90deg, white, transparent);
    }

    .logo-scroller47::after {
        right: 0;
        background: linear-gradient(270deg, white, transparent);
    }

    .logo-track47 {
        display: flex;
        animation: scroll 25s linear infinite;
        width: fit-content;
    }

    .logo-item47 {
        flex: 0 0 300px;
        height: 120px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 20px;
        background: #fff;
        border-radius: 15px;
        border: 1px solid rgba(255, 45, 149, 0.1);
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
        background: linear-gradient(90deg, transparent, var(--primary-pink), transparent);
        opacity: 0.7;
        transition: left 2s ease;
    }

    .logo-item47:hover::before {
        left: 100%;
    }

    .logo-item47:hover {
        transform: translateY(-5px) scale(1.05);
        box-shadow: 0 15px 30px rgba(255, 45, 149, 0.2);
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
        background: var(--primary-pink);
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
        background: rgba(255, 255, 255, 0.05);
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
        background: linear-gradient(to right, white, transparent);
    }

    .logo-scroller10::after {
        right: 0;
        background: linear-gradient(to left, white, transparent);
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
        filter: drop-shadow(0 10px 20px rgba(255, 45, 149, 0.2));
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
        box-shadow: 0 12px 48px rgba(255, 45, 149, 0.15);
        border-color: var(--primary-pink);
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

    .body100 {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(135deg, var(--light-blue) 0%, #ffffff 50%, #f8f9fa 100%);
        color: var(--text-dark);
        line-height: 1.6;
    }

    /* Animated background particles */
    .background-animation100::before {
        content: '';
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="dots" width="20" height="20" patternUnits="userSpaceOnUse"><circle cx="3" cy="3" r="1" fill="rgba(91,2,109,0.1)"/></pattern></defs><rect width="100" height="100" fill="url(%23dots)" /></svg>');
        animation: backgroundMove100 25s linear infinite;
        opacity: 0.3;
        z-index: -1;
    }

    @keyframes backgroundMove100 {
        0% {
            transform: translateX(0) translateY(0);
        }

        100% {
            transform: translateX(-20px) translateY(-20px);
        }
    }

    .hero-content100 {
        position: relative;
        z-index: 2;
        animation: fadeInUp100 1s ease-out;
    }

    .subtitle100 {
        font-size: 1.4rem;
        opacity: 0.9;
        margin-bottom: 2rem;
    }

    .conference-badge100 {
        background: var(--gold);
        color: white;
        padding: 0.8rem 1.5rem;
        border-radius: 25px;
        font-weight: bold;
        display: inline-block;
        animation: pulse100 2s infinite;
    }

    @keyframes pulse100 {

        0%,
        100% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.05);
        }
    }

    .section100 {
        padding: 4rem 0;
        position: relative;
    }

    .section-title100 {
        font-size: 2.5rem;
        font-weight: bold;
        color: var(--primary-blue);
        margin-bottom: 3rem;
        text-align: center;
        position: relative;
    }

    .section-title100::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 4px;
        background: linear-gradient(90deg, var(--gold), var(--accent-blue));
        border-radius: 2px;
    }

    .card100 {
        background: rgba(255, 255, 255, 0.95);
        border-radius: 20px;
        padding: 2rem;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
        border: 3px solid transparent;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        height: 100%;
        position: relative;
        overflow: hidden;
    }

    .card100::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 5px;
        background: linear-gradient(90deg, var(--primary-blue), var(--gold), var(--accent-blue));
    }

    .card100:hover {
        transform: translateY(-10px);
        box-shadow: 0 25px 60px rgba(0, 0, 0, 0.15);
        border-color: var(--gold);
    }

    .objectives-grid100 {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
        margin-top: 3rem;
    }

    .objective-card100 {
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.9), rgba(232, 217, 235, 0.3));
        border-radius: 15px;
        padding: 2rem;
        text-align: center;
        border: 2px solid var(--light-blue);
        transition: all 0.3s ease;
        animation: slideInUp100 0.6s ease-out;
    }

    .objective-card100:hover {
        transform: translateY(-5px);
        border-color: var(--gold);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
    }

    @keyframes slideInUp100 {
        from {
            opacity: 0;
            transform: translateY(30px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .sdg-grid100 {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 1.5rem;
        margin-top: 2rem;
    }

    .sdg-card100 {
        background: linear-gradient(135deg, var(--light-blue), rgba(255, 255, 255, 0.8));
        border-radius: 12px;
        padding: 1.5rem;
        border-left: 5px solid var(--gold);
        transition: all 0.3s ease;
        animation: fadeInLeft100 0.8s ease-out;
    }

    .sdg-card100:hover {
        transform: translateX(10px);
        background: rgba(255, 255, 255, 0.95);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }

    @keyframes fadeInLeft100 {
        from {
            opacity: 0;
            transform: translateX(-30px);
        }

        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    .sdg-number100 {
        background: var(--accent-blue);
        color: white;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        margin-bottom: 1rem;
    }

    .timeline100 {
        position: relative;
        padding: 2rem 0;
    }

    .timeline100::before {
        content: '';
        position: absolute;
        left: 50%;
        top: 0;
        bottom: 0;
        width: 4px;
        background: linear-gradient(180deg, var(--primary-blue), var(--gold), var(--accent-blue));
        transform: translateX(-50%);
    }

    .timeline-item100 {
        position: relative;
        margin-bottom: 3rem;
        animation: fadeInTimeline100 0.8s ease-out;
    }

    @keyframes fadeInTimeline100 {
        from {
            opacity: 0;
            transform: scale(0.8);
        }

        to {
            opacity: 1;
            transform: scale(1);
        }
    }

    .timeline-item100:nth-child(odd) .timeline-content100 {
        margin-right: 55%;
        text-align: right;
    }

    .timeline-item100:nth-child(even) .timeline-content100 {
        margin-left: 55%;
        text-align: left;
    }

    .timeline-content100 {
        background: rgba(255, 255, 255, 0.95);
        padding: 1.5rem;
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        position: relative;
        transition: all 0.3s ease;
    }

    .timeline-content100:hover {
        transform: scale(1.02);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
    }

    .timeline-date100 {
        background: var(--gold);
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 20px;
        font-weight: bold;
        display: inline-block;
        margin-bottom: 0.5rem;
    }

    .awards-section100 {
        background: linear-gradient(135deg, rgba(243, 156, 18, 0.1), rgba(91, 2, 109, 0.1));
        border-radius: 20px;
        padding: 3rem;
        margin: 3rem 0;
    }

    .award-item100 {
        background: rgba(255, 255, 255, 0.9);
        border-radius: 12px;
        padding: 1.5rem;
        margin-bottom: 1rem;
        border-left: 5px solid var(--gold);
        transition: all 0.3s ease;
    }

    .award-item100:hover {
        transform: translateX(10px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
    }

    .contact-card100 {
        background: linear-gradient(135deg, var(--primary-blue), var(--accent-blue));
        color: white;
        border-radius: 20px;
        padding: 2rem;
        text-align: center;
        margin-top: 3rem;
    }

    .contact-person100 {
        background: rgba(255, 255, 255, 0.1);
        border-radius: 12px;
        padding: 1.5rem;
        margin: 1rem;
        transition: all 0.3s ease;
    }

    .contact-person100:hover {
        background: rgba(255, 255, 255, 0.2);
        transform: translateY(-5px);
    }

    .btn-primary100 {
        background: linear-gradient(135deg, var(--gold), #e67e22);
        border: none;
        padding: 1rem 2rem;
        border-radius: 25px;
        font-weight: bold;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-block;
        color: white;
    }

    .btn-primary100:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(243, 156, 18, 0.4);
        color: white;
    }

    .highlight100 {
        background: var(--gold);
        color: white;
        padding: 0.2rem 0.5rem;
        border-radius: 5px;
        font-weight: bold;
    }

    .icon100 {
        color: var(--accent-blue);
        font-size: 2rem;
        margin-bottom: 1rem;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .main-title100 {
            font-size: 2.5rem;
        }

        .timeline100::before {
            left: 30px;
        }

        .timeline-item100:nth-child(odd) .timeline-content100,
        .timeline-item100:nth-child(even) .timeline-content100 {
            margin-left: 60px;
            margin-right: 0;
            text-align: left;
        }
    }

    /* Scroll animations */
    .animate-on-scroll100 {
        opacity: 0;
        transform: translateY(30px);
        transition: all 0.6s ease;
    }

    .animate-on-scroll100.animated100 {
        opacity: 1;
        transform: translateY(0);
    }

    .sponsor-compact {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 1.5rem;
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(15px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 50px;
        padding: 1rem 2rem;
        padding-top: 20px;
        margin-top: 100px;
        max-width: 600px;
        margin: 0 auto;
        transition: all 0.3s ease;
    }

    .sponsor-compact:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    }

    .sponsor-label {
        font-size: clamp(1rem, 2.5vw, 1.3rem);
        font-weight: 600;
        color: #ffffff;
        text-shadow: 1px 2px 4px rgba(0, 0, 0, 0.3);
        white-space: nowrap;
    }

    .sponsor-logo-wrapper {
        background: rgba(255, 255, 255, 0.9);
        border-radius: 10px;
        padding: 0.1rem 0.1rem;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .sponsor-img {
        height: 150px;
        width: auto;
        max-width: 350px;
        object-fit: contain;
        padding: 5px;
    }

    @media (max-width: 480px) {
        .sponsor-compact {
            flex-direction: column;
            gap: 1rem;
            padding: 1.5rem;
            border-radius: 20px;
        }

        .sponsor-img {
            height: 95px;
            max-width: 400px;
        }
    }
</style>


<!-- content start here -->

<!-- Hero Section -->
<section class="committee-hero">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="display-4 fw-bold mb-3">
                    <i class="fas fa-rocket me-3"></i>
                    InnovateHer-2026
                </h1>
                <h2 class="h3 mb-3">STAR Project Competition - Empowering Girls Through Innovation for a Sustainable
                    Future</h2>
                <div class="conference-badge100">
                    <i class="bi bi-calendar-event me-2"></i>
                    Will be Hosted during UPWIECON 2026 | Noida, India
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section100">

    <div>
        <div class="text-center py-5">
            <i class="bi bi-calendar-event fa-4x mb-4" style="color: var(--primary-blue);"></i>
            <!-- <h3 class="pdf-title mb-3">Conference Schedule</h3> -->
            <p class="pdf-description fs-5">
                <i class="bi bi-clock-history me-2"></i>
                <strong>Will be available soon</strong>
            </p>
            <div class="d-flex justify-content-center align-items-center mt-4">
                <div class="spinner-grow me-3" style="color: var(--accent-blue);" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <span style="color: var(--text-dark);">Stay tuned for updates</span>
            </div>
        </div>
    </div>
</section>
<div style='display:none'>
    <!-- About Section -->
    <section class="section100">
        <div class="container">
            <h2 class="section-title100 ">About the Competition</h2>
            <div class="card100 ">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <p class="lead textCenter">"InnovateHer-2026" is a STEM innovation competition organized
                            under the <span class="hide-ieee">IEEE</span> Student-Teacher and Research
                            Engineer/Scientist (STAR) Program, aligned
                            with the <span class="hide-ieee">IEEE</span> UP Section WiE Affinity Group's mission to
                            inspire the next generation of
                            girls in STEM.</p>
                        <p class="textCenter">This unique initiative provides a platform for schoolgirls from Uttar
                            Pradesh and Uttarakhand to showcase their creativity and problem-solving abilities
                            through STEM-based projects focused on the United Nations Sustainable Development Goals
                            (UN SDGs).</p>
                    </div>
                    <div class="col-md-4 text-center">
                        <i class="bi bi-lightbulb icon100"></i>
                        <h4 class="text-primary">Innovation Meets Impact</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Objectives Section -->
    <section class="section100" style="background: rgba(232, 217, 235, 0.3);">
        <div class="container">
            <h2 class="section-title100 animate-on-scroll100">Objectives</h2>
            <div class="objectives-grid100">
                <div class="objective-card100 animate-on-scroll100">
                    <i class="bi bi-people icon100"></i>
                    <h4>Promote Girls' Participation</h4>
                    <p>Engage girls in real-world problem-solving activities through STEM education and practical
                        applications.</p>
                </div>
                <div class="objective-card100 animate-on-scroll100">
                    <i class="bi bi-globe icon100"></i>
                    <h4>UN SDG Alignment</h4>
                    <p>Encourage development of STEM-based projects that address key UN Sustainable Development
                        Goals.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- SDG Focus Areas -->
    <section class="section100">
        <div class="container">
            <h2 class="section-title100 animate-on-scroll100">UN Sustainable Development Goals Focus</h2>
            <div class="sdg-grid100">
                <div class="sdg-card100 animate-on-scroll100">
                    <div class="sdg-number100">3</div>
                    <h5><span class="highlight100">Good Health and Well-being</span></h5>
                    <p>Projects promoting health tech, hygiene, mental health, or well-being.</p>
                </div>
                <div class="sdg-card100 animate-on-scroll100">
                    <div class="sdg-number100">4</div>
                    <h5><span class="highlight100">Quality Education</span></h5>
                    <p>Ideas to improve learning accessibility, inclusive education, or e-learning tools.</p>
                </div>
                <div class="sdg-card100 animate-on-scroll100">
                    <div class="sdg-number100">6</div>
                    <h5><span class="highlight100">Clean Water and Sanitation</span></h5>
                    <p>Innovations for water purification, waste reduction, and hygiene solutions.</p>
                </div>
                <div class="sdg-card100 animate-on-scroll100">
                    <div class="sdg-number100">7</div>
                    <h5><span class="highlight100">Affordable and Clean Energy</span></h5>
                    <p>Projects focused on renewable energy, energy-saving, or clean tech.</p>
                </div>
                <div class="sdg-card100 animate-on-scroll100">
                    <div class="sdg-number100">11</div>
                    <h5><span class="highlight100">Sustainable Cities and Communities</span></h5>
                    <p>Ideas related to smart cities, mobility, safety, or green infrastructure.</p>
                </div>
                <div class="sdg-card100 animate-on-scroll100">
                    <div class="sdg-number100">12</div>
                    <h5><span class="highlight100">Responsible Consumption and Production</span></h5>
                    <p>Projects encouraging recycling, upcycling, or sustainable practices.</p>
                </div>
                <div class="sdg-card100 animate-on-scroll100">
                    <div class="sdg-number100">13</div>
                    <h5><span class="highlight100">Climate Action</span></h5>
                    <p>Technologies or campaigns addressing climate change and environmental issues.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Participation Details -->
    <section class="section100" style="background: rgba(243, 156, 18, 0.05);">
        <div class="container">
            <h2 class="section-title100 animate-on-scroll100">Who Can Participate?</h2>
            <div class="row">
                <div class="col-md-6">
                    <div class="card100 animate-on-scroll100">
                        <h4><i class="bi bi-people-fill me-2" style="color: var(--accent-blue);"></i>Participants
                        </h4>
                        <p>Girls from <strong>Classes 8–12</strong> (Government and Private Schools in UP &
                            Uttarakhand)</p>

                        <h5 class="mt-3">Categories:</h5>
                        <ul class="list-unstyled">
                            <li><i class="bi bi-arrow-right text-primary me-2"></i><strong>Junior Group:</strong>
                                Classes 8–10</li>
                            <li><i class="bi bi-arrow-right text-primary me-2"></i><strong>Senior Group:</strong>
                                Classes 11–12</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card100 animate-on-scroll100">
                        <h4><i class="bi bi-gear-fill me-2" style="color: var(--gold);"></i>Team Requirements</h4>
                        <ul class="list-unstyled">
                            <li><i class="bi bi-check-circle text-success me-2"></i><strong>Team Size:</strong> 2–4
                                girl students + 1 mentor</li>
                            <li><i class="bi bi-check-circle text-success me-2"></i><strong>Mentor:</strong>
                                Science/Math/Tech Teacher</li>
                            <li><i class="bi bi-check-circle text-success me-2"></i><strong>Entry Limit:</strong> 1
                                team per school</li>
                            <li><i class="bi bi-check-circle text-success me-2"></i><strong>Submission:</strong> Via
                                school principal's official email only</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Competition Format -->
    <section class="section100">
        <div class="container">
            <h2 class="section-title100 animate-on-scroll100">Competition Format</h2>

            <!-- Stage 1 -->
            <div class="card100 animate-on-scroll100 mb-4">
                <h3 class="text-primary mb-3"><i class="bi bi-1-circle-fill me-2"></i>Stage 1: Registration &
                    Project Submission (Pre-Screening)</h3>

                <div class="row">
                    <div class="col-md-6">
                        <h5>Registration Requirements:</h5>
                        <ul>
                            <li>Team name</li>
                            <li>Project title</li>
                            <li>SDG Alignment</li>
                            <li>School details</li>
                            <li>Team member details (name, class, and ID card)</li>
                            <li>Mentor details along with ID Proof</li>
                            <li>Recommendation letter from School Principal</li>
                        </ul>

                        <!-- <a href="https://forms.gle/Z3XEPE8KNjrAgPZu7" target="_blank" class="btn-primary100">
                                <i class="bi bi-link-45deg me-2"></i>Register Now
                            </a> -->
                    </div>
                    <div class="col-md-6">
                        <h5>Submission Guidelines:</h5>
                        <ul>
                            <li>5-minute video + project report</li>
                            <li>Clearly define the problem and related SDG(s)</li>
                            <li>Explain the solution/model/project</li>
                            <li>Include visual demonstration of prototype</li>
                            <li>Highlight roles of each team member</li>
                        </ul>

                        <div class="alert alert-warning">
                            <strong><i class="bi bi-calendar-x me-2"></i>Submission Deadline:</strong> October
                            10<sup>th</sup>,
                            2026
                        </div>
                    </div>
                    <div class="flex">
                        <a href="https://forms.gle/Z3XEPE8KNjrAgPZu7" target="_blank" class="btn-primary100 m-2">
                            <i class="bi bi-link-45deg me-2"></i>Register Now
                        </a>
                        <a href="./Recommendation Letter Format for InnovateHer2026.docx" target="_blank"
                            class="btn-primary100 m-2" download>
                            <i class="bi bi-file-earmark-arrow-down"></i> Recommendation Letter Format
                        </a>
                    </div>



                </div>
            </div>

            <!-- Stage 2 -->
            <div class="card100 animate-on-scroll100">
                <h3 class="text-primary mb-3"><i class="bi bi-2-circle-fill me-2"></i>Stage 2: Final Presentation @
                    UPWIECON 2026</h3>
                <div class="row">
                    <div class="col-md-8">
                        <ul>
                            <li><strong>Top 3 teams</strong> from each category will be selected for the final round
                            </li>
                            <li>Teams will display and present their projects at <strong>UPWIECON2026</strong></li>
                            <li><strong>1 team from each category</strong> will be selected as winner</li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <div class="text-center p-3" style="background: var(--light-blue); border-radius: 12px;">
                            <h5><i class="bi bi-geo-alt-fill me-2"></i>Venue</h5>
                            <p><strong>Jaypee Residency Manor</strong><br>Mussoorie, Uttarakhand</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Timeline -->
    <section class="section100" style="background: rgba(232, 217, 235, 0.3);">
        <div class="container">
            <h2 class="section-title100 animate-on-scroll100">Timeline Snapshot</h2>
            <div class="timeline100">
                <div class="timeline-item100 animate-on-scroll100">
                    <div class="timeline-content100">
                        <div class="timeline-date100">15th June 2026</div>
                        <h5>Proposal Launch</h5>
                        <p>Official announcement and call for participation</p>
                    </div>
                </div>
                <div class="timeline-item100 animate-on-scroll100">
                    <div class="timeline-content100">
                        <div class="timeline-date100">15th July 2026</div>
                        <h5>School Outreach & Registrations</h5>
                        <p>Active outreach to schools and registration period begins</p>
                    </div>
                </div>
                <div class="timeline-item100 animate-on-scroll100">
                    <div class="timeline-content100">
                        <div class="timeline-date100">10th October 2026</div>
                        <h5>Video Submissions Deadline</h5>
                        <p>Final deadline for Stage 1 submissions</p>
                    </div>
                </div>
                <div class="timeline-item100 animate-on-scroll100">
                    <div class="timeline-content100">
                        <div class="timeline-date100">19th October 2026</div>
                        <h5>Jury Evaluation & Selection</h5>
                        <p>Expert panel evaluates and selects finalists</p>
                    </div>
                </div>
                <div class="timeline-item100 animate-on-scroll100">
                    <div class="timeline-content100">
                        <div class="timeline-date100">20th October 2026</div>
                        <h5>Finalist Announcement</h5>
                        <p>Selected teams are notified and announced</p>
                    </div>
                </div>
                <div class="timeline-item100 animate-on-scroll100">
                    <div class="timeline-content100">
                        <div class="timeline-date100">31st October 2026</div>
                        <h5>Project Display at UPWIECON2026</h5>
                        <p>Final presentations and winner selection</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Awards Section -->
    <section class="section100">
        <div class="container">
            <h2 class="section-title100 animate-on-scroll100">Awards & Recognition</h2>
            <div class="awards-section100 animate-on-scroll100">
                <div class="row">
                    <div class="col-md-4">
                        <!-- <div class="award-item100">
                                <h5><i class="bi bi-trophy-fill me-2" style="color: var(--gold);"></i>Finalist Teams
                                </h5>
                                <ul>
                                    <li>Certificates of Excellence</li>
                                    <li>IEEE-branded merchandise</li>
                                    <li>Trophy</li>
                                    <li>Interaction with Women Engineers & IEEE Professionals</li>
                                </ul>
                            </div> -->
                        <div class="award-item100">
                            <h5><i class="bi bi-trophy-fill me-2" style="color: var(--gold);"></i>Finalist Teams</h5>
                            <!-- Winning Rewards Section - Compact -->
                            <!-- <div class="award-item100"> -->


                            <!-- </div> -->


                            <ul>
                                <li>Certificates of Excellence</li>
                                <li><span class="hide-ieee">IEEE-</span>branded merchandise</li>
                                <li>Trophy</li>
                                <li>Interaction with Women Engineers & <span class="hide-ieee">IEEE</span> Professionals
                                </li>
                            </ul>
                            <h5><i class="bi bi-trophy-fill me-2" style="color: var(--gold);"></i>Winning Rewards</h5>
                            <div class="row g-2 mb-3">
                                <div class="col-4">
                                    <div class="badge bg-warning text-dark p-3 w-100">
                                        <div class="fw-bold">1st</div>
                                        <div>₹20,000</div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="badge bg-secondary p-3 w-100">
                                        <div class="fw-bold">2nd</div>
                                        <div>₹15,000</div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="badge p-3 w-100" style="background-color: #cd7f32; color: white;">
                                        <div class="fw-bold">3rd</div>
                                        <div>₹10,000</div>
                                    </div>
                                </div>
                            </div>
                            <div class="alert alert-info text-center mb-0">
                                <i class="bi bi-info-circle me-2"></i>
                                <strong>Both Categories:</strong>
                            </div>
                        </div>



                    </div>
                    <div class="col-md-4">
                        <div class="award-item100">
                            <h5><i class="bi bi-person-badge-fill me-2" style="color: var(--accent-blue);"></i>Mentors
                            </h5>
                            <ul>
                                <li>Certificate of Appreciation</li>
                                <li>Appreciation letter to School Principal</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="award-item100">
                            <h5><i class="bi bi-people-fill me-2" style="color: var(--primary-blue);"></i>All
                                Participants</h5>
                            <ul>
                                <li>E-certificates for participation</li>
                                <li>Social media acknowledgement on <span class="hide-ieee">IEEE</span> UP Section WiE
                                    Affinity Group</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call for Collaborators -->
    <section class="section100" style="background: rgba(243, 156, 18, 0.05);">
        <div class="container">
            <h2 class="section-title100 animate-on-scroll100">Call for Collaborators</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card100 animate-on-scroll100">
                        <i class="bi bi-people icon100"></i>
                        <h4><span class="hide-ieee">IEEE</span> Members & Reviewers</h4>
                        <p><span class="hide-ieee">IEEE</span> TryEngineering STEM Grant Reviewers & <span
                                class="hide-ieee">IEEE</span> UP Section Members to assist in outreach,
                            evaluation, and mentorship.</p>
                        <a href="https://forms.gle/LtBaSRXoXTW9w9Yd6" target="_blank" class="btn-primary100">
                            <i class="bi bi-link-45deg me-2"></i>Join as Evaluator
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card100 animate-on-scroll100">
                        <i class="bi bi-building icon100"></i>
                        <h4>School Authorities</h4>
                        <p>Encourage participation and mentor nominations from your institution.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card100 animate-on-scroll100">
                        <i class="bi bi-heart icon100"></i>
                        <h4>Sponsors</h4>
                        <p>Support travel, prizes, and logistics for finalists to make this event successful.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="section100">
        <div class="container">
            <div class="contact-card100 animate-on-scroll100">
                <h2 class="mb-4"><i class="bi bi-telephone-fill me-3"></i>Contact Us</h2>
                <p class="lead mb-4">For registration details and queries, reach out to:</p>

                <div class="row">
                    <div class="col-md-6">
                        <div class="contact-person100">
                            <h4>Dr. Suman Avdhesh Yadav</h4>
                            <p class="mb-2">
                                <i class="bi bi-envelope-fill me-2"></i>
                                <a href="mailto:suman.avdheshyadav@gmail.com"
                                    class="text-white">suman.avdheshyadav@gmail.com</a>
                            </p>
                            <p class="mb-0">
                                <i class="bi bi-telephone-fill me-2"></i>
                                <a href="tel:+919910719256" class="text-white">+91 99107 19256</a>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="contact-person100">
                            <h4>Dr. Suman Lata Dhar</h4>
                            <p class="mb-2">
                                <i class="bi bi-envelope-fill me-2"></i>
                                <a href="mailto:smn_bhat@yahoo.co.in" class="text-white">smn_bhat@yahoo.co.in</a>
                            </p>
                            <p class="mb-0">
                                <i class="bi bi-telephone-fill me-2"></i>
                                <a href="tel:+919871252413" class="text-white">+91 9871252413</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="section100"
        style="background: linear-gradient(135deg, var(--light-blue), rgba(255, 255, 255, 0.5));">
        <div class="container text-center">
            <div class="animate-on-scroll100">
                <h2 class="section-title100">Ready to Innovate?</h2>
                <p class="lead mb-4">Join InnovateHer-2026 and be part of the change towards a sustainable future!
                </p>
                <div class="d-flex justify-content-center gap-3 flex-wrap">
                    <a href="https://forms.gle/Z3XEPE8KNjrAgPZu7" target="_blank" class="btn-primary100">
                        <i class="bi bi-rocket-takeoff me-2"></i>Register Your Team
                    </a>
                    <a href="https://forms.gle/LtBaSRXoXTW9w9Yd6" target="_blank" class="btn-primary100">
                        <i class="bi bi-person-plus me-2"></i>Become an Evaluator
                    </a>
                </div>
                <br>
                <div class="d-flex justify-content-center gap-3 flex-wrap">
                    <!-- <a href="./Recommendation Letter Format for InnovateHer2026.docx" target="_blank" class="btn-primary100" download>
                        <i class="bi bi-file-earmark-arrow-down"></i>Download Recommendation Letter Format
                    </a> -->
                </div>

            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="section100" style="background: var(--primary-blue); color: white;">
        <div class="container text-center">
            <div class="row">
                <div class="col-md-12">
                    <h3>InnovateHer-2026</h3>
                    <p class="mb-3">Empowering Girls Through Innovation for a Sustainable Future</p>
                    <div class="d-flex justify-content-center gap-4 mb-3">
                        <div>
                            <i class="bi bi-calendar-event"></i>
                            <span class="ms-2">October 30-31, 2026</span>
                        </div>
                        <div>
                            <i class="bi bi-geo-alt"></i>
                            <span class="ms-2">Dehradun, India</span>
                        </div>
                    </div>
                    <p class="small opacity-75">
                        Organized under <span class="hide-ieee">IEEE</span> Student-Teacher and Research
                        Engineer/Scientist (STAR) Program<br>
                        <span class="hide-ieee">IEEE</span> UP Section WiE Affinity Group | UPWIECON 2026
                    </p>
                </div>
            </div>
        </div>
    </footer>
</div>
<!-- Scripts -->











<!-- content ends here -->
<!-- Venue & Important Dates Section -->
<!-- <section class="venue-section py-5">
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
                                            <p class="mb-0">1<sup>st</sup> February 2026</p>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="date-card  backdrop-blur rounded-3 p-4 highlight-cardf">
                                            <h6 class="fw-bold text-warning mb-2">Rolling Acceptance (Round 1)</h6>
                                            <p class="mb-0">28<sup>th</sup> February 2026</p>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="date-card  backdrop-blur rounded-3 p-4 highlight-cardf">
                                            <h6 class="fw-bold text-warning mb-2">Rolling Acceptance (Round 2)</h6>
                                            <p class="mb-0">31<sup>st</sup> March 2026</p>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="date-card   rounded-3 p-4 highlight-cardf">
                                            <h6 class="fw-bold text-warning mb-2">Rolling Acceptance (Round 3)</h6>
                                            <p class="mb-0">31<sup>st</sup> May 2026</p>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="date-card  rounded-3 p-4 highlight-cardf">
                                            <h6 class="fw-bold text-warning mb-2">Rolling Acceptance (Round 4)</h6>
                                            <p class="mb-0">31<sup>st</sup> July 2026</p>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="date-card highlight-cardf rounded-3 p-4">
                                            <h6 class="fw-bold text-warning mb-2">Final Submission Deadline</h6>
                                            <p class="mb-0">30<sup>th</sup> August 2026</p>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="date-card highlight-cardf rounded-3 p-4">
                                            <h6 class="fw-bold text-warning mb-2">Early Bird Registration</h6>
                                            <p class="mb-0">1<sup>st</sup> September 2026</p>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="date-card highlight-cardf rounded-3 p-4">
                                            <h6 class="fw-bold text-warning mb-2">Camera Ready Submission</h6>
                                            <p class="mb-0">1<sup>st</sup> October 2026</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="conference-date-highlight mt-5">
                                    <div class="bg-warning text-dark rounded-4 p-4 d-inline-block">
                                        <h4 class="fw-bold mb-2">
                                            <i class="bi bi-star-fill me-2"></i>Conference Date
                                        </h4>
                                        <h3 class="display-6 fw-bold mb-0">30<sup>th</sup> - 31<sup>st</sup> October
                                            2026
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
    </section> -->


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


    // Scroll Animation Observer
    const observerOptions100 = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer100 = new IntersectionObserver(function (entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animated100');
            }
        });
    }, observerOptions100);

    // Observe all elements with animate-on-scroll100 class
    document.querySelectorAll('.animate-on-scroll100').forEach(el => {
        observer100.observe(el);
    });

    // Staggered animation for SDG cards
    const sdgCards100 = document.querySelectorAll('.sdg-card100');
    sdgCards100.forEach((card, index) => {

    });

    // Staggered animation for timeline items
    const timelineItems100 = document.querySelectorAll('.timeline-item100');
    timelineItems100.forEach((item, index) => {

    });

    // Smooth scrolling for anchor links
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

    // Add hover effects to cards
    document.querySelectorAll('.card100').forEach(card => {
        card.addEventListener('mouseenter', function () {
            this.style.transform = 'translateY(-10px)';
        });

        card.addEventListener('mouseleave', function () {
            this.style.transform = 'translateY(0)';
        });
    });

    // Dynamic background particle movement
    let mouseX = 0, mouseY = 0;

    document.addEventListener('mousemove', function (e) {
        mouseX = e.clientX / window.innerWidth;
        mouseY = e.clientY / window.innerHeight;

        const bgElement = document.querySelector('.background-animation100::before');
        if (bgElement) {

        }
    });

    // Add loading animation
    window.addEventListener('load', function () {
        document.body.style.opacity = '0';
        document.body.style.transition = 'opacity 0.5s ease';

        setTimeout(() => {
            document.body.style.opacity = '1';
        }, 100);
    });

    // Parallax effect for hero section
    window.addEventListener('scroll', () => {
        const scrolled = window.pageYOffset;
        const hero = document.querySelector('.hero-section100');
        if (hero) {

        }
    });

    // Counter animation for numbers
    function animateNumbers100() {
        const numbers = document.querySelectorAll('.sdg-number100');
        numbers.forEach(number => {
            const target = parseInt(number.textContent);
            let current = 0;
            const increment = target / 30;
            const timer = setInterval(() => {
                current += increment;
                if (current >= target) {
                    current = target;
                    clearInterval(timer);
                }
                number.textContent = Math.floor(current);
            }, 50);
        });
    }

    // Trigger number animation when SDG section comes into view
    const sdgSection = document.querySelector('.sdg-grid100');
    if (sdgSection) {
        const sdgObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateNumbers100();
                    sdgObserver.unobserve(entry.target);
                }
            });
        });
        sdgObserver.observe(sdgSection);
    }
</script>


    <?php include 'subFooter.php'; ?>

    <?php include 'footer.php'; ?>