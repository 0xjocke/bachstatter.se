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
		                                       content=:content
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
  			 $imageName = $_FILES["file"]["name"];
  			 $statement = self::$dbh->prepare(
		      "INSERT INTO ".self::TABLE_NAME." (title, content, imageName) VALUES (:title, :content, :imageName)");
		      // Exekverar mysql kommando
		    	$statement->execute(array('title' => $this->title, 'content' => $this->content, 'imageName' => $imageName));
  		}

  		public function addImage(){
  			$allowedExts = array("gif", "jpeg", "jpg", "png");
			$temp = explode(".", $_FILES["file"]["name"]);
			$extension = end($temp);
			if ((($_FILES["file"]["type"] == "image/gif")
			|| ($_FILES["file"]["type"] == "image/jpeg")
			|| ($_FILES["file"]["type"] == "image/jpg")
			|| ($_FILES["file"]["type"] == "image/pjpeg")
			|| ($_FILES["file"]["type"] == "image/x-png")
			|| ($_FILES["file"]["type"] == "image/png"))
			&& ($_FILES["file"]["size"] < 2000000)
			&& in_array($extension, $allowedExts))
			  {
			  if ($_FILES["file"]["error"] > 0)
			    {
			      echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
			    }
			  else
			    {
			    echo "Upload: " . $_FILES["file"]["name"] . "<br>";
			    echo "Type: " . $_FILES["file"]["type"] . "<br>";
			    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
			    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

			    if (file_exists("../../images/" . $_FILES["file"]["name"]))
			      {
			      echo $_FILES["file"]["name"] . " already exists. ";
			      }
			    else
			      {
			      move_uploaded_file($_FILES["file"]["tmp_name"],
			      "../../images/" . $_FILES["file"]["name"]);
			      echo "Stored in: " . "../../images/" . $_FILES["file"]["name"];
			      }
			    }
			  }
			else
			  {
			  echo "Invalid file";
			  }
  		}	//end add image
	}// class end

?>