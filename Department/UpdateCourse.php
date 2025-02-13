<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Untitled Document</title>
</head>
<body>
<?php
$courseId = $_GET['CourseId'];
    $code=$_POST['code'];
	$name=$_POST['name'];
	$credit=$_POST['credit'];
	$year = $_POST['year'];
	$semister = $_POST['semister'];
	
			
	$con = mysqli_connect ("localhost","root","","online");
	
	//mysqli_select_db("online", $con);
	
	$update = "UPDATE course SET course_code = '".$code."',course_title = '".$name."', credit_hour = '".$credit."', year = '".$year."', semister = '".$semister."' WHERE course_code = '".$courseId."'";
    $result = mysqli_query($con,$update);
	mysqli_close ($con);
	echo '<script type="text/javascript">alert("Record Updated Successfully!");window.location=\'manage_course.php\';</script>';


?>

</body>
</html>
