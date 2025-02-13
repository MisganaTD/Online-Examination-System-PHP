<?php
if (!isset($_SESSION)) 
{
  session_start();
  
}
if(isset($_SESSION['name']))
{
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
        <li  class="active"><a href="index.php">Home</a></li>
        <li><a href="user.php">user</a></li>
        <li><a href="department.php">management</a></li>
        
        
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
          
            <table width="97%" height="273" border="0">
              <tr>
                <td width="82%" height="89">
				<h1 align="center"><b><font size =6>Welcome to:<font color = "green" size = 6> Administrator page </font></b></h1>
             </td>
                <td width="18%">
				
				</td>
              </tr>
              <tr>
                <td colspan="2" height="120"><br />
                </td>
                <td><script src="calander.js" language="javascript" type="text/javascript"></script></a></td>
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
<?php
}
else{
$logoutGoTo = "../index.php";
header("Location: $logoutGoTo");
}
?>

