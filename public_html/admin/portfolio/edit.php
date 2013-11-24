<?php 
	require_once '../../../application.php';

	if(isset($_POST['item'])) {
	  $item = new PortfolioItem($_POST['item']);
	  $item->save();
	} else {
	  $item = PortfolioItem::find($_GET['id']);
	}
 ?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="Frontend Utvecklare som jobbar med HTML5, CSS3, Sass och jQuery och PHP efter dina önskemål">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Frontend Developer</title>
        <link rel="stylesheet" href="/css/reset.css">
        <link rel="stylesheet" href="/css/style.css">
    </head>
	<body>
		<div class="container">
			<h1 class="invert">Edit: <?php echo $item->title; ?></h1>
			<form class="editform" action="" method="POST">
			  	<input type="hidden" name="item[id]" value="<?php echo $item->id; ?>">

			    <label for="title">Title</label><br>
			    <input type="text" id="title" name="item[title]" value="<?php echo $item->title; ?>"> <br><br>

				<label for="content">Content</label>
				<textarea id="content" name="item[content]"><?php echo $item->content; ?></textarea>

			  	<input type="submit" name="submit" value="Spara" class="btn">
		  	</form>
		  	<a href="/admin/portfolio/" class="back">Tillbaka</a>
		</div>
	</body>
</html>