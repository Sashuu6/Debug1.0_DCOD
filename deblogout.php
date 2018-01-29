<?php
ob_start();
session_start();
error_reporting(0);
if($_SESSION['uname']!="" && isset($_POST['logout']))
{
	//if(isset($_GET['hel'])==1)
	//{
session_destroy();
 header("location:index.php");
	//}
}

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>