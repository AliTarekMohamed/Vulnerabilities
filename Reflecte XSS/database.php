<?php
require_once "connection.php";

function search($conn, $game_name)
{
    $query = "SELECT * FROM games WHERE game_name = :g";
    $pq = $conn->prepare($query);
    $pq->execute(
        array(
            ":g" => $game_name
        )
    );
    $result = $pq->fetch();
    return $result;
}
