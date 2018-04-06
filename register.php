<?php  
include 'header/headerlog.php';
?>

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Registration</title>
  <link rel="stylesheet" type="text/css" href="css/style1.css">
</head>

<body style="background-color: #34495e">

  	

<form action="code/regCode.php" method="post">
  <h2>Register</h2>
 		 <p>
			<label for="Name" class="floatLabel">First Name</label>
			<input id="fname" name="fname" type="text" required="">
		</p>
		<p>
			<label for="Name" class="floatLabel">Last Name</label>
			<input id="lname" name="lname" type="text" required="">
		</p>
		<p>
			<label for="Name" class="floatLabel">Username</label>
			<input id="uname" name="uname" type="text" required="">
		</p>
		<p>
			<label for="Email" class="floatLabel">Email</label>
			<input id="Email" name="Email" type="text">
		</p>
		<p>
			<label for="password" class="floatLabel">Password</label>
			<input id="password" name="password" type="password" required="">
			<span>Enter a password longer than 8 characters</span>
		</p>
		<p>
			<label for="confirm_password" class="floatLabel">Confirm Password</label>
			<input id="confirm_password" name="confirm_password" type="password" required="">
			<span>Your passwords do not match</span>
		</p>

		<p>
			<input type="submit" name="submit" value="Create My Account" id="submit">
		</p>
	</form>
	  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
	  <script  src="js/index.js"></script>
</body>

</html>
