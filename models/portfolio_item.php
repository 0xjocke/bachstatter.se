<?php 
	class PortfolioItem extends BaseModel{
		//name of my table
  		const TABLE_NAME = 'portfolioItems';

	    public $id, $title, $content, $categoryId, $imageName;

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


	    public static function whereCategory($categoryId) {
		    // Exikverar mysql sträng
		    $statement = self::$dbh->prepare("SELECT * FROM ".self::TABLE_NAME." WHERE categoryId = :categoryId");
		    $statement->execute(array('categoryId' => $categoryId));
		    // Returnerar array där varje object är en instans av tex PortfolioItem
		    return $statement->fetchAll(PDO::FETCH_CLASS, "PortfolioItem");
		}
	    // variable for url for all port items
	    private static $url = '/porfolio_items';
	
		//func that will return a url for specific item 
	    public function url(){
	    	return "/portfolio_item.php?id=" . $this->id;
	    }

	    //will return private var $url
	    public static function indexURL(){
	    	return self::$url;
	    }

	    // return a link to an edit page
	    public function adminEditUrl() {
    		return '/admin/portfolio/edit.php?id=' . $this->id;
  		}
  		// return a link to remove page
  		public function adminRemoveUrl(){
    		return '/admin/portfolio/remove.php?id=' . $this->id;
  		}


  		public function save() {
		    // Förbereder mysql kommando
		    $statement = self::$dbh->prepare(
		      "UPDATE ".self::TABLE_NAME." SET title=:title,
		                                       content=:content,
		                                       WHERE id=:id");
		    // Exekverar mysql kommando
		    $statement->execute(array('id' => $this->id,
		                              'title' => $this->title,
		                              'content' => $this->content
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
		      "INSERT INTO ".self::TABLE_NAME." (title, content) VALUES (:title, :content)");
		      // Exekverar mysql kommando
		    	$statement->execute(array('title' => $this->title, 'content' => $this->content));

		    	$this->id = self::$dbh->lastInsertId();
  		}


  		// lägg till in array

  		public function addImage(){
  			$errorMessage = [];
  			$allowedExts = array("gif", "jpeg", "jpg", "png");
  			$allowedTypes = array("image/gif","image/jpeg", "image/jpg","image/pjpeg","image/x-png","image/png" );
			$temp = explode(".", $_FILES["file"]["name"]);
			$extension = end($temp);

			if (($_FILES["file"]["size"] > 1)
			&& ($_FILES["file"]["size"] < 2000000)
			&& in_array($extension, $allowedExts)
			&& in_array($_FILES['file']['type'], $allowedTypes)){
				if ($_FILES["file"]["error"] > 0){
					$errorMessage[] = "Return Code: " . $_FILES["file"]["error"];
				    }
				    else{
						if(move_uploaded_file($_FILES["file"]["tmp_name"],
						"../../images/" . $_FILES["file"]["name"])){

							$this->imageName= $_FILES['file']['name'];
							$statement = self::$dbh->prepare("UPDATE ".self::TABLE_NAME." SET imageName=:imageName WHERE id = :id");
							$statement->execute(array('imageName'=> $this->imageName, 'id'=> $this->id));
						}
				    }
				}else{
					$errorMessage[] = "Invalid file";
			  	}
			  return $errorMessage;
  		}	//end add image
	}// class end

?>