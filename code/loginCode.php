<?php
session_start();
include '../connection.php';
$uname = $_POST["uname"];
$password = $_POST["password"];
$priv = $_POST["Make"];

if($priv == '1'){
	$sql = "SELECT `administration`.`admin_name` AS `username` FROM `sas`.`administration` WHERE `administration`.`admin_name` = '$uname' AND `administration`.`admin_pass` = '$password'";
	$qry = mysqli_query($conn, $sql);
	if (mysqli_num_rows($qry)){
		$row=mysqli_fetch_assoc($qry);
	    $activeuser = $row['username'];
	    $_SESSION['adminname']=$activeuser;
	    $location = "Location: ../adminpage.php";
	    header($location);
	}else{
		$location = "Location: ../login.php?msg=Problem Try Again";
		header($location);
	}
}elseif ($priv == '2') {
	$sql = $sql = "SELECT `customer`.`cus_user_name` AS `username` FROM `sas`.`customer` WHERE `customer`.`cus_user_name` = '$uname' AND `customer`.`cus_pass` = '$password'";
	$qry = mysqli_query($conn, $sql);
	if (mysqli_num_rows($qry)){
		$row=mysqli_fetch_assoc($qry);
	    $activeuser = $row['username'];
	    $_SESSION['username']=$activeuser;
	    $location = "Location: ../user.php";
	    header($location);
	}else{
		$location = "Location: ../login.php?msg=Problem Try Again";
		header($location);
	}
}


?>
