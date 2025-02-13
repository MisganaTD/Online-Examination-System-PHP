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
        <li  class="active"><a href="course.php">course</a></li>
        <li><a href="schedule.php">schedule</a></li>
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
        <li><a href="schedule.php">schedule</a></li>
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
          
         
            <table width="97%" height="388" border="0">
              <tr>
                <td width="12%" ><p><a href="course.php">Add Course</a></p>
                <p><a href="manage_course.php">Manage Course</a></p></td>
                <td height="117" colspan="2" >
				<h1 align="center" >Department's Course Registration</h1> </td>
                <td width="11%">				
				</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td colspan="2" height="120">
				<!-- ================================================================================= -->
				<table width="100%" border="1" >
                    <tr>
                      <th>S.No</th>
                      <th align="center">Course Name</th>                      
                      <th>Course Code</th>
                      <th>Credit Hour</th>	
					  <th>Year</th>
					  <th>Semister</th>
					  <th>Edit</th>
					  <th>Delete</th>				                  
                    </tr>
									
                    <?php	
$department = $_SESSION['department'];										
	$con = mysqli_connect ("localhost","root","","online");
//mysqli_select_db("online", $con);
$sql = "SELECT * FROM course where department = '".$department."'";

$result = mysqli_query($con,$sql);
$i = "1";
while($row = mysqli_fetch_array($result))
{
$course=$row['course_title'];
$code=$row['course_code'];
$credit=$row['credit_hour'];
$year=$row['year'];
$semister=$row['semister'];

?>
                    <tr>
                      <td><?php echo $i;?></td>
					  <td><?php echo $course;?></td>
                      <td><?php echo $code?></td>                             
                      <td><?php echo $credit;?></td>
					  <td><?php echo $year;?></td>
					  <td><?php echo $semister;?></td>
					  <td><a href="EditCourse.php?CourseId=<?php echo $code;?>">Edit</a></td>
					  <td><a href="DeleteCourse.php?CourseId=<?php echo $code;?>">Delete</a></td>                      
                    </tr>
                    <?php
					$i++;
}
$records = mysqli_num_rows($result);
if($records == 0)
{
echo "<font color = 'red'>NO COURSE FOUND!</font>";
}
?>

<?php
mysqli_close($con);
?>
                 </table>
				<!-- ================================================================================= -->
				</td>
                <td>&nbsp;</td>
              </tr>
      </table>
   
      
	  
	  
      <!-- ####################################################################################################### -->
    </div>
  </div>
</div>
<!-- ####################################################################################################### -->
 
<!-- ####################################################################################################### -->
<div class="wrapper">
  <div id="copyright" class="clear">
    <p class="fl_left">&copy;  All Rights Reserved - <a href="#">Domain Name</a></p>
    
  </div>
</div>
</body>
</html>
