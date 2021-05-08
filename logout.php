<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
session_start();
if(isset($_SESSION["username"]))
{
	$_SESSION=array();
	session_destroy();
	echo "<h1>Thanks for coming</h1>";
	header("Location:index.php");
}
else
{
	header("Location:index.php");
}
?>
</body>
</html>