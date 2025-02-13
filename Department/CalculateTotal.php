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
            <h2 align="center">Calculate Total Mark And Grade Students</h2>
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
$Id=$_GET['stud_id'];
	$con = mysqli_connect ("localhost","root","","online");
//mysqli_select_db("online", $con);
$sql = "SELECT DISTINCT exam_term,scored_mark FROM exam_ansewer where department = '".$_SESSION['department']."' AND exam_course = '".$_SESSION['course']."' AND stud_id = '".$Id."'";
$result = mysqli_query($con,$sql);

$qiuz = 0;
$mid = 0;
$final = 0;
while($row = mysqli_fetch_array($result))
{
$exam_term=$row['exam_term'];
if($exam_term == "QUIZ")
{
$qiuz++;
}
if($exam_term == "MID")
{
$mid++;
}
if($exam_term == "FINAL")
{
$final++;
}
}

$records = mysqli_num_rows($result);
if($records > 0)
{
?>
   				
				<table width="200" border="0">
                  <tr>
                    <td height="35" colspan="3">Student Mark </td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td width="10%" height="35">&nbsp;</td>
                    <td width="14%">Student Id :</td>
                    <td width="76%"><?php echo $Id?></td>
                  </tr>

                  <tr>
                    <td height="39">&nbsp;</td>
                    <td>Quiz Result : </td>
                    <td>
					<?php
					if($qiuz > 0)
					{
					$sql1 = "SELECT SUM(scored_mark) from exam_ansewer where department = '".$_SESSION['department']."' AND exam_course = '".$_SESSION['course']."' AND stud_id = '".$Id."' AND exam_term = 'QUIZ'";
 					$total_mark=mysqli_query($con,$sql1);
  					while($row1=mysqli_fetch_array($total_mark))
  						{
   							 $mark=$row1['SUM(scored_mark)'];
						}
						echo $mark;
						?>
						<input type="hidden" name="quiz" value="<?php echo $mark;?>" />
						<?php
					}
					else
						{
						echo "<font color = 'red'>No Quiz Result Found!</font>";
						?>
						<input type="hidden" name="quiz" value="<?php echo $mark;?>" />
						<?php
						}

					?>
					
					</td>
                  </tr>
                  <tr>
                    <td height="39">&nbsp;</td>
                    <td>Mid Result: </td>
                    <td>
					<?php
					if($mid > 0)
					{
					$sql2 = "SELECT SUM(scored_mark) from exam_ansewer where department = '".$_SESSION['department']."' AND exam_course = '".$_SESSION['course']."' AND stud_id = '".$Id."' AND exam_term = 'MID'";
 					$total_mark=mysqli_query($con,$sql2);
  					while($row1=mysqli_fetch_array($total_mark))
  						{
   							 $mark=$row1['SUM(scored_mark)'];
						}
						echo $mark;
						?>
						<input type="hidden" name="mid" value="<?php $mark;?>"/>
						<?php
					}
					else
						{
						echo "<font color = 'red'>No Mid Result Found!</font>";
						?>
						<input type="hidden" name="mid" value="<?php $mark;?>"/>
						<?php
						}
					?>
                    
</td>
                  </tr>
                  <tr>
                    <td height="39">&nbsp;</td>
                    <td>Final Result: </td>
                    <td>
					<?php
					if($final > 0)
					{
					$sql3 = "SELECT SUM(scored_mark) from exam_ansewer where department = '".$_SESSION['department']."' AND exam_course = '".$_SESSION['course']."' AND stud_id = '".$Id."' AND exam_term = 'FINAL'";
 					$total_mark=mysqli_query($con,$sql3);
  					while($row1=mysqli_fetch_array($total_mark))
  						{
   							 $mark=$row1['SUM(scored_mark)'];
						}
						echo $mark;
						?>
						<input type="hidden" name="final" value="<?php $mark;?>"/>
						<?php		
						
					}
					else
						{
						echo "<font color = 'red'>No Final Result Found!</font>";
						//$mark = 0;
						?>
						<input type="hidden" name="final" value=""/>
						<?php
						}
						
					?>
</td>
                  </tr>
                  <tr>
                    <td height="39">&nbsp;</td>
                    <td>&nbsp;</td>
                    <td><input type="submit" name="Submit" value="Grade" /></td>
                  </tr>
                </table>
				
				
				<?php
			
				}
				?>
				</td>
                <td>&nbsp;</td>
              </tr>
      </table>
   
 </form>     
 
       <?php
	  if(isset($_POST['Submit']))
	  {
	  //echo $quiz;
	 // echo $qiuz.",".$mid." and".$final;
if($mid == 0)
{
echo '<script type="text/javascript">alert("No Mid Exam is Accomplshed!");</script>';
}
if($final == 0)
{
echo '<script type="text/javascript">alert("No Final Exam is Accomplshed!");</script>';
}

	if($mid > 0 && $final > 0)
	{
	$con = mysqli_connect ("localhost","root","");
	
	//mysqli_select_db("online", $con);
	$sql = "SELECT SUM(scored_mark) from exam_ansewer where department = '".$_SESSION['department']."' AND exam_course = '".$_SESSION['course']."' AND stud_id = '".$Id."'";
	//mysqli_query ($sql,$con);
 					$total_mark=mysqli_query($con,$sql);
  					while($row1=mysqli_fetch_array($total_mark))
  						{
   							 $mark=$row1['SUM(scored_mark)'];
						}
						$grade = "No";
						//---------------------------------------------------------------------------------------------------

$sql5 = "SELECT * from graderange where department = '".$_SESSION['department']."' AND course = '".$_SESSION['course']."'";
$result5 = mysqli_query($con,$sql5);
$record = mysqli_num_rows($result5);
if($record > 0)
{
while($row = mysqli_fetch_array($result5))
{
$startA = $row['startA'];
$endA = $row['endA'];
$startB = $row['startB'];
$endB = $row['endB'];
$startC = $row['startC'];
$endC = $row['endC'];
$startD = $row['startD'];
$endD = $row['endD'];
}
if($mark >= $startA && $mark <= $endA)
{
$grade = "A";
}
else if($mark >= $startB && $mark <= $endB)
{
$grade = "B";
}
else if($mark >= $startC && $mark <= $endC)
{
$grade = "C";
}
else if($mark >= $startD && $mark <= $endD)
{
$grade = "D";
}
else if($mark < $endD && $mark > 0)
{
$grade = "F";
}
else
{
$grade = "out";

}

			if($grade == "out")
			{
			echo '<script type="text/javascript">alert("Invalid Mark, Out Of Bound!");</script>';
			}
			else
				{
						//---------------------------------------------------------------------------------------------------
				$sql1 = "insert into grade values('".$Id."','".$_SESSION['department']."','".$_SESSION['course']."','".$mark."','".$grade."')";
				mysqli_query ($con,$sql1);
				$update = "UPDATE exam_ansewer SET MarkStatus = 'calculated' WHERE department = '".$_SESSION['department']."' AND stud_id = '".$Id."'";
				mysqli_query($con,$update);
				echo '<script type="text/javascript">alert("Mark and Grade Calculated!");window.location=\'grading.php\';</script>';
				mysqli_close ($con);
				}
	    }
		else
		{
		echo '<script type="text/javascript">alert("No Grade Range Found!");</script>';
		}
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
    <p class="fl_left">&copy;  All Rights Reserved - <a href="#">Domain Name</a></p>
    
  </div>
</div>
</body>
</html>
