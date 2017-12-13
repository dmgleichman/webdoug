<html>
 <head>
  <title>PHP Test</title>
 </head>
 <body>
 
<?php
if (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== FALSE) {
    echo 'You are using Internet Explorer.<br />';
}

else if (strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox') !== FALSE) {
    echo 'You are using Firefox.<br />';
}

else if (strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome') !== FALSE) {
    echo 'You are using Chrome.<br />';
}

?>


 </body>
</html>
