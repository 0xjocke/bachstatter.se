<?php 
	require_once '../../../application.php';
	Authorization::checkOrRedirect();
	// I dont create a new object
	//I use my find method to find the specific obj
	// and then delete it.
	if(isset($_POST['id'])) {
	  	$item = PortfolioItem::find($_POST['id']);
	  	$item->remove();
	  	header("Location: /admin/portfolio/");
    	exit;
	} else {
		// use the find method from the GET
	  $item = PortfolioItem::find($_GET['id']);
	}
 ?>
	<?php require ROOT_PATH . '/partials/header.php'; ?>
	<body>
		<div class="container">
			<h1 class="invert">Remove <?php echo $item->title; ?></h1>
			<a href="/admin/portfolio/" class="back">Back</a>
			<form class="editform" action="" method="POST">
			  	<input type="hidden" name="id" value="<?php echo $item->id; ?>">
				
				<label>Är du säker du vill ta bort <strong><?php echo $item->title; ?> </strong>?</label><br>
			  	<input type="submit" name="submit" value="Ta bort" class="btn">
		  	</form>
		</div>
	</body>
</html>