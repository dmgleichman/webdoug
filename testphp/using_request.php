<html>
 <head>
  <title>PHP Test Using Request</title>
 </head>
 <body>
	
	<h2>$_REQUEST</h2>
	<p>PHP $_REQUEST is used to collect data after submitting an HTML form.</p>
	<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
	  Name: <input type="text" name="fname">
	  Click Here<input type="submit" value="Me Click"> 
	</form>

	<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		// collect value of input field
		$name = htmlspecialchars($_REQUEST['fname']);
		if (empty($name)) {
			echo "Name is empty";
		} else {
			echo $name;
		}
	}
	?>
	

 </body>
</html>
