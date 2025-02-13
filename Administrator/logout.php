<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Online Examination</title>
</head>

<body>
<?php
// *** Logout the current user.
$logoutGoTo = "../index.php";
if (!isset($_SESSION)) {
  session_start();
}
$_SESSION['email'] = NULL;
$_SESSION['password'] = NULL;
session_destroy();
unset($_SESSION['email']);
unset($_SESSION['password']);
if ($logoutGoTo != "") {header("Location: $logoutGoTo");
exit;
}
?>
</body>
</html>
