<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Untitled Document</title>
</head>
<body>
<?php

	$Id=$_GET['StudId'];
	$con = mysqli_connect ("localhost","root","","online");
	//mysqli_select_db("online", $con);
	$sql = "delete from student_registration where Id='".$Id."'";
	mysqli_query ($con,$sql);
	mysqli_close ($con);
	echo '<script type="text/javascript">alert("Student Rejected!");window.location=\'students.php\';</script>';

?>
</body>
</html>
