<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Untitled Document</title>
</head>
<body>
<?php

	$department=$_POST['department'];
	$faculty=$_POST['faculty'];
	$phone=$_POST['phone'];
	$email=$_POST['email'];
	$password=$_POST['password'];		
	$con = mysqli_connect ("localhost","root","","online");
	//mysqli_select_db("online", $con);
   $sql = "insert into department_registration  values('".$department."','".$faculty."','".$phone."','".$email."','".$password."')";
	mysqli_query ($con,$sql);
 	mysqli_close ($con);
	echo '<script type="text/javascript">alert("Request send Succesfully!");window.location=\'department_registration.php\';</script>';
?>
</body>
</html>
