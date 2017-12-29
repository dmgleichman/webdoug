<!DOCTYPE html>
<html lang="en-US">

<head>
	<title>PHP File Handling</title>
	<meta charset="UTF-8">
</head>

<body>
    <h1>PHP File Handling</h1>
	
	<h1>Using include</h1>
	<p>Some text.</p>
	<p>Some more text. Here we add the footer file</p>
	<?php include 'footer.php';?>

	<p>Here we add the menu file</p>
	<div class="menu">
	<?php include 'menu.php';?>
	</div>
	
	<p>Here we add the vars file</p>	
	<?php include 'vars.php';
	echo "I have a $color $car.";
	?>


	
	<h2>include and require</h1>
	
	<p>include allows PHP to continue when file does not exist</p>

	<?php /*
	include 'noFileExists.php';
	echo "I have a $color2 $car2.";
	*/ ?>

	<p>require causes a fatal error when file does not exist</p>
	<?php /*
	require 'noFileExists.php';
	echo "I have a $color3 $car3.";
	*/ ?>


	<h1>Read whole file - readfile</h1>
	
	<p>Reads the whole file and writes it to the output buffer. Returns the number of bytes read on success.</p>
	
	<p>Read in the web dictionary file</p>
	<?php
	echo readfile("webdictionary.txt");
	?> 

	<h1>File handling functions</h1>
		
	<h2>Open File - fopen fread fclose</h2>
	<?php
	$myfile = fopen("webdictionary.txt", "r") or die("Unable to open file!");
	echo fread($myfile,filesize("webdictionary.txt"));
	fclose($myfile);
	?>

	<h2>Read Single Line - fgets</h2>

	<?php
	$myfile = fopen("webdictionary.txt", "r") or die("Unable to open file!");
	echo fgets($myfile) . "<br>";
	echo fgets($myfile) . "<br>";
	fclose($myfile);
	?>

	<h2>Check End-Of-File - feof</h2>
	
	<?php
	$myfile = fopen("webdictionary.txt", "r") or die("Unable to open file!");
	// Output one line until end-of-file
	while(!feof($myfile)) {
	  echo fgets($myfile) . "<br>";
	}
	fclose($myfile);
	?>
	
	<h2>Read Single Character - fgetc</h2>
	 <?php
	$myfile = fopen("webdictionary.txt", "r") or die("Unable to open file!");
	// Output one character until end-of-file
	while(!feof($myfile)) {
	  echo fgetc($myfile);
	}
	fclose($myfile);
	?> 
	
	<h2>Create File - fopen, Write to File - fwrite</h2>	
	<p>Open with "a" to append to newfile.txt</p>
	
	 <?php
	$myfile = fopen("newfile.txt", "a") or die("Unable to open file!");
	$txt = "John Doe\n";
	fwrite($myfile, $txt);
	$txt = "Janis Smiley\n";
	fwrite($myfile, $txt);
	fclose($myfile);
	?> 
	
	<?php	
	function writeFile($fname, $txt) {
		$myFile = fopen($fname, "a") or die("Unable to open file: " . $fname);
		fwrite($myFile, $txt);
		fclose($myFile);
	}
	
	writeFile("newfile.txt", "More stuff\n");
	
	?>
	
</body>
</html>