<?php
require_once "connection.php";

/* Stored XSS */
function add_new_user($conn, $fname, $lname, $username, $password)
{
    $query = "INSERT INTO users VALUES (:u, :p, :f, :l)";
    $pq = $conn->prepare($query);
    $pq->execute(
        array(
            ':u' => $username,
            ':p' => $password,
            ':f' => $fname,
            ':l' => $lname
        )
    );
}

/* Mitigation */
// function add_new_user($conn, $fname, $lname, $username, $password)
// {
//     $query = "INSERT INTO users VALUES (:u, :p, :f, :l)";
//     $pq = $conn->prepare($query);
//     $pq->execute(
//         array(
//             ':f' => htmlspecialchars($fname),
//             ':l' => htmlspecialchars($lname)
//             ':u' => htmlspecialchars($username),
//             ':p' => $password
//         )
//     );
// }

function get_user_info($conn, $username, $password)
{
    $query = "SELECT * FROM users WHERE username = :u AND password = :p";
    $pq = $conn->prepare($query);
    $pq->execute(
        array(
            ':u' => $username,
            ':p' => $password
        )
    );
    $result = $pq->fetch();
    return $result;
}

function is_user_exist($conn, $username, $password)
{
    $sql = "SELECT COUNT(*) FROM users WHERE username = :u AND password = :p";
    $pq = $conn->prepare($sql);
    $pq->execute(
        array(
            ':u' => $username,
            ':p' => $password
        )
    );
    $count = $pq->fetchColumn();
    return $count;
}
