<?php 
	require_once '../../../application.php';
	Authorization::checkOrRedirect();
	// get all categories
	$categories = Category::all();
 ?>
	<?php require ROOT_PATH . '/partials/header.php'; ?>

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