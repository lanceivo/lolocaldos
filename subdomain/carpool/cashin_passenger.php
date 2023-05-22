<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="css/welcome.css">
    <link rel="stylesheet" href="css/cico.css">
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
  <h5 style="color: black;" id="welcome"><span style="color: black;">Welcome <?php echo $row['Firstname']." ".$row['Lastname']; ?></span></h5>
  <h5 style="color: black;" id="welcome"><span style="color: black;">Balance <?php echo $row['uBalance'] ?></span></h5>

  <h2 style="text-align: center;">CASH IN TRANSACTION</h2>

  <form action="cashin_process.php" method="post">
            <label for="cico">Transaction Type</label>
            <select id="cico" name="cico">
            <option value="CashIn">Cash In</option>
            </select><br>
            <div id="amountField">
            <label for="amount">Amount</label><br>
                <input type="number" name="amount" required><br>
            </div>
            <div id="conversionFeeField">
            <label for="gcashref">Conversion Fee</label><br>
            <input type="number" name="confee" style="margin-top: -1%;" id="conversionFeeField" readonly><br>
            </div>
            <div id="gcashRefField">
            <label for="gcashref">Gcash Reference</label><br>
            <input type="number" name="gcashref"  required><br>
            </div>
            <input type="submit" name="proceed" value="Proceed" id="proceed">
            <center> <h6 style="color: red; top:10px "><?php if (isset($message)) { echo $message; } ?></h6></center>  
  </form>  
</div>
<script>
      // Get the amount input field
      const amountInput = document.querySelector('input[name="amount"]');
      // Get the conversion fee input field
      const conversionFeeInput = document.querySelector('input[name="confee"]');

      // Listen for changes in the amount input field
      amountInput.addEventListener('input', function() {
          // Get the amount value
          const amount = parseInt(this.value);
          
          // Calculate the conversion fee based on the amount
          let conversionFee = 0;
          if (amount >= 50) {
            conversionFee = Math.min(Math.floor(amount / 50) * 10, 50);
          }
          // Set the conversion fee value in the input field
          conversionFeeInput.value = conversionFee;
      });
        
        document.getElementById("conversionFeeField").style.display ="none";
</script>
</body>
</html>