<?php
require_once "connection.php";

/* SQLi to bypass login page */
function is_user_exist($conn, $username, $password)
{
    $query = "SELECT COUNT(*) FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($query);
    $count = $result->fetchColumn();
    return $count;
}

/* Mitigation */
// function is_user_exist($conn, $username, $password)
// {
//     $sql = "SELECT COUNT(*) FROM users WHERE username = :u AND password = :p";
//     $pq = $conn->prepare($sql);
//     $pq->execute(
//         array(
//             ':u' => $username,
//             ':p' => $password
//         )
//     );
//     $count = $pq->fetchColumn();
//     return $count;
// }