<?php 
require_once '../../application.php';


// define userName
$errorMessage = '';

//if POST userName and password is set
if (isset($_POST['userName']) && isset($_POST['password'])) {
	// save username in userName variable
	$userName = $_POST['userName'];
	// if note check with db ok echo wrong
	// else send to index
	if (!Authorization::authenticate($_POST['userName'], $_POST['password'])) {
		$errorMessage = "Wrong password or username!";
	} else {
		header('Location: /admin/');
		exit;
	}
} else if (isset($_POST['submit'])){
  	// if not all is set. This will not get triggred often thanks to html5 validation
  	$errorMessage = "Please fill out all fields";
}
?>
<?php require ROOT_PATH . '/partials/header.php'; ?>
   <body>
	  <div class="container">
		 <form action="" method="post" class="form">
			<h1 class="invert">Username</h1>
			<?php 
			// if errormsg not "" echo it
				if ($errorMessage != '') {
					echo $errorMessage;
			} ?>
			<!-- Html 5 validations -->
			<input placeholder="Username" type="text" name="userName" id="user" class="feedback-input" required><br>
			<input placeholder="Password" type="password" name="password" id="keypass" class="feedback-input" required><br>
			<input type="submit" id="submit" value="Login" />
		 </form>
	  </div>
   </body>
</html>