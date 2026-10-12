<?php
$host = 'gateway01.ap-northeast-1.prod.aws.tidbcloud.com';
$dbname = 'resource_hub'; 
$username = '4T9KC9Lh1qCFcDw.root';
$password = '4GyYQmpWOnFpd64S'; 

try {
    // Connect without hardcoding the local XAMPP C:\ drive path
    $pdo = new PDO("mysql:host=$host;port=4000;dbname=$dbname", $username, $password, array(
        PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT => false
    ));
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>