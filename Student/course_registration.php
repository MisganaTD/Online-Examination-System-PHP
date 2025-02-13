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
        <li><a href="result.php">Result</a></li>
		<li   class="active"><a href="course_registration.php">Registration</a></li>
		
		
        
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
          <?php
		  //------------------------------------------------------------------------
		  	$con = mysqli_connect ("localhost","root","","online");
//mysqli_select_db("online", $con);
$sqlA = "select * from available_students where Id=".$_SESSION['id']."";
$resultA = mysqli_query($con,$sqlA);
while($row = mysqli_fetch_array($resultA))
{
$_SESSION['stud_year'] = $row['class_year'];
$_SESSION['stud_dep']=$row['department'];
$_SESSION['stud_semister'] =$row['semister'];
//echo $_SESSION['stud_year'];
//echo $_SESSION['stud_dep'];
//echo $_SESSION['stud_semister'];
}
mysqli_close($con);
		  //------------------------------------------------------------------------
		  		    	$con = mysqli_connect ("localhost","root","","online");
					//mysqli_select_db("online", $con);
					$sqlB = "select * from course where department='".$_SESSION['stud_dep']."' AND year = '".$_SESSION['stud_year']."' AND semister = '".$_SESSION['stud_semister']."'";
					$resultB = mysqli_query($con,$sqlB);
					while($row = mysqli_fetch_array($resultB))
					{
					$course = $row['course_title'];
					//echo $course;
					}
					$TotalCourses = mysqli_num_rows($resultB);
					$_SESSION['totalCourses'] = $TotalCourses;
					//echo $TotalCourses;
					mysqli_close($con);
		  //------------------------------------------------------------------------
		  	$con = mysqli_connect ("localhost","root","","online");
			//mysqli_select_db("online", $con);
			$sql = "select * from grade where stud_id='".$_SESSION['id']."'";
			$result = mysqli_query($con,$sql);
			$GradeCount = 0;
			while($row = mysqli_fetch_array($result))
			{
			$course=$row['course'];
			$grade=$row['grade'];
				//  echo $course ."=".$grade."/";
				if($grade == "A")
				{
				$A = 4;
				//echo $course ."A";
				$GradeCount = $GradeCount + $A;
				}
				else if($grade == "B")
				{
				//echo $course ."=".$grade."/";
				$B = 3;
				$GradeCount = $GradeCount + $B;
				}
				else if($grade == "C")
				{
				//echo $course ."C";
				$C = 2;
				$GradeCount = $GradeCount + $C;
				}
				else if($grade == "D")
				{
				//echo $course ."=".$grade."/";
				$D = 1;
				$GradeCount = $GradeCount + $D;
				}
				else if($grade == "F")
				{
				//echo $course ."=".$grade."/";
				$F = 0;
				$GradeCount = $GradeCount + $F;
				}
			}
			$records = mysqli_num_rows($result);
			//echo $GradeCount;
			if($records > 0)
			{
					if($records == $_SESSION['totalCourses'])
					{
					$Grade = $GradeCount / $records;			
					//echo $Grade;
					$_SESSION['grade'] = $Grade;
					}
					else
					{
					$_SESSION['grade'] = 0;
					echo '<script type="text/javascript">alert("You have not taken All Courses!");</script>';
					}
			}
			else
			{
			$_SESSION['grade'] = 0;
			}
			mysqli_close($con);
		  
		  $now = getdate();
		  $current_date = $now["mday"].".".$now["mon"].".".$now["year"]; 
		  
$Id=$_SESSION['id'];
	$con = mysqli_connect ("localhost","root","","online");
//mysqli_select_db("online", $con);
$sql = "select * from available_students where Id=".$Id."";
$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result))
{
$id=$row['id'];
$name=$row['name'];
$gender=$row['gender'];
$address=$row['address'];
$program=$row['program'];
$year = $row['class_year'];
$department=$row['department'];
$semister =$row['semister'];

}
?>
          <form name="course_registration" action="" method="post">
            <table width="97%" height="250" border="0">
              <tr>
                <td width="82%" height="104" colspan="2">
				<h1 align="center">Course Registration Form </h1>
				</td>
                <td width="18%">
				</td>
              </tr>
			  <tr>
			  <td></td>
			  <td align="right"></td>
			  </tr>
              <tr>
                <td colspan="2" height="140"><table width="200" border="0">
                  <tr>
                    <td width="14%"><strong>Name:</strong></td>
                    <td width="21%"><u><?php echo $name; ?></u></td>
                    <td width="10%"><strong>Id No: </strong></td>
                    <td width="22%"><u><?php echo $id; ?></u></td>
                    <td width="13%"><strong>Sex:</strong></td>
                    <td width="20%"><u><?php echo $gender; ?></u></td>
                  </tr>
                  <tr>
                    <td><strong>Date:</strong></td>
                    <td><u><?php echo $current_date; ?></u>
                      </td>
                    <td><strong>Address:</strong></td>
                    <td><u><?php echo $address; ?></u></td>
                    <td><strong>Grade:</strong></td>
                    <td><u><?php echo $_SESSION['grade']; ?></u></td>
                  </tr>
                  <tr>
                    <td height="40"><strong>Class Year: </strong></td>
                    <td><u><?php echo $year; ?></u></td>
                    <td><strong>Department:</strong></td>
                    <td><u><?php echo $department; ?></u></td>
                    <td><strong>Semister:</strong></td>
                    <td><u><?php echo $semister; ?></u></td>
                  </tr>
                </table>
                <!-- ============================================================================================================ -->
				 
				<!-- ============================================================================================================ -->
				<p align="right">
				  <input type="submit" name="Submit" value="Register" />
				</p></td>
                <td>&nbsp;</td>
              </tr>
      </table>
	  </form>
   
      <?php
	  
		  if(isset($_POST['Submit']))
		  
		  {
		  if($_SESSION['grade'] >= 2.0)
		  {
     $id = $_SESSION['id'];
	$con = mysqli_connect ("localhost","root","");
	
	//mysqli_select_db("online", $con);
	
	//================================================================================
	$sql = "select * from  available_students where id='".$id."'";
$result2 = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result2))
{
$year=$row['class_year'];
$semister = $row['semister'];
}
//echo $year." ".$semister;
	//================================================================================
	if($semister == 1)
	{
	$semister = 2;
	$year = $year;
	
		$update = "UPDATE  available_students SET registered='yes',class_year = '".$year."',semister = '".$semister."' WHERE id='$id'";
    $result = mysqli_query($con,$update);
	}
	else if($semister == 2)
	{
	$year = $year + 1;
	$semister = 1;
	
		$update = "UPDATE  available_students SET registered='yes',class_year = '".$year."',semister = '".$semister."' WHERE id='$id'";
    $result = mysqli_query($con,$update);
	}

	$update = "UPDATE links SET status='Inactive' WHERE linkName='Course Registration'";
    $result = mysqli_query($con,$update);
	// Close The Connection
	mysqli_close ($con);
	echo '<script type="text/javascript">alert("Registered Succefully!");window.location=\'index.php\';</script>';
		  }
		  else {

		 //echo $year." ".$semister;

		  echo '<script type="text/javascript">alert("Your grade is not enough to register!");</script>';
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
    <p class="fl_left">&copy;All Rights Reserved - <a href="http//:www.HolisticBibleCollege.com">Holistic Bible College</a></p>
    
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