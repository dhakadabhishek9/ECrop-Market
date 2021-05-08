<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<marquee behavior="alternate" bgcolor="#d9d9ff" hspace="50" vspace="20" >Welcome To ECrop Market</marquee>
  <a href='farmer_profile.php'>Go Back</a>
	<form action='logout.php' method='POST'>
   <button class='button' type='submit'> <span>Logout</span></button>
  </form>

  <br>
  <br>
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
   echo"<table>";
  echo  "<tr>";
  echo  "<th>Farmer Name</th>";
  echo  "<th>Farmer Phone</th>";
  echo  "<th>Vender Name</th>";
  echo  "<th>Vender Phone</th>";
    echo  "<th>Crop Name</th>";
   echo  "<th>Price</th>";
  echo  "<th>Address</th>";
  echo  "<th>City</th>";
    echo "</tr>";
    $phone=$_SESSION["username"];
$statement="SELECT * FROM receipt where fphone=?";
$stmt=$conn->prepare($statement);
$stmt->bind_param("s",$phone);
$stmt->execute();
$result=$stmt->get_result();
if(mysqli_num_rows($result) > 0)
{
while($row = mysqli_fetch_array($result))
 {  
echo "<tr><td>".$row['fname']."</td>";
echo "<td>".$row['fphone']."</td>";
echo "<td>".$row['vname']."</td>";
echo "<td>".$row['vphone']."</td>";
echo "<td>".$row['cname']."</td>";
echo "<td>".$row['price']."</td>";
echo "<td>".$row['address']."</td>";
echo "<td>".$row['city']."</td></tr>";
}
echo "</table>";
}
else
{
  echo "<h2>No receipts Found</h2>";
}
?>
</body>
</html>