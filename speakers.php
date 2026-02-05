<?php include 'header.php'; ?>
<style>
    /* Speaker specific styles start here */

    .imagel {
        border-radius: 100px;
        width: 200px;
        height: 230px
    }

    .section-title {
        background: var(--gradient-pink-blue);
    }

    .speaker-slider {
        background: linear-gradient(135deg, var(--light-blue) 20%, var(--primary-blue) 100%);
        min-height: 100vh;
        /* padding: 60px 0; */
    }

    .speaker-card {
        background: white;
        border-radius: 20px;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
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

    .photo-left {
        background: var(--gradient-pink-blue);
    }

    .photo-right {
        background: var(--gradient-blue-pink);
    }

    .photo-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.3);
        display: flex;
        align-items: center;
        justify-content: center;
    }

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
        color: var(--dark-yellow);
        /* updated from gold */
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
        background: var(--primary-blue);
        border-radius: 50%;
        top: 50%;
        transform: translateY(-50%);
        border: 2px solid white;
    }

    .carousel-control-prev:hover,
    .carousel-control-next:hover {
        background: var(--primary-pink);
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
        border: 2px solid var(--primary-pink);
    }

    .carousel-indicators button.active {
        background-color: var(--primary-pink);
    }

    .section-title {
        text-align: center;
        color: white;
        margin-bottom: 50px;
        padding-top: 50px;
        padding-bottom: 50px
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

    /* Accent elements */
    .speaker-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: var(--gradient-pink-blue);
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
        background-image: url("images/caption.jpg");
        background-repeat: no-repeat;
        background-size: cover;
        z-index: 10;
    }

    .img-fluid {
        max-width: 100%;
        height: auto;
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
        background: var(--gradient-blue-pink);
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
        background: var(--gradient-pink-blue);
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
        background: var(--gradient-pink-blue);
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



    <section class="committee-hero">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="display-4 fw-bold mb-3">
                        <i class="fas fa-users me-3"></i>
                        SPEAKERS
                    </h1>
                </div>
            </div>
        </div>
    </section>


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


    <!-- content end  -->
    <section class="speaker-slider" style="display:none">
        <!-- NATIONAL SPEAKERS SECTION -->
        <div class="section-title">
            <h2>National Speakers</h2>
            <p>Distinguished Leaders and Experts</p>
        </div>
        <div class="container" style=" padding-bottom:100px ">

            <div id="nationalSpeakerCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#nationalSpeakerCarousel" data-bs-slide-to="0"
                        class="active"></button>
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
                                                <i class="fas fa-user photo-placeholder"><img
                                                        src="images\preetibansal.jpg" alt="Dr. Preeti Banzal"
                                                        class='imagel'></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="speaker-details">
                                        <div class="speaker-name">Dr. Preeti Banzal</div>
                                        <div class="speaker-title">Adviser/Scientist 'G'</div>
                                        <div class="speaker-organization">Principal Scientific Adviser to the Government
                                            of India</div>
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
                                                <i class="fas fa-user photo-placeholder"><img
                                                        src="images\Neena phuja.png" alt="Dr. Neena Phuja"
                                                        class='imagel'></i>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="speaker-details">
                                        <div class="speaker-name">Dr. Neena Phuja</div>
                                        <div class="speaker-title">Executive Member</div>
                                        <div class="speaker-organization">National Council for Vocational Education and
                                            Training (NCVET), Ministry of Skill Development, Government of India</div>
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
                                                <i class="fas fa-user photo-placeholder"><img
                                                        src="images\Tripta Thakur.jpg" alt="Dr. Tripta Thakur"
                                                        class='imagel'></i>
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
                                                <i class="fas fa-user photo-placeholder"><img src="images\SN Singh.jpg"
                                                        alt="Professor S N Singh" class='imagel'></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="speaker-details">
                                        <div class="speaker-name">Professor S N Singh</div>
                                        <div class="speaker-title">IEEE Fellow, Director</div>
                                        <div class="speaker-organization">Atal Bihari Vajpayee- Indian Institute of
                                            Information Technology and Management (ABV-IIITM), Gwalior, India</div>
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
                                                <i class="fas fa-user photo-placeholder"><img
                                                        src="images\Mohm. Rihan.jpg" alt="Professor Mohammad Rihan"
                                                        class='imagel'></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="speaker-details">
                                        <div class="speaker-name">Professor Mohammad Rihan </div>
                                        <div class="speaker-title">Director General,</div>
                                        <div class="speaker-organization">National Institute of Solar Energy (NISE),
                                            Ministry of New and Renewable Energy</div>
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
                                                <i class="fas fa-user photo-placeholder"><img
                                                        src="images\Ram k Sharma.jpg" alt="Dr. Ram K Sharma"
                                                        class='imagel'></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="speaker-details">
                                        <div class="speaker-name">Dr. Ram K Sharma</div>
                                        <div class="speaker-title">Vice Chancellor and Chairperson, </div>
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
                                                <i class="fas fa-user photo-placeholder"><img
                                                        src="images\Sweta Khurana.jpg" alt="Ms. Shweta Khurana"
                                                        class='imagel'></i>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="speaker-details">
                                        <div class="speaker-name">Ms. Shweta Khurana</div>
                                        <div class="speaker-title">Senior Director, </div>
                                        <div class="speaker-organization">Asia Pacific & Japan - Government Partnerships
                                            & Initiatives,
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
                                                <i class="fas fa-user photo-placeholder"><img src="images\Dr. MAMTA.jpg"
                                                        alt="Dr. Mamta Pant Abichandani" class='imagel'></i>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="speaker-details">
                                        <div class="speaker-name">Dr. Mamta Pant Abichandani </div>
                                        <div class="speaker-title">Director & Head Policy Affairs & Communications at
                                            Infineon Technologies</div>
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
                                                <i class="fas fa-user photo-placeholder"><img src="images\Dr. manju.png"
                                                        alt="Dr Manju Khari" class='imagel'></i>

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
                                                <i class="fas fa-user photo-placeholder"><img
                                                        src="images\Asheesh Kumar.jpg"
                                                        alt="Professor Asheesh Kumar Singh" class='imagel'></i>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="speaker-details">
                                        <div class="speaker-name">Professor Asheesh Kumar Singh </div>
                                        <div class="speaker-title">Professor</div>
                                        <div class="speaker-organization">Motilal Nehru National Institute of Technology
                                            Allahabad, Prayagraj, India</div>
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
                                                <i class="fas fa-user photo-placeholder"><img src="images\Rishi.jpg"
                                                        alt="Dr. Rishi Mohan Bhatnagar" class='imagel'></i>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="speaker-details">
                                        <div class="speaker-name">Dr. Rishi Mohan Bhatnagar</div>
                                        <div class="speaker-title">Co-Founder</div>
                                        <div class="speaker-organization">India & Global CTO – AA2IT</div>
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
                                                <i class="fas fa-user photo-placeholder"><img src="images\abhijeet.png"
                                                        alt="Mr. Abhijeet Sinha" class='imagel'></i>

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
                                                <i class="fas fa-user photo-placeholder"><img src="images\astha.jpg"
                                                        alt="Ms. Astha Kukreti" class='imagel'></i>

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
                                                <i class="fas fa-user photo-placeholder"><img src="images\swaweta.jpg"
                                                        alt="Ms. Shaweta Berry" class='imagel'></i>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="speaker-details">
                                        <div class="speaker-name">Ms. Shaweta Berry</div>
                                        <div class="speaker-title">Founder & CEO</div>
                                        <div class="speaker-organization">Mahanadaya Universal Consultancy Private
                                            Limited</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#nationalSpeakerCarousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#nationalSpeakerCarousel"
                    data-bs-slide="next">
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
                    <button type="button" data-bs-target="#internationalSpeakerCarousel" data-bs-slide-to="0"
                        class="active"></button>
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
                    <button type="button" data-bs-target="#internationalSpeakerCarousel" data-bs-slide-to="11"></button>
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
                                                <i class="fas fa-user photo-placeholder"><img src="images\Mary.jpg"
                                                        alt="Ms. Mary Ellen Randall" class='imagel'></i>
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
                                                <i class="fas fa-user photo-placeholder"><img src="images\Celia.jpg"
                                                        alt="Dr. Celia Shahnaz" class='imagel'></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="speaker-details">
                                        <div class="speaker-name">Dr. Celia Shahnaz</div>
                                        <div class="speaker-title">Professor</div>
                                        <div class="speaker-organization">Bangladesh University of Engineering and
                                            Technology, Chair IEEE Women in Engineering, Nominations and Appointments
                                        </div>
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
                                                <i class="fas fa-user photo-placeholder"><img src="images\Valentina.jpg"
                                                        alt="Professor Valentina Emilia Balas" class='imagel'></i>
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
                                                <i class="fas fa-user photo-placeholder"><img
                                                        src="images\S. OBAIDAT.png" alt="Professor Mohammad S. Obaidat"
                                                        class='imagel'></i>
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
                                                <i class="fas fa-user photo-placeholder"><img
                                                        src="images\AKSHAY KUMAR.jpg"
                                                        alt="Professor Akshay Kumar Rathore" class='imagel'></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="speaker-details">
                                        <div class="speaker-name">Professor Akshay Kumar Rathore</div>
                                        <div class="speaker-title">IEEE Fellow, Professor and Program Leader</div>
                                        <div class="speaker-organization">Electrical Power Engineering at Singapore
                                            Institute of Technology (SIT)</div>
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
                                                <i class="fas fa-user photo-placeholder"><img
                                                        src="images\SWETA ANEHA.jpg" alt="Professor Sweta Sneha"
                                                        class='imagel'></i>
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
                                                <i class="fas fa-user photo-placeholder"><img
                                                        src="images\MEGA NOVITA.png" alt="Mega Novita"
                                                        class='imagel'></i>
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
                                                <i class="fas fa-user photo-placeholder"><img src="images\THILINI.jpg"
                                                        alt="Ms. Thilini De Silva" class='imagel'></i>
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
                                                <i class="fas fa-user photo-placeholder"><img
                                                        src="images\JEAN PIERRE.jpg" alt="Prof. Jean-Pierre Fontaine"
                                                        class='imagel'></i>
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
                                                <i class="fas fa-user photo-placeholder"><img src="images\PAOLO.jpg"
                                                        alt="Prof. Paolo Ciancarini" class='imagel'></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="speaker-details">
                                        <div class="speaker-name">Prof. Paolo Ciancarini</div>
                                        <div class="speaker-title">Professor</div>
                                        <div class="speaker-organization">Università di Bologna, Italy</div>
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
                                                <i class="fas fa-user photo-placeholder"><img src="images\ANG WEE.png"
                                                        alt="Mr. Ang Wee Seng" class='imagel'></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="speaker-details">
                                        <div class="speaker-name">Mr. Ang Wee Seng</div>
                                        <div class="speaker-title">Executive Director</div>
                                        <div class="speaker-organization">Singapore Semiconductor Industry Association
                                            (SSIA)</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- International Speaker 12 -->
                    <div class="carousel-item">
                        <div class="row justify-content-center">
                            <div class="col-lg-6 col-md-8">
                                <div class="speaker-card">
                                    <div class="speaker-photo-section">
                                        <div class="photo-single">
                                            <div class="photo-overlay">
                                                <i class="fas fa-user photo-placeholder"><img
                                                        src="images\Preeti Ohri Khemani.jpeg" alt="Preeti Ohri Khemani"
                                                        class='imagel'></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="speaker-details">
                                        <div class="speaker-name">Preeti Ohri Khemani</div>
                                        <div class="speaker-title">Senior Director</div>
                                        <div class="speaker-organization">Infineon Technologies, Austria</div>
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

                <button class="carousel-control-prev" type="button" data-bs-target="#internationalSpeakerCarousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#internationalSpeakerCarousel"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>
        </div>
    </section>


    <!--bodu closed  -->
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
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Initialize National Speakers Carousel
            var nationalCarousel = document.querySelector('#nationalSpeakerCarousel')
            if (nationalCarousel) {
                var nationalCarouselInstance = new bootstrap.Carousel(nationalCarousel, {
                    interval: 4000,
                    wrap: true,
                    pause: 'hover'
                })
            }

            // Initialize International Speakers Carousel  
            var internationalCarousel = document.querySelector('#internationalSpeakerCarousel')
            if (internationalCarousel) {
                var internationalCarouselInstance = new bootstrap.Carousel(internationalCarousel, {
                    interval: 4000,
                    wrap: true,
                    pause: 'hover'
                })
            }
        });

        // Add smooth transitions
        // document.addEventListener('DOMContentLoaded', function() {
        //     const carouselItems = document.querySelectorAll('.carousel-item');
        //     carouselItems.forEach(item => {
        //         item.style.transition = 'transform 0.6s ease-in-out';
        //     });
        // });
    </script>
    <?php include 'subFooter.php'; ?>
    <?php include 'footer.php'; ?>