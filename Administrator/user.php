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
<link rel="stylesheet" href="../Department/styles/layout.css" type="text/css" />
<script type="text/javascript" src="validate.js" ></script>
<script type="text/javascript" src="validate.js" ></script>
</head>
<body id="top">
<div class="wrapper row1">
  <div id="header" class="clear">
    <div class="fl_left">
      <h1><a href="../Department/index.html">Holistic Bible College</a></h1>
      <p>ONLINE EXAMINATION SYSTEM FOR DISTANCE LEARNERS</p>
    </div>
    <div align="right" class="fl_right">
      <ul>
        
        <li class="last"> <a href="../Department/logout.php">Logout</a></li>
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
        <li  class="active"><a href="user.php">user</a></li>
        <li><a href="department.php">Management</a></li>
        
        
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
          
         <form method="post" action="" id="validateCourse" onsubmit="return validateTeacher('validateCourse');">
	  
	  <table width="200" height="400" border="0">
        <tr>
          <td height="116"></td>
        </tr>
        <tr>
          <td height="192"><table border="0">
            <tr>
              <td height="39">&nbsp;</td>
              <td>&nbsp;</td>
              <td>User Name: </td>
              <td><input name="username" type="text" size="34" /></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td height="39">&nbsp;</td>
              <td>&nbsp;</td>
              <td>Password:</td>
              <td><input name="password" type="password" size="34" /></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
			  <td height="39">&nbsp;</td>
              <td>&nbsp;</td>
              <td>Confirm Password:</td>
              <td><input name="confirm" type="password" size="34" /></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td height="43">&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td><input type="submit" name="Submit" value="Add User" /></td>
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
	  if(isset($_POST['Submit']))
	  {
	  
	$user=$_POST['username'];
	$psw=$_POST['password'];
	
			
	$con = mysqli_connect ("localhost","root","","online");
	
	////mysqli_select_db("online", $con);
	$sql = "insert into admin_account  values('".$user."','".$psw."')";
	mysqli_query ($con,$sql);
	mysqli_close ($con);
	echo '<script type="text/javascript">alert("User Added!");window.location=\'user.php\';</script>';
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
