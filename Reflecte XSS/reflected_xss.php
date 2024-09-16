<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vulnerable code</title>
</head>

<body>

    <h1>Search for game</h1>

    <form action="reflected_xss.php" method="GET">
        <input name="search" placeholder="e.g. Valorant" require>
        <button type="submit">Search</button>
    </form>

</body>
<?php
require_once "connection.php";
include "database.php";

$search = $_GET["search"];          // Mitigation => $search = htmlspecialchars($_GET["search"]);
$result = search($conn, $search);

echo "<br><h2>Search results for: $search</h2>";
if ($result) {
    echo "<br>Game: $result[0]<br>";
    echo "Type: $result[1]<br>";
    echo "Launched: $result[2]<br>";
} else {
    echo "<br>Game not found";
}
?>

</html>
