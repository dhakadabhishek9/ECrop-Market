<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<?php
session_start();
$DBHOST="localhost";
$DBUSER="root";
$DBPWD="";
$DBNAME="crop";

$conn=new mysqli($DBHOST,$DBUSER,$DBPWD,$DBNAME);
if($conn->connect_error)
{
	die("Connection failed!".$conn->connect_error);
}

$username=$_SESSION["username"];

$statement="delete FROM vender where phone=?";
$stmt=$conn->prepare($statement);
$stmt->bind_param("s",$username);
$stmt->execute();
$statement="delete FROM bid where phone=?";
$stmt=$conn->prepare($statement);
$stmt->bind_param("s",$username);
$stmt->execute();
$value="deleted";
header("Location:index.php?user=$value");
$conn->close();

?>
<body>
</body>
</html>