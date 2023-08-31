<?php
// include composer autoload
require "vendor/autoload.php";
use Dotenv\Dotenv as Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$host=$_ENV['db_host'];
$user=$_ENV['db_user'];
$pswd=$_ENV['db_pswd'];
$db=$_ENV['db_name'];
$con=mysqli_connect($host,$user,$pswd,$db);
	// Check connection
	if (mysqli_connect_errno()) {
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
?>