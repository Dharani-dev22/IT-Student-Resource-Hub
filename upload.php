<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include 'includes/header.php';
require 'includes/db.php';

$error = '';
$success = '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES['material_file'])) {
    $subject = trim($_POST['subject']);
    $semester = trim($_POST['semester']);
    $user_id = $_SESSION['user_id'];
    
    $file_name = $_FILES['material_file']['name'];
    $file_tmp = $_FILES['material_file']['tmp_name'];
    $file_size = $_FILES['material_file']['size'];
    
    $upload_dir = 'uploads/';
    $destination = $upload_dir . basename($file_name);
    
    $allowed_extensions = ['pdf', 'docx', 'png'];
    $file_extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
    
    if (in_array($file_extension, $allowed_extensions)) {
        if ($file_size < 5000000) {
            if (move_uploaded_file($file_tmp, $destination)) {
                $stmt = $pdo->prepare("INSERT INTO materials (user_id, subject, semester, file_name) VALUES (?, ?, ?, ?)");
                if ($stmt->execute([$user_id, $subject, $semester, $file_name])) {
                    $success = "File uploaded successfully.";
                } else {
                    $error = "Database error.";
                }
            } else {
                $error = "Failed to move uploaded file.";
            }
        } else {
            $error = "File size must be under 5MB.";
        }
    } else {
        $error = "Invalid file type. Only PDF, DOCX, and PNG are allowed.";
    }
}
?>

<div class="container">
    <h2>Upload Study Material</h2>
    <?php if($error): ?><p style="color:red; margin-bottom:10px;"><?php echo $error; ?></p><?php endif; ?>
    <?php if($success): ?><p style="color:green; margin-bottom:10px;"><?php echo $success; ?></p><?php endif; ?>
    <form method="POST" action="" enctype="multipart/form-data">
        <div style="margin-bottom: 15px;">
            <label>Subject</label><br>
            <input type="text" name="subject" required style="width:100%; padding:10px; margin-top:5px;">
        </div>
        <div style="margin-bottom: 15px;">
            <label>Semester</label><br>
            <select name="semester" required style="width:100%; padding:10px; margin-top:5px;">
                <option value="Semester 1">Semester 1</option>
                <option value="Semester 2">Semester 2</option>
                <option value="Semester 3">Semester 3</option>
                <option value="Semester 4">Semester 4</option>
            </select>
        </div>
        <div style="margin-bottom: 15px;">
            <label>Select File (Max 5MB, PDF/DOCX/PNG)</label><br>
            <input type="file" name="material_file" required style="width:100%; padding:10px; margin-top:5px;">
        </div>
        <button type="submit" class="btn-primary">Upload</button>
    </form>
</div>

<?php include 'includes/footer.php'; ?><?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include 'includes/header.php';
require 'includes/db.php';

$error = '';
$success = '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES['material_file'])) {
    $subject = trim($_POST['subject']);
    $semester = trim($_POST['semester']);
    $user_id = $_SESSION['user_id'];
    
    $file_name = $_FILES['material_file']['name'];
    $file_tmp = $_FILES['material_file']['tmp_name'];
    $file_size = $_FILES['material_file']['size'];
    
    $upload_dir = 'uploads/';
    $destination = $upload_dir . basename($file_name);
    
    $allowed_extensions = ['pdf', 'docx', 'png'];
    $file_extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
    
    if (in_array($file_extension, $allowed_extensions)) {
        if ($file_size < 5000000) {
            if (move_uploaded_file($file_tmp, $destination)) {
                $stmt = $pdo->prepare("INSERT INTO materials (user_id, subject, semester, file_name) VALUES (?, ?, ?, ?)");
                if ($stmt->execute([$user_id, $subject, $semester, $file_name])) {
                    $success = "File uploaded successfully.";
                } else {
                    $error = "Database error.";
                }
            } else {
                $error = "Failed to move uploaded file.";
            }
        } else {
            $error = "File size must be under 5MB.";
        }
    } else {
        $error = "Invalid file type. Only PDF, DOCX, and PNG are allowed.";
    }
}
?>

<div class="container">
    <h2>Upload Study Material</h2>
    <?php if($error): ?><p style="color:red; margin-bottom:10px;"><?php echo $error; ?></p><?php endif; ?>
    <?php if($success): ?><p style="color:green; margin-bottom:10px;"><?php echo $success; ?></p><?php endif; ?>
    <form method="POST" action="" enctype="multipart/form-data">
        <div style="margin-bottom: 15px;">
            <label>Subject</label><br>
            <input type="text" name="subject" required style="width:100%; padding:10px; margin-top:5px;">
        </div>
        <div style="margin-bottom: 15px;">
            <label>Semester</label><br>
            <select name="semester" required style="width:100%; padding:10px; margin-top:5px;">
                <option value="Semester 1">Semester 1</option>
                <option value="Semester 2">Semester 2</option>
                <option value="Semester 3">Semester 3</option>
                <option value="Semester 4">Semester 4</option>
            </select>
        </div>
        <div style="margin-bottom: 15px;">
            <label>Select File (Max 5MB, PDF/DOCX/PNG)</label><br>
            <input type="file" name="material_file" required style="width:100%; padding:10px; margin-top:5px;">
        </div>
        <button type="submit" class="btn-primary">Upload</button>
    </form>
</div>

<?php include 'includes/footer.php'; ?>