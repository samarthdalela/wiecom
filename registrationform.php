<?php
session_start();

// Get any error messages from session
$errors = $_SESSION['errors'] ?? [];
$formData = $_SESSION['form_data'] ?? [];
$generalError = $_SESSION['error'] ?? '';

// Clear errors from session after retrieving them
unset($_SESSION['errors'], $_SESSION['form_data'], $_SESSION['error']);

// Function to get form value with fallback
function getFormValue($key, $default = '') {
    global $formData;
    return htmlspecialchars($formData[$key] ?? $default);
}

// Function to check if radio button should be selected
function isRadioSelected($name, $value) {
    global $formData;
    return isset($formData[$name]) && $formData[$name] == $value ? 'checked' : '';
}

// Function to check if checkbox should be checked
function isCheckboxChecked($name, $value) {
    global $formData;
    if (isset($formData[$name])) {
        if (is_array($formData[$name])) {
            return in_array($value, $formData[$name]) ? 'checked' : '';
        } else {
            return $formData[$name] == $value ? 'checked' : '';
        }
    }
    return '';
}

// Function to check if option should be selected
function isOptionSelected($name, $value) {
    global $formData;
    return isset($formData[$name]) && $formData[$name] == $value ? 'selected' : '';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPWIECON 2025 Registration</title>
    <link rel="shortcut icon" type="image/x-icon" href="images/logo-1.jpg">

    <style>
    :root {
        --primary-blue: rgba(70, 12, 82, 0.99);
        --primary-bluebg: rgba(70, 12, 82, 0.49);
        --accent-blue: rgba(91, 2, 109, 0.99);
        --light-blue: rgba(232, 217, 235, 0.99);
        --gold: #f39c12;
        --goldbg: rgba(243, 156, 18, 0.46);
        --text-dark: #2c3e50;
        --primarySecond: rgba(91, 2, 109, 0.49);
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(135deg, var(--primarySecond) 0%, var(--primary-blue) 100%);
        min-height: 100vh;
        padding: 20px;
    }

    .registration-container {
        max-width: 900px;
        margin: 0 auto;
        background: white;
        border-radius: 15px;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    .form-header {
        background: linear-gradient(135deg, var(--primary-blue) 0%, var(--accent-blue) 100%);
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

    /* Error Messages */
    .error-container {
        background: #f8d7da;
        border: 1px solid #f5c6cb;
        color: #721c24;
        padding: 20px;
        border-radius: 8px;
        margin-bottom: 30px;
    }

    .error-container h3 {
        margin-bottom: 15px;
        font-size: 18px;
    }

    .error-list {
        list-style: none;
        padding: 0;
    }

    .error-list li {
        margin-bottom: 8px;
        padding: 8px 12px;
        background: rgba(220, 53, 69, 0.1);
        border-radius: 4px;
        border-left: 3px solid #dc3545;
    }

    .error-list li:before {
        content: "⚠ ";
        font-weight: bold;
        margin-right: 8px;
    }

    .success-container {
        background: #d4edda;
        border: 1px solid #c3e6cb;
        color: #155724;
        padding: 20px;
        border-radius: 8px;
        margin-bottom: 30px;
    }

    .form-section {
        margin-bottom: 30px;
        padding: 25px;
        border: 1px solid #e1e5e9;
        border-radius: 10px;
        background: #f8f9fa;
    }

    .section-title {
        font-size: 20px;
        font-weight: 600;
        color: var(--text-dark);
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 2px solid var(--primary-blue);
        display: flex;
        align-items: center;
    }

    .section-title i {
        margin-right: 10px;
        font-size: 22px;
        color: var(--primary-blue);
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
        color: var(--text-dark);
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
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }

    .form-group input:focus,
    .form-group select:focus,
    .form-group textarea:focus {
        outline: none;
        border-color: var(--primary-blue);
        box-shadow: 0 0 0 3px rgba(70, 12, 82, 0.1);
    }

    .form-group.error input,
    .form-group.error select {
        border-color: #dc3545;
        box-shadow: 0 0 0 3px rgba(220, 53, 69, 0.1);
    }

    .field-error {
        color: #dc3545;
        font-size: 14px;
        margin-top: 5px;
        display: flex;
        align-items: center;
    }

    .field-error:before {
        content: "⚠ ";
        margin-right: 5px;
    }

    .radio-group {
        display: flex;
        gap: 20px;
        margin-top: 10px;
        flex-wrap: wrap;
    }

    .radio-option {
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 8px 12px;
        border: 2px solid #e1e5e9;
        border-radius: 8px;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .radio-option:hover {
        border-color: var(--primary-blue);
        background: rgba(70, 12, 82, 0.05);
    }

    .radio-option input[type="radio"] {
        width: auto;
        margin: 0;
    }

    .radio-option input[type="radio"]:checked+label {
        color: var(--primary-blue);
        font-weight: 600;
    }

    .radio-option:has(input[type="radio"]:checked) {
        border-color: var(--primary-blue);
        background: rgba(70, 12, 82, 0.1);
    }

    .checkbox-group {
        display: flex;
        gap: 20px;
        margin-top: 10px;
        flex-wrap: wrap;
    }

    .checkbox-option {
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 8px 12px;
        border: 2px solid #e1e5e9;
        border-radius: 8px;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .checkbox-option:hover {
        border-color: var(--primary-blue);
        background: rgba(70, 12, 82, 0.05);
    }

    .checkbox-option input[type="checkbox"] {
        width: auto;
        margin: 0;
    }

    .checkbox-option input[type="checkbox"]:checked+label {
        color: var(--primary-blue);
        font-weight: 600;
    }

    .checkbox-option:has(input[type="checkbox"]:checked) {
        border-color: var(--primary-blue);
        background: rgba(70, 12, 82, 0.1);
    }

    .classification-info {
        background: rgba(232, 217, 235, 0.6);
        border: 1px solid rgba(70, 12, 82, 0.2);
        border-radius: 8px;
        padding: 15px;
        margin-bottom: 20px;
        color: var(--text-dark);
        font-size: 14px;
    }

    .classification-info h4 {
        color: var(--primary-blue);
        margin-bottom: 10px;
        font-size: 16px;
    }

    .classification-info ul {
        margin: 0;
        padding-left: 20px;
    }

    .classification-info li {
        margin-bottom: 5px;
    }

    .amount-display {
        background: linear-gradient(135deg, var(--primary-blue) 0%, var(--accent-blue) 100%);
        color: white;
        padding: 25px;
        border-radius: 10px;
        text-align: center;
        margin: 25px 0;
        box-shadow: 0 10px 30px rgba(70, 12, 82, 0.3);
    }

    .amount-display h3 {
        font-size: 20px;
        margin-bottom: 10px;
    }

    .amount-value {
        font-size: 36px;
        font-weight: bold;
    }

    .file-upload-section {
        background: #fff3cd;
        border: 1px solid #ffeaa7;
        border-radius: 10px;
        padding: 20px;
        margin: 20px 0;
    }

    .file-upload-info {
        color: #856404;
        font-size: 14px;
        margin-bottom: 15px;
    }

    .file-upload-info h4 {
        color: #856404;
        margin-bottom: 10px;
    }

    .submit-section {
        text-align: center;
        margin-top: 40px;
        padding-top: 30px;
        border-top: 2px solid #e1e5e9;
    }

    .submit-btn {
        background: linear-gradient(135deg, var(--primary-blue) 0%, var(--accent-blue) 100%);
        color: white;
        padding: 18px 50px;
        border: none;
        border-radius: 10px;
        font-size: 18px;
        font-weight: 600;
        cursor: pointer;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
        box-shadow: 0 10px 30px rgba(70, 12, 82, 0.3);
    }

    .submit-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 40px rgba(70, 12, 82, 0.4);
    }

    .submit-btn:disabled {
        opacity: 0.6;
        cursor: not-allowed;
        transform: none;
    }

    .required {
        color: #e74c3c;
    }

    .loading-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.8);
        display: none;
        justify-content: center;
        align-items: center;
        z-index: 9999;
    }

    .loading-content {
        background: white;
        padding: 40px;
        border-radius: 15px;
        text-align: center;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
    }

    .icon-wrapper {
        width: 80px;
        height: 80px;
        margin: 0 auto 20px;
        background: linear-gradient(135deg, var(--light-blue) 0%, var(--gold) 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
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

    .icon {
        width: 40px;
        height: 40px;
        stroke: var(--primary-blue);
        stroke-width: 2;
        fill: none;
    }
    .spinner {
        width: 50px;
        height: 50px;
        border: 5px solid #f3f3f3;
        border-top: 5px solid var(--primary-blue);
        border-radius: 50%;
        animation: spin 1s linear infinite;
        margin: 0 auto 20px;
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    /* Test email section */
    .test-section {
        background: var(--light-blue);
        border: 1px solid rgba(70, 12, 82, 0.3);
        border-radius: 10px;
        padding: 20px;
        margin: 20px 0;
    }

    .test-section h4 {
        color: var(--primary-blue);
        margin-bottom: 15px;
    }

    .test-btn {
        background: var(--primary-blue);
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        font-size: 14px;
    }

    /* IEEE ID Section */
    .ieee-id-section {
        background: var(--light-blue);
        border: 1px solid rgba(70, 12, 82, 0.2);
        border-radius: 10px;
        padding: 20px;
        margin: 15px 0;
        display: none;
    }

    .ieee-id-section.show {
        display: block;
        animation: slideDown 0.3s ease;
    }

    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .ieee-info {
        background: rgba(232, 217, 235, 0.6);
        border: 1px solid rgba(70, 12, 82, 0.3);
        border-radius: 8px;
        padding: 15px;
        margin-bottom: 15px;
        color: var(--text-dark);
        font-size: 14px;
    }

    @media (max-width: 768px) {
        .form-row {
            flex-direction: column;
            gap: 0;
        }

        .radio-group,
        .checkbox-group {
            flex-direction: column;
            gap: 10px;
        }

        .form-content {
            padding: 20px;
        }

        .amount-value {
            font-size: 28px;
        }
    }
    </style>
    <!-- Add FontAwesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <div class="loading-overlay" id="loadingOverlay">
        <div class="loading-content">
            <div class="spinner"></div>
            <h3>Processing Registration...</h3>
            <p>Please wait while we process your registration and redirect you to the payment gateway.</p>
        </div>
    </div>

    <div class="registration-container">
        <div class="form-header">
            <h1><i class="fas fa-graduation-cap"></i> UPWIECON 2025</h1>
            <p>IEEE Uttar Pradesh Women in Engineering Conference - Registration Form</p>
        </div>

        <div class="form-content">
            <!-- Display Errors -->
            <?php if (!empty($errors) || !empty($generalError)): ?>
            <div class="error-container">
                <h3><i class="fas fa-exclamation-triangle"></i> Please correct the following errors:</h3>
                <ul class="error-list">
                    <?php if (!empty($generalError)): ?>
                    <li><?php echo htmlspecialchars($generalError); ?></li>
                    <?php endif; ?>
                    <?php foreach ($errors as $error): ?>
                    <li><?php echo htmlspecialchars($error); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <?php endif; ?>

            <!-- Test Email Section (only show for specific test email) -->
            <?php if (getFormValue('txtEmail') === 'samarthdalela@gmail.com' || (!empty($formData) && $formData['txtEmail'] === 'samarthdalela@gmail.com')): ?>
            <div class="test-section">
                <h4><i class="fas fa-envelope-open-text"></i> Email System Test</h4>
                <p>Test the email notification system by sending a test email:</p>
                <button type="button" class="test-btn" onclick="sendTestEmail()">Send Test Email</button>
                <div id="testEmailResult" style="margin-top: 10px;"></div>
            </div>
            <?php endif; ?>

            <form id="registrationForm" method="POST" action="close.php" enctype="multipart/form-data">
                <!-- Personal Information Section -->
                <div class="form-section">
                    <h3 class="section-title">
                        <i class="fas fa-user"></i>
                        Personal Information
                    </h3>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="txtName">Full Name <span class="required">*</span></label>
                            <input type="text" id="txtName" name="txtName"
                                value="<?php echo getFormValue('txtName'); ?>" required disabled>
                        </div>

                        <div class="form-group">
                            <label for="txtEmail">Email Address <span class="required">*</span></label>
                            <input type="email" id="txtEmail" name="txtEmail"
                                value="<?php echo getFormValue('txtEmail'); ?>" required disabled>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="txtMobile">Mobile Number <span class="required">*</span></label>
                            <input type="tel" id="txtMobile" name="txtMobile"
                                value="<?php echo getFormValue('txtMobile'); ?>" required
                                placeholder="10-digit mobile number" disabled>
                        </div>
                        <!-- Hidden FULL concatenated category field -->
                        <input type="hidden" id="category_combined" name="category_combined" value="" disabled>

                        <!-- <div class="form-group">
                            <label for="ddlCategory">Participant Category <span class="required">*</span></label>
                            <select id="ddlCategory" name="ddlCategory" required onchange="calculateAmount()">
                                <option value="0">Select Category</option>
                                <option value="1" <?php echo isOptionSelected('ddlCategory', '1'); ?>>
                                Presenter</option>
                                <option value="2" <?php echo isOptionSelected('ddlCategory', '2'); ?>>Listener
                                </option>
                                <option value="3" <?php echo isOptionSelected('ddlCategory', '3'); ?>>Ph.D. Colloquium</option>
                            </select>
                        </div> -->
                        <div class="form-group">
                            <label for="ddlCategory">Participant Category <span class="required">*</span></label>
                            <select id="ddlCategory" name="ddlCategory" required disabled
                                onchange="calculateAmount(); updateCategoryFull();">
                                <option value="0">Select Category</option>
                                <option value="1" <?php echo isOptionSelected('ddlCategory', '1'); ?>>
                                    Presenter</option>
                                <option value="2" <?php echo isOptionSelected('ddlCategory', '2'); ?>>Listener
                                </option>
                                <!-- <option value="3" <?php echo isOptionSelected('ddlCategory', '3'); ?>>Ph.D. Colloquium</option> -->
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Professional Classification Section -->
                <!-- <div class="form-section">
                    <h3 class="section-title">
                        <i class="fas fa-graduation-cap"></i>
                        Professional Classification
                    </h3>


                    <div class="form-group">
                        <label>Professional Status <span class="required">*</span></label>
                        <div class="checkbox-group">
                            <div class="checkbox-option">
                                <input type="checkbox" id="academicProfessional" name="chkProfessionalStatus[]" value="academic_professional"
                                    <?php echo isCheckboxChecked('chkProfessionalStatus', 'academic_professional'); ?>
                                    onchange="handleProfessionalStatusChange(this); calculateAmount()">
                                <label for="academicProfessional">
                                    <i class="fas fa-briefcase"></i> Academic/Professional
                                </label>
                            </div>
                            <div class="checkbox-option">
                                <input type="checkbox" id="student" name="chkProfessionalStatus[]" value="student"
                                    <?php echo isCheckboxChecked('chkProfessionalStatus', 'student'); ?>
                                    onchange="handleProfessionalStatusChange(this); calculateAmount()">
                                <label for="student">
                                    <i class="fas fa-user-graduate"></i> Student
                                </label>
                            </div>
                        </div>
                    </div>

                </div> -->
                <div class="form-section">
                    <div class="form-group">
                        <label>Professional Status <span class="required">*</span></label>
                        <div class="checkbox-group">
                            <div class="checkbox-option">
                                <input type="checkbox" id="academicProfessional" name="chkProfessionalStatus[]"
                                    value="academic_professional"
                                    <?php echo isCheckboxChecked('chkProfessionalStatus', 'academic_professional'); ?>
                                    onchange="handleProfessionalStatusChange(this); calculateAmount(); updateCategoryFull(); validateProfessionalStatus();" disabled>
                                <label for="academicProfessional">
                                    <i class="fas fa-briefcase"></i> Academic/Professional
                                </label>
                            </div>
                            <div class="checkbox-option">
                                <input type="checkbox" id="student" name="chkProfessionalStatus[]" value="student"
                                    <?php echo isCheckboxChecked('chkProfessionalStatus', 'student'); ?>
                                    onchange="handleProfessionalStatusChange(this); calculateAmount(); updateCategoryFull(); validateProfessionalStatus();" disabled>
                                <label for="student">
                                    <i class="fas fa-user-graduate"></i> Student
                                </label>
                            </div>
                        </div>
                        <!-- error message will appear here -->
                        <small id="professionalStatusError" style="color:red; display:none;">
                            Please select at least one Professional Status.
                        </small>
                    </div>
                </div>
                <!-- Registration Options Section -->
                <div class="form-section">
                    <h3 class="section-title">
                        <i class="fas fa-cogs"></i>
                        Registration Options
                    </h3>

                    <div class="form-row">
                        <div class="form-group">
                            <label>IEEE Member <span class="required">*</span></label>
                            <div class="radio-group">
                                <div class="radio-option">
                                    <input type="radio" id="ieeeYes" name="rdbIEEEMember" value="1"
                                        <?php echo isRadioSelected('rdbIEEEMember', '1'); ?>
                                        onchange="calculateAmount(); toggleIEEESection(); togglePaperUpload()" disabled>
                                    <label for="ieeeYes">Yes</label>
                                </div>
                                <div class="radio-option">
                                    <input type="radio" id="ieeeNo" name="rdbIEEEMember" value="2"
                                        <?php echo isRadioSelected('rdbIEEEMember', '2'); ?>
                                        onchange="calculateAmount(); toggleIEEESection(); togglePaperUpload()" disabled>
                                    <label for="ieeeNo">No</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Nationality <span class="required">*</span></label>
                            <div class="radio-group">
                                <div class="radio-option">
                                    <input type="radio" id="nationalityIndian" name="rdbNationality" value="1"
                                        <?php echo isRadioSelected('rdbNationality', '1'); ?>
                                        onchange="calculateAmount()" disabled>
                                    <label for="nationalityIndian">Indian</label>
                                </div>
                                <div class="radio-option">
                                    <input type="radio" id="nationalityForeign" name="rdbNationality" value="2"
                                        <?php echo isRadioSelected('rdbNationality', '2'); ?>
                                        onchange="calculateAmount()" disabled>
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
                                    <input type="radio" id="earlyBirdYes" name="rdbEarlyBird" value="1" disabled
                                        <?php echo isRadioSelected('rdbEarlyBird', '1'); ?>
                                        onchange="calculateAmount()">
                                    <label for="earlyBirdYes">Yes (Before September 1 , 2025)</label>
                                </div>
                                <div class="radio-option">
                                    <input type="radio" id="earlyBirdNo" name="rdbEarlyBird" value="2" disabled
                                        <?php echo isRadioSelected('rdbEarlyBird', '2'); ?> onchange="calculateAmount()"
                                        checked>
                                    <label for="earlyBirdNo">Regular (After September 1, 2025)</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>NIELIT Participant</label>
                            <div class="radio-group">
                                <div class="radio-option">
                                    <input type="radio" id="nielitYes" name="rdbNielit" value="1" disabled
                                        <?php echo isRadioSelected('rdbNielit', '1'); ?>>
                                    <label for="nielitYes">Yes</label>
                                </div>
                                <div class="radio-option">
                                    <input type="radio" id="nielitNo" name="rdbNielit" value="2" disabled
                                        <?php echo isRadioSelected('rdbNielit', '2'); ?>>
                                    <label for="nielitNo">No</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- IEEE ID Section - Shows when IEEE member is selected -->
                    <div class="ieee-id-section" id="ieeeIdSection">
                        <div class="ieee-info">
                            <h4><i class="fas fa-info-circle"></i> IEEE Membership Information</h4>
                            <p><strong>Please enter your IEEE Member ID number.</strong> This helps us verify your
                                membership status and apply the appropriate registration discount.</p>
                            <p><small><i class="fas fa-lightbulb"></i> <strong>Note:</strong> Your IEEE Member ID is
                                    typically 8 or 9 digits long and can be found on your IEEE membership card or in
                                    your IEEE account profile.</small></p>
                        </div>

                        <div class="form-group">
                            <label for="txtIEEEId">
                                <i class="fas fa-id-card"></i> IEEE Member ID <span class="required">*</span>
                            </label>
                            <input type="text" id="txtIEEEId" name="txtIEEEId"
                                value="<?php echo getFormValue('txtIEEEId'); ?>"
                                placeholder="Enter your 8 or 9 digit IEEE Member ID" maxlength="9" pattern="[0-9]{8,9}" disabled>
                            <small style="color: #666; font-size: 12px; margin-top: 5px; display: block;">
                                <i class="fas fa-question-circle"></i> Example: 12345678 (8 or 9 digits only)
                            </small>
                        </div>
                    </div>
                </div>

                <!-- Paper Details Section -->
                <div class="form-section" id="paperSection"
                    style="<?php echo getFormValue('rdbIEEEMember') == '1' ? 'display: block;' : 'display: none;'; ?>">
                    <h3 class="section-title">
                        <i class="fas fa-file-alt"></i>
                        Paper Details
                    </h3>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="txtPaperId">Paper ID<span class="required">*</span></label>
                            <input type="text" id="txtPaperId" name="txtPaperId"
                                value="<?php echo getFormValue('txtPaperId'); ?>" placeholder="Paper ID" required disabled>
                        </div>

                        <div class="form-group">
                            <label for="txtPaperTitle">Paper Title<span class="required">*</span></label>
                            <input type="text" id="txtPaperTitle" name="txtPaperTitle"
                                value="<?php echo getFormValue('txtPaperTitle'); ?>" placeholder="Paper Title" required disabled>
                        </div>
                    </div>
                    <div class="classification-info" id="listenerInstructions" style="display: none;">
                        <h4><i class="fas fa-info-circle"></i> Instructions for Listener Participants</h4>
                        <p><strong>Please follow the guidelines below if you are registering as a Listener:</strong></p>
                        <ul>
                            <li><strong>Listener:</strong> Please enter <code>-</code> in the Paper ID and Paper Title
                                sections.</li>
                        </ul>
                        <p><small><strong>Note:</strong> This classification may affect your registration fee. Please
                                select the most appropriate category.</small></p>
                    </div>


                    <!-- Amount Section -->
                    <div class="amount-display" id="amountSection"
                        style="<?php echo getFormValue('txtAmount') ? 'display: block;' : 'display: none;'; ?>">
                        <h3><i class="fas fa-rupee-sign"></i> Registration Fee</h3>
                        <div class="amount-value">₹ <span
                                id="amountValue"><?php echo getFormValue('txtAmount') ? number_format(floatval(getFormValue('txtAmount')), 2) : '0.00'; ?></span>
                        </div>
                        <input type="hidden" id="txtAmount" name="txtAmount"
                            value="<?php echo getFormValue('txtAmount'); ?>" disabled>
                        <p style="margin-top: 15px; font-size: 14px; opacity: 0.9;">
                            <i class="fas fa-info-circle"></i>
                            Amount calculated based on your selected options. Final amount will be processed securely
                            through our payment gateway.
                        </p>
                    </div>

                    <!-- Submit Section -->
                    <div class="submit-section">
                        <div
                            style="margin-bottom: 20px; padding: 20px; background: #e8f5e8; border-radius: 10px; text-align: left;">
                            <h4 style="color: #155724; margin-bottom: 15px;"><i class="fas fa-shield-alt"></i> Security
                                &
                                Privacy Notice:</h4>
                            <ul style="margin: 0; padding-left: 20px; color: #155724;">
                                <li>Payment processing is handled through secure, PCI-compliant gateways</li>
                                <li>Your data will only be used for conference-related communications</li>
                                <li>We do not share your information with third parties</li>
                            </ul>
                        </div>
                        <button
  type="button"
  class="submit-btn"
  id="submitBtn"
  data-bs-toggle="modal"
  data-bs-target="#registrationClosedModal"
>
  <i class="fas fa-credit-card"></i>
  Registration Closed
</button>

                        <!-- <button type="submit" class="submit-btn" id="submitBtn">
                            <i class="fas fa-credit-card"></i>
                            Register & Proceed to Payment
                        </button> -->

                        <p style="margin-top: 15px; font-size: 14px; color: #666;">
                            By clicking "Register & Proceed to Payment", you agree to our terms and conditions and
                            confirm
                            that the information provided is accurate.
                        </p>
                    </div>
            </form>
        </div>
    </div>
     <!-- Modal HTML for registrationClosedModal -->
     <div class="modal fade" id="registrationClosedModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content" style="border: 2px solid #f39c12; border-radius: 15px; box-shadow: 0 8px 32px rgba(70, 12, 82, 0.3); background: linear-gradient(135deg, #ffffff 0%, rgba(232, 217, 235, 0.99) 100%);">
        <div class="modal-header" style="background: linear-gradient(135deg, rgba(70, 12, 82, 0.99) 0%, rgba(91, 2, 109, 0.99) 100%); border-bottom: 3px solid #f39c12; border-radius: 13px 13px 0 0; padding: 1.5rem;">
          <h5 class="modal-title" style="font-weight: 700; font-size: 1.25rem; letter-spacing: 0.5px; color: white;">Notice</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" style="padding: 2.5rem 1.5rem; text-align: center;">
          <div style="font-size: 3rem; color: #f39c12; margin-bottom: 1rem;">        <div class="icon-wrapper">
          <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill=`var(--primary-blue)` class="bi bi-exclamation-circle" viewBox="0 0 16 16">
  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
  <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z"/>
</svg>
        </div></div>
          <h5 style="color: rgba(70, 12, 82, 0.99); font-weight: 700; font-size: 1.75rem; margin: 1rem 0; letter-spacing: 0.5px;">Registration Closed</h5>
          <p style="color: #2c3e50; font-size: 1rem; line-height: 1.6; margin-top: 1rem;">Registration for this event is currently closed. Please contact support for more information.</p>
        </div>
        <div class="modal-footer" style="border-top: 2px solid rgba(243, 156, 18, 0.46); padding: 1.5rem; background: rgba(255, 255, 255, 0.5); border-radius: 0 0 13px 13px; justify-content: center;">
          <button type="button" class="btn" data-bs-dismiss="modal" style="background: linear-gradient(135deg, #f39c12 0%, #e67e22 100%); border: none; color: white; font-weight: 600; padding: 0.7rem 2rem; border-radius: 8px; transition: all 0.3s ease; box-shadow: 0 4px 15px rgba(243, 156, 18, 0.3);">OK</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    // Show the modal on page load
    window.onload = function() {
      var modal = new bootstrap.Modal(document.getElementById('registrationClosedModal'));
      modal.show();
    };
  </script>
    <script>
    function updateCategoryFull() {
        // Get professional status (only one allowed at a time)
        const professionalChecked = document.querySelector('input[name="chkProfessionalStatus[]"]:checked');
        const professionalVal = professionalChecked ? professionalChecked.value : "";

        // Get participant category from dropdown
        const categoryDropdown = document.getElementById('ddlCategory');
        let categoryVal = "";
        if (categoryDropdown.value === "1") {
            categoryVal = "presenter";
        } else if (categoryDropdown.value === "2") {
            categoryVal = "listener";
        } else if (categoryDropdown.value === "3") {
            categoryVal = "phd_colloquium";
        }

        // Combine
        let fullCategory = "";
        if (professionalVal && categoryVal) {
            fullCategory = professionalVal + "_" + categoryVal;
        }
        document.getElementById('category_combined').value = fullCategory;

    }

    // Attach event listeners (ensure up-to-date hidden field on both inputs)
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('ddlCategory').addEventListener('change', updateCategoryFull);
        document.querySelectorAll('input[name="chkProfessionalStatus[]"]').forEach(function(el) {
            el.addEventListener('change', updateCategoryFull);
        });
        updateCategoryFull();
    });
    </script>
    <script>
    // Updated Pricing Matrix based on UPWIECON 2025 Official Registration Table
    const pricingMatrix = {
        // Format: "category_earlybird_nationality_ieeemember_professionalstatus"
        // Category: 1=Presenter, 2=Listener, 3=Ph.D. Colloquium
        // Early Bird: 1=Yes (Before 1 Aug 2025), 2=No (After 1-Aug-2025)
        // Nationality: 1=Indian, 2=Foreign
        // IEEE Member: 1=Yes, 2=No
        // Professional Status: 1=Academic/Professional, 2=Student

        // ========== INDIAN DELEGATES - EARLY BIRD (Before 1 Aug 2025) - ACADEMIC/PROFESSIONAL ==========
        "1_1_1_1_1": 9000.00, // Presenter, Early Bird, Indian, IEEE Member, Academic/Professional
        "1_1_1_2_1": 10000.00, // Presenter, Early Bird, Indian, Non-IEEE, Academic/Professional
        "2_1_1_1_1": 4000.00, // Listener, Early Bird, Indian, IEEE Member, Academic/Professional
        "2_1_1_2_1": 5000.00, // Listener, Early Bird, Indian, Non-IEEE, Academic/Professional
        "3_1_1_1_1": 2500.00, // Ph.D. Colloquium, Early Bird, Indian, IEEE Member, Academic/Professional
        "3_1_1_2_1": 2500.00, // Ph.D. Colloquium, Early Bird, Indian, Non-IEEE, Academic/Professional

        // ========== INDIAN DELEGATES - EARLY BIRD (Before 1 Aug 2025) - STUDENT ==========
        "1_1_1_1_2": 7000.00, // Presenter, Early Bird, Indian, IEEE Member, Student
        "1_1_1_2_2": 8000.00, // Presenter, Early Bird, Indian, Non-IEEE, Student
        "2_1_1_1_2": 3000.00, // Listener, Early Bird, Indian, IEEE Member, Student
        "2_1_1_2_2": 4000.00, // Listener, Early Bird, Indian, Non-IEEE, Student
        "3_1_1_1_2": 2500.00, // Ph.D. Colloquium, Early Bird, Indian, IEEE Member, Student
        "3_1_1_2_2": 2500.00, // Ph.D. Colloquium, Early Bird, Indian, Non-IEEE, Student

        // ========== INDIAN DELEGATES - REGULAR (After 1-Aug-2025) - ACADEMIC/PROFESSIONAL ==========
        "1_2_1_1_1": 10000.00, // Presenter, Regular, Indian, IEEE Member, Academic/Professional
        "1_2_1_2_1": 11000.00, // Presenter, Regular, Indian, Non-IEEE, Academic/Professional
        "2_2_1_1_1": 5000.00, // Listener, Regular, Indian, IEEE Member, Academic/Professional
        "2_2_1_2_1": 6000.00, // Listener, Regular, Indian, Non-IEEE, Academic/Professional
        "3_2_1_1_1": 2500.00, // Ph.D. Colloquium, Regular, Indian, IEEE Member, Academic/Professional
        "3_2_1_2_1": 2500.00, // Ph.D. Colloquium, Regular, Indian, Non-IEEE, Academic/Professional

        // ========== INDIAN DELEGATES - REGULAR (After 1-Aug-2025) - STUDENT ==========
        "1_2_1_1_2": 8000.00, // Presenter, Regular, Indian, IEEE Member, Student
        "1_2_1_2_2": 9000.00, // Presenter, Regular, Indian, Non-IEEE, Student
        "2_2_1_1_2": 4000.00, // Listener, Regular, Indian, IEEE Member, Student
        "2_2_1_2_2": 4500.00, // Listener, Regular, Indian, Non-IEEE, Student
        "3_2_1_1_2": 2500.00, // Ph.D. Colloquium, Regular, Indian, IEEE Member, Student
        "3_2_1_2_2": 2500.00, // Ph.D. Colloquium, Regular, Indian, Non-IEEE, Student

        // ========== FOREIGN DELEGATES - EARLY BIRD (Before 1 Aug 2025) - ACADEMIC/PROFESSIONAL ==========
        // Note: Converting USD to INR at approximate rate of USD 1 = INR 86
        "1_1_2_1_1": 25800.00, // Presenter, Early Bird, Foreign, IEEE Member, Academic/Professional (USD 300)
        "1_1_2_2_1": 34400.00, // Presenter, Early Bird, Foreign, Non-IEEE, Academic/Professional (USD 400)
        "2_1_2_1_1": 12900.00, // Listener, Early Bird, Foreign, IEEE Member, Academic/Professional (USD 150)
        "2_1_2_2_1": 17200.00, // Listener, Early Bird, Foreign, Non-IEEE, Academic/Professional (USD 200)
        "3_1_2_1_1": 8600.00, // Ph.D. Colloquium, Early Bird, Foreign, IEEE Member, Academic/Professional (USD 100)
        "3_1_2_2_1": 8600.00, // Ph.D. Colloquium, Early Bird, Foreign, Non-IEEE, Academic/Professional (USD 100)

        // ========== FOREIGN DELEGATES - EARLY BIRD (Before 1 Aug 2025) - STUDENT ==========
        "1_1_2_1_2": 17200.00, // Presenter, Early Bird, Foreign, IEEE Member, Student (USD 200)
        "1_1_2_2_2": 25800.00, // Presenter, Early Bird, Foreign, Non-IEEE, Student (USD 300)
        "2_1_2_1_2": 8600.00, // Listener, Early Bird, Foreign, IEEE Member, Student (USD 100)
        "2_1_2_2_2": 12900.00, // Listener, Early Bird, Foreign, Non-IEEE, Student (USD 150)
        "3_1_2_1_2": 8600.00, // Ph.D. Colloquium, Early Bird, Foreign, IEEE Member, Student (USD 100)
        "3_1_2_2_2": 8600.00, // Ph.D. Colloquium, Early Bird, Foreign, Non-IEEE, Student (USD 100)

        // ========== FOREIGN DELEGATES - REGULAR (After 1-Aug-2025) - ACADEMIC/PROFESSIONAL ==========
        "1_2_2_1_1": 30100.00, // Presenter, Regular, Foreign, IEEE Member, Academic/Professional (USD 350)
        "1_2_2_2_1": 38700.00, // Presenter, Regular, Foreign, Non-IEEE, Academic/Professional (USD 450)
        "2_2_2_1_1": 17200.00, // Listener, Regular, Foreign, IEEE Member, Academic/Professional (USD 200)
        "2_2_2_2_1": 21500.00, // Listener, Regular, Foreign, Non-IEEE, Academic/Professional (USD 250)
        "3_2_2_1_1": 8600.00, // Ph.D. Colloquium, Regular, Foreign, IEEE Member, Academic/Professional (USD 100)
        "3_2_2_2_1": 8600.00, // Ph.D. Colloquium, Regular, Foreign, Non-IEEE, Academic/Professional (USD 100)

        // ========== FOREIGN DELEGATES - REGULAR (After 1-Aug-2025) - STUDENT ==========
        "1_2_2_1_2": 21500.00, // Presenter, Regular, Foreign, IEEE Member, Student (USD 250)
        "1_2_2_2_2": 30100.00, // Presenter, Regular, Foreign, Non-IEEE, Student (USD 350)
        "2_2_2_1_2": 12900.00, // Listener, Regular, Foreign, IEEE Member, Student (USD 150)
        "2_2_2_2_2": 17200.00, // Listener, Regular, Foreign, Non-IEEE, Student (USD 200)
        "3_2_2_1_2": 8600.00, // Ph.D. Colloquium, Regular, Foreign, IEEE Member, Student (USD 100)
        "3_2_2_2_2": 8600.00 // Ph.D. Colloquium, Regular, Foreign, Non-IEEE, Student (USD 100)
    };

    function calculateAmount() {
        const category = document.getElementById('ddlCategory').value;
        const earlyBird = document.querySelector('input[name="rdbEarlyBird"]:checked')?.value;
        const nationality = document.querySelector('input[name="rdbNationality"]:checked')?.value;
        const ieeeMember = document.querySelector('input[name="rdbIEEEMember"]:checked')?.value;
        const professionalStatus = document.querySelector('input[name="chkProfessionalStatus[]"]:checked')?.value;
        const email = document.getElementById('txtEmail').value;

        // Convert professional status to numeric value for pricing matrix
        let professionalStatusCode = '';
        if (professionalStatus === 'academic_professional') {
            professionalStatusCode = '1';
        } else if (professionalStatus === 'student') {
            professionalStatusCode = '2';
        }

        if (category !== "0" && earlyBird && nationality && ieeeMember && professionalStatusCode) {
            const key = `${category}_${earlyBird}_${nationality}_${ieeeMember}_${professionalStatusCode}`;
            let amount = pricingMatrix[key] || 0;

            // Special case for test email
            if (email === "samarthdalela@gmail.com") {
                amount = 1.00;
            }

            document.getElementById('amountValue').textContent = amount.toFixed(2);
            document.getElementById('txtAmount').value = amount.toFixed(2);
            document.getElementById('amountSection').style.display = 'block';

            console.log('Amount calculated:', {
                category,
                earlyBird,
                nationality,
                ieeeMember,
                professionalStatus,
                professionalStatusCode,
                key,
                email,
                amount
            });
        } else {
            document.getElementById('amountSection').style.display = 'none';
            console.log('Missing required fields for amount calculation:', {
                category: category !== "0" ? category : 'missing',
                earlyBird: earlyBird || 'missing',
                nationality: nationality || 'missing',
                ieeeMember: ieeeMember || 'missing',
                professionalStatus: professionalStatus || 'missing'
            });
        }
    }

    // Handle professional status checkbox changes (only one can be selected)
    function handleProfessionalStatusChange(checkbox) {
        const checkboxes = document.querySelectorAll('input[name="chkProfessionalStatus[]"]');
        const academicDetails = document.getElementById('academicProfessionalDetails');
        const studentDetails = document.getElementById('studentDetails');

        // Uncheck all other checkboxes
        checkboxes.forEach(cb => {
            if (cb !== checkbox) {
                cb.checked = false;
            }
        });

        // Show/hide relevant sections
        if (checkbox.value === 'academic_professional' && checkbox.checked) {
            academicDetails.style.display = 'block';
            studentDetails.style.display = 'none';

            // Make institution required
            document.getElementById('txtInstitution').required = true;

            // Remove requirements from student fields
            document.getElementById('txtUniversity').required = false;
            document.getElementById('ddlDegreeLevel').required = false;
        } else if (checkbox.value === 'student' && checkbox.checked) {
            studentDetails.style.display = 'block';
            academicDetails.style.display = 'none';

            // Make student fields required
            document.getElementById('txtUniversity').required = true;
            document.getElementById('ddlDegreeLevel').required = true;

            // Remove institution requirement
            document.getElementById('txtInstitution').required = false;
        } else {
            // If unchecked or no selection
            academicDetails.style.display = 'none';
            studentDetails.style.display = 'none';

            // Remove all requirements
            document.getElementById('txtInstitution').required = false;
            document.getElementById('txtUniversity').required = false;
            document.getElementById('ddlDegreeLevel').required = false;
        }

        // Recalculate amount when professional status changes
        calculateAmount();
    }

    function toggleIEEESection() {
        const ieeeYes = document.getElementById('ieeeYes').checked;
        const ieeeIdSection = document.getElementById('ieeeIdSection');
        const ieeeIdInput = document.getElementById('txtIEEEId');

        if (ieeeYes) {
            ieeeIdSection.classList.add('show');
            ieeeIdInput.required = true;
        } else {
            ieeeIdSection.classList.remove('show');
            ieeeIdInput.required = false;
            ieeeIdInput.value = '';
        }
    }

    function togglePaperUpload() {
        const ieeeYes = document.getElementById('ieeeYes').checked;
        const paperSection = document.getElementById('paperSection');

        if (ieeeYes) {
            paperSection.style.display = 'block';
        } else {
            paperSection.style.display = 'block';
        }
    }

    // Send test email function
    function sendTestEmail() {
        const resultDiv = document.getElementById('testEmailResult');
        resultDiv.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Sending test email...';

        fetch('test_email.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'action=send_test'
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    resultDiv.innerHTML =
                        '<div style="color: #155724;"><i class="fas fa-check-circle"></i> Test email sent successfully!</div>';
                } else {
                    resultDiv.innerHTML =
                        '<div style="color: #721c24;"><i class="fas fa-exclamation-circle"></i> Test email failed: ' +
                        data.error + '</div>';
                }
            })
            .catch(error => {
                resultDiv.innerHTML =
                    '<div style="color: #721c24;"><i class="fas fa-exclamation-circle"></i> Error: ' + error
                    .message + '</div>';
            });
    }

    // IEEE ID input validation
    document.getElementById('txtIEEEId').addEventListener('input', function(e) {
        let value = e.target.value.replace(/\D/g, '');
        if (value.length > 9) {
            value = value.substring(0, 9);
        }
        e.target.value = value;
    });

    // IEEE ID real-time validation
    document.getElementById('txtIEEEId').addEventListener('blur', function() {
        const ieeeId = this.value.trim();
        const formGroup = this.closest('.form-group');
        const existingError = formGroup.querySelector('.field-error');

        if (existingError) {
            existingError.remove();
            formGroup.classList.remove('error');
        }

        if (
            ieeeId.length > 0 &&
            !((ieeeId.length === 8 || ieeeId.length === 9))
        ) {
            formGroup.classList.add('error');
            const errorDiv = document.createElement('div');
            errorDiv.className = 'field-error';
            errorDiv.textContent = 'IEEE Member ID must be 8 or 9 digits';
            this.parentNode.appendChild(errorDiv);
        }
    });

    // Form validation
    document.getElementById('registrationForm').addEventListener('submit', function(e) {
        e.preventDefault();

        // Show loading overlay
        document.getElementById('loadingOverlay').style.display = 'flex';

        // Clear previous errors
        document.querySelectorAll('.field-error').forEach(el => el.remove());
        document.querySelectorAll('.form-group').forEach(el => el.classList.remove('error'));

        let isValid = true;
        const errors = [];

        // Validate required fields
        const name = document.getElementById('txtName').value.trim();
        const email = document.getElementById('txtEmail').value.trim();
        const mobile = document.getElementById('txtMobile').value.trim();
        const category = document.getElementById('ddlCategory').value;

        if (name.length < 2) {
            errors.push({
                field: 'txtName',
                message: 'Name must be at least 2 characters long'
            });
            isValid = false;
        }

        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            errors.push({
                field: 'txtEmail',
                message: 'Please enter a valid email address'
            });
            isValid = false;
        }

        const mobileRegex = /^[0-9]{10}$/;
        if (!mobileRegex.test(mobile.replace(/\D/g, ''))) {
            errors.push({
                field: 'txtMobile',
                message: 'Please enter a valid 10-digit mobile number'
            });
            isValid = false;
        }

        if (category === "0") {
            errors.push({
                field: 'ddlCategory',
                message: 'Please select a category'
            });
            isValid = false;
        }

        //     // Validate professional status
        //     const professionalStatus = document.querySelector('input[name="chkProfessionalStatus[]"]:checked');
        //     if (!professionalStatus) {
        //         errors.push({
        //             field: 'chkProfessionalStatus',
        //             message: 'Please select your professional status'
        //         });
        //         isValid = false;
        //     } else {
        //         // Validate based on selected professional status
        //         if (professionalStatus.value === 'academic_professional') {
        //             const institution = document.getElementById('txtInstitution').value.trim();
        //             if (!institution) {
        //                 errors.push({
        //                     field: 'txtInstitution',
        //                     message: 'Institution/Organization is required for Academic/Professional'
        //                 });
        //                 isValid = false;
        //             }
        //         } else if (professionalStatus.value === 'student') {
        //             const university = document.getElementById('txtUniversity').value.trim();
        //             const degreeLevel = document.getElementById('ddlDegreeLevel').value;

        //             if (!university) {
        //                 errors.push({
        //                     field: 'txtUniversity',
        //                     message: 'University/College is required for students'
        //                 });
        //                 isValid = false;
        //             }

        //             if (!degreeLevel) {
        //                 errors.push({
        //                     field: 'ddlDegreeLevel',
        //                     message: 'Please select your degree level'
        //                 });
        //                 isValid = false;
        //             }
        //         }
        //     }

        // Validate radio buttons
        if (!document.querySelector('input[name="rdbIEEEMember"]:checked')) {
            isValid = false;
            errors.push({
                field: 'rdbIEEEMember',
                message: 'Please select IEEE membership status'
            });
        }

        if (!document.querySelector('input[name="rdbNationality"]:checked')) {
            isValid = false;
            errors.push({
                field: 'rdbNationality',
                message: 'Please select nationality'
            });
        }

        if (!document.querySelector('input[name="rdbEarlyBird"]:checked')) {
            isValid = false;
            errors.push({
                field: 'rdbEarlyBird',
                message: 'Please select early bird registration option'
            });
        }



        if (!isValid) {
            // Hide loading overlay
            document.getElementById('loadingOverlay').style.display = 'none';

            // Display field-specific errors
            errors.forEach(error => {
                const field = document.getElementById(error.field);
                if (field) {
                    const formGroup = field.closest('.form-group');
                    if (formGroup) {
                        formGroup.classList.add('error');

                        const errorDiv = document.createElement('div');
                        errorDiv.className = 'field-error';
                        errorDiv.textContent = error.message;
                        field.parentNode.appendChild(errorDiv);
                    }
                } else if (error.field === 'chkProfessionalStatus') {
                    // Handle checkbox group error
                    const checkboxGroup = document.querySelector('.checkbox-group');
                    if (checkboxGroup) {
                        const errorDiv = document.createElement('div');
                        errorDiv.className = 'field-error';
                        errorDiv.textContent = error.message;
                        errorDiv.style.marginTop = '10px';
                        checkboxGroup.parentNode.appendChild(errorDiv);
                    }
                }
            });

            // Scroll to first error
            const firstError = document.querySelector('.form-group.error, .field-error');
            if (firstError) {
                firstError.scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });
            }

            return false;
        }

        // Show success message and submit
        document.getElementById('submitBtn').disabled = true;
        document.getElementById('submitBtn').innerHTML = '<i class="fas fa-spinner fa-spin"></i> Processing...';

        // Submit form after a brief delay to show the loading state
        setTimeout(() => {
            this.submit();
        }, 1000);
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

    // Initialize form state based on existing values
    document.addEventListener('DOMContentLoaded', function() {
        calculateAmount();
        toggleIEEESection();
        togglePaperUpload();

        // Initialize professional status based on form data
        const checkedStatus = document.querySelector('input[name="chkProfessionalStatus[]"]:checked');
        if (checkedStatus) {
            handleProfessionalStatusChange(checkedStatus);
        }

        // Auto-focus first empty field
        const firstEmptyField = document.querySelector(
            'input[required]:not([value]), select[required] option[value=""]:checked');
        if (firstEmptyField) {
            firstEmptyField.focus();
        }
    });

    // Add real-time validation feedback
    document.getElementById('txtName').addEventListener('blur', function() {
        const name = this.value.trim();
        const formGroup = this.closest('.form-group');
        const existingError = formGroup.querySelector('.field-error');

        if (existingError) {
            existingError.remove();
            formGroup.classList.remove('error');
        }

        if (name.length > 0 && name.length < 2) {
            formGroup.classList.add('error');
            const errorDiv = document.createElement('div');
            errorDiv.className = 'field-error';
            errorDiv.textContent = 'Name must be at least 2 characters long';
            this.parentNode.appendChild(errorDiv);
        }
    });

    document.getElementById('txtEmail').addEventListener('blur', function() {
        const email = this.value.trim();
        const formGroup = this.closest('.form-group');
        const existingError = formGroup.querySelector('.field-error');

        if (existingError) {
            existingError.remove();
            formGroup.classList.remove('error');
        }

        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (email.length > 0 && !emailRegex.test(email)) {
            formGroup.classList.add('error');
            const errorDiv = document.createElement('div');
            errorDiv.className = 'field-error';
            errorDiv.textContent = 'Please enter a valid email address';
            this.parentNode.appendChild(errorDiv);
        }
    });

    document.getElementById('txtMobile').addEventListener('blur', function() {
        const mobile = this.value.trim();
        const formGroup = this.closest('.form-group');
        const existingError = formGroup.querySelector('.field-error');

        if (existingError) {
            existingError.remove();
            formGroup.classList.remove('error');
        }

        const mobileRegex = /^[0-9]{10}$/;
        if (mobile.length > 0 && !mobileRegex.test(mobile.replace(/\D/g, ''))) {
            formGroup.classList.add('error');
            const errorDiv = document.createElement('div');
            errorDiv.className = 'field-error';
            errorDiv.textContent = 'Please enter a valid 10-digit mobile number';
            this.parentNode.appendChild(errorDiv);
        }
    });

    function toggleListenerInstructions() {
        const category = document.getElementById('ddlCategory').value;
        const listenerInfo = document.getElementById('listenerInstructions');

        if (category === '2') { // Assuming '2' is Listener
            listenerInfo.style.display = 'block';
        } else {
            listenerInfo.style.display = 'none';
        }
    }

    // Trigger once on page load
    document.addEventListener('DOMContentLoaded', toggleListenerInstructions);

    // Update when dropdown changes
    document.getElementById('ddlCategory').addEventListener('change', toggleListenerInstructions);
    </script>

</body>

</html>