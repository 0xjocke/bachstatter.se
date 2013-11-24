<?php 
require '../application.php';

$item = PortfolioItem::find($_GET['id']);

 ?>


 <div class="container">
 	<div class="smallbox portLeft">
		<h2><?php echo $item->title; ?></h2>
		<p><?php echo $item->content; ?></p>
	</div>
	<div class="smallbox">
		<img class="portImg" src="../images/portfolio/<?php echo $item->id; ?>.png" alt="">
	</div>
 </div>