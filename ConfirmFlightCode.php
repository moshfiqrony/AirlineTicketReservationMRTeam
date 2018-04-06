<?php 
include 'connection.php';
$pnr = $_GET['pnr'];


$sql="UPDATE `flight` SET `accept`='1' WHERE `pnr` = '$pnr';";
                    $result=  mysqli_query($conn, $sql);
                    if($result){
                        $location = "Location: confirmationAdmin.php?msg=Ticket Reservation Confirmned For PNR =".$pnr;
                       header($location);
                    }else{
                        echo mysql_error();
                    }



?>