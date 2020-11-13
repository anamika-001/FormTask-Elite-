  <?php include('create.php');?>
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
              <input type="date" name="dob" id="dob" class="form-control form-rounded"  placeholder="dd-mm-yyyy" required="" onblur ="ageCount()">  <br>
              
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

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="dist/jquery.validate.min.js"></script>
  <!-- Recaptcha
   -->
   <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <script type="text/javascript">
     function ageCount() {
      var date1 = new Date();
      var dob = document.getElementById("dob").value;
      var date2 = new Date(dob);
      var pattern = /^\d{1,2}\/\d{1,2}\/\d{4}$/;
      //Regex to validate date format (dd/mm/yyyy)       
      if (pattern.test(dob)) {
          var y1 = date1.getFullYear();
          //getting current year            
          var y2 = date2.getFullYear();
          //getting dob year            
          var age = y1 - y2;
          //calculating age                       
          document.getElementById("ageId").value = age;
          doucment.getElementById("ageId").focus ();
          return true;
      } else {
          alert("Invalid date format. Please Input in (dd/mm/yyyy) format!");
          return false;
      }

  }
  </script>

  </body>
  </html>