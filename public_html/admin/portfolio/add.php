<?php 
	require_once '../../../application.php';
		if (isset($_COOKIE['PrivatePageLogin'])) {
		   if ($_COOKIE['PrivatePageLogin'] == md5($password.$nonsense)){

	if(isset($_POST['item'])) {
	  	$item = new PortfolioItem($_POST['item']);
	  	$item->add();	  
	  	$item->addImage();
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
			<form class="editform" action="" method="POST" enctype="multipart/form-data">
			  	<input type="hidden" name="item[id]" value="">

			    <label for="title">Title</label><br>
			    <input type="text" id="title" name="item[title]" value=""> <br><br>

				<label for="content">Content</label>
				<textarea id="content" name="item[content]"></textarea> <br><br>

			  	<label for="file">Choose you image (388px*200px)</label><br>
				<input type="file" name="file" id="file" size="40"><br>
				<input type="submit" name="submit" value="Submit">
		  	</form>
		  	<a href="/admin/portfolio/" class="back">Tillbaka</a>
		</div>
	</body>
</html>
<?php 
	}else {
		header("Location: /admin/portfolio/");
	}
 }else // cookie issset
?>