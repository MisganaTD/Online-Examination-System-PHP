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
<script type="text/javascript" src="LinkValidaion.js" ></script>
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
        <li  class="active"><a href="department.php">Management</a></li>
        
        
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
                <td width="81%"><h1>List of All Department</h1> </td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>
				 <!-- =============================================================== -->
			   <table width="100%" border="1" bordercolor="#85A157" >
                    <tr>
                      <th>Link Name</th>
                      <th>Status</th>                      
                      <th>Action</th>            
                    </tr>
                    <?php
					
$con = mysqli_connect("localhost","root","","online");
//mysqli_select_db("online", $con);

$sql = "SELECT * FROM links";
$result = mysqli_query($con,$sql);
$records = 0;
while($row = mysqli_fetch_array($result))
{
$linkName=$row['linkName'];
$status=$row['status'];

?>
                    <tr>
                      <td><?php echo $linkName;?></td>
                      <td><?php echo $status;?></td>   
					  <?php
					  if($status == 'Inactive')
					  {
					  ?>                                     
                      <td><a href="EnableLink.php?linkName=<?php echo $linkName;?>">Enable</a></td>
					  <?php
					  }
					  else
					  {
					  ?>
					   <td><a href="UpdateLink.php?linkName=<?php echo $linkName;?>">Disable</a></td>
					   <?php
					   }
					   ?>
                                      
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
    <p class="fl_left">&copy;All Rights Reserved - <a href="http//:www.HolisticBibleCollege.com">Holistic Bible College</a></p>
    
  </div>
</div>
</body>
</html>
