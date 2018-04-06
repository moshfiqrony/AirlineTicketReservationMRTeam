<?php include 'header/userheader.php';?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="./css/headercss.css">
	<link rel="stylesheet" type="text/css" href="scss/letter.css">
  <style type="text/css">
    .mar{
      margin-top: 50px;

    }
    .wlcmAdmin{
      color: white;
      font-size: 30px;
      text-align: center;
      text-shadow: 0 0 8px black;
    }
    .datemar{
      margin-top: -25px;
    }
    .wlcmdate{
      color: white;
      font-size: 20px;
      text-align: center;
      text-shadow: 0 0 8px black;
    }
    .wlcmtime{
      color: white;
      font-size: 15px;
      text-align: center;
      text-shadow: 0 0 8px black;
    }
    .nnn {
    display: block;
    color: #34495e;
    text-align: center;
    padding: 5px 5px;
    text-decoration: none;
    background-color: #F9F9FA;
    border: 1px solid;
    border-radius: 10px;
}

  </style>
</head>
<body style="background-color: #34495e;">


<!-- welcome user and show date time -->
<center><table>
  <tr>
    <td>
      <h3 class="wlcmAdmin">Hello <?php date_default_timezone_set('Asia/Dhaka'); echo $_SESSION['username'];?> Welcome to your panel</h3><br>
      <p class="wlcmdate datemar">Today is <?php echo date("l jS \of F Y")?></p><br>
      <p class="wlcmtime datemar">Server Time <?php echo date("h:i:sa"); ?></p><br>
    </td>
  </tr>
</table>
<table>
  <tr>
    <td "><h2 style="color: Red">New Notification</h2></td>
  </tr>
  <?php 
    $user = $_SESSION['username'];
      $sql="SELECT * FROM `notification` where `user` = '$user' AND `userPriority` = '0'";
      $result=  mysqli_query($conn, $sql);
      if(mysqli_num_rows($result)){
                        while ($row=mysqli_fetch_assoc($result)){
    ?>

  <tr>
    <td>
      <p style="color: white"><?php echo $row['sms'];?></p>
    </td>
    <td>
      <a class="nnn" href="markRead.php?id=<?php echo $row['id']?>">Mark As Read</a>
    </td>
  </tr>


  <?php }}?>

  </table>

  <table>
    <tr>
    <td "><h2 style="color: Red">Old Notification</h2></td>
  </tr>
  <?php 
    $user = $_SESSION['username'];
      $sql="SELECT * FROM `notification` where `user` = '$user' AND `userPriority` = '1'";
      $result=  mysqli_query($conn, $sql);
      if(mysqli_num_rows($result)){
                        while ($row=mysqli_fetch_assoc($result)){
    ?>

  <tr style="">
    <td>
      <p style="color: white"><?php echo $row['sms'];?></p>
    </td>

  </tr>

  
  <?php }}?>
</table></center>
</ul>
</div>
</body>
<?php include 'footer.php'; ?>
</html>