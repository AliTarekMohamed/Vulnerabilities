<h1>Mitigation of SQL Injection</h1>
<p>In fact, We shouldn't pass parameters direct to the query. For example, If we try this payload <code>hello' OR '1'='1</code> instead of normal username and password; we will login succfully. That happenes beacause we pass the parameter direct to SQL query.</p>
<p>There are some techniques to avoid SQL injection. One of this techniques called <b>Parameterized query</b>.</p>
<p>Parameterized query used in the SQL query. It allows us to pass parameters to SQL query safely to avoid SQL injection.</p>
<p>So, the main difference is in database. SQL queries that check credintial will be : <br><pre>function is_user_exist($conn, $username, $password)
{
    $query = "SELECT COUNT(*) FROM users WHERE username = :u AND password = :p";
    $pq = $conn->prepare($query);
    $pq->execute(
        array(
            ':u' => $username,
            ':p' => $password
        )
    );
    $count = $pq->fetchColumn();
    return $count;
}</pre></p>
<h3>Tips & Tricks</h3>
<p>According to is_user_exist function the result that will be returned in count variable will be 1 value because there is only one user has this credentials.</p>
<p>So, Instead of this way of checking the result : <pre>if (is_user_exist($conn, $username, $password) > 0)</pre></p>
<p>We can check like that : <pre>if (is_user_exist($conn, $username, $password) === 1)</pre></p>
