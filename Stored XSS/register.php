<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>
    <h1>Register Page</h1>

    <form method="post">
        <label>First Name: </label><input type="text" name="fname" require><br><br>
        <label>Last Name: </label><input type="text" name="lname" require><br><br>
        <label>Username: </label><input type="text" name="username" require><br><br>
        <label>Password: </label><input type="password" name="password" require><br><br>
        <button>Register</button>
    </form>
</body>
<?php
require_once "connection.php";
include "database.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    add_new_user($conn, $username, $password, $fname, $lname);
    header("Location: http://127.0.0.1/Vulnerable_Codes/login.php");
    exit();
}

?>

</html>