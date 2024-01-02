<?php
include "connect.php"
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
    <title>CRUD</title>
</head>

<body>
    <div class="container my-5">
        <button class="btn btn-primary my-5"><a href="user.php" class="text-light">Add user</a></button>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Operation</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM crud";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $id = $row["id"];
                        $name = $row["name"];
                        $email = $row["email"];
                        $mobile = $row["mobile"];

                        echo <<<HTML
                            <tr>
                                <th>$id</th>
                                <td>$name</td>
                                <td>$email</td>
                                <td>$mobile</td>
                                <td>
                                    <button class="btn btn-warning"><a href="update.php?updateid=$id" class="text-light">Update</a></button>
                                    <button class="btn btn-danger"><a href="delete.php?deleteid=$id" class="text-light">Delete</a></button>
                                </td>
                            </tr>
                        HTML;
                    }
                }
                ?>

            </tbody>
        </table>

    </div>
</body>

</html>