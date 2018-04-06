<?php
include 'connection.php';
session_start();
if(!isset($_SESSION['username'])){
  header('Location: login.php');
}
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="./css/headercss.css">
</head>
<body>
<ul class="menu cf">
  <li><a href="./user.php">Home</a></li>
  <li><a href="./showscheduleUser.php">Schedule</a></li>
  <li>
    <a href="">Flights</a>
    <ul class="submenu">
      <li><a href="./flight.php">Search Flight</a></li>
      <li><a href="./confirmationUser.php">Find Reservation</a></li>
    </ul>     
  </li>
  <li><a href="logout.php">Sign Out<?php if(isset($_SESSION['username']))echo " ".$_SESSION['username']?></a></li>
</ul>
<center><h3 style="color: white;"><?php if(isset($_GET['msg'])){echo $_GET['msg'];}?></h3></center>
</body>
</body>
</html>