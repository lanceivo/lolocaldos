<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Contact-Us-LoloCaldos</title>
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
        <li class="dropdown"><a href="#"><span>Admin</span> <i class="bi bi-chevron-down"></i></a>
          <ul>
            <li><a href="login_register.html">Login</a></li>    
          </ul>
        </li>
        <li><a class="active" href="contact.php">Contact</a></li>
      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->

  </div>
</header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>GET IN TOUCH!</h2>
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>Contact</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Contact Us Section ======= -->
    <?php
      require 'connection.php';
      $query = "SELECT * FROM tbcontactinfo";
      $result = mysqli_query($db_connection,$query);
      $row = mysqli_fetch_assoc($result);
    ?>
    <section id="contact-us" class="contact-us">
      <div class="container">

        <div>
          <iframe class="gmap_iframe" width="100%" height="270px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=658&amp;height=270&amp;hl=en&amp;q=Universithttps://www.google.com/maps/place/Lolo+Caldo's+Farmville+Resort/@15.0257707,120.8221415,17z/data=!3m1!4b1!4m9!3m8!1s0x3396fec051626197:0x9a4b5c58b2317e8f!5m2!4m1!1i2!8m2!3d15.0257707!4d120.8247164!16s%2Fg%2F11hd1lgszd?entry=ttuy of Oxford&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>        </div>
        

        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p><?php echo $row["cLocation"];?></p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p><?php echo $row["cEmail"];?></p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p><?php echo $row["cPhone"];?></p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">

            <form action="" method="" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>         
                </div>
              </div>
              <div class="form-group mt-3">
                <select class="form-control" name="subject" id="subject" required>
                  <option value="" selected disabled>Select a Subject</option>
                  <option value="General Inquiry">Reservation Inquiry</option>
                  <option value="Product Support">Services Support</option>
                  <option value="Feedback or Suggestions">Feedback or Suggestions</option>
                  <option value="Partnership Opportunity">Partnership Opportunity</option>
                  <option value="Job Application">Job Application</option>
                </select>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>        
              </div>
              <div class="text-center"><input type="submit" name="send"></input></div>
            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Us Section -->

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