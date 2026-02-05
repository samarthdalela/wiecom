<?php include 'header.php'; ?>
<style>
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
        background: var(--primary-pink);
        color: white;
        border-color: var(--primary-pink);
    }

    .img-fluid {
        max-width: 100%;
        height: auto;
    }

    /* Conference Schedule page specific styles */

    .speakers-section {
        background: var(--gradient-pink-blue);
        min-height: 30vh;
        position: relative;
        overflow: hidden;
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
        border: 2px solid var(--primary-pink);
        border-radius: 15px;
        max-width: 80vw;
        width: 100%;
        box-shadow: 0 8px 32px rgba(255, 45, 149, 0.2);
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
        border: 3px solid var(--primary-blue);
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0, 150, 199, 0.2);
    }

    .pdf-frame-wrapper iframe {
        border: none;
    }

    @media (max-width: 768px) {
        .pdf-frame-wrapper iframe {
            height: 400px;
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

    <!-- Footer -->
    <?php include 'subFooter.php'; ?>
    <?php include 'footer.php'; ?>