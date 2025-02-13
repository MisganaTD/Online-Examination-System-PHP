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
	  <form name="form1" id="form1" method="post" action="Insert_event.php">
      <table width="200" border="0">
	  <tr>
	  <td width="15%" height="92">
			  
			  <p><a href="schedule.php">Add New Event</a></p>
		      <p><a href="post_schedule.php">Event Schedule</a></p>
		      <p><a href="ExamSchedule.php">Exam Schedule</a></p>
		      <p><a href="manage_schedule.php">Manage Schedule</a></p></td>
			<td><div align="justify"><u> </u>
		      </div></td>
	  </tr>
            <tr>
              <td width="15%" height="210"> </td>
              <td width="85%">
			  <!-- ================================================================================================== -->
			  
			  <table width="100%" border="1" >
                    <tr>
                      <th>S.No</th>
                      <th align="center">Exam Course</th>                      
                      <th>Exam Date</th>
					  <th>Exam Term</th>
                      <th>Year</th>	
					  <th>Edit</th>
					  <th>Delete</th>				                  
                    </tr>
									
                    <?php	
										
	$con = mysqli_connect ("localhost","root","","online");
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
?>
                    <tr>
                      <td><?php echo $i;?></td>
					  <td><?php echo $examCourse;?></td>
                      <td><?php echo $examDate?></td>  
                      <td><?php echo $term;?></td>					  
                      <td><?php echo $year;?></td>
					  <td><a href="EditSchedule.php?SchId=<?php echo $examCourse;?>">Edit</a></td>
					  <td><a href="DeleteSchedule.php?SchId=<?php echo $examCourse;?>">Delete</a></td>                      
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
			  
			  <!-- ================================================================================================== -->
			  </td>
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
