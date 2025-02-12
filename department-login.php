<?php
session_start();
ob_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">
<head profile="http://gmpg.org/xfn/11">
<title>Online Examination</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="imagetoolbar" content="no" />
<link rel="stylesheet" href="styles/layout.css" type="text/css" />
<link rel="stylesheet" href="styles/Invisible.css" type="text/css" />
</head>
<body id="top">
<script language="JavaScript">
<!--
var activeDiv = '';
function make_visible(targetDiv)
{
    var previous;
    if (activeDiv != '')
    {
        previous = document.getElementById(activeDiv);
        if (activeDiv != targetDiv)
        {
            previous.className = "Invisible";
        }
    }
    var newActive = document.getElementById(targetDiv);
    newActive.className = "Visible";
    activeDiv = targetDiv;
}
</script>
<div class="wrapper row1">
  <div id="header" class="clear">
    <div class="fl_left">
      <img src="logo.png" width="960" height="100" border="0" alt="Harmaya University">
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
        <li><a href="student-login.php"><b>student </b></a></li>
        <li class="active"><a href="department-login.php"><b>department</b></a></li>
        <li><a href="admin-login.php"><b>administrator </b></a></li>
				<li><a href="help.php"><b>Help</b></a></li>      
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
	  <div id="content">
      <form name="form1" method="post" action="">
	    <table border="0">
             <!----<tr>
             <td width="19%">Department:</td><td width="81%">
					<?php
			//$con = mysqli_connect("localhost","root","","online");
           // mysqli_select_db("online", $con);
			?>
			<?php// $department= mysqli_query($con,"select * from department_registration"); ?>

             <select name="department" id="cmbDepartment">
             <?php// while($result= mysqli_fetch_assoc($department))
                         //{ ?>
                    <option>
                    <?php// echo $result['department']?>
                    </option>
                    <?php// }?>
                    </select>					
                  </tr>--->
				  <tr>				  
				  <td colspan="2">User Type: 
				  <input type="radio" name="type" value="teacher" onClick="javascript:make_visible('div_1')"/> Teacher
		  		  <input type="radio" name="type" value="head" checked onClick="javascript:make_visible('div_2')"/> Head 
				  </td>
				  </tr> 			   
				  <tr>
				  <td colspan="2">
				  <div class="Invisible" id="div_1"> User Name: 
				  <input type="text" name="userName" /> </div>
				  </td>			  			  
				  </tr>				  
                  <tr>                    
				  <td colspan="2">Password:&nbsp;&nbsp;&nbsp; 				  
				  <input type="password" name="password" /></td>
                  </tr>
                  <tr>
                    <td ><div class="Invisible" id="div_2"></div></td>
                    <td><input type="submit" name="Submit" value="Login" /></td>
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
$UserName=$_POST['department'];
$Password=$_POST['password'];
$user = $_POST['userName'];
$_SESSION['type'] = $_POST['type'];
$type = $_POST['type'];
$con = mysqli_connect("localhost","root","","online");
//mysqli_select_db("online", $con);
if($type == 'teacher')
{
$sql = "select * from department_registration,teachers where teachers.username='".$user."' and teachers.password='".$Password."'";

}
else if($type == 'head')
{
$sql = "select * from department_registration where password='".$Password."'";
}
$result = mysqli_query($con,$sql);
$records = mysqli_num_rows($result);
$row = mysqli_fetch_array($result);
//echo $records;
if ($records==0)
{
echo '<script type="text/javascript">alert("Invalid Input");window.location=\'department-login.php\';</script>';
//header("location:index.php");
}
else
{
	//session_start();
$_SESSION['department']=$row['department'];
header("location:Department/index.php");
} 
mysqli_close($con);
		}
		?>
<div>
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
