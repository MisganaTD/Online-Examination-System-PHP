<?php
if (!isset($_SESSION)) 
{
  session_start();
extract($_POST);
extract($_GET);
extract($_SESSION);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">
<head profile="http://gmpg.org/xfn/11">
<title>Online Examination</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="imagetoolbar" content="no" />
<link rel="stylesheet" href="styles/layout.css" type="text/css" />
<link href="quiz.css" rel="stylesheet" type="text/css">
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
        <li  class="active"><a href="exam.php">Exam</a></li>
        <li><a href="result.php">Result</a></li>
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
    <div id="container" class="clear">
      <!-- ####################################################################################################### -->
      <table width="200" height="300" border="0">
        <tr>
          <td>
		                      <?php
	$con = mysqli_connect ("localhost","root","","online");
//mysqli_select_db("online", $con);
$sql = "SELECT * FROM available_students where id = '".$_SESSION['id']."'";
$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result))
{
$_SESSION['year'] = $row['class_year'];
$_SESSION['semister'] = $row['semister'];
$_SESSION['department'] = $row['department']; 
//echo $_SESSION['department'];
//echo $_SESSION['year'];
//echo $_SESSION['semister'];
} 
mysqli_close($con);
?>
<form name="form" id="form" method="post" action="">
				  <?php
				$con = mysqli_connect ("localhost","root","","online");
            //mysqli_select_db("online", $con);
			?>
			Exam Course: <?php $event= mysqli_query($con,"select * from examschedule where department = '".$_SESSION['department']."' AND year = '".$_SESSION['year']."' AND semister = '".$_SESSION['semister']."'"); ?>

             <select name="course">
             <?php while($result= mysqli_fetch_assoc($event))
                         { ?>
                    <option>
                    <?php echo $result['examCourse']?>
                    </option>
                    <?php }?>
                    </select>
					<?php mysqli_close($con)?>
<input type="submit" name="start" value="Start" />
		                      </form><?php 
//echo date("d-m-Y");
//echo strtotime(date("d-m-Y"));
$currentDate = date("d-m-Y");
//echo "The time is " . date("h:i:s"); 
//---------------------------------------------------------------------
if(isset($_POST['start']))
{
$course = $_POST['course'];
$_SESSION['EXCOURSE'] = $course;
	$con = mysqli_connect ("localhost","root","","online");
//mysqli_select_db("online", $con);
$sql = "SELECT examDate,examTerm FROM examschedule where department = '".$_SESSION['department']."' AND year = '".$_SESSION['year']."' AND semister = '".$_SESSION['semister']."' AND examCourse = '".$course."'";
$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result))
{
$date = $row['examDate']; 
$_SESSION['term'] = $row['examTerm'];
//echo $date;
$_SESSION['date'] = $date;
} 
mysqli_close($con);
}

