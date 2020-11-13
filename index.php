  <?php include('create.php');?>
  <!DOCTYPE html>
  <html>
  <head>
      <title>Contact-Us</title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <link href="index.css" rel="stylesheet"/>
      <link rel="stylesheet" type="text/css" href="jquery/jquery-ui.css">

 </head>
  <body>
      <div class="container-fluid">
        <!-- card-view -->
        <div class="card" style="width: 30rem; top:100px;">
         <div class="bg-dark"><h4 class="card-title text-center" style="color: white; padding: 5px;">FORM</h4></div>
         <form  action="create.php" id="registrationForm" name="contact" method="post">
             <div class="card-body form-group">
             <div class="text-center" style="background-color: palegreen;"><h5 id="success" style="color: green;"></h5></div>
              <label for="name" style="color: #3e4852">Name</label>
              <input type="text" name="name" id="name" class="form-control form-rounded" placeholder="enter name" required=""> <br>

              <label for="email">Email  </label>
              <input type="email" name="email" id="email" class="form-control form-rounded" placeholder="email" required=""> <br>

              <label for="contact"> Mobile no. </label>
              <input type="Phone" name="contact" id="contact" class="form-control form-rounded" placeholder="contact number" required=""><br>

              <label for="dob"> DOB </label>
              <input type="text" name="dob" id="dob" class="form-control form-rounded"  placeholder="dd-mm-yyyy" required="" onblur ="ageCount()">  <br>
            <!--  // Age:<input type="text" id="age"> -->
              
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
      <div class="text-center">
                  <a href="view.php" class="btn submit" name="submit" id="submitBtn" type="submit" >View contact <span class="fa fa-arrow-right"></span></a>
      </div>
  </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

   
    <script src="jquery/jquery-ui.js"></script>
     <script src="jquery/jquery.js"></script>

  <!-- Recaptcha
   -->
   <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <script type="text/javascript">
     $(document).ready(function()){
      var age="";
      $('#dob').datepicker({
        onSelect :function(value,ui){
          var today=new Date();
          age =today.getFullYear()- ui.selectedYear;
          $('#age').val(age);
        },
      })
     }
  </script>

  </body>
  </html>