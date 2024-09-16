<h1>Mitigation of Stored XSS</h1>
<p>In short, We can consider that this bug is mix between XSS and SQL injection. That means we can pass xss payload to SQL query through <strong>review textbox</strong> to store it in database.</p>
<p>Mitigation is the same as XSS mitigation but we will sanitize user's input before use it in SQL query.</p>
<p>There are two positions we can sanitize the input :</p>
<ol>
<li>While taking input in review page.</li>
<pre>if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $review = htmlspecialchars($_POST["review"]);
    $game_name = "Valorant";
    submit_review($conn, $game_name, $review);
    $result = get_reviews($conn, $game_name);
    foreach ($result as $res) {
        echo $res . "<br>";
    }
}</pre>
<br><br>
<li>While passing parameters to the SQL query in database.php file.</li>
<pre>function submit_review($conn, $game_name, $review)
{
    $query = "INSERT INTO reviews Values (:g, :r)";
    $pq = $conn->prepare($query);
    $pq->execute(
        array(
            ":r" => htmlspecialchars($review),
            ":g" => $game_name
        )
    );
}</pre>
</ol>
