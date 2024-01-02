<?php
include '../includes/db.php';

// Authentication code here (session, login form, etc.)

$query = "SELECT id, title, date_posted FROM news ORDER BY date_posted DESC";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <h1>Admin Dashboard</h1>
    
    <?php
    while ($row = $result->fetch_assoc()) {
        echo '<div>';
        echo '<h2><a href="edit-news.php?id=' . $row['id'] . '">' . $row['title'] . '</a></h2>';
        echo '<p>Date Posted: ' . $row['date_posted'] . '</p>';
        echo '<a href="delete-news.php?id=' . $row['id'] . '">Delete</a>';
        echo '</div>';
    }
    ?>

    <a href="add-news.php">Add News</a>

</body>
</html>
