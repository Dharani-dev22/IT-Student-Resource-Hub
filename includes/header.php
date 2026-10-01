<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IT Student Resource Hub</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header class="navbar">
        <div class="logo">
            <h2>IT Resource Hub</h2>
        </div>
        <nav class="nav-links">
            <a href="index.php">Home</a>
            <?php if(isset($_SESSION['user_id'])): ?>
                <a href="dashboard.php">Materials</a>
                <a href="profile.php">My Profile</a>
            <?php else: ?>
                <a href="login.php">Login</a>
                <a href="register.php" class="btn-primary">Register</a>
            <?php endif; ?>
        </nav>
    </header>
    <main class="container">