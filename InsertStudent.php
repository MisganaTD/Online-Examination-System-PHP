<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Untitled Document</title>
</head>
<body>
<?php
	$name=$_POST['name'];
	$mname=$_POST['mname'];
	$lname=$_POST['lname'];
	$gender=$_POST['cmbGender'];
	$age=$_POST['age'];
	$address=$_POST['address'];
	$region=$_POST['cmbRegion'];
	$department=$_POST['cmbDepartment'];
	$program=$_POST['cmbProgram'];
	$phone=$_POST['phone'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$status = "Inactive";
	//$confirm=$_POST['confirmPass'];
	//$Status="Active";
	// Establish Connection with MYSQL
	$con = mysqli_connect ("localhost","root","","online");
	// Select Database
	//mysqli_select_db("online", $con);
	// Specify the query to Insert Record
	$sql = "insert into student_registration (name,mname,lname,gender,age,address,region,department,program,phone,email,password,status)  values('".$name."','".$mname."','".$lname."','".$gender."','".$age."','".$address."','".$region."','".$department."','".$program."','".$phone."','".$email."','".$password."','".$status."')";
	// execute query
	mysqli_query($con,$sql);
	// Close The Connection
	mysqli_close ($con);
	echo '<script type="text/javascript">alert("You are registered Succesfully!");window.location=\'student-registration.php\';</script>';
?>
</body>
</html>