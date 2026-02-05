<?php include 'header.php'; ?>

<style>
    .textCenter {
        text-align: justify;
    }

    .venue-section {
        background-image: url("images/caption.jpg");
        /* background-image: url("images/nd.jpg"); */
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

    /* Removed local header/footer/navbar overrides to match global style.css */


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

    /* new stayle end here */

    body {
        background: linear-gradient(135deg, var(--light-blue) 0%, #ffffff 50%, #f8f9fa 100%);
        color: var(--text-dark);
    }

    .text-primary {
        color: var(--primary-blue) !important;
    }

    .text-success {
        color: var(--accent-blue) !important;
    }

    .text-info {
        color: var(--primary-blue) !important;
    }

    .text-warning {
        color: var(--gold) !important;
    }

    /* Restored :root variables for page content */
    .bg-success {
        background-color: var(--accent-blue) !important;
    }

    .bg-success.bg-opacity-10 {
        background-color: var(--light-blue) !important;
    }

    .bg-primary {
        background-color: var(--primary-blue) !important;
    }

    .bg-light {
        background-color: var(--light-blue) !important;
    }

    .border-success {
        border-color: var(--accent-blue) !important;
    }

    .border-primary {
        border-color: var(--primary-blue) !important;
    }

    .border-info {
        border-color: var(--primary-blue) !important;
    }

    .border-warning {
        border-color: var(--gold) !important;
    }

    .border-start.border-success {
        border-left-color: var(--accent-blue) !important;
    }

    .border-start.border-info {
        border-left-color: var(--primary-blue) !important;
    }

    .badge.bg-success {
        background-color: var(--accent-blue) !important;
    }

    .badge.bg-primary {
        background-color: var(--primary-blue) !important;
    }

    .btn-outline-primary {
        color: var(--primary-blue);
        border-color: var(--primary-blue);
    }

    .btn-outline-primary:hover {
        background-color: var(--primary-blue);
        border-color: var(--primary-blue);
    }

    .alert-info {
        background-color: var(--light-blue);
        border-color: var(--primary-blue);
        color: var(--text-dark);
    }

    .alert-light {
        background-color: #f8f9fa;
        border-color: var(--light-blue);
        color: var(--text-dark);
    }

    a {
        color: var(--accent-blue);
    }

    a:hover {
        color: var(--primary-blue);
    }

    .card-header {
        border-bottom: 1px solid var(--light-blue);
    }


    body5 {
        font-family: 'Arial', sans-serif;
        background: linear-gradient(135deg, var(--light-blue) 0%, #ffffff 100%);
        min-height: 100vh;
        padding: 40px 20px;
    }

    .container5 {
        max-width: 1400px;
        margin: 0 auto;
    }

    .header5 {
        text-align: center;
        margin-bottom: 60px;
    }

    .main-title5 {
        font-size: 3.5rem;
        font-weight: bold;
        color: var(--primary-blue);
        margin-bottom: 20px;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
    }

    .subtitle5 {
        font-size: 1.3rem;
        color: var(--text-dark);
        opacity: 0.8;
        max-width: 600px;
        margin: 0 auto;
        line-height: 1.6;
    }

    .sessions-grid5 {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(600px, 1fr));
        gap: 40px;
        margin-bottom: 40px;
    }

    .session-card5 {
        background: white;
        border-radius: 20px;
        padding: 40px;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        transition: all 0.4s ease;
        border: 3px solid transparent;
        position: relative;
        overflow: hidden;
    }

    .session-card5::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 6px;
        background: linear-gradient(90deg, var(--primary-blue), var(--accent-blue), var(--primarySecond));
    }

    .session-card5:hover {
        transform: translateY(-10px);
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
        border-color: var(--primarySecond);
    }

    .session-header5 {
        text-align: center;
        margin-bottom: 35px;
    }

    .session-number5 {
        display: inline-block;
        background: linear-gradient(135deg, var(--primary-blue), var(--accent-blue));
        color: white;
        padding: 12px 25px;
        border-radius: 25px;
        font-size: 1.1rem;
        font-weight: bold;
        margin-bottom: 15px;
        box-shadow: 0 4px 15px rgba(70, 12, 82, 0.3);
    }

    .session-title5 {
        font-size: 2rem;
        color: var(--text-dark);
        font-weight: bold;
        margin-bottom: 10px;
    }

    .session-description5 {
        color: var(--text-dark);
        opacity: 0.7;
        font-size: 1.1rem;
        line-height: 1.5;
    }

    .speakers-grid5 {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 25px;
        margin-top: 30px;
    }

    .speaker-card5 {
        background: var(--light-blue);
        border-radius: 15px;
        padding: 25px;
        text-align: center;
        transition: all 0.3s ease;
        border: 2px solid transparent;
    }

    .speaker-card5:hover {
        background: white;
        border-color: var(--primarySecond);
        transform: scale(1.02);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
    }

    .speaker-image5 {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        margin: 0 auto 20px;
        background: linear-gradient(135deg, var(--primary-blue), var(--accent-blue));
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 2.5rem;
        font-weight: bold;
        border: 4px solid var(--primarySecond);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
    }

    .speaker-name5 {
        font-size: 1.3rem;
        font-weight: bold;
        color: var(--primary-blue);
        margin-bottom: 8px;
    }

    .speaker-title5 {
        color: var(--text-dark);
        opacity: 0.8;
        font-size: 1rem;
        line-height: 1.4;
    }

    .session-card5:nth-child(1) .session-number5 {
        /* background: linear-gradient(135deg, #e74c3c, #c0392b); */
        background: linear-gradient(135deg, var(--primarySecond), #e67e22);
    }

    .session-card5:nth-child(2) .session-number5 {
        /* background: linear-gradient(135deg, #27ae60, #229954); */
        background: linear-gradient(135deg, var(--primarySecond), #e67e22);
    }

    .session-card5:nth-child(3) .session-number5 {
        /* background: linear-gradient(135deg, #3498db, #2980b9); */
        background: linear-gradient(135deg, var(--primarySecond), #e67e22);
    }

    .session-card5:nth-child(4) .session-number5 {
        background: linear-gradient(135deg, var(--primarySecond), #e67e22);
    }

    .time-badge5 {
        display: inline-block;
        background: var(--primarySecond);
        color: white;
        padding: 8px 16px;
        border-radius: 20px;
        font-size: 0.9rem;
        font-weight: bold;
        margin-top: 15px;
    }

    @media (max-width: 768px) {
        .main-title5 {
            font-size: 2.5rem;
        }

        .sessions-grid5 {
            grid-template-columns: 1fr;
            gap: 30px;
        }

        .session-card5 {
            padding: 25px;
        }

        .speakers-grid5 {
            grid-template-columns: 1fr;
        }
    }

    /* new styles for the section start */
    body5 {
        font-family: 'Arial', sans-serif;
        background: linear-gradient(135deg, var(--light-blue) 0%, #ffffff 100%);
        min-height: 100vh;
        padding: 40px 20px;
    }

    .container5 {
        max-width: 1400px;
        margin: 0 auto;
    }

    .header5 {
        text-align: center;
        margin-bottom: 60px;
    }

    .main-title5 {
        font-size: 3.5rem;
        font-weight: bold;
        color: var(--primary-blue);
        margin-bottom: 20px;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
    }

    .subtitle5 {
        font-size: 1.3rem;
        color: var(--text-dark);
        opacity: 0.8;
        max-width: 600px;
        margin: 0 auto;
        line-height: 1.6;
    }

    .sessions-grid5 {
        display: flex;
        flex-direction: column;
        gap: 40px;
        margin-bottom: 40px;
    }

    .session-card5 {
        background: white;
        border-radius: 20px;
        padding: 40px;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        transition: all 0.4s ease;
        border: 3px solid transparent;
        position: relative;
        overflow: hidden;
        width: 100%;
    }

    .session-card5::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 6px;
        background: var(--gradient-pink-blue);
    }

    .session-card5:hover {
        transform: translateY(-10px);
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
        border-color: var(--primary-pink);
    }

    .session-header5 {
        text-align: center;
        margin-bottom: 35px;
    }

    .session-number5 {
        display: inline-block;
        background: var(--gradient-pink-blue);
        color: white;
        padding: 12px 25px;
        border-radius: 25px;
        font-size: 1.1rem;
        font-weight: bold;
        margin-bottom: 15px;
        box-shadow: 0 4px 15px rgba(255, 45, 149, 0.3);
    }

    .session-title5 {
        font-size: 2rem;
        color: var(--text-dark);
        font-weight: bold;
        margin-bottom: 10px;
    }

    .session-description5 {
        color: var(--text-dark);
        opacity: 0.7;
        font-size: 1.1rem;
        line-height: 1.5;
    }

    .speakers-grid5 {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 25px;
        margin-top: 30px;
    }

    .speaker-card5 {
        /* background: var(--light-blue); */
        /* background: linear-gradient(135deg,   rgba(91, 2, 109, 0.301)
            ,  rgba(228, 205, 233, 0.301)); */
        background: linear-gradient(90deg, rgba(255, 179, 217, 0.3), rgb(250, 250, 250), rgba(144, 224, 239, 0.3));
        border-radius: 15px;
        padding: 25px;
        text-align: center;
        transition: all 0.3s ease;
        border: 2px solid var(--primary-blue);
    }

    .speaker-card5:hover {
        background: linear-gradient(90deg, rgba(255, 179, 217, 0.5), rgba(144, 224, 239, 0.5));
        border-color: var(--primary-pink);
        transform: scale(1.02);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
    }

    .speaker-image5 {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        margin: 0 auto 20px;
        background: linear-gradient(135deg, var(--primary-blue), var(--accent-blue));
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 2.5rem;
        font-weight: bold;
        border: 4px solid var(--primarySecond);

        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
    }

    .speaker-name5 {
        font-size: 1.3rem;
        font-weight: bold;
        color: var(--primary-blue);
        margin-bottom: 8px;
    }

    .speaker-title5 {
        color: var(--text-dark);
        opacity: 0.8;
        font-size: 1rem;
        line-height: 1.4;
    }

    .session-card5:nth-child(1) .session-number5 {
        background: linear-gradient(135deg, var(--primarySecond), #e67e22);
    }

    .session-card5:nth-child(2) .session-number5 {
        background: linear-gradient(135deg, var(--primarySecond), #e67e22);
    }

    .session-card5:nth-child(3) .session-number5 {
        background: linear-gradient(135deg, var(--primarySecond), #e67e22);
    }

    .session-card5:nth-child(4) .session-number5 {
        background: linear-gradient(135deg, var(--primarySecond), #e67e22);
    }

    .time-badge5 {
        display: inline-block;
        background: var(--primarySecond);
        color: white;
        padding: 8px 16px;
        border-radius: 20px;
        font-size: 0.9rem;
        font-weight: bold;
        margin-top: 15px;
    }

    @media (max-width: 768px) {
        .main-title5 {
            font-size: 2.5rem;
        }

        .session-card5 {
            padding: 25px;
        }

        .speakers-grid5 {
            grid-template-columns: 1fr;
        }
    }

    /* new styles for the section ends */
</style>


</head>

<body>


    <!-- body start  -->

    <section class="committee-hero">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="display-4 fw-bold mb-3">
                        <i class="fas fa-users me-3"></i>
                        SPECIAL SESSIONS
                    </h1>
                    <!-- <p class="lead mb-4">Instructions to Authors</p> -->
                    <!-- <div class="d-flex justify-content-center gap-4 flex-wrap">
                    <div class="text-center">
                        <i class="fas fa-crown fa-2x mb-2"></i>
                        <div>Chief Patrons</div>
                    </div>
                    <div class="text-center">
                        <i class="fas fa-award fa-2x mb-2"></i>
                        <div>Patrons</div>
                    </div>
                    <div class="text-center">
                        <i class="fas fa-cogs fa-2x mb-2"></i>
                        <div>Organizing Committee</div>
                    </div>
                    <div class="text-center">
                        <i class="fas fa-globe fa-2x mb-2"></i>
                        <div>International Advisory</div>
                    </div>
                </div> -->
                </div>
            </div>
        </div>
    </section>
    <div class="container my-5">
        <!-- <div class="card mb-4 border-start border-success border-4">
    <div class="card-header bg-success bg-opacity-10">
        <h2 class="h4 mb-0 text-success"><i class="bi bi-megaphone me-2"></i>Call for Special Sessions</h2>
    </div>
    <div class="card-body textCenter">
        <p class="lead">We are soliciting proposals for special sessions from female academicians and Researchers within the general scope of UPWIECON 2026.</p>
        
        <div class="row mb-4 textCenter">
            <div class="col-md-8">
                <p>The special sessions will take place from <span class="badge bg-success">30-31 October 2026</span> at the same venue as the main conference. It should complement the main technical program and serve to broaden the technical scope of the conference in emerging areas.</p>
                
                <p>The special session topic should be of sufficient significance and importance to attract interest from the researchers and practitioners from both academia and industry. We encourage the prospective special session organizers to submit well-planned proposals that are specific and detailed in justifying relevance and viability.</p>
            </div>
            <div class="col-md-4">
                <div class="card bg-light">
                    <div class="card-body text-center">
                        <i class="bi bi-calendar-event display-4 text-success mb-2"></i>
                        <h5 class="card-title">Special Sessions</h5>
                        <p class="card-text"><strong>30-31 October 2026</strong></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="alert alert-info border-start border-info border-4" role="alert">
            <h5 class="alert-heading"><i class="bi bi-info-circle me-2"></i>Submission Instructions</h5>
            <p class="mb-0">Please submit your proposals (with no more than <strong>3 pages</strong>) in PDF format on or before <strong>31st January 2026</strong> by email in the attached format to the Conference Chair: <a href="mailto:upwiecon@gmail.com" class="text-decoration-none">upwiecon@gmail.com</a>.</p>
        </div>

        <h5 class="text-primary mb-3"><i class="bi bi-file-text me-2"></i>Proposal Format</h5>
        <div class="list-group mb-4">
            <div class="list-group-item d-flex align-items-start">
                <span class="badge bg-primary rounded-pill me-3 mt-1">1</span>
                <span>Title of the Proposed Special Sessions, Special Session Acronym.</span>
            </div>
            <div class="list-group-item d-flex align-items-start">
                <span class="badge bg-primary rounded-pill me-3 mt-1">2</span>
                <span>Brief description of the area of concern (approx. 100 words), with a special focus on why this is an interesting and significant topic.</span>
            </div>
            <div class="list-group-item d-flex align-items-start">
                <span class="badge bg-primary rounded-pill me-3 mt-1">3</span>
                <span>The name and contact information of 2 or 3 special session chairs (highlighting their background) willing to promote and organize sufficient quality submissions to each special session.</span>
            </div>
            <div class="list-group-item d-flex align-items-start">
                <span class="badge bg-primary rounded-pill me-3 mt-1">4</span>
                <span>A list of potential reviewers with affiliations.</span>
            </div>
            <div class="list-group-item d-flex align-items-start">
                <span class="badge bg-primary rounded-pill me-3 mt-1">5</span>
                <span>Brief description of the proposed special session (Include the Abstract, scope, aim, the expected number of submissions, and special session program committee members)</span>
            </div>
            <div class="list-group-item d-flex align-items-start">
                <span class="badge bg-primary rounded-pill me-3 mt-1">6</span>
                <span>All proposals should be submitted by no later than the deadline. Early submission is highly encouraged. Draft Call for Papers (optional).</span>
            </div>
            <div class="list-group-item d-flex align-items-start">
                <span class="badge bg-primary rounded-pill me-3 mt-1">7</span>
                <span>Accepted and successfully presented papers may be eligible to the IEEE Xplore for possible proceedings after the paper has been reviewed.</span>
            </div>
            <div class="list-group-item d-flex align-items-start">
                <span class="badge bg-primary rounded-pill me-3 mt-1">8</span>
                <span>Any other information (e.g., Infrastructure/logistics support required)</span>
            </div>
        </div>

        <h5 class="text-primary mb-3"><i class="bi bi-calendar-check me-2"></i>Important Dates</h5>
        <div class="row g-3">
            <div class="col-md-6">
                <div class="card border-success">
                    <div class="card-body text-center">
                        <i class="bi bi-calendar-plus text-success fs-2 mb-2"></i>
                        <h6 class="card-title">Call Opens</h6>
                        <p class="card-text fw-bold text-success">1 February, 2026</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card border-warning">
                    <div class="card-body text-center">
                        <i class="bi bi-calendar-x text-warning fs-2 mb-2"></i>
                        <h6 class="card-title">Submission Deadline</h6>
                        <p class="card-text fw-bold text-warning">28 February, 2026</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card border-info">
                    <div class="card-body text-center">
                        <i class="bi bi-bell text-info fs-2 mb-2"></i>
                        <h6 class="card-title">Notification of Selection</h6>
                        <p class="card-text fw-bold text-info">10 March, 2026</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card border-primary">
                    <div class="card-body text-center">
                        <i class="bi bi-calendar-event text-primary fs-2 mb-2"></i>
                        <h6 class="card-title">Special Sessions Date</h6>
                        <p class="card-text fw-bold text-primary">30-31 October 2026</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="alert alert-light border mt-4" role="alert">
            <div class="text-center">
                <i class="bi bi-question-circle fs-3 text-muted mb-2"></i>
                <p class="mb-1">For any questions, please feel free to contact the Conference Chairs</p>
                <a href="mailto:ieeeconference@nielit.ac.in" class="btn btn-outline-primary">
                    <i class="bi bi-envelope me-2"></i>ieeeconference@nielit.ac.in
                </a>
            </div>
        </div>
    </div>
</div> -->

        <!-- Footer Note -->
        <!-- <div class="alert alert-light border text-center" role="alert">
    <p class="mb-0 fst-italic text-muted">
        <i class="bi bi-envelope me-2"></i>For any queries regarding submission, please contact the organizing team
    </p>
</div> -->

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
        <div class="body5" style="display:none">
            <div class="container5">
                <div class="header5">
                    <!-- <h1 class="main-title5">Special Sessions</h1> -->
                    <p class="subtitle5">Join our distinguished speakers for exclusive presentations on cutting-edge
                        topics and innovative research</p>
                </div>

                <div class="sessions-grid5">
                    <!-- Special Session 1 -->
                    <div class="session-card5">
                        <div class="session-header5">
                            <div class="session-number5">Special Session 1</div>
                            <h2 class="session-title5">Advanced approaches in Communication, Computer Sciences and
                                Electrical Engineering</h2>
                            <!-- <p class="session-description5">Driving innovation in electrical, electronics, and computing
                                through AI and ML</p> -->
                            <br>
                            <div class="session-number5">Special Session Chairs</div>
                        </div>
                        <div class="speakers-grid5">
                            <div class="speaker-card5">
                                <img src="./images/s1 1.jpeg" alt="" class="speaker-image5">
                                <h3 class="speaker-name5">Dr. Smita Sharma</h3>
                                <p class="speaker-title5">National Institute of Electronics and Information Technology
                                    (NIELIT), India</p>
                            </div>
                            <div class="speaker-card5">
                                <img src="./images/s1 2.jpeg" alt="" class="speaker-image5">
                                <h3 class="speaker-name5">Dr. Suman Avdhesh Yadav</h3>
                                <p class="speaker-title5">IILM University, Greater Noida, India</p>
                            </div>
                        </div>

                        <div class="speakers-grid5">
                            <div class="speaker-card5">
                                <img src="./images/s1 3.jpeg" alt="" class="speaker-image5">
                                <h3 class="speaker-name5">Prof. S Vikram Singh</h3>
                                <p class="speaker-title5">Amity University, Greater Noida, India</p>
                            </div>

                        </div>

                    </div>

                    <!-- Special Session 2 -->
                    <div class="session-card5">
                        <div class="session-header5">
                            <div class="session-number5">Special Session 2</div>
                            <h2 class="session-title5">Artificial Intelligence and Machine Learning for Smart and
                                Intelligent Systems in Electrical, Electronics, and Computer Engineering</h2>
                            <!-- <p class="session-description5">Driving innovation in electrical, electronics, and computing
                                through AI and ML</p> -->
                            <br>
                            <div class="session-number5">Special Session Chairs</div>
                        </div>
                        <div class="speakers-grid5">
                            <div class="speaker-card5">
                                <img src="./images/s2 1.jpeg" alt="" class="speaker-image5">
                                <h3 class="speaker-name5">Dr. Divya Asija</h3>
                                <p class="speaker-title5">Amity University Uttar Pradesh, Noida, India</p>
                            </div>
                            <div class="speaker-card5">
                                <img src="./images/s2 2.jpeg" alt="" class="speaker-image5">
                                <h3 class="speaker-name5">Dr. R.K. Viral</h3>
                                <p class="speaker-title5">Affiliation: Amity University Uttar Pradesh, Noida, India</p>
                            </div>
                        </div>

                        <div class="speakers-grid5">
                            <div class="speaker-card5">
                                <img src="./images/s2 3.jpeg" alt="" class="speaker-image5">
                                <h3 class="speaker-name5">Dr. Hasmat Malik</h3>
                                <p class="speaker-title5">Universiti Teknologi Malaysia (UTM), Malaysia</p>
                            </div>

                        </div>

                    </div>

                    <!-- Special Session 3 -->
                    <div class="session-card5">
                        <div class="session-header5">
                            <div class="session-number5">Special Session 3</div>
                            <h2 class="session-title5">Artificial Intelligence, Machine Learning, Deep Learning, and IoT
                                in Next-Gen Automation</h2>
                            <!-- <p class="session-description5">Integrating AI, ML, DL, and IoT to shape the future of smart
                                systems

                            </p> -->
                            <br>
                            <div class="session-number5">Special Session Chairs</div>
                        </div>
                        <div class="speakers-grid5">
                            <div class="speaker-card5">
                                <img src="./images/s3 1.jpeg" alt="" class="speaker-image5">

                                <h3 class="speaker-name5">Dr. Naina Chaudhary</h3>
                                <p class="speaker-title5">Amity University in Tashkent, Uzbekistan</p>
                            </div>
                            <div class="speaker-card5">
                                <img src="./images/s3 2.jpeg" alt="" class="speaker-image5">
                                <h3 class="speaker-name5">Dr. Danish Ather</h3>
                                <p class="speaker-title5">Amity University in Tashkent, Uzbekistan</p>
                            </div>
                        </div>
                    </div>

                    <!-- Special Session 4 -->
                    <div class="session-card5">
                        <div class="session-header5">
                            <div class="session-number5">Special Session 4</div>
                            <h2 class="session-title5">VLSI Design and Technology</h2>
                            <!-- <p class="session-description5">Innovations in VLSI architectures, fabrication, and
                                integration</p> -->
                            <br>
                            <div class="session-number5">Special Session Chairs</div>
                        </div>
                        <div class="speakers-grid5">
                            <div class="speaker-card5">
                                <img src="./images/s4 1.jpeg" alt="" class="speaker-image5">
                                <h3 class="speaker-name5">Dr. Manisha Chahande</h3>
                                <p class="speaker-title5">Director of the Center of Excellence (CoE)<br>SoC TeamUp
                                    Semiconductor Pvt. Ltd.</p>
                            </div>
                            <!-- <div class="speaker-card5">
                        <img src="./images/s5 3.jpg" alt="" class="speaker-image5">
                        <h3 class="speaker-name5">Mr. Robert Johnson</h3>
                        <p class="speaker-title5">Digital Strategy Advisor<br>TechForward Inc</p>
                    </div> -->
                        </div>
                    </div>

                    <!-- Special Session 5 -->
                    <div class="session-card5">
                        <div class="session-header5">
                            <div class="session-number5">Special Session 5</div>
                            <h2 class="session-title5">Machine Learning Approaches for Big Data Processing, Security,
                                and Applications</h2>
                            <!-- <p class="session-description5">Harnessing intelligent algorithms to extract insights from
                                massive data volumes

                            </p> -->
                            <br>
                            <div class="session-number5">Special Session Chairs</div>
                        </div>
                        <div class="speakers-grid5">
                            <div class="speaker-card5">
                                <!-- <div class="speaker-image5">MS</div> -->
                                <img src="./images/s5 1.jpg" alt="" class="speaker-image5">
                                <h3 class="speaker-name5">Dr. Priyanka Tyagi</h3>
                                <p class="speaker-title5">GCET Greater Noida, India</p>
                            </div>
                            <div class="speaker-card5">
                                <img src="./images/s5 2.jpg" alt="" class="speaker-image5">
                                <h3 class="speaker-name5">Dr. Adriana Schiopoiu Burlea</h3>
                                <p class="speaker-title5">University of Craiova, Romania</p>
                            </div>

                        </div>

                        <div class="speakers-grid5">
                            <div class="speaker-card5">
                                <img src="./images/s5 3.jpg" alt="" class="speaker-image5">
                                <h3 class="speaker-name5">Dr. Sudeshna Chkraborty</h3>
                                <p class="speaker-title5">Galgotias University, India</p>
                            </div>
                            <div class="speaker-card5">
                                <img src="./images/s5 4.jpg" alt="" class="speaker-image5">
                                <h3 class="speaker-name5">Dr. Kirti Seth</h3>
                                <p class="speaker-title5">INHA University, Tashkent</p>
                            </div>
                        </div>
                    </div>



                    <div class="session-card5">
                        <div class="session-header5">
                            <div class="session-number5">Special Session 6</div>
                            <h2 class="session-title5">Converging Frontiers: Semiconductors and Computational
                                Intelligence</h2>
                            <!-- <p class="session-description5">Harnessing intelligent algorithms to extract insights from
                                massive data volumes

                            </p> -->
                            <br>
                            <div class="session-number5">Special Session Chairs</div>
                        </div>
                        <div class="speakers-grid5">
                            <div class="speaker-card5">
                                <!-- <div class="speaker-image5">MS</div> -->
                                <img src="./images/s6 1.jpeg" alt="" class="speaker-image5">
                                <h3 class="speaker-name5">Dr. Neelam Singh</h3>
                                <p class="speaker-title5">Graphic Era (Deemed to be University), Dehradun, India</p>
                            </div>
                            <div class="speaker-card5">
                                <img src="./images/s6 2.jpeg" alt="" class="speaker-image5">
                                <h3 class="speaker-name5">Dr. Mridul Gupta</h3>
                                <p class="speaker-title5">Graphic Era (Deemed to be University), Dehradun, India</p>
                            </div>

                        </div>

                        <div class="speakers-grid5">
                            <div class="speaker-card5">
                                <img src="./images/s6 3.jpeg" alt="" class="speaker-image5">
                                <h3 class="speaker-name5">Dr. Divya Chaudhary</h3>
                                <p class="speaker-title5">Northeastern University, United States</p>
                            </div>
                            <div class="speaker-card5">
                                <img src="./images/s6 4.jpeg" alt="" class="speaker-image5">
                                <h3 class="speaker-name5">Ms. Vandana Rawat</h3>
                                <p class="speaker-title5">Graphic Era (Deemed to be University), Dehradun, India</p>
                            </div>
                        </div>
                    </div>



                    <div class="session-card5">
                        <div class="session-header5">
                            <div class="session-number5">Special Session 7</div>
                            <h2 class="session-title5">Data Analytics and Intelligent Decision Systems</h2>
                            <!-- <p class="session-description5">Harnessing intelligent algorithms to extract insights from
                                massive data volumes

                            </p> -->
                            <br>
                            <div class="session-number5">Special Session Chairs</div>
                        </div>
                        <div class="speakers-grid5">
                            <div class="speaker-card5">
                                <!-- <div class="speaker-image5">MS</div> -->
                                <img src="./images/s7 1.jpeg" alt="" class="speaker-image5">
                                <h3 class="speaker-name5">Dr. Mridula</h3>
                                <p class="speaker-title5">Quantum University Uttar Pradesh, India</p>
                            </div>
                            <div class="speaker-card5">
                                <img src="./images/s7 2.jpeg" alt="" class="speaker-image5">
                                <h3 class="speaker-name5">Dr. Dev Baloni</h3>
                                <p class="speaker-title5">Quantum University Uttar Pradesh, India</p>
                            </div>

                        </div>

                        <div class="speakers-grid5">
                            <div class="speaker-card5">
                                <img src="./images/s7 3.jpeg" alt="" class="speaker-image5">
                                <h3 class="speaker-name5">Dr. Anand Nayyar</h3>
                                <p class="speaker-title5">Duy Tan University Da Nang, Vietnam, Vietnam</p>
                            </div>
                            <!-- <div class="speaker-card5">
                                <img src="./images/s6 4.jpeg" alt="" class="speaker-image5">
                                <h3 class="speaker-name5">Ms. Vandana Rawat</h3>
                                <p class="speaker-title5">Graphic Era (Deemed to be University), Dehradun, India</p>
                            </div> -->
                        </div>
                    </div>

                    <div class="session-card5">
                        <div class="session-header5">
                            <div class="session-number5">Special Session 8</div>
                            <h2 class="session-title5">Secure and Sustainable Technologies for Digital Health and
                                Precision Agriculture</h2>
                            <!-- <p class="session-description5">Harnessing intelligent algorithms to extract insights from
                                massive data volumes

                            </p> -->
                            <br>
                            <div class="session-number5">Special Session Chairs</div>
                        </div>
                        <div class="speakers-grid5">
                            <div class="speaker-card5">
                                <!-- <div class="speaker-image5">MS</div> -->
                                <img src="./images/s8 1.jpeg" alt="" class="speaker-image5">
                                <h3 class="speaker-name5">Dr. Jaspal Kaur Saini</h3>
                                <p class="speaker-title5">Dr B R Ambedkar NIT Jalandhar, Punjab, India</p>
                            </div>
                            <div class="speaker-card5">
                                <img src="./images/s8 2.jpeg" alt="" class="speaker-image5">
                                <h3 class="speaker-name5">Dr. Divya Bansal</h3>
                                <p class="speaker-title5">Punjab Engineering College, Chandigarh, India</p>
                            </div>

                        </div>

                        <div class="speakers-grid5">
                            <div class="speaker-card5">
                                <img src="./images/s8 3.jpeg" alt="" class="speaker-image5">
                                <h3 class="speaker-name5">Dr. Sri Devi Ravana</h3>
                                <p class="speaker-title5">University of Malaya, Kuala Lumpur</p>
                            </div>
                            <!-- <div class="speaker-card5">
                                <img src="./images/s6 4.jpeg" alt="" class="speaker-image5">
                                <h3 class="speaker-name5">Ms. Vandana Rawat</h3>
                                <p class="speaker-title5">Graphic Era (Deemed to be University), Dehradun, India</p>
                            </div> -->
                        </div>
                    </div>




                    <div class="session-card5">
                        <div class="session-header5">
                            <div class="session-number5">Special Session 9</div>
                            <h2 class="session-title5">Emerging Smart Healthcare Technologies, Internet of Things, and
                                Blockchain in Disease Detection, Diagnosis, and Prognosis</h2>
                            <!-- <p class="session-description5">Harnessing intelligent algorithms to extract insights from
                                massive data volumes

                            </p> -->
                            <br>
                            <div class="session-number5">Special Session Chairs</div>
                        </div>
                        <div class="speakers-grid5">
                            <div class="speaker-card5">
                                <!-- <div class="speaker-image5">MS</div> -->
                                <img src="./images/s9 1.jpeg" alt="" class="speaker-image5">
                                <h3 class="speaker-name5">Dr. Prasanalakshmi Balaji</h3>
                                <p class="speaker-title5">King Khalid University, Saudi Arabia</p>
                            </div>
                            <div class="speaker-card5">
                                <img src="./images/s9 2.jpeg" alt="" class="speaker-image5">
                                <h3 class="speaker-name5">Dr. Mega Novita</h3>
                                <p class="speaker-title5">Universitas PGRI Semarang, Indonesia</p>
                            </div>

                        </div>

                        <div class="speakers-grid5">
                            <div class="speaker-card5">
                                <img src="./images/s9 3.jpeg" alt="" class="speaker-image5">
                                <h3 class="speaker-name5">Dr. Alok Singh Chauhan</h3>
                                <p class="speaker-title5">Galgotias University, India</p>
                            </div>
                            <!-- <div class="speaker-card5">
                                <img src="./images/s6 4.jpeg" alt="" class="speaker-image5">
                                <h3 class="speaker-name5">Ms. Vandana Rawat</h3>
                                <p class="speaker-title5">Graphic Era (Deemed to be University), Dehradun, India</p>
                            </div> -->
                        </div>
                    </div>


                    <div class="session-card5">
                        <div class="session-header5">
                            <div class="session-number5">Special Session 10</div>
                            <h2 class="session-title5">Data Communication & Secure Expert Systems</h2>
                            <!-- <p class="session-description5">Harnessing intelligent algorithms to extract insights from
                                massive data volumes

                            </p> -->
                            <br>
                            <div class="session-number5">Special Session Chairs</div>
                        </div>
                        <div class="speakers-grid5">
                            <div class="speaker-card5">
                                <!-- <div class="speaker-image5">MS</div> -->
                                <img src="./images/s10 1.jpeg" alt="" class="speaker-image5">
                                <h3 class="speaker-name5">Dr. Vandna Rani Verma</h3>
                                <p class="speaker-title5">Galgotias College of Engineering & Technology Greater Noida,
                                    India</p>
                            </div>
                            <div class="speaker-card5">
                                <img src="./images/s10 2.jpeg" alt="" class="speaker-image5">
                                <h3 class="speaker-name5">Dr. Nonita Sharma</h3>
                                <p class="speaker-title5">Indira Gandhi Delhi Technical University for Women New Delhi,
                                    India</p>
                            </div>

                        </div>

                        <div class="speakers-grid5">
                            <div class="speaker-card5">
                                <img src="./images/s10 3.jpeg" alt="" class="speaker-image5">
                                <h3 class="speaker-name5">Dr. Pradeepika Verma</h3>
                                <p class="speaker-title5">TIH-IIT Patna, India</p>
                            </div>
                            <!-- <div class="speaker-card5">
                                <img src="./images/s6 4.jpeg" alt="" class="speaker-image5">
                                <h3 class="speaker-name5">Ms. Vandana Rawat</h3>
                                <p class="speaker-title5">Graphic Era (Deemed to be University), Dehradun, India</p>
                            </div> -->

                            <div class="speaker-card5">
                                <img src="./images/s10 4.jpeg" alt="" class="speaker-image5">
                                <h3 class="speaker-name5">Dr. Woinshet Ayatu</h3>
                                <p class="speaker-title5">Wachamo University, Ethiopia</p>
                            </div>
                            <!-- <div class="speaker-card5">
                                    <img src="./images/s6 4.jpeg" alt="" class="speaker-image5">
                                    <h3 class="speaker-name5">Ms. Vandana Rawat</h3>
                                    <p class="speaker-title5">Graphic Era (Deemed to be University), Dehradun, India</p>
                                </div> -->

                        </div>
                    </div>




                </div>
            </div>
</body>
</div>
</div>
<!-- body end -->
<!-- Venue & Important Dates Section -->
<!-- <section class="venue-section py-5">
    <section class="py-5"
        style="background: linear-gradient(135deg, rgba(171, 103, 186, 0.518), rgba(91, 2, 109, 0.49)); color: white;">
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
                                    <h3 class="display-6 fw-bold mb-0">30<sup>th</sup> - 31<sup>st</sup> October 2026
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
</script>

</body>

</html>

<?php include 'subFooter.php'; ?>
<?php include 'footer.php'; ?>