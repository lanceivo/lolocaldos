<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>Registered List</title>

    <style>
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}

th {
    background-color: #071014;
    color: #0DB8DE;
}

tr:nth-child(even) {
  background-color: #f2f2f2;
}

tr:hover {
  background-color: #ddd;
}#logout{
    padding-left: 50px;
  }
</style>
</head>
<body>
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
          <li class="nav-item" id="logout"><a class="nav-link" href="login.php">Log Out</a></li>

        </ul>
      </div> 
    </div>
  </nav>
<table>
  <thead>
    <tr>
      <th>User ID</th>
      <th>First Name</th>
      <th>Middle Name</th>
      <th>Last Name</th>
      <th>Contact Number</th>
      <th>Barangay</th>
      <th>Municipality</th>
      <th>Province</th>
      <th>Email</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    require 'connection.php';
    
    if(mysqli_connect_errno()){
      echo "failed connection: " . mysqli_connect_error();
      exit();
    }
    $result = mysqli_query($db_connection, "SELECT * FROM tbuser");
    // Generate table rows dynamically
    while ($row = mysqli_fetch_assoc($result)) {
      echo "<tr>";
      echo "<td>" . $row["User_ID"] . "</td>";
      echo "<td>" . $row["Firstname"] . "</td>";
      echo "<td>" . $row["Middlename"] . "</td>";
      echo "<td>" . $row["Lastname"] . "</td>";
      echo "<td>" . $row["Contactnum"] . "</td>";
      echo "<td>" . $row["Barangay"] . "</td>";
      echo "<td>" . $row["Municipality"] . "</td>";
      echo "<td>" . $row["Province"] . "</td>";
      echo "<td>" . $row["Email"] . "</td>";
      echo "</tr>";
      }
      mysqli_close($db_connection);
        
    ?>
  </tbody>
</table>
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