<?php

    $id=$_POST['id'];
	$name=$_POST['name'];
	$mname=$_POST['mname'];
	$lname = $_POST['lname'];
	$gender = $_POST['gender'];
	$age = $_POST['age'];
	$email = $_POST['email'];
	$department = $_POST['department'];
	$year = $_POST['year'];
	$semister = $_POST['semister'];
	$status = $_POST['status'];
	$address = $_POST['address'];
	$program = $_POST['program'];
	
	$full_name = $name." ".$mname." ".$lname;
	$con = mysqli_connect ("localhost","root","","online");
	
	//mysqli_select_db("online", $con);
	
	$sql = "insert into available_students(id,name,gender,age,email,address,program,department,class_year,semister,status)  values('".$id."','".$full_name."','".$gender."','".$age."','".$email."','".$address."','".$program."','".$department."','".$year."','".$semister."','".$status."')";
	// execute query
	mysqli_query ($con,$sql);
	$update = "UPDATE student_registration SET status='Active' WHERE id='$id'";
    $result = mysqli_query($con,$update);
	// Close The Connection
	mysqli_close ($con);
	echo '<script type="text/javascript">alert("Student Accepted!");window.location=\'students.php\';</script>';


?>
