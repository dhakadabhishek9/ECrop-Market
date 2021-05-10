<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<marquee behavior="alternate" bgcolor="#d9d9ff" hspace="50" vspace="20" >Welcome To ECrop Market</marquee>
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

$username=$_SESSION["username"];
$category=$_SESSION["category"];

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
$row=mysqli_fetch_array($result);
$name=$row['name'];
$password=$row['password'];
echo "<form action='' class='add_buyer_form' method='POST'>";
echo "<h3>Welcome $name.</h3><br><h3>Your Password is : $password.</h3>";
echo "<br><a href='index.php'>Login</a>";
echo "</form>";
$conn->close();

?>
</body>
</html>