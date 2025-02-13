<?php

   $id = $_GET['linkName'];
    $con = mysqli_connect ("localhost","root","","online");	
	//mysqli_select_db("online", $con);	
	
	$update = "UPDATE links SET status='active' WHERE linkName='".$id."'";
    $result = mysqli_query($con,$update);
	
	mysqli_close ($con);
	echo '<script type="text/javascript">alert("Link Enabled!");window.location=\'ManageLinks.php\';</script>';

?>