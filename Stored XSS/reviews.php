<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vulnerable code</title>
</head>

<body>
    <h1>Reviews</h1>
    <form method="post">
        <img src="Valorant.jpg"><br>
        <input name="review" placeholder="Submit your opinion about this product" style="width: 700px; height: 250px; text-align: center;" require><br><br>
        <button>Submit</button>
    </form>

</body>
<?php
require_once "connection.php";
include "database.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $review = $_POST["review"];   // Mitigation => $review = htmlspecialchars($_POST["review"]);
    $game_name = "Valorant";
    submit_review($conn, $game_name, $review);

    $result = get_reviews($conn, $game_name);
    foreach ($result as $res) {
        echo $res . "<br>";
    }
}
?>

</html>