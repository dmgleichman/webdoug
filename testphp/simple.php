<?php
// created by alvin alexander, http://devdaily.com
$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
?>

<html>
<head>
<title>Simple PHP Form Example</title>
</head>

<body>

<?php
if (!isset($_POST['submit']))
{
  // display the form
  ?>
  <p>
  <form method="post" action="<?php echo $PHP_SELF;?>">
  First Name: <input type="text" name="first_name">
  <br/>Last Name: <input type="text" name="last_name">
  <br/><input type="submit" value="submit" name="submit">
  </form>
  </p>

<?
}
else
{
  // display the output
  echo "<p>";
  echo "First Name: $first_name<br />";
  echo "Last Name: $last_name<br />";
  echo "</p>";
}
?>

</body>
</html>
