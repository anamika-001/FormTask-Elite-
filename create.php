

  <?php
$servername  = "localhost:8080"; 
$username = "root"; 
$dbpassword = "123456";
$dbname = "taskdb"; 
 
// Create database connection 
$conn = mysqli_connect($servername, $username, $dbpassword, $dbname); 


 
// Check connection 
if (!$conn) { 
    die("Connection failed: ".mysqli_connect_error()); 
}
else{

	if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['contact']) && isset($_POST['dob'])){
	
      $name=$_POST['name'];
    
      
      $email=$_POST['email'];
      $contact=$_POST['contact'];
      $dob=$_POST['dob'];
      
      
      $sql="INSERT INTO Form(name,email,contact,dob)VALUES('$name','$email','$contact','$dob')";

                
	if(mysqli_query($conn,$sql)){
		echo '<div style="background-color:palegreen;" class="text-center"><h3 style="color:green;">Record Added Successfully</h3></div>';
		 header("refresh:2;url=view.php");
	
	}else{
		echo '<div style="background-color:#ffcccb;"><h2 style="color:red;">Error!<h2></div>';
		
		
	}
	mysqli_close($conn);
    
   }
   // else{
   // 	echo '<div style="background-color:#ffcccb;"><h2>Sorry there is something wrong!!</h2></div>';
   // }
 }  

  ?>