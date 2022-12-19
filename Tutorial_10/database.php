<?php
$serverName = "localhost";
$userName = "root";
$userPsw = "000000";

try {
    $connection = new PDO("mysql:host=$serverName", $userName, $userPsw);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if ($connection) {
        $sqlDatabase = "CREATE DATABASE Tutorial_10";
        $connection->exec($sqlDatabase);
        echo "Database Created Successfully";
    }
} catch (PDOException $e) {
    echo "Connection Failed" . $e->getMessage();
}

$dbName = "Tutorial_10";
$conn = new PDO("mysql:host=$serverName;dbname=$dbName", $userName, $userPsw);
$sqlTable = "CREATE TABLE users(
    id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    phone VARCHAR(255) NOT NULL,
    img VARCHAR(255) NULL,
    address TEXT NOT NULL,
    created_datetime TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_datetime TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
  )";
$conn->exec($sqlTable);
echo "Table Created Successfully";

?>
