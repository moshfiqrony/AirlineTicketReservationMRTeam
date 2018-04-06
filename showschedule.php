<!DOCTYPE html>
<html>
<head>
	<title>Schedule List</title>
	<link href="//db.onlinewebfonts.com/c/a4e256ed67403c6ad5d43937ed48a77b?family=Core+Sans+N+W01+35+Light" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="css/form.css" type="text/css">
<style type="text/css">
	table{
		border: 1px solid white;
	}
	tr{
		border: 1px solid white;
	}
	td{
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
	<?php include 'header/headerAdmin.php'; ?>

	<center>
		<h1>Schedule List</h1>
		<table>
			<tr>
				<td>
					<label>Serial</label>
				</td>
				<td>
					<label>Flight Number</label>
				</td>
				<td>
					<label>Departure Location</label>
				</td>
				<td>
					<label>Destination Location</label>
				</td>
				<td>
					<label>Departure Date</label>
				</td>
				<td>
					<label>Departure Time</label>
				</td>

				<td>
					<label>Return Date</label>
				</td>
				<td>
					<label>Return Time</label>
				</td>
				<td>
					<label>Action</label>
				</td>
			</tr>
			<?php
                    
                    $sql="SELECT `schedule`.`id`,`schedule`.`fromLoc`, `schedule`.`toLoc`,`schedule`.`planeName`, `location`.`Name` as `loc`, `schedule`.`depDate` , `retlocation`.`Name` as `retloc`, `schedule`.`retDate`, `schedule`.`retTime`, `schedule`.`depTime` FROM `sas`.`schedule` INNER JOIN `location` ON `schedule`.`fromLoc` = `location`.`id` INNER JOIN `retlocation` ON `schedule`.`toLoc` = `retlocation`.`id`";
                    $result=  mysqli_query($conn, $sql);
                    $sl = 1;
                    if(mysqli_num_rows($result)){
                        while ($row=mysqli_fetch_assoc($result)){
                ?>
                <tr>
                	<td>
                        <?php echo $sl++;?>
                    </td>
                    <td>
                        <?php echo $row['planeName'];?>
                    </td>
                    <td>
                        <?php echo $row['loc'];?>
                    </td>
                    <td>
                        <?php echo $row['retloc'];?>
                    </td>
                    <td>
                        <?php echo $row['depDate'];?>
                    </td>
                    <td>
                        <?php echo $row['depTime'];?>
                    </td>
                    <td>
                        <?php echo $row['retDate'];?>
                    </td>
                    <td>
                        <?php echo $row['retTime'];?>
                    </td>
                    <td class="hideforpdf">
                        <a href="deleteShcedule.php?id=<?php echo $row['id'];?>">Delete</a>

                    </td>
                    
                </tr>
                <?php                                      
                        }
                    }
                ?>
		</table>
	</center>


<body>

</body>
</html>