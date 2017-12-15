<?php 
session_start();
//including the database connection file
include_once("../includes/connection.php");
if(!isset($_SESSION['valid'])) {
	header('Location: ../login.php');
}

$result = mysqli_query($mysqli, "SELECT * FROM artists  ORDER BY id DESC");


if(isset($_POST['Submit'])) {	
	$name = $_POST['name'];
	$artist = $_POST['artist'];
	$loginId = $_SESSION['id'];
		
	// checking empty fields
	if(empty($name) || empty($artist) ) {
				
		if(empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($artist)) {
			echo "<font color='red'>Artist field is empty.</font><br/>";
		}
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result2 = mysqli_query($mysqli, "INSERT INTO albums(name, added_by, artist_id) VALUES('$name','$loginId', '$artist')");
		
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
	<a href="../index.php">Home</a> | <a href="view.php">View Albums</a> | <a href="logout.php">Logout</a>
	<br/><br/>

	<form action="add.php" method="post" name="form1">
		<table width="25%" border="0">
			<tr> 
				<td>Album Name</td>
				<td><input type="text" name="name"></td>
			</tr>
			<tr> 
				<td>Select Artist</td>
				<td>
				<select name="artist">
				<?php
				while($res = mysqli_fetch_array($result)) {		
					echo "<option value='".$res['id']."' >";
					echo $res['name'];
					echo "</option>";		
				}
				?>
				</select>
				</td>
			</tr>
			<tr> 
				<td></td>
				<td><input type="submit" name="Submit" value="Add"></td>
			</tr>
		</table>
	</form>
</body>
</html>

