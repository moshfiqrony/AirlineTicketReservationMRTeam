<?php 
session_start();
include '../header/headerAdmin.php';
include '../connection.php';
$planeName = $_POST["planeName"];
$fromLoc = $_POST["fromLoc"];
$toLoc = $_POST["toLoc"];
$depDate = str_replace('/', '-', $_POST["depart_date"]);
$depTime = str_replace('/', '-', $_POST["depart_time"]);
$totalSeat;
$scid;
$seatamnt = $_POST["seatamnt"];
$seatamntA = $_POST["seatamntA"];
$totalAmnt = $seatamnt + $seatamntA;
if(isset($_POST["return_date"]) && isset($_POST["return_time"])){
	$retDate = str_replace('/', '-', $_POST["return_date"]);
	$retTime = str_replace('/', '-', $_POST["return_time"]);
	$sql="SELECT * FROM `sas`.`schedule` WHERE `depDate` = '$depDate' AND `retDate` = '$retDate' AND `fromLoc` = '$fromLoc' AND `toLoc` = '$toLoc' AND `seat` >= '$totalAmnt' ORDER BY `id`";
                    $result=  mysqli_query($conn, $sql);
                    if(mysqli_num_rows($result)>0){
                        while ($row=mysqli_fetch_assoc($result)){
                        	$totalSeat = $row['seat'];
                        	$scid = $row['id'];
                            echo $totalSeat;
                        }
                    }else{
                    	$location = "Location: ../adminpage.php?msg=No Seat Available";
                        header($location);
                    }
}
else if(!isset($_POST["return_date"]) && !isset($_POST["return_time"])){
	$sql="SELECT * FROM `sas`.`schedule` WHERE `depDate` = '$depDate' AND `fromLoc` = '$fromLoc' AND `toLoc` = '$toLoc' AND `seat` >= '$totalAmnt'  ORDER BY `id`";
                    $result=  mysqli_query($conn, $sql);
                    if(mysqli_num_rows($result)>0){
                        while ($row=mysqli_fetch_assoc($result)){
                        	$totalSeat = $row['seat'];
                        	$scid = $row['id'];
                        }
                    }else{
                    	$location = "Location: ../adminpage.php?msg=No Seat Available";
                        header($location);
                    }
}else{
    $location = "Location: ../adminpage.php?msg=Error";
                        header($location);
}

$fname = $_POST["first_name"];
$lname = $_POST["last_name"];
$email = $_POST["email"];
$number = $_POST["number"];
$adminname = $_SESSION['adminname']; 

$pnr = $scid.$_POST["planeName"].$totalSeat.strrev($seatamnt).$seatamnt.strrev($totalSeat);

$amount = ($seatamnt*2000)+($seatamntA*1000);
$sql = "INSERT INTO `flight` (`flightNumber`, `fname`, `lname`, `phone`, `email`, `dest`, `depart`, `depDate`, `depTime`, `retTime`, `retDate`, `amount`, `pnr`, `accept`, `user`) VALUES ('$planeName', '$fname', '$lname', '$number', '$email', '$toLoc', '$fromLoc', '$depDate', '$depTime', '$retTime', '$retDate', '$amount', '$pnr', '1', '$adminname');";
$qry = mysqli_query($conn, $sql);
if ($qry) {
}else{
    echo "<h1>Error In Database Try Again</h1>";
    die();
}

if($totalSeat>=$seatamnt){
    $remseat  = $totalSeat - $seatamnt;
    $sql="UPDATE `schedule` SET `seat` = '$remseat' WHERE `schedule`.`id` = '$scid';";
                    $result=  mysqli_query($conn, $sql);
                    if($result){
                        $location = "Location: ../bookFlightAdmin.php?confirm=Ticket Is Waiting For Confirmation&pnr=".$pnr;
                       header($location);
                    }else{
                        echo mysql_error();
                    }
}

?>
