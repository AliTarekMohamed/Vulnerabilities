<?php
require_once "connection.php";

/* Stored XSS */
function submit_review($conn, $game_name, $review)
{
    $query = "INSERT INTO reviews Values (:g, :r)";
    $pq = $conn->prepare($query);
    $pq->execute(
        array(
            ":r" => $review,
            ":g" => $game_name
        )
    );
}

// function submit_review($conn, $game_name, $review)
// {
//     $query = "INSERT INTO reviews Values (:g, :r)";
//     $pq = $conn->prepare($query);
//     $pq->execute(
//         array(
//             ":r" => htmlspecialchars($review),
//             ":g" => $game_name
//         )
//     );
// }

function get_reviews($conn, $game_name)
{
    $query = "SELECT review FROM reviews WHERE game_name = :g";
    $pq = $conn->prepare($query);
    $pq->execute(
        array(
            ":g" => $game_name
        )
    );
    $result = $pq->fetch();
    return $result;
}
