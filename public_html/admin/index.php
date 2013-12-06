<?php 
	require_once '../../application.php';
	// check if login in with method checkOrRedirect
	Authorization::checkOrRedirect();

	?>

<?php require ROOT_PATH . '/partials/header.php'; ?>
	<body>
		<div class="container">
			<h1 class="invert">Edit!</h1>
			<a class="back" href="/admin/logout.php">Logout</a> <br> <br> <hr>
			<p class="back">What would you like to edit?</p> <br>
			<a class="back" href="/admin/portfolio">Portfolio | </a>
			<a class="back" href="/admin/category"> Category</a> <br> <hr>
		</div>
	</body>
</html>
