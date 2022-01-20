<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {	
	$name = mysqli_real_escape_string($mysqli, $_POST['name']);
	$stock = mysqli_real_escape_string($mysqli, $_POST['stock']);
	$location = mysqli_real_escape_string($mysqli, $_POST['location']);
		
	// checking empty fields
	if(empty($name) || empty($stock) || empty($location)) {
				
		if(empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($stock)) {
			echo "<font color='red'>Stock field is empty.</font><br/>";
		}
		
		if(empty($location)) {
			echo "<font color='red'>Location field is empty.</font><br/>";
		}
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO users(name,stock,location) VALUES('$name','$stock','$location')");
		
		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='index.php'>View Result</a>";
	}
}
?>
</body>
</html>
