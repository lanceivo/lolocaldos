<!doctype html>
<html lang="en">
<head>
  <title>Login User   </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link href="css/login.css" rel="stylesheet">
  <link rel="stylesheet" href="css/index.css">
  <link rel="icon" type="png" href="img/s1.png">

</head>
<body class="d-flex align-items-center">
  <?php
    require 'Alert.php';
?>
  <div class="container">
  <center><p style="margin-top: 3%; margin-bottom:-5%;" >Welcome-To-Carpool-App</p></center>
    <div class="row justify-content-center" style="margin:20px;">
      <div class="col-lg-6 col-md-8 login-box">
        <div class="col-lg-12 login-title">
        
          Login Form
        </div>
        <div class="col-lg-12 login-form">
          <form action="login_process.php" method="post">
            <div class="form-group">
              <label class="form-control-label">Email</label>
              <input type="text" name="email" class="form-control" required>
            </div>
                <div class="form-group">
                  <label class="form-control-label">Password</label>
                  <input type="password" name="password" class="form-control" i required>
                </div>
                <div class="col-12 login-btm login-button justify-content-center d-flex">
                  <input type="submit" name="sent" class="btn btn-outline-primary" value="Login">
                  
                </div>
                <h6>Don't have an Account?<a href="index.php">Register</a></h6>  
            </div>
            </form>
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
