<h1>Mitigation of Reflected XSS</h1>
<p>Reflected XSS is occured when the variable is reflected in url and there is no any type of filteration or sanytization. That means that the parameter appears in url and anyone can modify it and inject it with malicious code.</p>
<p>This is very harmful because the attacker can inject malicious code in url and send it to the victim. Once the victim click the link, the malicious code will execute.
So, We must solve this problem.</p>
<h3>The mitigation will be done in two steps:</h3>
<ol>
  <li>
    The first step is convert method from GET to POST. This step will make the parameter hidden and doesn't appear in url.
  </li>
  <li>
    The second step is sanitize the user's input from special characters.
  </li>
</ol>
<p>Final code after mitigation will be: </p>
```<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vulnerable code</title>
</head>

<body>
    <h1>Search for game</h1>
    <form action="reflected_xss.php" method="POST">
        <input id="search" name="search" placeholder="e.g. Valorant" require>
        <button>Search</button>
    </form>

</body>
<?php
require_once "connection.php";
include "database.php";

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $search = htmlspecialchars($_POST["search"]);
    $result = search($conn, $search);
    echo "<br><h2>Search results for: $search</h2>";
    if ($result) {
        echo "<br>Game: $result[0]<br>";
        echo "Type: $result[1]<br>";
        echo "Launched: $result[2]<br>";
    } else {
        echo "<br>Game not found";
    }
}
?>

</html>```
Now, Our website is safe.
