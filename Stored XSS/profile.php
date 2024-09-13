<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vulnerable code</title>
</head>

<body>

    <h1>My Profile</h1>

</body>
<?php
require_once "connection.php";
include "database.php";
session_start();

$username = $_SESSION['username'];
$password = $_SESSION['password'];
$result = get_user_info($conn, $username, $password);

echo "First Name : " . $result[0];
echo "<br>";
echo "Last Name : " . $result[1];
echo "<br>";
echo "username : " . $result[2];
?>

</html>