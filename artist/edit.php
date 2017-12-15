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
	// checking empty fields				
		if(empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE artists SET name='$name' WHERE id=$id");
		
		//redirectig to the display page. In this case, it is view.php
		header("Location: view.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM artists WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$name = $res['name'];
}
?>
<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
	<a href="index.php">Home</a> | <a href="view.php">View Artists</a> | <a href="logout.php">Logout</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>Name</td>
				<td><input type="text" name="name" value="<?php echo $name;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
