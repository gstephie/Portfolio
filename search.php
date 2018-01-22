<html>
<body>
<h1>Select a property to be edited</h1>
<?PHP
session_start();

require_once ("dbConnection.php");

//if you didnt login you will be sent back to regLogForm.php
/*if (!(isset($_SESSION['admin']) && $_SESSION['admin'] != '')) 
{
	header ("Location: login.php");
}*/


$sql = "SELECT id,propname FROM properties";
$result = mysqli_query($connection, $sql);

if (mysqli_num_rows($result) > 0) 
{		
	while( $row = mysqli_fetch_assoc($result))
	{
		?>
		<a type='submit' action='propertyEditForm.php' value='submit'><?PHP echo "$row['id'] $row['propname']"?></a>
		<?PHP
		//echo $row['bName'];
		//echo "<option value=".$row['bName'].">".$row['bName']."</option>"; 
  	} 
	//echo "</p></select>";
	//echo "<button type='submit' name='submit' value='submit'>Submit Form</button>";
	//echo "</form>";
} else {
    echo "No results";
}
mysqli_close($connection);
?>
</body>
</html>



<input name="id" type="submit" value="<?php echo $row["id"]?>">
