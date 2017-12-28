<!DOCTYPE html>
<html lang="en-US">

<head>
	<title>PHP Arrays Multi</title>
	<meta charset="UTF-8">
</head>

<body>
    <h1>PHP Arrays Multi</h1>
	
	<?php
	$cars = array
	  (
	  array("Volvo",22,18),
	  array("BMW",15,13),
	  array("Saab",5,2),
	  array("Land Rover",17,15)
	  );
	
	echo "<p>The two-dimensional cars array contains four arrays, and it has two indices: row and column.</p>";
	
	echo $cars[0][0].": In stock: ".$cars[0][1].", sold: ".$cars[0][2].".<br>";
	echo $cars[1][0].": In stock: ".$cars[1][1].", sold: ".$cars[1][2].".<br>";
	echo $cars[2][0].": In stock: ".$cars[2][1].", sold: ".$cars[2][2].".<br>";
	echo $cars[3][0].": In stock: ".$cars[3][1].", sold: ".$cars[3][2].".<br>";
	
	echo "<h3>Put a For loop inside another For loop to get the elements</h3>";
	
	for ($row = 0; $row < 4; $row++) {
	  echo "<p><b>Row number $row</b></p>";
	  echo "<ul>";
	  for ($col = 0; $col < 3; $col++) {
		echo "<li>".$cars[$row][$col]."</li>";
	  }
	  echo "</ul>";
	}
	?>	

	<h1>Date</h1>
	
	<?php
	echo "Today is " . date("Y/m/d") . "<br>";
	echo "Today is " . date("Y.m.d") . "<br>";
	echo "Today is " . date("Y-m-d") . "<br>";
	echo "Today is " . date("l");
	?>

	<h2>Automatic Copyright Year</h2>
	&copy; 2010-<?php echo date("Y");?>
	
	<h2>Time</h2>
	<?php
	echo "The time is " . date("h:i:sa");
	?>

	<h2>Set Timezone</h2>

	<?php
	date_default_timezone_set("America/Los_Angeles");
	echo "The time is " . date("h:i:sa");
	?>
	
	<h2>Create a Date With PHP mktime</h2>
	<?php
	$d=mktime(11, 14, 54, 8, 12, 2014);
	echo "Created date is " . date("Y-m-d h:i:sa", $d);
	?>

	<h2>Create a Date From a String With PHP strtotime</h2>
	<?php
	$d=strtotime("10:30pm April 15 2014");
	echo "Created date is " . date("Y-m-d h:i:sa", $d) . "<br>";

	$d=strtotime("tomorrow");
	echo "Tomorrow is " . date("Y-m-d h:i:sa", $d) . "<br>";

	$d=strtotime("next Saturday");
	echo "Next Saturday is " . date("Y-m-d h:i:sa", $d) . "<br>";

	$d=strtotime("+3 Months");
	echo "Plus 3 Months is " . date("Y-m-d h:i:sa", $d) . "<br>";
	?>
	
	<h2>Dates for the next six Saturdays</h2>	
	<?php
	$startdate=strtotime("Saturday");
	$enddate=strtotime("+6 weeks", $startdate);

	while ($startdate < $enddate) {
	  echo date("M d", $startdate) . "<br>";
	  $startdate = strtotime("+1 week", $startdate);
	}
	?>

	<h2>number of days until 4th of July</h2>	
	<?php
	$d1=strtotime("July 04");
	$d2=ceil(($d1-time())/60/60/24);
	if ($d2 < 0)
		$d2 = $d2 + 365;
	echo "There are " . $d2 ." days until 4th of July.";
	?>
	
</body>
</html>