<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<style type="text/css">
   #content{
    width: 50%;
    margin: 20px auto;
    border: 1px solid #cbcbcb;
   }
   form{
    width: 50%;
    margin: 20px auto;
   }
   form div{
    margin-top: 5px;
   }
   #img_div{
    width: 80%;
    padding: 5px;
    margin: 15px auto;
    border: 1px solid #cbcbcb;
    background-color: white;
   }
   #img_div:after{
    content: "";
    display: block;
    clear: both;
    background-color: white;
   }
   img{
    float: left;
    margin: 5px;
    width: 300px;
    height: 250px;
   }
</style>

<body>
<marquee behavior="alternate" bgcolor="#d9d9ff" hspace="50" vspace="20" >Welcome To ECrop Market</marquee>
	<a href='bid.php'>Go Back</a>
	<div id="content">
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
$phoneno=$_SESSION["username"];
$_SESSION["img"]=$_POST["image"];
$img=$_SESSION["img"];
$name=$_SESSION["name"];


$statement="SELECT * FROM item where img=?";
$stmt=$conn->prepare($statement);
$stmt->bind_param("s",$img);
$stmt->execute();
$result=$stmt->get_result();
$row = mysqli_fetch_array($result);
      echo "<div id='img_div'>";
      	
        
        echo "<form action='check_bid.php' method='POST'>";
        echo "<img src='img/".$row['img']."' >"; 
        echo "<p>Phone No:".$row['phone']."</p>";
        echo "<p> Crop Name:".$row['cname']."</p>";
        echo "<p>Crop Desc:".$row['cdesc']."</p>";
        echo "<p>Address:".$row['address']."</p>";
        echo "<p>City:".$row['city']."</p>";
        echo "<p>Current Bid:</p>";
        $statement="SELECT * FROM bid where imgid=?";
$stmt=$conn->prepare($statement);
$stmt->bind_param("s",$img);
$stmt->execute();
$result=$stmt->get_result();
$row = mysqli_fetch_array($result);
$price=$row['price'];
			echo "<input class='text1' type='number' name='price' value='$price' required>";
			echo "<input type='text' name='img' value='$img' hidden>";
			echo "<input type='text' name='name' value='$name' hidden>";
			echo "<input type='text' name='username' value='$phoneno' hidden>";
      echo "<button class='button1' type='submit'><span>Increase Bid</span></button>";
      echo "<button class='button1' name='by10' value='by10'><span>Increase Bid by 10</span></button>";
		echo "<br><br>";
    $statement="SELECT * FROM bid where imgid=?";
$stmt=$conn->prepare($statement);
$stmt->bind_param("s",$img);
$stmt->execute();
$result=$stmt->get_result();
$row = mysqli_fetch_array($result);
    echo"<table>";
  echo  "<tr>";
  echo  "<th>Name</th>";
  echo  "<th>Phone</th>";
  echo  "<th>Price</th>";
    echo "</tr>";
    
echo "<tr><td>".$row['vname']."</td>";
echo "<td>".$row['phone']."</td>";
echo "<td>".$row['price']."</td></tr></table>";
        echo "</form>";
      echo "</div>";
?>
</div>
</body>
</html>