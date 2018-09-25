<?php
$dbtype = "mysql";
$host = "localhost";
$dbname = "medical_adm";
$username = "root";
$password = "";
$charset = "utf8mb4";

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try {
    $conn = new PDO("$dbtype:host=$host;dbname=$dbname;charset=$charset", $username, $password, $options);
    // echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>