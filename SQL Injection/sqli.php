<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vulnerable code</title>
</head>

<body>

    <h1>Login Page</h1>

    <form method="post">
        <Label>Username: </Label><input name="username" require><br><br>
        <Label>Password: </Label><input name="password" type="password" require><br><br>
        <button>Login</button>
    </form>

</body>
<?php
require_once "connection.php";
include "database.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    if (is_user_exist($conn, $username, $password) > 0) {
        header("Location: http://127.0.0.1/Vulnerable_Codes/home.html");
        exit();
    } else {
        echo "<br><br>";
        echo "Invalid username or password";
    }
}
?>

</html>