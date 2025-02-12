<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">
<head profile="http://gmpg.org/xfn/11">
<title>Online Examination </title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="imagetoolbar" content="no" />
<link rel="stylesheet" href="styles/layout.css" type="text/css" />
<!-- Homepage Specific Elements -->
<script type="text/javascript" src="scripts/jquery-1.4.1.min.js"></script>
<script type="text/javascript" src="scripts/jquery-ui-1.7.2.custom.min.js"></script>
<script type="text/javascript" src="scripts/jquery.tabs.setup.js"></script>

<script type="text/javascript" src="validateDepartment.js" ></script>
<script type="text/javascript" src="StudRegistrationLink.js" ></script>
<!-- End Homepage Specific Elements -->
</head>
<body id="top">
<div class="wrapper row1">
  <div id="header" class="clear">
    <div class="fl_left">
      <img src="logo.png" width="960" height="100" border="0" alt="Holistic Bible College">
    </div>
    <div class="fl_right">
      
      <form action="#" method="post" id="sitesearch">
        <fieldset>
        </fieldset>
      </form>
    </div>
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper row2">
  <div class="rnd">
    <!-- ###### -->
    <div id="topnav">
      <ul>
        <li class="active"><a href="index.php"><b>Home</b></a></li>
        <li><a href="student-login.php"><b>Student </b></a></li>
        <li><a href="department-login.php"><b>Department</b> </a></li>
        <li><a href="admin-login.php"><b>Administrator </b></a></li>
				<li><a href="help.php"><b>Help</b></a></li>

      </ul>
    </div>
    <!-- ###### -->
  </div>
</div>
<!-- ####################################################################################################### -->
<!-- ####################################################################################################### -->
<div class="wrapper row3">
  <div class="rnd">
    <div id="container" class="clear">
      <!-- ####################################################################################################### -->
      <table width="200" border="0">
        <tr>
          <td width="24%" ><table width="200" border="0">
            <tr>
			<td>
			<h1 align="center">Available Links</h1>
			</td>
			</tr>
			<tr>
			<td>			  
			  <?php
					
$con = mysqli_connect("localhost","root","","online");
//mysqli_select_db("online", $con);

$sql = "SELECT * FROM links where linkName = 'student regisration'";
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
		  <p><a onclick="disableLink()" id="gLink" href="student-registration.php">Student Registration</a></p>
		  <?php
		  }
		  else
		  {
		  ?>
          <p><a  href="student-registration.php">Student Registration</a></p>
		  <?php
		  }
		  ?>
			  </td>
			  <tr>
			  <td>
			  <a href="department_registration.php">Department Registration</a>
			  </td>
			  </tr>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
          </table></td>
          <td><h1 align="center"><b>Department Registration Form </b></h1> 
          <p>&nbsp;</p></td>
          <td width="15%">&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td width="61%"><form name="form1" id="validateDepartment" method="post" action="" onsubmit="return validateform('validateDepartment');">
		<table border="0">
		
          <tr>
            <td width="22%">Department Name: </td>
            <td width="41%">
              <input type="text" name="department" onkeyup="isalpha(this)" />
            </td>
          </tr>
          <tr>
            <td> Faculty: </td>
            <td>
              <select name="faculty" style="width:140px">
			  <option selected="selected">--SELECT--</option>
                <option>BTh</option>
                <option>IOT</option>
                <option>FBE</option>  
				<option>Law</option>
				<option>Other Social</option> 
              </select>
</td>
          
          <tr>
            <td>Phone Number: </td>
            <td>
              <input type="text" name="phone" onkeyup="isPhoneNo(this)"/>
            </td>
          </tr>
          <tr>
            <td>Email:</td>
            <td>
              <input type="text" name="email" />
            </td>
          </tr>
          <tr>
            <td>Password:</td>
            <td>
              <input type="password" name="password" />
            </td>
          </tr>
          <tr>
            <td>Confirm Password: </td>
            <td>
              <input type="password" name="confirmPass" />
            </td>
          </tr>
		  <tr>
		  
		  <td align="center"></td>
		  <td><input type="submit" name="Submit" value="Register" />
		  <input type="reset" name="reset" value="Reset" /></td>
		
		  </tr>
        </table>
		</form>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
	  <?php
	  if(isset($_POST['Submit']))
	  {
	 $department=$_POST['department'];
	$faculty=$_POST['faculty'];
	$phone=$_POST['phone'];
	$email=$_POST['email'];
	$password=$_POST['password'];
			
	$con = mysqli_connect ("localhost","root","","online");
   $status = "";
//mysqli_select_db("online", $con);
   $sql = "insert into department_registration(department,faculty,phone,email,password,status)  values('".$department."','".$faculty."','".$phone."','".$email."','".$password."','".$status."')";
 
	mysqli_query ($con,$sql);
 
	mysqli_close ($con);
	echo '<script type="text/javascript">alert("Request send Succesfully!");window.location=\'department_registration.php\';</script>';

	  }
	  
	  ?>
      <!-- ####################################################################################################### -->
     
      <!-- ####################################################################################################### -->
   
      <!-- ####################################################################################################### -->
    </div>
  </div>
</div>
<!-- ####################################################################################################### -->

<!-- ####################################################################################################### -->
<div class="wrapper">
  <div id="copyright" class="clear">
    <p class="fl_left">&copy;  - All Rights Reserved - <a href="http//:www.HolisticBibleCollege.com">Holistic Bible College</a></p>
    
  </div>
</div>
</body>
</html>