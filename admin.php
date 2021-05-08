<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<marquee behavior="alternate" bgcolor="#d9d9ff" hspace="50" vspace="20" >Welcome To ECrop Market</marquee>
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
  echo  "<th>Name</th>";
  echo  "<th>Phone</th>";
  echo  "<th>Category</th>";
  echo  "<th>Delete</th>";
    echo "</tr>";
$statement="SELECT * FROM farmer";
$stmt=$conn->prepare($statement);
$stmt->execute();
$result=$stmt->get_result();
while($row = mysqli_fetch_array($result))
 {  
 $phon=$row['phone'];
echo " <form action='admin_delete_farmer.php' method='POST'><tr><td>".$row['name']."</td>";
echo "<td>".$row['phone']."</td>";
echo "<td>Farmer</td>";
echo "<td><button class='button1' type='submit' name='phon' value='$phon'>Delete</button></td></tr></form>";
}
$statement="SELECT * FROM vender";
$stmt=$conn->prepare($statement);
$stmt->execute();
$result=$stmt->get_result();
while($row = mysqli_fetch_array($result))
 {    
$phon=$row['phone'];
echo "<form action='admin_delete_vender.php' method='POST'><tr><td>".$row['name']."</td>";
echo "<td>".$row['phone']."</td>";
echo "<td>Vender</td>";
echo "<td><button class='button1'type='submit' name='phon' value='$phon'>Delete</button></td></tr></form>";
}
echo "</table><br>";
echo "<form action='admin_show_item.php' method='POST'>
<button class='button1' type='submit' align='center'> <span>Show Uploads</span></button>
</form>
";
echo "<form action='delete_item.php' method='POST'>
<button class='button1' type='submit'> <span>Delete Uploads</span></button>
</form>
";
?>
</body>
</html>