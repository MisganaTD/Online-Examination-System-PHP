<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">
<head profile="http://gmpg.org/xfn/11">
<title>Online Examination</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="imagetoolbar" content="no" />
<link rel="stylesheet" href="styles/layout.css" type="text/css" />
<link rel="stylesheet" href="styles/bootstrap.css" type="text/css" media="screen">
<!-- Homepage Specific Elements -->
<script type="text/javascript" src="scripts/jquery-1.4.1.min.js"></script>
<script type="text/javascript" src="scripts/jquery-ui-1.7.2.custom.min.js"></script>
<script type="text/javascript" src="scripts/jquery.tabs.setup.js"></script>
<script type="text/javascript" src="StudRegistrationLink.js" ></script>
<!-- End Homepage Specific Elements -->
</head>
<body id="top" >
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
        <li class="active"><a href="index.php"><b>Home</b></a></li>
        <li><a href="student-login.php"><b>Student</b></a></li>
        <li><a href="department-login.php"><b>Department</b></a></li>
        <li><a href="admin-login.php"><b>Administrator</b></a></li>
				<li><a href="help.php"><b>Help</b></a></li>

      </ul>
    </div>
    <!-- ###### -->
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper">
  
</div>
<!-- ####################################################################################################### -->
<div class="wrapper row3">
  <div class="rnd">
    <div id="container" class="clear">
      <!-- ####################################################################################################### -->
      <div id="homepage" class="clear">
        <!-- ###### -->
        <div id="left_column">
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
          <h2><b>Available Links</b></h2>
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
		  
		   <?php
					
$con = mysqli_connect("localhost","root","","online");
//mysqli_select_db("online", $con);

$sql = "SELECT * FROM links where linkName = 'department registartion'";
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
		  <p><a onclick="disableLink()" id="gLink" href="#">Department Request</a></p>
		  <?php
		  }
		  else
		  {
		  ?>
          <p><a  href="department_registration.php">Department Request</a></p>
		  <?php
		  }
		  ?>

        </div>
        <!-- ###### -->
        <div id="latestnews">
          <h2><b><font color = "green">Contact Information</font></b></h2>
          <ul>
     <li class="clear">             
      <p><b><font color = "red">COLLEGE INFORMATION</font></b></p>                                                
		<p>Tel.: </p>
		<p>Fax:</p>

     <p><b><font color = "red">PROGRAM COORDINATOR</font></b></p>
		<p>Tel.:</p>
		<p>P.O.Box:</p>

     <p><b><font color = "red">SYSTEM ADMINISTRATOR </font></b></p>                                        
		<p>Tel.: </p>
		<p>P.O.Box:</p>              
     </li>
      </ul>          
        </div>
        <!-- ###### -->
		        <div id="right_column">
          <div class="holder">
            <h2 align="center"><b>Calander</b></h2>
                   <p><script src="calander.js" language="javascript" type="text/javascript"></script></a></p>    
          </div>
        <!-- ###### -->
      </div>
	  </div>
  </div>
</div> 
<div class="wrapper">
  <div id="copyright" class="clear">
    <p style="text-align:left"><i><font size='2.01'>&copy;  - All Rights Reserved - </font><a href="http//:www.holisticbiblecollege.com">Holistic Bible College</a></p>
    
  </div>
</div>
</body>
</html>