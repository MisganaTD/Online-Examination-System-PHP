<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Untitled Document</title>
</head>
<body>
<?php
 $eventId = $_GET['Id'];
    $event=$_POST['event']; //course
	$start=$_POST['start'];//date
	$end=$_POST['end'];    //year
	$con = mysqli_connect ("localhost","root","","online");
	//mysqli_select_db("online", $con);
	
	$update = "UPDATE examschedule SET examCourse = '".$event."',examDate = '".$start."', year = '".$end."' WHERE examCourse = '".$eventId."'";
    $result = mysqli_query($con,$update);
	mysqli_close ($con);
	echo '<script type="text/javascript">alert("Record Updated Successfully!");window.location=\'manage_schedule.php\';</script>';


?>

</body>
</html>
