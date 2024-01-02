<?php

// echo "<pre>";
// var_dump($results);

foreach ($results as $row) {
    $name = $row['name'];
    $email = $row['email'];
    $mobile = $row['mobile'];
    $image = $row['image'];
    $date = $row['date'];
    echo "Image Source: images/$image";

    echo <<<HTML
        <div>
            Name: $name
            Email: $email
            Mobile : $mobile
            Image : $image
            Date : $date
        </div>
    HTML;
}
// echo $result->name;
// echo " ";
// echo $result->email;
?>
!

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container mt-3 bg-dark text-center text-white border display-3">
        Latest Blog
    </div>
    <div class="container mb-3 border">
        <?php
        foreach ($results as $row) {
            $name = $row['name'];
            $email = $row['email'];
            $mobile = $row['mobile'];
            $image = $row['image'];
            $date = $row['date'];

            echo <<<HTML
            <div class="container m-3 border">
                <div class="h3">$name</div>
                <div class="h3">$email</div>
                <div class="h3">$mobile</div>
                <div><img src="http://localhost/codeigniter/images/$image" alt="$image" width="300" height="300"></div>
                <p>Date Posted: $date</p>
            </div>
        HTML;
        }
        ?>
    </div>
</body>

</html>