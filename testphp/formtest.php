<html>
 <head>
  <title>PHP Test</title>
 </head>
 <body>
 
	<h1>Test Forms</h1>
	<p>This examples tests forms. It uses POST and the file action.php to handle the input.</p>

	<form action="action.php" method="post">
	 <p>Your name: <input type="text" name="name" /></p>
	 <p>Your age: <input type="text" name="age" /></p>
	 <p><input type="submit" /></p>
	</form>
	
	<h1>Form Handling</h2>
	<p>Both GET and POST create an array of key/value pairs.</p>
	<ul>
		<li>Keys are the names of the form controls.</li>
		<li>Values are the input data from the user.</li>
	</ul>
		 
	<p>$_GET and $_POST are superglobals, always accessible, from any function, class or file.
	</p>
	
	<h2>Using POST</h2>
	<p>This example uses POST and the file welcome.php to handle the input.</p>

	<ol>
	  <li>$_POST is an array of variables passed to the current script via the HTTP POST method.</li>
	  <li>Information sent from a form with the POST method is invisible to others.</li>
	  <li>There are no limits on the amount of information to send.</li>
	  <li>The page can not be bookmarked, because the variables are not displayed in the URL.</li>
	  <li>It supports advanced functionality such as multi-part binary input</li>
	  <li>Developers prefer POST for sending form data.</li>
	</ol>
	
	<form action="welcome.php" method="post">
	Name: <input type="text" name="name"><br>
	E-mail: <input type="text" name="email"><br>
	<input type="submit">
	</form>
	

	<h2>Using GET</h2>
	<p>This example uses GET and the file welcome_get.php to handle the input.</p>
	
	<ol>
	  <li>$_GET is an array of variables passed to the current script via the URL parameters.</li>
	  <li>Information sent from a form with the GET method is visible to everyone because variable names and values are displayed in the URL.</li>
	  <li>The amount of information sent is limited to about 2000 characters.</li>
	  <li>The page can be bookmarked, because the variables are displayed in the URL.</li>
	</ol>
	
	<form action="welcome_get.php" method="get">
	Name: <input type="text" name="name"><br>
	E-mail: <input type="text" name="email"><br>
	<input type="submit">
	</form>

 </body>
</html>
