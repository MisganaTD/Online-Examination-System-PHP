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
<script type="text/javascript" src="date.js" ></script>
<script language="javascript" type="text/javascript" src="datetimepicker.js">
</script>
<script type="text/javascript" src="validate.js" ></script>
</head>
<!--======================================================================================================================================================= -->

<!--======================================================================================================================================================= -->
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
	  
      <table width="200" border="0">
	  <tr>
	  <td width="15%" height="92">
			  
			  <p><a href="schedule.php">Add New Event</a></p>
		      <p><a href="post_schedule.php">Event  Schedule</a></p>
		      <p><a href="ExamSchedule.php">Exam Schedule</a></p>
		      <p><a href="manage_schedule.php">Manage Schedule</a></p></td>
			<td><div align="justify"><u>Post Event Schedule </u>
	        </div></td>
	  </tr>
            <tr>
			<form name="form1" method="post" action="Insert_schedule.php" id="validateCourse" onsubmit="return validateEventSchedule('validateCourse');">
              <td width="15%" height="210"> </td>
              <td width="85%">
                <p align="left">Event:
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;<?php
				$con = mysqli_connect ("localhost","root","","online");
            //mysqli_select_db("online", $con);
			?>
			<?php $event= mysqli_query($con,"select * from event"); ?>

             <select name="cmbEvent">
             <?php while($result= mysqli_fetch_assoc($event))
                         { ?>
                    <option>
                    <?php echo $result['event']?>
                    </option>
                    <?php }?>
                    </select>
                </p>
				
                <p align="left">Start Date:                 
                  <input type="text" name="strtDate" readonly id="strtDate"><a href="javascript:NewCal('strtDate','ddmmyyyy',false,24)"><img src="cal.gif" width="16" height="16" border="0" alt="Pick a date"></a>
                </p>
                <p align="left">End Date:
                  &nbsp;&nbsp;<input type="text" name="endDate" readonly id="endDate"/><a href="javascript:NewCal('endDate','ddmmyyyy',false,24)"><img src="cal.gif" width="16" height="16" border="0" alt="Pick a date"></a>
                &nbsp;&nbsp;&nbsp;</p>
                <p align="left">&nbsp;
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				  <input name="Add" type="submit" id="Add" value="Add" />
                </p>
                <p align="center">&nbsp;			    </p></td>
            </tr>
          </table>
	  </form>	
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
