<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
session_start();
if(!empty($_POST["username"]) && !empty($_POST["code"]) && !empty($_POST["category"]) && !empty($_POST["name"]))
{
$DBHOST="localhost";
$DBUSER="root";
$DBPWD="";
$DBNAME="crop";

$conn=new mysqli($DBHOST,$DBUSER,$DBPWD,$DBNAME);
if($conn->connect_error)
{
	die("Connection failed!".$conn->connect_error);
}

$username=$_POST["username"];
$name=$_POST["name"];
$code=$_POST["code"];
$category=$_POST["category"];

if($category=='Farmer')
{
	$statement="SELECT * FROM farmer where phone=? and code=?";
}
else
{
	$statement="SELECT * FROM vender where phone=? and code=?";
}
$stmt=$conn->prepare($statement);
$stmt->bind_param("ss",$username,$code);
$stmt->execute();
$result=$stmt->get_result();
if($result->num_rows>=1)
{
	$_SESSION["username"]=$_POST["username"];
	$_SESSION["category"]=$_POST["category"];
header("Location:password.php");
}
else
{
	header("Location:forget2.php");
}
$conn->close();
}
else
{
	header("Location:forget.php");
}
?>
</body>
</html>