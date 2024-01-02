<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Single</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container mt-5 bg-dark text-center text-white border display-3">
        <?= $blog->title ?>
    </div>
    <div class="container mt-3 mb-5 border">
        <div class="h2 text-center"><?= $blog->description ?></div>
        <div class="container mt-3 text-center"><img src="http://localhost/blogspot/assets/img/<?= $blog->image ?>" alt="<?= $blog->image ?>" width="500px" height="350px"></div>
        <div class="container px-3 mt-2">
            <div><b><?= "Author: " . $blog->author ?></b></div>
            <div><b><?= "Category: " . $blog->category ?></b></div>
            <div><b><?= "Date Posted: " . $blog->date ?></b></div>
        </div>
        <div class="container p-3"><?= $blog->content ?></div>

    </div>
</body>

</html>