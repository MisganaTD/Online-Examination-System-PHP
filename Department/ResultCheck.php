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
            <h2 align="center">Exam Result Checking Form</h2>
                   	 <p><a href="grading.php">Grade</a></p>
			         <p><a href="GradeRange.php">Add Grade Range</a></p>  
			         <p><a href="response.php">Response</a></p>   
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
$Id=$_GET['stud_id'];
	$con = mysqli_connect ("localhost","root","","online");
//mysqli_select_db("online", $con);
$sql = "SELECT * FROM exam_ansewer where department = '".$_SESSION['department']."' AND exam_course = '".$_SESSION['course']."' AND exam_term = '".$_SESSION['term']."' AND stud_id = '".$Id."'";
$result = mysqli_query($con,$sql);

$i = 1;
while($row = mysqli_fetch_array($result))
{
$question=$row['question'];
$your_ans=$row['your_ans'];

$records = mysqli_num_rows($result);
if($records > 0)
{
?>
   				
				<table width="200" border="0">
                  <tr>
                    <td width="10%" height="35">&nbsp;</td>
                    <td width="14%">Question <?php echo $i?>:</td>
                    <td width="76%">
                      <textarea name="textarea" cols="40" rows="4" readonly><?php echo $question?></textarea>
                    </td>
                  </tr>
                  <tr>
                    <td height="35">&nbsp;</td>
                    <td>Student Ansewer: </td>
                    <td><textarea name="textarea" cols="40" rows="4" readonly><?php echo $your_ans?></textarea></td>
                  </tr>
                  <tr>
                    <td height="51">&nbsp;</td>
                    <td>Give Mark: </td>
                    <td><input name="textfield" type="text" size="40" /> 
                      </td>
                  </tr>
                  <tr>
                    <td height="46">&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                </table>
				
				
				<?php
				}
				$i++;
				}
				?>
				<input type="submit" name="Submit" value="Submit" />
				</td>
                <td>&nbsp;</td>
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
