<?php
$serverName = "localhost";
$userName = "root";
$password = "000000";
$dbName = "Tutorial_08";
$connection = new PDO("mysql:host=$serverName;dbname=$dbName", $userName, $password);
if ($connection) {
    $sql = "CREATE TABLE posts(
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    content TEXT NULL,
    is_published BOOLEAN,
    created_datetime TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON CREATE CURRENT_TIMESTAMP,
    updated_datetime TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
  )";
    $connection->exec($sql);
    echo "Posts Table Created Successfully";
} else {
    echo "Connection Problem";
}
?>
