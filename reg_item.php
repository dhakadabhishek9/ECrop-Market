<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
if(!empty($_POST["cname"]) && !empty($_POST["cdesc"]) && !empty($_POST["address"]) && !empty($_FILES["image"]["name"]))
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

	$phone=$_POST["username"];
	$name=$_POST["name"];
	$cdesc=$_POST["cdesc"];
	$cname=$_POST["cname"];
	$city=$_POST["city"];
	$address=$_POST["address"];
	$image=$_FILES["image"]["name"];

	 $tempname = $_FILES["image"]["tmp_name"];    
        $folder = "img/".$image;
        move_uploaded_file($tempname, $folder);

$statement="insert into item(phone,cname,cdesc,img,address,city) values(?,?,?,?,?,?)";
$stmt=$conn->prepare($statement);
$stmt->bind_param("ssssss",$phone,$cname,$cdesc,$image,$address,$city);
$stmt->execute();
$statement="insert into receipt(fphone,fname,cname,address,city,img) values(?,?,?,?,?,?)";
$stmt=$conn->prepare($statement);
$stmt->bind_param("ssssss",$phone,$name,$cname,$address,$city,$image);
$stmt->execute();
$value="successful";
$conn->close();
header("Location:add_item.php?item=$value");
}
else{
	header("Location:add_item.php");
}
?>
</body>
</html>