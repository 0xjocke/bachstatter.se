<?php 
	require_once 'config.php';

// Skapar anslutning med PDO
$dbh = new PDO(
  'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME,
  DB_USER,
  DB_PASS,
  array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')
);

// Models
require_once ROOT_PATH . '/models/base_model.php';
require_once ROOT_PATH . '/models/portfolio_item.php';

BaseModel::setDbh($dbh);

 ?>