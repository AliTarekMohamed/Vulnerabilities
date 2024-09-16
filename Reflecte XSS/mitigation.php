<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vulnerable code</title>
</head>

<body>

    <h1>Search for game</h1>

    <form action="reflected_xss.php" method="POST"> <!-- From GET to POST  -->
        <input id="search" name="search" placeholder="e.g. Valorant" require>
        <button>Search</button>
    </form>

</body>
<?php
require_once "connection.php";
include "database.php";

if ($_SERVER['REQUEST_METHOD'] === "POST") {        // Using POST method
    $search = htmlspecialchars($_POST["search"]);   // From GET to POST & htmlspecialchars() function
    $result = search($conn, $search);

    echo "<br><h2>Search results for: $search</h2>";
    if ($result) {
        echo "<br>Game: $result[0]<br>";
        echo "Type: $result[1]<br>";
        echo "Launched: $result[2]<br>";
    } else {
        echo "<br>Game not found";
    }
}
?>

</html>