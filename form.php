<?php
include 'connection.php'; // assumes connection.php sets $conn

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = [];

    $isNielit = $_POST['nielit'] ?? '';
    $ieee = $_POST['ieee'] ?? '';
    $nationality = $_POST['nationality'] ?? '';
    $earlyBird = $_POST['earlyBird'] ?? '';
    $category = $_POST['category'] ?? '';
    $paperID = trim($_POST['paperID'] ?? '');
    $paperTitle = trim($_POST['paperTitle'] ?? '');
    $name = trim($_POST['name'] ?? '');
    $mobile = trim($_POST['mobile'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $amount = "1000"; // Update this based on logic
    $ieee_letter_path = "";

    // === Basic Validations ===
    if (!$isNielit) $errors[] = "Please select NIELIT option.";
    if (!$ieee) $errors[] = "Please select IEEE membership.";
    if (!$nationality) $errors[] = "Please select nationality.";
    if (!$earlyBird) $errors[] = "Please select early bird.";
    if ($category === "0") $errors[] = "Please select category.";
    if (!$paperID) $errors[] = "Please enter paper ID.";
    if (!$paperTitle) $errors[] = "Please enter paper title.";
    if (!$name) $errors[] = "Please enter full name.";
    if (!preg_match('/^\d{10}$/', $mobile)) $errors[] = "Invalid mobile number.";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Invalid email address.";

    // === Handle IEEE Letter Upload ===
    if (isset($_FILES['ieeeFile']) && $_FILES['ieeeFile']['error'] == 0) {
        $uploadDir = 'uploads/';
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $filename = basename($_FILES['ieeeFile']['name']);
        $targetFile = $uploadDir . time() . "_" . $filename;

        $allowedTypes = [
            'application/pdf',
            'application/msword',
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document'
        ];

        if (in_array($_FILES['ieeeFile']['type'], $allowedTypes)) {
            if (move_uploaded_file($_FILES['ieeeFile']['tmp_name'], $targetFile)) {
                $ieee_letter_path = $targetFile;
            } else {
                $errors[] = "Failed to upload IEEE membership file.";
            }
        } else {
            $errors[] = "Invalid IEEE file type. Only .pdf/.doc/.docx allowed.";
        }
    }

    // === Final Insert ===
    if (empty($errors)) {
        $stmt = $conn->prepare("INSERT INTO tbl_registration (is_nielit, ieee_member, nationality, early_bird, category, paper_id, paper_title, full_name, mobile, email, ieee_letter, amount) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssssssss", $isNielit, $ieee, $nationality, $earlyBird, $category, $paperID, $paperTitle, $name, $mobile, $email, $ieee_letter_path, $amount);

        if ($stmt->execute()) {
            echo "<script>alert('Registration submitted successfully!');</script>";
        } else {
            echo "<div class='alert alert-danger'>Insert Error: " . $stmt->error . "</div>";
        }

        $stmt->close();
    }
}
?>
