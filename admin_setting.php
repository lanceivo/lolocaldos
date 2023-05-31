<!DOCTYPE html>
<html lang="en">
<style>
    #servicerate{
        width: 400px;
    }
</style>
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="assets/css/admin.css" />
    <link rel="icon" type="png" href="assets/img/logo.png">

    <title>Admin Dashboard - Lolo Caldos</title>
</head>
<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><i
                    class="fas fa-user-secret me-2"></i>Lolo Caldos</div>
            <div class="list-group list-group-flush my-3">
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text active"><i
                        class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold" onclick="PrivateServices()"><i
                        class="fas fa-gift me-2"></i>Private Services</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold" onclick="RoomServices()"><i
                        class="fas fa-gift me-2"></i>Room Services</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold" onclick="MessageInquiry()"><i
                        class="fas fa-comment-dots me-2"></i>Message Inquiries</a>
                <a href="logout.php" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
                        class="fas fa-power-off me-2"></i>Logout</a>
            </div>
        </div>
        <?php
        session_start();
        if(isset($_SESSION['email'])) {
            $email = $_SESSION['email'];
        }else{
            header('Location: login_register.html');
        }   
?>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Dashboard</h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <?php
                
                   require 'connection.php';
                    $email = $_SESSION["email"];
                    $password = $_SESSION["password"];   
                              $sql = "SELECT * FROM tbuser WHERE email= '$email' AND password ='$password'";
                              $result = mysqli_query($db_connection, $sql);
                              $row = mysqli_fetch_assoc($result);
                            ?>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user me-2"></i><?php echo $row['Fullname']; ?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- =====PRIVATE SERVICES ===== -->
            <?php
            require 'connection.php';
            $query = "SELECT * FROM tbprivate";
            $result = mysqli_query($db_connection,$query);
            ?>
<div class="container-fluid px-4" id="Services" style="display: none";>
    <div class="row my-5">
        <div class="col">
            <div class="container bg-white p-4">
                <form action="privateservice_process.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-6 order-1 order-lg-2">
                        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                            <?php
                            $imagePath = $row['img_file'];
                            $imageWidth = $row['img_width'];
                            $imageHeight = $row['img_height'];
                            ?>
                            <img src="<?php echo $imagePath; ?>" class="img-fluid" alt="" width="<?php echo $imageWidth; ?>px" height="<?php echo $imageHeight; ?>px">
                        <?php } ?>                        </div>
                        <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
                            <h3>PRIVATE SERVICES</h3>
                            <p class="fst-italic">
                                Enjoy Exclusive Pool Experiences
                                At our private pool, we offer a range of private services designed to provide you with a memorable and exclusive experience. Here are our rates and packages:
                            </p>
                            <ul>
                                <li style="text-align: justify; margin-bottom: 10px;"><i class="bi bi-check-circled"></i><input type="text" name="packageA" id="packageA" class="form-control" placeholder="Enter Package A description"></li>
                                <li style="text-align: justify; margin-bottom: 10px;"><i class="bi bi-check-circled"></i><input type="text" name="packageB" id="packageB" class="form-control" placeholder="Enter Package B description"></li>
                                <li style="text-align: justify; margin-bottom: 10px;"><i class="bi bi-check-circled"></i><input type="text" name="packageC" id="packageC" class="form-control" placeholder="Enter Package C description"></li>
                            </ul>
                            <p>
                                Whether you're looking for a daytime getaway or an overnight retreat, our private services offer the perfect setting for relaxation and enjoyment. Experience the exclusivity and comfort of our private pool facilities as you create lasting memories with your group.
                            </p>
                            
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-8">
                        <input type="text" name="servicerate" id="servicerate" class="form-control" value="" placeholder="Update Your Private Service Rate">
                        </div>
                        <div class="col-md-4">
                            <input type="file" name="serviceImage" id="serviceImage" class="form-control-file">
                            <label class="form-control-file" style="color:blue"> Image Upload Should be Width:1026px | Height:768px</label>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col">
                            <button class="btn btn-primary" style="width: 15%; margin-left: 3%;" type="submit" name="changeservice">Change Service</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- =====END OF PRIVATE SERVICES ===== -->


