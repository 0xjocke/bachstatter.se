<?php

class BaseModel
{
  // Will be an instance of the PDO connection to DB
  public static $dbh;


// pass in a Db conntection 
//then the function sets the variable $dbh to it 
  public static function setDbh($pdoDbh) {
    self::$dbh = $pdoDbh;
  }

  public static function all() {
    // Gets the name of the class its being called from
    $class = get_called_class();
    // Get the constant table_name
    $table = $class::TABLE_NAME;
    // Prepares a mysql connection
    $statement = self::$dbh->prepare("SELECT * FROM $table");
    // execute it
    $statement->execute();


    //returns an array containing all of the rows.
    // every collumn becomes an object?
    return $statement->fetchAll(PDO::FETCH_CLASS, $class);
  }


  public static function find($id) {
    $class = get_called_class();
    $table = $class::TABLE_NAME;
    // prepares, select all from table_name where id is the parameter
  
    $statement = self::$dbh->prepare("SELECT * FROM $table WHERE id=:id LIMIT 1");
    // set fetch mode so we get objects
    $statement->setFetchMode(PDO::FETCH_CLASS, $class);
    //execute and set the id to the "real" id
    $statement->execute(array('id' => $id));
    // returnes one row with objects
    return $statement->fetch(PDO::FETCH_CLASS);
  }
}

?>