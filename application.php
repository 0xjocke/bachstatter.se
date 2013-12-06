<?php 
	session_start();
	require_once 'config.php';

// Create connection with PDO
$dbh = new PDO(
  'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME,
  DB_USER,
  DB_PASS,
  array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')
);

// Models
require_once ROOT_PATH . '/models/base_model.php';
require_once ROOT_PATH . '/models/portfolio_item.php';
require_once ROOT_PATH . '/models/categories.php';
require_once ROOT_PATH . '/models/authorization.php';
require_once ROOT_PATH . '/models/user.php';
require_once ROOT_PATH . '/models/email.php';


// libs
require_once ROOT_PATH . '/lib/Swift-5.0.1/lib/swift_required.php';

BaseModel::setDbh($dbh);

 ?>