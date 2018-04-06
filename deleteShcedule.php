<?php 
include 'connection.php';
$pnr = $_GET['id'];


$sql="DELETE FROM `schedule` WHERE `id` = '$pnr';";
                    $result=  mysqli_query($conn, $sql);
                    if($result){
                        $location = "Location: showschedule.php?msg=Shcedule Deleted.";
                       header($location);
                    }else{
                        echo mysql_error();
                    }



?>