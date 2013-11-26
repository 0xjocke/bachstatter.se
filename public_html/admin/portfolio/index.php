<?php
  require_once '../../../application.php';


if (isset($_COOKIE['PrivatePageLogin'])) {
   if ($_COOKIE['PrivatePageLogin'] == hash("SHA256", $password.$nonsense)) {
      require 'startpage.php';
      exit;
   } else {
      echo "Bad Cookie.";
      exit;
   }
}

if (isset($_GET['p']) && $_GET['p'] == "login") {
   if ($_POST['user'] != $username) {
      echo "Sorry, that username does not match.";
      exit;
   } else if ($_POST['keypass'] != $password) {
      echo "Sorry, that password does not match.";
      exit;
   } else if ($_POST['user'] == $username && $_POST['keypass'] == $password) {
      setcookie('PrivatePageLogin', hash("SHA256", $password.$nonsense));
      header("Location: $_SERVER[PHP_SELF]");
   } else {
      echo "Sorry, you could not be logged in at this time.";
   }
}
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
         <form action="<?php echo $_SERVER['PHP_SELF']; ?>?p=login" method="post" class="form">
            <h1 class="invert">Login</h1>
            <input placeholder="Username" type="text" name="user" id="user" class="feedback-input"><br>
            <input placeholder="Password" type="password" name="keypass" id="keypass" class="feedback-input"><br>
            <input type="submit" id="submit" value="Login" />
         </form>
      </div>
   </body>
</html>