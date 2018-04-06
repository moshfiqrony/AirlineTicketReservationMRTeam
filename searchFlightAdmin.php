<?php
$avail = -1;
include 'header/headerAdmin.php';
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
<?php if($avail == 1){
?>
<center><h4>Your Round Trip Flight's Total </h4> <h1><?php echo $totalSeat?></h1> <h4> Seat Is Available</h4></center>
<h2>You Requested A Flight Of Following Information</h2>
<form action="code/bookFlightAdminCode.php" method="POST">
	<center><table>
		<tr>
			<td>Flight Number</td>
			<td><input type="text" name="planeName" value="<?php echo $flightNumber;?>" readonly=""></td>
		</tr>
		<tr>
			<td>Departure Date</td>
			<td><input type="date" name="depart_date" value="<?php echo $depart_date;?>" readonly=""></td>
		</tr>
		<tr>
			<td>Departure Time</td>
			<td><input type="Time" name="depart_time" value="<?php echo $depart_time;?>" readonly=""></td>
		</tr>
		<tr>
			<td>Return Date</td>
			<td><input type="Date" name="return_date" value="<?php echo $return_date;?>" readonly=""></td>
		</tr>
		<tr>
			<td>Return Time</td>
			<td><input type="Time" name="return_time" value="<?php echo $return_time;?>" readonly=""></td>
		</tr>
		<tr>
			<td>Departure Location</td>
			<?php
			$sql="SELECT `location`.`name` as `deptloc`, `location`.`id` as `deptid` FROM `sas`.`schedule` INNER JOIN `location` ON `schedule`.fromLoc = `location`.`id` WHERE `depDate` = '$depart_date' AND `retDate` = '$return_date' AND `fromLoc` = '$DepLoc' AND `toLoc` = '$RechLoc' ";
                    $result=  mysqli_query($conn, $sql);
                    if(mysqli_num_rows($result)){
                        while ($row=mysqli_fetch_assoc($result)){
                        	?>
			<td><select readonly name="fromLoc"><option value="<?php echo $row['deptid'];?>"><?php echo $row['deptloc'];?></option></select></td>
<?php
			         }
                    } 
			?>
		</tr>
		<tr>
			<td>Destination Location</td>
			<?php
			$sql="SELECT `retlocation`.`name` as `retloc`, `retlocation`.`id` as `retid` FROM `sas`.`schedule` INNER JOIN `retlocation` ON `schedule`.toLoc = `retlocation`.`id` WHERE `depDate` = '$depart_date' AND `retDate` = '$return_date' AND `fromLoc` = '$DepLoc' AND `toLoc` = '$RechLoc' ";
                    $result=  mysqli_query($conn, $sql);
                    if(mysqli_num_rows($result)){
                        while ($row=mysqli_fetch_assoc($result)){
                        	?>

			<td><select readonly name="toLoc"><option value="<?php echo $row['retid'];?>"><?php echo $row['retloc'];?></option></select></td>
<?php
			         }
                    } 
			?>
		</tr>

	</table></center>
<?php
}
?>

<!-- one Way Info -->

<?php if($avail == 2){
?>
<center><h4>Your One Way Flight's Total </h4> <h1><?php echo $totalSeat?></h1> <h4> Seat Is Available</h4></center>
<h2>You Requested A Flight Of Following Information</h2>
<form action="code/bookFlightAdminCode.php" method="POST">
	<center><table>
		<tr>
			<td>Flight Number</td>
			<td><input type="text" name="planeName" value="<?php echo $flightNumber;?>" readonly=""></td>
		</tr>
		<tr>
			<td>Departure Date</td>
			<td><input type="Date" name="depart_date" value="<?php echo $depart_date;?>" readonly=""></td>
		</tr>
		<tr>
			<td>Departure Time</td>
			<td><input type="Time" name="depart_time" value="<?php echo $depart_time;?>" readonly=""></td>
		</tr>
		<tr>
			<td>Departure Location</td>
			<?php
			$sql="SELECT `location`.`name` as `deptloc`, `location`.`id` as `deptid` FROM `sas`.`schedule` INNER JOIN `location` ON `schedule`.fromLoc = `location`.`id` WHERE `depDate` = '$depart_date' AND `fromLoc` = '$DepLoc' AND `toLoc` = '$RechLoc' ";
                    $result=  mysqli_query($conn, $sql);
                    if(mysqli_num_rows($result)){
                        while ($row=mysqli_fetch_assoc($result)){
                        	?>
			<td><select readonly name="fromLoc"><option value="<?php echo $row['deptid'];?>"><?php echo $row['deptloc'];?></option></select></td>
<?php
			         }
                    } 
			?>
		</tr>
		<tr>
			<td>Destination Location</td>
			<?php
			$sql="SELECT `retlocation`.`name` as `retloc`, `retlocation`.`id` as `retid` FROM `sas`.`schedule` INNER JOIN `retlocation` ON `schedule`.toLoc = `retlocation`.`id` WHERE `depDate` = '$depart_date' AND `fromLoc` = '$DepLoc' AND `toLoc` = '$RechLoc' ";
                    $result=  mysqli_query($conn, $sql);
                    if(mysqli_num_rows($result)){
                        while ($row=mysqli_fetch_assoc($result)){
                        	?>

			<td><select readonly name="toLoc"><option value="<?php echo $row['retid'];?>"><?php echo $row['retloc'];?></option></select></td>
<?php
			         }
                    } 
			?>
		</tr>
	</table></center>
<?php
}
?>
<?php 
if ($avail == -1) {
}elseif ($avail == 1 || $avail == 2) {
?>

</div>
</center>

<div class="body-content">
  <div class="module">
      <div class="alert alert-error"></div>
      <label>
        <span>First Name </span>
          <input type="text" placeholder="First Name" name="first_name" required  />
      </label>
      <label>
        <span>Last Name </span>
        <input type="text" placeholder="Last Name" name="last_name" required />
      </label>
      <span>Email </span>
        <input type="email" placeholder="Email" name="email" required />
      <span>Phone Number </span>
        <input type="number" placeholder="Phone Number" name="number" required /></br></br>
        <span>Amount Of Seat</span>
        <input type="text" id="seatamntA" placeholder="Seat Amount Child" name="seatamnt" required/>
        <input type="text" id="seatamnt" placeholder="Seat Amount Adult" name="seatamntA" required/></br></br>

      <input type="submit" id="book" value="Book" name="book" class="btn btn-block btn-primary" /></br>
      <span id="inf">Give Valid Input</span></br>
    </form></br></br>
  </div>
</div>
<?php
}
?>
<?php include 'footer.php';?>
</body>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script type="text/javascript">
	
	  $(document).ready(function() {
  $("#datepicker").datepicker({ dateFormat: 'yy-mm-dd' });
  });

$(document).ready(function () {
	$("#inf").hide();
    $("#seatamnt").keyup(function(){
            if($(this).val() == 0 || $(this).val() < 0){
            	$("#book").hide();
            	$("#inf").show();

            } else{
            	$("#book").show();
            	$("#inf").hide();
            }
        });
});

$(document).ready(function () {
	$("#inf").hide();
    $("#seatamntA").keyup(function(){
            if($(this).val() < 0){
            	$("#book").hide();
            	$("#inf").show();

            } else{
            	$("#book").show();
            	$("#inf").hide();
            }
        });
});
</script>

</html>