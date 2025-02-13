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
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="schedule.php">Schedule</a></li>
        <li><a href="exam.php">Exam</a></li>
        <li  class="active"><a href="result.php">Result</a></li>
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
      <!-- ####################################################################################################### -->
                 <table border="0">
              <tr>
                <td width="12%" ><p><a href="result.php">View Result</a></p>
                <p><a href="manage_course.php"></a></p></td>
                <td height="117" colspan="2" >
				<h1 align="center" >Grade Report</h1> </td>
                <td width="11%">				
				</td>
              </tr>
			  </table>		 
			  <table width="100%" border="0" >
					<?php
					//echo $_SESSION['id'];
					
					?>
					<?php
					$con = mysqli_connect ("localhost","root","","online");
				//mysqli_select_db("online", $con);
				//echo $TotalCourses;
				$sql2 = "SELECT * FROM grade where stud_id = '".$_SESSION['id']."'";
				$result = mysqli_query($con,$sql2);
				while($row = mysqli_fetch_array($result))
				{
				$course = $row['course'];
				$grade = $row['grade']; 
			    }
				$gradeFound = mysqli_num_rows($result);
				if($gradeFound > 0)
				{
				?>
				
				<table border="0">

			<tr>
              <td width="17%" height="46">&nbsp;</td>
              <td width="8%">&nbsp;</td>
              <td width="11%">&nbsp;</td>
              <td width="25%">&nbsp;</td>
              <td width="22%">&nbsp;</td>
              <td width="17%">&nbsp;</td>
            </tr>
           <tr>
		   <table border="0">
		   <tr>
		   <th>Course</th>
		   <th>Grade</th>
		   </tr>
		   
		   
		   <tr>
		   <?php
		   }
		   else
		   {
		   echo '<script type="text/javascript">alert("No Grade Found!");window.location=\'result.php\';</script>';
		   }
		   	$sql3 = "SELECT * FROM grade where stud_id = '".$_SESSION['id']."'";
			$result1 = mysqli_query($con,$sql3);
			 while($row1 = mysqli_fetch_array($result1))
				{
			    $course = $row1['course'];
				$grade = $row1['grade'];
		   ?>
		   <td><?php echo $course;?></td>
		   <td><?php echo $grade;?></td>
		   </tr>
		   <?php
				}
		   ?>
		   
		   </table >
		   </tr>
          </table>

			</table>
			  
      <!-- ####################################################################################################### -->
</div>
  </div>
</div>
<!-- ####################################################################################################### -->
 
<!-- ####################################################################################################### -->
<div class="wrapper">
  <div id="copyright" class="clear">
    <p class="fl_left">Copyright &copy; 2021 - All Rights Reserved - <a href="http//:www.HolisticBibleCollege.com">Holistic Bible College</a></p>
    
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
