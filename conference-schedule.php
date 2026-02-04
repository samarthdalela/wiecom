<?php include 'header.php'; ?>
<style>
    :root {
        --primary-blue: rgba(70, 12, 82, 0.99);
        --accent-blue: rgba(91, 2, 109, 0.99);
        --light-blue: rgba(225, 181, 234, 0.99);
        --gold: #f39c12;
        --text-dark: #2c3e50;
    }

    .venue-section {
        background-image: url("images/caption.jpg");
        background-repeat: no-repeat;
        background-size: cover;
        z-index: 10;
    }

    .pdf-fallback {
        text-align: center;
        margin-top: 15px;
    }

    .pdf-fallback a {
        text-decoration: none;
        color: var(--primary-blue);
        font-weight: 600;
        font-size: 1rem;
        border: 2px solid var(--primary-blue);
        padding: 8px 16px;
        border-radius: 8px;
        transition: 0.3s;
        display: inline-block;
    }

    .pdf-fallback a:hover {
        background: var(--primary-blue);
        color: white;
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

    .content-wrapper {
        width: 100vw
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

    /* new style for content start herer  */
    .speakers-section {
        /* background: linear-gradient(135deg, rgba(171, 103, 186, 0.78), rgba(91, 2, 109, 0.99)); */
        background: linear-gradient(135deg, var(--primary-blue) 0%, var(--accent-blue) 100%);
        min-height: 30vh;
        position: relative;
        overflow: hidden;
        /* margin-top: 30px; */
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

    .pdf-viewer-section {
        background: linear-gradient(135deg, var(--light-blue), #fff);
        padding: 60px 20px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .pdf-container {
        background: #fff;
        border: 2px solid var(--gold);
        border-radius: 15px;
        max-width: 80vw;
        width: 100%;
        box-shadow: 0 8px 32px rgba(70, 12, 82, 0.3);
        padding: 30px;
        text-align: center;
    }

    .pdf-title {
        color: var(--primary-blue);
        font-size: 1.8rem;
        font-weight: 700;
        margin-bottom: 10px;
        letter-spacing: 0.5px;
    }

    .pdf-description {
        color: var(--text-dark);
        font-size: 1rem;
        margin-bottom: 20px;
    }

    .pdf-frame-wrapper {
        border: 3px solid var(--accent-blue);
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(91, 2, 109, 0.2);
    }

    .pdf-frame-wrapper iframe {
        border: none;
    }

    @media (max-width: 768px) {
        .pdf-frame-wrapper iframe {
            height: 400px;
        }
    }



    /* new style nend here */
</style>


</head>

<body>

    <!-- content start -->
    <div class="speakers-section d-flex align-items-center justify-content-center position-relative">
        <!-- Floating background icons -->
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
                            Conference Schedule
                        </h2>
                        <p class="lead text-white-50 mb-4 fs-3">

                            Sessions and Timings
                        </p>
                        <!-- 
                        <div class="d-flex justify-content-center align-items-center">
                            <div class="spinner-grow text-light me-3" role="status" style="width: 1rem; height: 1rem;">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            <span class="text-white-50 fs-6">Stay tuned for exciting announcements</span> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- Coming Soon Message Section -->
    <!-- <section class="pdf-viewer-section">
        <div class="pdf-container"> -->
    <div class="text-center py-5">
        <i class="bi bi-calendar-event fa-4x mb-4" style="color: var(--primary-blue);"></i>
        <h3 class="pdf-title mb-3">Conference Schedule</h3>
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
    <!-- </div> -->
    <!-- </section> -->

    <!-- <section class="pdf-viewer-section">
        <div class="pdf-container">
            <p class="pdf-description">
                View or download the detailed conference schedule below.
            </p>

            <div class="pdf-frame-wrapper">
                <iframe src="./Schedule.pdf" width="100%" height="600px"></iframe>
            </div>
            <div class="pdf-fallback">
                <a href="./Schedule.pdf" target="_blank">View / Download PDF</a>
            </div>

        </div>
    </section> -->


    <!-- content end  -->
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
    </section> -->

    <!-- Footer -->
    <?php include 'subFooter.php'; ?>
    <?php include 'footer.php'; ?>