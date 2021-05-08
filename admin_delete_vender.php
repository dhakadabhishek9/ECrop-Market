<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<?php
$DBHOST="localhost";
$DBUSER="root";
$DBPWD="";
$DBNAME="crop";

$conn=new mysqli($DBHOST,$DBUSER,$DBPWD,$DBNAME);
if($conn->connect_error)
{
	die("Connection failed!".$conn->connect_error);
}

$phone=$_POST["phon"];

$statement="delete FROM vender where phone=?";
$stmt=$conn->prepare($statement);
$stmt->bind_param("s",$phone);
$stmt->execute();
$statement="delete FROM bid where phone=?";
$stmt=$conn->prepare($statement);
$stmt->bind_param("s",$phone);
$stmt->execute();
header("Location:admin.php");
$conn->close();

?>
<body>
</body>
</html>