<?php
include 'connection.php';
session_start();
if(isset($_SESSION['adminname'])){
  header('Location: adminpage.php');
}else if (isset($_SESSION['username'])) {
  header('Location: user.php');
}
?>


<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="headercss.css">
</head>
<body>
<ul class="menu cf">
  <li><a href="">Home</a></li>
  <li>
    <a href="">Ticket</a>
    <ul class="submenu">
    	<li><a href="">Sub</a></li>
    	<li><a href="">Sub</a></li>
    	<li><a href="">Sub</a></li>
    	<li><a href="">Sub</a></li>
    	<li><a href="">Sub</a></li>
    </ul>			
  </li>
  <li><a href="">Schedule</a></li>
  <li><a href="">About</a></li>
  <li><a href="">Contact</a></li>
</ul>
<center><h3 style="color: white;"><?php if(isset($_GET['msg'])){echo $_GET['msg'];})?></h3></center>
</body>
</body>
</html>