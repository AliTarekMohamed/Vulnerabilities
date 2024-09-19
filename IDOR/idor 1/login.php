<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vulnerable Code</title>
</head>

<body>
    <h1>Login</h1>
    <form method="post">
        <label>Username: </label><input type="text" name="username" require><br><br>
        <label>Password: </label><input type="password" name="password" require><br><br>
        <button type="submit" name="submit">Login</button><br><br>
        <a href="http://127.0.0.1/Vulnerabilities/signup.php">Create an account</a>
    </form>
</body>

<?php
require_once 'connection.php';
include 'database.php';
// session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    $user_info = check_user($conn, $username);    // $user_info[0] = id, $user_info[1] = password
    if ($user_info) {
        if ($user_info[1] === $password) {
            // $_SESSION["username"] = $username;
            // $_SESSION["password"] = $password;
            $user_id = $user_info[0];
            header("Location: http://127.0.0.1/Vulnerabilities/profile.php?user_id=$user_id");
            exit();
        }
    } else {
        echo "Invalid username or password";
    }
}
?>

</html>