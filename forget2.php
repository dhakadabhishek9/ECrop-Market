<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
	
</head>
<body>
	<marquee behavior="alternate" bgcolor="#d9d9ff" hspace="50" vspace="20" >Welcome To ECrop Market</marquee>
<?php
echo "<form  class='add_buyer_form' action='check_code.php' method='POST'>";
echo "<h3>Invalid Credentials.Please try again.</h3>";
	echo "<label class='label'  for='username'>Phone:</label>";
	echo "<input class='text' type='number' name='username' min='6600000000' max='9999999999' placeholder='Phone' required>";
	echo "<br>";

	echo "<label class='label'  for='name'>Name:</label>";
	echo "<input class='text' type='text' name='name' placeholder='Name' required>";
	echo "<br>";

	echo "<br>";
	echo "<label class='label' for='Code'>Secret Code:</label>";
	echo "<input class='text'  type='text' name='code' placeholder='Secret Code' required>";
	echo "<br>";

	echo "<label for='category' class='label'>Category:</label>";

echo "<select name='category' class='text' required>";
echo  "<option value='0'>Select</option>";
echo  "<option value='Farmer'>Farmer</option>";
echo  "<option value='Vender'>Vender</option>";
echo "</select>"; 
echo "<br>";
echo "<br>";
	echo "<button class='button1' type='submit'> <span>Show Password</span></button>";
	echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href='index.php'>Login</a>";
	echo "</form>";
?>
</body>
</html>