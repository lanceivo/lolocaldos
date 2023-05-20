<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <title>Cash In</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: rgb(8, 57, 102);">
    <div class="container px-4">
      <a class="navbar-brand" href="Homepage_passenger.php">
        <span style="color:#ffffff; font-size:26px; font-weight:bold; letter-spacing: 1px;">Carpool App</span>
      </a>
  </nav>
  <div id="container" style="margin-top: 8%;">

  <?php
    session_start();
    require 'connection.php';
    $email = $_SESSION["email"];
    $password = $_SESSION["password"];   
    $sql = "SELECT * FROM tbuser WHERE Email= '$email' AND Password ='$password'";
    $result = mysqli_query($db_connection, $sql);
    $row = mysqli_fetch_assoc($result);
  ?>
  <h1 style="color: black;" id="welcome">Welcome <span style="color: black;"><?php echo $row['Firstname']." ".$row['Lastname']; ?></span></h1>
  <h1 style="color: black;" id="welcome">Balance <span style="color: black;"><?php echo $row['uBalance'] ?></span></h1>

  <h2 style="text-align: center;">MODE OF TRANSACTION</h2>

  <form action="cashin_process.php" method="post">
            <label for="cico">Transaction Type</label>
            <select id="cico" name="cico">
            <option value="CashIn">Cash In</option>
            </select><br>
            <div id="amountField">
            <label for="amount">Amount</label><br>
                <select name="amount" required>
                    <option value="">Select an amount</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                    <option value="250">250</option>
                    <option value="500">500</option>
                </select><br>
            </div>
            <div id="gcashRefField">
            <label for="gcashref">Gcash Reference</label><br>
            <input type="number" name="gcashref" required><br>
            </div>
            <input type="submit" name="proceed" value="Proceed" id="proceed">
            <center> <h6 style="color: red; top:10px "><?php if (isset($message)) { echo $message; } ?></h6></center>  
  </form>  
</div>
</body>
</html>