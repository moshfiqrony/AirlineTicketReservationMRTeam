<?php
include '../connection.php';
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$uname = $_POST["uname"];
$Email = $_POST["Email"];
$password = $_POST["password"];

$sql = "INSERT INTO `customer` (`cus_first_name`, `cus_last_name`, `cus_user_name`, `cus_pass`,`email`) VALUES ('$fname', '$lname', '$uname', '$password', '$Email')";
$qry = mysqli_query($conn, $sql);
if ($qry) {
	header("Location: ../login.php?msg=Registration Completed");
}else{
	$error = "Location: ../register.php?msg=Registration Not Completed. Error: " . mysqli_error($conn);
	header($error);
}


?>