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
            <h2 align="center">Grade Range Form</h2> 
			<p><a href="grading.php">Grade</a></p>
			<p><a href="GradeRange.php">Add Grade Range</a></p>  
			<p><a href="response.php">Grade Report</a></p>
          </div>
        </div>
      <!-- ####################################################################################################### -->
     
<form name="form1" id="form1" method="post" action="" >    
<table width="200" height="93" border="0">
  <tr>
    <td width="26%" height="60">&nbsp;</td>
    <td width="11%">Select Course:</td>
    <td width="15%"><?php
				$con = mysqli_connect ("localhost","root","","online");
            //mysqli_select_db("online", $con);
			?>
      <?php $event= mysqli_query($con,"select * from course where department = '".$_SESSION['department']."'"); ?>
      <select name="course">
        <?php while($result= mysqli_fetch_assoc($event))
                         { ?>
        <option> <?php echo $result['course_title']?> </option>
        <?php }?>
      </select>
      <?php //$_SESSION['course_code'] = $result['course_code']?>
      <?php mysqli_close($con)?></td>
    <td width="48%"><input type="submit" name="select" value="Select" />
		    </td>
  </tr>
  <tr>
    <td height="25">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;
    </td>
  </tr>
  
</table>
</form>

      <!-- ####################################################################################################### -->
	  <?php
	  
	  if(isset($_POST['select']))
	  {
	  $course = $_POST['course'];
	  ?>
	  <form name="form2" method="post" action="" id="validateCourse" onsubmit="return validateGradeReport('validateCourse');">
	  <table width="200" height="265" border="0">
 <tr>
   <td height="53">&nbsp;</td>
   <td>&nbsp;</td>
   <td>Insert Grade Range For <?php echo $course;?>
     <input type="hidden" name="course" value="<?php echo $course;?>"/></td>
 </tr>
 <tr>
    <td width="20%" height="32">&nbsp;</td>
    <td width="17%">Range For A: </td>
    <td width="63%">Start 
      <input name="startA" type="text" size="10" onkeyup="isTwo(this)"/> 
      End 
      <input name="endA" type="text" size="10" onkeyup="isnum(this)"/> </td>
  </tr>
  <tr>
    <td height="40">&nbsp;</td>
    <td>Range For B:</td>
    <td>Start
      <input name="startB" type="text" size="10" onkeyup="isTwo(this)"/>
End
<input name="endB" type="text" size="10" onkeyup="isTwo(this)"/></td>
  </tr>
  <tr>
    <td height="35">&nbsp;</td>
    <td>Range For C:</td>
    <td>Start
      <input name="startC" type="text" size="10" onkeyup="isTwo(this)"/>
End
<input name="endC" type="text" size="10" onkeyup="isTwo(this)"/></td>
  </tr>
  <tr>
    <td height="35">&nbsp;</td>
    <td>Range For D:</td>
    <td>Start
      <input name="startD" type="text" size="10" onkeyup="isTwo(this)"/>
End
<input name="endD" type="text" size="10"onkeyup="isTwo(this)"/></td>
  </tr>
  <tr>
    <td height="35">&nbsp;</td>
    <td>&nbsp;</td>
    <td>
      <input type="submit" name="Submit" value="Submit" />
    </td>
  </tr>
      </table>
	  </form>
	  <?php
	  }	  
	  ?>
	  
      <?php
	  if(isset($_POST['Submit']))
	  {
	$course=$_POST['course'];
	
	$StartA=$_POST['startA'];
	$EndA=$_POST['endA'];
	
	$StartB=$_POST['startB'];
	$EndB=$_POST['endB'];
	
	$StartC=$_POST['startC'];
	$EndC=$_POST['endC'];
	
	$StartD=$_POST['startD'];
	$EndD=$_POST['endD'];
	
	$department= $_SESSION['department'];
	
			
	$con = mysqli_connect ("localhost","root","");
	
	//mysqli_select_db("online", $con);
	$sql = "insert into graderange  values('".$department."','".$course."','".$StartA."','".$EndA."','".$StartB."','".$EndB."','".$StartC."','".$EndC."','".$StartD."','".$EndD."')";
	mysqli_query ($con,$sql);
	mysqli_close ($con);
	echo '<script type="text/javascript">alert("Range Added!");window.location=\'GradeRange.php\';</script>';
	  }
	  ?>
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
