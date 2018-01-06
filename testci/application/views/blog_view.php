<html>
<head>
	<title><?php echo $title?></title>
</head>
<body>
	<h1>Welcome to my Blog!</h1>
	<p>This is a view called blog_view.php</p>
	
	<h1><?php echo $heading;?></h1>
	<p><?php echo 'The items, ' . $title . " and " . $heading . ', are variables'; ?>

	<h3>My Todo List</h3>
	
	<ul>
	<?php foreach ($todo_list as $item):?>
		<li><?php echo $item;?></li>
	<?php endforeach;?>
	</ul>
	

	<h3>My Shopping List</h3>
	
	<ol>
	<?php foreach ($shopping_list as $item):?>
		<li><?php echo $item;?></li>
	<?php endforeach;?>
	</ol>	
	
</body>
</html>
