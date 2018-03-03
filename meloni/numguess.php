<?php
$num_to_guess = 40;
$user_guess = "";

if (!isset($_POST['guess'])) 
{
	//user has not entered anything yet$message
	$message = "Welcome to the guessing machine!";
}
else
{
	$user_guess = $_POST['guess'];

	if (!is_numeric($user_guess))
	{
		// not a number
		$message = "I don't understand that response.";
	}
	elseif ($user_guess == $num_to_guess)
	{
		$message = "Well done!";
	}
	elseif ($user_guess > $num_to_guess) 
	{
		$message = $user_guess." is too large!";
	}
	elseif ($user_guess < $num_to_guess) 
	{
		$message = $user_guess." is too small!";
	}
	else
	{
		$message = "I am confussed";
	}
	
}

?>
<!DOCTYPE html>
<html>
	<head>
		<title>A PHP number guessing script</title>
	</head>
	<body>
		<h1><?php echo $message; ?></h1>
		
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		<p><label for="guess">Type your guess here:</label><br>
		<input type="text" id="guess" name="guess"></p>
		<button type="submit" name="submit" value="submit">Enter</button>
		</form>
		
		</form>
	</body>
</html>
		