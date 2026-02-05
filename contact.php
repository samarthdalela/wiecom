<?php include 'header.php'; ?>
<style>
    /* Contact page specific styles */

    .contact-container51 {
        max-width: 1200px;
        margin: 0 auto;
        background: white;
        border-radius: 25px;
        box-shadow: 0 25px 80px rgba(255, 45, 149, 0.1);
        overflow: hidden;
        position: relative;
        margin-top: 50px;
    }

    .contact-container51::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 8px;
        background: var(--gradient-pink-blue);
        background-size: 200% 100%;
        animation: gradientShift 3s ease-in-out infinite;
    }

    @keyframes gradientShift {

        0%,
        100% {
            background-position: 0% 50%;
        }

        50% {
            background-position: 100% 50%;
        }
    }

    .header51 {
        background: var(--gradient-pink-blue);
        color: white;
        text-align: center;
        padding: 4rem 2rem;
        position: relative;
        overflow: hidden;
    }

    .header51::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
        animation: rotate 20s linear infinite;
    }

    @keyframes rotate {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    .header-content51 {
        position: relative;
        z-index: 2;
    }

    .header51 h1 {
        font-size: 3rem;
        font-weight: 800;
        margin-bottom: 0.5rem;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
    }

    .header51 h2 {
        font-size: 1.5rem;
        font-weight: 300;
        opacity: 0.9;
        letter-spacing: 2px;
    }

    .contact-content51 {
        padding: 4rem 2rem;
    }

    .important-notice51 {
        background: var(--light-blue);
        border: 2px solid var(--primary-pink);
        border-radius: 15px;
        padding: 2rem;
        margin-bottom: 3rem;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .important-notice51 h3 {
        color: var(--primary-blue);
        font-size: 1.3rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
        margin-top: 1rem;
    }

    .contacts-grid51 {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        gap: 2rem;
        margin-top: 2rem;
    }

    .contact-card51 {
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.9), var(--light-blue));
        border-radius: 20px;
        padding: 2.5rem;
        box-shadow: 0 15px 40px rgba(0, 150, 199, 0.1);
        position: relative;
        overflow: hidden;
        transition: all 0.4s ease;
        border: 1px solid rgba(255, 45, 149, 0.1);
    }

    .contact-card51::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: var(--gradient-pink-blue);
        transform: scaleX(0);
        transition: transform 0.3s ease;
    }

    .contact-card51:hover::before {
        transform: scaleX(1);
    }

    .contact-card51:hover {
        transform: translateY(-10px);
        box-shadow: 0 25px 60px rgba(255, 45, 149, 0.2);
    }

    .card-header51 {
        text-align: center;
        margin-bottom: 2rem;
        position: relative;
    }

    .card-icon51 {
        width: 70px;
        height: 70px;
        background: var(--gradient-pink-blue);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1rem;
        font-size: 1.8rem;
        animation: pulse 2s ease-in-out infinite;
    }

    @keyframes pulse {

        0%,
        100% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.05);
        }
    }

    .card-title51 {
        color: var(--primary-blue);
        font-size: 1.2rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
    }

    .card-subtitle51 {
        color: var(--text-dark);
        font-size: 0.95rem;
        opacity: 0.8;
        font-weight: 500;
    }

    .contact-person51 {
        margin-bottom: 2rem;
        padding: 1.5rem;
        background: rgba(255, 255, 255, 0.7);
        border-radius: 15px;
        border-left: 4px solid var(--primary-pink);
        transition: all 0.3s ease;
    }

    .contact-person51:hover {
        background: rgba(255, 255, 255, 0.9);
        transform: translateX(5px);
    }

    .person-name51 {
        color: var(--primary-blue);
        font-size: 1.3rem;
        font-weight: 700;
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
    }

    .person-name51::before {
        content: '';
        width: 20px;
        height: 20px;
        background-image: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" fill="%23FF2D95" viewBox="0 0 16 16"><path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/></svg>');
        background-size: contain;
        background-repeat: no-repeat;
        margin-right: 0.5rem;
    }

    .contact-info51 {
        display: flex;
        flex-direction: column;
        gap: 0.8rem;
    }

    .contact-item51 {
        display: flex;
        align-items: center;
        color: var(--text-dark);
        font-size: 1rem;
        transition: all 0.3s ease;
    }

    .contact-item51:hover {
        color: var(--primary-pink);
        transform: translateX(5px);
    }

    .contact-item51 .icon51 {
        width: 35px;
        height: 35px;
        background: var(--primary-pink);
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 1rem;
        font-size: 0.9rem;
        flex-shrink: 0;
    }

    .contact-item51 .text51 {
        flex: 1;
        font-weight: 500;
    }

    .contact-item51 a {
        color: inherit;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .contact-item51 a:hover {
        color: var(--primary-blue);
        text-decoration: underline;
    }

    @media (max-width: 768px) {
        .header51 h1 {
            font-size: 2.2rem;
        }

        .header51 h2 {
            font-size: 1.2rem;
        }

        .contact-content51 {
            padding: 2rem 1rem;
        }

        .contacts-grid51 {
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }

        .contact-card51 {
            padding: 2rem;
        }

        .person-name51 {
            font-size: 1.1rem;
        }
    }

    .floating-elements51 {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
        overflow: hidden;
    }

    .floating-element51 {
        position: absolute;
        background: var(--primary-pink);
        border-radius: 50%;
        opacity: 0.05;
        animation: float 6s ease-in-out infinite;
    }

    .floating-element51:nth-child(1) {
        width: 20px;
        height: 20px;
        top: 20%;
        left: 10%;
        animation-delay: 0s;
    }

    .floating-element51:nth-child(2) {
        width: 15px;
        height: 15px;
        top: 60%;
        right: 15%;
        animation-delay: 2s;
    }

    .floating-element51:nth-child(3) {
        width: 25px;
        height: 25px;
        bottom: 30%;
        left: 20%;
        animation-delay: 4s;
    }

    @keyframes float {

        0%,
        100% {
            transform: translateY(0px) rotate(0deg);
        }

        50% {
            transform: translateY(-20px) rotate(180deg);
        }
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

    body {
        background: linear-gradient(135deg, var(--light-blue) 0%, #ffffff 50%, #f8f9fa 100%);
    }
</style>


</head>

<body>


    <!-- content start -->
    <section class="committee-hero">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="display-4 fw-bold mb-3">
                        <i class="bi bi-people me-3"></i>
                        Reach Us
                    </h1>
                    <p class="lead mb-4">CONTACT US</p>
                </div>
            </div>
        </div>
    </section>
    <div class="contact-container51">
        <div class="floating-elements51">
            <div class="floating-element51"></div>
            <div class="floating-element51"></div>
            <div class="floating-element51"></div>
        </div>

        <div class="contact-content51">
            <div class="important-notice51">
                <h3>Important Contact:</h3>
            </div>

            <div class="contacts-grid51">
                <!-- Conference Chair & Convenor Card -->
                <div class="contact-card51">
                    <div class="card-header51">
                        <div class="card-icon51 text-white"><i class="bi bi-bullseye"></i></div>
                        <div class="card-title51">CONFERENCE CHAIR & CONVENOR</div>
                    </div>

                    <div class="contact-person51 ">
                        <div class="person-name51">Shri. Himanshu Mohan</div>
                        <div class="contact-info51">
                            <div class="contact-item51">
                                <div class="icon51"><i class="bi bi-envelope-fill"></i></div>
                                <div class="text51">
                                    <a href="mailto:himanshu@nielit.gov.in">himanshu@nielit.gov.in</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="contact-person51">
                        <div class="person-name51">Dr. Smita Sharma</div>
                        <div class="contact-info51">
                            <div class="contact-item51">
                                <div class="icon51"><i class="bi bi-telephone-fill"></i></div>
                                <div class="text51">
                                    <a href="tel:+919650339961">+91 9650339961</a>
                                </div>
                            </div>
                            <div class="contact-item51">
                                <div class="icon51"><i class="bi bi-envelope-fill"></i></div>
                                <div class="text51">
                                    <a href="mailto:sc-academics@nielit.gov.in">sc-academics@nielit.gov.in</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="contact-person51">
                        <div class="person-name51">Dr. Suman Avdhesh Yadav</div>
                        <div class="contact-info51">
                            <div class="contact-item51">
                                <div class="icon51"><i class="bi bi-telephone-fill"></i></div>
                                <div class="text51">
                                    <a href="tel:+919910719256">+91 9910719256</a>
                                </div>
                            </div>
                            <div class="contact-item51">
                                <div class="icon51"><i class="bi bi-envelope-fill"></i></div>
                                <div class="text51">
                                    <a href="mailto:suman.avdheshyadav@gmail.com">suman.avdheshyadav@gmail.com</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Registration Queries Card -->
                <div class="contact-card51">
                    <div class="card-header51">
                        <div class="card-icon51 text-white"><i class="bi bi-pencil-square"></i></div>
                        <div class="card-title51">FOR REGISTRATION RELATED QUERIES</div>
                    </div>

                    <div class="contact-person51">
                        <div class="person-name51">Dr. Smita Sharma</div>
                        <div class="contact-info51">
                            <div class="contact-item51">
                                <div class="icon51"><i class="bi bi-telephone-fill"></i></div>
                                <div class="text51">
                                    <a href="tel:+919650339961">+91 9650339961</a>
                                </div>
                            </div>
                            <div class="contact-item51">
                                <div class="icon51"><i class="bi bi-envelope-fill"></i></div>
                                <div class="text51">
                                    <a href="mailto:sc-academics@nielit.gov.in">sc-academics@nielit.gov.in</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="contact-person51">
                        <div class="person-name51">Dr. Suman Avdhesh Yadav</div>
                        <div class="contact-info51">
                            <div class="contact-item51">
                                <div class="icon51"><i class="bi bi-telephone-fill"></i></div>
                                <div class="text51">
                                    <a href="tel:+919910719256">+91 9910719256</a>
                                </div>
                            </div>
                            <div class="contact-item51">
                                <div class="icon51"><i class="bi bi-envelope-fill"></i></div>
                                <div class="text51">
                                    <a href="mailto:suman.avdheshyadav@gmail.com">suman.avdheshyadav@gmail.com</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                                    Jaypee Residency Manor, Road Barlow Ganj, Mussoorie, Uttarakhand 248122,
                                    India</h3>
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
                                            <h6 class="fw-bold text-warning mb-2">Rolling Acceptance (Round 1)
                                            </h6>
                                            <p class="mb-0">28<sup>th</sup> February 2026</p>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="date-card  backdrop-blur rounded-3 p-4 highlight-cardf">
                                            <h6 class="fw-bold text-warning mb-2">Rolling Acceptance (Round 2)
                                            </h6>
                                            <p class="mb-0">31<sup>st</sup> March 2026</p>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="date-card   rounded-3 p-4 highlight-cardf">
                                            <h6 class="fw-bold text-warning mb-2">Rolling Acceptance (Round 3)
                                            </h6>
                                            <p class="mb-0">31<sup>st</sup> May 2026</p>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="date-card  rounded-3 p-4 highlight-cardf">
                                            <h6 class="fw-bold text-warning mb-2">Rolling Acceptance (Round 4)
                                            </h6>
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
                                        <h3 class="display-6 fw-bold mb-0">30<sup>th</sup> - 31<sup>st</sup>
                                            October 2026
                                        </h3>
                                    </div>
                                </div>

                                <div class="note mt-4">
                                    <p class="small text-warning-50">
                                        <i class="bi bi-info-circle me-1"></i>
                                        <strong>Note:</strong> Papers accepted in Round 1, 2 and 3 of Rolling
                                        Acceptance
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