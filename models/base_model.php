<?php

class BaseModel
{
  // Ska sättas till en instance av PDO
  public static $dbh;

  /**
   * Sätter valfri databas anslutning till self::$dbh
   */
  public static function setDbh($pdoDbh) {
    self::$dbh = $pdoDbh;
  }

  public static function all() {
    // Sätter $class till namn på classen metoden kallas ifrån
    $class = get_called_class();
    // Hämtar tabelnamn
    $table = $class::TABLE_NAME;

    // Exikverar mysql sträng
    $statement = self::$dbh->prepare("SELECT * FROM $table");
    $statement->execute();

    // Returnerar array där varje object är en instans av tex PortfolioItem
    return $statement->fetchAll(PDO::FETCH_CLASS, $class);
  }

/*
  public static function find($id) {
    // Sätter $class till namn på classen metoden kallas ifrån
    $class = get_called_class();
    // Hämtar tabelnamn
    $table = $class::TABLE_NAME;

    $statement = self::$dbh->prepare("SELECT * FROM $table WHERE id=:id LIMIT 1");
    $statement->setFetchMode(PDO::FETCH_CLASS, $class);
    $statement->execute(array('id' => $id));

    return $statement->fetch(PDO::FETCH_CLASS);
  }
  */
}

?>