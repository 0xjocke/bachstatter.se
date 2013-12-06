<?php 
	require_once '../../../application.php';
	Authorization::checkOrRedirect();
	// get all categories
	$category = Category::all();
  	// get the portfolio item with the ID same as get id. 
  	$item = PortfolioItem::find($_GET['id']);
  	// if item is set 
  	// use attributes method which do the same as construct
  	// use save method which saves tilte, content and category id
  	// use add image which save imageName to db and moves uploaded file to right folder.
	if(isset($_POST['item'])) {	
	  $item->attributes($_POST['item']);
	  $item->save();
	  $item->addImage();
	}
 ?>
	<?php require ROOT_PATH . '/partials/header.php'; ?>

	<body>
		<div class="container">
			<h1 class="invert">Edit: <?php echo $item->title; ?></h1>
			<a href="/admin/portfolio/" class="back">Back</a>
			<form class="editform" action="" method="POST" enctype="multipart/form-data">
				<input type="hidden" name="item[id]" value="<?php echo $item->id; ?>">
			    
			    <label for="title">Title</label><br>
			    <input type="text" id="title" name="item[title]" value="<?php echo $item->title; ?>"> <br><br>

				<label for="content">Content</label>
				<textarea id="content" name="item[content]"><?php echo $item->content; ?></textarea> <br><br>
				
				<label for="Category">Category</label>
				<select id="Category" name="item[categoryId]">
						<option value="">Ingen Kategori</option>
					<?php foreach ($category as $category): ?>
						<option value="<?php echo $category->id ?>" <?php if ($item->categoryId == $category->id) {echo "selected";} ?> > 
							<?php echo $category->name; ?>
						</option>
					<?php endforeach; ?>
				</select> <br><br

				<label for="imageName">Image</label><br>
			    <input type="file" id="title" name="file">

			  	<input type="submit" name="submit" value="Spara" class="btn">
		  	</form>
			<p> Current image:</p><br>
		  	<img src="/images/<?php echo $item->imageName; ?> " alt=""> <br>
		</div>
	</body>
</html>