<?php
include 'includes/db.php';

$query = "SELECT id, title, description, image, date_posted FROM news ORDER BY date_posted DESC";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div class="container mt-3 bg-dark text-center text-white border display-3">
        Latest News
    </div>
    <div class="container mb-3 border">
        <?php
        while ($row = $result->fetch_assoc()) {
            $id = $row["id"];
            $title = $row["title"];
            $description = $row["description"];
            $image = $row["image"];
            $date_posted = $row["date_posted"];

            echo <<<HTML
                <div class="container m-3 border">
                    <h3><a href="/news_portal/single-news.php?id=$id">$title</a></h3>
                    <div class="row p-2">
                        <img class="col-2" src="images/$image" alt="$title" width="150" height="100">
                        <div class="col-10">
                            <p>Date Posted: $date_posted</p>
                            <p>Description: $description</p>
                        </div>
                    </div>
                </div>        
            HTML;
        }
        ?>
    </div>
</body>

</html>