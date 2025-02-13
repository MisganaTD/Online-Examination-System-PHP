<?php
if (!isset($_SESSION)) 
{
  session_start();
  
}
if(isset($_SESSION['department']))
{
?>


<?php
}
else{
$logoutGoTo = "../index.php";
header("Location: $logoutGoTo");
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Question Insertion</title>
</head>

<body>

<?php


    $department = $_SESSION['department'];
	
	$course=$_POST['course'];
	$year=$_POST['year'];
	$semister=$_POST['semister'];
	$catagory=$_POST['catagory'];
	$type=$_POST['type'];
	$question=$_POST['question'];
	$time=$_POST['time'];
	$tfAns=$_POST['tfAns'];
	$cAns=$_POST['cAns'];
	$a=$_POST['a'];
	$b=$_POST['b'];
	$c=$_POST['c'];
	$d=$_POST['d'];
	$e=$_POST['e'];
	
	
			
	
	$con = mysqli_connect ("localhost","root","","online");
	
	//mysqli_select_db("online", $con);
	//$sql = "insert into question  values('".$department."','".$course."','".$year."','".$semister."','".$catagory."','".$type."','".$question."','".$time."','".$tfAns."','".$cAns."','".$a."','".$b."','".$c."','".$d."','".$e."')";
	$sql = "insert into question(department,exam_course,year,semister,exam_catagory,question_type,question,Time,TFAnsewer,CAnsewer,option_a,option_b,option_c,option_d,option_e)  values('".$department."','".$course."','".$year."','".$semister."','".$catagory."','".$type."','".$question."','".$time."','".$tfAns."','".$cAns."','".$a."','".$b."','".$c."','".$d."','".$e."')";

	mysqli_query ($con,$sql);
	mysqli_close ($con);
	echo '<script type="text/javascript">alert("Question Added!");window.location=\'exam.php\';</script>';


?>
</body>
</html>