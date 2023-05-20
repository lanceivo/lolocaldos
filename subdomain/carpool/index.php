<!doctype html>
<html lang="en">
<head>
  <title>Carpool App</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
 
</head>
<?php
    require 'Alert.php';
    ?>
<body class="d-flex align-items-center">
  <div class="container">
    <div class="row justify-content-center" style="margin:0px;">
      <div class="col-lg-6 col-md-8 login-box">
        <div class="col-lg-12 login-title">
          Sign Up
        </div>
        <div class="col-lg-12 login-form">
          <form action="Register.php" method="post">
            <div class="form-group">
              
              <input type="text" name="firstname" class="form-control" placeholder="Enter First Name:" required>
            </div>
            <div class="form-group">
              <input type="text" name="middlename" class="form-control" placeholder="Enter Middle Name:" required>
            </div>
            <div class="form-group">
              <input type="text" name="lastname" class="form-control" placeholder="Enter Last Name:" required>
            </div>
                <div class="form-group">
                  <input type="text" name="contactnum" class="form-control" placeholder="Enter Contact Number:" i required>
                </div>
                <div class="form-group">
                  <input type="text" name="brgy" class="form-control" placeholder="Enter Your Barangay:" i required>
                </div>
                <div class="form-group">
                  <input type="text" name="city" class="form-control" placeholder="Enter Municipality:" i required>
                </div>
                <div class="form-group">
                  <input type="text" name="province" class="form-control" placeholder="Enter Province:" i required>
                </div>
                <div class="form-group">
                    <input type="text" name="email" class="form-control" placeholder="Enter Email Address:" i required>
                  </div>
                  <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Enter Password:" i required>
                  </div>
                <div class="col-12 login-btm login-button justify-content-center d-flex">
                  <button type="submit" name="register" class="btn btn-outline-primary">Register</button>
                </div>
            </div>
            </form>
                  <h6>Already have an Account?<a href="login.php">Login</a></h6>
                  <center> <h6 style="color: #007FFF; top:10px "><?php if (isset($message)) { echo $message; } ?></h6></center>
          </div>  
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
      integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
      </script>
</body>
</html>
