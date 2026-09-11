<?php
include 'includes/header.php';
require 'includes/db.php';

$error = '';
$success = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->execute([$email]);

    if ($stmt->rowCount() > 0) {
        $error = "Email already registered.";
    } else {
        $insert = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        if ($insert->execute([$name, $email, $password])) {
            $success = "Registration successful. You can now login.";
        } else {
            $error = "Registration failed.";
        }
    }
}
?>

<div class="container">
    <h2>Register</h2>
    <?php if($error): ?><p style="color:red; margin-bottom:10px;"><?php echo $error; ?></p><?php endif; ?>
    <?php if($success): ?><p style="color:green; margin-bottom:10px;"><?php echo $success; ?></p><?php endif; ?>
    <form method="POST" action="">
        <div style="margin-bottom: 15px;">
            <label>Name</label><br>
            <input type="text" name="name" required style="width:100%; padding:10px; margin-top:5px;">
        </div>
        <div style="margin-bottom: 15px;">
            <label>Email</label><br>
            <input type="email" name="email" required style="width:100%; padding:10px; margin-top:5px;">
        </div>
        <div style="margin-bottom: 15px;">
            <label>Password</label><br>
            <input type="password" name="password" required style="width:100%; padding:10px; margin-top:5px;">
        </div>
        <button type="submit" class="btn-primary">Register</button>
    </form>
</div>

<?php include 'includes/footer.php'; ?>