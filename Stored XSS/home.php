<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
</head>

<body>
    <h1>Home Page</h1>

    <form method="post">
        <img src="Valorant.jpg">
        <button>See reviews</button>
    </form>

</body>
<?php
require_once "connection.php";
include "database.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    header("Location: http://127.0.0.1/Vulnerable_Codes/reviews.php");
}

?>

</html>