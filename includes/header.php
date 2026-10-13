<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IT Student Resource Hub</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        :root {
            --bg-color: #ffffff;
            --text-color: #333333;
            --nav-bg: #f8f9fa;
        }
        [data-theme="dark"] {
            --bg-color: #121212;
            --text-color: #e0e0e0;
            --nav-bg: #1f1f1f;
        }
        body {
            background-color: var(--bg-color) !important;
            color: var(--text-color) !important;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
            transition: background-color 0.3s, color 0.3s;
        }
        .navbar, .footer {
            background-color: var(--nav-bg) !important;
        }
        .nav-links a, .footer a, .navbar h2 {
            color: var(--text-color) !important;
        }
        input[type="text"], input[type="email"], input[type="password"], select {
            max-width: 400px;
        }
    </style>
    <script>
        (function() {
            let currentTheme = localStorage.getItem('theme') || 'light';
            document.documentElement.setAttribute('data-theme', currentTheme);
        })();
    </script>
</head>
<body>
    <header class="navbar">
        <div class="logo">
            <a href="index.php" style="text-decoration: none;">
                <h2 style="margin: 0;">IT Resource Hub</h2>
            </a>
        </div>
        <nav class="nav-links" style="display: flex; align-items: center;">
            <a href="index.php">Home</a>
            <?php if(isset($_SESSION['user_id'])): ?>
                <a href="dashboard.php">Materials</a>
                <a href="profile.php">My Profile</a>
            <?php else: ?>
                <a href="login.php">Login</a>
                <a href="register.php" class="btn-primary">Register</a>
            <?php endif; ?>
            <button id="theme-toggle" style="margin-left: 15px; padding: 5px 10px; cursor: pointer;">Dark Mode</button>
        </nav>
    </header>
    <main class="container" style="flex: 1;">