<html>
 <head>
  <title>PHP Test</title>
 </head>
 <body>
 

<?php
if (strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox') !== FALSE) {
?>
<h3>strpos() must have returned non-false</h3>
<h4>You are using Internet Explorer</h4>
<?php
} else {
?>
<h3>strpos() must have returned false</h3>
<p>You are not using Internet Explorer</p>
<?php
}
?>



 </body>
</html>
