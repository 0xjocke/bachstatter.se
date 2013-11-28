<?php 
	require_once '../../../application.php';
	Authorization::checkOrRedirect();
	$portfolioItems = PortfolioItem::all();
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
			<h1 class="invert">Portfolio items</h1>
			<a class="back" href="/admin/logout.php">Logout</a> <br>
			<a class="back" href="/admin/portfolio/add.php">Add new item</a> <br> <br>
			<table>
			  <thead>
			    <tr>
			      <th>Id</th>
			      <th>Title</th>
			      <th>Edit</th>
			      <th>Remove</th>
			    </tr>
			  </thead>
			  <tbody>
			    <?php foreach($portfolioItems as $item): ?>
			      <tr>
			        <td><?php echo $item->id; ?></td>
			        <td><?php echo $item->title; ?></td>
			        <td>
			          <a href="<?php echo $item->adminEditUrl(); ?>">Edit</a>
			        </td>
			        <td>
			        	<a href="<?php echo $item->adminRemoveUrl(); ?>">Remove</a>
			        </td>
			      </tr>
			    <?php endforeach; ?>
			  </tbody>
			</table>
		</div>
		<br>
	</body>
</html>