<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
include 'includes/header.php';
require 'includes/db.php';

if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $check = $pdo->prepare("SELECT file_name FROM materials WHERE id = ? AND user_id = ?");
    $check->execute([$delete_id, $_SESSION['user_id']]);
    $file = $check->fetch();

    if ($file) {
        $file_path = 'uploads/' . $file['file_name'];
        if (file_exists($file_path)) {
            unlink($file_path);
        }
        $del = $pdo->prepare("DELETE FROM materials WHERE id = ?");
        $del->execute([$delete_id]);
        header("Location: dashboard.php?msg=deleted");
        exit();
    }
}

$search = $_GET['search'] ?? '';
$query = "SELECT m.*, u.name as uploader_name FROM materials m JOIN users u ON m.user_id = u.id";
$params = [];

if ($search) {
    $query .= " WHERE m.subject LIKE ? OR m.semester LIKE ?";
    $params[] = "%$search%";
    $params[] = "%$search%";
}

$query .= " ORDER BY m.upload_date DESC";
$stmt = $pdo->prepare($query);
$stmt->execute($params);
$materials = $stmt->fetchAll();
?>

<div class="container">
    <h2>Welcome, <?php echo htmlspecialchars($_SESSION['user_name']); ?>!</h2>
    
    <div style="margin: 20px 0; display: flex; gap: 10px; justify-content: space-between; flex-wrap: wrap;">
        <div>
            <a href="upload.php" class="btn-primary">Upload New Material</a>
            <a href="logout.php" class="btn-secondary">Logout</a>
        </div>
        
        <form method="GET" action="" style="display: flex; gap: 10px;">
            <input type="text" name="search" placeholder="Search subject or semester..." value="<?php echo htmlspecialchars($search); ?>" style="padding: 8px; border-radius: 4px; border: 1px solid #cbd5e1;">
            <button type="submit" class="btn-secondary">Search</button>
            <?php if($search): ?><a href="dashboard.php" class="btn-secondary" style="background:#f87171; color:white;">Clear</a><?php endif; ?>
        </form>
    </div>

    <hr style="margin: 30px 0; border: 0; border-top: 1px solid #e2e8f0;">
    <?php if(isset($_GET['msg']) && $_GET['msg'] == 'deleted'): ?>
        <p style="color:red; margin-bottom:10px;">File deleted successfully.</p>
    <?php endif; ?>

    <h3>Study Materials</h3>
    <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 20px; margin-top: 20px;">
        <?php foreach ($materials as $file): ?>
            <div style="border: 1px solid #e2e8f0; padding: 20px; border-radius: 8px; background: #fff;">
                <h4 style="color: #2563eb; margin-bottom: 10px;"><?php echo htmlspecialchars($file['subject']); ?></h4>
                <p style="font-size: 0.9rem; color: #64748b; margin-bottom: 5px;">Semester: <?php echo htmlspecialchars($file['semester']); ?></p>
                <p style="font-size: 0.9rem; color: #64748b; margin-bottom: 15px;">Uploaded by: <?php echo htmlspecialchars($file['uploader_name']); ?></p>
                
                <div style="display: flex; gap: 10px;">
                    <a href="uploads/<?php echo rawurlencode($file['file_name']); ?>" target="_blank" class="btn-primary" style="padding: 5px 10px; font-size: 0.9rem;">View</a>
                    
                    <?php if($_SESSION['user_id'] == $file['user_id']): ?>
                        <a href="dashboard.php?delete_id=<?php echo $file['id']; ?>" onclick="return confirm('Are you sure you want to delete this file?');" class="btn-secondary" style="background: #fee2e2; color: #ef4444; border-color: #fca5a5; padding: 5px 10px; font-size: 0.9rem;">Delete</a>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
        <?php if(empty($materials)): ?>
            <p>No materials found.</p>
        <?php endif; ?>
    </div>
</div>

<?php include 'includes/footer.php'; ?>