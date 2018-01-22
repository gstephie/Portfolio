<html>
<head>
</head>
<body>
<nav>
	<ul class="nav-l">
		<li ><a href="main.php">Back to Website</a></li>
		<li ><a href="logout.php">Logout</a></li>
	</ul>
</nav>

<?php 
session_start();
require_once ("dbConnection.php");

//if you didnt login you will be sent back to regLogForm.php
if (!(isset($_SESSION['admin']) && $_SESSION['admin'] != '')) 
{
	header ("Location: login.php");
}	
	
?>
<h1>Add a Property</h1> 


<form action="propertyAdd.php" method="post">

<label>Name of Property: </label>
	<input id="propertyName" type="text" name="propertyName"> <br/>
	<label>Address: </label>
	<input id="address" type="text" name="address"> <br/>
	<label>Price: </label>
	<input id="price" type="text" name="price"> <br/>
	<label>Dimensions: </label>
	<input id="dimensions" type="text" name="dimensions"> <br/>
	<!--<label>Image: </label>
	<input id="image" type="text" name="image"> <br/>
-->
	
	<input type="submit" name="submit"><br/>

	</form>
</body>
</html>