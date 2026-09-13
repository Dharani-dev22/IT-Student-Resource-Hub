<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
include 'includes/header.php';
require 'includes/db.php';

$stmt = $pdo->query("SELECT m.*, u.name as uploader_name FROM materials m JOIN users u ON m.user_id = u.id ORDER BY m.upload_date DESC");
$materials = $stmt->fetchAll();
?>

<div class="container">
    <h2>Welcome, <?php echo htmlspecialchars($_SESSION['user_name']); ?>!</h2>
    
    <div style="margin: 20px 0; display: flex; gap: 10px;">
        <a href="upload.php" class="btn-primary">Upload New Material</a>
        <a href="logout.php" class="btn-secondary">Logout</a>
    </div>

    <hr style="margin: 30px 0; border: 0; border-top: 1px solid #e2e8f0;">

    <h3>Recent Study Materials</h3>
    <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 20px; margin-top: 20px;">
        <?php foreach ($materials as $file): ?>
            <div style="border: 1px solid #e2e8f0; padding: 20px; border-radius: 8px; background: #fff;">
                <h4 style="color: #2563eb; margin-bottom: 10px;"><?php echo htmlspecialchars($file['subject']); ?></h4>
                <p style="font-size: 0.9rem; color: #64748b; margin-bottom: 5px;">Semester: <?php echo htmlspecialchars($file['semester']); ?></p>
                <p style="font-size: 0.9rem; color: #64748b; margin-bottom: 15px;">Uploaded by: <?php echo htmlspecialchars($file['uploader_name']); ?></p>
                <a href="uploads/<?php echo urlencode($file['file_name']); ?>" target="_blank" class="btn-primary" style="display: inline-block; padding: 5px 10px; font-size: 0.9rem;">View / Download</a>
            </div>
        <?php endforeach; ?>
        <?php if(empty($materials)): ?>
            <p>No materials uploaded yet.</p>
        <?php endif; ?>
    </div>
</div>

<?php include 'includes/footer.php'; ?>