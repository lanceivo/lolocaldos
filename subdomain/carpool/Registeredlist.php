<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
}
</style>
</head>
<body>
<table>
  <thead>
    <tr>
      <th>User ID</th>
      <th>First Name</th>
      <th>Middle Name</th>
      <th>Last Name</th>
      <th>Contact Number</th>
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
      echo "<td>" . $row["Email"] . "</td>";
      echo "</tr>";
      }
      mysqli_close($db_connection);
        
    ?>
  </tbody>
</table>
</body>
</html>