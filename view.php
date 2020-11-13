
<?php
	 // datbase connection and form data file
include('dbconfig.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>table</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
</head>
<body>
	<div class="container-fluid">
	<table class="text-center table table-striped table-hover" style="width: 100%;">
  <thead class="thead-dark">
    <tr>
      <th scope="col">S.no.</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Contact</th>
      <th scope="col">DOB</th>
       <th scope="col">Edit</th>
       <th scope="col">Delete</th>
   </tr>
  </thead>
  <tbody>
    <?php
	$count=1;
	$query="Select * from Form ORDER BY id ASC;";
	$result = mysqli_query($conn,$query);
	while($row = mysqli_fetch_assoc($result)) {
	 ?>
	<tr>
	<td scope="row" align="center"><?php echo $count; ?></td>
	
	<td align="center"><?php echo $row["name"]; ?></td>
	
	<td align="center"><?php echo $row["email"]; ?></td>
	<td align="center"><?php echo $row["contact"]; ?></td>
	
	<td align="center"><?php echo $row["dob"]; ?></td>
	<!-- edit and delete button -->
	<td align="center">
	
	<a href="edit.php?id=<?php echo $row["id"]; ?>"><i class="material-icons">&#xE254;</i></a>
	</td>
	<td align="center">
	<a href="delete.php?id=<?php echo $row["id"]; ?>" onClick="return confirm('are you sure you want to delete??');"><i class="material-icons">&#xE872;</i></a>
	</td>
	</tr>
	<?php $count++; } ?>
</table>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>