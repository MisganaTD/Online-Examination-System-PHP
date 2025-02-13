<?php
if (!isset($_SESSION)) 
{
  session_start();
  
}
if(isset($_SESSION['department']))
{
?>


<?php
}
else{
$logoutGoTo = "../index.php";
header("Location: $logoutGoTo");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">
<head profile="http://gmpg.org/xfn/11">
<title>Online Examination</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="imagetoolbar" content="no" />
<link rel="stylesheet" href="styles/layout.css" type="text/css" />
<script type="text/javascript" src="validate.js" ></script>
</head>
<body id="top">
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
      <?php
	$userType = $_SESSION['type'];
	if($userType == 'head')
	{
	?>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="students.php">Students</a></li>
        <li><a href="course.php">course</a></li>
        <li  class="active"><a href="schedule.php">schedule</a></li>
        <li><a href="exam.php">exam</a></li>
        <li><a href="response.php">Grade</a></li>
		<li><a href="management.php">Teachers</a></li>
        
      </ul>
	  <?php
	  }
	  else if ($userType == 'teacher')
	  {
	  ?>
	   <ul>
        <li><a href="index.php">Home</a></li>
        <li  class="active"><a href="schedule.php">schedule</a></li>
        <li><a href="exam.php">exam</a></li>
        <li><a href="response.php">Grade</a></li>
        
      </ul>
	  <?php
	  }
	  ?>
    </div>
    <!-- ###### -->
  </div>
</div>

<!-- ####################################################################################################### -->
<div class="wrapper row3">
  <div class="rnd">
    <div id="container" class="clear">
      <!-- ####################################################################################################### -->
	  <form name="form1" method="post" action="" id="validateCourse" onsubmit="return validateEvent('validateCourse');">
      <table width="200" border="0">
	  <tr>
	  <td width="15%" height="92">
			  
			  <p><a href="schedule.php">Add New Event</a></p>
		      <p><a href="post_schedule.php">Event Schedule</a></p>
		      <p><a href="ExamSchedule.php">Exam Schedule</a></p>
		      <p><a href="manage_schedule.php">Manage Schedule</a></p></td>
			<td><div align="justify"><u> Add New Events
                    </u>
		      </div></td>
	  </tr>
            <tr>
              <td width="15%" height="210"> </td>
              <td width="85%">
                <p align="justify">Event:
                <input type="text" name="txtEvent" onkeyup="isalpha(this)" />
                &nbsp;&nbsp;&nbsp;</p>
                <p align="justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <input type="submit" name="Submit" value="Submit" />
                </p>
                <p align="center">&nbsp;			    </p></td>
            </tr>
          </table>
	  </form>	
	  <?php
	  if(isset($_POST['Submit']))
	  {
	  $event=$_POST['txtEvent'];			
	$con = mysqli_connect ("localhost","root","","online");	
	//mysqli_select_db("online", $con);
	//--------------------------------------------------------------------------
		$sql1 = "SELECT * FROM event where event = '".$event."'";
$result = mysqli_query($con,$sql1);
while($row = mysqli_fetch_array($result))
{
$ExistedEvent = $row['event'];
} 
$events = mysqli_num_rows($result);
if($events > 0)
{
echo '<script type="text/javascript">alert("Event Existed!");</script>';
}
else if($events == 0)
  {
	//--------------------------------------------------------------------------
	$sql = "insert into event  values('".$event."')";
	mysqli_query ($con,$sql);
	mysqli_close ($con);
	echo '<script type="text/javascript">alert("Event Added!");window.location=\'schedule.php\';</script>';


	}  
	  }
	  ?>
      <!-- ####################################################################################################### -->
    </div>
  </div>
</div>
<!-- ####################################################################################################### -->
 
<!-- ####################################################################################################### -->
<div class="wrapper">
  <div id="copyright" class="clear">
    <p class="fl_left">&copy;  All Rights Reserved - <a href="http//:www.HolisticBibleCollege.com">Holistic Bible College</a></p>
    
  </div>
</div>
</body>
</html>
