<?php 
	require_once '../../../application.php';
	Authorization::checkOrRedirect();
	$errorMessages = [];
	if(isset($_POST['item'])) {
	  	$item = new PortfolioItem($_POST['item']);
	  	$item->add();	 
	  	$errorMessages = $item->addImage();
	  	if (!count($errorMessages) > 0 ) {
	  		header('Location: /admin/portfolio/');
  			exit;
	 	}
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
			<h1 class="invert">Add new Portfolioitem</h1>
			<a href="/admin/portfolio/" class="back">Tillbaka</a>
			<?php echo join($errorMessages, "<br>") ?>
			<form class="editform" action="" method="POST" enctype="multipart/form-data">

			    <label for="title">Title</label><br>
			    <input type="text" id="title" name="item[title]" value=""> <br><br>

				<label for="content">Content</label>
				<textarea id="content" name="item[content]"></textarea> <br><br>

			  	<label for="file">Choose you image (388px*200px)</label><br>
				<input type="file" name="file" id="file" size="40"><br>
				<input type="submit" name="submit" value="Submit">
		  	</form>
		</div>
	</body>
</html>
