<?php 
	require_once '../../../application.php';
	Authorization::checkOrRedirect();
	$categories = Category::all();
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
			<h1 class="invert">Categories</h1>
			<a class="back" href="/admin/">Back | </a>
			<a class="back" href="/admin/logout.php">Logout</a> <br> <br>
			<a class="back" href="/admin/category/add.php">Add new category</a> <br> <br>
			<table>
			  <thead>
			    <tr>
			      <th>Id</th>
			      <th>Namn</th>
			      <th>Edit</th>
			      <th>Remove</th>
			    </tr>
			  </thead>
			  <tbody>
			    <?php foreach($categories as $category): ?>
			      <tr>
			        <td><?php echo $category->id; ?></td>
			        <td><?php echo $category->name; ?></td>
			        <td>
			          <a href="<?php echo $category->adminEditUrl(); ?>">Edit</a>
			        </td>
			        <td>
			        	<a href="<?php echo $category->adminRemoveUrl(); ?>">Remove</a>
			        </td>
			      </tr>
			    <?php endforeach;?>
			  </tbody>
			</table>
		</div>
		<br>
	</body>
</html>