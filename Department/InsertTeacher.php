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

	$name=$_POST['name'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	
	$department= $_SESSION['department'];
	
			
	$con = mysqli_connect ("localhost","root","","online");
	
	//mysqli_select_db("online", $con);
	$sql = "insert into teachers(name,department,username,password) values('".$name."','".$department."','".$username."','".$password."')";
	mysqli_query ($con,$sql);
	mysqli_close ($con);
	echo '<script type="text/javascript">alert("Teacher Added!");window.location=\'management.php\';</script>';


?>
</body>
</html>
