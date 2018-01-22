<html>
<head>
	
   <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- <link href="css/new.css" rel="stylesheet">-->

    <!-- Custom fonts for this template -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="css/agency.min.css" rel="stylesheet">

		
</head>
<body>
<h1>Select a property to be edited</h1>
<?PHP
session_start();

require_once ("dbConnection.php");

//if you didnt login you will be sent back to regLogForm.php
/*if (!(isset($_SESSION['admin']) && $_SESSION['admin'] != '')) 
{
	header ("Location: login.html");
}*/
?>
<section id="offices" class="lg-3">

<?php  
$sql = "SELECT * FROM properties";
$result = mysqli_query($connection, $sql);
$row = mysqli_fetch_array($result);

if (mysqli_num_rows($result) > 0) 
{
	while($row = mysqli_fetch_assoc($result)) 
	{ 
	?>         
        <!--<div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
				<div class="card h-100">
					<div class="card-body">
						<h4 class="card-title">-->
						
						<form method="post" action="propertyEditForm.php" >
							<table>
							<tr><td><input type="submit" name="id" value="<?PHP echo $row['id']?>"></td>
							<!--<td><input type="text" name="id" value="<?PHP echo $row['id']?>"></td>-->
							</table>
							</form>
						
						
						<!--<form action="propertyEditForm.php" method="POST">
							
							<input id="propertyName" type="text" name="id" value="<?PHP echo $row["id"]?>"> <br/>
							
						<label>Name of Property: </label>
							<input id="propertyName" type="text" name="propname" value="<?PHP echo $row["propname"]?>"> <br/>
							<label>Address: </label>
							<input id="address" type="text" name="address" value="<?PHP echo $row["address"]?>"> <br/>
							<label>Price: </label>
							<input id="price" type="text" name="price" value="<?PHP echo $row["price"]?>"> <br/>
							<label>Dimensions: </label>
							<input id="dimensions" type="text" name="dimensions" value="<?PHP echo $row["dimensions"]?>"> <br/>
							<label>Availability: </label>
							<input id="availability" type="text" name="availability" value="<?PHP echo $row["availability"]?>"> <br/>
						
						<input type="submit" name="submit" value="Select this property to edit"><br/>
                </div>
            </div>
		</div>
    </div>
</section>-->

	<?php            
	}
} 
else 
{
    echo "No results";
}
?>
    </div>
	
<?php mysqli_close($connection);?>


    <!-- Bootstrap core JavaScript -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="js/jquery.easing.min.js"></script>

    <!-- Contact form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/agency.min.js"></script>
</body>
</html>