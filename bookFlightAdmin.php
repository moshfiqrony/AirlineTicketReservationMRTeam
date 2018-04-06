<?php include 'header/headerAdmin.php';?>
<!Doctype html>
<html>
<title>Search Flight</title>
<head>
  <link rel="stylesheet" type="text/css" href="css/style.css">

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
	
</body>
<?php include 'footer.php';?>
</html>
