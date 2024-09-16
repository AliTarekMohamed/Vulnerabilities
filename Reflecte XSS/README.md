<h1>Mitigation of Reflected XSS</h1>
<p>Reflected XSS is occured when the variable is reflected in url and there is no any type of filteration or sanytization. That means that the parameter appears in url and anyone can modify it and inject it with malicious code.</p>
<p>This is very harmful because the attacker can inject malicious code in url and send it to the victim. Once the victim click the link, the malicious code will execute.
So, We must solve this problem.</p>
<h2>The mitigation will be done in two steps:</h2>
<ol>
  <li>
    </p>The first step is convert method from GET to POST. This step will make the parameter hidden and doesn't appear in url.</p>
    <pre><form action="reflected_xss.php" method="POST"></pre><br><br>
    <pre>if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $search = htmlspecialchars($_POST["search"]);
    $result = search($conn, $search);
    echo "<br>\<h2\>Search results for: $search</h2>";
    if ($result) {
        echo "<br>Game: $result[0]<br>";
        echo "Type: $result[1]<br>";
        echo "Launched: $result[2]<br>";
    } else {
        echo "<br>Game not found";
    }
}</pre>
  </li>
      <br>
  <li>
    <p>The second step is sanitize the user's input from special characters.</p>
    <pre>$search = htmlspecialchars($_POST["search"]);</pre>
  </li>
</ol>
<br>
Now, Our website is safe.