if(isset($_SESSION['date']))
{
//echo $_SESSION['date'];
//if($_SESSION['date'] == $currentDate)
if(strtotime($_SESSION['date']) == strtotime($currentDate))
{
//echo "You are taking ".$_SESSION['EXCOURSE']." Exam.";
	$con = mysqli_connect ("localhost","root","","online");
//mysqli_select_db("online", $con);
$status = "viewed";
$rs = mysqli_query("SELECT * FROM question where department = '".$_SESSION['department']."' AND year = '".$_SESSION['year']."' AND semister = '".$_SESSION['semister']."' AND exam_course = '".$_SESSION['EXCOURSE']."' AND exam_catagory = '".$_SESSION['term']."' AND option_e != '".$status."'")or die(mysqli_error());
 
if(mysqli_fetch_array($rs))
	{
	if(!isset($_SESSION['qn']))
	{
		$_SESSION['qn']=0;
		$_SESSION['trueans']=0;
	}
	else
	{	
			//if($submit=='Next Question' && isset($ans))
			if(isset($_POST['next']) && isset($ans))
			{
					
					mysqli_data_seek($rs,$_SESSION['qn']);
					$row= mysqli_fetch_row($rs);	
					$question_id = $row[0];
					if($row[6] == "TrueFalse" && $ans==$row[13])
					{
								$_SESSION['trueans']=$_SESSION['trueans']+1;
								$mark = $row[15];
								mysqli_query("insert into exam_ansewer(stud_id, que_id,department, exam_course,exam_term,question_type,question,a,b,c,d,e,true_ans,your_ans,scored_mark) values ('".$_SESSION['id']."','$row[0]','".$_SESSION['department']."','$row[1]','$row[5]','$row[6]','$row[7]','$row[8]','$row[9]','$row[10]','$row[11]','$row[12]','$row[14]','$ans','".$mark."')") or die(mysqli_error());
					}
					else if($row[6] == "Choice")
					{
				
					    //$comp = strcmp(trim($ans),trim($row[14]));
						$comp = trim($ans) == trim($row[14]);
					    if($comp)
						    {
							$status = "viewed";
								$_SESSION['trueans']=$_SESSION['trueans']+1;
								$mark = $row[15];
								//echo $question_id;
								mysqli_query("insert into exam_ansewer(stud_id, que_id,department, exam_course,exam_term,question_type,question,a,b,c,d,e,true_ans,your_ans,scored_mark) values ('".$_SESSION['id']."','$row[0]','".$_SESSION['department']."','$row[1]','$row[5]','$row[6]','$row[7]','$row[8]','$row[9]','$row[10]','$row[11]','$row[12]','$row[14]','$ans','".$mark."')") or die(mysqli_error());
							   // mysqli_query("UPDATE question SET option_e = '".$status."'");
							   //echo "Inserted";
							}
							else
							{
							//echo $comp;
							$mark = 0;
								//echo $question_id;
								mysqli_query("insert into exam_ansewer(stud_id, que_id,department, exam_course,exam_term,question_type,question,a,b,c,d,e,true_ans,your_ans,scored_mark) values ('".$_SESSION['id']."','$row[0]','".$_SESSION['department']."','$row[1]','$row[5]','$row[6]','$row[7]','$row[8]','$row[9]','$row[10]','$row[11]','$row[12]','$row[14]','$ans','".$mark."')") or die(mysqli_error());
							}
			         
					}
					else
					{
					$mark = 0;
					mysqli_query("insert into exam_ansewer(stud_id, que_id,department, exam_course,exam_term,question_type,question,a,b,c,d,e,true_ans,your_ans,scored_mark) values ('".$_SESSION['id']."','$row[0]','".$_SESSION['department']."','$row[1]','$row[5]','$row[6]','$row[7]','$row[8]','$row[9]','$row[10]','$row[11]','$row[12]','$row[14]','$ans','".$mark."')") or die(mysqli_error());
					}
					
					$_SESSION['qn']=$_SESSION['qn']+1;
					
			}
			//else if($submit=='Finish' && isset($ans))
			else if(isset($_POST['finish']) && isset($ans))
			{
                	
					mysqli_data_seek($rs,$_SESSION['qn']);
					$row= mysqli_fetch_row($rs);	
					$question_id = $row[0];
					if($row[6] == "TrueFalse" && $ans==$row[13])
					{
					            $status = "viewed";
								$_SESSION['trueans']=$_SESSION['trueans']+1;
								$mark = $row[15];
								mysqli_query("insert into exam_ansewer(stud_id, que_id,department, exam_course,exam_term,question_type,question,a,b,c,d,e,true_ans,your_ans,scored_mark) values ('".$_SESSION['id']."','$row[0]','".$_SESSION['department']."','$row[1]','$row[5]','$row[6]','$row[7]','$row[8]','$row[9]','$row[10]','$row[11]','$row[12]','$row[14]','$ans','".$mark."')") or die(mysqli_error());
					             mysqli_query("UPDATE question SET option_e = '".$status."' where exam_catagory = '".$_SESSION['term']."'");
					}
					else if($row[6] == "Choice")
					{
					//$i = 1;
					//echo $ans;
					//echo "=".$row[14];
					    //$comp = strcmp(trim($ans),trim($row[14]));
						$comp = trim($ans) == trim($row[14]);
					    if($comp)
						    {
							$status = "viewed";
								$_SESSION['trueans']=$_SESSION['trueans']+1;
								$mark = $row[15];
								//echo $question_id;
								mysqli_query("insert into exam_ansewer(stud_id, que_id,department, exam_course,exam_term,question_type,question,a,b,c,d,e,true_ans,your_ans,scored_mark) values ('".$_SESSION['id']."','$row[0]','".$_SESSION['department']."','$row[1]','$row[5]','$row[6]','$row[7]','$row[8]','$row[9]','$row[10]','$row[11]','$row[12]','$row[14]','$ans','".$mark."')") or die(mysqli_error());
							   mysqli_query("UPDATE question SET option_e = '".$status."' where exam_catagory = '".$_SESSION['term']."'");
							  // echo "Inserted";
							}
							else
							{
							$status = "viewed";
							//echo $comp;
							$mark = 0;
								//echo $question_id;
								mysqli_query("insert into exam_ansewer(stud_id, que_id,department, exam_course,exam_term,question_type,question,a,b,c,d,e,true_ans,your_ans,scored_mark) values ('".$_SESSION['id']."','$row[0]','".$_SESSION['department']."','$row[1]','$row[5]','$row[6]','$row[7]','$row[8]','$row[9]','$row[10]','$row[11]','$row[12]','$row[14]','$ans','".$mark."')") or die(mysqli_error());
                                mysqli_query("UPDATE question SET option_e = '".$status."' where exam_catagory = '".$_SESSION['term']."'");
							}
		;
					}
					else
					{
					$mark = 0;
					mysqli_query("insert into exam_ansewer(stud_id, que_id,department, exam_course,exam_term,question_type,question,a,b,c,d,e,true_ans,your_ans,scored_mark) values ('".$_SESSION['id']."','$row[0]','".$_SESSION['department']."','$row[1]','$row[5]','$row[6]','$row[7]','$row[8]','$row[9]','$row[10]','$row[11]','$row[12]','$row[14]','$ans','".$mark."')") or die(mysqli_error());
					}
					
					$_SESSION['qn']=$_SESSION['qn']+1;
				
					//session_destroy();
					unset($_SESSION['qn']);
					unset($_SESSION['trueans']);
					exit;
			}
	}
	//$rs=mysqli_query("SELECT * FROM question where department = '".$_SESSION['department']."' AND year = '".$_SESSION['year']."' AND semister = '".$_SESSION['semister']."'") or die(mysqli_error());
	if($_SESSION['qn']>mysqli_num_rows($rs)-1)
	{
	unset($_SESSION['qn']);
	echo "<h1 class=head1>Some Error  Occured</h1>";
	session_destroy();
	echo "Please <a href=exam.php> Start Again</a>";

	exit;
	}
	mysqli_data_seek($rs,$_SESSION['qn']);
	$row= mysqli_fetch_row($rs);
	echo "<form name=myfm method=post action=exam.php>";
	echo "<table width=100%> <tr> <td width=30>&nbsp;<td> <table border=0>";
	$n=$_SESSION['qn']+1;
	echo "<tR><td><span class=style2>Question ".  $n .": $row[7]</style>";
	if($row[6] == "Choice")
	{
	echo "<tr><td class=style8><input type=radio name=ans value=$row[8]>$row[8]";
	echo "<tr><td class=style8> <input type=radio name=ans value=$row[9]>$row[9]";
	echo "<tr><td class=style8><input type=radio name=ans value=$row[10]>$row[10]";
	echo "<tr><td class=style8><input type=radio name=ans value=$row[11]>$row[11]";
	}
	else if($row[6] == "TrueFalse")
	{
	echo "<tr><td class=style8><input type=radio name=ans value=True>True";
	echo "<tr><td class=style8> <input type=radio name=ans value=False>False";
	}
	else if($row[6] == "Essay")
	{
	echo "<tr><td class=style8>Ansewer: <textarea name=ans></textarea>";
	}
	if($_SESSION['qn']<mysqli_num_rows($rs)-1)
	echo "<tr><td><input type=submit name=next value='Next Question'></form>";
	else
	echo "<tr><td><input type=submit name=finish value='Finish'></form>";
	echo "</table></table>";

}
}
else 
{
$_SESSION['yes'] = "yes";
echo '<script type="text/javascript">alert("No exam with this course Today!");</script>';
}
}
//---------------------------------------------------------------------

?>

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
