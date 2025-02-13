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
        <li><a href="schedule.php">schedule</a></li>
        <li><a href="exam.php">exam</a></li>
        <li><a href="response.php">Grade</a></li>
		<li  class="active"><a href="management.php">Teachers</a></li>
        
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
      <form method="post" action="" id="validateCourse" onsubmit="return validateTeacher('validateCourse');">
	  
	  <table width="200" height="400" border="0">
        <tr>
          <td height="116"><p><a href="management.php">Add Teacher</a></p>
            <p><a href="AssignCourse.php">Assign Course</a></p>
            <p><a href="DeleteTeacher.php">Delete Teacher</a></p></td>
        </tr>
        <tr>
          <td height="192"><table border="0">
            <tr>
			<?php
			//echo "The time is " . date("h:i");
			//echo "\ " .strtotime(date("h:i:s"));
			?>
              <td width="17%" height="46">&nbsp;</td>
              <td width="8%">&nbsp;</td>
              <td width="11%">Teacher Name: </td>
              <td width="25%">
                <input name="name" type="text" size="34" />
              </td>
              <td width="22%">&nbsp;</td>
              <td width="17%">&nbsp;</td>
            </tr>
            <tr>
              <td height="39">&nbsp;</td>
              <td>&nbsp;</td>
              <td>User Name: </td>
              <td><input name="username" type="text" size="34" /></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td height="39">&nbsp;</td>
              <td>&nbsp;</td>
              <td>Password:</td>
              <td><input name="password" type="password" size="34" /></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
			  <td height="39">&nbsp;</td>
              <td>&nbsp;</td>
              <td>Confirm Password:</td>
              <td><input name="confirm" type="password" size="34" /></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td height="43">&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td><input type="submit" name="Submit" value="Add Teacher" /></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td height="76">&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
          </table></td>
        </tr>
      </table>
	  </form>
	  <?php
	  if(isset($_POST['Submit']))
	  {
	  
	$name=$_POST['name'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	
	$department= $_SESSION['department'];			
	$con = mysqli_connect ("localhost","root","","online");	
	//mysqli_select_db("online", $con);
	//-----------------------------------------------------
				$sql1 = "SELECT * FROM teachers where name = '".$name."'";
$result = mysqli_query($con,$sql1);
while($row = mysqli_fetch_array($result))
{
$ExistedEvent = $row['name'];
} 
$events = mysqli_num_rows($result);
if($events > 0)
{
echo '<script type="text/javascript">alert("Teacher Already Exist!");</script>';
}
else if($events == 0)
  {

	//-----------------------------------------------------
	$sql = "insert into teachers(name,department,username,password) values('".$name."','".$department."','".$username."','".$password."')";
	mysqli_query ($con,$sql);
	mysqli_close ($con);
	echo '<script type="text/javascript">alert("Teacher Added!");window.location=\'management.php\';</script>';
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
