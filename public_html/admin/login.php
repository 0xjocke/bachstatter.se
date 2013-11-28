<?php 
require_once '../../application.php';


// definerar login
$login = '';

if (isset($_POST['login']) && isset($_POST['password'])) {
  // skriver över login med postat användarnamn
  $login = $_POST['login'];
  if (!Authorization::authenticate($_POST['login'], $_POST['password'])) {
    $errorMessage = "Fel användarnamn eller lösenord!";
  } else {
    header('Location: /admin/portfolio/index.php');
    exit;
  }
} else if (isset($_POST['submit'])){
  $errorMessage = "Var god fyll i alla fält";
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
            <input placeholder="Username" type="text" name="login" id="user" class="feedback-input"><br>
            <input placeholder="Password" type="password" name="password" id="keypass" class="feedback-input"><br>
            <input type="submit" id="submit" value="Login" />
         </form>
      </div>
   </body>
</html>