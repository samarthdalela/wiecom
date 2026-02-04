<?php include 'header.php'; ?>
<style>
    :root {
        --primary-blue: rgba(70, 12, 82, 0.99);
        --accent-blue: rgba(91, 2, 109, 0.99);
        --light-blue: rgba(232, 217, 235, 0.99);
        --gold: rgba(171, 103, 186, 0.78);
        --text-dark: #2c3e50;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .registration-container50 {
        max-width: 1200px;
        margin: 20 auto;
        background: white;
        border-radius: 20px;
        box-shadow: 0 20px 60px rgba(70, 12, 82, 0.15);
        overflow: hidden;
        position: relative;
        margin-top: 30px;

    }

    .registration-container50::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 6px;
        background: linear-gradient(90deg, var(--primary-blue), var(--accent-blue), var(--gold));

    }

    .header50 {
        background: linear-gradient(135deg, var(--primary-blue), var(--accent-blue));
        color: white;
        text-align: center;
        padding: 3rem 2rem;
        position: relative;
        overflow: hidden;
    }

    .header50::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
        animation: float 6s ease-in-out infinite;
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

    .header50 h1 {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
        position: relative;
        z-index: 2;
    }

    .header50 p {
        font-size: 1.1rem;
        opacity: 0.9;
        position: relative;
        z-index: 2;
    }

    .content50 {
        padding: 3rem 2rem;
    }

    .notice50 {
        background: var(--light-blue);
        border-left: 5px solid var(--gold);
        padding: 1.5rem;
        margin-bottom: 2rem;
        border-radius: 0 10px 10px 0;
        font-style: italic;
        color: var(--text-dark);
        position: relative;
    }

    .notice50::before {
        content: '';
        position: absolute;
        left: -15px;
        top: 50%;
        transform: translateY(-50%);
        background: var(--gold);
        width: 30px;
        height: 30px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1rem;
        font-family: 'bootstrap-icons';
    }

    .table-container50 {
        overflow-x: auto;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(70, 12, 82, 0.1);
        background: white;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        font-size: 0.95rem;
    }

    th {
        background: linear-gradient(135deg, var(--primary-blue), var(--accent-blue));
        color: white;
        padding: 1.2rem 1rem;
        text-align: center;
        font-weight: 600;
        position: relative;
    }

    th:first-child {
        /* text-align: left; */
        padding-left: 1.5rem;
    }

    .category-header50 {
        background: var(--gold) !important;
        color: white;
        font-size: 1.1rem;
        font-weight: 700;
    }

    .sub-header50 {
        background: linear-gradient(135deg, rgba(70, 12, 82, 0.8), rgba(91, 2, 109, 0.8)) !important;
        font-size: 0.9rem;
    }

    td {
        padding: 1rem;
        text-align: center;
        border-bottom: 1px solid #eee;
        transition: background-color 0.3s ease;
        position: relative;
    }

    td:first-child {
        /* text-align: left; */
        font-weight: 600;
        color: var(--text-dark);
        padding-left: 1.5rem;
    }

    /* Simplified row hover - only background color change */
    tr:hover td {
        background: var(--light-blue);
    }

    .price50 {
        font-weight: 700;
        color: var(--primary-blue);
        position: relative;
    }

    /* Keep the simple underline animation for price cells */
    .price50::before {
        content: '';
        position: absolute;
        bottom: -2px;
        left: 50%;
        transform: translateX(-50%);
        width: 0;
        height: 2px;
        background: var(--gold);
        transition: width 0.3s ease;
    }

    tr:hover .price50::before {
        width: 100%;
    }

    .section-divider50 {
        background: var(--light-blue) !important;
        font-weight: 700;
        color: var(--primary-blue);
        font-size: 1.1rem;
    }

    .register-btn50 {
        display: inline-block;
        background: linear-gradient(135deg, var(--primary-blue), var(--accent-blue));
        color: white;
        padding: 1rem 2rem;
        border-radius: 50px;
        text-decoration: none;
        font-weight: 600;
        margin-top: 2rem;
        transition: all 0.3s ease;
        box-shadow: 0 5px 20px rgba(70, 12, 82, 0.3);
    }

    .register-btn50:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 30px rgba(70, 12, 82, 0.4);
    }

    .early-bird50 {
        position: relative;
        padding-top: 10px;
    }

    .early-bird50::after {
        content: '';
        position: absolute;
        top: -10px;
        right: 10px;
        background: var(--gold);
        color: white;
        padding: 0.3rem 0.8rem;
        border-radius: 15px;
        font-size: 0.8rem;
        font-weight: 600;
    }

    @media (max-width: 768px) {
        .header50 h1 {
            font-size: 2rem;
        }

        .content50 {
            padding: 2rem 1rem;
        }

        table {
            font-size: 0.85rem;
        }

        th,
        td {
            padding: 0.8rem 0.5rem;
        }
    }

    .highlight-animation50 {
        animation: highlight 2s ease-in-out infinite;
    }

    @keyframes highlight {

        0%,
        100% {
            box-shadow: 0 0 0 0 rgba(171, 103, 186, 0.4);
        }

        50% {
            box-shadow: 0 0 0 10px rgba(171, 103, 186, 0);
        }
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


    /* content style ends herer  */
</style>


</head>

<body>

    <!-- content start -->
    <section class="committee-hero">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="display-4 fw-bold mb-3">
                        <i class="bi bi-person-plus me-3"></i>
                        Registration
                    </h1>
                    <p class="lead mb-4">Secure your spot at the premier academic conference</p>
                </div>
            </div>
        </div>
    </section>
    <center>
        <div class="registration-container50 py-3">

            <div class="content50">
                <div class="notice50">
                    <strong>Important:</strong> Paper Registration Category must be selected as per the affiliation of
                    First Author only.<br> Authors must provide copy of IEEE MEMBERSHIP CARD if selecting IEEE Member
                    category.
                </div>

                <div class="table-container50">
                    <table>
                        <thead>
                            <tr>
                                <th rowspan="3">Category</th>
                                <!-- <th colspan="4" class="category-header50 early-bird50">Early Bird
                                    Registration<br>(Before 1 September 2025)</th> -->
                                <th colspan="4" class="category-header50">Registration Fees</th>
                            </tr>
                            <tr>
                                <!-- <th colspan="2" class="sub-header50">Academia/Professionals</th>
                                <th colspan="2" class="sub-header50">Students (UG/PG)</th> -->
                                <th colspan="2" class="sub-header50">Academia/Professionals</th>
                                <th colspan="2" class="sub-header50">Students (UG/PG)</th>
                            </tr>
                            <tr>
                                <!-- <th class="sub-header50">IEEE Member</th>
                                <th class="sub-header50">Non-Member</th>
                                <th class="sub-header50">IEEE Member</th>
                                <th class="sub-header50">Non-Member</th> -->
                                <th class="sub-header50">IEEE Member</th>
                                <th class="sub-header50">Non-Member</th>
                                <th class="sub-header50">IEEE Member</th>
                                <th class="sub-header50">Non-Member</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="section-divider50" colspan="9"><strong>Indian Delegates</strong></td>
                            </tr>
                            <tr>
                                <td><strong>Presenter</strong></td>
                                <!-- <td class="price50">INR 9,000</td>
                                <td class="price50">INR 10,000</td>
                                <td class="price50">INR 7,000</td>
                                <td class="price50">INR 8,000</td> -->
                                <td class="price50">INR 10,000</td>
                                <td class="price50">INR 11,000</td>
                                <td class="price50">INR 8,000</td>
                                <td class="price50">INR 9,000</td>
                            </tr>
                            <tr>
                                <td><strong>Listener</strong></td>
                                <!-- <td class="price50">INR 4,000</td>
                                <td class="price50">INR 5,000</td>
                                <td class="price50">INR 3,000</td>
                                <td class="price50">INR 4,000</td> -->
                                <td class="price50">INR 5,000</td>
                                <td class="price50">INR 6,000</td>
                                <td class="price50">INR 4,000</td>
                                <td class="price50">INR 5,000</td>
                            </tr>
                            <!-- <tr> -->
                            <!-- <td><strong>Ph.D. Colloquium</strong></td> -->
                            <!-- <td class="price50">INR 2,500</td>
                                <td class="price50">INR 2,500</td>
                                <td class="price50">INR 2,500</td>
                                <td class="price50">INR 2,500</td> -->
                            <!-- <td class="price50">INR 2,500</td>
                                <td class="price50">INR 2,500</td>
                                <td class="price50">INR 2,500</td>
                                <td class="price50">INR 2,500</td> -->
                            <!-- </tr> -->
                            <tr>
                                <td class="section-divider50" colspan="9"><strong>Foreign Delegates</strong></td>
                            </tr>
                            <tr>
                                <td><strong>Presenter</strong></td>
                                <td class="price50">USD 300</td>
                                <!-- <td class="price50">USD 400</td>
                                <td class="price50">USD 200</td>
                                <td class="price50">USD 300</td>
                                <td class="price50">USD 350</td> -->
                                <td class="price50">USD 450</td>
                                <td class="price50">USD 250</td>
                                <td class="price50">USD 350</td>
                            </tr>
                            <tr>
                                <td><strong>Listener</strong></td>
                                <!-- <td class="price50">USD 150</td>
                                <td class="price50">USD 200</td>
                                <td class="price50">USD 100</td>
                                <td class="price50">USD 150</td> -->
                                <td class="price50">USD 200</td>
                                <td class="price50">USD 250</td>
                                <td class="price50">USD 150</td>
                                <td class="price50">USD 200</td>
                            </tr>
                            <!-- <tr> -->
                            <!-- <td><strong>Ph.D. Colloquium</strong></td> -->
                            <!-- <td class="price50">USD 100</td>
                                <td class="price50">USD 100</td>
                                <td class="price50">USD 100</td>
                                <td class="price50">USD 100</td> -->
                            <!-- <td class="price50">USD 100</td>
                                <td class="price50">USD 100</td>
                                <td class="price50">USD 100</td>
                                <td class="price50">USD 100</td> -->
                            <!-- </tr> -->
                        </tbody>
                    </table>
                </div>

                <div style="text-align: center; margin-top: 3rem;">
                    <a href="./close.php" class="register-btn50 highlight-animation50">REGISTER NOW</a>
                </div>
            </div>
        </div>
    </center>

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

    <?php include 'subFooter.php'; ?>
    <?php include 'footer.php'; ?>