<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{	

	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
	
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
			echo "<font color='red'>Email field is empty.</font><br/>";
		}		
	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE users SET name='$name',stock='$stock',location='$location' WHERE id=$id");
		
		//redirectig to the display page. In our case, it is index.php
		header("Location: index.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM users WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$name = $res['name'];
	$stock = $res['stock'];
	$location = $res['location'];
}
?>
<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
	<a href="index.php">Home</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>Name</td>
				<td><input type="text" name="name" value="<?php echo $name;?>"></td>
			</tr>
			<tr> 
				<td>Stock</td>
				<td><input type="text" name="stock" value="<?php echo $stock;?>"></td>
			</tr>
			<tr> 
				<td>Email</td>
				<td><input type="text" name="location" value="<?php echo $location;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
