<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
if(!empty($_POST["username"]) && !empty($_POST["password"]) && !empty($_POST["category"]) && !empty($_POST["name"]))
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
$password=$_POST["password"];
$category=$_POST["category"];

$hashed=password_hash($password, PASSWORD_DEFAULT);

if($category=='Farmer')
{
	$statement="SELECT * FROM farmer where phone=?";
}
else
{
	$statement="SELECT * FROM vender where phone=?";
}
$stmt=$conn->prepare($statement);
$stmt->bind_param("s",$username);
$stmt->execute();
$result=$stmt->get_result();
if($result->num_rows>=1)
{
	$value="duplicate";
	header("Location:add_user.php?user=$value");
}
else
{	if($category=="Farmer")
	{
		$statement="insert into farmer(phone,name,password) values(?,?,?)";
	}
	else
	{
		$statement="insert into vender(phone,name,password) values(?,?,?)";
	}
$stmt=$conn->prepare($statement);
$stmt->bind_param("sss",$username,$name,$hashed);
$stmt->execute();
	$value="successful";
	header("Location:index.php?user=$value");
}

$conn->close();
}
else
{
	header("Location:add_user.php");
}
?>
</body>
</html>