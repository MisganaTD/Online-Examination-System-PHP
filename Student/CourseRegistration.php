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

   $id = $_SESSION['id'];
	$con = mysqli_connect ("localhost","root","");
	
	//mysqli_select_db("online", $con);
	$update = "UPDATE  available_students SET registered='yes' WHERE id='$id'";
    $result = mysqli_query($con,$update);
	// Close The Connection
	mysqli_close ($con);
	echo '<script type="text/javascript">alert("Registered Succefully!");window.location=\'course_registration.php\';</script>';


?>

</body>
</html>
