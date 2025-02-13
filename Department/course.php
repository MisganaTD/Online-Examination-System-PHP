<?php
if (!isset($_SESSION)) 
{
  session_start();
 }
if(isset($_SESSION['department']))
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
<script type="text/javascript" src="validate.js" ></script>
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
      <?php
	$userType = $_SESSION['type'];
	if($userType == 'head')
	{
	?>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="students.php">Students</a></li>
        <li  class="active"><a href="course.php">course</a></li>
        <li><a href="schedule.php">schedule</a></li>
        <li><a href="exam.php">exam</a></li>
        <li><a href="response.php">Grade</a></li>
		<li><a href="management.php">Teachers</a></li>
        
      </ul>
	  <?php
	  }
	  else if ($userType == 'teacher')
	  {
	  ?>
	   <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="schedule.php">schedule</a></li>
        <li><a href="exam.php">exam</a></li>
        <li><a href="response.php">Grade</a></li>
        
      </ul>
	  <?php
	  }
	  ?>
    </div>
    <!-- ###### -->
  </div>
</div>

<!-- ####################################################################################################### -->
<div class="wrapper row3">
  <div class="rnd">
    <div id="container" class="clear">
      <!-- ####################################################################################################### -->
          
         
            <table width="97%" height="388" border="0">
              <tr>
                <td width="12%" ><p><a href="course.php">Add Course</a></p>
                <p><a href="manage_course.php">Manage Course</a></p></td>
                <td height="117" colspan="2" >
				<h1 align="center" >Department's Course Registration</h1> </td>
                <td width="11%">				
				</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td colspan="2" height="120">
	        <form name="form1" id="validateCourse" method="post" action="Insert_Course.php" onsubmit="return validateform('validateCourse');">
				  <table width="200" height="248" border="0">
                    <tr>
                      <td width="18%">Course Code: </td>
                      <td width="82%">
                        <input type="text" name="course_code" />
                      </td>
                    </tr>
                    <tr>
                      <td>Course Title: </td>
                      <td><input type="text" name="course_title" onkeyup="isalpha(this)" /></td>
                    </tr>
                    <tr>
                      <td>Credit Hour: </td>
                      <td><input type="text" name="credit_hour" onkeyup="isTwo(this)"/></td>
                    </tr> 
					<tr>
                      <td>Year: </td>
                      <td><select name="year">
                        <option selected="selected">1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                      </select></td>
					</tr> 
					<tr>
                      <td>Semister: </td>
                      <td><select name="semister">
                        <option selected="selected">1</option>
                        <option>2</option>
                      </select></td>
					</tr>                  
                    <tr>
                      <td align="right">&nbsp;</td>
                      <td align="left"><input type="submit" name="Submit" value="Register" /></td>
                    </tr>
                  </table>
				  
				
				
				</form>
				
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
    <p class="fl_left">&copy;  All Rights Reserved - <a href="#">Domain Name</a></p>
    
  </div>
</div>
</body>
</html>
