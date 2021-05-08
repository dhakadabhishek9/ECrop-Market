<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
	
</head>
<body>
	<marquee behavior="alternate" bgcolor="#d9d9ff" hspace="50" vspace="20" >Welcome To ECrop Market</marquee>
<?php
	echo "<form  class='add_buyer_form' action='check_user.php' method='POST'>";
	if(isset($_GET["user"]))
	{
	if($_GET["user"]=="successful")
		{
			echo "<h3>Successfully added User</h3>";
		}
		else if($_GET["user"]=="duplicate")
		{
			echo "<h3>User already exists.Please enter another Username and password</h3>";
		}
	}
		else{
		echo "<h3>Please Add Details</h3>";
		}
	

	echo "<label class='label'  for='username'>Phone:</label>";
	echo "<input class='text' type='text' name='username' placeholder='Phone' required>";
	echo "<br>";

	echo "<label class='label'  for='name'>Name:</label>";
	echo "<input class='text' type='text' name='name' placeholder='Name' required>";
	echo "<br>";

	echo "<label class='label' for='password'>Password:</label>";
	echo "<input class='password'  type='password' name='password' placeholder='Password' required>";
	echo "<br>";

	echo "<label for='category' class='label'>Category:</label>";

echo "<select name='category' class='text' required>";
echo  "<option value='0'>Select</option>";
echo  "<option value='Farmer'>Farmer</option>";
echo  "<option value='Vender'>Vender</option>";
echo "</select>"; 
echo "<br>";
echo "<br>";
	echo "<button class='button' type='submit'> <span>SignUp</span></button>";
	echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href='index.php'>Login</a>";
	echo "</form>";
?>
</body>
</html>