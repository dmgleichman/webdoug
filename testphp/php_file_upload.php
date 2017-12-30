<!DOCTYPE html>
<html lang="en-US">

<head>
	<title>PHP File Upload</title>
	<meta charset="UTF-8">
</head>

<body>
    <h1>PHP File Upload</h1>
	
	<h2>Setup server to allow uploads</h2>
	<p>Ensure that PHP is configured to allow file uploads by setting<p>
	<p><pre>file_uploads = On</pre></p>
	<p>in the server's "php.ini" file. (It is by default in xampp.)</p>
	
	<h2>Create HTML form to allow users to choose the image file</h2>
	<p>use method="post" and enctype="multipart/form-data"</p>
	<p>input with type="file" shows a file-select control, with a "Browse" button.</p>
	<p>The form sends to a file called "upload.php"</p>
	
	<form action="upload.php" method="post" enctype="multipart/form-data">
		Select image to upload:
		<input type="file" name="fileToUpload" id="fileToUpload">
		<input type="submit" value="Upload Image" name="submit">
	</form>
	
	

</body>
</html>