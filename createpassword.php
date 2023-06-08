<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Forgot-Password-LoloCaldos</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link rel="icon" type="png" href="assets/img/logo.png">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/login_register.css">
</head>

<body>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="index.html">LOLO CALDOS</a></h1>


      <nav id="navbar" class="navbar">
        <ul>
          <li><a  href="index.html">Home</a></li>
          <li><a href="service.php">Services</a></li>
          <li><a href="about.html">About</a></li>
          <li><a href="gallery.html">Gallery</a></li>
          <li class="dropdown"><a href="#" class="active"><span>Admin</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="login_register.html">Login</a></li>       
            </ul>
          </li>
          <li><a href="contact.php">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- LOGIN | REGISTER  -->
  <div class="section">
    <div class="container" style="margin-top: 5%;">
        <div class="row full-height justify-content-center">
            <div class="col-12 text-center align-self-center py-5">
                <div class="section pb-5 pt-5 pt-sm-2 text-center">
                    <form action="forgotpassword_process.php" method="post">
                        <h6 class="mb-0 pb-3"><span>Log In </span><span>Sign Up</span></h6>
                        <input class="checkbox" type="checkbox" id="reg-log" name="reg-log"/>
                        <label for="reg-log"></label>
                      <div class="card-3d-wrap mx-auto">
                          <div class="card-3d-wrapper">
                              <div class="card-front">
                                  <div class="center-wrap">
                                      <div class="section text-center">
                                          <h4 class="mb-4 pb-3">New Password</h4>
                                          <input type="hidden" name="token" value="<?php if(isset($_GET['token'])){echo $_GET['token'];}?>">
                                          <div class="form-group">
                                              <input type="email" name="email" class="form-style" placeholder="Email Address" value="<?php if(isset($_GET['email'])){echo $_GET['email'];}?>">
                                              <i class="input-icon uil uil-at"></i>
                                          </div>
                                          <div class="form-group">
                                              <input type="text" name="new_password" class="form-style" placeholder="Create new password">
                                              <i class="input-icon uil uil-at"></i>
                                          </div>
                                          <div class="form-group" style="margin-top: 3%;">
                                              <input type="text" name="confirm_password" class="form-style" placeholder="Confirm your password">
                                              <i class="input-icon uil uil-at"></i>
                                          </div>		
                                          <button type="submit"class="btn mt-4" name="password_update" >Update Password</button>
                                        </div>
                                    </div>
                                </div>
                              <div class="card-back">
                                  <div class="center-wrap">
                                      <div class="section text-center">
                                          <h4 class="mb-3 pb-3">Sign Up</h4>
                                          <div class="form-group">
                                              <input type="text" class="form-style" name="" placeholder="Full Name">
                                              <i class="input-icon uil uil-user"></i>
                                          </div>	
                                          <div class="form-group mt-2">
                                              <input type="tel" class="form-style" name="" placeholder="Phone Number">
                                              <i class="input-icon uil uil-phone"></i>
                                          </div>	
                                                <div class="form-group mt-2">
                                              <input type="email" class="form-style" name="" placeholder="Email">
                                              <i class="input-icon uil uil-at"></i>
                                          </div>
                                          <div class="form-group mt-2">
                                              <input type="password" class="form-style" name="" placeholder="Password">
                                              <i class="input-icon uil uil-lock-alt"></i>
                                          </div>
                                          <button class="btn mt-4">Register</button>
                                        </div>
                    </form>

                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
    </div>
</div>
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <h3>LOLO CALDOS</h3>
      <p>Experience the warm hospitality and welcoming atmosphere that defines Lolo Caldos Resort. Allow us to create cherished memories and make your stay an unforgettable one. Welcome to a world of luxury, serenity, and unparalleled beauty. Welcome to Lolo Caldos Resort, your home away from home.</p>
      <div class="social-links">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="https://www.facebook.com/LOLOCALDOSFARMVILLERESORT" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
      <div class="copyright">
        &copy; Copyright <strong><span>Lolo Caldos Farmville Resort</span></strong>.
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/js/main.js"></script>

</body>
</html>