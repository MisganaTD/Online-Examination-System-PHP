<?php
if (!isset($_SESSION)) 
{
  session_start();
  
}
if(isset($_SESSION['email']))
{
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">
<head profile="http://gmpg.org/xfn/11">
<title>Online Examination</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="imagetoolbar" content="no" />
<link rel="stylesheet" href="styles/layout.css" type="text/css" />
<script type="text/javascript"> 
function display_c(start){
window.start = parseFloat(start);
var end = 0 // change this to stop the counter at a higher value
var refresh=1000; // Refresh rate in milli seconds
if(window.start >= end ){
mytime=setTimeout('display_ct()',refresh)
}
else {alert("Time Over ");}
}

function display_ct() {
// Calculate the number of days left
var days=Math.floor(window.start / 86400); 
// After deducting the days calculate the number of hours left
var hours = Math.floor((window.start - (days * 86400 ))/3600)
// After days and hours , how many minutes are left 
var minutes = Math.floor((window.start - (days * 86400 ) - (hours *3600 ))/60)
// Finally how many seconds left after removing days, hours and minutes. 
var secs = Math.floor((window.start - (days * 86400 ) - (hours *3600 ) - (minutes*60)))

var x = window.start + "(" + days + " Days " + hours + " Hours " + minutes + " Minutes and " + secs + " Secondes " + ")";


document.getElementById('ct').innerHTML = x;
window.start= window.start- 1;

tt=display_c(window.start);
}
</script>
</head>
<body id="top" onload=display_c(86501);>
<span id='ct' style="background-color: #FFFF00"></span>
<div class="wrapper row1">
  <div id="header" class="clear">
    <div class="fl_left">
      <h1><a href="index.html">Holistic Bible College</a></h1>
      <p>ONLINE EXAMINATION SYSTEM FOR DISTANCE LEARNERS</p>
    </div>
    <div align="right" class="fl_right">
      <ul>
        
        <li class="last"> <a href="logout.php">Logout</a></li>
      </ul>
      
    </div>
	
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper row2">
  <div class="rnd">
    <!-- ###### -->
    <div id="topnav">
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="schedule.php">Schedule</a></li>
        <li><a href="exam.php">Exam</a></li>
        <li><a href="result.php">Result</a></li>
        <li><a href="downloads.php">Downloads</a></li>
		<?php
					
	$con = mysqli_connect ("localhost","root","","online");
//mysqli_select_db("online", $con);

$sql = "SELECT * FROM links where linkName = 'Course Registration'";
$result = mysqli_query($con,$sql);
$records = 0;
while($row = mysqli_fetch_array($result))
{
$linkName=$row['linkName'];
$status=$row['status'];
}
mysqli_close($con);
?>
		  <?php
		  if($status == 'Inactive')
		  {
		  ?>
		  <li><a href="#">Registration</a></li>
		  <?php
		  }
		  else
		  {
		  ?>
          <li><a href="course_registration.php">Registration</a></li>
		  <?php
		  }
		  ?>
		  
        
      </ul>
    </div>
    <!-- ###### -->
  </div>
</div>

<!-- ####################################################################################################### -->
<div class="wrapper row3">
  <div class="rnd">
    <div id="container" class="clear">
      <table width="200" height="303" border="0">
        <tr>
          <td>&nbsp;</td>
        </tr>
      </table>
      <!-- ####################################################################################################### -->
      
      <!-- ####################################################################################################### -->
</div>
  </div>
</div>
<!-- ####################################################################################################### -->
 
<!-- ####################################################################################################### -->
<div class="wrapper">
  <div id="copyright" class="clear">
   <p class="fl_left">&copy;All Rights Reserved - <a href="http//:www.HolisticBibleCollege.com">Holistic Bible College</a></p>
    
  </div>
</div>

</body>
</html>

<?php
}
else{
$logoutGoTo = "../index.php";
header("Location: $logoutGoTo");
}
?>