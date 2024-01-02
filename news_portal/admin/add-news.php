<?php
include '../includes/db.php';

// Authentication code here (session, login form, etc.)

if (isset($_POST["submit"])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $content = $_POST['content'];
    $date_posted = $_POST['date_posted'];

    // Validate and sanitize input data

    // File upload handling
    $image_name = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $image_type = $_FILES['image']['type'];

    // Validate file type (you may need to adjust the allowed types)
    $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
    if (!in_array($image_type, $allowed_types)) {
        die('Invalid file type. Only JPEG, PNG, and GIF files are allowed.');
    }

    // Move the uploaded file to a designated directory
    $upload_path = '../images/';
    $image_path = $upload_path . $image_name;
    move_uploaded_file($image_tmp, $image_path);

    // Insert data into the database
    $query = "INSERT INTO news (title, description, content, image, date_posted) VALUES ('$title', '$description', '$content', '$image_name', '$date_posted')";
    $conn->query($query);

    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add News - Admin Panel</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-3">
        <div class="h1">Add News</div>
        <form method="post" enctype="multipart/form-data">
            <div class="mb-3 mt-3">
                <label>Title:</label>
                <input type="text" class="form-control" id="title" placeholder="Enter name" name="title" required>
            </div>
            <div class="mb-3">
                <label>Description:</label>
                <textarea class="form-control" rows="2" id="description" placeholder="Enter description" name="description"></textarea>
            </div>
            <div class="mb-3">
                <label>Content:</label>
                <textarea class="form-control" rows="7" id="content" placeholder="Enter content" name="content"></textarea>
            </div>
            <div class="mb-3">
                <label>Date Posted:</label>
                <input class="form-control" type="date" name="date_posted">
            </div>
            <div class="mb-3">
                <label>Image:</label>
                <input class="form-control" type="file" name="image" accept="image/*">
            </div>
            <button class="btn btn-primary" type="submit" name="submit">Submit</button>
        </form>
    </div>
</body>

</html>