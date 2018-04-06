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
	<link rel="stylesheet" type="text/css" href="./css/headercss.css">
  <style type="text/css">
    .mar{
      margin-top: 40px;
    }
  </style>
</head>
<body>
<ul class="menu cf mar">
  <li><a href="./login.php">Login</a></li>
  <li>
    <a href="./register.php">Register</a>			
  </li>
  <li><a href="./index.php">Home</a></li>
</ul>
<center><h3 style="color: white;"><?php if(isset($_GET['msg'])){echo $_GET['msg'];} ?></h3></center>
</body>
</html>