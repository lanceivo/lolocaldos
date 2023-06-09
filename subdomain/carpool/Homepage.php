<!doctype html>
<html lang="en">
<head>
  <title>Carpool Homepage</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Signika+Negative&display=swap" rel="stylesheet">
    <link href="css/car.registration.css" rel="stylesheet">
    <link rel="stylesheet" href="css/welcome.css">
    <link rel="icon" type="png" href="img/s1.png">
    <style>
        #left {
        float: left;
        width: 40%;
        padding: 10px;
        color: white;
        margin-top: 7%;
        margin-left: 3%;
        text-align: justify;
        font-family: 'Signika Negative', sans-serif;
        font-size: 20px;
    }
    
    #right {
        float: right;
        width: 50%;
        padding: 10px;
    }#title{
      text-align: center;
      font-size: 80px;
    }
   
    </style>
</head>

<body >
<?php
    require 'Alert.php';
    
?>
  <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: rgb(8, 57, 102);">
    <div class="container px-4">
      <a class="navbar-brand" href="Homepage.php">
        <span style="color:#ffffff; font-size:26px; font-weight:bold; letter-spacing: 1px;">Carpool App</span>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
          class="navbar-toggler-icon"></span></button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item"><a class="nav-link" href="#" onclick="profile()">Profile</a></li>
          <li class="nav-item"><a class="nav-link" href="#" onclick="Car()">Car Registration</a></li>
          <li class="nav-item"><a class="nav-link" href="CICO.php">CashIn/CashOut</a></li>
          <li class="nav-item" id="logout"><a class="nav-link" href="logout.php">Log Out</a></li>
        </ul>
      </div> 
    </div>
  </nav>
  <?php
   
    if(isset($_SESSION['email'])) {
        $email = $_SESSION['email'];
    }else{
        header('Location: login.php');
    }   
?>
  <?php
                    require 'connection.php';
                    $email = $_SESSION["email"];
                    
                    $password = $_SESSION["password"];   
                              $sql = "SELECT * FROM tbuser WHERE Email= '$email' AND Password ='$password'";
                              $result = mysqli_query($db_connection, $sql);
                              $row = mysqli_fetch_assoc($result);
                            ?>
                   <h5 style="color: #FFFFFF; text-align:right"><span style="color: #FFFF;">Welcome <?php echo $row['Firstname']." ".$row['Lastname']; ?></span></h5>
        <div class="container" style="display:none" id="container">
        <div class="row justify-content-center" style="margin:0px;">
        <div class="col-lg-6 col-md-8 login-box">
            <div class="col-lg-12 login-title">
            Car Registration Form
            </div>
            <div class="col-lg-12 login-form">
            <form action="car_process.php" method="post">
                <div class="form-group">
                <input type="text" name="vin" class="form-control" placeholder="Vehicle Identification Number:" required>
                </div>
                <div class="form-group">
                <input type="text" name="caryear" class="form-control" placeholder="Car Year:" required>
                </div>
                <div class="form-group">
                <input type="text" name="carmake" class="form-control" placeholder="Car Make:" required>
                </div>
                <div class="form-group">
                <input type="text" name="carcolor" class="form-control" placeholder="Car Color:" required>
                </div>
                    <div class="form-group">
                    <input type="text" name="carmodel" class="form-control" placeholder="Car Model:" i required>
                    </div>
                    <div class="form-group">
                    <input type="text" name="license" class="form-control" placeholder="License Plate Number:" i required>
                    </div>
                    <div class="col-12 login-btm login-button justify-content-center d-flex">
                    <button type="submit" name="registercar" class="btn btn-outline-primary">Car Register</button>
                    </div>
                </div>
                </form>
                <center> <h6 style="color: red; top:10px "><?php if (isset($message)) { echo $message; } ?></h6></center>
            </div>
        </div>
        </div>
        <?php
                   require 'connection.php';
                    $email = $_SESSION["email"];
                    $password = $_SESSION["password"];   
                              $sql = "SELECT * FROM tbuser WHERE Email= '$email' AND Password ='$password'";
                              $result = mysqli_query($db_connection, $sql);
                              $row = mysqli_fetch_assoc($result);
                            ?>
        <div  style="display:none" id="profile">
        <div class="row justify-content-center" style="margin:0px;">
        <div class="col-lg-6 col-md-8 login-box">
            <div class="col-lg-12 login-title">
            User Profile
            </div>
            <div class="col-lg-12 login-form">
            <form action="update.php" method="post">
                <div class="form-group">
                <label class="form-control-label">First Name</label>
                <input type="text" name="firstname" class="form-control"  value="<?php echo $row["Firstname"]; ?>" required >
                </div>
                <div class="form-group">
                <label class="form-control-label">Middle Name</label>
                <input type="text" name="middlename" class="form-control"  value="<?php echo $row["Middlename"]; ?>" required >
                </div>
                <div class="form-group">
                <label class="form-control-label">Last Name</label>
                <input type="text" name="lastname" class="form-control" value="<?php echo $row["Lastname"]; ?>" required >
                </div>
                    <div class="form-group">
                    <label class="form-control-label">Barangay</label>
                    <input type="text" name="brgy" class="form-control" value="<?php echo $row["Barangay"]; ?>" i required >
                    </div>
                    <div class="form-group">
                    <label class="form-control-label">Municipality</label>
                    <input type="text" name="city" class="form-control" value="<?php echo $row["Municipality"]; ?>" i required >
                    </div>
                    <div class="form-group">
                    <label class="form-control-label">Province</label>
                    <input type="text" name="province" class="form-control" value="<?php echo $row["Province"]; ?>" i required >
                    </div>
                    <div class="col-12 login-btm login-button justify-content-center d-flex">
                    <button type="" name="update" class="btn btn-outline-primary" id="update-btn">Update</button>
                    </div>
                </div>
             </form>
                <center> <h6 style="color: red; top:10px "><?php if (isset($message)) { echo $message; } ?></h6></center>  
            </div>
        </div>
      
        </div>
        <div id="left">
    <h1 id="title"> Carpool </h1>
    <p>Carpooling is a sustainable and cost-effective transportation solution that involves sharing rides with others who are headed in the same direction. By pooling resources and sharing the same vehicle, carpooling helps reduce traffic congestion, lower fuel consumption, and decrease carbon emissions, making it an eco-friendly option. It also allows individuals to save money on fuel costs and parking fees, while promoting social interactions and building a sense of community among participants. Carpooling not only benefits the environment but also provides a convenient and efficient way to commute, making it an increasingly popular choice for people looking to reduce their carbon footprint and contribute to a greener future.</p>
 </div> 
 <div id="right">
    <img src="img/carpool.png" alt="" width="500" height="500">
 </div>     
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
    <script>
      function Car() {
        document.getElementById("container").style.display = "block";
        document.getElementById("profile").style.display = "none";
        document.getElementById("CICO").style.display = "none";

      }
      function profile(){
        document.getElementById("profile").style.display = "block";
        document.getElementById("container").style.display = "none";
        document.getElementById("CICO").style.display = "none";
      }

  
    </script>
    
</body>
</html>
