<?php include 'header.php'; ?>
<style>
    .venue-section {
        background-image: url("images/caption.jpg");
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

    /* new style for content start  */
    :root {
        --primary-blue: rgba(70, 12, 82, 0.99);
        --accent-blue: rgba(91, 2, 109, 0.99);
        --light-blue: rgba(232, 217, 235, 0.99);
        --gold: rgba(171, 103, 186, 0.78);
        --text-dark: #2c3e50;
    }

    .venue-header {
        background: linear-gradient(135deg, var(--primary-blue) 0%, var(--accent-blue) 100%);
        color: white;
        padding: 3rem 0;
        text-align: center;
        margin-bottom: 0;
    }

    .venue-card {
        border: none;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        border-radius: 15px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        margin-bottom: 2rem;
        overflow: hidden;
    }

    .venue-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
    }

    .card-header-custom {
        background: linear-gradient(45deg, var(--primary-blue) 0%, var(--accent-blue) 100%);
        color: white;
        border: none;
        padding: 1.5rem;
        font-weight: 600;
        font-size: 1.2rem;
    }

    .accommodation-header {
        background: linear-gradient(45deg, var(--primary-blue) 0%, var(--gold) 100%);
    }

    .transport-header {
        background: linear-gradient(45deg, var(--accent-blue) 0%, var(--gold) 100%);
    }

    .weather-header {
        background: linear-gradient(45deg, var(--primary-blue) 0%, var(--gold) 100%);
    }

    .places-header {
        background: linear-gradient(45deg, var(--light-blue) 0%, var(--gold) 100%);
        color: var(--text-dark);
    }

    .icon-circle {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 1rem;
        font-size: 1.5rem;
    }

    .transport-item {
        background: linear-gradient(135deg, var(--primary-blue) 0%, var(--accent-blue) 100%);
        color: white;
        padding: 1.5rem;
        border-radius: 10px;
        margin-bottom: 1rem;
        transition: all 0.3s ease;
    }

    .transport-item:hover {
        transform: scale(1.02);
    }

    .weather-info {
        background: linear-gradient(135deg, var(--light-blue) 0%, rgba(243, 156, 18, 0.2) 100%);
        padding: 2rem;
        border-radius: 15px;
        text-align: center;
    }

    .temp-display {
        font-size: 3rem;
        font-weight: bold;
        color: var(--gold);
        margin: 1rem 0;
    }

    .places-list {
        list-style: none;
        padding: 0;
    }

    .places-list li {
        background: linear-gradient(135deg, var(--primary-blue) 0%, var(--accent-blue) 100%);
        color: white;
        padding: 0.8rem 1.5rem;
        margin: 0.5rem 0;
        border-radius: 25px;
        transition: all 0.3s ease;
        display: inline-block;
        margin-right: 0.5rem;
    }

    .places-list li:hover {
        transform: scale(1.05);
        cursor: pointer;
    }

    .highlight-text {
        background: linear-gradient(45deg, var(--primary-blue) 0%, var(--gold) 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        font-weight: bold;
    }

    .email-link {
        color: var(--accent-blue);
        text-decoration: none;
        font-weight: 600;
    }

    .email-link:hover {
        color: var(--primary-blue);
        text-decoration: underline;
    }

    /* new style for content end  */
</style>


</head>

<body>


    <!-- content start -->
    <div class="venue-header">
        <div class="container">
            <h1 class="display-4 mb-3"><i class="fas fa-map-marker-alt me-3"></i>VENUE INFORMATION</h1>
            <h2 class="h3 mb-0">ExpoInn Suites & Convention</h2>
            <p style='padding:3px'>25-29, Knowledge Park II, Greater Noida, Noida, Uttar Pradesh</p>
        </div>
    </div>

    <div class="container mt-5 pb-5">
        <!-- Accommodation Section -->
        <!-- <div class="card venue-card">
            <div class="card-header card-header-custom accommodation-header">
                <i class="fas fa-bed me-2"></i>ACCOMMODATION
            </div>
            <div class="card-body p-4">
                <div class="d-flex align-items-start">
                    <div class="icon-circle"
                        style="background: linear-gradient(45deg, #4facfe 0%, #00f2fe 100%); color: white;">
                        <i class="fas fa-hotel"></i>
                    </div>
                    <div>
                        <p class="mb-3 fs-5">Free accommodation will be arranged in a <span
                                class="highlight-text">Hotel/Resort</span> at no cost for all <strong>female presenters
                                only</strong>, on a first-come-first basis.</p>
                        <div class="alert alert-info border-0"
                            style="background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%);">
                            <i class="fas fa-envelope me-2"></i>
                            <strong>To Apply:</strong> Send an email to
                            <a href="mailto:ieeeconference@nielit.ac.in?subject=ACCOMMODATION"
                                class="email-link">ieeeconference@nielit.ac.in</a>
                            with subject <strong>"ACCOMMODATION"</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

        <!-- Transportation Section -->
        <div class="card venue-card">
            <div class="card-header card-header-custom transport-header">
                <i class="fas fa-plane me-2"></i>TRANSPORTATION
            </div>
            <div class="card-body p-4">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="transport-item">
                            <h5><i class="fas fa-plane me-2"></i>Nearest Airport</h5>
                            <p class="mb-2"><strong>Indira Gandhi International Airport (IGI), New Delhi</strong></p>
                            <p class="mb-2"><i class="fas fa-map-pin me-1"></i> Approximately 50 km from venue</p>
                            <p class="mb-0"><i class="fas fa-taxi me-1"></i> Prepaid taxis, Uber, and Ola cabs available</p>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="transport-item">
                            <h5><i class="fas fa-train me-2"></i>Railway Station</h5>
                            <p class="mb-2"><strong>Hazrat Nizamuddin Railway Station, New Delhi</strong></p>
                            <p class="mb-2"><i class="fas fa-map-pin me-1"></i> Approximately 45 km from venue</p>
                            <p class="mb-0"><i class="fas fa-car me-1"></i> Metro, taxis, and cab services available
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Weather Section -->
        <div class="card venue-card">
            <div class="card-header card-header-custom weather-header">
                <i class="fas fa-sun me-2"></i>WEATHER
            </div>
            <div class="card-body p-4">
                <div class="weather-info">
                    <h4 class="mb-3"><i class="fas fa-calendar-alt me-2"></i>November Weather</h4>
                    <p class="fs-5 mb-3">The weather in Greater Noida is <span class="highlight-text">pleasant and cool</span> in
                        November</p>
                    <div class="row align-items-center">
                        <div class="col-md-4">
                            <div class="temp-display">
                                <i class="fas fa-thermometer-half"></i>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="d-flex justify-content-around">
                                <div class="text-center">
                                    <h3 class="text-primary mb-0">14°C</h3>
                                    <small class="text-muted">Low</small>
                                </div>
                                <div class="text-center">
                                    <h3 class="text-danger mb-0">27°C</h3>
                                    <small class="text-muted">High</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="mt-3 mb-0 fs-6"><i class="fas fa-info-circle me-2"></i>Comfortable temperatures for
                        outdoor activities</p>
                </div>
            </div>
        </div>

        <!-- Places of Interest Section -->
        <div class="card venue-card">
            <div class="card-header card-header-custom places-header">
                <i class="fas fa-camera me-2"></i>PLACES OF INTEREST
            </div>
            <div class="card-body p-4">
                <div class="d-flex align-items-start">
                    <div class="icon-circle"
                        style="background-color: linear-gradient(135deg, rgba(171, 103, 186, 0.78), rgba(91, 2, 109, 0.99)); color: #333;">
                        <i class="fas fa-mountain"></i>
                    </div>
                    <div class="flex-grow-1">
                        <p class="fs-5 mb-3">Explore these beautiful destinations near the conference venue:</p>
                        <ul class="places-list">
                            <li><i class="fas fa-landmark me-2"></i>India Gate, New Delhi</li>
                            <li><i class="fas fa-building me-2"></i>Akshardham Temple</li>
                            <li><i class="fas fa-dove me-2"></i>Okhla Bird Sanctuary</li>
                            <li><i class="fas fa-tree me-2"></i>Worlds of Wonder (Amusement Park)</li>
                            <li><i class="fas fa-shopping-cart me-2"></i>DLF Mall of India</li>
                            <li><i class="fas fa-monument me-2"></i>Taj Mahal, Agra (190 km)</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Subfooter -->
    <?php include 'subFooter.php'; ?>

    <!-- Footer -->
    <?php include 'footer.php'; ?>