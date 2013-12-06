<?php 
	require_once '../../../application.php';
	Authorization::checkOrRedirect();
	// I dont create a new object
	//I use my find method to find the specific obj
	// and then delete it.
	if(isset($_POST['id'])) {
	  	$category = Category::find($_POST['id']);
	  	$category->remove();
	  	header("Location: /admin/category/");
    	exit;
	} else {
	// use the find method from the GET
	  $category = Category::find($_GET['id']);
	}
 ?>
	<?php require ROOT_PATH . '/partials/header.php'; ?>

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