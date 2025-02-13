<?php
if (!isset($_SESSION)) 
{
  session_start();
  
}
if(isset($_SESSION['email']))
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
$id = $_SESSION['id'];					
$con = mysqli_connect("localhost","root","","online");
////mysqli_select_db("online", $con);

$sql = "SELECT * FROM  student_registration where Id = '".$id."'";
$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result))
{
$requestStatus=$row['status'];
}
//mysqli_close($con);
?>
<?php
if($requestStatus == 'Active')
{
?>
      <ul>
        <li  class="active"><a href="index.php">Home</a></li>
        <li><a href="schedule.php">Schedule</a></li>
        <li><a href="exam.php">Exam</a></li>
        <li><a href="result.php">Result</a></li>
		
<?php
}
else if($requestStatus == 'Inactive')
{
?>
       <ul>
        <li  class="active"><a href="index.php">Home</a></li>
        <li><a href="#">Schedule</a></li>
        <li><a href="#">Exam</a></li>
        <li><a href="#">Result</a></li>
		<li><a href="#">Registration</a></li>
		
<?php
}
?>
		<?php
					
$con = mysqli_connect("localhost","root","","online");
////mysqli_select_db("online", $con);

$sql = "SELECT * FROM links where linkName = 'Course Registration'";
$result = mysqli_query($con,$sql);
$records = 0;
while($row = mysqli_fetch_array($result))
{
$linkName=$row['linkName'];
$status=$row['status'];
}
mysqli_close($con);
?>
		  <?php
		  if($status == 'Inactive')
		  {
		  ?>
		  <li><a href="#">Registration</a></li>
		  <?php
		  }
		  else if($requestStatus == 'Active')
		  {
		  ?>
          <li><a href="course_registration.php">Registration</a></li>
		  <?php
		  }
		  ?>
		  </ul>
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
          
          
            <table width="87%" height="291" border="0">
              <tr>
                <td width="2%" height="162">
				 
             </td>
                <td width="18%">
				<div align="left" class="subnav">
                   </div>
				</td>
                <td width="63%"> <p><b><font size = 6> Welcome: 
				<font color = "green" size = 6><?php echo $_SESSION['name']." ".$_SESSION['mname'];?> </font></b></p>
 			<?php				
$email = $_SESSION['email'];
$con = mysqli_connect("localhost","root","","online");
////mysqli_select_db("online", $con);
$sql = "select * from  student_registration where email='".$email."'";
$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result))
{
$id=$row['Id'];
$_SESSION['id'] = $id;
$name=$row['name'];
$mname=$row['mname'];
$lname=$row['lname'];
$fullName = $name." ".$mname." ".$lname;
$email = $row['email'];
$department =$row['department'];
$phone = $row['phone'];
$status = $row['status'];

}
$records = mysqli_num_rows($result);

?></p></td>

                <td width="16%"><form name="form2" id="form2" method="post" action="">
                </form></td>
              </tr>
              <tr>
                <td colspan="4" height="120"><table height="220" border="0">
			<tr>
			  <h1 align = "center">Your Profile</h1>
			  </tr>
			  			  <?php
			  if($status == "Active")
			  {
			  }
			  else
			  {
			  ?>
			</tr>
              <tr>  
				<table height="220" border="0">
							  <tr>
			  <h1><font color = 'red'>Your Request is Not accepted by Department</font></h1>
			  </tr>
			  <?php
			  }
			  ?>
                  <tr>
                    <td width="10%">Name:</td>
                    <td width="24%"><strong><?php echo $fullName;?></td>
                    <td width="10%">&nbsp;</td>
                    <td width="10%">E-Mail:</td>
                    <td width="35%"><strong><?php echo $email;?></td>
                    <td width="11%">&nbsp;</td>
                  </tr>
                  <tr>
                    <td>Id:</td>
                    <td><strong><?php echo $id;?></strong></td>
                    <td>&nbsp;</td>
                    <td>Phone No:</td>
                    <td><strong><?php echo $phone;?></strong></td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td>Department:</td>
                    <td><strong><?php echo $department;?></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                </table>

				</td>
                <td width="1%">&nbsp;</td>
              </tr>
      </table>
    </div>
  </div>
</div>
 <div class="wrapper">
  <div id="copyright" class="clear">
    <p class="fl_left">&copy;All Rights Reserved - 
	<a href="http//:www.HolisticBibleCollege.com">Holistic Bible College</a></p>
    
  </div>
</div>
</body>
</html>
