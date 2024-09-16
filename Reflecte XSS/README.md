<h1>Mitigation of Reflected XSS</h1>
<p>Reflected XSS is occured when the variable is reflected in url and there is no any type of filteration or sanytization.<br>That means that the parameter appears in url and anyone can modify it and inject it with malicious code.</p>
<p>This is very harmful because the attacker can inject malicious code in url and send it to the victim. Once the victim click the link, the malicious code will execute.
So, We must solve this problem.</p>
<p>The mitigation is that we use htmlspecialchars() function to sanitize the user's input from special characters.</p>
Now, Our website is safe.
