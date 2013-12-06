<?php 
	require_once '../../../application.php';
	Authorization::checkOrRedirect();
	$portfolioItems = PortfolioItem::all();
 ?>
	<?php require ROOT_PATH . '/partials/header.php'; ?>
	<body>
		<div class="container">
			<h1 class="invert">Portfolio items</h1>
			<a class="back" href="/admin/">Back | </a>
			<a class="back" href="/admin/logout.php">Logout</a> <br> <br>
			<a class="back" href="/admin/portfolio/add.php">Add new item</a> <br> <br>
			<table>
			  <thead>
			    <tr>
			      <th>Id</th>
			      <th>Title</th>
			      <th>Edit</th>
			      <th>Remove</th>
			      <th>Category</th>
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
			        <td>
			      		<?php 
			      		// if we have a categoru write it out 
			      		if ($item->category()){echo $item->category()->name;}
			      		// else echo no cat
			      		else{
			      			echo "No category";
			      		}
			      		 ?>
			      	</td>
			      </tr>
			    <?php endforeach;?>
			  </tbody>
			</table>
		</div>
		<br>
	</body>
</html>