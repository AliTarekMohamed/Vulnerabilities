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
```hello```
Now, Our website is safe.
