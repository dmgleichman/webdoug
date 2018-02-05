<?php
	echo "Write a binary file by testing pack() function";
	
	$fileName = "read_data_file.txt";
	$myfile = fopen($fileName, "w") or die("Unable to open file!");
	
	$bindata = pack("ifi", 33, 5.123, -66);
	
	fwrite($myfile,$bindata);
	fclose($myfile);
	
?>