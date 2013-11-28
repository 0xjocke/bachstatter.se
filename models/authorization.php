<?php

class Authorization
{

  public static function authenticate($username, $password) {
    // Om man skulle vilja koppla till databas
    // ex:
    //
    // $user = User::findByEmail($username);
    // if ($user && $password == $user->password) {
    //   $_SESSION['is_authenticated'] = true;
    // }

    if ($username == ADMIN_EMAIL && $password == ADMIN_PASS) {
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