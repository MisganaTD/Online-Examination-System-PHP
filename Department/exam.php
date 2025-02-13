<?php
session_start();
ob_start();
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
<link rel="stylesheet" href="styles/Invisible.css" type="text/css" />
<script type="text/javascript" src="validate.js" ></script>
</head>
<body id="top">
<!-- ==================================================================== -->

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

<!-- ==================================================================== -->
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
        <li><a href="course.php">course</a></li>
        <li><a href="schedule.php">schedule</a></li>
        <li  class="active"><a href="exam.php">exam</a></li>
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
        <li  class="active"><a href="exam.php">exam</a></li>
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
	
	  <form name="frm1" method="POST" action="" id="validateCourse" onsubmit="return validateExam('validateCourse');">
      <table width="200" border="0">
        <tr>
          <td width="14%" height="30">Exam Course: </td>
          <td width="86%">
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
                    </select>
					<?php //$_SESSION['course_code'] = $result['course_code']?>
					<?php mysqli_close($con)?>
		  
		  </td>
        </tr>
        <tr>
          <td>Year:</td>
          <td><select name="year">
            <option selected="selected" >1</option>
            <option >2</option>
            <option >3</option>
            <option >4</option>
            <option >5</option>
                              </select></td>
        </tr>
        <tr>
          <td>Semister:</td>
          <td><select name="semister">
            <option selected="selected" >1</option>
            <option >2</option>
                              </select></td>
        </tr>
        <tr>
          <td>Exam Term: </td>
          <td><select name="catagory">
            <option selected="selected" >QUIZ</option>
            <option >MID</option>
            <option >FINAL</option>
                              </select></td>
        </tr>
        <tr>
          <td>Question Type: </td>
          <td>
		  <input type="radio" name="type" value="TrueFalse" onClick="javascript:make_visible('div_1')"/>
		  True/False
		  <input type="radio" name="type" value="Choice" onClick="javascript:make_visible('div_2')"/>		  
		  Choice

		  </td>
        </tr>
        <tr>
          <td>Question:</td>
          <td><textarea name="question" cols="60"></textarea> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="Submit" value="Add Question" /></td>
        </tr>
        <tr>
          <td>Mark:</td>
          <td><input name="time" type="text" id="time" size="40" onkeyup="isTwo(this)"/></td>
        </tr>
        <tr>
          <td colspan="2">
		  <div class="Invisible" id="div_1">Ansewer: 
		   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		    <select name="tfAns">
		      <option selected="selected">True</option>
		      <option>False</option>
		      </select>
		  </div>          
		  </td>
        </tr>
        <tr>
          <td colspan="2">
		  <div class="Invisible" id="div_2">
		    <p>Ansewer: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		      <input name="cAns" type="text" size="40" /> 
		      </p>
		    <p>Option A : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
              <input name="a" type="text" size="40" />
</p>
		    <p>Option B: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <input name="b" type="text" size="40" />
</p>
		    <p>Option C: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <input name="c" type="text" size="40" />
</p>
		    <p>Option D: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <input name="d" type="text" size="40" />
		    </p>
		    Option E: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input name="e" type="text" size="40" />
<p>&nbsp; </p>
		  </div>
		  </td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><div class="Invisible" id="div_3"></div></td>
        </tr>
        <tr>
          
        </tr>
      </table>
	  
	  </form>
	  
	 <?php
	 if(isset($_POST['Submit']))
	 {
	 $type = $_POST['type'];
	 if($type == "TrueFalse")
	 {
	 //echo '<script type="text/javascript">alert("Your selection is TrueFalse!");</script>';
	 
    $department = $_SESSION['department'];
	
	$course=$_POST['course'];
	$year=$_POST['year'];
	$semister=$_POST['semister'];
	$catagory=$_POST['catagory'];
	$type=$_POST['type'];
	$question=$_POST['question'];
	$time=$_POST['time'];
	$tfAns=$_POST['tfAns'];
			
	$con = mysqli_connect ("localhost","root","","online");
	
	//mysqli_select_db("online", $con);
	//$sql = "insert into question  values('".$department."','".$course."','".$year."','".$semister."','".$catagory."','".$type."','".$question."','".$time."','".$tfAns."','".$cAns."','".$a."','".$b."','".$c."','".$d."','".$e."')";
	//$sql = "insert into question(department,exam_course,year,semister,exam_catagory,question_type,question,Time,TFAnsewer) values('".$department."','".$course."','".$year."','".$semister."','".$catagory."','".$type."','".$question."','".$time."','".$tfAns."')";
    $sql = "insert into question(exam_course,department,year,semister,exam_catagory,question_type,question,TFAnsewer,Mark) values('".$course."','".$department."','".$year."','".$semister."','".$catagory."','".$type."','".$question."','".$tfAns."','".$time."')";
	mysqli_query ($con,$sql);
	mysqli_close ($con);
	echo '<script type="text/javascript">alert("Question Added!");window.location=\'exam.php\';</script>';
	 }
	 else if($type == "Choice")
	 {
	 //echo '<script type="text/javascript">alert("Your selection is Chice!");</script>';
	 
    $department = $_SESSION['department'];
	
	$course=$_POST['course'];
	$year=$_POST['year'];
	$semister=$_POST['semister'];
	$catagory=$_POST['catagory'];
	$type=$_POST['type'];
	$question=$_POST['question'];
	$time=$_POST['time'];
	$tfAns=$_POST['tfAns'];
	$cAns=$_POST['cAns'];
	$a=$_POST['a'];
	$b=$_POST['b'];
	$c=$_POST['c'];
	$d=$_POST['d'];
	$e=$_POST['e'];	
	
	$con = mysqli_connect ("localhost","root","");
	
	//mysqli_select_db("online", $con);
	//$sql = "insert into question  values('".$department."','".$course."','".$year."','".$semister."','".$catagory."','".$type."','".$question."','".$time."','".$tfAns."','".$cAns."','".$a."','".$b."','".$c."','".$d."','".$e."')";
	$sql = "insert into question(department,exam_course,year,semister,exam_catagory,question_type,question,Time,TFAnsewer,CAnsewer,option_a,option_b,option_c,option_d,option_e) 
	values('".$department."','".$course."','".$year."','".$semister."','".$catagory."','".$type."','".$question."','".$time."','".$tfAns."','".$cAns."','".$a."','".$b."','".$c."','".$d."','".$e."')";

    $sql = "insert into question(exam_course,department,year,semister,exam_catagory,question_type,question,option_a,option_b,option_c,option_d,option_e,CAnsewer,Mark) values('".$course."','".$department."','".$year."','".$semister."','".$catagory."','".$type."','".$question."','".$a."','".$b."','".$c."','".$d."','".$e."','".$cAns."','".$time."')";
	mysqli_query ($con,$sql);
	mysqli_close ($con);
	echo '<script type="text/javascript">alert("Question Added!");window.location=\'exam.php\';</script>';
	 }
	 }
	 ?>
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
