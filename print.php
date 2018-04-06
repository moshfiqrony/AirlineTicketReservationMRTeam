<?php 
session_start();
if (isset($_GET['pnr'])) {
	include 'connection.php';
	$pnr = $_GET['pnr'];
	$sql="SELECT * FROM `sas`.`flight` WHERE `pnr` = '$pnr' ORDER BY `id`";    
    $result=  mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)>0){
    	$row=mysqli_fetch_assoc($result);
    }else{
    	header("Location: confirmationUser.php?msg=Problem Printing Ticket");
    }
}else{
	header("Location: confirmationUser.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Reservation Panel</title>
	<link href="//db.onlinewebfonts.com/c/a4e256ed67403c6ad5d43937ed48a77b?family=Core+Sans+N+W01+35+Light" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="css/form.css" type="text/css">
<style type="text/css">
	table{
		border: 1px solid white;
	}
	tr{
		border: 1px solid white;
	}
	td,th{
		border: 1px solid white;
		padding-top: 5px;
        padding-bottom: 5px;
        padding-left: 15px;
        padding-right: 15px;
	}
	table td a{
		color: white;
	}
</style>
</head>
<body>
	<div id="main">
		<center>
			<table>

				<tr><img width="400px" src="img/mainlogo.png"></tr>
				<tr><p>Your Ticket Has Been Issued From Sunlight Aviation Service LTD.<br>By The Username <?php echo $row['user'] . " in ". $row['dob'] ?></p></tr>
				<tr>
					<td>
						<label>Name : </label>
						<label><?php echo $row['fname']." ".$row['lname'] ?></label>
					</td>
				</tr>
				<tr>
					<td>
						<p>Email : <?php echo $row['email'] ?></p>
					</td>
				</tr>
				<tr>
					<td>
						<p>Plane Name : <?php echo $row['flightNumber'] ?></p>
					</td>
				</tr>
				<tr>
					<td>
						<p>PNR : <?php echo $row['pnr'] ?></p>
					</td>
				</tr>
				<tr>
					<td>
						<p>Date Of Booking : <?php echo $row['dob'] ?></p>
					</td>
				</tr>
				<?php 
					$ll = $row['dest'];
					$sql="SELECT * FROM `sas`.`retlocation` WHERE `id` = '$ll' ";    
				    $result1=  mysqli_query($conn, $sql);
				    if(mysqli_num_rows($result1)>0){
				    	$row1=mysqli_fetch_assoc($result1);
				    }
				?>
				<tr>
					<td>
						<p>From : <?php echo $row1['Name'] ?></p>
					</td>
				</tr>
				<?php 
					$ll2 = $row['depart'];
					$sql="SELECT * FROM `sas`.`location` WHERE `id` = '$ll2' ";    
				    $result2=  mysqli_query($conn, $sql);
				    if(mysqli_num_rows($result2)>0){
				    	$row2=mysqli_fetch_assoc($result2);
				    }
				?>
				<tr>
					<td>
						<p>To : <?php echo $row2['Name'] ?></p>
					</td>
				</tr>
			</table>
			<table style="margin-top: 10px;">
				<tr>
					<td>
						<p>Date Of Departure : <?php echo $row['depDate'] ?></p>
					</td>
					<td>
						<p>Time Of Departure : <?php echo $row['depTime'] ?></p>
					</td>
				</tr>
				<tr>
					<td>
						<p>Date Of Departure : <?php echo $row['retDate'] ?></p>
					</td>
					<td>
						<p>Time Of Departure : <?php echo $row['retTime'] ?></p>
					</td>
				</tr>
			</table>
			<table style="margin-top: 10px;">
				<tr>
					<td>
						<p>Amount : <?php echo $row['amount'] ?></p>
					</td>
				</tr>
			</table>

		</center>
	</div>
	<center><button style="padding: 10px; padding-left: 20px; padding-right: 20px;" onclick="prnt()">Print</button></center>
	<center><a style="color: white; font-size: 50px;" href="confirmationUser.php">Back</a></center>


	<script>
            function prnt(){
                var div="<html><head><style> .hideforpdf{display: none;}td{text-align:center;}table{border: 1px solid black;float: center;}table tr{border: 1px solid black;}table tr td{border: 1px solid black;}table tr th{border: 1px solid black;}</style></head><body>"
                div+=document.getElementById('main').innerHTML;
                div+="</body></html>"
                var win=window.open("", "", "width=960,height=500");
                win.document.write("<center><h1>Customer Ticket</h1></center><br><br>");
                win.document.write(div);
                win.document.write("<br><br><center><p>&copy All Rights Reserved By Legacy</p><p>Developed By Legacy</p></center>");
                win.print();
            }
        </script>

</body>
</html>