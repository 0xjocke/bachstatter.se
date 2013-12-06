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
    // when I call this func w an array as parameter all array items
  // will be added to this class variables
  public function __construct(array $attributes = null) {
    // dont do anything if we dont get an parameter.
    if ($attributes === null) return;
    // loop through our array set the keys and vlaues to our class variables
    foreach ($attributes as $key => $value) {
        $this->$key = $value;
    }
  }
  // does the same as constructor func but can get called with out creating a newe object
  public function attributes(array $attributes = null){
    if ($attributes === null) return;
    foreach ($attributes as $key => $value) {
        $this->$key = $value;
    }
  }

  public static function all() {
    // Gets the name of the class its being called from
    $class = get_called_class();
    // Get the constant table_name
    $table = $class::TABLE_NAME;
    // Prepares a mysql connection, select all from the table name of the calss it being called from.
    $statement = self::$dbh->prepare("SELECT * FROM $table");
    // execute it
    $statement->execute();


    //returns an array containing all of the rows.
    // Each row is an object and the columns properties of the object
    return $statement->fetchAll(PDO::FETCH_CLASS, $class);
  }


  public static function find($id) {
    $class = get_called_class();
    $table = $class::TABLE_NAME;
    // prepares, select the from table_name where id is the parameter nnumber.
    // in prepare I use :id to stop Ross from injections
  
    $statement = self::$dbh->prepare("SELECT * FROM $table WHERE id=:id LIMIT 1");
    // set fetch mode so we get objects
    $statement->setFetchMode(PDO::FETCH_CLASS, $class);
    //execute and set the id to the "real" id
    $statement->execute(array('id' => $id));
    // returnes one row with objects
    return $statement->fetch(PDO::FETCH_CLASS);
  }


  // removes this object  
      public function remove(){
        $class = get_called_class();
        $table = $class::TABLE_NAME;
        $statement = self::$dbh->prepare(
          "DELETE FROM ".$table." WHERE id=:id");
        $statement->execute(array('id' => $this->id));
      }
}
?>