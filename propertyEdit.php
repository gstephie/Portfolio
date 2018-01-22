<html>
<head>
<link rel="stylesheet" type="text/css" href="DDWcss.css">
<link rel="stylesheet" type="text/css" href="normalizer.css">
</head>
<body>
<?php
session_start();

require_once ("DBConnection.php");

//if you didnt login you will be sent back to regLogForm.php
/*if (!(isset($_SESSION['admin']) && $_SESSION['admin'] != '')) 
{
	header ("Location: login.php");
}*/

if (!isset( $_POST['submit'] )) 
{
	header ("Location: propertyEditForm.php");
}
else 
{
	$propname = $_POST['propertyName'];
	$address = $_POST['address'];
	$price = $_POST['price'];
	$dimensions = $_POST['dimensions'];
	$availability = $_POST['availability'];
	$id = $_POST['id'];


	$propname = mysqli_real_escape_string($connection, trim($_POST['propname']));
	$address = mysqli_real_escape_string($connection, trim($_POST['address']));
	$price = mysqli_real_escape_string($connection, trim($_POST['price']));
	$dimensions = mysqli_real_escape_string($connection, trim($_POST['dimensions']));
	$availability = mysqli_real_escape_string($connection, trim($_POST['availability']));
	$id = mysqli_real_escape_string($connection, trim($_POST['id']));

	
	$sql = "UPDATE properties SET propname='".$propname."', address='".$address."', price='".$price."', dimensions='".$dimensions."', availability='".$availability."' WHERE id='".$id."'";
	
	if (mysqli_query($connection, $sql)) {
		
		echo "<p>Record edited successfully</p>";
		echo "<a href=\"admin.php\">Go back</a>";
	} 


mysqli_close($connection);
}

?>
</body>
</html>