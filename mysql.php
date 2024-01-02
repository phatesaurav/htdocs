<?php

$servername = "localhost";
$username = "root";
$password = "5498";
$databaseName = "my_database";

$conn = new mysqli($servername, $username, $password);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "<div class='display-2 text-primary'>Connected successfully.<br></div>";

$sql = "SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '$databaseName'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo "<div class='display-6 text-warning'>Database $databaseName already exists.<br></div>";
} else {
    $sql = "CREATE DATABASE IF NOT EXISTS my_database";
    if ($conn->query($sql) === TRUE) {
        echo "<div class='display-6 text-success'>Database created successfully.<br></div>";
    } else {
        echo "<div class='display-6 text-danger'>Error creating database: </div>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Connection</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

</body>

</html>