<?php
if (!isset($_SESSION)) 
{
  session_start();
  
}
if(isset($_SESSION['name']))
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
        <li><a href="user.php">user</a></li>
        <li  class="active"><a href="department.php">management</a></li>
        
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
          <td width="82%" height="168" colspan="2"> <h1 align="center">Department Information</h1> </td>
          <td width="18%"></td>
        </tr>
        <tr>
          <td colspan="2" height="120">
		  <?php
$department=$_GET['Department'];
$con = mysqli_connect("localhost","root","","online");
//mysqli_select_db("online", $con);
$sql = "select * from department_registration where department='".$department."'";
$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result))
{
$department=$row['department'];
$faculty=$row['faculty'];
$phone=$row['phone'];
$email=$row['email'];

}
?>

                    <form method="post" action="update_department.php?Department=<?php echo $department;?>">
                      <table width="100%" border="0">
                        <tr>
                          <td width="33%" height="32"><strong>Department:</strong></td>
                          <td width="67%"><input name="department" type="text" value="<?php echo $department;?>" /></td>
                        </tr>
                        <tr>
                          <td height="36"><strong>Faculty:</strong></td>
                          <td><input name="faculty" type="text" value="<?php echo $faculty;?>" /></td>
                        </tr>
                        <tr>
                          <td height="31"><strong>Phone Number:</strong></td>
                          <td><input name="phone" type="text" value="<?php echo $phone;?>" /></td>
                        </tr>
						<tr>
                          <td height="31"><strong>E-Mail:</strong></td>
                          <td><input name="email" type="text" value="<?php echo $email;?>" /></td>
                        </tr>
						<tr>
                          <td></td>
                          <td>&nbsp;</td>
						</tr>
						<tr>
                          <td align="right"><input type="submit" name="submit" value="Update" /> </td></td>
						</tr>
                      </table>
                    </form>
					<!-- =================================================================== -->
					
<?php

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
    <p class="fl_left">&copy;All Rights Reserved - <a href="http//:www.HolisticBibleCollege.com">Holistic Bible College</a></p>
    
  </div>
</div>
</body>
</html>
