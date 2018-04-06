<!DOCTYPE html>
<html>
<head>
	<title>User List</title>
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
		<h1>User List</h1>
		<table>
			<tr>
				<td>
					<label>Serial</label>
				</td>
				<td>
					<label>Name</label>
				</td>
				<td>
					<label>User Name</label>
				</td>
				<td>
					<label>Email</label>
				</td>
				<td>
					<label>Password</label>
				</td>
				<td>
					<label>Action</label>
				</td>
			</tr>
			<?php
                    
                    $sql="SELECT * FROM `sas`.`customer` ORDER BY `cus_id`";
                    $result=  mysqli_query($conn, $sql);
                    if(mysqli_num_rows($result)){
                        while ($row=mysqli_fetch_assoc($result)){
                ?>
                <tr>
                	<td>
                        <?php echo $row['cus_id'];?>
                    </td>
                    <td>
                        <?php echo $row['cus_first_name']." ".$row['cus_last_name'];?>
                    </td>
                    <td>
                        <?php echo $row['cus_user_name'];?>
                    </td>
                    <td>
                        <?php echo $row['email'];?>
                    </td>
                    <td>
                        <?php echo $row['cus_pass'];?>
                    </td>
                    <td class="hideforpdf">
                        <a href="edit_st.php?id=<?php echo $row['cus_id']?>">Edit</a>/<a href="delete_st.php?id=<?php echo $row['cus_id']?>">Delete</a>
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