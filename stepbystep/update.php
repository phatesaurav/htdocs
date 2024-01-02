<?php
include "connect.php";
// echo $_GET["updateid"];

$sql = "SELECT name, email, mobile, password FROM crud WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $_GET["updateid"]);
$stmt->execute();
$stmt->bind_result($name, $email, $mobile, $password);
$stmt->fetch();
$stmt->close();


if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];
    $password = $_POST["password"];


    $sql = "UPDATE crud SET name = ?, email = ?, mobile = ?,  password = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssisi", $name, $email, $mobile, $password, $_GET["updateid"]);
    if ($stmt->execute()) {
        // echo "Record updated successfully";
        header("location:display.php");
    } else {
        echo "Error: " . $stmt->error;
    }
}
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
        <form method="post">
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" value=<?php echo $name; ?> name="name">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" value=<?php echo $email; ?> name="email">
            </div>
            <div class="form-group">
                <label>Mobile</label>
                <input type="text" class="form-control" value=<?php echo $mobile; ?> name="mobile">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" value=<?php echo $password; ?> name="password">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>
</body>

</html>