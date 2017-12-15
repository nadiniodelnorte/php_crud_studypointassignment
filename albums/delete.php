<?php session_start();
//including the database connection file
include_once("../includes/connection.php");
 if(!isset($_SESSION['valid'])) {
	header('Location: ../login.php');
}


//getting id of the data from url
$id = $_GET['id'];

//deleting the row from table
$result=mysqli_query($mysqli, "DELETE FROM products WHERE id=$id");

//redirecting to the display page (view.php in this case)
header("Location:view.php");
?>

