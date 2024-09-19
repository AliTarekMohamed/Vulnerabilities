<?php
require_once "connection.php";

function add_new_user($conn, $username, $password)
{
    $query = "INSERT INTO users (username, password) VALUES (:u, :p)";
    $pq = $conn->prepare($query);
    $pq->execute(
        array(
            ":u" => $username,
            ":p" => $password
        )
    );
}

function check_user($conn, $username)
{
    $query = "SELECT user_id, password FROM users WHERE username = :u";
    $pq = $conn->prepare($query);
    $pq->execute(
        array(
            ":u" => $username
        )
    );

    $result = $pq->fetch(PDO::FETCH_NUM);
    return $result;
}

function get_user_info($conn, $user_id)
{
    $query = "SELECT username, password FROM users WHERE user_id = :i";
    $pq = $conn->prepare($query);
    $pq->execute(
        array(
            ":i" => $user_id
        )
    );
    $result = $pq->fetch(PDO::FETCH_NUM);
    return $result;
}
