<?php
require_once "connection.php";

function get_game_info($conn, $game_name)
{
    $query = "SELECT * FROM games WHERE game_name = :n";
    $pq = $conn->prepare($query);
    $pq->execute(
        array(
            ':n' => $game_name
        )
    );
    $result = $pq->fetch();
    return $result;
}
