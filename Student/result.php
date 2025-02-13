<?php
if (!isset($_SESSION)) 
{
  session_start();
  
}
if(isset($_SESSION['email']))
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
        <li><a href="schedule.php">Schedule</a></li>
        <li><a href="exam.php">Exam</a></li>
        <li  class="active"><a href="result.php">Result</a></li>
		<?php
					
	$con = mysqli_connect ("localhost","root","","online");
//mysqli_select_db("online", $con);

$sql = "SELECT * FROM links where linkName = 'Course Registration'";
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
		  <li><a href="#">Registration</a></li>
		  <?php
		  }
		  else
		  {
		  ?>
          <li><a href="course_registration.php">Registration</a></li>
		  <?php
		  }
		  ?>
		  
        
      </ul>
    </div>
    <!-- ###### -->
  </div>
</div>

<!-- ####################################################################################################### -->
<div class="wrapper row3">
  <div class="rnd">
              
            <a href="ViewResult.php">View Grade</a>
			<h1 align="center" >Exam Result Checking Form</h1> 
			  
    <div id="container" class="clear">
      <!-- ####################################################################################################### -->

	 <form id="form1" name="form1" method="post" action="">
	  <table width="200" height="300" border="0">
        <tr>
          <td><table width="200" border="0">
            <tr>
              <td width="25%">&nbsp;</td>
              <td width="11%">Course:</td>
              <td width="24%">
                <label>
                  				  <?php
				$con = mysqli_connect ("localhost","root","","online");
            //mysqli_select_db("online", $con);
			?>
			<?php $event= mysqli_query($con,"select * from course where department = '".$_SESSION['department']."'"); ?>

             <select name="course">
             <?php while($result= mysqli_fetch_assoc($event))
                         { ?>
                    <option>
                    <?php echo $result['course_title']?>
                    </option>
                    <?php }?>
                </select></td>
					<?php //$_SESSION['course_code'] = $result['course_code']?>
					<?php mysqli_close($con)?>
                </label>
              </td>
              <td width="20%">&nbsp;</td>
              <td width="20%">&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>Exam Term: </td>
              <td><select name="term">
                <option selected="selected">QUIZ</option>
                <option>MID</option>
                <option>FINAL</option>
                                          </select></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td><label>
                <input type="submit" name="Submit" value="Show Result" />
              </label></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
          </table></td>
        </tr>
      </table>
	  
      </form>
			  
			 
			 
			  <table width="100%" border="0" >

			  
<?php
			
			if(isset($_POST['Submit']))	
			{	
	$con = mysqli_connect ("localhost","root","","online");
//mysqli_select_db("online", $con);

$term = $_POST['term'];
$course = $_POST['course'];

// stud_id = '".$_SESSION['id']."' AND 
$sql = "SELECT * FROM exam_ansewer where stud_id = '".$_SESSION['id']."' AND exam_term = '".$term."' AND exam_course = '".$course."'";
$result = mysqli_query($con,$sql);
$records = 0;
$i = 1;
while($row = mysqli_fetch_array($result))
{
$question = $row['question'];
$type = $row['question_type'];
$a = $row['a'];
$b = $row['b'];
$c = $row['c'];
$d = $row['d'];
$e = $row['e'];
$true_ans = $row['true_ans'];
$your_ans = $row['your_ans'];
$scored_mark = $row['scored_mark'];
$status = $row['status'];

//$total_mark = 0;
$records = mysqli_num_rows($result);
if($records > 0)
{
if($type == "Choice")
{

?>
                    <tr>
                      <th width="18%" colspan="6"><?php echo $i.")".$question; if($scored_mark > 0) {?><img src="rt.png" width="16" height="16" border="0" alt="Pick a date"><?php } else {?><img src="wrong.png" width="16" height="16" border="0" alt="Pick a date"><?php }?></th>
					</tr>
					<tr>
					  <td><?php echo "A) ".$a;?></td>
                      <td>&nbsp;</td>
                      <td width="18%"><?php echo "B) ".$b?></td>
					  <td width="17%"><?php echo "C) ".$c;?></td>
                      <td width="17%"><?php echo "D) ".$d?></td>   
					  <td width="30%"><?php echo "E) ".$e;?></td>                
                    </tr>
					<tr>
					  <td><?php echo "Your Ansewer: ".$your_ans;?></td>
                      <td>&nbsp;</td>
                      <td width="18%"><?php echo "Correct Ansewer: ".$true_ans?></td> 
					  <td width="18%"><?php echo "Mark: ".$scored_mark?></td>               
                    </tr>
<?php
//$total_mark = $total_mark + $scored_mark;
//$total_mark += (float)str_replace(",", "", $scored_mark);
}
if($type == "TrueFalse")
{
?>
                    <tr>
                      <th width="18%" colspan="6"><?php echo $i.")".$question; if($scored_mark > 0) {?><img src="rt.png" width="16" height="16" border="0" alt="Pick a date"><?php } else {?><img src="wrong.png" width="16" height="16" border="0" alt="Pick a date"><?php }?></th>
					</tr>
					<tr>
					  <td><?php echo "Your Ansewer: ".$your_ans;?></td>
                      <td>&nbsp;</td> 
					  <td width="18%"><?php echo "Mark: ".$scored_mark?></td>              
                    </tr>
<?php
//$total_mark = $total_mark + $scored_mark;
//$total_mark += (float)str_replace(",", "", $scored_mark);
}
if($type == "Essay")
{
if($status == "checked")
{
?>
                    <tr>
                      <th><?php echo $i.")";?> 
                      <textarea name="textarea" readonly><?php echo $question;?></textarea></th>
					</tr>
					<tr>
					  <td>Your Ansewer: <textarea name="textarea" readonly><?php echo $your_ans;?></textarea></td> 
					  <td>&nbsp;</td>
					  <td width="18%"><?php echo "Mark: ".$scored_mark?></td>              
                    </tr>
<?php

}
}
}
$i++;
}

$sql1 = "SELECT SUM(scored_mark) from exam_ansewer where stud_id = '".$_SESSION['id']."' AND exam_term = '".$term."' AND exam_course = '".$course."'";
  $total_mark=mysqli_query($con,$sql1);
  while($row1=mysqli_fetch_array($total_mark))
  {
    $mark=$row1['SUM(scored_mark)'];
	
//$records = mysqli_num_rows($total_mark);
if($mark > 0)
{
?>
<tr><td>Total Mark: <?php echo $mark;?></td></tr>
<?php
}
  }
mysqli_close($con);

}
?>

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
