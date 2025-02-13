<?php
if (!isset($_SESSION)) 
{
  session_start();
  
}
if(isset($_SESSION['email']))
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
<script language="javascript" type="text/javascript" src="datetimepicker.js">
</script>
</head>
<body id="top">
<div class="wrapper row1">
  <div id="header" class="clear">
    <div class="fl_left">
      <h1><a href="index.php">Holistic Bible College</a></h1>
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
        <li  class="active"><a href="schedule.php">Schedule</a></li>
        <li><a href="exam.php">Exam</a></li>
        <li><a href="result.php">Result</a></li>
        <li><a href="downloads.php">Downloads</a></li>
		<?php			
$con = mysqli_connect("localhost","root","","online");
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
      <!-- ####################################################################################################### -->
          
      <table width="200" height="206" border="0">
           <tr align="right">
             <td><form name="form1" id="form1" method="post" action="schedul.php">
			 <p align="center"> Search schedule by specific date:</p>
			 <p align="center">Date:&nbsp;&nbsp;<input type="text" name="txtSearch" id="strtDate" readonly /><a href="javascript:NewCal('strtDate','ddmmyyyy',false,24)"><img src="cal.gif" width="16" height="16" border="0" alt="Pick a date"></a>

	           &nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="search" value="Search" />		   
	           </form>
			 <p align="center">&nbsp; </p></td>
           </tr>
		   <!-- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
		  
			  <table width="100%" border="1" >
                    <tr>
                      <th>S.No</th>
                      <th align="center">Exam Course</th>  
                      <th>Exam Term</th>					  
                      <th>Exam Date</th>	
					  <th>Exam Time</th>
					  
                    </tr>
									
                    <?php	
										
$con = mysqli_connect("localhost","root","","online");
//mysqli_select_db("online", $con);
$sql = "SELECT * FROM examschedule where department = '".$_SESSION['department']."'";

$result = mysqli_query($con,$sql);
// Loop through each records 
$i = "1";
while($row = mysqli_fetch_array($result))
{
$examCourse=$row['examCourse'];
$examDate=$row['examDate'];
$year=$row['year'];
$term=$row['examTerm'];
$time=$row['examTime'];


?>
                    <tr>
                      <td><?php echo $i;?></td>
					  <td><?php echo $examCourse;?></td>
					  <td><?php echo $term;?></td>
                      <td><?php echo $examDate?></td>    
					  <td><?php echo $time?></td> 
					  
                    </tr>
                    <?php
					$i++;
}
$records = mysqli_num_rows($result);
if($records == 0)
{
echo "<font color = 'red'>NO SCHEDULE FOUND!</font>";
}
?>

<?php
mysqli_close($con);
?>
                 </table>
			  
		   <!-- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
		   <!-- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
		   
                 </table>
		   <!-- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
      </table>  
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
