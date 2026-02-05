<?php include 'header.php'; ?>
<style>
    .venue-section {
        background-image: url("images/caption.jpg");
        background-repeat: no-repeat;
        background-size: cover;
        z-index: 10;
    }

    .img-fluid {
        max-width: 100%;
        height: auto;
    }

    /* Venue page specific styles */

    .venue-header {
        background: var(--gradient-pink-blue);
        color: white;
        padding: 3rem 0;
        text-align: center;
        margin-bottom: 0;
    }

    .committee-hero {
        background: var(--gradient-pink-blue);
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
        background: var(--gradient-pink-blue);
        color: white;
        border: none;
        padding: 1.5rem;
        font-weight: 600;
        font-size: 1.2rem;
    }

    .accommodation-header {
        background: var(--gradient-pink-blue);
    }

    .transport-header {
        background: var(--gradient-blue-pink);
    }

    .weather-header {
        background: var(--gradient-pink-blue);
    }

    .places-header {
        background: var(--light-blue);
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
        background: var(--gradient-pink-blue);
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
        background: var(--light-blue);
        padding: 2rem;
        border-radius: 15px;
        text-align: center;
        border: 1px solid rgba(255, 45, 149, 0.1);
    }

    .temp-display {
        font-size: 3rem;
        font-weight: bold;
        color: var(--primary-pink);
        margin: 1rem 0;
    }

    .places-list {
        list-style: none;
        padding: 0;
    }

    .places-list li {
        background: var(--gradient-pink-blue);
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
        background: var(--gradient-pink-blue);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        font-weight: bold;
    }

    .email-link {
        color: var(--primary-pink);
        text-decoration: none;
        font-weight: 600;
    }

    .email-link:hover {
        color: var(--primary-blue);
        text-decoration: underline;
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
        background: var(--gradient-pink-blue);
        color: white;
        border-radius: 20px;
    }

    .highlight-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        background: var(--gradient-pink-blue);
        color: white;
    }

    .highlight-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    }

    .highlight-cardf {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        background: rgba(255, 45, 149, 0.1);
        color: var(--text-dark);
    }

    .highlight-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
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

    /* new style for content end  */
</style>


</head>

<body>


    <!-- content start -->
    <section class="committee-hero">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="display-4 fw-bold mb-3">
                        <i class="fas fa-map-marker-alt me-3"></i>
                        VENUE INFORMATION
                    </h1>
                    <h2 class="h3 mb-2">ExpoInn Suites & Convention</h2>
                    <p class="lead mb-0">25-29, Knowledge Park II, Greater Noida, Noida, Uttar Pradesh</p>
                </div>
            </div>
        </div>
    </section>

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
                            <p class="mb-0"><i class="fas fa-taxi me-1"></i> Prepaid taxis, Uber, and Ola cabs available
                            </p>
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
                    <p class="fs-5 mb-3">The weather in Greater Noida is <span class="highlight-text">pleasant and
                            cool</span> in
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