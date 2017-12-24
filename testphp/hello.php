<html>
 <head>
  <title>PHP Test</title>
 </head>
 <body>
 <?php echo '<p>Hello World</p>'; ?> 
 
 
  <?php
	function writeMsg() {
		echo "An echo statement inside a function to say: Hello world!";
	}

	writeMsg(); // call the function
	?> 
	
	
	<h2>Function Arguments</h2>
	
	<?php
	function familyName($fname) {
		echo "$fname Gleichman.<br>";
	}

	familyName("Doug");
	familyName("Ariana");
	familyName("June");
	familyName("Roger");
	familyName("Shania Canine Wigglebutts Chia Pet");
	?>

	<h2>Default Argument Value</h2>

	 <?php
	function setHeight($minheight = 50) {
		echo "The height is : $minheight <br>";
	}

	setHeight(350);
	setHeight(); // will use the default value of 50
	setHeight(135);
	setHeight(80);

	
	echo "<h2>Function Return Value</h2>";
	

	function sum($x, $y) {
		$z = $x + $y;
		return $z;
	}

	echo "5 + 10 = " . sum(5, 10) . "<br>";
	echo "7 + 13 = " . sum(7, 13) . "<br>";
	echo "2 + 4 = " . sum(2, 4);

	echo "<h2>Arrays</h2>";

	$cars = array("Volvo", "BMW", "Toyota");
	echo "I like " . $cars[0] . ", " . $cars[1] . " and " . $cars[2] . ".";
	
	echo "<br>The total count is:" . count($cars);

	echo "<h2>Loop through</h2>";
	
	$arrlength = count($cars);

	for($x = 0; $x < $arrlength; $x++) {
		echo $cars[$x];
		echo "<br>";
	}

	?> 

	<h2>Associative Arrays</h2>
	<?php
	$age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");
	echo "Peter is " . $age['Peter'] . " years old.";
	
	echo "<h3>Loop Through Associative Arrays</h3>";
	
	$age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");

	foreach($age as $x => $x_value) {
		echo "Key=" . $x . ", Value=" . $x_value;
		echo "<br>";
	}

	
	echo "<h2>Sort Arrays</h2>";

	sort($cars);

	$clength = count($cars);
	for($x = 0; $x < $clength; $x++) {
		echo $cars[$x];
		echo "<br>";
	}

	echo "<h3>Sort Numbers</h3>";
	
	$numbers = array(4, 6, 2, 22, 11);
	sort($numbers);

	$arrlength = count($numbers);
	for($x = 0; $x < $arrlength; $x++) {
		echo $numbers[$x];
		echo "<br>";
	}
	
	echo "<h3>Sort Array (Ascending Order), According to Value - asort()</h3>";
	
	asort($age);

	foreach($age as $x => $x_value) {
		echo "Key=" . $x . ", Value=" . $x_value;
		echo "<br>";
	}

	echo "<h3>Sort Array (Ascending Order), According to Key - ksort()</h3>";

	ksort($age);

	foreach($age as $x => $x_value) {
		echo "Key=" . $x . ", Value=" . $x_value;
		echo "<br>";
	}

	
	
?>

	<h1>Global Variables - Superglobals</h1>
	<h2>$GLOBALS</h2>
	<p>PHP stores all global variables in an array called $GLOBALS[index]. The index holds the name of the variable.</p>
	<?php
	$x = 75;
	$y = 25;

	function addition() {
		$GLOBALS['z'] = $GLOBALS['x'] + $GLOBALS['y'];
	}

	addition();
	echo $z;
	?>
	
	<h2>$_SERVER</h2>	
	<p>$_SERVER is a PHP super global variable which holds information about headers, paths, and script locations.</p>
		
	<?php
	echo $_SERVER['PHP_SELF'];
	echo "<br>";
	echo $_SERVER['SERVER_NAME'];
	echo "<br>";
	echo $_SERVER['HTTP_HOST'];
	echo "<br>";
	echo $_SERVER['HTTP_REFERER'];
	echo "<br>";
	echo $_SERVER['HTTP_USER_AGENT'];
	echo "<br>";
	echo $_SERVER['SCRIPT_NAME'];
	?>
	
	
	<h2>$_REQUEST</h2>
	<p>PHP $_REQUEST is used to collect data after submitting an HTML form.</p>
	<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
	  Name: <input type="text" name="fname">
	  <input type="submit">
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
