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
          
      <table width="97%" height="300" border="0">
        <tr>
          <td width="82%" height="168" colspan="2"> <h1 align="center">Course Information</h1> </td>
          <td width="18%"></td>
        </tr>
        <tr>
          <td colspan="2" height="120">
		  <?php
$Id=$_GET['CourseId'];
	$con = mysqli_connect ("localhost","root","","online");
//mysqli_select_db("online", $con);
$sql = "select * from course where course_code='".$Id."'";
$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result))
{
$CourseId=$row['course_code'];
$name=$row['course_title'];
$credit=$row['credit_hour'];
$year=$row['year'];
$semister=$row['semister'];

}
?>

                    <form method="post" action="UpdateCourse.php?CourseId=<?php echo $Id;?>" id="validateCourse" onsubmit="return validateUpdate('validateCourse');">
                      <table width="100%" border="0">
                        <tr>
                          <td height="32"><strong>Course Name :</strong></td>
                          <td><input name="name" type="text" value="<?php echo $name;?>" onkeyup="isalpha(this)"/></td>
                        </tr>
                        <tr>
                          <td height="36"><strong>Course Code :</strong></td>
                          <td><input name="code" type="text" value="<?php echo $CourseId;?>" onkeyup="isalphanum(this)"/></td>
                        </tr>
                        <tr>
                          <td height="31"><strong>Credit Hour:</strong></td>
                          <td><input name="credit" type="text" value="<?php echo $credit;?>" onkeyup="isTwo(this)"/></td>
                        </tr>
						<tr>
                          <td height="31"><strong>Year:</strong></td>
                          <td><input name="year" type="text" value="<?php echo $year;?>" onkeyup="isYear(this)"/></td>
                        </tr>
						<tr>
                          <td height="33"><strong>Semister:</strong></td>
                          <td><input name="semister" type="text" value="<?php echo $semister;?>" onkeyup="isYear(this)"/></td>
                        </tr>
						<tr>
                          
                        </tr>
                        <tr>
                          <td></td>
                          <td align="center"><input type="submit" name="submit" value="Update" /></td>
                        </tr>
                      </table>
                    </form>
					<!-- =================================================================== -->
					
                
<?php
mysqli_close($con);
?>
		  
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
