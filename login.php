<?php
session_start();
require 'includes/db.php';

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Invalid email or password.";
    }
}

include 'includes/header.php'; 
?>

<div class="container" style="padding: 20px;">
    <h2>Login</h2>
    <?php if(!empty($error)): ?><p style="color:red; margin-bottom:10px;"><?php echo $error; ?></p><?php endif; ?>
    <form method="POST" action="">
        <div style="margin-bottom: 15px;">
            <label>Email</label><br>
            <input type="email" name="email" required style="width:100%; max-width:400px; padding:10px; margin-top:5px;">
        </div>
        <div style="margin-bottom: 15px;">
            <label>Password</label><br>
            <input type="password" name="password" required style="width:100%; max-width:400px; padding:10px; margin-top:5px;">
        </div>
        <button type="submit" class="btn-primary" style="padding: 10px 15px; background-color: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer;">Login</button>
    </form>
    <p style="margin-top: 15px;">Don't have an account? <a href="register.php" style="color: var(--text-color);">Register here</a></p>
</div>

<?php include 'includes/footer.php'; ?>

 