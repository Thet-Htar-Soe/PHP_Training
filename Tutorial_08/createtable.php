<?php
$serverName = "localhost";
$userName = "root";
$password = "000000";
$dbName = "Tutorial_08";
$connection = new PDO("mysql:host=$serverName;dbname=$dbName", $userName, $password);
if ($connection) {
    $sql = "CREATE TABLE posts(
    id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT NULL,
    is_published BOOLEAN,
    created_datetime TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_datetime TIMESTAMP DEFAULT CURRENT_TIMESTAMP
  )";
    if ($sql) {
        $res = $connection->prepare($sql);
        $res->execute([]);
        echo "Posts Table Created Successfully";
    } else {
        echo "Sql Wrong";
    }
} else {
    echo "Connection Problem";
}
?>
