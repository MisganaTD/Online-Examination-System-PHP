<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<body>

<?php

$ans = $_POST['ans'];
	
$catagory = $_SESSION['catagory'];
$type = $_SESSION['type'];
$question = $_POST['Question'];
$a = $_SESSION['a'];
$b = $_SESSION['b'];
$c = $_SESSION['c'];
$d = $_SESSION['d'];
$e = $_SESSION['e'];
$TFans = $_SESSION['TFans'];
$Cans = $_SESSION['Cans'];
//$mark = $_SESSION['time'];
	
			
	$con = mysqli_connect ("localhost","root","");
	
	//mysqli_select_db("online", $con);
$sql = "insert into exam_ansewer  values('".$stud_id."','".$que_id."','".$course_code."','".$question."','".$a."','".$b."','".$c."','".$d."','".$e."','"        .$Cans."','".$ans."')";
	mysqli_query ($con,$sql);
	mysqli_close ($con);
	echo '<script type="text/javascript">alert("You submited your ansewer!");window.location=\'exam.php\';</script>';


?>

</body>
</html>
