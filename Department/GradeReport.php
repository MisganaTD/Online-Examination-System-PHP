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
        <li><a href="schedule.php">schedule</a></li>
        <li><a href="exam.php">exam</a></li>
        <li  class="active"><a href="response.php">Grade</a></li>
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
        <li  class="active"><a href="response.php">Grade</a></li>
        
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
		        <div id="right_column">
          <div class="holder">
            <h2 align="center">Student Grade Report</h2>
			<p><a href="grading.php">Grade</a></p>
			<p><a href="GradeRange.php">Add Grade Range</a></p>  
			<p><a href="response.php">Grade Report</a></p>    
          </div>
        </div>
      <!-- ####################################################################################################### -->
          <form name="form1" id="form1" method="post" action="">
            <table width="97%" height="349" border="0">
              <tr>
                <td width="82%" height="68">
             </td>
                <td width="18%">
						  
				</td>
              </tr>
              <tr>
                <td colspan="2" height="247">
				<?php
		$Id=$_GET['SchId'];
					$con = mysqli_connect ("localhost","root","","online");
//mysqli_select_db("online", $con);
$sql = "SELECT * FROM available_students where id = '".$Id."'";
$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result))
{
$myName = $row['name'];
$_SESSION['yearof'] = $row['class_year'];
$_SESSION['semisterof'] = $row['semister']; 
} 
mysqli_close($con);
	$con = mysqli_connect ("localhost","root","","online");
//mysqli_select_db("online", $con);
$sql = "SELECT * FROM course where department = '".$_SESSION['department']."' AND year = '".$_SESSION['yearof']."' AND semister = '".$_SESSION['semisterof']."'";
$result = mysqli_query($con,$sql);
$TotalCourses = mysqli_num_rows($result);
//echo $TotalCourses;
mysqli_close($con);

				?>
				<?php
					$con = mysqli_connect ("localhost","root","","online");
				//mysqli_select_db("online", $con);
				//echo $TotalCourses;
				$sql2 = "SELECT * FROM grade where stud_id = '".$Id."'";
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
              <td width="11%">Student Name: </td>
              <td width="25%"><strong>
                <?php echo $myName;?>
				</strong>
              </td>
              <td width="22%">&nbsp;</td>
              <td width="17%">&nbsp;</td>
            </tr>
			
			<tr>
              <td width="17%" height="46">&nbsp;</td>
              <td width="8%">&nbsp;</td>
              <td width="11%">Student Id: </td>
              <td width="25%"><strong>
                <?php echo $Id;?>
				</strong>				
              </td>
              <td width="22%">&nbsp;</td>
              <td width="17%">&nbsp;</td>
            </tr>
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
		   echo '<script type="text/javascript">alert("No Grade Found For This Student!");window.location=\'response.php\';</script>';
		   }
		   
		   	$sql3 = "SELECT * FROM grade where stud_id = '".$Id."'";
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
				<?php
                
				
				?>
				</td>
                <td></td>
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
