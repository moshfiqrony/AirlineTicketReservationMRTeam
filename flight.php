<?php include 'header/userheader.php'; ?>

<!Doctype html>
<html>
<title>Search Flight</title>
<head>
  <link rel="stylesheet" type="text/css" href="css/style.css">

</head>

<body style="background-color: #34495e">
<div class="maintext">

<!-- Code for trip submission -->

      <div id="flights" style="font-family:Courier; font-size: 15px; border-style: groove;">
        <h1 class="ftext">Select Your Trip Type</h1>
            <select id="trip" name="trip">
              <option value="0" disabled="" selected="">Select</option>
              <option value="1">Round Trip</option>
              <option value="2">One Way</option>
            </select>

<div id="twoWay">
  <!-- Code for two way -->
          <form action="searchFlight.php" method="get">
            <div></br>

<!-- Fetching Location -->

              <select required="" id="cmbMake" name="DepLoc">
                  <option value=""  id="place">Leaving from...</option>
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

<!-- Fetching  return Location -->

              </select>
              <select required="" id="cmbMake" name="RechLoc">
                  <option value=""  id="place">Going to...</option>
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
            
            <p><label style="display: solid block" id="label0" class="ftext">Depart date:</label>
            <input required="" type="text" name="depart_date" id="datepicker1"  placeholder="month/day/year" /></p>
            <p><label style="display:solid block" id="label1" class="ftext" >Return date:</label>
            <input required="" type="text" name="return_date" id="datepicker" placeholder="month/day/year" /></p>
          </br>
          <p class="ftext" id="dateIn"></p>
            <input  class="search"  style="background-color: #34495e" type="submit" name="searchTwo" id="find" value="Search Flights"/>
            </form>
</div>

<!-- Code for One way -->
          <form id="oneWay" action="searchFlight.php" method="get">
            <div></br>

<!-- Fetching Location -->

              <select id="cmbMake" name="DepLoc" required>
                  <option value="" id="place">Leaving from...</option>
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

<!-- Fetching  return Location -->

              </select>
              <select id="cmbMake" name="RechLoc" required>
                  <option value="" id="place">Going to...</option>
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
            
            <p><label style="display: solid block" id="label0" class="ftext">Date:</label>
            <input required="" type="text" id="datepicker3" name="depart_date"  placeholder="month/day/year" /></p>
          </br>
            <input required="" class="search"  style="background-color: #34495e" type="submit" name="searchOne" id="find" value="Search Flights"/>
            </form>
</body>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

<script>

  $(document).ready(function() {
  $("#datepicker").datepicker({ dateFormat: 'yy-mm-dd' });
  });

  $(document).ready(function() {
  $("#datepicker1").datepicker({ dateFormat: 'yy-mm-dd' });
  });
  $(document).ready(function() {
  $("#datepicker3").datepicker({ dateFormat: 'yy-mm-dd' });
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

$(document).ready(function () {
    var selector = function () {
            if($("#trip option:selected").text() == "Round Trip"){
              $("#twoWay").show();
              $("#oneWay").hide();
            }else if($("#trip option:selected").text() == "One Way"){
              $("#oneWay").show();
              $("#twoWay").hide();
            }
        }
    $("#trip").change(selector)
});
$(document).ready(function () {
    $("#oneWay").hide();
    $("#twoWay").hide();
});

  </script>

</html>