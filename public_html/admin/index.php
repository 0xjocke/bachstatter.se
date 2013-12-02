<?php 
	require_once '../../application.php';
	Authorization::checkOrRedirect();

	?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="Frontend Utvecklare som jobbar med HTML5, CSS3, Sass och jQuery och PHP efter dina önskemål">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Frontend Developer</title>
        <link rel="stylesheet" href="/css/style.css">
    </head>
	<body>
		<div class="container">
			<h1 class="invert">Edit!</h1>
			<a class="back" href="/admin/logout.php">Logout</a> <br> <br> <hr>
			<p class="back">What would you like to edit?</p> <br>
			<a class="back" href="/admin/portfolio">Portfolio | </a>
			<a class="back" href="/admin/category"> Category</a> <br> <hr>
		</div>
	</body>
</html>
