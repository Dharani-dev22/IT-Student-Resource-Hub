<?php
$host = 'gateway01.ap-northeast-1.prod.aws.tidbcloud.com';
$dbname = 'resource_hub'; 
$username = '4T9KC9Lh1qCFcDw.root';
$password = '4GyYQmpWOnFpd64S'; 

try {
    // Automatically use Vercel's built-in Linux SSL certificates
    $ca_path = file_exists('/etc/ssl/certs/ca-certificates.crt') ? '/etc/ssl/certs/ca-certificates.crt' : '/etc/pki/tls/certs/ca-bundle.crt';
    
    $pdo = new PDO("mysql:host=$host;port=4000;dbname=$dbname", $username, $password, array(
        PDO::MYSQL_ATTR_SSL_CA => $ca_path
    ));
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>