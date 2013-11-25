<?php 
require_once '../application.php';

$item = PortfolioItem::find($_GET['id']);

 ?>
 <!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="Frontend Utvecklare som jobbar med HTML5, CSS3, Sass och jQuery och PHP efter dina önskemål">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $item->title; ?></title>
        <link rel="stylesheet" href="css/reset.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
	<body>
		<div class="itemcon">
		 	<div class="itembox">
				<h1><?php echo $item->title; ?></h1>
				<p><?php echo $item->content; ?></p>
			</div>
			<div class="itembox">
				<img src="../images/<?php echo $item->imageName; ?>" alt="">
			</div>
			<a class="back" href="/">Tillbaka</a>
		</div>
	</body>
</html>