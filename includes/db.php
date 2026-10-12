<?php
$host = 'bv8cfdyvs6p5vkaxhogh-mysql.services.clever-cloud.com';
$dbname = 'bv8cfdyvs6p5vkaxhogh'; 
$username = 'u2sbj6lgic8npht2';
$password = 'atTZOnz6Zm7NmCpprxll'; // Click the 🔓 eye icon on Clever Cloud to reveal and copy your password!

try {
    // Clever Cloud does not require the strict SSL certificates, so a standard connection works perfectly!
    $pdo = new PDO("mysql:host=$host;port=3306;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>