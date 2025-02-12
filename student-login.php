<?php
session_start();
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
      <img src="logo.png" width="960" height="100" border="0" alt="Holistic Bible College">
    </div>
    <div class="fl_right">
      
    </div>
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper row2">
  <div class="rnd">
    <!-- ###### -->
    <div id="topnav">
      <ul>
        <li><a href="index.php"><b>Home</b></a></li>
        <li class="active"><a href="student-login.php"><b>Student </b></a></li>
        <li><a href="department-login.php"><b>Department </b></a></li>
        <li><a href="admin-login.php"><b>Administrator </b></a></li>
		<li><a href="help.php"><b>Help</b></a></li>        
      </ul>
    </div>
    <!-- ###### -->
  </div>
</div>  
<div class="wrapper row3">
  <div class="rnd">
    <div id="container" class="clear">
	<div id="content">	  
      <form name="form1" method="post" action="">
	    <table border="0">
          <tr>
            <td width="25%">Email:</td>
            <td width="75%"><input type="text" name="email" /></td>
          </tr>
          <tr>
            <td width="25%">Password:</td>
            <td width="75%"><input type="password" name="password" /> 
			</tr> 		   
	    <tr>
        <td></td>
        <td><input type="submit" name="Submit" value="Login" /></td> </td>
          </tr>
		  <tr>
            <td></td>
            <td></td>
          </tr>
		  		  <tr>
            <td></td>
            <td></td>
          </tr>
		  		  <tr>
            <td></td>
            <td></td>
          </tr>
		  		  <tr>
            <td></td>
            <td></td>
          </tr>
		  		  <tr>
            <td></td>
            <td></td>
          </tr>
		  		  <tr>
            <td></td>
            <td></td>
          </tr>
		  		  <tr>
            <td></td>
            <td></td>
          </tr>
		  		  <tr>
            <td></td>
            <td></td>
          </tr>
		  		  <tr>
            <td></td>
            <td></td>
          </tr>
		  		  <tr>
            <td></td>
            <td></td>
          </tr>
        </table>
	    </form>
		
		<?php
		if(isset($_POST['Submit']))
		{
		
//session_start();
$UserName=$_POST['email'];
$Password=$_POST['password'];

$con = mysqli_connect("localhost","root","","online");
//mysqli_select_db("online", $con);
$sql = "select * from student_registration where email='".$UserName."' and password='".$Password."'";
$result = mysqli_query($con,$sql);
$records = mysqli_num_rows($result);
$row = mysqli_fetch_array($result);
//echo $records;
if ($records==0)
{
echo '<script type="text/javascript">alert("Wrong E-Mail or Password");window.location=\'student-login.php\';</script>';
//header("location:index.php");
}
else
{
//session_start();
$_SESSION['name']=$row['name'];
$_SESSION['mname']=$row['mname'];
$_SESSION['email']=$row['email'];
$_SESSION['department']=$row['department'];
$_SESSION['id']=$row['Id'];
if(isset($_SESSION['email']))
{
header("location:Student/index.php");
}
} 
mysqli_close($con);
		}
		
		?>
      </div>
	  </div>
  </div>
</div> 
<div class="wrapper">
  <div id="copyright" class="clear">
    <p class="fl_left">&copy;  - All Rights Reserved - <a href="http//:www.HolisticBibleCollege.com">Holistic Bible College</a></p>
   
  </div>
</div>
</body>
</html>