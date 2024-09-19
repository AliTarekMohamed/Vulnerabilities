<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vulnerable Code</title>
</head>

<body>
    <h1>My Profile</h1>
</body>

<?php
require_once 'connection.php';
include 'database.php';
// session_start();

$user_id = htmlspecialchars($_GET["user_id"]);
$user_info = get_user_info($conn, $user_id);
$username = $user_info[0];
$password = $user_info[1];

echo "Welcome <strong>$username</strong> !<br>";
echo "Your Password: <strong>$password</strong><br>";

// if ($_SESSION["username"] === $username && $_SESSION["password"] === $password) {
//     echo "Welcome <strong>$username</strong> !<br>";
//     echo "Your Password: <strong>$password</strong><br>";
// } else {
//     echo "<h2>Access Denied</h2>";
// }


?>

</html>