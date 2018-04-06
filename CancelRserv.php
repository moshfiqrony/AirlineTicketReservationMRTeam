<?php 
include 'connection.php';
$pnr = $_GET['pnr'];


$sql="DELETE FROM `flight` WHERE `pnr` = '$pnr';";
                    $result=  mysqli_query($conn, $sql);
                    if($result){
                        $location = "Location: confirmationUser.php?msg=Ticket Reservation Canceled For PNR =".$pnr;
                       header($location);
                    }else{
                        echo mysql_error();
                    }



?>