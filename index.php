<?php

include_once("config.php");

$result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id DESC"); // using mysqli_query instead

?>

<!-- Bootstrap library -->
<link rel="stylesheet" href="assets/bootstrap/bootstrap.min.css">
<!-- Stylesheet file -->
<link rel="stylesheet" href="assets/css/style.css">

<html>
<head>	
	<title>Homepage</title>
</head>
<div class="col-md-12 head">
    <div class="float-right">
        <a href="exportData.php" class="btn btn-success"><i class="dwn"></i> Export</a>
    </div>
</div>
<body>
<a href="add.html">Add New Data</a><br/><br/>

	<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td>Name</td>
		<td>Stock</td>
		<td>Email</td>
		<td>Update</td>
	</tr>
	<?php 
	while($res = mysqli_fetch_array($result)) { 		
		echo "<tr>";
		echo "<td>".$res['name']."</td>";
		echo "<td>".$res['stock']."</td>";
		echo "<td>".$res['location']."</td>";	
		echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
	}
	?>
	</table>
</body>
</html>
