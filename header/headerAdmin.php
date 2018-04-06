<?php
include 'connection.php';
session_start();
if(!isset($_SESSION['adminname'])){
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
  <li><a href="./adminpage.php">Home</a></li>
  <li>
    <a href="">Flights</a>
    <ul class="submenu">
      <li><a href="./flightAdmin.php">Search Flights</a></li>
      <li><a href="./scheduleFlights.php">Schedule Flights</a></li>
      <li><a href="./showschedule.php">Show Schedule</a></li>
    </ul>     
  </li>
  <li><a href="./airlines.php">Airlines</a></li>
  <li><a href="./userList.php">Users</a></li>
  <li>
    <a href="./confirmationAdmin.php">Confirmation</a>    
  </li>
  <li><a href="logout.php">Sign Out<?php if(isset($_SESSION['adminname']))echo " ".$_SESSION['adminname']?></a></li>
</ul>
<center><h3 style="color: white;"><?php if(isset($_GET['msg'])){echo $_GET['msg'];}?></h3></center>
</body>
</body>
</html>