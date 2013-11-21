
<?php

	function mysqlConnect($hostName, $userName, $pwd, $dbName){	
		require_once('settings.php');
										// function to connect to DB, 4 arguments: hostname, username, password, dbname.
		$link = mysql_connect($hostName, $userName, $pwd);		//resource
		if(!$link){
		    die( "No connection jocek : " . mysql_error());							//if no connect echo 
		}

		$db_selected = mysql_select_db($dbName, $link);							//connct to specific database, two argument: databaseName and mysql connect 
		if (!$db_selected) {														// if no connect to database 
		    die('hittar icke ' . mysql_error());
		}
	}

	function writeOutDb($tableName, $sortColumn, $writeColumn){
		$result = mysql_query("SELECT * FROM $tableName ORDER BY `$tableName`.`$sortColumn` ASC LIMIT 0, 30 "); //ta
		while ($post = mysql_fetch_assoc($result)){
			echo $post["$writeColumn"] . "<br>";
		}
	}



		//test db name = 185270-test
		//table name = elever
		//column name = lastname, firstname, gender 
		// host name = 'test-185270.mysql.binero.se'
?>
