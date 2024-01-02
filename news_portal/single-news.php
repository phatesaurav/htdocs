<?php
include 'includes/db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM news WHERE id = $id";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $row['title']; ?> - News Portal</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <h1><?php echo $row['title']; ?></h1>
    <img src="images/<?php echo $row['image']; ?>" alt="<?php echo $row['title']; ?>" width="300" height="200">
    <p><?php echo $row['content']; ?></p>
    <p>Date Posted: <?php echo $row['date_posted']; ?></p>
</body>
</html>
