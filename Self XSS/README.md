<h1>Mitigation of XSS</h1>
<p>XSS happens if there is no sanitization to user's input.</p>
<p>So, we will use htmlspecialchars() function to filtering and sanitizing user's input.</p>
<p>Instead of this line : <code>$game_name = $_POST["game_name"];</code></p>
<p>We will replace it with this line : <code>$game_name = htmlspecialchars($_POST["game_name"]);</code></p>
