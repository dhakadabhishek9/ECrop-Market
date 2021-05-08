<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<marquee behavior="alternate" bgcolor="#d9d9ff" hspace="50" vspace="20" >Welcome To ECrop Market</marquee>
<?php

session_start();
if(!isset($_SESSION["username"]))
{
	header("Location:login.php");
}
else
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
$name=$_SESSION["name"];
echo "<form  class='add_buyer_form' action='delete_farmer.php' method='POST'>";
echo "<h2>Welcome $name</h2>";
echo "<a href='add_item.php'>Add Crop Details</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
echo "<a href='view_my_item.php'>View My Uploads</a>";
echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href='freceipt.php'>My Receipts</a><br><br>";
echo "<button class='button' type='submit'> <span>Delete</span></button>";
echo "</form>";
echo "<form  class='add_buyer_form' action='logout.php' method='POST'>";
echo "<button class='button' type='submit'> <span>Logout</span></button>";
echo "</form>";

}
?>
</body>
</html>