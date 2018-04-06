<?php include 'header/userheader.php';?>
<!Doctype html>
<html>
<title>Search Flight</title>
<head>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <style type="text/css">
	table{
		border: 1px solid white;
	}
	tr{
		border: 1px solid white;
	}
	td, th{
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

<body style="background-color: #34495e">
	<center>
		<h1 style="color: white;">
			<?php if(isset( $_GET['confirm'] )){
				echo $_GET['confirm'];
			}?>
		</h1>
        <h1 style="color: white;">
            PNR Number =
            <?php if( $_GET['pnr'] ){
                echo $_GET['pnr'];
            }?>
        </h1>
	</center>
	<center>
		<h1 style="color: white;">Please Do Payment Now</h1>
		<table>
			<tr>
				<td><p style="color: white;">1. BKash</p></td>
				<td><p style="color: white;">Send Your Payment To 01722667722<br>
						Now SMS Us The Transaction ID, PNR<br>
						Format (Your_Name)(space)(Transaction ID)(space)(PNR) 
						</p></td>
			</tr>
			<tr>
				<td><p style="color: white;">1. DBBL</p></td>
				<td><p style="color: white;">Send Your Payment To AC = 14710524158<br>
						Now SMS Us The Transaction ID, PNR<br>
						Format (Your_Name)(space)(Transaction ID)(space)(PNR) 
						</p></td>
			</tr>
			<tr>
				<td><p style="color: white;">1. BRAC Bank</p></td>
				<td><p style="color: white;">Send Your Payment To AC = 14725484158<br>
						Now SMS Us The Transaction ID, PNR<br>
						Format (Your_Name)(space)(Transaction ID)(space)(PNR) 
						</p></td>
			</tr>
		</table>
	</center>
</body>
<?php include 'footer.php';?>
</html>
