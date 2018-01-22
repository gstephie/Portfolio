<html>
<body>

<?php 
session_start();
require_once ("dbConnection.php");

//if you didnt login you will be sent back to admin login
/*if (!(isset($_SESSION['admin']) && $_SESSION['admin'] != '')) 
{
	header ("Location: login.php");
}*/


//$propname = $_GET['propname'];
$id = $_POST['id'];

if(isset( $_POST['delete'] )) //check if there is a book selected
{
	$del = mysql_query("DELETE FROM properties WHERE id= '$id'");
	header ("Location:search.php");
}

else
{
	if(isset($_POST['id']) && $_POST['id']=='')//check if there is a book selected
	{
		echo "You did not select a property";
	}
	else
	{
		$sql = "SELECT * FROM properties WHERE id=$id";
		$result = mysqli_query($connection, $sql);
		$row = mysqli_fetch_array($result);
				   
				 
		if (mysqli_num_rows($result) > 0) 
		{
			
			echo "<br></br><br></br><br></br>";
			echo "<form method='post' action='propertyEdit.php'>";
				
				echo "<input id='id' type='text' name='id' value='".$row['id']."'> <br/>";

				echo "<label>Name of Property: </label>";
				echo "<input id='propertyName' type='text' name='propertyName' value='".$row['propname']."'> <br/>";
				echo "<label>Address: </label>";
				echo "<input id='address' type='text' name='address' value='".$row['address']."'> <br/>";
				echo "<label>Price:  </label>";
				echo "<input id='price' type='text' name='price' value='".$row['price']."'> <br/>";
				echo "<label>Dimensions: </label>";
				echo "<input id='dimensions' type='text' name='dimensions' value='".$row['dimensions']."'> <br/>";
				echo "<label>Availability: </label>";
				echo "<input id='availability' type='text' name='availability' value='".$row['availability']."'> <br/>";
				//"<label>Image: </label>
				//<input id='image' type='text' name='image'> <br/>
				echo "<input name='submit' type='submit' value='submit'>";
				echo "</form>";
		}

	}
}
mysqli_close($connection);	
?>

</body>
</html>