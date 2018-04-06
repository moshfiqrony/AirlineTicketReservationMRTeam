<?php 
session_start();
include 'connection.php';
$user = $_SESSION['username'];
$id = $_GET['id'];

$sql="UPDATE `notification` SET `userPriority`='1' WHERE `user` = '$user' and `id` = '$id'";
                    $result=  mysqli_query($conn, $sql);
                    if($result){
                        $location = "Location: user.php";
                       header($location);
                    }else{
                        echo mysql_error();
                    }



?>