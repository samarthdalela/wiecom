<?php include 'header.php'; ?>
<style>
    /* Committee page specific styles */

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

    .section-title {
        color: var(--primary-blue);
        border-bottom: 3px solid var(--primary-pink);
        padding-bottom: 0.5rem;
        margin-bottom: 2rem;
        display: inline-block;
    }

    .committee-card {
        background: white;
        border-radius: 15px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        margin-bottom: 2rem;
        overflow: hidden;
        transition: all 0.3s ease;
        border-left: 5px solid var(--primary-pink);
    }

    .committee-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
    }

    .committee-header {
        background: linear-gradient(135deg, var(--light-blue) 0%, #f8f9fa 100%);
        padding: 1.5rem;
        border-bottom: 2px solid var(--primary-pink);
        position: relative;
    }

    .committee-header h3 {
        color: var(--primary-blue);
        margin: 0;
        font-weight: 700;
        font-size: 1.4rem;
    }

    .committee-header .icon {
        position: absolute;
        right: 1.5rem;
        top: 50%;
        transform: translateY(-50%);
        color: var(--primary-pink);
        font-size: 1.5rem;
    }

    .committee-body {
        padding: 1.5rem;
    }

    .member-item {
        padding: 0.75rem 0;
        border-bottom: 1px solid #e9ecef;
        display: flex;
        align-items: center;
    }

    .member-item:last-child {
        border-bottom: none;
    }

    .member-icon {
        width: 40px;
        height: 40px;
        background: var(--gradient-pink-blue);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: bold;
        margin-right: 1rem;
        flex-shrink: 0;
    }

    .member-info {
        flex: 1;
    }

    .member-name {
        font-weight: 600;
        color: var(--text-dark);
        margin-bottom: 0.25rem;
    }

    .member-affiliation {
        color: #6c757d;
        font-size: 0.9rem;
    }

    .stats-section {
        background: var(--light-blue);
        padding: 3rem 0;
        margin: 3rem 0;
    }

    .stat-card {
        text-align: center;
        padding: 2rem;
    }

    .stat-number {
        font-size: 3rem;
        font-weight: 700;
        color: var(--primary-blue);
        display: block;
    }

    .stat-label {
        color: #6c757d;
        text-transform: uppercase;
        font-size: 0.9rem;
        font-weight: 600;
        letter-spacing: 1px;
    }

    .patron-badge {
        background: var(--gradient-blue-pink);
        color: white;
        padding: 0.25rem 0.5rem;
        border-radius: 15px;
        font-size: 0.8rem;
        font-weight: 600;
        margin-left: 0.5rem;
    }

    .international-flag {
        width: 20px;
        height: 15px;
        border-radius: 2px;
        margin-right: 0.5rem;
        background: linear-gradient(45deg, #3498db, #2ecc71);
    }

    @media (max-width: 768px) {
        .committee-hero {
            padding: 2rem 0;
        }

        .member-item {
            flex-direction: column;
            align-items: flex-start;
            text-align: left;
        }

        .member-icon {
            margin-bottom: 0.5rem;
            margin-right: 0;
        }
    }

    /* Add some body padding to account for fixed header */
    body {
        /* padding-top: 50px; */
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
                        <i class="fas fa-users me-3"></i>
                        UPWIECON Committee
                    </h1>
                    <p class="lead mb-4"><span style="display:none">1st IEEE Uttar Pradesh Section</span>
                        Women in Engineering Conference</p>

                </div>
            </div>
        </div>
    </section>

    <div>
        <!-- Statistics Section -->
        <section class="stats-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-6">
                        <div class="stat-card">
                            <span class="stat-number">150+</span>
                            <div class="stat-label">Committee Members</div>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="stat-card">
                            <span class="stat-number">15</span>
                            <div class="stat-label">Committees</div>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="stat-card">
                            <span class="stat-number">25+</span>
                            <div class="stat-label">International Advisors</div>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="stat-card">
                            <span class="stat-number">50+</span>
                            <div class="stat-label">Institutions</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Committee Sections -->
        <div class="container my-5">

            <!-- Chief Patrons -->
            <div class="committee-card">
                <div class="committee-header">
                    <h3>Chief Patrons</h3>
                    <i class="fas fa-crown icon"></i>
                </div>
                <div class="committee-body">
                    <div class="member-item">
                        <div class="member-icon">SK</div>
                        <div class="member-info">
                            <div class="member-name">
                                Shri. S. Krishnan
                                <!-- <span class="patron-badge">Secretary</span> -->
                            </div>
                            <div class="member-affiliation">Ministry of Electronics & Information Technology (MeitY)
                            </div>
                        </div>
                    </div>
                    <div class="member-item">
                        <div class="member-icon">SN</div>
                        <div class="member-info">
                            <div class="member-name">Prof. (Dr.) Sri Niwas Singh</div>
                            <div class="member-affiliation">Director ABV-IIITM, Gwalior, India</div>
                        </div>
                    </div>
                    <div class="member-item">
                        <div class="member-icon">MT</div>
                        <div class="member-info">
                            <div class="member-name">Prof. (Dr.) M M Tripathi</div>
                            <div class="member-affiliation">Director General, NIELIT, India</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Patrons -->
            <div class="committee-card">
                <div class="committee-header">
                    <h3>Patrons</h3>
                    <i class="fas fa-award icon"></i>
                </div>
                <div class="committee-body">
                    <div class="member-item">
                        <div class="member-icon">YC</div>
                        <div class="member-info">
                            <div class="member-name">Prof. (Dr.) Yogesh Singh Chauhan</div>
                            <!-- <div class="member-affiliation">IIT Kanpur, Chair IEEE UP Section, India</div> -->
                        </div>
                    </div>
                    <div class="member-item">
                        <div class="member-icon">NP</div>
                        <div class="member-info">
                            <div class="member-name">Dr. Neena Pahuja</div>
                            <div class="member-affiliation">Executive Member, National Council for Vocational Education
                                and
                                Training</div>
                        </div>
                    </div>
                    <div class="member-item">
                        <div class="member-icon">AS</div>
                        <div class="member-info">
                            <div class="member-name">Shri. Abhishek Singh</div>
                            <div class="member-affiliation">Additional Secretary, MeitY</div>
                        </div>
                    </div>
                    <div class="member-item">
                        <div class="member-icon">PB</div>
                        <div class="member-info">
                            <div class="member-name">Dr. Preeti Banzal</div>
                            <div class="member-affiliation">Adviser, Principal Scientific Adviser</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Steering Committee -->
            <div class="committee-card">
                <div class="committee-header">
                    <h3>Steering Committee</h3>
                    <i class="fas fa-compass icon"></i>
                </div>
                <div class="committee-body">
                    <div class="member-item">
                        <div class="member-icon">AS</div>
                        <div class="member-info">
                            <div class="member-name">Prof. (Dr.) Asheesh Kumar Singh</div>
                            <div class="member-affiliation">MNNIT Allahabad, India</div>
                        </div>
                    </div>
                    <div class="member-item">
                        <div class="member-icon">JR</div>
                        <div class="member-info">
                            <div class="member-name">Prof. (Dr.) J. Ramkumar</div>
                            <div class="member-affiliation">IIT Kanpur, India</div>
                        </div>
                    </div>
                    <div class="member-item">
                        <div class="member-icon">KV</div>
                        <div class="member-info">
                            <div class="member-name">Prof. (Dr.) Kumar Vaibhav Srivastava</div>
                            <div class="member-affiliation">IIT Kanpur</div>
                        </div>
                    </div>
                    <div class="member-item">
                        <div class="member-icon">SK</div>
                        <div class="member-info">
                            <div class="member-name">Prof. (Dr.) Satish Kumar Singh</div>
                            <div class="member-affiliation">IIIT Allahabad, India</div>
                        </div>
                    </div>
                    <div class="member-item">
                        <div class="member-icon">RK</div>
                        <div class="member-info">
                            <div class="member-name">Prof. (Dr.) Rajeev Kumar Singh</div>
                            <div class="member-affiliation">IIT BHU</div>
                        </div>
                    </div>
                    <div class="member-item">
                        <div class="member-icon">AK</div>
                        <div class="member-info">
                            <div class="member-name">Prof. (Dr.) Avadesh Kumar</div>
                            <div class="member-affiliation">Galgotias University, Gr Noida</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- General Chairs -->
            <div class="committee-card">
                <div class="committee-header">
                    <h3>General Chairs</h3>
                    <i class="fas fa-chair icon"></i>
                </div>
                <div class="committee-body">
                    <div class="member-item">
                        <div class="member-icon">MR</div>
                        <div class="member-info">
                            <div class="member-name">Prof. (Dr.) Mohammad Rihan</div>
                            <!-- <div class="member-affiliation">Director General, NISE, India, Chair Elect IEEE UP Section</div> -->
                        </div>
                    </div>
                    <div class="member-item">
                        <div class="member-icon">TP</div>
                        <div class="member-info">
                            <div class="member-name">Ms. Tulika Pandey</div>
                            <div class="member-affiliation">Scientist G, MeitY</div>
                        </div>
                    </div>
                    <div class="member-item">
                        <div class="member-icon">SV</div>
                        <div class="member-info">
                            <div class="member-name">Ms. Sunita Verma</div>
                            <div class="member-affiliation">Scientist G, MeitY</div>
                        </div>
                    </div>
                    <div class="member-item">
                        <div class="member-icon">AN</div>
                        <div class="member-info">
                            <div class="member-name">Ms. Asha Nangia</div>
                            <div class="member-affiliation">Scientist G, MeitY, India</div>
                        </div>
                    </div>
                    <div class="member-item">
                        <div class="member-icon">KS</div>
                        <div class="member-info">
                            <div class="member-name">Ms. Kirti Seth</div>
                            <div class="member-affiliation">Former CEO, SSC NASSCOM</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- General Co-Chairs -->
            <div class="committee-card">
                <div class="committee-header">
                    <h3>General Co-Chairs</h3>
                    <i class="fas fa-user-friends icon"></i>
                </div>
                <div class="committee-body">
                    <div class="member-item">
                        <div class="member-icon">NT</div>
                        <div class="member-info">
                            <div class="member-name">Shri. Nishant Tripathi</div>
                            <div class="member-affiliation">Joint Registrar, NIELIT</div>
                        </div>
                    </div>
                    <div class="member-item">
                        <div class="member-icon">HM</div>
                        <div class="member-info">
                            <div class="member-name">Shri. Himanshu Mohan</div>
                            <div class="member-affiliation">Scientist D, NIELIT</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Conference Organizing Chairs -->
            <div class="committee-card">
                <div class="committee-header">
                    <h3>Conference Organizing Chairs</h3>
                    <i class="fas fa-tasks icon"></i>
                </div>
                <div class="committee-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="member-item">
                                <div class="member-icon">SS</div>
                                <div class="member-info">
                                    <div class="member-name">Dr. Smita Sharma</div>
                                    <div class="member-affiliation">NIELIT Noida</div>
                                </div>
                            </div>
                            <div class="member-item">
                                <div class="member-icon">AP</div>
                                <div class="member-info">
                                    <div class="member-name">Dr. Ayushi Prakash</div>
                                    <div class="member-affiliation">AKGEC, Ghaziabad</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="member-item">
                                <div class="member-icon">TT</div>
                                <div class="member-info">
                                    <div class="member-name">Dr. Twinkle Tripathi</div>
                                    <div class="member-affiliation">IIT Kanpur</div>
                                </div>
                            </div>
                            <div class="member-item">
                                <div class="member-icon">SY</div>
                                <div class="member-info">
                                    <div class="member-name">Dr. Suman Avdhesh Yadav</div>
                                    <div class="member-affiliation">IILM University, India</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Conference Organizing Co-Chairs -->
            <div class="committee-card">
                <div class="committee-header">
                    <h3>Conference Organizing Co-Chairs</h3>
                    <i class="fas fa-users-cog icon"></i>
                </div>
                <div class="committee-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="member-item">
                                <div class="member-icon">SS</div>
                                <div class="member-info">
                                    <div class="member-name">Dr. Shraddha Sagar</div>
                                    <div class="member-affiliation">Galgotias University, Greater Noida</div>
                                </div>
                            </div>
                            <div class="member-item">
                                <div class="member-icon">AB</div>
                                <div class="member-info">
                                    <div class="member-name">Ms. Anita Budhiraja</div>
                                    <div class="member-affiliation">Scientist E, NIELIT</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="member-item">
                                <div class="member-icon">SV</div>
                                <div class="member-info">
                                    <div class="member-name">Dr. Swati Vashisht</div>
                                    <div class="member-affiliation">GL Bajaj ITM, Greater Noida, India</div>
                                </div>
                            </div>
                            <div class="member-item">
                                <div class="member-icon">VA</div>
                                <div class="member-info">
                                    <div class="member-name">Dr. Veena Anand</div>
                                    <div class="member-affiliation">ABV-IIITM Gwalior</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Ph.D. Colloquium Chairs -->
            <div class="committee-card">
                <div class="committee-header">
                    <h3>Ph.D. Colloquium Chairs</h3>
                    <i class="fas fa-graduation-cap icon"></i>
                </div>
                <div class="committee-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="member-item">
                                <div class="member-icon">PJ</div>
                                <div class="member-info">
                                    <div class="member-name">Dr. Premlata Jena</div>
                                    <div class="member-affiliation">IIT Roorkee</div>
                                </div>
                            </div>
                            <div class="member-item">
                                <div class="member-icon">NS</div>
                                <div class="member-info">
                                    <div class="member-name">Dr. Neelam Srivastava</div>
                                    <div class="member-affiliation">IET Lucknow</div>
                                </div>
                            </div>
                            <div class="member-item">
                                <div class="member-icon">VM</div>
                                <div class="member-info">
                                    <div class="member-name">Dr. Vimala Mathew</div>
                                    <div class="member-affiliation">Scientist E, NIELIT</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="member-item">
                                <div class="member-icon">PT</div>
                                <div class="member-info">
                                    <div class="member-name">Dr. Prabhakar Tiwari</div>
                                    <div class="member-affiliation">MMMUT, Gorakhpur</div>
                                </div>
                            </div>
                            <!-- <div class="member-item">
                            <div class="member-icon">GB</div>
                            <div class="member-info">
                                <div class="member-name">Dr. Garima Bhardwaj</div>
                                <div class="member-affiliation">Amity University, Greater Noida Campus (Allied)</div>
                            </div>
                        </div> -->
                            <div class="member-item">
                                <div class="member-icon">VV</div>
                                <div class="member-info">
                                    <div class="member-name">Dr. Vandana Rani Verma</div>
                                    <div class="member-affiliation">GCET Gr Noida</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="committee-card">
                <div class="committee-header">
                    <h3>Technical Program Committee</h3>
                    <i class="fas fa-code icon"></i>
                </div>
                <div class="committee-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="member-item">
                                <div class="member-icon">AP</div>
                                <div class="member-info">
                                    <div class="member-name">Shri. Anil Kumar Pandey</div>
                                    <div class="member-affiliation">Advisor, NIELIT</div>
                                </div>
                            </div>
                            <div class="member-item">
                                <div class="member-icon">SS</div>
                                <div class="member-info">
                                    <div class="member-name">Ms. Saritha S</div>
                                    <div class="member-affiliation">Scientist F, NIELIT</div>
                                </div>
                            </div>
                            <div class="member-item">
                                <div class="member-icon">SC</div>
                                <div class="member-info">
                                    <div class="member-name">Ms. Sheetal Chopra</div>
                                    <div class="member-affiliation">Scientist E, NIELIT</div>
                                </div>
                            </div>
                            <div class="member-item">
                                <div class="member-icon">CR</div>
                                <div class="member-info">
                                    <div class="member-name">Ms. Chetna Singh Rathor</div>
                                    <div class="member-affiliation">Scientist-E, NIELIT</div>
                                </div>
                            </div>
                            <div class="member-item">
                                <div class="member-icon">MG</div>
                                <div class="member-info">
                                    <div class="member-name">Ms. Minali Gupta</div>
                                    <div class="member-affiliation">Scientist-C, NIELIT</div>
                                </div>
                            </div>
                            <div class="member-item">
                                <div class="member-icon">MT</div>
                                <div class="member-info">
                                    <div class="member-name">Ms. Madhvi Tyagi</div>
                                    <div class="member-affiliation">Deputy Director, NIELIT</div>
                                </div>
                            </div>
                            <div class="member-item">
                                <div class="member-icon">RK</div>
                                <div class="member-info">
                                    <div class="member-name">Dr. Reena K K</div>
                                    <div class="member-affiliation">Scientist D, NIELIT Calicut</div>
                                </div>
                            </div>
                            <div class="member-item">
                                <div class="member-icon">SC</div>
                                <div class="member-info">
                                    <div class="member-name">Prof. Sudeshna Chakraborty</div>
                                    <div class="member-affiliation">Galgotias University</div>
                                </div>
                            </div>
                            <div class="member-item">
                                <div class="member-icon">MS</div>
                                <div class="member-info">
                                    <div class="member-name">Dr. Mridula Singh</div>
                                    <div class="member-affiliation">Quantum University, Roorkee</div>
                                </div>
                            </div>
                            <div class="member-item">
                                <div class="member-icon">PW</div>
                                <div class="member-info">
                                    <div class="member-name">Dr. Pratima Walde</div>
                                    <div class="member-affiliation">Sharda University</div>
                                </div>
                            </div>
                            <div class="member-item">
                                <div class="member-icon">RS</div>
                                <div class="member-info">
                                    <div class="member-name">Prof. Ravi Shankar Singh</div>
                                    <div class="member-affiliation">Department of Computer Science and Engineering, IIT
                                        BHU,
                                        Varanasi</div>
                                </div>
                            </div>

                            <!-- <div class="member-item">
                            <div class="member-icon">DY</div>
                            <div class="member-info">
                                <div class="member-name">Prof. Divakar Yadav</div>
                                <div class="member-affiliation">IGNOU, Delhi</div>
                            </div>
                        </div> -->

                            <!-- <div class="member-item">
                            <div class="member-icon">DV</div>
                            <div class="member-info">
                                <div class="member-name">Prof. Deo Prakash Vidyarthi</div>
                                <div class="member-affiliation">JNU, Delhi</div>
                            </div>
                        </div> -->
                            <div class="member-item">
                                <div class="member-icon">NG</div>
                                <div class="member-info">
                                    <div class="member-name">Dr. Neha Gupta</div>
                                    <div class="member-affiliation">GNIOT Group of Institutions</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="member-item">
                                <div class="member-icon">SS</div>
                                <div class="member-info">
                                    <div class="member-name">Dr. Swapnil Srivastava</div>
                                    <div class="member-affiliation">United College Engineering and Research, Allahabad
                                    </div>
                                </div>
                            </div>
                            <div class="member-item">
                                <div class="member-icon">SN</div>
                                <div class="member-info">
                                    <div class="member-name">Smt. Sini S Nair</div>
                                    <div class="member-affiliation">Scientist D, NIELIT Calicut</div>
                                </div>
                            </div>
                            <div class="member-item">
                                <div class="member-icon">Q</div>
                                <div class="member-info">
                                    <div class="member-name">Dr. Qurratulain</div>
                                    <div class="member-affiliation">Aligarh Muslim University</div>
                                </div>
                            </div>
                            <div class="member-item">
                                <div class="member-icon">VG</div>
                                <div class="member-info">
                                    <div class="member-name">Dr. Vaishali Gupta</div>
                                    <div class="member-affiliation">Bennett University, Greater Noida</div>
                                </div>
                            </div>
                            <div class="member-item">
                                <div class="member-icon">PG</div>
                                <div class="member-info">
                                    <div class="member-name">Dr. Pallavi Goel</div>
                                    <div class="member-affiliation">Galgotia College of Engineering & Technology</div>
                                </div>
                            </div>
                            <div class="member-item">
                                <div class="member-icon">AK</div>
                                <div class="member-info">
                                    <div class="member-name">Dr. Ajay Kumar</div>
                                    <div class="member-affiliation">JIIT University Noida</div>
                                </div>
                            </div>
                            <div class="member-item">
                                <div class="member-icon">GJ</div>
                                <div class="member-info">
                                    <div class="member-name">Dr. Garima Jain</div>
                                    <div class="member-affiliation">NIET Greater Noida</div>
                                </div>
                            </div>
                            <div class="member-item">
                                <div class="member-icon">MD</div>
                                <div class="member-info">
                                    <div class="member-name">Dr. Mayank Dave</div>
                                    <div class="member-affiliation">NIT Kurukshetra, India</div>
                                </div>
                            </div>
                            <div class="member-item">
                                <div class="member-icon">DB</div>
                                <div class="member-info">
                                    <div class="member-name">Dr. Divya Bansal</div>
                                    <div class="member-affiliation">Punjab Engineering College, Chandigarh</div>
                                </div>
                            </div>
                            <div class="member-item">
                                <div class="member-icon">NS</div>
                                <div class="member-info">
                                    <div class="member-name">Dr. Neelam Singh</div>
                                    <div class="member-affiliation">Graphic Era Hill University, India</div>
                                </div>
                            </div>
                            <div class="member-item">
                                <div class="member-icon">AS</div>
                                <div class="member-info">
                                    <div class="member-name">Dr. Anand Sharma</div>
                                    <div class="member-affiliation">MNNIT, Allahabad</div>
                                </div>
                            </div>

                            <div class="member-item">
                                <div class="member-icon">RK</div>
                                <div class="member-info">
                                    <div class="member-name">Dr Rajiv Kumar Singh</div>
                                    <div class="member-affiliation">IET, Lucknow</div>
                                </div>
                            </div>



                        </div>
                        <div class="col-md-4">
                            <div class="member-item">
                                <div class="member-icon">AT</div>
                                <div class="member-info">
                                    <div class="member-name">Dr. Anuradha Taluja</div>
                                    <div class="member-affiliation">AKGEC, Ghaziabad</div>
                                </div>
                            </div>
                            <div class="member-item">
                                <div class="member-icon">R</div>
                                <div class="member-info">
                                    <div class="member-name">Dr. Rohaila</div>
                                    <div class="member-affiliation">Teerthanker Mahaveer University, Moradabad</div>
                                </div>
                            </div>
                            <div class="member-item">
                                <div class="member-icon">MC</div>
                                <div class="member-info">
                                    <div class="member-name">Dr. Meenakshi Chaudhary</div>
                                    <div class="member-affiliation">MMMUT, Gorakhpur</div>
                                </div>
                            </div>
                            <div class="member-item">
                                <div class="member-icon">KV</div>
                                <div class="member-info">
                                    <div class="member-name">Dr. Kimmi Verma</div>
                                    <div class="member-affiliation">ABES Engineering College Ghaziabad</div>
                                </div>
                            </div>
                            <div class="member-item">
                                <div class="member-icon">P</div>
                                <div class="member-info">
                                    <div class="member-name">Ms. Pallavi</div>
                                    <div class="member-affiliation">Buddha Engineering College, Gorakhpur</div>
                                </div>
                            </div>
                            <div class="member-item">
                                <div class="member-icon">RR</div>
                                <div class="member-info">
                                    <div class="member-name">Ms. Rupa Rani</div>
                                    <div class="member-affiliation">AKGEC, Ghaziabad</div>
                                </div>
                            </div>
                            <div class="member-item">
                                <div class="member-icon">YD</div>
                                <div class="member-info">
                                    <div class="member-name">Dr. Yajnaseni Dash</div>
                                    <div class="member-affiliation">Bennett University</div>
                                </div>
                            </div>
                            <div class="member-item">
                                <div class="member-icon">DS</div>
                                <div class="member-info">
                                    <div class="member-name">Dr. Damyanti Singh</div>
                                    <div class="member-affiliation">IILM UNIVERSITY</div>
                                </div>
                            </div>
                            <div class="member-item">
                                <div class="member-icon">VS</div>
                                <div class="member-info">
                                    <div class="member-name">Dr. Vandana Sharma</div>
                                    <div class="member-affiliation">Christ University</div>
                                </div>
                            </div>
                            <div class="member-item">
                                <div class="member-icon">AS</div>
                                <div class="member-info">
                                    <div class="member-name">Dr. Anupama Sharma</div>
                                    <div class="member-affiliation">AKGEC, Ghaziabad</div>
                                </div>
                            </div>
                            <div class="member-item">
                                <div class="member-icon">AV</div>
                                <div class="member-info">
                                    <div class="member-name">Dr. Anshul Verma</div>
                                    <div class="member-affiliation">BHU, Varanasi</div>
                                </div>
                            </div>

                            <div class="member-item">
                                <div class="member-icon">AP</div>
                                <div class="member-info">
                                    <div class="member-name">Dr. Avinash Kumar Pandey</div>
                                    <div class="member-affiliation">IIIT, Lucknow</div>
                                </div>

                            </div>



                        </div>
                    </div>
                </div>
            </div>

            <!-- <div class="committee-card">
    <div class="committee-header">
       <h3>Technical Program Committee</h3>
       <i class="fas fa-code icon"></i>
    </div>
    <div class="committee-body">
       <div class="row">
          <div class="col-md-6">
             <div class="member-item">
                <div class="member-icon">AP</div>
                <div class="member-info">
                   <div class="member-name">Shri. Anil Kumar Pandey</div>
                   <div class="member-affiliation">Advisor, NIELIT</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">SS</div>
                <div class="member-info">
                   <div class="member-name">Ms. Saritha S</div>
                   <div class="member-affiliation">Scientist F, NIELIT</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">SC</div>
                <div class="member-info">
                   <div class="member-name">Ms. Sheetal Chopra</div>
                   <div class="member-affiliation">Scientist E, NIELIT</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">CR</div>
                <div class="member-info">
                   <div class="member-name">Ms. Chetna Singh Rathor</div>
                   <div class="member-affiliation">Scientist-E, NIELIT</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">MG</div>
                <div class="member-info">
                   <div class="member-name">Ms. Minali Gupta</div>
                   <div class="member-affiliation">Scientist-C, NIELIT</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">MT</div>
                <div class="member-info">
                   <div class="member-name">Ms. Madhvi Tyagi</div>
                   <div class="member-affiliation">Deputy Director, NIELIT</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">RK</div>
                <div class="member-info">
                   <div class="member-name">Dr. Reena K K</div>
                   <div class="member-affiliation">Scientist D, NIELIT Calicut</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">SC</div>
                <div class="member-info">
                   <div class="member-name">Prof. Sudeshna Chakraborty</div>
                   <div class="member-affiliation">Galgotias University</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">MS</div>
                <div class="member-info">
                   <div class="member-name">Dr. Mridula Singh</div>
                   <div class="member-affiliation">Quantum University, Roorkee</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">PW</div>
                <div class="member-info">
                   <div class="member-name">Dr. Pratima Walde</div>
                   <div class="member-affiliation">Sharda University</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">SS</div>
                <div class="member-info">
                   <div class="member-name">Dr. Swapnil Srivastava</div>
                   <div class="member-affiliation">United College Engineering and Research, Allahabad</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">SN</div>
                <div class="member-info">
                   <div class="member-name">Smt. Sini S Nair</div>
                   <div class="member-affiliation">Scientist D, NIELIT Calicut</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">Q</div>
                <div class="member-info">
                   <div class="member-name">Dr. Qurratulain</div>
                   <div class="member-affiliation">Aligarh Muslim University</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">VG</div>
                <div class="member-info">
                   <div class="member-name">Dr. Vaishali Gupta</div>
                   <div class="member-affiliation">Bennett University, Greater Noida</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">PG</div>
                <div class="member-info">
                   <div class="member-name">Dr. Pallavi Goel</div>
                   <div class="member-affiliation">Galgotia College of Engineering & Technology</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">AK</div>
                <div class="member-info">
                   <div class="member-name">Dr. Ajay Kumar</div>
                   <div class="member-affiliation">JIIT University Noida</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">GJ</div>
                <div class="member-info">
                   <div class="member-name">Dr. Garima Jain</div>
                   <div class="member-affiliation">NIET Greater Noida</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">MD</div>
                <div class="member-info">
                   <div class="member-name">Dr. Mayank Dave</div>
                   <div class="member-affiliation">NIT Kurukshetra, India</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">DB</div>
                <div class="member-info">
                   <div class="member-name">Dr. Divya Bansal</div>
                   <div class="member-affiliation">Punjab Engineering College, Chandigarh</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">NS</div>
                <div class="member-info">
                   <div class="member-name">Dr. Neelam Singh</div>
                   <div class="member-affiliation">Graphic Era Hill University, India</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">AT</div>
                <div class="member-info">
                   <div class="member-name">Dr. Anuradha Taluja</div>
                   <div class="member-affiliation">AKGEC, Ghaziabad</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">R</div>
                <div class="member-info">
                   <div class="member-name">Dr. Rohaila</div>
                   <div class="member-affiliation">Teerthanker Mahaveer University, Moradabad</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">MC</div>
                <div class="member-info">
                   <div class="member-name">Dr. Meenakshi Chaudhary</div>
                   <div class="member-affiliation">MMMUT, Gorakhpur</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">KV</div>
                <div class="member-info">
                   <div class="member-name">Dr. Kimmi Verma</div>
                   <div class="member-affiliation">ABES Engineering College Ghaziabad</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">P</div>
                <div class="member-info">
                   <div class="member-name">Ms. Pallavi</div>
                   <div class="member-affiliation">Buddha Engineering College, Gorakhpur</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">RR</div>
                <div class="member-info">
                   <div class="member-name">Ms. Rupa Rani</div>
                   <div class="member-affiliation">AKGEC, Ghaziabad</div>
                </div>
             </div>
          </div>
          <div class="col-md-6">
             <div class="member-item">
                <div class="member-icon">YD</div>
                <div class="member-info">
                   <div class="member-name">Dr. Yajnaseni Dash</div>
                   <div class="member-affiliation">Bennett University</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">DS</div>
                <div class="member-info">
                   <div class="member-name">Dr. Damyanti Singh</div>
                   <div class="member-affiliation">IILM UNIVERSITY</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">VS</div>
                <div class="member-info">
                   <div class="member-name">Dr. Vandana Sharma</div>
                   <div class="member-affiliation">Christ University</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">AS</div>
                <div class="member-info">
                   <div class="member-name">Dr. Anupama Sharma</div>
                   <div class="member-affiliation">AKGEC, Ghaziabad</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">J</div>
                <div class="member-info">
                   <div class="member-name">Dr. Jyoti Sharma</div>
                   <div class="member-affiliation">UPES, Dehradun</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">SP</div>
                <div class="member-info">
                   <div class="member-name">Dr. Subhash Patil</div>
                   <div class="member-affiliation">NIT Kurukshetra</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">SK</div>
                <div class="member-info">
                   <div class="member-name">Dr. Sanjay Kumar</div>
                   <div class="member-affiliation">BHU</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">AK</div>
                <div class="member-info">
                   <div class="member-name">Dr. Archana Kaur</div>
                   <div class="member-affiliation">Amity University</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">NS</div>
                <div class="member-info">
                   <div class="member-name">Dr. Neha Singh</div>
                   <div class="member-affiliation">NIELIT Calicut</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">JS</div>
                <div class="member-info">
                   <div class="member-name">Dr. Jyoti Singh</div>
                   <div class="member-affiliation">NIELIT Calicut</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">SC</div>
                <div class="member-info">
                   <div class="member-name">Dr. Suman Chaudhary</div>
                   <div class="member-affiliation">NIELIT Calicut</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">AB</div>
                <div class="member-info">
                   <div class="member-name">Dr. Amit Bansal</div>
                   <div class="member-affiliation">NIELIT Calicut</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">KP</div>
                <div class="member-info">
                   <div class="member-name">Dr. Kiran Patil</div>
                   <div class="member-affiliation">NIELIT Calicut</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">AS</div>
                <div class="member-info">
                   <div class="member-name">Dr. Anil Sharma</div>
                   <div class="member-affiliation">NIELIT Calicut</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">VS</div>
                <div class="member-info">
                   <div class="member-name">Dr. Vaibhav Singh</div>
                   <div class="member-affiliation">NIELIT Calicut</div>
                </div>
             </div>
             <div class="member-item">
                <div class="member-icon">DK</div>
                <div class="member-info">
                   <div class="member-name">Dr. Deepak Kumar</div>
                   <div class="member-affiliation">NIELIT Calicut</div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div> -->

            <!-- <div class="committee-card">
    <div class="committee-header">
        <h3>Technical Program Committee</h3>
        <i class="fas fa-code icon"></i>
    </div>
    <div class="committee-body">
        <div class="row">
            <div class="col-md-6">
                <div class="member-item">
                    <div class="member-icon">AP</div>
                    <div class="member-info">
                        <div class="member-name">Shri. Anil Kumar Pandey</div>
                        <div class="member-affiliation">Advisor, NIELIT</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">SS</div>
                    <div class="member-info">
                        <div class="member-name">Ms. Saritha S</div>
                        <div class="member-affiliation">Scientist F, NIELIT</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">SC</div>
                    <div class="member-info">
                        <div class="member-name">Ms. Sheetal Chopra</div>
                        <div class="member-affiliation">Scientist E, NIELIT</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">CR</div>
                    <div class="member-info">
                        <div class="member-name">Ms. Chetna Singh Rathor</div>
                        <div class="member-affiliation">Scientist-E, NIELIT</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">MG</div>
                    <div class="member-info">
                        <div class="member-name">Ms. Minali Gupta</div>
                        <div class="member-affiliation">Scientist-C, NIELIT</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">MT</div>
                    <div class="member-info">
                        <div class="member-name">Ms. Madhvi Tyagi</div>
                        <div class="member-affiliation">Deputy Director, NIELIT</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">RK</div>
                    <div class="member-info">
                        <div class="member-name">Dr. Reena K K</div>
                        <div class="member-affiliation">Scientist D, NIELIT Calicut</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">SC</div>
                    <div class="member-info">
                        <div class="member-name">Prof. Sudeshna Chakraborty</div>
                        <div class="member-affiliation">Galgotias University</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">MS</div>
                    <div class="member-info">
                        <div class="member-name">Dr. Mridula Singh</div>
                        <div class="member-affiliation">Quantum University, Roorkee</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">PW</div>
                    <div class="member-info">
                        <div class="member-name">Dr. Pratima Walde</div>
                        <div class="member-affiliation">Sharda University</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">SS</div>
                    <div class="member-info">
                        <div class="member-name">Dr. Swapnil Srivastava</div>
                        <div class="member-affiliation">United College Engineering and Research, Allahabad</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">SN</div>
                    <div class="member-info">
                        <div class="member-name">Smt. Sini S Nair</div>
                        <div class="member-affiliation">Scientist D, NIELIT Calicut</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">Q</div>
                    <div class="member-info">
                        <div class="member-name">Dr. Qurratulain</div>
                        <div class="member-affiliation">Aligarh Muslim University</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">VG</div>
                    <div class="member-info">
                        <div class="member-name">Dr. Vaishali Gupta</div>
                        <div class="member-affiliation">Bennett University, Greater Noida</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">PG</div>
                    <div class="member-info">
                        <div class="member-name">Dr. Pallavi Goel</div>
                        <div class="member-affiliation">Galgotia College of Engineering & Technology</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">AK</div>
                    <div class="member-info">
                        <div class="member-name">Dr. Ajay Kumar</div>
                        <div class="member-affiliation">JIIT University Noida</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">GJ</div>
                    <div class="member-info">
                        <div class="member-name">Dr. Garima Jain</div>
                        <div class="member-affiliation">NIET Greater Noida</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">MD</div>
                    <div class="member-info">
                        <div class="member-name">Dr. Mayank Dave</div>
                        <div class="member-affiliation">NIT Kurukshetra, India</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">DB</div>
                    <div class="member-info">
                        <div class="member-name">Dr. Divya Bansal</div>
                        <div class="member-affiliation">Punjab Engineering College, Chandigarh</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">NS</div>
                    <div class="member-info">
                        <div class="member-name">Dr. Neelam Singh</div>
                        <div class="member-affiliation">Graphic Era Hill University, India</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">AT</div>
                    <div class="member-info">
                        <div class="member-name">Dr. Anuradha Taluja</div>
                        <div class="member-affiliation">AKGEC, Ghaziabad</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">R</div>
                    <div class="member-info">
                        <div class="member-name">Dr. Rohaila</div>
                        <div class="member-affiliation">Teerthanker Mahaveer University, Moradabad</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">MC</div>
                    <div class="member-info">
                        <div class="member-name">Dr. Meenakshi Chaudhary</div>
                        <div class="member-affiliation">MMMUT, Gorakhpur</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">KV</div>
                    <div class="member-info">
                        <div class="member-name">Dr. Kimmi Verma</div>
                        <div class="member-affiliation">ABES Engineering College Ghaziabad</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">P</div>
                    <div class="member-info">
                        <div class="member-name">Ms. Pallavi</div>
                        <div class="member-affiliation">Buddha Engineering College, Gorakhpur</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">RR</div>
                    <div class="member-info">
                        <div class="member-name">Ms. Rupa Rani</div>
                        <div class="member-affiliation">AKGEC, Ghaziabad</div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="member-item">
                    <div class="member-icon">YD</div>
                    <div class="member-info">
                        <div class="member-name">Dr. Yajnaseni Dash</div>
                        <div class="member-affiliation">Bennett University</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">DS</div>
                    <div class="member-info">
                        <div class="member-name">Dr. Damyanti Singh</div>
                        <div class="member-affiliation">IILM UNIVERSITY</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">VS</div>
                    <div class="member-info">
                        <div class="member-name">Dr. Vandana Sharma</div>
                        <div class="member-affiliation">Christ University</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">AS</div>
                    <div class="member-info">
                        <div class="member-name">Dr. Anupama Sharma</div>
                        <div class="member-affiliation">AKGEC, Ghaziabad</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">J</div>
                    <div class="member-info">
                        <div class="member-name">Dr. Jaspreet</div>
                        <div class="member-affiliation">IET Lucknow</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">SS</div>
                    <div class="member-info">
                        <div class="member-name">Dr. Seema Srivastava</div>
                        <div class="member-affiliation">Bennett University</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">KJ</div>
                    <div class="member-info">
                        <div class="member-name">Ms. Kanika Jindal</div>
                        <div class="member-affiliation">NIET, Greater Noida</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">SS</div>
                    <div class="member-info">
                        <div class="member-name">Dr. Shikha Singh</div>
                        <div class="member-affiliation">MMMUT, Gorakhpur</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">SV</div>
                    <div class="member-info">
                        <div class="member-name">Dr. Sonali Vyas</div>
                        <div class="member-affiliation">UPES, Dehradun</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">GV</div>
                    <div class="member-info">
                        <div class="member-name">Dr. Gunjan Varshney</div>
                        <div class="member-affiliation">JSS University, Noida</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">IK</div>
                    <div class="member-info">
                        <div class="member-name">Dr. Inderjeet Kaur</div>
                        <div class="member-affiliation">AKGEC, Ghaziabad</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">PS</div>
                    <div class="member-info">
                        <div class="member-name">Ms. Parul Saini</div>
                        <div class="member-affiliation">IILM University Greater Noida</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">RG</div>
                    <div class="member-info">
                        <div class="member-name">Dr. Ruchi Gupta</div>
                        <div class="member-affiliation">AKGEC, Ghaziabad</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">PS</div>
                    <div class="member-info">
                        <div class="member-name">Dr. Pragya Singh</div>
                        <div class="member-affiliation">IIIT Allahabad</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">SK</div>
                    <div class="member-info">
                        <div class="member-name">Ms. Sarita Kaur</div>
                        <div class="member-affiliation">Scientist-D, NIELIT</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">AS</div>
                    <div class="member-info">
                        <div class="member-name">Dr. Arun Kumar Singh</div>
                        <div class="member-affiliation">REC Kannauj</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">AT</div>
                    <div class="member-info">
                        <div class="member-name">Dr. Akhilesh Tiwari</div>
                        <div class="member-affiliation">IIIT Allahabad</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">SS</div>
                    <div class="member-info">
                        <div class="member-name">Shri. Saket Saurabh</div>
                        <div class="member-affiliation">Scientist-C, NIELIT</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">RC</div>
                    <div class="member-info">
                        <div class="member-name">Dr. Roshini Chakraborti</div>
                        <div class="member-affiliation">ABV-IITM Gwalior</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">PK</div>
                    <div class="member-info">
                        <div class="member-name">Dr. Pramod Kumar</div>
                        <div class="member-affiliation">Swami Rama Himalayan University, Dehradun</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">AG</div>
                    <div class="member-info">
                        <div class="member-name">Dr. Akanksha Gupta</div>
                        <div class="member-affiliation">GEU Dehradun</div>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-icon">GM</div>
                    <div class="member-info">
                        <div class="member-name">Dr. Gaurav Mittal</div>
                        <div class="member-affiliation">DEAL Dehradun</div>
                    </div>
                </div>
</div></div></div></div> -->


            <!-- Registration Committee Chairs -->
            <div class="committee-card">
                <div class="committee-header">
                    <h3>Registration Committee Chairs</h3>
                    <i class="fas fa-graduation-cap icon"></i>
                </div>
                <div class="committee-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="member-item">
                                <div class="member-icon">KP</div>
                                <div class="member-info">
                                    <div class="member-name">Ms. Kanchan Panwar</div>
                                    <div class="member-affiliation">Deputy Director, NIELIT</div>
                                </div>
                            </div>
                            <div class="member-item">
                                <div class="member-icon">KK</div>
                                <div class="member-info">
                                    <div class="member-name">Ms. Kavita Kasturia</div>
                                    <div class="member-affiliation">Deputy Director, NIELIT</div>
                                </div>
                            </div>
                            <div class="member-item">
                                <div class="member-icon">KD</div>
                                <div class="member-info">
                                    <div class="member-name">Ms. Kalpna Dahiya</div>
                                    <div class="member-affiliation">Deputy Director, NIELIT</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="member-item">
                                <div class="member-icon">SD</div>
                                <div class="member-info">
                                    <div class="member-name">Shri Sharad Dixit</div>
                                    <div class="member-affiliation">NIELIT</div>
                                </div>
                            </div>
                            <div class="member-item">
                                <div class="member-icon">SG</div>
                                <div class="member-info">
                                    <div class="member-name">Dr. Shubhi Gupta</div>
                                    <div class="member-affiliation">Amity University, Greater Noida, India</div>
                                </div>
                            </div>
                            <div class="member-item">
                                <div class="member-icon">AD</div>
                                <div class="member-info">
                                    <div class="member-name">Ms. Alka Dilip</div>
                                    <div class="member-affiliation">IIT Kanpur</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="committee-card">
                <div class="committee-header">
                    <h3>Publication Committee</h3>
                    <i class="fas fa-book icon"></i>
                </div>
                <div class="committee-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="member-item">
                                <div class="member-icon">AS</div>
                                <div class="member-info">
                                    <div class="member-name">Dr. Amita Shukla</div>
                                    <div class="member-affiliation">NIET, Greater Noida</div>
                                </div>
                            </div>
                            <div class="member-item">
                                <div class="member-icon">KK</div>
                                <div class="member-info">
                                    <div class="member-name">Ms. Kavita Kasturia</div>
                                    <div class="member-affiliation">Principal Private Secretary, NIELIT</div>
                                </div>
                            </div>
                            <!-- <div class="member-item">
                            <div class="member-icon">PC</div>
                            <div class="member-info">
                                <div class="member-name">Dr. Prateek Chaturvedi</div>
                                <div class="member-affiliation">Amity University</div>
                            </div>
                        </div> -->
                        </div>
                        <div class="col-md-6">
                            <div class="member-item">
                                <div class="member-icon">SA</div>
                                <div class="member-info">
                                    <div class="member-name">Ms. Salma P Aayubi</div>
                                    <div class="member-affiliation">Assistant Director, NIELIT</div>
                                </div>
                            </div>
                            <div class="member-item">
                                <div class="member-icon">IP</div>
                                <div class="member-info">
                                    <div class="member-name">Dr. Indu Prabha</div>
                                    <div class="member-affiliation">SRMPG Lucknow</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="committee-card">
                <div class="committee-header">
                    <h3>Publicity Committee Chairs</h3>
                    <i class="fas fa-bullhorn icon"></i>
                </div>
                <div class="committee-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="member-item">
                                <div class="member-icon">MS</div>
                                <div class="member-info">
                                    <div class="member-name">Dr. Madhu Sharma Gaur</div>
                                    <div class="member-affiliation">GL Bajaj, Greater Noida</div>
                                </div>
                            </div>
                            <div class="member-item">
                                <div class="member-icon">GS</div>
                                <div class="member-info">
                                    <div class="member-name">Ms. G Sreedevi</div>
                                    <div class="member-affiliation">Principal Technical Officer, NIELIT</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="member-item">
                                <div class="member-icon">SG</div>
                                <div class="member-info">
                                    <div class="member-name">Mr. Saurabh Ghosh</div>
                                    <div class="member-affiliation">MNNIT Prayagraj</div>
                                </div>
                            </div>
                            <div class="member-item">
                                <div class="member-icon">PS</div>
                                <div class="member-info">
                                    <div class="member-name">Ms. Pooja Sharma</div>
                                    <div class="member-affiliation">MNNIT Prayagraj</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="committee-card">
                <div class="committee-header">
                    <h3>Finance Committee Chairs</h3>
                    <i class="fas fa-coins icon"></i>
                </div>
                <div class="committee-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="member-item">
                                <div class="member-icon">RC</div>
                                <div class="member-info">
                                    <div class="member-name">Dr. Raghavendra Chaudhary</div>
                                    <div class="member-affiliation">IIT Kanpur</div>
                                </div>
                            </div>
                            <div class="member-item">
                                <div class="member-icon">RT</div>
                                <div class="member-info">
                                    <div class="member-name">Shri. R K Tripathi</div>
                                    <div class="member-affiliation">Joint Director, Finance, NIELIT</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="member-item">
                                <div class="member-icon">JK</div>
                                <div class="member-info">
                                    <div class="member-name">Ms. Jagjit Kaur</div>
                                    <div class="member-affiliation">Assistant Director, NIELIT</div>
                                </div>
                            </div>
                            <div class="member-item">
                                <div class="member-icon">AN</div>
                                <div class="member-info">
                                    <div class="member-name">Ms. Anu Nain</div>
                                    <div class="member-affiliation">Assistant Director, NIELIT</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="committee-card">
                <div class="committee-header">
                    <h3>Sponsorship Committee</h3>
                    <i class="fas fa-hand-holding-usd icon"></i>
                </div>
                <div class="committee-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="member-item">
                                <div class="member-icon">HM</div>
                                <div class="member-info">
                                    <div class="member-name">Shri. Himanshu Mohan</div>
                                    <div class="member-affiliation">Scientist D, NIELIT</div>
                                </div>
                            </div>
                            <div class="member-item">
                                <div class="member-icon">SS</div>
                                <div class="member-info">
                                    <div class="member-name">Dr. Smita Sharma</div>
                                    <div class="member-affiliation">NIELIT, New Delhi</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="member-item">
                                <div class="member-icon">SV</div>
                                <div class="member-info">
                                    <div class="member-name">Dr. Shubhranshu Vikram Singh</div>
                                    <div class="member-affiliation">Amity University Noida</div>
                                </div>
                            </div>
                            <div class="member-item">
                                <div class="member-icon">AP</div>
                                <div class="member-info">
                                    <div class="member-name">Dr. Ayushi Prakash</div>
                                    <div class="member-affiliation">AKGEC Ghaziabad</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="committee-card">
                <div class="committee-header">
                    <h3>IT Infrastructure & Services Committee</h3>
                    <i class="fas fa-network-wired icon"></i>
                </div>
                <div class="committee-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="member-item">
                                <div class="member-icon">MA</div>
                                <div class="member-info">
                                    <div class="member-name">Shri. Manish Arora</div>
                                    <div class="member-affiliation">Scientist F, NIELIT</div>
                                </div>
                            </div>
                            <div class="member-item">
                                <div class="member-icon">SS</div>
                                <div class="member-info">
                                    <div class="member-name">Shri. Sushil Kumar Surana</div>
                                    <div class="member-affiliation">Scientist E, NIELIT</div>
                                </div>
                            </div>
                            <div class="member-item">
                                <div class="member-icon">VM</div>
                                <div class="member-info">
                                    <div class="member-name">Shri. Vikas Mittal</div>
                                    <div class="member-affiliation">Scientist D, NIELIT</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="member-item">
                                <div class="member-icon">SB</div>
                                <div class="member-info">
                                    <div class="member-name">Ms. Santosh Bharadwaj</div>
                                    <div class="member-affiliation">Scientist C, NIELIT</div>
                                </div>
                            </div>
                            <div class="member-item">
                                <div class="member-icon">VK</div>
                                <div class="member-info">
                                    <div class="member-name">Dr. Varun Kakar</div>
                                    <div class="member-affiliation">BTKIT, Dawarahat</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="committee-card">
                <div class="committee-header">
                    <h3>Hospitality & Local Management Committee</h3>
                    <i class="fas fa-concierge-bell icon"></i>
                </div>
                <div class="committee-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="member-item">
                                <div class="member-icon">AG</div>
                                <div class="member-info">
                                    <div class="member-name">Shri. Anurag Gupta</div>
                                    <div class="member-affiliation">Scientist E, NIELIT Haridwar</div>
                                </div>
                            </div>
                            <div class="member-item">
                                <div class="member-icon">AS</div>
                                <div class="member-info">
                                    <div class="member-name">Shri. Akhilesh Shukla</div>
                                    <div class="member-affiliation">NIELIT Haridwar</div>
                                </div>
                            </div>
                            <div class="member-item">
                                <div class="member-icon">NS</div>
                                <div class="member-info">
                                    <div class="member-name">Prof. Nishant Saxena</div>
                                    <div class="member-affiliation">Tula’s Institute, Dehradun</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="member-item">
                                <div class="member-icon">SV</div>
                                <div class="member-info">
                                    <div class="member-name">Prof. Sandeep Vijay</div>
                                    <div class="member-affiliation">Maya Devi University, Selaqui, Dehradun</div>
                                </div>
                            </div>
                            <div class="member-item">
                                <div class="member-icon">KM</div>
                                <div class="member-info">
                                    <div class="member-name">Dr. K C Mishra</div>
                                    <div class="member-affiliation">WIT Dehradun</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="committee-card">
                <div class="committee-header">
                    <h3>International Advisory Committee</h3>
                    <i class="fas fa-globe icon"></i>
                </div>
                <div class="committee-body">
                    <div class="row">
                        <!-- Column 1 -->
                        <div class="col-md-4">
                            <div class="member-item">
                                <div class="member-icon">HS</div>
                                <div class="member-info">
                                    <div class="member-name">Dr. Heba Saleh</div>
                                    <div class="member-affiliation">Chairwoman, Information Technology Institute (MCIT),
                                        Cairo, Egypt</div>
                                </div>
                            </div>
                            <div class="member-item">
                                <div class="member-icon">RB</div>
                                <div class="member-info">
                                    <div class="member-name">Dr. Reem Bahgat</div>
                                    <div class="member-affiliation">President, Egypt University of Informatics, Egypt
                                    </div>
                                </div>
                            </div>
                            <div class="member-item">
                                <div class="member-icon">ML</div>
                                <div class="member-info">
                                    <div class="member-name">Prof. -Ming Liu</div>
                                    <div class="member-affiliation">National Taipei University of Technology, Taiwan
                                    </div>
                                </div>
                            </div>
                            <div class="member-item">
                                <div class="member-icon">RS</div>
                                <div class="member-info">
                                    <div class="member-name">Prof. Ram Sharma</div>
                                    <div class="member-affiliation">Vice Chancellor and Chairperson, UPES, Dehradun
                                    </div>
                                </div>
                            </div>
                            <div class="member-item">
                                <div class="member-icon">FT</div>
                                <div class="member-info">
                                    <div class="member-name">Prof. Francois Therin</div>
                                    <div class="member-affiliation">Deputy Vice-Chancellor, University of Cyberjaya,
                                        Malaysia</div>
                                </div>
                            </div>
                            <div class="member-item">
                                <div class="member-icon">ML</div>
                                <div class="member-info">
                                    <div class="member-name">Prof. Mark Lee</div>
                                    <div class="member-affiliation">University of Birmingham, UK</div>
                                </div>
                            </div>
                            <div class="member-item">
                                <div class="member-icon">SG</div>
                                <div class="member-info">
                                    <div class="member-name">Dr. S B Goyal</div>
                                    <div class="member-affiliation">Director, Faculty of Information Technology, City
                                        University of Malaysia</div>
                                </div>
                            </div>
                            <div class="member-item">
                                <div class="member-icon">UM</div>
                                <div class="member-info">
                                    <div class="member-name">Dr. Umar Muhammad Modibbo</div>
                                    <div class="member-affiliation">Yola University, Nigeria</div>
                                </div>
                            </div>
                            <div class="member-item">
                                <div class="member-icon">VS</div>
                                <div class="member-info">
                                    <div class="member-name">Prof. Vijay Singh</div>
                                    <div class="member-affiliation">Uniformed Services University of the Health
                                        Sciences,
                                        United States</div>
                                </div>
                            </div>
                            <div class="member-item">
                                <div class="member-icon">JF</div>
                                <div class="member-info">
                                    <div class="member-name">Prof. Jean-Pierre Fontaine</div>
                                    <div class="member-affiliation">Professor, University of Clermont-Auvergne, France
                                    </div>
                                </div>
                            </div>
                            <div class="member-item">
                                <div class="member-icon">MD</div>
                                <div class="member-info">
                                    <div class="member-name">Prof. Mario José Diván</div>
                                    <div class="member-affiliation">Intel, Oregon, United States</div>
                                </div>
                            </div>
                            <div class="member-item">
                                <div class="member-icon">PH</div>
                                <div class="member-info">
                                    <div class="member-name">Pao-Ann Hsiung</div>
                                    <div class="member-affiliation">Director, Research Centre on AI and Sustainable
                                        Development, NCCU, Taiwan</div>
                                </div>
                            </div>
                            <div class="member-item">
                                <div class="member-icon">TH</div>
                                <div class="member-info">
                                    <div class="member-name">Prof. Tzung-Pei Hong</div>
                                    <div class="member-affiliation">National University of Kaohsiung, Taiwan</div>
                                </div>
                            </div>
                            <div class="member-item">
                                <div class="member-icon">CI</div>
                                <div class="member-info">
                                    <div class="member-name">Prof. Celestine Iwendi</div>
                                    <div class="member-affiliation">The University of Bolton, UK</div>
                                </div>
                            </div>
                            <div class="member-item">
                                <div class="member-icon">AE</div>
                                <div class="member-info">
                                    <div class="member-name">Prof. Dr. Alexey Eremin</div>
                                    <div class="member-affiliation">Otto von Guericke University</div>
                                </div>
                            </div>

                            <div class="member-item">
                                <div class="member-icon">IS</div>
                                <div class="member-info">
                                    <div class="member-name">Ivan I. Smalyukh</div>
                                    <div class="member-affiliation">University of Colorado Boulder (United States)</div>
                                </div>
                            </div>

                            <div class="member-item">
                                <div class="member-icon">JY</div>
                                <div class="member-info">
                                    <div class="member-name">Jun Yamamoto</div>
                                    <div class="member-affiliation">Kyoto University (Japan)</div>
                                </div>
                            </div>

                            <div class="member-item">
                                <div class="member-icon">SZ</div>
                                <div class="member-info">
                                    <div class="member-name">Slobodan Žumer Slovenia</div>
                                    <div class="member-affiliation">University of Ljubljana and Jozef Stefan Institute
                                    </div>
                                </div>
                            </div>

                            <div class="member-item">
                                <div class="member-icon">HK</div>
                                <div class="member-info">
                                    <div class="member-name">Haegyeom Kim</div>
                                    <div class="member-affiliation">Lawrence Berkeley National Lab</div>
                                </div>
                            </div>

                            <div class="member-item">
                                <div class="member-icon">AK</div>
                                <div class="member-info">
                                    <div class="member-name">Arvind Kumar Sharma</div>
                                    <div class="member-affiliation">Enterprise Systems & ICT Head, Jakarta</div>
                                </div>
                            </div>
                        </div>

                        <!-- Column 2 -->
                        <div class="col-md-4">
                            <div class="member-item">
                                <div class="member-icon">SV</div>
                                <div class="member-info">
                                    <div class="member-name">Prof. Sunil Vadera</div>
                                    <div class="member-affiliation">Computer Science, University of Salford, England
                                    </div>
                                </div>
                            </div>
                            <div class="member-item">
                                <div class="member-icon">SB</div>
                                <div class="member-info">
                                    <div class="member-name">Prof. Siddhartha Bhattacharyya</div>
                                    <div class="member-affiliation">Senior Researcher, VSB - Technical University of
                                        Ostrava
                                    </div>
                                </div>
                            </div>
                            <div class="member-item">
                                <div class="member-icon">FB</div>
                                <div class="member-info">
                                    <div class="member-name">Dr. Francesco Benedetto</div>
                                    <div class="member-affiliation">Vice President of the Artificial Intelligence
                                        Commission, Rome</div>
                                </div>
                            </div>
                            <div class="member-item">
                                <div class="member-icon">DT</div>
                                <div class="member-info">
                                    <div class="member-name">Prof. Domenico Talia</div>
                                    <div class="member-affiliation">University of Calabria</div>
                                </div>
                            </div>
                            <div class="member-item">
                                <div class="member-icon">PC</div>
                                <div class="member-info">
                                    <div class="member-name">Prof. Paolo Ciancarini</div>
                                    <div class="member-affiliation">Università di Bologna, Italy</div>
                                </div>
                            </div>
                            <div class="member-item">
                                <div class="member-icon">MB</div>
                                <div class="member-info">
                                    <div class="member-name">Dr. Mohamed Bettaz</div>
                                    <div class="member-affiliation">Czech Technical University in Prague</div>
                                </div>
                            </div>
                            <div class="member-item">
                                <div class="member-icon">JB</div>
                                <div class="member-info">
                                    <div class="member-name">Prof. Jordi Mongay Batalla</div>
                                    <div class="member-affiliation">Warsaw University of Technology, Poland</div>
                                </div>
                            </div>
                            <div class="member-item">
                                <div class="member-icon">AR</div>
                                <div class="member-info">
                                    <div class="member-name">Prof. Akshay Rathore</div>
                                    <div class="member-affiliation">Singapore Institute of Technology (SIT), Singapore
                                    </div>
                                </div>
                            </div>
                            <div class="member-item">
                                <div class="member-icon">KT</div>
                                <div class="member-info">
                                    <div class="member-name">Prof. Kiran Trehan</div>
                                    <div class="member-affiliation">Pro-Vice Chancellor Partnerships and Engagement,
                                        University of York, England</div>
                                </div>
                            </div>
                            <div class="member-item">
                                <div class="member-icon">AP</div>
                                <div class="member-info">
                                    <div class="member-name">Dr. Anand Paul</div>
                                    <div class="member-affiliation">Louisiana State University, Health Sciences Center,
                                        USA
                                    </div>
                                </div>
                            </div>
                            <div class="member-item">
                                <div class="member-icon">NA</div>
                                <div class="member-info">
                                    <div class="member-name">Prof. Nalin A. G. Arachchilage</div>
                                    <div class="member-affiliation">RMIT University, Australia</div>
                                </div>
                            </div>
                            <div class="member-item">
                                <div class="member-icon">TT</div>
                                <div class="member-info">
                                    <div class="member-name">Prof. Tien Anh Tran</div>
                                    <div class="member-affiliation">University of Malta, Msida, Malta</div>
                                </div>
                            </div>
                            <div class="member-item">
                                <div class="member-icon">AG</div>
                                <div class="member-info">
                                    <div class="member-name">Prof. Antonino Galletta</div>
                                    <div class="member-affiliation">University of Messina, Italy</div>
                                </div>
                            </div>
                            <div class="member-item">
                                <div class="member-icon">AB</div>
                                <div class="member-info">
                                    <div class="member-name">Dr. Ali Kashif Bashir</div>
                                    <div class="member-affiliation">The Manchester Metropolitan University, UK</div>
                                </div>
                            </div>
                            <div class="member-item">
                                <div class="member-icon">GM</div>
                                <div class="member-info">
                                    <div class="member-name">Dr. G. N. Manjunatha</div>
                                    <div class="member-affiliation">Université Lille, France</div>
                                </div>
                            </div>

                            <div class="member-item">
                                <div class="member-icon">JF</div>
                                <div class="member-info">
                                    <div class="member-name">Prof. Jean-François, BLACH</div>
                                    <div class="member-affiliation">Université d'Artois, France</div>
                                </div>
                            </div>

                            <div class="member-item">
                                <div class="member-icon">RB</div>
                                <div class="member-info">
                                    <div class="member-name">Prof. Rabah BOUKHERROUB</div>
                                    <div class="member-affiliation">Université Lille</div>
                                </div>
                            </div>

                            <div class="member-item">
                                <div class="member-icon">OJ</div>
                                <div class="member-info">
                                    <div class="member-name">Prof. Olivier JOUBERT</div>
                                    <div class="member-affiliation">CNRS-Université de Nantes</div>
                                </div>
                            </div>

                            <div class="member-item">
                                <div class="member-icon">BR</div>
                                <div class="member-info">
                                    <div class="member-name">Prof. Bertrand REUILLARD</div>
                                    <div class="member-affiliation">Université Grenoble, France</div>
                                </div>
                            </div>
                        </div>

                        <!-- Column 3 -->
                        <div class="col-md-4">
                            <div class="member-item">
                                <div class="member-icon">SD</div>
                                <div class="member-info">
                                    <div class="member-name">Prof. Subhasish Dasgupta</div>
                                    <div class="member-affiliation">The George Washington University, USA</div>
                                </div>
                            </div>
                            <div class="member-item">
                                <div class="member-icon">NA</div>
                                <div class="member-info">
                                    <div class="member-name">Prof. Najib BEN AOUN</div>
                                    <div class="member-affiliation">Al-Baha University, Saudi Arabia</div>
                                </div>
                            </div>
                            <div class="member-item">
                                <div class="member-icon">ZB</div>
                                <div class="member-info">
                                    <div class="member-name">Prof. Zakaria Boulouard</div>
                                    <div class="member-affiliation">LIM, Hassan II University of Casablanca, Morocco
                                    </div>
                                </div>
                            </div>
                            <div class="member-item">
                                <div class="member-icon">VP</div>
                                <div class="member-info">
                                    <div class="member-name">Prof. Vasileios Paliktzoglou</div>
                                    <div class="member-affiliation">The University of Eastern Finland</div>
                                </div>
                            </div>
                            <div class="member-item">
                                <div class="member-icon">SK</div>
                                <div class="member-info">
                                    <div class="member-name">Dr. Shakir Khan</div>
                                    <div class="member-affiliation">Imam Muhammad ibn Saud Islamic University, Riyadh
                                    </div>
                                </div>
                            </div>
                            <div class="member-item">
                                <div class="member-icon">SO</div>
                                <div class="member-info">
                                    <div class="member-name">Dr. Soufiane Ouariach</div>
                                    <div class="member-affiliation">PhD, Abdelmalek Essaâdi University, Morocco</div>
                                </div>
                            </div>
                            <div class="member-item">
                                <div class="member-icon">ML</div>
                                <div class="member-info">
                                    <div class="member-name">Prof. Mark Lee</div>
                                    <div class="member-affiliation">University of Birmingham, UK</div>
                                </div>
                            </div>
                            <div class="member-item">
                                <div class="member-icon">CH</div>
                                <div class="member-info">
                                    <div class="member-name">Prof. Chaminda Thushara Hewage</div>
                                    <div class="member-affiliation">Cardiff Metropolitan University, United Kingdom
                                    </div>
                                </div>
                            </div>
                            <div class="member-item">
                                <div class="member-icon">SS</div>
                                <div class="member-info">
                                    <div class="member-name">Dr. Sweta Sneha</div>
                                    <div class="member-affiliation">Kennesaw State University, USA</div>
                                </div>
                            </div>
                            <div class="member-item">
                                <div class="member-icon">MM</div>
                                <div class="member-info">
                                    <div class="member-name">Dr. Meenakshi Memoria</div>
                                    <div class="member-affiliation">Dubai</div>
                                </div>
                            </div>
                            <div class="member-item">
                                <div class="member-icon">SJ</div>
                                <div class="member-info">
                                    <div class="member-name">Dr. Sanjay Jasola</div>
                                    <div class="member-affiliation">VC, DBS Global University, Dehradun</div>
                                </div>
                            </div>
                            <div class="member-item">
                                <div class="member-icon">MD</div>
                                <div class="member-info">
                                    <div class="member-name">Dr. Mario Jose Divan Koller</div>
                                    <div class="member-affiliation">Sr. AI Software Development Engineer, USA</div>
                                </div>
                            </div>
                            <div class="member-item">
                                <div class="member-icon">MK</div>
                                <div class="member-info">
                                    <div class="member-name">Prof. Morgan Kiani</div>
                                    <div class="member-affiliation">Texas Christian University, USA</div>
                                </div>
                            </div>
                            <div class="member-item">
                                <div class="member-icon">EV</div>
                                <div class="member-info">
                                    <div class="member-name">Prof. Emilia Balas Valentina</div>
                                    <div class="member-affiliation">Aurel Vlaicu University of Arad</div>
                                </div>
                            </div>
                            <div class="member-item">
                                <div class="member-icon">VS</div>
                                <div class="member-info">
                                    <div class="member-name">Dr. Vishal Krishna Singh</div>
                                    <div class="member-affiliation">University of Essex</div>
                                </div>
                            </div>

                            <div class="member-item">
                                <div class="member-icon">MR</div>
                                <div class="member-info">
                                    <div class="member-name">Prof. Mario Di Renzo</div>
                                    <div class="member-affiliation">University of Salento Italy</div>
                                </div>
                            </div>

                            <div class="member-item">
                                <div class="member-icon">LA</div>
                                <div class="member-info">
                                    <div class="member-name">Prof. Lars</div>
                                    <div class="member-affiliation">Hildeschium university Germany</div>
                                </div>
                            </div>

                            <div class="member-item">
                                <div class="member-icon">HT</div>
                                <div class="member-info">
                                    <div class="member-name">Dr. Harsh Tiwari</div>
                                    <div class="member-affiliation">South Korea</div>
                                </div>
                            </div>

                            <div class="member-item">
                                <div class="member-icon">MY</div>
                                <div class="member-info">
                                    <div class="member-name">Prof. Masahiro Yoshizawa-Fujita</div>
                                    <div class="member-affiliation">Universita Degli Studi Di Padova</div>
                                </div>
                            </div>

                            <div class="member-item">
                                <div class="member-icon">DS</div>
                                <div class="member-info">
                                    <div class="member-name">Dr. Durga Prasad Sharma</div>
                                    <div class="member-affiliation">Université du Littoral Côte d'Opale</div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>


        </div>



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
    <script>
        function toggleInternational() {
            // This would toggle showing more international advisors
            alert('Feature to show all international advisors would be implemented here');
        }

        function loadMoreCommittees() {
            // This would load the remaining committees
            alert('Feature to load remaining committees (Technical Program, Publication, Finance, etc.) would be implemented here');
        }

        // Add smooth scroll animation for cards
        const cards = document.querySelectorAll('.committee-card');
        const observer1 = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        });

        cards.forEach(card => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            card.style.transition = 'all 0.6s ease';
            observer1.observe(card);
        });

        // Counter animation for stats
        function animateCounter(element, target) {
            let count = 0;
            const increment = target / 100;
            const timer = setInterval(() => {
                count += increment;
                if (count >= target) {
                    element.textContent = target + '+';
                    clearInterval(timer);
                } else {
                    element.textContent = Math.floor(count) + '+';
                }
            }, 20);
        }

        // Animate counters when they come into view
        const statNumbers = document.querySelectorAll('.stat-number');
        const statsObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const target = parseInt(entry.target.textContent);
                    animateCounter(entry.target, target);
                    statsObserver.unobserve(entry.target);
                }
            });
        });

        statNumbers.forEach(stat => {
            statsObserver.observe(stat);
        });
    </script>

    <?php include 'subFooter.php'; ?>
    <?php include 'footer.php'; ?>