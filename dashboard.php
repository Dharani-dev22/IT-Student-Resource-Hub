<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
include 'includes/header.php';
?>

<div class="container">
    <h2>Welcome, <?php echo htmlspecialchars($_SESSION['user_name']); ?>!</h2>
    <p style="margin: 20px 0;">You are securely logged in.</p>
    <a href="logout.php" class="btn-secondary">Logout</a>
</div>

<?php include 'includes/footer.php'; ?>