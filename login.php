<?php
session_start();
include 'includes/header.php';
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
?>

<div class="container">
    <h2>Login</h2>
    <?php if($error): ?><p style="color:red; margin-bottom:10px;"><?php echo $error; ?></p><?php endif; ?>
    <form method="POST" action="">
        <div style="margin-bottom: 15px;">
            <label>Email</label><br>
            <input type="email" name="email" required style="width:100%; padding:10px; margin-top:5px;">
        </div>
        <div style="margin-bottom: 15px;">
            <label>Password</label><br>
            <input type="password" name="password" required style="width:100%; padding:10px; margin-top:5px;">
        </div>
        <button type="submit" class="btn-primary">Login</button>
    </form>
</div>

<?php include 'includes/footer.php'; ?>