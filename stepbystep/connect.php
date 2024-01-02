<?php

$conn = new mysqli("localhost", "root", "5498");
if (!$conn) {
    die("Connection failed.");
}

$conn->query("CREATE DATABASE IF NOT EXISTS crud1");
$conn->query("USE crud1");

$sql = "SHOW TABLES LIKE 'crud'";
$result = $conn->query($sql);

if ($result->num_rows === 0) {
    $sql = "CREATE TABLE crud (
        id INT(6) AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(30) NOT NULL,
        email VARCHAR(50),
        mobile INT(10),
        password VARCHAR(30)
    )";
    if ($conn->query($sql) === TRUE) {
        echo "Table created successfully.";
    } else {
        echo "Error creating table: " . $conn->error;
    }
}
