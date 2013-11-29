<?php 
class User extends BaseModel
{
	const TABLE_NAME = 'user';

	public static function findUser($userName){

	$statement = self::$dbh->prepare("SELECT * FROM user WHERE userName = :userName");
	$statement->execute(array('userName' => $userName));
	$rs =  $statement->fetch();
	return $rs;
	}

}


 ?>