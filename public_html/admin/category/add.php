<?php 
	require_once '../../../application.php';
	// check if login
	Authorization::checkOrRedirect();
	// if category is set, make a new category and send post category array with the values-
	// our constructor will set obj $name to category[name] 
	if(isset($_POST['category'])) {
	  	$category = new Category($_POST['category']);
	  	// use add method and redirect to category index
	  	$category->add();	 
	  	header('Location: /admin/category/');
	  	exit;

	}
?>

<?php require ROOT_PATH . '/partials/header.php'; ?>

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
