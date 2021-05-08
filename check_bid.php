<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
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
$phoneno=$_POST["username"];
$name=$_POST["name"];
$img=$_POST["img"];
if($_POST["by10"]=="by10")
{$price=$_POST["price"]+10;}
else
{
	$price=$_POST["price"];
}


$statement="SELECT * FROM bid where imgid=?";
$stmt=$conn->prepare($statement);
$stmt->bind_param("s",$img);
$stmt->execute();
$result=$stmt->get_result();
if($result->num_rows<=0)
{
$statement="insert into bid values(?,?,?,?)";
$stmt=$conn->prepare($statement);
$stmt->bind_param("sssd",$img,$phoneno,$name,$price);
$stmt->execute();
}
else
{	
	$row = mysqli_fetch_array($result);
	if($row["price"]<$price)
	{
$statement="update bid set vname=?, phone=?,price=? where imgid=?";
$stmt=$conn->prepare($statement);
$stmt->bind_param("ssds",$name,$phoneno,$price,$img);
$stmt->execute();
	}
	
}
$statement="update receipt set vname=?, vphone=?,price=? where img=?";
$stmt=$conn->prepare($statement);
$stmt->bind_param("ssds",$name,$phoneno,$price,$img);
$stmt->execute();
header("Location:complete_bid2.php");
$conn->close();
?>
</body>
</html>