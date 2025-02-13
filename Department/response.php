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
            <h2 align="center">List Of Students To View Their Grade Report</h2>
                   	<p><a href="grading.php">Grade</a></p>
			        <p><a href="GradeRange.php">Add Grade Range</a></p>  
			        <p><a href="response.php">Grade Report</a></p>   
          </div>
        </div>
      <!-- ####################################################################################################### -->
	 <table width="200" height="303" border="0">
        <tr>
          <td>
		   <table width="100%" border="1" >
                    <tr>
                      <th>S.No</th>
                      <th align="center">Student Name</th>                      
                      <th>View</th>			                  
                    </tr>
									
                    <?php	
										
	$con = mysqli_connect ("localhost","root","","online");
//mysqli_select_db("online", $con);
$sql = "SELECT * FROM available_students where department = '".$_SESSION['department']."'";

$result = mysqli_query($con,$sql);
// Loop through each records 
$i = "1";
while($row = mysqli_fetch_array($result))
{
$id=$row['id'];
$name=$row['name'];

?>
                    <tr>
                      <td><?php echo $i;?></td>
					  <td><?php echo $name;?></td>
					  <td><a href="GradeReport.php?SchId=<?php echo $id;?>">View</a></td>                      
                    </tr>
                    <?php
					$i++;
}
$records = mysqli_num_rows($result);
if($records == 0)
{
echo "<font color = 'red'>NO SCHEDULE FOUND!</font>";
}
?>

<?php
mysqli_close($con);
?>
                 </table>
		  </td>
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
    <p class="fl_left">&copy;  All Rights Reserved - <a href="http//:www.HolisticBibleCollege.com">Holistic Bible College</a></p>
    
  </div>
</div>
</body>
</html>
