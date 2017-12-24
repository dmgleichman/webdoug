<html>
 <head>
  <title>PHP Test Using POST</title>
 </head>
 <body>

	<h2>$_POST</h2>
	<p>PHP $_POST is widely used to collect form data after submitting an HTML form with method="post". It is also used to pass variables.</p>

	<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
	  Name: <input type="text" name="fname">
	  <input type="submit">
	</form>

	<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		// collect value of input field
		$name = $_POST['fname'];
		if (empty($name)) {
			echo "Name is empty";
		} else {
			echo $name;
		}
	}
	?>

	

 </body>
</html>
