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

      <ul>
        <li><a href="index.php">Home</a></li>
        <li  class="active"><a href="students.php">Students</a></li>
        <li><a href="course.php">course</a></li>
        <li><a href="schedule.php">schedule</a></li>
        <li><a href="exam.php">exam</a></li>
        <li><a href="response.php">Grade</a></li>
		<li><a href="management.php">Teachers</a></li>
        
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
          
      <table width="97%" height="300" border="0">
        <tr>
          <td width="82%" height="168" colspan="2"> <h1 align="center">Student Information</h1> </td>
          <td width="18%"></td>
        </tr>
        <tr>
          <td colspan="2" height="120">
		  <?php
$Id=$_GET['StudId'];
	$con = mysqli_connect ("localhost","root","","online");
//mysqli_select_db("online", $con);
$sql = "select * from student_registration where Id=".$Id."";
$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result))
{
$Id=$row['Id'];
$name=$row['name'];
$mname=$row['mname'];
$lname=$row['lname'];
$gender=$row['gender'];
$email = $row['email'];
$age=$row['age'];
$department =$row['department'];
$address =$row['address'];
$program =$row['program'];

}
?>

                    <form method="post" action="accept_student.php?Id=<?php echo $Id;?>">
                      <table width="100%" border="0">
                        <tr>
                          <td height="32"><strong>Student Id:</strong></td>
                          <td><?php echo $Id;?><input name="id" type="hidden" value="<?php echo $Id;?>" /></td>
                        </tr>
                        <tr>
                          <td height="36"><strong>First Name:</strong></td>
                          <td><?php echo $name;?><input name="name" type="hidden" value="<?php echo $name;?>" /></td>
                        </tr>
                        <tr>
                          <td height="31"><strong>Middle Name:</strong></td>
                          <td><?php echo $mname;?><input name="mname" type="hidden" value="<?php echo $mname;?>" /></td>
                        </tr>
						<tr>
                          <td height="31"><strong>Last Name:</strong></td>
                          <td><?php echo $lname;?><input name="lname" type="hidden" value="<?php echo $lname;?>" /></td>
                        </tr>
						<tr>
                          <td height="33"><strong>Gender:</strong></td>
                          <td><?php echo $gender;?><input name="gender" type="hidden" value="<?php echo $gender;?>" /></td>
                        </tr>
						<tr>
                          <td height="33"><strong>Age:</strong></td>
                          <td><?php echo $age;?><input name="age" type="hidden" value="<?php echo $age;?>" /></td>
                        </tr>
						<tr>
                          <td height="33"><strong>Email:</strong></td>
                          <td><?php echo $email;?><input name="email" type="hidden" value="<?php echo $email;?>" /></td>
                        </tr>
						<tr>
                          <td height="33"><strong>Address:</strong></td>
                          <td><?php echo $address;?><input name="address" type="hidden" value="<?php echo $address;?>" /></td>
                        </tr>
                        <tr>
						<tr>
                          <td height="33"><strong>Program:</strong></td>
                          <td><?php echo $program;?><input name="program" type="hidden" value="<?php echo $program;?>" /></td>
                        </tr>
						<tr>
                          <td height="33"><strong>Department:</strong></td>
                          <td><?php echo $department;?><input name="department" type="hidden" value="<?php echo $department;?>" /></td>
                        </tr>
						<tr>
                          <td height="34"><strong>Class Year:</strong></td>
                          <td><label>
                            <select name="year" id="year">
                              <option selected="selected">1</option>
                            </select>
                          </label></td>
                        </tr>
                          <td height="31"><strong>Semester:</strong></td>
                          <td><select name="semister" id="cmbSem">
                              <option selected="selected">1</option>
                          </select></td>
                        </tr>
                        <tr>
                          <td height="34"><strong>Status:</strong></td>
                          <td><label>
                            <select name="status" id="status">
                              <option selected="selected">Active</option>
                            </select>
                          </label></td>
                        </tr>
                        <tr>
                          <td></td>
                          <td align="center"><input type="submit" name="submit" value="Accept" /></td>
                        </tr>
                      </table>
                    </form>
					<!-- =================================================================== -->
					
                  <?php
// Close the connection
?>
<?php
//$update = "UPDATE student_registration SET status='Active' WHERE id='$Id'";
//$result = mysqli_query($update,$con);
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
