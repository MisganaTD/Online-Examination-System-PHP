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
      <form id="form1" method="post" action="">
	  
	  <table width="200" height="356" border="0">
        <tr>
          <td height="116"><p><a href="management.php">Add Teacher</a></p>
            <p><a href="AssignCourse.php">Assign Course</a></p>
            <p><a href="DeleteTeacher.php">Delete Teacher</a></p></td>
        </tr>
        <tr>
          <td height="192"><table border="0">
            <tr>
              <td width="17%" height="46">&nbsp;</td>
              <td width="6%">&nbsp;</td>
              <td width="13%">Instructor Name: </td>
              <td width="25%">
                				  <?php
				$con = mysqli_connect ("localhost","root","","online");
            //mysqli_select_db("online", $con);
			?>
			<?php $event= mysqli_query($con,"select * from teachers where department = '".$_SESSION['department']."'"); ?>

             <select name="name">
             <?php while($result= mysqli_fetch_assoc($event))
                         { ?>
                    <option>
                    <?php echo $result['name']?>
                    </option>
                    <?php }?>
                    </select>
					<?php mysqli_close($con)?>
              </td>
              <td width="22%">&nbsp;</td>
              <td width="17%">&nbsp;</td>
            </tr>
            <tr>
              <td height="39">&nbsp;</td>
              <td>&nbsp;</td>
              <td>Course: </td>
              <td>				  <?php
				$con = mysqli_connect ("localhost","root","","online");
            //mysqli_select_db("online", $con);
			?>
			<?php $event= mysqli_query($con,"select * from course where department = '".$_SESSION['department']."'"); ?>

             <select name="course">
             <?php while($result= mysqli_fetch_assoc($event))
                         { ?>
                    <option>
                    <?php echo $result['course_title']?>
                    </option>
                    <?php }?>
                    </select>
					<?php mysqli_close($con)?></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td height="39">&nbsp;</td>
              <td>&nbsp;</td>
              <td>Year:</td>
              <td><select name="year">
                <option selected="selected">1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
              </select></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td height="43">&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td><input type="submit" name="Submit" value="Assign" /></td>
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
	  try
	  {
  if(isset($_POST['Submit']))	  
	  {  
	$name=$_POST['name'];
	$course=$_POST['course'];
	$year=$_POST['year'];	
	$con = mysqli_connect ("localhost","root","","online");	
	//mysqli_select_db("online", $con);
	
$sql1 = "SELECT * FROM teachers where name = '".$name."'";
$result = mysqli_query($con,$sql1);
while($row = mysqli_fetch_array($result))
{
$id = $row['teachersId'];
	
	$sql = "insert into  coursetoinstructor  values('".$id."','".$name."','".$_SESSION['department']."','".$course."','".$year."')";
	mysqli_query ($con,$sql);
	mysqli_close ($con);
	echo '<script type="text/javascript">alert("Instructor Assigned!");window.location=\'AssignCourse.php\';</script>';
	 
	 }	
}
}
//catch exception
catch(Exception $ex) {
print_r($ex);
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
    <p class="fl_left">&copy;  All Rights Reserved - <a href="#">Domain Name</a></p>
    
  </div>
</div>
</body>
</html>
