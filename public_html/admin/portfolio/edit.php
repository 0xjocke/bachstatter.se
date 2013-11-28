<?php 
	require_once '../../../application.php';
	Authorization::checkOrRedirect();

  	$item = PortfolioItem::find($_GET['id']);

	if(isset($_POST['item'])) {
	  $item->attributes($_POST['item']);
	  $item->save();
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
			<h1 class="invert">Edit: <?php echo $item->title; ?></h1>
			<a href="/admin/portfolio/" class="back">Tillbaka</a>
			<form class="editform" action="" method="POST" enctype="multipart/form-data">

			    <label for="title">Title</label><br>
			    <input type="text" id="title" name="item[title]" value="<?php echo $item->title; ?>"> <br><br>

				<label for="content">Content</label>
				<textarea id="content" name="item[content]"><?php echo $item->content; ?></textarea> <br><br>
				
				<label for="imageName">Image</label><br>
			    <input type="file" id="title" name="file">

			  	<input type="submit" name="submit" value="Spara" class="btn">
		  	</form>
			<p> Current image:</p><br>
		  	<img src="/images/<?php echo $item->imageName; ?> " alt=""> <br>
		</div>
	</body>
</html>