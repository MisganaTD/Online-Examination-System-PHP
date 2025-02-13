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
            <h2 align="center">Student Grading Form</h2> 
			<p><a href="grading.php">Grade</a></p>
			<p><a href="GradeRange.php">Add Grade Range</a></p>  
			<p><a href="response.php">Grade Report</a></p>
          </div>
        </div>
      <!-- ####################################################################################################### -->
 <form name="form1" id="form1" method="post" action="">    
<table width="200" height="98" border="0">
  <tr>
    <td width="28%" height="47">&nbsp;</td>
    <td width="10%">Course:</td>
    <td width="62%">
				  				  <?php
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
					<?php //$_SESSION['course_code'] = $result['course_code']?>
					<?php mysqli_close($con)?>
	</td>
  </tr>
  <tr>
    <td height="45">&nbsp;</td>
    <td>&nbsp;</td>
    <td>
      <input type="submit" name="Submit" value="Search Students" />
    </td>
  </tr>
</table>
</form>
			       <?php
					/*
					$found = 0;
$found2 = 0;
$sqlGrade = "SELECT * FROM grade where department = '".$_SESSION['department']."' AND course = '".$course."'";
$results = mysqli_query($sqlGrade,$con);
while($row = mysqli_fetch_array($results))
{
$student_id=$row['stud_id'];
}
$record = mysqli_num_rows($results);
if($record > 0)
{
$found++;
}
else
{
$found2 = 0;
}
					*/
					?>			

<?php
			
			if(isset($_POST['Submit']))	
			{	
	$con = mysqli_connect ("localhost","root","","online");
//mysqli_select_db("online", $con);

$course = $_POST['course'];
//-------------------------------------------------------------------------------------------------

//-------------------------------------------------------------------------------------------------
$_SESSION['course'] = $course;
$status = "unchecked";
//calculated
$sql = "SELECT DISTINCT stud_id  FROM exam_ansewer where department = '".$_SESSION['department']."' AND exam_course = '".$course."' AND MarkStatus <> 'calculated'";
$result = mysqli_query($con,$sql);
?>
<table width="100%" border="1" >
                    <tr>
					  <th>S.No</th>
                      <th>Student Id</th>                      
                      <th>Action</th>			                  
                    </tr>
<?php
$i = 1;
while($row = mysqli_fetch_array($result))
{
$stud_id = $row['stud_id'];
$records = mysqli_num_rows($result);
if($records > 0)
{
?>



                    <tr>
                      <td><?php echo $i;?></td>
					  <td><?php echo $stud_id;?></td>
					  <td><a href="CalculateTotal.php?stud_id=<?php echo $stud_id;?>">Check</a></td>   
				            
                    </tr>
           
 
<?php
                
//===================================================================================================
}


$i++;
}
mysqli_close($con);
?>
</table>
<?php
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
