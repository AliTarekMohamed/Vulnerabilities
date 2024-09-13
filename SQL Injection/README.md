<h1>Mitigation of SQL Injection</h1>
<p>In fact, We shouldn't pass parameters direct to the query. For example, If we try this payload <code>hello' OR '1'='1</code> instead of normal username and password; we will login succfully. That happenes beacause we pass the parameter direct to SQL query.</p>
<p>There are some techniques to avoid SQL injection. One of this techniques called <b>Placeholder</b>.</p>
<p>Placeholder used in the prepared statement. It allows us to safely pass parameters to an SQL query to avoid SQL injection.</p>
<p>So, the main difference is in database. SQL queries that check credintial will be : <br><code>function is_user_exist($conn, $username, $password)
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
}</code></p>
<h3>Tips & Tricks</h3>
<p>According to is_user_exist function the result that will be returned in count variable will be 1 value because there is only one user has this credentials.</p>
<p>So, Instead of this way of checking the result : <code>if (is_user_exist($conn, $username, $password) > 0)</code></p>
<p>We can check like that : <code>if (is_user_exist($conn, $username, $password) === 1)</code>.</p>
