<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include 'includes/header.php';
require 'includes/db.php';

$success = '';
$error = '';
$user_id = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $bio = trim($_POST['bio']);

    $stmt = $pdo->prepare("UPDATE users SET name = ?, email = ?, bio = ? WHERE id = ?");
    if ($stmt->execute([$name, $email, $bio, $user_id])) {
        $_SESSION['user_name'] = $name;
        $success = "Profile updated successfully.";
    } else {
        $error = "Failed to update profile.";
    }
}

$stmt = $pdo->prepare("SELECT name, email, bio FROM users WHERE id = ?");
$stmt->execute([$user_id]);
$user = $stmt->fetch();
?>

<div class="container" style="max-width: 600px;">
    <h2>My Profile</h2>
    <p style="color: #64748b; margin-bottom: 20px;">Manage your account details and personal bio.</p>

    <?php if($error): ?><p style="color:red; margin-bottom:10px;"><?php echo $error; ?></p><?php endif; ?>
    <?php if($success): ?><p style="color:green; margin-bottom:10px;"><?php echo $success; ?></p><?php endif; ?>

    <form method="POST" action="" style="background: #fff; padding: 20px; border-radius: 8px; border: 1px solid #e2e8f0;">
        <div style="margin-bottom: 15px;">
            <label style="font-weight: bold; color: #334155;">Full Name</label><br>
            <input type="text" name="name" value="<?php echo htmlspecialchars($user['name']); ?>" required style="width:100%; padding:10px; margin-top:5px; border: 1px solid #cbd5e1; border-radius: 4px;">
        </div>
        <div style="margin-bottom: 15px;">
            <label style="font-weight: bold; color: #334155;">Email Address</label><br>
            <input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required style="width:100%; padding:10px; margin-top:5px; border: 1px solid #cbd5e1; border-radius: 4px;">
        </div>
        <div style="margin-bottom: 20px;">
            <label style="font-weight: bold; color: #334155;">Short Bio</label><br>
            <textarea name="bio" rows="4" placeholder="Tell us about your IT interests..." style="width:100%; padding:10px; margin-top:5px; border: 1px solid #cbd5e1; border-radius: 4px; resize: vertical;"><?php echo htmlspecialchars($user['bio'] ?? ''); ?></textarea>
        </div>
        
        <button type="submit" class="btn-primary">Save Changes</button>
    </form>
</div>

<?php include 'includes/footer.php'; ?>