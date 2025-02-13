<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Untitled Document</title>
</head>
<body>
<?php
$dept = $_GET['Department'];
     $department = $_POST['department'];
	$faculty=$_POST['faculty'];
	$phone=$_POST['phone'];
	$email = $_POST['email'];
	
			
	$con = mysqli_connect ("localhost","root","","online");
	
	//mysqli_select_db("online", $con);
	
	$update = "UPDATE department_registration SET department = '".$department."',faculty = '".$faculty."', phone = '".$phone."', email = '".$email."' WHERE department = '".$dept."'";
    $result = mysqli_query($con,$update);
	mysqli_close ($con);
	echo '<script type="text/javascript">alert("Department Updated Successfully!");window.location=\'manage_departments.php\';</script>';


?>

</body>
</html>
