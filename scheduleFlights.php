<!DOCTYPE html>
<html>
<head>
	<title>Schedule Flights</title>
	<link href="//db.onlinewebfonts.com/c/a4e256ed67403c6ad5d43937ed48a77b?family=Core+Sans+N+W01+35+Light" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" href="css/form.css" type="text/css">

</head>
	<?php include 'header/headerAdmin.php'; ?>

	<center>
		<div class="maintext">
			<div id="flights" style="font-family:Courier; font-size: 15px; border-style: groove;">
						<form action="code/showscheduleCode.php" method="post">
							<input type="text" name="planeName" placeholder="Flight Number" required="">
						<div>
					
							<select id="cmbMake" name="fromLoc"     onchange="document.getElementById('selected_text').value=this.options[this.selectedIndex].text">
									<option value="0" disabled="disabled" selected="selected" id="place">Leaving from...</option>
									<?php
                    
                    $sql="SELECT * FROM `sas`.`location` ORDER BY `Name`";
                    $result=  mysqli_query($conn, $sql);
                    if(mysqli_num_rows($result)){
                        while ($row=mysqli_fetch_assoc($result)){
                ?>
									<option value="<?php echo $row['id']; ?>"><?php echo$row['Name']; ?></option>
									<?php                                      
                        }
                    }
                    mysqli_close();
                ?>
							</select>
							<select id="cmbMake" name="toLoc"     onchange="document.getElementById('selected_text1').value=this.options[this.selectedIndex].text">
									<option value="0" disabled="disabled" selected="selected" id="place">Going to...</option>
									<?php
                    
                    $sql="SELECT * FROM `sas`.`retlocation` ORDER BY `Name`";
                    $result=  mysqli_query($conn, $sql);
                    if(mysqli_num_rows($result)){
                        while ($row=mysqli_fetch_assoc($result)){
                ?>
									<option value="<?php echo $row['id']; ?>"><?php echo$row['Name']; ?></option>
									<?php                                      
                        }
                    }
                    mysqli_close();
                ?>
							</select>
						
						</div></br>
						
						<p><label style="display: solid block" id="label0" class="ftext">Depart Date:</label>
						<input type="text" id="datepicker1" name="depart_date" placeholder="month/day/year" /></p>

                        <p><label style="display: solid block" id="label0" class="ftext">Depart Time:</label>
                        <input type="Time" required="" name="depart_time" placeholder="month/day/year" /></p>


						<p><label style="display:solid block" id="label1" class="ftext" >Return Date:</label>
						<input type="text" id="datepicker" name="return_date" placeholder="month/day/year" /></p>

                        <p><label style="display: solid block" id="label0" class="ftext">Return Time:</label>
                        <input required="" type="Time" name="return_time" placeholder="month/day/year" /></p>
                        <p><label style="display: solid block" id="label0" class="ftext">Total Seat:</label>
                        <input required="" type="text" name="seat" placeholder="Total Seat" maxlength="20" /></p>

						<p class="ftext" id="dateIn"></p>


						<input  class="search"  style="background-color: #34495e" type="submit" name="search" id="find" value="Fixed Schedule"/>
						</form>
					</div>
				</div>
	</center>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<body>
  <script>

  $(document).ready(function() {
  $("#datepicker").datepicker({ dateFormat: 'yy/mm/dd' });
  });

  $(document).ready(function() {
  $("#datepicker1").datepicker({ dateFormat: 'yy/mm/dd' });
  });

$(document).ready(function () {
    var selector = function (dateStr) {
            var d1 = $('#datepicker').datepicker('getDate');
            var d2 = $('#datepicker1').datepicker('getDate');
            var diff = 0;
                diff = Math.floor((d2.getTime() - d1.getTime()) / 86400000); // ms per day
            if (diff>0) {
            	$('#dateIn').show();
            	$('#dateIn').text("Return Date Is Behind");
            	$('#find').hide();
            }else if(diff<=0){
            	$('#find').show();
            	$('#dateIn').hide();
            }
        }
    $('#datepicker,#datepicker1').change(selector)
});

  </script>
</body>
</html>