<?php include 'header.php'; ?>

<!-- Hero Banner Section -->
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

    .hero-area {
        /* background: #fff; */
    }

    .hero-overlay {
        /* background: linear-gradient(135deg, rgba(255, 45, 150, 0.36), rgba(0, 208, 255, 0.38)) !important; */
        backdrop-filter: blur(4px);
        background-color: transparent !important;
        background-image:
            radial-gradient(rgba(255, 255, 255, 0.25) 1px, transparent 1px),
            linear-gradient(135deg, rgba(255, 45, 150, 0.42), rgba(0, 208, 255, 0.44)) !important;
        background-size: 20px 20px, 100% 100%;
        backdrop-filter: blur(5px);
    }


    .conference-badge .badge {
        background: var(--gradient-pink-blue) !important;
        border: none;
        box-shadow: 0 4px 15px rgba(255, 45, 149, 0.3);
    }

    .bgNew {
        background: linear-gradient(135deg, rgba(255, 45, 149, 0.95), rgba(0, 180, 216, 0.95)) !important;
        backdrop-filter: blur(10px);
        border: 2px solid rgba(255, 255, 255, 0.5);
        padding: 25px 30px;
        color: #fff !important;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.4);
        position: relative;
        overflow: hidden;
    }

    .bgNew::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'%3E%3Cdefs%3E%3Cpattern id='cross' width='12' height='12' patternUnits='userSpaceOnUse'%3E%3Cpath d='M0 0 L12 12 M12 0 L0 12' stroke='rgba(255,255,255,0.15)' stroke-width='1'/%3E%3C/pattern%3E%3C/defs%3E%3Crect width='100' height='100' fill='url(%23cross)'/%3E%3C/svg%3E");
        opacity: 0.35;
        pointer-events: none;
        z-index: 1;
    }

    .bgNew>* {
        position: relative;
        z-index: 2;
    }

    .bgNew h1 {
        color: #fff !important;
        text-shadow: 0 4px 15px rgba(0, 0, 0, 0.5);
        font-weight: 800;
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

    .yellow-accent {
        background: linear-gradient(135deg, rgba(30, 30, 30, 0.95), rgba(50, 50, 50, 0.95)) !important;
        color: #FFC107 !important;
        padding: 15px 30px;
        border-radius: 15px;
        display: inline-block;
        box-shadow: 0 8px 25px rgba(255, 193, 7, 0.4);
        text-shadow: 0 2px 10px rgba(255, 193, 7, 0.5);
        border: 2px solid #FFC107;
        animation: glow-pulse 2s ease-in-out infinite;
    }

    @keyframes glow-pulse {

        0%,
        100% {
            box-shadow: 0 8px 25px rgba(255, 193, 7, 0.4);
        }

        50% {
            box-shadow: 0 8px 35px rgba(255, 193, 7, 0.6), 0 0 20px rgba(255, 193, 7, 0.3);
        }
    }

    .stat-yellow {
        color: #FFC107 !important;
        text-shadow: 0 2px 8px rgba(255, 193, 7, 0.5);
        font-weight: 900 !important;
    }

    .about-section {
        background: linear-gradient(180deg, #FFFFFF 0%, #E3F2FD 50%, #F8BBD0 100%) !important;
    }
</style>

<section class="hero-area position-relative overflow-hidden">
    <div class="hero-background position-absolute top-0 start-0 w-100 h-100" style="z-index: 0;">
        <img src="images/banner1.jpg" class="img-fluid w-100 h-100 position-absolute top-0 start-0"
            style="object-fit: cover; z-index: 0;" alt="Conference Banner">
        <div class="hero-overlay position-absolute top-0 start-0 w-100 h-100" style="z-index: 1;">
        </div>
    </div>

    <div class="container-fluid position-relative responsive"
        style="z-index: 2; min-height: 100vh; display: flex; align-items: center; ">
        <div class="row w-100 justify-content-center text-center textColour ">
            <div class="col-lg-10 col-xl-8">
                <div class="hero-content animate__animated animate__fadeInUp">
                    <div class="conference-badge mb-4">
                        <span class="badge px-4 py-2 rounded-pill fs-6 fw-bold">
                            <i class="bi bi-calendar-event me-2"></i>
                            19-20 November 2026
                        </span>
                    </div>
                    <div class="bgNew ">

                        <h1 class="display-3 fw-bold  text-shadow">
                            UPWIECON 2026
                        </h1>
                    </div>

                    <div class="hero-subtitle mb-5">
                        <!-- <h2 class="h3 fw-light mb-3">
                                1<sup>st</sup> IEEE Uttar Pradesh Section Women in Engineering
                            </h2> -->
                        <h3 class="h4 fw-normal">
                            International Conference on Electrical Electronics and Computer Engineering
                        </h3>
                    </div>

                    <div class="hero-highlights mb-5">
                        <div class="row g-4 justify-content-center">
                            <!-- <div class="col-md-4">
                                    <div class="highlight-card  backdrop-blur rounded-4 p-4 h-100">
                                        <i class="bi bi-award display-6 text-warning mb-3"></i>
                                        <h5 class="fw-bold">IEEE Xplore</h5>
                                        <p class="mb-0 small">The presented paper will be published on the IEEE Xplore subject to the IEEE Standards and quality check.</p>
                                  
                                    </div>
                                </div> -->
                            <div class="col-md-4">
                                <div class="highlight-card  backdrop-blur rounded-4 p-4 h-100">
                                    <i class="bi bi-people display-6 mb-3"></i>
                                    <h5 class="fw-bold">Women in Engineering</h5>
                                    <p class="mb-0 small">Empowering women in STEM through networking and
                                        collaboration</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="highlight-card  backdrop-blur rounded-4 p-4 h-100">
                                    <i class="bi bi-globe display-6 mb-3"></i>
                                    <h5 class="fw-bold">Global Platform</h5>
                                    <p class="mb-0 small">International conference bringing together researchers
                                        worldwide</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="hero-actions pb-2">
                        <a href="registration.php" class="btn btn-warning btn-lg me-3 px-5 py-3 rounded-pill fw-bold">
                            <i class="bi bi-person-plus me-2"></i>Register Now
                        </a>
                        <a href="callforpaper.php" class="btn btn-light btn-lg px-5 py-3 rounded-pill fw-bold">
                            <i class="bi bi-file-earmark-text me-2"></i>Submit Paper
                        </a>
                    </div>
                </div>
            </div>

            <center>
                <div class="sponsor-section" style="display: none;">
                    <!-- Text Section (1/4) -->
                    <div class="sponsor-text-section">
                        <h2>Our Sponsors</h2>
                        <div class="sponsor-decorative-line"></div>
                        <!-- <p class="sponsor-subtitle">Trusted Partners Supporting Our Vision</p> -->
                    </div>

                    <!-- Logo Section (3/4) -->
                    <div class="sponsor-logo-section">
                        <div class="sponsor-logo-slider">
                            <div class="sponsor-logo-track">
                                <!-- First set of logos -->
                                <div class="sponsor-logo-item">
                                    <div class="sponsor-logo-placeholder"><img src="./images/Msbte.png" alt="Sponsor 1">
                                    </div>
                                    <!-- Replace with: <img src="logo1.png" alt="Sponsor 1"> -->
                                </div>
                                <div class="sponsor-logo-item">
                                    <div class="sponsor-logo-placeholder"><img src="./images/2.png" alt="Sponsor 2">
                                    </div>
                                    <!-- Replace with: <img src="logo2.png" alt="Sponsor 2"> -->
                                </div>
                                <div class="sponsor-logo-item">
                                    <div class="sponsor-logo-placeholder"><img src="./images/anrf.png" alt="Sponsor 3"
                                            width='200px' height='200px'></div>
                                    <!-- Replace with: <img src="logo3.png" alt="Sponsor 3"> -->
                                </div>
                                <div class="sponsor-logo-item">
                                    <div class="sponsor-logo-placeholder"><img src="./images/powergrid.png"
                                            alt="Sponsor 4"></div>
                                    <!-- Replace with: <img src="logo3.png" alt="Sponsor 3"> -->
                                </div>

                                <!-- Duplicate set for seamless loop -->
                                <!-- First set of logos -->
                                <div class="sponsor-logo-item">
                                    <div class="sponsor-logo-placeholder"><img src="./images/Msbte.png" alt="Sponsor 1">
                                    </div>
                                    <!-- Replace with: <img src="logo1.png" alt="Sponsor 1"> -->
                                </div>
                                <div class="sponsor-logo-item">
                                    <div class="sponsor-logo-placeholder"><img src="./images/2.png" alt="Sponsor 2">
                                    </div>
                                    <!-- Replace with: <img src="logo2.png" alt="Sponsor 2"> -->
                                </div>
                                <div class="sponsor-logo-item">
                                    <div class="sponsor-logo-placeholder" style='margin:0px;'><img
                                            src="./images/anrf.png" alt="Sponsor 3" width='200px' height='200px'></div>
                                    <!-- Replace with: <img src="logo3.png" alt="Sponsor 3"> -->
                                </div>
                                <div class="sponsor-logo-item">
                                    <div class="sponsor-logo-placeholder"><img src="./images/powergrid.png"
                                            alt="Sponsor 4"></div>
                                    <!-- Replace with: <img src="logo3.png" alt="Sponsor 3"> -->
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </center>
        </div>
    </div>

    <!-- Animated scroll indicator -->
    <div class="scroll-indicator position-absolute bottom-0 start-50 translate-middle-x mb-4 text-white text-center">
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
                    <h2 class="display-5 fw-bold mb-3" style="color: #FF2D95 !important;">About UPWIECON 2026</h2>
                    <div class="section-divider mx-auto mb-4" style="width: 100px; height: 4px; border-radius: 2px;">
                    </div>
                </div>

                <div class="about-card bg-white rounded-4 shadow-lg p-5 mb-5">
                    <div class="row align-items-center">
                        <div class="col-lg-9">
                            <p class="lead text-muted mb-4" style="text-align: justify; text-justify: inter-word;">
                                <strong class="newText" style="color: #FF2D95 !important;">UPWIECON 2026</strong> brings
                                together women technologists,
                                researchers, industry leaders, policymakers, and students on a common platform to
                                celebrate innovation, leadership, and inclusion in engineering and technology.
                            </p>

                            <p class="text-muted mb-4" style="text-align: justify; text-justify: inter-word;">
                                Designed to foster knowledge exchange and mentorship, <strong>UPWIECON</strong>
                                focuses on emerging technologies, entrepreneurship, skilling, and societal impact,
                                while amplifying women’s voices and contributions in STEM.
                            </p>

                            <p class="text-muted mb-4" style="text-align: justify; text-justify: inter-word;">
                                Through keynotes, technical sessions, panel discussions, and networking
                                opportunities, the conference aims to inspire collaboration, build capacity,
                                and create sustainable pathways for women to lead and shape the future of
                                technology globally.
                            </p>

                            <p class="lead text-muted mb-4" style="text-align: justify; text-justify: inter-word;">
                                <!-- <span>The IEEE Uttar Pradesh Section Women in Engineering </span> -->
                                International Conference on
                                Electrical Electronics and Computer Engineering
                                <strong class="newText" style="color: #FF2D95 !important;">(UPWIECON 2026)</strong> is a
                                top-level International
                                Conference covering broad topics in the areas of Electrical, Computer and
                                Electronics Engineering.
                            </p>
                            <p class="text-muted" style="text-align: justify; text-justify: inter-word;">
                                Organized by NIELIT Noida, India, <strong>UPWIECON</strong> is the flagship
                                Conference of
                                <!-- <span>IEEE UP Section 
                                WIE Affinity Group,</span> --> providing an excellent platform
                                for researchers to present their work and connect with the global research
                                community.
                            </p>
                        </div>
                        <div class="col-lg-3 text-center">
                            <div class="about-stats">
                                <div class="stat-item mb-3">
                                    <h3 class="display-5 fw-bold stat-yellow">2<sup class="stat-yellow">nd</sup></h3>
                                    <p class="text-muted mb-0">
                                        <!-- <span>IEEE UP Section </span> -->
                                        WIE Conference
                                    </p>
                                </div>
                                <br>
                                <div class="stat-item">
                                    <h3 class="display-5 fw-bold text-success">Global</h3>
                                    <p class="text-muted mb-0">Research Platform</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- About IEEE UP Section -->
        <!-- <div class="row mb-5">
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
        </div> -->

        <!-- Objectives -->
        <div class="row">
            <div class="col-lg-12">
                <div class="section-header mb-4 text-center">
                    <h3 class="h2 fw-bold mb-3" style="color: #FF2D95 !important;">Conference Objectives</h3>
                </div>

                <div class="objective-card bg-white rounded-4 shadow-lg p-4 mb-4">
                    <p class="lead text-muted text-center">
                        <!-- <span>IEEE Uttar Pradesh Section Women in Engineering</span> -->
                        <b>International Conference aims to bring
                            together research scholars, practicing scientists, and industrialists from across the world,
                            especially empowering women in engineering domains.</b>
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
                            <div class="objective-icon newText mb-3">
                                <i class="bi bi-lightbulb-fill display-5"></i>
                            </div>
                            <h5 class="fw-bold mb-3">Knowledge Sharing</h5>
                            <p class="text-muted mb-0">Invited talks from eminent personalities across the globe
                                offering valuable insights into the latest advancements in engineering fields.</p>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="objective-card bg-white rounded-4 shadow-lg p-4 h-100">
                            <div class="objective-icon newText mb-3">
                                <i class="bi bi-trophy-fill display-5"></i>
                            </div>
                            <h5 class="fw-bold mb-3">Professional Development</h5>
                            <p class="text-muted mb-0">Pre-conference tutorials and workshops providing attendees
                                with opportunities to enhance their skills and knowledge in cutting-edge
                                technologies.</p>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="objective-card bg-white rounded-4 shadow-lg p-4 h-100">
                            <div class="objective-icon newText mb-3">
                                <i class="bi bi-easel2-fill"></i>
                            </div>
                            <h5 class="fw-bold mb-3">Research Presentation</h5>
                            <p class="text-muted mb-0">Featured referred paper presentations by female presenters,
                                allowing participants to share research findings with a global audience of experts.
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="objective-card text-white rounded-4 shadow-lg p-4 bgNew" style="">
                            <div class="objective-icon text-white mb-3">
                                <i class="bi bi-heart-fill display-5" style="color: white !important;"></i>
                            </div>
                            <h5 class="fw-bold text-white mb-3">Empowerment in Social and Personal Roles</h5>
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

        <div class="logo-scroller10" style="display: none;">
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
                <div class="logo-item10">
                    <div class="logo10">
                        <img src="./images/academiQ.jpeg" alt="Partner 17">
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
                <div class="logo-item10">
                    <div class="logo10">
                        <img src="./images/academiQ.jpeg" alt="Partner 17">
                    </div>
                    <div class="sparkle10" style="top: 40%; left: 55%; animation-delay: 0.9s;"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Venue & Important Dates Section -->
<?php include 'subFooter.php'; ?>
<?php include 'footer.php'; ?>