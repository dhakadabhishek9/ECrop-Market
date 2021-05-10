<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<?php

if(!empty($_POST["username"]) && !empty($_POST["password"]) && !empty($_POST["category"]))
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
$category=$_POST["category"];

if($category!='Admin')
{
if($category=='Farmer')
{
$statement="SELECT * FROM farmer where phone=?";
}
else if($category=='Vender')
{
	$statement="SELECT * FROM vender where phone=?";
}
$stmt=$conn->prepare($statement);
$stmt->bind_param("s",$username);
$stmt->execute();
$result=$stmt->get_result();
$row=$result->fetch_assoc();
$hash=$row["password"];

if($_POST["password"]==$hash)
{
	session_start();
	$_SESSION["username"]=$_POST["username"];
	$_SESSION["name"]=$row["name"];
	$_SESSION["category"]=$_POST["category"];
	if($category=='Farmer')
{
	header("Location:farmer_profile.php");
}
else{
	header("Location:vender_profile.php");
}
$conn->close();
}
else
{
	$conn->close();
	echo "Login Failed";
	echo "<br>";
	header("Location:reindex.php");
}
}
else
{
$password=$_POST["password"];
if($username=='1234567890' && $password=='qwerty')
{
	header("Location:admin.php");
}
else
{
	header("Location:reindex.php");
}
}
}
else
{
	header("Location:reindex.php");
}
?>
<body>
</body>
</html>