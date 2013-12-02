<?php 
	require_once '../../../application.php';
	Authorization::checkOrRedirect();

	if(isset($_POST['id'])) {
	  	$category = Category::find($_POST['id']);
	  	$category->remove();
	  	header("Location: /admin/category/");
    	exit;
	} else {
	  $category = Category::find($_GET['id']);
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
			<h1 class="invert">Remove "<?php echo $category->name; ?>"</h1>
			<a href="/admin/category/" class="back">Tillbaka</a>
			<form class="editform" action="" method="POST">
			  	<input type="hidden" name="id" value="<?php echo $category->id; ?>">
				 
				<label>Är du säker du vill ta bort <strong><?php echo $category->name; ?> </strong>?</label><br>
			  	<input type="submit" name="submit" value="Ta bort" class="btn">
		  	</form>
		</div>
	</body>
</html>