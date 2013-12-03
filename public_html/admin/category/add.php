<?php 
	require_once '../../../application.php';
	Authorization::checkOrRedirect();
	$errorMessages = [];
	if(isset($_POST['category'])) {
	  	$category = new Category($_POST['category']);
	  	$category->add();	 
	  	header('Location: /admin/category/');
	  	exit;

	}
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
			<h1 class="invert">New Category</h1>
			<a href="/admin/category/" class="back">Back</a>

			<form class="editform" action="" method="POST">

			    <label for="name">Name</label><br>
			    <input type="text" name="category[name]" value=""> <br><br>

				<input type="submit" name="submit" value="Submit">
		  	</form>
		</div>
	</body>
</html>
