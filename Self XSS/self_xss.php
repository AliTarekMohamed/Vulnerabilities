<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vulnerable code</title>
</head>

<body>

    <h1>Search for game</h1>

    <form method="post">
        <input name="game_name" placeholder="e.g. Valorant" require><br>
        <button type="submit">Search</button>
    </form>

</body>
<?php
require_once "connection.php";
include "database.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $game_name = $_POST["game_name"];   // Mitigation => $game_name = htmlspecialchars($_POST["game_name"]);
    echo "<h2>result of search for : $game_name</h2>";
    $result = get_game_info($conn, $game_name);

    if ($result) {
        echo "Game : " . $result[0];
        echo "<br>";
        echo "Type : " . $result[1];
        echo "<br>";
        echo "Launced in :" . $result[2];
    } else {
        echo "Game is not exist";
    }
}
?>

</html>
