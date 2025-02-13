<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Untitled Document</title>
</head>
<body>
	  <?php
if(!isset($_SESSION))
{
session_start();
}
    
	
	$course=$_POST['course'];
	$date=$_POST['strtDate'];
	$coursecode=$_SESSION['course_code'];
	$con = mysqli_connect ("localhost","root","");
	
	//mysqli_select_db("online", $con);
	//$sql = "insert into course  values('".$course_code."','".$course_title."','".$credit_hour."','".$department."','".$year."','".$semister."')";
	$sql = "insert into examschedule  values('".$course."','".$coursecode."','".$date."')";
	mysqli_query ($con,$sql);
	mysqli_close ($con);
	echo '<script type="text/javascript">alert("Schedule Added!");window.location=\'ExamSchedule.php\';</script>';


?>
</body>
</html>
