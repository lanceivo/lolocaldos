<!DOCTYPE html>
<html lang="en">
<style>
  #rate{
    border-radius: 10%;
     background-color:blue;
      width:155px; height:8%; 
      color:aliceblue; 
      text-align:center;
      padding-top: 5px;
  }
</style>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Service-LoloCaldos</title>
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
          <li><a class="active" href="service.php">Services</a></li>
          <li><a href="about.html">About</a></li>
          <li><a href="gallery.html">Gallery</a></li>
          <li class="dropdown"><a href="#"><span>Admin</span> <i class="bi bi-chevron-down"></i></a>
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

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Services</h2>
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>Services</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Story Intro Section ======= -->
    <?php
            require 'connection.php';
            $query = "SELECT * FROM tbprivate";
            $result = mysqli_query($db_connection,$query);
            ?>
    <section id="story-intro" class="story-intro">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2">
          <?php while ($row = mysqli_fetch_assoc($result)) { ?>
      <?php
          $imagePath = $row['img_file'];
          $imageWidth = $row['img_width'];
          $imageHeight = $row['img_height'];
          ?>
        <img src="<?php echo $imagePath; ?>" class="img-fluid" alt="" width="<?php echo $imageWidth; ?>px" height="<?php echo $imageHeight; ?>px">
      <?php } ?>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
            <h3>PRIVATE SERVICES</h3>
            <p class="fst-italic">
              Enjoy Exclusive Pool Experiences
							At our private pool, we offer a range of private services designed to provide you with a memorable and exclusive experience. Here are our rates and packages:
            </p>
            <?php
            require 'connection.php';
            $query = "SELECT tbprivate.packageA,tbprivate.packageB,tbprivate.packageC, tbprivate.price FROM tbprivate";
            $result = mysqli_query($db_connection,$query);
            $row = mysqli_fetch_assoc($result);
            ?>
            <ul>
              <li style="text-align: justify;"><i class="bi bi-check-circled"></i> Package A: <?php echo $row['packageA']; ?></li>
              <li style="text-align: justify;"><i class="bi bi-check-circled"></i> Package B: <?php echo $row['packageB']; ?></li>
              <li style="text-align: justify;"><i class="bi bi-check-circled"></i> Package C: <?php echo $row['packageC'];?></li>
            </ul>
            <p>
              Whether you're looking for a daytime getaway or an overnight retreat, our private services offer the perfect setting for relaxation and enjoyment. Experience the exclusivity and comfort of our private pool facilities as you create lasting memories with your group.
            </p>
            <p id="rate"> Rate: Php <?php echo $row['price'];?></p>
          </div>
        </div>

      </div>
    </section><!-- End Story Intro Section -->

    <!-- ======= Featured Members Section ======= -->
    <?php
            require 'connection.php';
            $query = "SELECT * FROM tbroom";
            $result = mysqli_query($db_connection,$query);
            ?>
    <section id="featured-members" class="featured-members">
      <div class="container">
        <div class="row content">
          <div class="col-lg-6">
          <?php while ($row = mysqli_fetch_assoc($result)) { ?>
      <?php
          $imagePath = $row['img_file'];
          $imageWidth = $row['img_width'];
          $imageHeight = $row['img_height'];
          ?>
             <img src="<?php echo $imagePath; ?>" class="img-fluid" alt="" width="<?php echo $imageWidth; ?>px" height="<?php echo $imageHeight; ?>px">
      <?php } ?>
          </div>
          <div class="col-lg-6 pt-3 pt-lg-0">
            <h3>ROOM SERVICES</h3>
            <p class="fst-italic">
              At our resort, we take pride in providing exceptional room service to ensure that our guests have a comfortable and relaxing stay. Our dedicated team of professionals is committed to delivering a seamless experience right to the doorstep of our guests' rooms.            </p>
              <?php
            require 'connection.php';
            $query = "SELECT tbroom.villaA,tbroom.villaB,tbroom.villaC,tbroom.price FROM tbroom";
            $result = mysqli_query($db_connection,$query);
            $row = mysqli_fetch_assoc($result);
            ?> 
            <ul>
              <li><i class="bi bi-check"></i> Villa A - 7 to 8 PAX: <?php echo $row['villaA']; ?></li>
              <li><i class="bi bi-check"></i> Villa B - 7 to 8 PAX: <?php echo $row['villaB']; ?></li>
              <li><i class="bi bi-check"></i> Villa C - COUPLE ROOM: <?php echo $row['villaC']; ?></li>
            </ul>
            <p id="rate"> Rate: Php <?php echo $row['price'];?></p>
          </div>
        </div>

        <div class="row content">
          <div class="col-lg-6 order-1 order-lg-2">
            <img src="assets/img/members/public-services.png" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 order-2 order-lg-1 pt-3 pt-lg-0">
            <h3>PUBLIC SERVICES</h3>
            <p class="fst-italic">
              At our resort, we take pride in offering a wide range of public services that cater to the diverse needs and interests of our guests. We understand that relaxation and recreation are essential components of a memorable stay, and we strive to provide an array of options for everyone to enjoy.
            </p>
            <p>
              Our commitment to public service extends beyond the physical amenities. We have a dedicated staff available to assist guests with their needs and ensure a pleasant experience. From providing information about the resort's facilities to coordinating activities or arranging special requests, our attentive team is always ready to go the extra mile to create a memorable stay for our guests.
            </p>
          </div>
        </div>

        <div class="row content">
          <div class="col-lg-6">
            <img src="assets/img/members/cottages-services.png" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-3 pt-lg-0">
            <h3>COTTAGES SERVICES</h3>
            <p>At our resort, we offer a variety of affordable cottage options that provide a charming and comfortable retreat for our guests. We understand the importance of providing accommodation choices that cater to different preferences and budgets, ensuring that everyone can find their ideal getaway.</p>
            <ul>
              <li><i class="bi bi-check"></i> Nipa Hut: Our traditional Nipa Huts offer a rustic and authentic experience. Constructed with indigenous materials, these huts blend seamlessly with the natural surroundings, providing a cozy and serene atmosphere.</li>
              <li><i class="bi bi-check"></i> Concrete Cottage: For guests seeking a more modern and sturdy accommodation option, our Concrete Cottages provide a comfortable and secure retreat. </li>
              <li><i class="bi bi-check"></i> Big Tent: Perfect for those who enjoy a unique camping experience with added comfort, our Big Tents offer a spacious and cozy environment. </li>
              <li><i class="bi bi-check"></i> Gazebo: Our Gazebos provide a delightful outdoor space for relaxation and socializing. </li>

            </ul>
          </div>
        </div>



      </div>
    </section><!-- End Featured Members Section -->

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