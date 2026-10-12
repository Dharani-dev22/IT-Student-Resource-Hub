<?php
$host = 'gateway01.ap-northeast-1.prod.aws.tidbcloud.com';  
$dbname = 'resource_hub'; 
$username = '4T9KC9Lh1qCFcDw.root';  
$password = 'YOUR_GENERATED_PASSWORD';  

try {
    $pdo = new PDO("mysql:host=$host;port=4000;dbname=$dbname;sslmode=VERIFY_IDENTITY", $username, $password, array(
        PDO::MYSQL_ATTR_SSL_CA => 'C:\xampp\apache\bin\curl-ca-bundle.crt'
    ));
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>