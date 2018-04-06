<?php
$avail = -1;
include 'connection.php';
include 'header/headerlog.php';
if (isset($_GET['searchTwo'])) {
	$DepLoc = $_GET['DepLoc'];
	$RechLoc = $_GET['RechLoc'];
	$depart_date = $_GET['depart_date'];
	$return_date = $_GET['return_date'];
	$depart_time;
	$return_time;
	$flightNumber;
	$totalSeat;
	$sql="SELECT * FROM `sas`.`schedule` WHERE `depDate` = '$depart_date' AND `retDate` = '$return_date' AND `fromLoc` = '$DepLoc' AND `toLoc` = '$RechLoc' ORDER BY `id`";
                    $result=  mysqli_query($conn, $sql);
                    if(mysqli_num_rows($result)){
                        while ($row=mysqli_fetch_assoc($result)){
                        	$avail = 1;
                        	$depart_time = $row['depTime'];
                        	$return_time = $row['retTime'];
                        	$flightNumber = $row['planeName'];
                        	$totalSeat = $row['seat'];
                        }
                    }else{
                    	echo "<center><h1>Sorry To Inform You That<br> We Do Not Have Flights That <br>Meet Your Requirements</h1></center>";
                    	die();
                    }
                    mysqli_free_result($result);
} elseif (isset($_GET['searchOne'])) {
	$DepLoc = $_GET['DepLoc'];
	$RechLoc = $_GET['RechLoc'];
	$depart_date = $_GET['depart_date'];
	$sql="SELECT * FROM `sas`.`schedule` WHERE (`depDate` = '$depart_date' OR `retDate` = '$depart_date') AND (`fromLoc` = '$DepLoc' OR `toLoc` = '$DepLoc') AND (`toLoc` = '$RechLoc' OR `fromLoc` = '$RechLoc') ORDER BY `id`";
                    $result=  mysqli_query($conn, $sql);
                    if(mysqli_num_rows($result)){
                        while ($row=mysqli_fetch_assoc($result)){
                        	$avail = 2;
                        	$depart_time = $row['depTime'];
                        	$flightNumber = $row['planeName'];
                        	$totalSeat = $row['seat'];
                        }
                    }else{
                    	echo "<center><h1>Sorry To Inform You That<br> We Do Not Have Flights That <br>Meet Your Requirements</h1></center>";
                    }
                    mysqli_free_result($result);
	
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Flight</title>
		<link href="//db.onlinewebfonts.com/c/a4e256ed67403c6ad5d43937ed48a77b?family=Core+Sans+N+W01+35+Light" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="css/form.css" type="text/css">
<style type="text/css">
  label { width: 200px; float: left; margin: 0 20px 0 0; }
span { display: block; margin: 0 0 3px; font-size: 1.2em; font-weight: bold; }
input { width: 200px; border: 1px solid #000; padding: 5px; }
</style>
</head>
<body>

<!-- Two Way Info -->

	<center>
<div style="margin-top: 25px;">
	<?php
if ($avail == 1 || $avail == 2) {
	echo "<h1>We Have Flights For You On This Date Please Login</h1>";
}else{
    echo "<h1>We Have No Flights Available For You On This Date</h1>";
}
?>

</div>
</center>
<?php include 'footer.php';?>
</body>


</html>