<!-- =====ROOM SERVICES ===== -->
<?php
            require 'connection.php';
            $query = "SELECT * FROM tbroom";
            $result = mysqli_query($db_connection,$query);
            ?>
<div class="container-fluid px-4" id="Roomservices" style="display: none";>
    <div class="row my-5">
        <div class="col">
            <div class="container bg-white p-4">
                <form action="roomservice_process.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-6 order-1 order-lg-2">
                        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                            <?php
                            $imagePath = $row['img_file'];
                            $imageWidth = $row['img_width'];
                            $imageHeight = $row['img_height'];
                            ?>
                            <img src="<?php echo $imagePath; ?>" class="img-fluid" alt="" width="<?php echo $imageWidth; ?>px" height="<?php echo $imageHeight; ?>px">
                        <?php } ?>                        </div>
                        <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
                            <h3>ROOM SERVICES</h3>
                            <p class="fst-italic">
                            At our resort, we take pride in providing exceptional room service to ensure that our guests have a comfortable and relaxing stay. Our dedicated team of professionals is committed to delivering a seamless experience right to the doorstep of our guests' rooms.
                            </p>
                            <ul>
                                <li style="text-align: justify; margin-bottom: 10px;"><i class="bi bi-check-circled"></i><input type="text" name="villaA" id="villaA" class="form-control" placeholder="Enter Villa A description"></li>
                                <li style="text-align: justify; margin-bottom: 10px;"><i class="bi bi-check-circled"></i><input type="text" name="villaB" id="villaB" class="form-control" placeholder="Enter VillA B description"></li>
                                <li style="text-align: justify; margin-bottom: 10px;"><i class="bi bi-check-circled"></i><input type="text" name="villaC" id="villaC" class="form-control" placeholder="Enter Villa C description"></li>
                            </ul>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-8">
                        <input type="text" name="roomrate" id="servicerate" class="form-control" value="" placeholder="Update Your Room Service Rate">
                        </div>
                        <div class="col-md-4">
                            <input type="file" name="roomImage" id="roomImage" class="form-control-file">
                            <label class="form-control-file" style="color:blue"> Image Upload Should be Width:800px | Height:533px</label>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col">
                            <button class="btn btn-primary" style="width: 20%; margin-left: 3%;" type="submit" name="changeroomservice">Change Room Service</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- ===== END OF ROOM SERVICES ===== -->

<!-- ===== MESSAGE INQUIRIES TABLE ===== -->
            <?php
            require 'connection.php';
            $query = "SELECT tbcontact.cID, tbcontact.name,tbcontact.email,tbcontact.subject,tbcontact.message FROM tbcontact";
            $result = mysqli_query($db_connection, $query);
?>
<div class="container-fluid px-4" id="MessageInquiries" style="display: none;">
    <div class="row my-5">
        <h3 class="fs-4 mb-3">Recent Inquiries</h3>
        <div class="col">
            <table class="table bg-white rounded shadow-sm  table-hover">
                <thead>
                    <tr>
                        <th scope="col" width="50">#</th>
                        <th scope="col">Fullname</th>
                        <th scope="col">Email</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Message</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $count = 1; // Initialize a counter for row numbering
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>';
                        echo '<th scope="row">' . $count . '</th>';
                        echo '<td>' . $row['name'] . '</td>';
                        echo '<td>' . $row['email'] . '</td>';
                        echo '<td>' . $row['subject'] . '</td>';
                        echo '<td>' . $row['message'] . '</td>';
                        echo '</tr>';
                        $count++; // Increment the row counter
                    }
                    ?>
                </tbody>
            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ===== END MESSAGE INQUIRIES TABLE ===== -->

    <!-- /#page-content-wrapper -->
    </div>

    <script>
        function PrivateServices(){
            document.getElementById('Services').style.display = "block";
            document.getElementById('MessageInquiries').style.display = "none";
            document.getElementById('Roomservices').style.display = "none";
        }
        function MessageInquiry(){
            document.getElementById('MessageInquiries').style.display = "block";
            document.getElementById('Services').style.display = "none";
            document.getElementById('Roomservices').style.display = "none";
        }function RoomServices(){
            document.getElementById('Roomservices').style.display = "block";
            document.getElementById('Services').style.display = "none";
            document.getElementById('MessageInquiries').style.display = "none";
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>
</body>

</html>