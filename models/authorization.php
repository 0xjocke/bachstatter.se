<?php

class Authorization extends BaseModel
{

  public static function authenticate($userName, $password) {
    $user = User::findUser($userName);
    $password = hash("sha256", $password.$user['userName']);
    if ($userName == $user['userName'] && $password == $user['pwd']) {
        $_SESSION['is_authenticated'] = true;
    }
    return self::check();
  }

  public static function check() {
    // om session is_authenticated är definerat och om den har ett sant värde så
    // kommer vi returna true annars false
    return (isset($_SESSION['is_authenticated']) && $_SESSION['is_authenticated']);
  }

  public static function logout() {
    unset($_SESSION['is_authenticated']);
    header('Location: /admin/login.php');
    exit;
  }

  public static function checkOrRedirect() {
    if (!self::check()) {
      header('Location: /admin/login.php');
      exit;
    }
  }

}