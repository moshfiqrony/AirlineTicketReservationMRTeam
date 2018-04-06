<?php
include '../connection.php';
$planeName = $_POST["planeName"];
$fromLoc = $_POST["fromLoc"];
$toLoc = $_POST["toLoc"];
$depDate = str_replace('/', '-', $_POST["depart_date"]);
$retDate = str_replace('/', '-', $_POST["return_date"]);
$depTime = str_replace('/', '-', $_POST["depart_time"]);
$retTime = str_replace('/', '-', $_POST["return_time"]);
$seat = $_POST["seat"];

                    
$sql="SELECT * FROM `sas`.`schedule` WHERE `planeName` = '$planeName' AND (`depDate` = '$depDate' OR `depDate` = '$retDate')";
$result=  mysqli_query($conn, $sql);
if(mysqli_num_rows($result)){
	header("Location: ../scheduleFlights.php?msg=Flighte Already Available");
}else{
	$sql = "INSERT INTO `schedule` (`planeName`, `fromLoc`, `toLoc`, `depDate`, `retDate`,`depTime`, `retTime`, `seat`) VALUES ('$planeName', '$fromLoc', '$toLoc', '$depDate', '$retDate','$depTime', '$retTime', '$seat')";
	$qry = mysqli_query($conn, $sql);
	if ($qry) {
		header("Location: ../showschedule.php?msg=Flighte Scheduled");
	}else{
		$error = "Location: ../showschedule.php?msg=Flighte Not Scheduled Completed.";
		header($error);
	}
}
?>