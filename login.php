<?php 
include 'header/headerlog.php';
 ?>
<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel="stylesheet" href="css/style1.css">
</head>

<body style="background-color: #34495e">

  	

<form action="code/loginCode.php" method="post">
  <h2>Login</h2>
		<p>
			<label for="uname" class="floatLabel">Username</label>
			<input id="uname" name="uname" type="text" required="">
		</p>
		<p>
			<label for="password" class="floatLabel">Password</label>
			<input id="password" name="password" type="password" required="">
		</p>
		<center><select id = "cmbMake" name = "Make" required>
			<option  value = "" id = "place">Select Users</option>
			<option value = "1">Admin</option>
			<option value = "2">User</option>
		</select></center>
		<p>
			<input type="submit" value="Login" id="submit">
		</p>
	</form>
<?php include 'footer.php'; ?>
</body>
</html>
