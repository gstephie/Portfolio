<html>
<head>
<link rel="stylesheet" type="text/css" href="DDWcss.css">
<link rel="stylesheet" type="text/css" href="normalizer.css">
</head>
<body>
<?php
session_start();

require_once ("dbConnection.php");

//if you didnt login you will be sent back to regLogForm.php
if (!(isset($_SESSION['admin']) && $_SESSION['admin'] != '')) 
{
	header ("Location: login.php");
}

if (!isset( $_POST['submit'] )) 
{
	header ("Location: propertyForm.php");
}
else 
{
	$propname = $_POST['propertyName'];
	$address = $_POST['address'];
	$price = $_POST['price'];
	$dimensions = $_POST['dimensions'];
	

	$propname = mysqli_real_escape_string($connection, trim($_POST['propname']));
	$address = mysqli_real_escape_string($connection, trim($_POST['address']));
	$price = mysqli_real_escape_string($connection, trim($_POST['price']));
	$dimensions = mysqli_real_escape_string($connection, trim($_POST['dimensions']));


	$sql = "INSERT INTO properties (propname,address,price,dimensions) VALUES ('".$propname."','".$address."','".$price."','".$dimensions."')";
	
	if (!mysqli_query($connection, $sql)) {
		echo "Error: " . $sql . "<br>" . mysqli_error($connection);
	}
	else {
		header("Location:admin.php");
	}
	
mysqli_close($connection);
}

?>
</body>
</html>