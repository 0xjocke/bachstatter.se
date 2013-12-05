<?php

class Authorization extends BaseModel
{
  // takes in username and password
  // search for/width the usernamne and the findUser method in User class
  // Hash the pwd and adds the email as a salt, making it unique
  // Is DB match set $_Session to true and return method check
  public static function authenticate($userName, $password) {
    $user = User::findUser($userName);
    $password = hash("sha256", $password.$user['userName']);
    if ($userName == $user['userName'] && $password == $user['pwd']) {
        $_SESSION['is_authenticated'] = true;
    }
    return self::check();
  }

// returns true if session is set and equal to 'is_authenticated'
  public static function check() {
  
    return (isset($_SESSION['is_authenticated']) && $_SESSION['is_authenticated']);
  }

//unset the session and direct to login page
  public static function logout() {
    unset($_SESSION['is_authenticated']);
    header('Location: /admin/login.php');
    exit;
  }

  // if check() not is true direct to login page and exit.

  public static function checkOrRedirect() {
    if (!self::check()) {
      header('Location: /admin/login.php');
      exit;
    }
  }

}