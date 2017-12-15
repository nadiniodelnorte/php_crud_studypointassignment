<?php
session_start();
include_once("../includes/connection.php");
 if(isset($_POST['Submit'])) {	
	$name = $_POST['name'];
	$loginId = $_SESSION['id'];
		
	// checking empty fields
	if(empty($name)) {
				
		if(empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO artists(name, added_by) VALUES('".$name."', '".$loginId."')");
		
		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='view.php'>View Result</a>";
	}
}
?>
<html>
<head>
	<title>Add Data</title>
</head>

<body>
	<a href="../index.php">Home</a> | <a href="view.php">View Artists</a> | <a href="logout.php">Logout</a>
	<br/><br/>

	<form action="" method="post" name="form1">
		<table width="25%" border="0">
			<tr> 
				<td>Artist Name</td>
				<td><input type="text" name="name"></td>
			</tr>
			<tr> 
				<td></td>
				<td><input type="submit" name="Submit" value="Add"></td>
			</tr>
		</table>
	</form>
</body>
</html>

