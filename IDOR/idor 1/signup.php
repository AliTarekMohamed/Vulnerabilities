<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vulnerable Code</title>
</head>

<body>
    <h1>Sign up</h1>
    <form method="post">
        <label>Username: </label><input type="text" name="username" require><br><br>
        <label>Password: </label><input type="password" name="password" require><br><br>
        <button type="submit" name="submit">Submit</button><br><br>
        <a href="http://127.0.0.1/Vulnerabilities/login.php">Already have an account</a>
    </form>
</body>

<?php
require_once 'connection.php';
include 'database.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = htmlspecialchars($_POST["username"]);
    $password = htmlspecialchars($_POST["password"]);
    add_new_user($conn, $username, $password);
    header("Location: http://127.0.0.1/Vulnerabilities/login.php");
    exit();
}

?>

</html>