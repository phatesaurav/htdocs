<?php
include "connect.php";
// echo $_GET["deleteid"];

$sql = "DELETE FROM crud WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $_GET["deleteid"]);
if ($stmt->execute()) {
    // echo "Record deleted successfully";
    header("location:display.php");
} else {
    echo "Error deleting record: " . $stmt->error;
}
