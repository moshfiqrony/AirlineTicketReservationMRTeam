<?php
$database = 'sas';
$user = 'root';
$pass = '';
$hostname = 'localhost';

$conn = mysqli_connect($hostname, $user, $pass, $database);
if (!$conn) {
	echo "Database Connection Problem";
	die();
}
  


  ?>
