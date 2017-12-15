<?php session_start(); 
//including the database connection file
include_once("../includes/connection.php");

if(!isset($_SESSION['valid'])) {
	header('Location: ../login.php');
}

//fetching data in descending order, lastest entry first
$result = mysqli_query($mysqli, "SELECT * FROM albums WHERE added_by=".$_SESSION['id']." ORDER BY id DESC");
?>

<html>
<head>
	<title>Homepage</title>
</head>

<body>
	<a href="../index.php">Home</a> | <a href="add.php">Add New Album</a> |  <a href="../artist/add.html">Add New Artist</a> | <a href="logout.php">Logout</a>
	<br/><br/>
	
	<table width='80%' border=0>
		<tr bgcolor='#CCCCCC'>
			<td>Album Name</td>
			<td>Artist</td>
			<td>Date Added</td>
			<td>Update</td>
		</tr>
		<?php
		while($res = mysqli_fetch_array($result)) {		
			echo "<tr>";
			echo "<td>".$res['name']."</td>";
			echo "<td>".$res['artist_id']."</td>";
			echo "<td>".$res['date_added']."</td>";	
			echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
		}
		?>
	</table>	
</body>
</html>
