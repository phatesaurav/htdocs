<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Courier+New&display=swap">
    <style>
        body {
            font-family: 'Courier New', monospace;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container mt-3 bg-dark text-center text-white border display-2">
        Latest Blogs
    </div>
    <div class="container mb-3 border">
        <?php
        foreach ($blogs as $row) {
            $id = $row['id'];
            $title = $row['title'];
            $description = $row['description'];
            $content = $row['content'];
            $category = $row['category'];
            $author = $row['author'];
            $image = $row['image'];
            $date = $row['date'];

            echo <<<HTML
            <a href="http://localhost/blogspot/index.php/blog/single_blog?id=$id" class="text-decoration-none text-dark">
                <div class="container mt-3 mb-3 border">
                    <div class="row m-3">
                        <div class="col-3 pt-3"><img src="http://localhost/blogspot/assets/img/$image" alt="$image" width="300px" height="200px"></div>
                        <div class="col-9 px-5">
                            <div class="display-6">$title</div>
                            <div class="h5 pt-1">$description</i></div>
                            <div class="pt-2">
                                <div><b>Category:</b> $category</div>
                                <div><b>Author:</b> $author</div>
                                <div><b>Date Posted:</b> $date</div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        HTML;
        }
        ?>
    </div>
</body>

</html>