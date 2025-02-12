<?php
// fetch files
$con = new mysqli("localhost","root","","duhrm"); 
//$sql = "select * from candidateregistrationtbl";
//$result = mysqli_query($con, $sql);
$limit=isset($_POST["limitrecord"]) ? $_POST["limitrecord"] : 2;//25;
$page=isset($_GET['page']) ? $_GET['page'] : 1;
$start=($page-1)*$limit;
$resultp1=$con->query("select count(id) as id from candidateregistrationtbl");
$dailydispcount=$resultp1->fetch_all(MYSQLI_ASSOC);
$total=$dailydispcount[0]['id'];
$pages=ceil($total/$limit);
if($page==1)
{
$previous=$page;
}
if($page!=1)
{
$previous=$page - 1;
}
if($page==$pages)
{
$next=$page;
}
if($page!=$pages)
{
$next=$page + 1;
}
if (!isset($_SESSION)) 
{
  session_start();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">
<head profile="http://gmpg.org/xfn/11">
<title>Online Examination </title>
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
        <li><a href="student-login.php"><b>Student </b></a></li>
        <li><a href="department-login.php"><b>Department </b></a></li>
        <li><a href="admin-login.php"><b>Administrator </b></a></li>
				<li class="active"><a href="help.php"><b>Help</b></a></li>

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
$con = mysqli_connect("localhost","root","");
mysqli_select_db($con,"online");
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
          <h2>Available Links</h2>
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
					
$con = mysqli_connect("localhost","root","");
mysqli_select_db($con,"online");

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
          <h2 align="left"><b>Help</b></h2>
          <ul>
            <li class="clear">  
			<table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
						 <th>Document for users</th>  
                        <th>Action</th> 
                    </tr>
                </thead>
                <tbody>
                <?php 
$con = new mysqli("localhost","root","","duhrm"); 
$resultp=$con->query("select * from doc_formatfile LIMIT $start, $limit");
$dailydisps=$resultp->fetch_all(MYSQLI_ASSOC);
foreach($dailydisps as $d): 
                //while($row = mysqli_fetch_array($result)) { ?>
                <tr>
                    <td><?php echo $d['id']; //echo $i++; ?></td>					
                    <td><?php  
					echo $d['filetitle']; ?></td>  
					<!--<td><?php  					
					//$id=$row['id'];
					//echo $row['fullname']; ?></td>--->
                    <td colspan='5'><a href="/docformat/uploads/<?php echo $d['filename']; ?>" target="_blank">View</a> <a href="uploads/<?php echo $d['filename']; ?>" download>Download</a>  
					<!--<a href="deletefile.php?id=<?php// echo $row['id']?>" onclick='return ConfirmDelete();'>Delete</a> --->
					</td>
                    <!--<td></td> for download file--->
                </tr>
<?php
endforeach;
 ?>
               </tbody>
            </table>
            </li>
         </ul>
          
        </div>
        <!-- ###### -->
		        <div id="right_column">
          <div class="holder">
            <h2 align="center">Calander</h2>
                   <p><script src="calander.js" language="javascript" type="text/javascript"></script></a></p>    
          </div>
        <!-- ###### -->
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