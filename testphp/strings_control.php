<!DOCTYPE HTML>
<html>
 <head>
  <title>PHP Test</title>
 </head>
 <body>
 
	<h1>Strings</h1>
	
	<h2>strlen()</h2>
 
	<?php
	$myStr = "Hello world!";
	echo strlen($myStr); // outputs 12
	echo "<br>The length of " . $myStr . " is " . strlen($myStr);
	?>

	<h2>str_word_count()</h2>
	
	<?php
	echo "<br>There are " . str_word_count($myStr) . " words in " . $myStr;
	?> 
	
	<h2>strpos()</h2>

	<?php
	echo "world appears at position " . strpos($myStr, "world") . " in " . $myStr;
	?> 
	
	<h2>str_replace()</h2>
	
	<?php
	echo "Replace world with Dolly to say: " . str_replace("world", "Dolly", $myStr);
	?>

	<h1>Constants</h1>
	<?php
	// case-sensitive constant name
	define("GREETING", "Welcome to W3Schools.com!");
	echo GREETING;
	?>
	
	<h2>Case insensitive</h2>
	 <?php
	define("GREETING", "Welcome to W3Schools.com!", true);
	echo greeting;
	?> 
	
	<h2>Case insensitive</h2>
	<p>Constants are automatically global and can be used across the entire script.
	The example below uses a constant inside a function, even if it is defined outside the function:
	</p>
	<?php
	function myTest() {
		echo GREETING;
	}
	 
	myTest();
	?>

	<h1>The if...elseif....else Statement</h1>
	
	 <?php
	$t = date("H");

	if ($t < "10") {
		echo "Have a good morning!";
	} elseif ($t < "20") {
		echo "Have a good day!";
	} else {
		echo "Have a good night!";
	}
	?> 

	<h1>switch Statement</h1>
	
	<?php
	$favcolor = "red";

	switch ($favcolor) {
		case "red":
			echo "Your favorite color is red!";
			break;
		case "blue":
			echo "Your favorite color is blue!";
			break;
		case "green":
			echo "Your favorite color is green!";
			break;
		default:
			echo "Your favorite color is neither red, blue, nor green!";
	}
	?>

	<h1>while Statement</h1>
	
	<?php  
	$x = 1;
	 
	while($x <= 5) {
	  echo "The number is: $x <br>";
	  $x++;
	}
	?>

	<h1>for Loop</h1>
	
	<?php
	for ($x = 0; $x <= 10; $x++) {
		echo "The number is: $x <br>";
	}
	?> 
	
	<h1>foreach  Loop</h1>
	
	<?php  
	$colors = array("red", "green", "blue", "yellow");

	foreach ($colors as $value) {
	  echo "$value <br>";
	}
	?>  




 </body>
</html>
