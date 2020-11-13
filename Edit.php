<?php
    include('dbconfig.php');
    // taking id from url
    $id=$_REQUEST['id'];
    $query = "SELECT * from Form where id='$id'"; 
    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_assoc($result); 
   

  // submitting updated field in database
  if(isset($_POST['submit'])) {
    
    $name =$_POST['name'];
    
    $email =$_POST['email'];
    $contact =$_POST['contact'];
    $dob =$_POST['dob'];
    print_r($dob);
    
    // query for update record

 
        $update="update `Form` SET name='$name', email='$email',contact='$contact',dob='$dob' where id='$id'";
          mysqli_query($conn, $update) or die(mysqli_error());
        if(mysqli_query($conn,$update)){ 
                echo '<div style="background-color:palegreen;" class="text-center"><h5 style="color:green;">Record Updated Successfully<h5></div>';
                  header( "refresh:2;url=view.php" );
             }
        else{
          echo '<div style="background-color:#ffcccb;"><h5 style="color:red;">Error!<h5></div>';
            }
      }
       
   ?>
<!-- html form for edit form field -->

<!DOCTYPE html>
<html>
<head>
    <title>Contact-Us</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="index.css" rel="stylesheet"/>

</head>
<body>
    <div class="container-fluid">
        
        <!-- card-view -->
      <div class="card" style="width: 30rem; top:100px;">
       <div class="bg-dark"><h4 class="card-title text-center" style="color: white; padding: 5px;">FORM</h4></div>
       <form  action="" id="registerform" name="contact" method="post">
           <div class="card-body form-group">
             <div class="text-center" style="background-color: palegreen;"><h5 id="success" style="color: green;"></h5></div>
            <label for="name" style="color: #3e4852">Name</label>
            <input type="text" name="name" id="name" class="form-control form-rounded" placeholder="enter name" value="<?php echo $row['name']; ?>" required="">

            
            <br>
            <label for="email">Email  </label>
            <input type="email" name="email" id="email" class="form-control form-rounded" placeholder="email" required="" value="<?php echo $row['email']; ?>">

            <br>
            <label for="contact"> Mobile no. </label>
            <input type="Phone" name="contact" id="contact" class="form-control form-rounded" placeholder="contact number" required="" value="<?php echo $row['contact']; ?> ">

            <br>

            <label for="dob"> DOB </label>
            <input type="text" name="dob" id="dob" class="form-control form-rounded" placeholder="Date of Birth" required="" value="<?php echo $row['dob']; ?> ">
            <br>
          
            <div class="g-recaptcha" data-sitekey="<?php echo "6Leba-IZAAAAAM_AQUmocYuYPD2ZOjMT7NIMkJB8" ?>"></div>
            <?php //reCAPTCHA validation
           if (isset($_POST['g-recaptcha-response'])) {
               require('src/autoload.php');        
               $recaptcha = new \ReCaptcha\ReCaptcha("6Leba-IZAAAAAM_AQUmocYuYPD2ZOjMT7NIMkJB8");
               $resp = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);
               if (!$resp->isSuccess()) {
                        $output = json_encode(array('type'=>'error', 'text' => '<b>Captcha</b> Validation Required!'));
                        die($output);               
                  } 
            }
           ?>
             <br>
            <div class="text-center">
                <button class="btn submit" name="submit" id="submitBtn" type="submit" >SUBMIT <span class="fa fa-arrow-right"></span></button>
            </div>
           

            

        </div>
    </form>

    


</div>
</div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="dist/jquery.validate.min.js"></script>

<!-- Recaptcha
 -->
 <script src="https://www.google.com/recaptcha/api.js" async defer></script>

</body>
</html>