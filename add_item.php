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
$username=$_SESSION["username"];
$name=$_SESSION["name"];
echo "<form  class='add_buyer_form' action='reg_item.php' method='POST' enctype='multipart/form-data'>";
	if(isset($_GET["item"]))
	{
	if($_GET["item"]=="successful")
		{
			echo "<h3>Successfully Added.Add new</h3>";
		}
	}
		else{
		echo "<h3>Add Details</h3>";
		}
echo "<br>";

	echo "<input class='text' type='text' name='username' placeholder='Phone' value='$username' hidden>";
	echo "<input class='text' type='text' name='name' value='$name' hidden>";
	echo "<br>";

echo "<label class='label'  for='cname'>Crop Name:</label>";
echo "<input class='text' type='text' name='cname' placeholder='Crop Name' required>";
echo "<br>";

echo "<label class='label'  for='cdesc'>Crop Description:</label>";
	echo "<input class='text' type='text' name='cdesc' placeholder='Crop Description' required>";
	echo "<br>";

echo "<label class='label'  for='address'>Address:</label>";
	echo "<input class='text' type='text' name='address' placeholder='Address' required>";
	echo "<br>";

	echo "<label class='label'  for='city'>City:</label>";
	echo "<input class='text' type='text' name='city' placeholder='City' required>";
	echo "<br>";

	echo "<label class='label'  for='img'>Image:</label>";
	echo "<input class='button1' type='file' name='image' required>";
	echo "<br>";

echo "<button class='button' type='submit'> <span>Add</span></button>";
echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href='farmer_profile.php'>Go back</a>";

echo "</form>";

$conn->close();
}
?>
</body>
</html>