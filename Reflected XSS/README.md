<h1>Mitigation of Reflected XSS</h1>
<p>Reflected XSS happens if there is no sanitization to user's input.</p><br><br>
<p>So, we will use htmlspecialchars() function to filtering and sanitizing user's input</p><br><br>
<p>Instead of this line : </p><code>$game_name = $_POST["game_name"];</code><p>, We will replace it with this line</p><code>$game_name = htmlspecialchars($_POST["game_name"]);</code>
