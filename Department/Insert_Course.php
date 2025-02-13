<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Untitled Document</title>
</head>

<body>
<?php
if (!isset($_SESSION)) 
{
  session_start();
  
}
	$course_code=$_POST['course_code'];
	$course_title=$_POST['course_title'];
	$credit_hour=$_POST['credit_hour'];
	$year = $_POST['year'];
	$semister = $_POST['semister'];
	$department= $_SESSION['department'];		
	$con = mysqli_connect ("localhost","root","","online");
	//mysqli_select_db("online", $con);
	$sql = "insert into course  values('".$course_code."','".$course_title."','".$credit_hour."','".$department."','".$year."','".$semister."')";
	mysqli_query ($con,$sql);
	mysqli_close ($con);
	echo '<script type="text/javascript">alert("Course Added!");window.location=\'course.php\';</script>';
?>
</body>
</html>
