<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="css/cico.css">
  <title>CASH IN / CASH OUT</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: rgb(8, 57, 102);">
      <div class="container px-4">
        <a class="navbar-brand" href="Homepage.php">
          <span style="color:#ffffff; font-size:26px; font-weight:bold; letter-spacing: 1px;">Carpool App</span>
        </a>
    </nav>
    <div id="container" style="margin-top: 5%">
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
      <h2 style="text-align:center;"> MODE OF TRANSACTION</h2>
      <form action="cico_process.php" method="POST">
              <label for="cico">Transaction Type</label>
              <select id="cico" name="cico" onchange="toggleFields()">
                <option value="CashIn">Cash In</option>
                <option value="CashOut">Cash Out</option>
              </select><br>
              <div id="amountField">
                <label for="amount">Amount</label><br>
                <input type="number" name="amount" required><br>
              </div>
              <div id="gcashRefField">
                <label for="gcashref">Gcash Reference</label><br>
                <input type="number" name="gcashref"><br>
              </div>
              <div id="processingFeeField" style="display: none;">
                <label for="processingFee">Processing Fee</label><br>
                <input type="number" name="profee" id="processingFeeInput" readonly>
              </div>
              <div id="conversionFeeField" style="display: none;">
                <label for="conversionFee">Conversion Fee</label><br>
                <input type="number" name="confee" id="conversionFeeField" readonly><br>
              </div>
              <input type="submit" name="proceed" value="Proceed" id="proceed">
              <center> <h5 style="color: red; top:10px "><?php if (isset($message)) { echo $message; } ?></h5></center>
        </form>
    </div>
</body>
</html>