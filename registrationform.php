<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPWIECON 2025 Registration</title>
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
        min-height: 100vh;
        padding: 20px;
    }

    .registration-container {
        max-width: 800px;
        margin: 0 auto;
        background: white;
        border-radius: 15px;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    .form-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 30px;
        text-align: center;
    }

    .form-header h1 {
        font-size: 28px;
        margin-bottom: 10px;
    }

    .form-header p {
        font-size: 16px;
        opacity: 0.9;
    }

    .form-content {
        padding: 40px;
    }

    .form-section {
        margin-bottom: 30px;
        padding: 20px;
        border: 1px solid #e1e5e9;
        border-radius: 8px;
        background: #f8f9fa;
    }

    .section-title {
        font-size: 18px;
        font-weight: 600;
        color: #333;
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 2px solid #667eea;
    }

    .form-row {
        display: flex;
        gap: 20px;
        margin-bottom: 20px;
    }

    .form-group {
        flex: 1;
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        color: #333;
        font-weight: 600;
    }

    .form-group input,
    .form-group select,
    .form-group textarea {
        width: 100%;
        padding: 12px 15px;
        border: 2px solid #e1e5e9;
        border-radius: 8px;
        font-size: 16px;
        transition: border-color 0.3s ease;
    }

    .form-group input:focus,
    .form-group select:focus,
    .form-group textarea:focus {
        outline: none;
        border-color: #667eea;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }

    .radio-group {
        display: flex;
        gap: 20px;
        margin-top: 10px;
    }

    .radio-option {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .radio-option input[type="radio"] {
        width: auto;
        margin: 0;
    }

    .amount-display {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 20px;
        border-radius: 8px;
        text-align: center;
        margin: 20px 0;
    }

    .amount-display h3 {
        font-size: 18px;
        margin-bottom: 10px;
    }

    .amount-value {
        font-size: 32px;
        font-weight: bold;
    }

    .file-upload-section {
        background: #fff3cd;
        border: 1px solid #ffeaa7;
        border-radius: 8px;
        padding: 20px;
        margin: 20px 0;
    }

    .file-upload-info {
        color: #856404;
        font-size: 14px;
        margin-bottom: 10px;
    }

    .submit-section {
        text-align: center;
        margin-top: 30px;
        padding-top: 20px;
        border-top: 1px solid #e1e5e9;
    }

    .submit-btn {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 15px 40px;
        border: none;
        border-radius: 8px;
        font-size: 18px;
        font-weight: 600;
        cursor: pointer;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .submit-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(102, 126, 234, 0.3);
    }

    .submit-btn:disabled {
        opacity: 0.6;
        cursor: not-allowed;
        transform: none;
    }

    .error-message {
        color: #e74c3c;
        font-size: 14px;
        margin-top: 5px;
    }

    .required {
        color: #e74c3c;
    }

    @media (max-width: 768px) {
        .form-row {
            flex-direction: column;
            gap: 0;
        }

        .radio-group {
            flex-direction: column;
            gap: 10px;
        }

        .form-content {
            padding: 20px;
        }
    }
    </style>
</head>

<body>
    <div class="registration-container">
        <div class="form-header">
            <h1>UPWIECON 2025</h1>
            <p>IEEE Uttarakhand Women in Engineering Conference - Registration Form</p>
        </div>

        <div class="form-content">
            <form id="registrationForm" method="POST" action="process_conference_registration.php"
                enctype="multipart/form-data">
                <!-- Personal Information Section -->
                <div class="form-section">
                    <h3 class="section-title">Personal Information</h3>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="txtName">Full Name <span class="required">*</span></label>
                            <input type="text" id="txtName" name="txtName" required>
                            <div class="error-message" id="nameError"></div>
                        </div>

                        <div class="form-group">
                            <label for="txtEmail">Email Address <span class="required">*</span></label>
                            <input type="email" id="txtEmail" name="txtEmail" required>
                            <div class="error-message" id="emailError"></div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="txtMobile">Mobile Number <span class="required">*</span></label>
                            <input type="tel" id="txtMobile" name="txtMobile" required>
                            <div class="error-message" id="mobileError"></div>
                        </div>

                        <div class="form-group">
                            <label for="ddlCategory">Category <span class="required">*</span></label>
                            <select id="ddlCategory" name="ddlCategory" required onchange="calculateAmount()">
                                <option value="0">Select Category</option>
                                <option value="1">Professional/Industry</option>
                                <option value="2">Academic/Faculty</option>
                                <option value="3">Student</option>
                            </select>
                            <div class="error-message" id="categoryError"></div>
                        </div>
                    </div>
                </div>

                <!-- Registration Options Section -->
                <div class="form-section">
                    <h3 class="section-title">Registration Options</h3>

                    <div class="form-row">
                        <div class="form-group">
                            <label>IEEE Member <span class="required">*</span></label>
                            <div class="radio-group">
                                <div class="radio-option">
                                    <input type="radio" id="ieeeYes" name="rdbIEEEMember" value="1"
                                        onchange="calculateAmount(); togglePaperUpload()">
                                    <label for="ieeeYes">Yes</label>
                                </div>
                                <div class="radio-option">
                                    <input type="radio" id="ieeeNo" name="rdbIEEEMember" value="2"
                                        onchange="calculateAmount(); togglePaperUpload()">
                                    <label for="ieeeNo">No</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Nationality <span class="required">*</span></label>
                            <div class="radio-group">
                                <div class="radio-option">
                                    <input type="radio" id="nationalityIndian" name="rdbNationality" value="1"
                                        onchange="calculateAmount()">
                                    <label for="nationalityIndian">Indian</label>
                                </div>
                                <div class="radio-option">
                                    <input type="radio" id="nationalityForeign" name="rdbNationality" value="2"
                                        onchange="calculateAmount()">
                                    <label for="nationalityForeign">Foreign</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label>Early Bird Registration <span class="required">*</span></label>
                            <div class="radio-group">
                                <div class="radio-option">
                                    <input type="radio" id="earlyBirdYes" name="rdbEarlyBird" value="1"
                                        onchange="calculateAmount()">
                                    <label for="earlyBirdYes">Yes</label>
                                </div>
                                <div class="radio-option">
                                    <input type="radio" id="earlyBirdNo" name="rdbEarlyBird" value="2"
                                        onchange="calculateAmount()">
                                    <label for="earlyBirdNo">No</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>NIELIT Participant</label>
                            <div class="radio-group">
                                <div class="radio-option">
                                    <input type="radio" id="nielitYes" name="rdbNielit" value="1">
                                    <label for="nielitYes">Yes</label>
                                </div>
                                <div class="radio-option">
                                    <input type="radio" id="nielitNo" name="rdbNielit" value="2">
                                    <label for="nielitNo">No</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Paper Details Section -->
                <div class="form-section" id="paperSection" style="display: none;">
                    <h3 class="section-title">Paper Details (For IEEE Members)</h3>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="txtPaperId">Paper ID</label>
                            <input type="text" id="txtPaperId" name="txtPaperId">
                        </div>

                        <div class="form-group">
                            <label for="txtPaperTitle">Paper Title</label>
                            <input type="text" id="txtPaperTitle" name="txtPaperTitle">
                        </div>
                    </div>

                    <div class="file-upload-section">
                        <div class="file-upload-info">
                            <strong>Paper Upload Guidelines:</strong><br>
                            • Accepted formats: PDF, DOC, DOCX<br>
                            • Maximum file size: 3MB<br>
                            • File will be uploaded to secure server
                        </div>
                        <div class="form-group">
                            <label for="paperUpload">Upload Paper Document</label>
                            <input type="file" id="paperUpload" name="paperUpload" accept=".pdf,.doc,.docx">
                            <div class="error-message" id="fileError"></div>
                        </div>
                    </div>
                </div>

                <!-- Amount Section -->
                <div class="amount-display" id="amountSection" style="display: none;">
                    <h3>Registration Fee</h3>
                    <div class="amount-value">₹ <span id="amountValue">0.00</span></div>
                    <input type="hidden" id="txtAmount" name="txtAmount" value="0">
                </div>

                <!-- Submit Section -->
                <div class="submit-section">
                    <button type="submit" class="submit-btn" id="submitBtn">
                        Register & Proceed to Payment
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
    // Pricing matrix matching the C# logic
    const pricingMatrix = {
        // Indian Delegates
        "1_1_1_1": 9000.00, // Professional, Early Bird, Indian, IEEE
        "2_1_1_1": 4000.00, // Academic, Early Bird, Indian, IEEE
        "3_1_1_1": 2500.00, // Student, Early Bird, Indian, IEEE
        "1_1_1_2": 10000.00, // Professional, Early Bird, Indian, Non-IEEE
        "2_1_1_2": 5000.00, // Academic, Early Bird, Indian, Non-IEEE
        "3_1_1_2": 2500.00, // Student, Early Bird, Indian, Non-IEEE
        "1_2_1_1": 7000.00, // Professional, Regular, Indian, IEEE
        "2_2_1_1": 3000.00, // Academic, Regular, Indian, IEEE
        "3_2_1_1": 2500.00, // Student, Regular, Indian, IEEE
        "1_2_1_2": 8000.00, // Professional, Regular, Indian, Non-IEEE
        "2_2_1_2": 4000.00, // Academic, Regular, Indian, Non-IEEE
        "3_2_1_2": 2500.00, // Student, Regular, Indian, Non-IEEE

        // Foreign Delegates
        "1_1_2_1": 25800.00, // Professional, Early Bird, Foreign, IEEE
        "2_1_2_1": 12900.00, // Academic, Early Bird, Foreign, IEEE
        "3_1_2_1": 8600.00, // Student, Early Bird, Foreign, IEEE
        "1_1_2_2": 34400.00, // Professional, Early Bird, Foreign, Non-IEEE
        "2_1_2_2": 17200.00, // Academic, Early Bird, Foreign, Non-IEEE
        "3_1_2_2": 8600.00, // Student, Early Bird, Foreign, Non-IEEE
        "1_2_2_1": 17200.00, // Professional, Regular, Foreign, IEEE
        "2_2_2_1": 8600.00, // Academic, Regular, Foreign, IEEE
        "3_2_2_1": 8600.00, // Student, Regular, Foreign, IEEE
        "1_2_2_2": 25800.00, // Professional, Regular, Foreign, Non-IEEE
        "2_2_2_2": 12900.00, // Academic, Regular, Foreign, Non-IEEE
        "3_2_2_2": 8600.00 // Student, Regular, Foreign, Non-IEEE
    };

    function calculateAmount() {
        const category = document.getElementById('ddlCategory').value;
        const earlyBird = document.querySelector('input[name="rdbEarlyBird"]:checked')?.value;
        const nationality = document.querySelector('input[name="rdbNationality"]:checked')?.value;
        const ieeeMember = document.querySelector('input[name="rdbIEEEMember"]:checked')?.value;
        const email = document.getElementById('txtEmail').value;

        if (category !== "0" && earlyBird && nationality && ieeeMember) {
            const key = `${category}_${earlyBird}_${nationality}_${ieeeMember}`;
            let amount = pricingMatrix[key] || 0;

            // Special case for test email
            if (email === "samarthdalela@gmail.com") {
                amount = 5.00;
            }

            document.getElementById('amountValue').textContent = amount.toFixed(2);
            document.getElementById('txtAmount').value = amount.toFixed(2);
            document.getElementById('amountSection').style.display = 'block';
        } else {
            document.getElementById('amountSection').style.display = 'none';
        }
    }

    function togglePaperUpload() {
        const ieeeYes = document.getElementById('ieeeYes').checked;
        const paperSection = document.getElementById('paperSection');

        if (ieeeYes) {
            paperSection.style.display = 'block';
        } else {
            paperSection.style.display = 'none';
        }
    }

    // Form validation
    document.getElementById('registrationForm').addEventListener('submit', function(e) {
        e.preventDefault();

        // Clear previous errors
        document.querySelectorAll('.error-message').forEach(el => el.textContent = '');

        let isValid = true;

        // Validate required fields
        const name = document.getElementById('txtName').value.trim();
        const email = document.getElementById('txtEmail').value.trim();
        const mobile = document.getElementById('txtMobile').value.trim();
        const category = document.getElementById('ddlCategory').value;

        if (name.length < 2) {
            document.getElementById('nameError').textContent = 'Name must be at least 2 characters long';
            isValid = false;
        }

        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            document.getElementById('emailError').textContent = 'Please enter a valid email address';
            isValid = false;
        }

        const mobileRegex = /^[0-9]{10}$/;
        if (!mobileRegex.test(mobile.replace(/\D/g, ''))) {
            document.getElementById('mobileError').textContent = 'Please enter a valid 10-digit mobile number';
            isValid = false;
        }

        if (category === "0") {
            document.getElementById('categoryError').textContent = 'Please select a category';
            isValid = false;
        }

        // Validate radio buttons
        if (!document.querySelector('input[name="rdbIEEEMember"]:checked')) {
            isValid = false;
            alert('Please select IEEE membership status');
        }

        if (!document.querySelector('input[name="rdbNationality"]:checked')) {
            isValid = false;
            alert('Please select nationality');
        }

        if (!document.querySelector('input[name="rdbEarlyBird"]:checked')) {
            isValid = false;
            alert('Please select early bird registration option');
        }

        // Validate file upload if IEEE member
        const ieeeYes = document.getElementById('ieeeYes').checked;
        const fileUpload = document.getElementById('paperUpload');

        if (ieeeYes && fileUpload.files.length > 0) {
            const file = fileUpload.files[0];
            const allowedTypes = ['application/pdf', 'application/msword',
                'application/vnd.openxmlformats-officedocument.wordprocessingml.document'
            ];
            const maxSize = 3 * 1024 * 1024; // 3MB

            if (!allowedTypes.includes(file.type) && !file.name.match(/\.(pdf|doc|docx)$/i)) {
                document.getElementById('fileError').textContent = 'Only PDF, DOC, and DOCX files are allowed';
                isValid = false;
            }

            if (file.size > maxSize) {
                document.getElementById('fileError').textContent = 'File size must be less than 3MB';
                isValid = false;
            }
        }

        if (isValid) {
            // Show loading state
            document.getElementById('submitBtn').disabled = true;
            document.getElementById('submitBtn').textContent = 'Processing...';

            // Submit form
            this.submit();
        }
    });

    // Mobile number formatting
    document.getElementById('txtMobile').addEventListener('input', function(e) {
        let value = e.target.value.replace(/\D/g, '');
        if (value.length > 10) {
            value = value.substring(0, 10);
        }
        e.target.value = value;
    });

    // Recalculate amount when email changes (for special test case)
    document.getElementById('txtEmail').addEventListener('input', calculateAmount);
    </script>
</body>

</html>