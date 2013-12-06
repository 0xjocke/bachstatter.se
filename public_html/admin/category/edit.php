<?php 
	require_once '../../../application.php';
	Authorization::checkOrRedirect();
	// if category is set
	if(isset($_POST['category'])) {
	  	$category = new Category($_POST['category']);
	  	$category->save();	 
	  	
	  	header('Location: /admin/category/');
  		exit;

	}else{
  		$category = category::find($_GET['id']);
	}
?>

	<?php require ROOT_PATH . '/partials/header.php'; ?>
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
