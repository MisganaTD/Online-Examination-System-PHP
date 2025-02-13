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
        <li  class="active"><a href="students.php">Students</a></li>
        <li><a href="course.php">course</a></li>
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
	  ?>    </div>
    <!-- ###### -->
  </div>
</div>

<!-- ####################################################################################################### -->
<div class="wrapper row3">
  <div class="rnd">
    <div id="container" class="clear">
      <!-- ####################################################################################################### -->
          
      <table width="200" height="335" border="0">
	  <tr>
	  <td>
	 <h1 align="center">New Students Registered for <?php echo $_SESSION['department']?> department</h1> 
	  </td>
	  
	  </tr>
             <tr>
               <td height="329">
			   
			   <!-- =============================================================== -->
			   <table width="100%" border="1" bordercolor="#85A157" >
                    <tr>
                      <th>Id</th>
                      <th align="center">Full Name</th>                      
                      <th>Gender</th>
                      <th>Age</th>
					  <th>Address</th>
					  <th>Region</th>
					  <th>Department</th>
					  <th>Program</th>
					  <th>Phone NO</th>
					  <th>E-Mail</th>	
					  <th>Accept</th>
                      <th>Reject</th>					  
					   
					                  
                    </tr>
                    <?php
					
					$department = $_SESSION['department'];
                    $status = "Inactive";
	$con = mysqli_connect ("localhost","root","","online");
//mysqli_select_db("online", $con);
/*$sql = "SELECT student_registration.Id,student_registration.name,student_registration.mname,student_registration.lname,student_registration.gender,student_registration.age,
               student_registration.address,student_registration.region,student_registration.department,student_registration.program,student_registration.phone,
			   student_registration.email,available_students.status 
        FROM student_registration,available_students 
		WHERE student_registration.department = '".$department."' AND available_students.status != '$STATUS'";*/
		$sql = "SELECT * FROM student_registration WHERE department = '".$department."' AND status = '".$status."'";
$result = mysqli_query($con,$sql);
$records = 0;
while($row = mysqli_fetch_array($result))
{
$id=$row['Id'];
$name=$row['name'];
$mname=$row['mname'];
$lname=$row['lname'];
$gender=$row['gender'];
$age=$row['age'];
$address=$row['address'];
$region=$row['region'];
$department=$row['department'];
$program=$row['program'];
$phone=$row['phone'];
$email=$row['email'];
//$status=$row['status'];

//if($status != "Active")
//{
?>
                    <tr>
                      <td><?php echo $id;?></td>
                      <td><?php echo $name." ".$mname." ".$lname;?></td>                                        
                      <td><?php echo $gender;?></td>
                      <td><?php echo $age;?></td>
					  <td><?php echo $address;?></td>
					  <td><?php echo $region;?></td>
					  <td><?php echo $department;?></td>
					  <td><?php echo $program;?></td>
					  <td><?php echo $phone;?></td>
					  <td><?php echo $email;?></td>			
					  <td><a href="accept-student.php?StudId=<?php echo $id;?>">Activate</a></td>	  
					  <td><a href="reject-student.php?StudId=<?php echo $id;?>">Reject</a></td>
                                      
					</tr>
                    <?php
					//}
}
$records = mysqli_num_rows($result);
if($records == 0)
{
echo "<font color = 'red'>NO RECORD FOUND!</font>";
}
?>

<?php
// Close the connection
mysqli_close($con);
?>

                 </table>
			   <!-- =============================================================== -->
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
