<?php 
	require_once '../../../application.php';
	Authorization::checkOrRedirect();
	// get all category
	$category = Category::all();

	// set my error array so I dont get undefined msg
	$errorMessages = [];
	// if post isset create new instance.
	if(isset($_POST['item'])) {
	  	$item = new PortfolioItem($_POST['item']);
	  	$item->add();
	  	//if $_FILES is bigger than 1 byte set error array to addImage method
	  	// add image will return errormsg or just validate and move the file	 
	  	if ($_FILES["file"]["size"] > 1) {
	  		$errorMessages = $item->addImage();
	  	}

	  	// theres no errors redirect to index and exit.
	  	if (!count($errorMessages) > 0 ) {
	  		header('Location: /admin/portfolio/');
  			exit;
	 	}
	}
?>

	<?php require ROOT_PATH . '/partials/header.php'; ?>

	<body>
		<div class="container">
			<h1 class="invert">Add new Portfolioitem</h1>
			<a href="/admin/portfolio/" class="back">Tillbaka</a>
			<?php echo join($errorMessages, "<br>") ?>
			<form class="editform" action="" method="POST" enctype="multipart/form-data">

			    <label for="title">Title</label><br>
			    <input type="text" id="title" name="item[title]" value=""> <br><br>

				<label for="content">Content</label>
				<textarea id="content" name="item[content]"></textarea> <br><br>

				<label for="Category">Category</label>
				<select id="Category" name="item[categoryId]">
					<option value="">Ingen Kategori</option>
					<?php foreach ($category as $category): ?>
						<option value="<?php echo $category->id ?>"> 
							<?php echo $category->name; ?>
						</option>
					<?php endforeach; ?>
				</select> <br><br

			  	<label for="file">Choose you image (388px*200px)</label><br>
				<input type="file" name="file" id="file" size="40"><br>
				<input type="submit" name="submit" value="Submit">
		  	</form>
		</div>
	</body>
</html>
