<h1>Mitigation of Stored XSS</h1>
<p>In short, this bug is mix between XSS and SQL injection. That means we pass xss payload to SQL query through <b>First Name</b> and <b>Last Name</b> to store it in database.</p>
<p>Mitigation is the same as XSS mitigation but we will sanitize user's input before use it in SQL query.</p>
<p>There are two positions we can sanitize the input.</p>
<ol>
<li>While taking input in registration page.</li>
<code>if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $fname = htmlspecialchars($_POST["fname"]);
    $lname = htmlspecialchars($_POST["lname"]);
    $username = htmlspecialchars($_POST["username"]);
    $password = $_POST["password"];
    add_new_user($conn, $username, $password, $fname, $lname);
    header("Location: http://127.0.0.1/Vulnerable_Codes/login.php");
    exit();
}</code>
<br>
<li>While passing parameters to the SQL query in database.php file.</li>
<code>function add_new_user($conn, $fname, $lname, $username, $password)
{
    $query = "INSERT INTO users VALUES (:u, :p, :f, :l)";
    $pq = $conn->prepare($query);
    $pq->execute(
        array(
            ':u' => htmlspecialchars($username),
            ':p' => htmlspecialchars($password),
            ':f' => htmlspecialchars($fname),
            ':l' => htmlspecialchars($lname)
        )
    );
}</code>
</ol>
