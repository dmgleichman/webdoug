<?php
	echo "Read a binary file\n";
	
	$fileName = "write_data_file.txt";
	$myfile = fopen($fileName, "r") or die("Unable to open file!");
	$dataSize = filesize($fileName);
	$bindata = fread($myfile,$dataSize);
	fclose($myfile);
	
	echo "Read file $fileName with size $dataSize\n";
	
	
	$array = unpack("ifirst/fmidf/ilast", $bindata);
	echo "Data is\n";
	print_r($array);
	
?>