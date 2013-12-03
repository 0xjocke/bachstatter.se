<?php 
	require_once '../../../application.php';
	Authorization::checkOrRedirect();
	if(isset($_POST['category'])) {
	  	$category = new Category($_POST['category']);
	  	$category->save();	 
	  	
	  	header('Location: /admin/category/');
  		exit;

	}else{
  		$category = category::find($_GET['id']);
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
			<h1 class="invert">Edit "<?php echo $category->name; ?>"</h1>
			<a href="/admin/category/" class="back">Back</a>
			<form class="editform" action="" method="POST">
				<input type="hidden" name="category[id]" value="<?php echo $category->id; ?>">
			    <label for="name">Name</label><br>
			    <input type="text" name="category[name]" value="<?php echo $category->name; ?>"> <br><br>

				<input type="submit" name="submit" value="Submit">
		  	</form>
		</div>
	</body>
</html>
