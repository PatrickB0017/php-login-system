<?php
$host = 'localhost:3307';   // Use your HEIDISQL port (3307 in the lab)
$dbname = 'login_system';
$dbuser = 'root';
$dbpass = '';               // Leave empty for Laragon default

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $dbuser, $dbpass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>