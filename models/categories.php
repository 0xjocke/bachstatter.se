<?php 
	class Category extends BaseModel{
		//name of my table
  		const TABLE_NAME = 'categories';
  		// public variables represent the collumns I have in db
	    public $id, $name;

	    // return a link to an edit page. $this->id will be this obj id
	    public function adminEditUrl() {
    		return '/admin/category/edit.php?id=' . $this->id;
  		}

  		// return a link to remove page
  		public function adminRemoveUrl(){
    		return '/admin/category/remove.php?id=' . $this->id;
  		}

  		// saves  name and ID to db
  		public function save() {
		    // Update column name where id is this obj id
		    $statement = self::$dbh->prepare(
		      "UPDATE ".self::TABLE_NAME." SET name=:name
		                                   WHERE id=:id");
		    // execute and sets the id and name to this obj values
		    $statement->execute(array('id' => $this->id,
		                              'name' => $this->name
		                             ));
  		}
  		// add new object to db
  		public function add(){
  				//insert name to category table. Id will auto increment
  			 $statement = self::$dbh->prepare(
		      "INSERT INTO ".self::TABLE_NAME." (name) VALUES (:name)");
		      // Exekverar mysql kommando
		    	$statement->execute(array('name' => $this->name));
		    	//since we dont have an ID (db will auto incr) I use func lastInsertId and sets that this obj ID
		    	$this->id = self::$dbh->lastInsertId();
  		}

	}// class end

?>