<?php
include('dbconfig.php');
$id=$_REQUEST['id'];

$query = "DELETE FROM Form WHERE id=$id"; 


if(mysqli_query($conn,$query)){
	
	echo '<div style="background-color:palegreen;" class="text-center"><h5 style="color:green;">Record Deleted Successfully<h5></div>';
	header("Location: view.php"); 
}
?>