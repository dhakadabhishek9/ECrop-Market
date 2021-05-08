<!DOCTYPE html>
<html>
<head>
<title></title>
<link rel="stylesheet" type="text/css" href="style.css">
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
</head>
<body>
  <marquee behavior="alternate" bgcolor="#d9d9ff" hspace="50" vspace="20" >Welcome To ECrop Market</marquee>
<a href='admin.php'>Go Back</a>

<div id="content">
 <?php
  $DBHOST="localhost";
$DBUSER="root";
$DBPWD="";
$DBNAME="crop";

$conn=new mysqli($DBHOST,$DBUSER,$DBPWD,$DBNAME);
if($conn->connect_error)
{
  die("Connection failed!".$conn->connect_error);
}
$statement="SELECT * FROM item";
$stmt=$conn->prepare($statement);
$stmt->execute();
$result=$stmt->get_result();
if(mysqli_num_rows($result) > 0)
{
  while ($row = mysqli_fetch_array($result)) 
  {
      echo "<div id='img_div'>";
        echo "<img src='img/".$row['img']."' >"; 
        echo "<p> Crop Name:".$row['cname']."</p>";
        echo "<p>Crop Desc:".$row['cdesc']."</p>";
        echo "<p>Address:".$row['address']."</p>";
        echo "<p>City:".$row['city']."</p>";
      echo "</div>";
    }
}
else{
echo "<h2>No Uploads</h2>";
}
?>
</div>
</body>
</html>