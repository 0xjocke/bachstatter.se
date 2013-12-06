<?php 
	class PortfolioItem extends BaseModel{
		//name of my table
  		const TABLE_NAME = 'portfolioItems';
  		// public variables represent the collumns I have in db
	    public $id, $title, $content, $categoryId, $imageName;

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

  		// saves  name and ID to db
  		public function save() {
		    $statement = self::$dbh->prepare(
		      "UPDATE ".self::TABLE_NAME." SET title=:title,
		                                       content=:content,
		                                       categoryId=:categoryId
		                                       WHERE id=:id");
		    $statement->execute(array('id' => $this->id,
		                              'title' => $this->title,
		                              'content' => $this->content,
		                              'categoryId' => $this->categoryId
		                             ));
  		}

  		//add new item
  		public function add(){
  			 $statement = self::$dbh->prepare(
		      "INSERT INTO ".self::TABLE_NAME." (title, content, categoryId) VALUES (:title, :content, :categoryId)");
		    	
		    	$statement->execute(array('title' => $this->title, 'content' => $this->content, 'categoryId' => $this->categoryId));

		    	$this->id = self::$dbh->lastInsertId();
  		}


  		// lägg till in array
  		public function addImage(){
  			// create an empty array
  			$errorMessage = [];
  			// saves allowed extensions in array
  			$allowedExts = array("gif", "jpeg", "jpg", "png");
  			// saves allowed types in array
  			$allowedTypes = array("image/gif","image/jpeg", "image/jpg","image/pjpeg","image/x-png","image/png" );
			// explode the filename at "."
			$temp = explode(".", $_FILES["file"]["name"]);
			// saves the end part (extension) in $extension
			$extension = end($temp);
			// if file is bigger than 1 byte and smaller than 2000000
			// and if the extension is in allowedextension
			//and if the file type is in allowtypes array
			if (($_FILES["file"]["size"] > 1)
			&& ($_FILES["file"]["size"] < 2000000)
			&& in_array($extension, $allowedExts)
			&& in_array($_FILES['file']['type'], $allowedTypes)){
				// if  error save them in $errorMessage array
				if ($_FILES["file"]["error"] > 0){
					$errorMessage[] = "Return Code: " . $_FILES["file"]["error"];
				    }
				    // else (error = 0). use move_uploaded_file func. first parameter current place for img
				    // 2nd parameter the folder I want it in. 
				    else{
						if(move_uploaded_file($_FILES["file"]["tmp_name"],
						ROOT_PATH . "/public_html/images/" . $_FILES["file"]["name"])){
							// set objects variable $imageName to the image name
							// and load it up to DB
							$this->imageName= $_FILES['file']['name'];
							$statement = self::$dbh->prepare("UPDATE ".self::TABLE_NAME." SET imageName=:imageName WHERE id = :id");
							$statement->execute(array('imageName'=> $this->imageName, 'id'=> $this->id));
						}
				    }
				// this is the big if. and its saves the messages Invailed file to my error array    
				}else{
					$errorMessage[] = "Invalid file";
			  	}
			  	// returns the error array if all goes well this will be empty
			  return $errorMessage;
  		}	//end add image

  		// private variable for saving a specific category for object
  		private $category;
  		
  		// if private var is set return the categroy else 
  		// use our find method and send our ID as parameter.
  		public function category(){
  			if (!isset($this->category)){
  				$this->category = Category::find($this->categoryId);
  			}
  			return $this->category;

  		}


	}// class end

?>