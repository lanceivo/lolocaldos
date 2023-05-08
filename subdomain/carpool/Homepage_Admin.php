<!doctype html>
<html lang="en">
<head>
  <title>Carpool Homepage</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="css/car_registration2.css" rel="stylesheet">
</head>
<style>
              table {
              border-collapse:collapse;
              width: 100%; 
              margin: 0 auto;  
            }

            th, td {
              text-align: center;
              padding: 10px;
            }

            th {
                background-color: #071014;
                color: #0DB8DE;
            }
            tr:nth-child(even) {
            background-color: #f2f2f2;
          }
          tr{
          background-color: #ddd;
        }
</style>
<body >
<?php
    require 'Alert.php';
    
?>
  <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: rgb(8, 57, 102);">
    <div class="container px-4">
      <a class="navbar-brand" href="Homepage_Admin.php">
        <span style="color:#ffffff; font-size:26px; font-weight:bold; letter-spacing: 1px;">Carpool App</span>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
          class="navbar-toggler-icon"></span></button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item"><a class="nav-link" href="Registeredlist.php">User List</a></li>  
          <li class="nav-item"><a class="nav-link" href="#" onclick="Car()">Car Approval</a></li>
          <li class="nav-item" id="logout"><a class="nav-link" href="logout.php">Log Out</a></li>
        </ul>
      </div> 
    </div>
  </nav>
  <?php
    session_start(); 
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
                  <center> <h1 style="color: #FFFFFF;">Welcome <span style="color: #FFFF;">  <?php echo $row['Firstname']." ".$row['Lastname']; ?></span></h1></center>
        <div style="display:none" id="container">
        <table>
  <thead>
    <tr>
      <th>Driver ID</th>
      <th>User ID</th>
      <th>Fullname</th>
      <th>Address</th>
      <th>Contact Number</th>
      <th>Email</th>
      <th>VIN</th>
      <th>Car Year</th>
      <th>Car Make</th>
      <th>Car Color</th>
      <th>Car Model</th>
      <th>License Plate Number</th>
      <th>Status
        <select id="status-filter">
        
          <option value="Approved">Approved</option>
          <option value="Pending">Pending</option>
        </select>
      </th>
      <th></th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php
      require 'connection.php';
      $query = "SELECT tbdriver.Driver_ID, tbuser.User_ID, CONCAT(tbuser.Firstname, ' ', tbuser.Lastname) AS Fullname, 
      CONCAT(tbuser.Barangay, ', ', tbuser.Municipality, ', ', tbuser.Province) AS Address, 
      tbuser.Contactnum, tbuser.Email, tbdriver.VIN, tbdriver.Car_year, tbdriver.Car_make, tbdriver.Car_color, 
      tbdriver.Car_model, tbdriver.License_Plate_Num, tbdriver.Status 
      FROM tbuser INNER JOIN tbdriver ON tbuser.User_ID = tbdriver.User_ID 
      WHERE tbdriver.Status IN ('Approved', 'Pending')";
      $result = mysqli_query($db_connection,$query);
      while($row = mysqli_fetch_assoc($result)){
        $driverid = $row["Driver_ID"];
        echo "<tr>";
        echo "<td>" . $row["Driver_ID"] . "</td>";
        echo "<td>" . $row["User_ID"] . "</td>";
        echo "<td>" . $row["Fullname"] . "</td>";
        echo "<td>" . $row["Address"] . "</td>";
        echo "<td>" . $row["Contactnum"] . "</td>";
        echo "<td>" . $row["Email"] . "</td>";
        echo "<td>" . $row["VIN"] . "</td>";
        echo "<td>" . $row["Car_year"] . "</td>";
        echo "<td>" . $row["Car_make"] . "</td>";
        echo "<td>" . $row["Car_color"] . "</td>";
        echo "<td>" . $row["Car_model"] . "</td>";
        echo "<td>" . $row["License_Plate_Num"] . "</td>";
        echo "<td class='status-column'>" . $row["Status"] . "</td>";
        $_SESSION['uid'] = $driverid;
        echo "<td>"."<a href='approved.php?id=$driverid'><Button class-'approve-btn' id='approved' name='approved'
        onclick='disable(this)'> Approve</Button></a></td>";
        echo "<td><Button class='reject-btn' data-id='driverid'" . $row["Driver_ID"] . "'> Reject</Button></td>";
        echo "</tr>";
      }
    ?>
  </tbody>
</table>

<script>
  const statusFilter = document.querySelector('#status-filter');
  const statusColumn = document.querySelectorAll('.status-column');
  const tableBody = document.querySelector('tbody');

 // add an event listener to the status filter dropdown
statusFilter.addEventListener('change', function() {
  const selectedValue = statusFilter.value;
  const rows = tableBody.querySelectorAll('tr');

  // loop through all table rows and show/hide based on the selected value
  for (let i = 0; i < rows.length; i++) {
    const row = rows[i];
    const statusCell = row.querySelector('td:nth-child(13)');

    if (selectedValue === 'All') {
      row.style.display = 'none';
    } else if (selectedValue === statusCell.textContent) {
      row.style.display = '';
    } else {
      row.style.display = 'none';
    }
  }
});
</script>
<script>
            // Add event listener to all reject buttons
            const rejectButtons = document.querySelectorAll('.reject-btn');
            rejectButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const driverId = this.getAttribute('data-id');
                    if (confirm(`Are you sure you want to reject driver?`)) {
                        // TODO: Implement reject functionality here
                    }
                });
            });

          // Function to disable the clicked button
          function disable(button) {
              button.disabled = true;
          }
  </script>
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
      }
    </script>
</body>
</html>
