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
          
         
            <table width="200" height="286" border="0">
              <tr>
                <td width="19%" height="111"><p><a href="department.php">Show Requests </a></p>
                <p><a href="manage_departments.php">Manage Departments</a></p>
                <p><a href="ManageLinks.php">Manage Links</a></p></td>
                <td width="81%"><h1>List of Department Request</h1> </td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>
				 <!-- =============================================================== -->
			   <table width="100%" border="1" bordercolor="#85A157" >
                    <tr>
                      <th>Department Name</th>
                      <th align="center">Faculty</th>                      
                      <th>Phone No</th>
                      <th>E-Mail</th>
					  <th>Accept</th>	
					  <th>Reject</th>
					                  
                    </tr>
                    <?php
					//$department = $_SESSION['department'];
                    $status = "Accepted";
$con = mysqli_connect("localhost","root","","online");
////mysqli_select_db("online", $con);

$sql = "SELECT * FROM department_registration WHERE status <> '".$status."'";
$result = mysqli_query($con,$sql);
$records = 0;
while($row = mysqli_fetch_array($result))
{
$department=$row['department'];
$faculty=$row['faculty'];
$phone=$row['phone'];
$email=$row['email'];

?>
                    <tr>
                      <td><?php echo $department;?></td>
                      <td><?php echo $faculty;?></td>                                        
                      <td><?php echo $phone;?></td>
                      <td><?php echo $email;?></td>		
					  <td><a href="accept-department.php?Department=<?php echo $department;?>">Accept Request</a></td>	  
					  <td><a href="reject-department.php?Department=<?php echo $department;?>">Reject Request</a></td>
                                      
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
    <p class="fl_left">&copy;All Rights Reserved - <a href="#">Domain Name</a></p>
    
  </div>
</div>
</body>
</html>
