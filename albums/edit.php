<?php session_start();
// including the database connection file
include_once("../includes/connection.php");

if(!isset($_SESSION['valid'])) {
	header('Location: ../login.php');
}

if(isset($_POST['update']))
{	
	$id = $_POST['id'];
	$name = $_POST['name'];
	$artist = $_POST['artist'];
	// checking empty fields				
		if(empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE albums SET name='$name', artist_id='$artist'  WHERE id=$id");
		
		//redirectig to the display page. In this case, it is view.php
		header("Location: view.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result2 = mysqli_query($mysqli, "SELECT * FROM albums WHERE id=$id");
$res2 = mysqli_fetch_array($result2);
$name = $res2['name'];
$artist = $res2['artist_id'];
?>
<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
	<a href="../index.php">Home</a> | <a href="view.php">View Artists</a> | <a href="logout.php">Logout</a>
	<br/><br/>
	<form action="" method="post" name="form1">
		<table width="25%" border="0">
			<tr> 
				<td>Album Name</td>
				<td><input type="text" name="name" value="<?php echo $name;?>"></td>
			</tr>
			<tr> 
				<td>Select Artist</td>
				<td>
				<select name="artist">
				<?php
				$result = mysqli_query($mysqli, "SELECT * FROM artists  ORDER BY id DESC");
				while($res = mysqli_fetch_array($result)) {	
					$selected = '';
					if($res['id'] == $artist) {
						$selected = 'selected';
					}
					echo "<option value='".$res['id']."' $selected>";
					echo $res['name'];
					echo "</option>";		
				}
				?>
				</select>
				</td>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>

			</tr>
			<tr> 
				<td></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
