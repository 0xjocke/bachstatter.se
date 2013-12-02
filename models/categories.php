<?php 
	class Category extends BaseModel{
		//name of my table
  		const TABLE_NAME = 'categories';

	    public $id, $name;

	    // when I call this func w an array all array items
	    // will be added to this class variables
  		public function __construct(array $attributes = null) {
	    	if ($attributes === null) return;
	    	foreach ($attributes as $key => $value) {
	      		$this->$key = $value;
		    }
	    }

	    public function attributes(array $attributes = null){
	    	if ($attributes === null) return;
	    	foreach ($attributes as $key => $value) {
	      		$this->$key = $value;
		    }
	    }
	    // return a link to an edit page
	    public function adminEditUrl() {
    		return '/admin/category/edit.php?id=' . $this->id;
  		}

  		// return a link to remove page
  		public function adminRemoveUrl(){
    		return '/admin/category/remove.php?id=' . $this->id;
  		}


  		public function save() {
		    // Förbereder mysql kommando
		    $statement = self::$dbh->prepare(
		      "UPDATE ".self::TABLE_NAME." SET name=:name
		                                   WHERE id=:id");
		    // Exekverar mysql kommando
		    $statement->execute(array('id' => $this->id,
		                              'name' => $this->name
		                             ));
  		}
  		public function remove(){
  			 // Förbereder mysql kommando
		    $statement = self::$dbh->prepare(
		      "DELETE FROM ".self::TABLE_NAME." WHERE id=:id");
		    // Exekverar mysql kommando
		    $statement->execute(array('id' => $this->id));
  		}

  		public function add(){
  			 $statement = self::$dbh->prepare(
		      "INSERT INTO ".self::TABLE_NAME." (name) VALUES (:name)");
		      // Exekverar mysql kommando
		    	$statement->execute(array('name' => $this->name));

		    	$this->id = self::$dbh->lastInsertId();
  		}


  		// lägg till in array

	}// class end

?>