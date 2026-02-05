<?php include 'header.php'; ?>
<style>
    /* Call for Paper page specific styles */

    .body52 {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        line-height: 1.6;
        color: var(--text-dark);
        background: linear-gradient(135deg, var(--light-blue) 0%, #ffffff 50%, #f8f9fa 100%);
        min-height: 100vh;
    }

    .container52 {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }

    .welcome52 {
        font-size: 1.2rem;
        color: var(--primary-pink);
        font-style: italic;
    }

    .main-content52 {
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(15px);
        border-radius: 20px;
        padding: 3rem;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.05);
        margin-bottom: 2rem;
    }

    .section-title52 {
        font-size: 2.5rem;
        color: var(--text-dark);
        margin-bottom: 2rem;
        text-align: center;
        position: relative;
    }

    .section-title52::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 4px;
        background: var(--gradient-pink-blue);
        border-radius: 2px;
    }

    .tracks-grid52 {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        gap: 2rem;
        margin-top: 3rem;
    }

    .track-card52 {
        background: linear-gradient(135deg, rgba(255, 45, 149, 0.02), rgba(0, 150, 199, 0.02));
        border: 2px solid rgba(255, 45, 149, 0.1);
        border-radius: 16px;
        padding: 2rem;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .track-card52::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: var(--gradient-pink-blue);
    }

    .track-card52:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 40px rgba(255, 45, 149, 0.15);
        border-color: var(--primary-pink);
    }

    .track-title52 {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--primary-blue);
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
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

    .track-title52::before {
        font-family: 'bootstrap-icons';
        content: '\F1E9';
        margin-right: 0.5rem;
        font-size: 1.2rem;
        color: var(--primary-pink);
    }

    /* Technical content-relevant Bootstrap icons with pink theme */
    .track-card52:nth-child(1) .track-title52::before {
        content: '\F1E9';
    }

    .track-card52:nth-child(2) .track-title52::before {
        content: '\F5B8';
    }

    .track-card52:nth-child(3) .track-title52::before {
        content: '\F587';
    }

    .track-card52:nth-child(4) .track-title52::before {
        content: '\F1E3';
    }

    .track-card52:nth-child(5) .track-title52::before {
        content: '\F59A';
    }

    .track-card52:nth-child(6) .track-title52::before {
        content: '\F26A';
    }

    .track-card52:nth-child(7) .track-title52::before {
        content: '\F1C1';
    }

    .track-card52:nth-child(8) .track-title52::before {
        content: '\F325';
    }

    .track-card52:nth-child(9) .track-title52::before {
        content: '\F1FE';
    }

    .track-card52:nth-child(10) .track-title52::before {
        content: '\F4E3';
    }

    .track-card52:nth-child(11) .track-title52::before {
        content: '\F585';
    }

    .track-card52:nth-child(12) .track-title52::before {
        content: '\F15E';
    }

    .track-card52:nth-child(13) .track-title52::before {
        content: '\F4C4';
    }

    .track-card52:nth-child(14) .track-title52::before {
        content: '\F4EC';
    }

    .track-description52 {
        color: var(--text-dark);
        line-height: 1.8;
        font-size: 0.95rem;
    }

    .highlight52 {
        background: rgba(255, 45, 149, 0.05);
        padding: 0.2rem 0.5rem;
        border-radius: 4px;
        font-weight: 600;
        color: var(--primary-pink);
    }

    .footer52 {
        text-align: center;
        padding: 2rem 0;
        color: var(--primary-blue);
        font-size: 0.9rem;
    }

    .floating-elements52 {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
        z-index: -1;
    }

    .floating-circle52 {
        position: absolute;
        border-radius: 50%;
        background: rgba(255, 45, 149, 0.05);
        animation: float52 6s ease-in-out infinite;
    }

    .floating-circle52:nth-child(1) {
        width: 80px;
        height: 80px;
        top: 20%;
        left: 10%;
        animation-delay: 0s;
    }

    .floating-circle52:nth-child(2) {
        width: 120px;
        height: 120px;
        top: 60%;
        right: 10%;
        animation-delay: 2s;
    }

    .floating-circle52:nth-child(3) {
        width: 60px;
        height: 60px;
        bottom: 20%;
        left: 20%;
        animation-delay: 4s;
    }

    @keyframes float52 {

        0%,
        100% {
            transform: translateY(0px) rotate(0deg);
        }

        50% {
            transform: translateY(-20px) rotate(180deg);
        }
    }

    .scroll-indicator52 {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 4px;
        background: rgba(255, 255, 255, 0.2);
        z-index: 1000;
    }

    .scroll-progress52 {
        height: 100%;
        background: var(--gradient-pink-blue);
        width: 0%;
        transition: width 0.3s ease;
    }

    @media (max-width: 768px) {
        .title52 {
            font-size: 2.5rem;
        }

        .tracks-grid52 {
            grid-template-columns: 1fr;
        }

        .main-content52 {
            padding: 1.5rem;
        }

        .track-card52 {
            padding: 1.5rem;
        }
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
                        <i class="fas fa-file-signature me-3"></i>
                        CALL FOR PAPERS
                    </h1>
                    <p class="lead mb-0">UPWIECON 2026 | International Conference on Emerging Technologies</p>
                </div>
            </div>
        </div>
    </section>
    <div class="floating-elements52">
        <div class="floating-circle52"></div>
        <div class="floating-circle52"></div>
        <div class="floating-circle52"></div>
    </div>

    <div class="scroll-indicator52">
        <div class="scroll-progress52" id="scrollProgress52"></div>
    </div>

    <div class="container52 my-4">
        <!-- <header class="header52">
        <h1 class="title52">UPWIECON2026</h1>
        <p class="subtitle52">International Conference on Emerging Technologies</p>
        <p class="welcome52">Welcome to UPWIECON2026!!!</p>
      </header> -->
        <div class="floating-elements51">
            <div class="floating-element51"></div>
            <div class="floating-element51"></div>
            <div class="floating-element51"></div>
        </div>
        <main class="main-content52">
            <h2 class="section-title52">Call for Papers</h2>
            <p style="text-align: center; font-size: 1.2rem; color: #666; margin-bottom: 2rem;">
                Dear Prospective Authors, we invite you to submit your research papers across our diverse conference
                tracks!
            </p>

            <div class="tracks-grid52">
                <div class="track-card52">
                    <h3 class="track-title52">Electronics Devices, Circuits and Systems</h3>
                    <p class="track-description52 textCenter">
                        Covering <span class="highlight52">micro and nanoelectronics</span>, circuit theory and design,
                        simulation, CAD,
                        VLSI design, novel electronic devices, <span class="highlight52">nanoelectronics and
                            MEMs</span>, device characterization,
                        test and measurement techniques, and industrial applications.
                    </p>
                </div>

                <div class="track-card52">
                    <h3 class="track-title52">Network Technologies and Systems</h3>
                    <p class="track-description52 textCenter">
                        Focus on <span class="highlight52">ad-hoc networks</span>, mesh networks, wireless systems,
                        coding techniques, network performance, security, <span class="highlight52">vehicular
                            networks</span>,
                        sensor networks, and wireless multimedia communication.
                    </p>
                </div>

                <div class="track-card52">
                    <h3 class="track-title52">Signal Processing</h3>
                    <p class="track-description52 textCenter">
                        Including <span class="highlight52">biomedical signal processing</span>, bio-inspired systems,
                        audio processing, speech recognition, modern signal processing theory,
                        <span class="highlight52">array processing</span>, and detection techniques.
                    </p>
                </div>

                <div class="track-card52">
                    <h3 class="track-title52">Data Mining and Big Data Analysis</h3>
                    <p class="track-description52 textCenter">
                        Covering data preprocessing, <span class="highlight52">machine learning</span>, clustering,
                        classification,
                        knowledge discovery, <span class="highlight52">cloud computing for BigData</span>,
                        Hadoop, MapReduce, and security aspects.
                    </p>
                </div>

                <div class="track-card52">
                    <h3 class="track-title52">Communication Technologies and Systems</h3>
                    <p class="track-description52 textCenter">
                        Topics include <span class="highlight52">adaptive modulation</span>, MIMO systems,
                        RF & antenna design, software-defined radio, <span class="highlight52">optical
                            communication</span>,
                        cooperative communication, and green communication.
                    </p>
                </div>

                <div class="track-card52">
                    <h3 class="track-title52">Bioinformatics and Machine Learning</h3>
                    <p class="track-description52 textCenter">
                        Featuring <span class="highlight52">next generation sequencing</span>, protein structure
                        prediction,
                        biological networks, biomedical literature mining, <span class="highlight52">drug design</span>,
                        and biological databases.
                    </p>
                </div>

                <div class="track-card52">
                    <h3 class="track-title52">Multimedia Processing Technologies</h3>
                    <p class="track-description52 textCenter">
                        Encompassing <span class="highlight52">image and video processing</span>, biomedical imaging,
                        multimedia communications, <span class="highlight52">compression techniques</span>,
                        biometrics, and applications for differently-abled individuals.
                    </p>
                </div>

                <div class="track-card52">
                    <h3 class="track-title52">Power Systems</h3>
                    <p class="track-description52 textCenter">
                        Comprehensive coverage of all <span class="highlight52">power system technologies</span>,
                        including generation, transmission, distribution, smart grids,
                        and <span class="highlight52">renewable energy integration</span>.
                    </p>
                </div>

                <div class="track-card52">
                    <h3 class="track-title52">Language Technologies and Information Retrieval</h3>
                    <p class="track-description52 textCenter">
                        Including <span class="highlight52">language modeling</span>, machine translation,
                        document summarization, <span class="highlight52">Indic languages</span>,
                        question-answering systems, and contextual search.
                    </p>
                </div>

                <div class="track-card52">
                    <h3 class="track-title52">Machines and Instrumentation</h3>
                    <p class="track-description52 textCenter">
                        Covering all aspects of <span class="highlight52">mechanical systems</span>,
                        precision instrumentation, measurement techniques,
                        and <span class="highlight52">industrial automation</span>.
                    </p>
                </div>

                <div class="track-card52">
                    <h3 class="track-title52">Robotics and Artificial Intelligence</h3>
                    <p class="track-description52 textCenter">
                        Including <span class="highlight52">aerial robotics</span>, autonomous vehicles,
                        humanoid robotics, computer vision, <span class="highlight52">machine learning
                            techniques</span>,
                        surgical robotics, and human-robot interaction.
                    </p>
                </div>

                <div class="track-card52">
                    <h3 class="track-title52">Power Electronics and Control Engineering</h3>
                    <p class="track-description52 textCenter">
                        Covering <span class="highlight52">power converters</span>, electrical drives,
                        renewable energy systems, <span class="highlight52">intelligent control</span>,
                        neural networks, and industrial process control.
                    </p>
                </div>

                <div class="track-card52">
                    <h3 class="track-title52">Semiconductors: Technologies, Trends, and Applications</h3>
                    <p class="track-description52 textCenter">
                        Featuring <span class="highlight52">next-generation materials</span>, nanoelectronics,
                        AI-driven design, <span class="highlight52">5G and IoT applications</span>,
                        optoelectronics, and sustainable solutions.
                    </p>
                </div>

                <div class="track-card52">
                    <h3 class="track-title52">Assistive Technology for Divyangjan</h3>
                    <p class="track-description52 textCenter">
                        Including <span class="highlight52">brain-computer interfaces</span>,
                        augmentative communication, assistive devices,
                        <span class="highlight52">bioelectronics</span>, telemedicine, and inclusive ICT solutions.
                    </p>
                </div>
            </div>
        </main>

        <footer class="footer52">
            <p>&copy; 2026 UPWIECON 2026. All rights reserved. | Submit your papers and be part of cutting-edge
                research!
            </p>
        </footer>
    </div>



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