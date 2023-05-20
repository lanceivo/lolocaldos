<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="css/cico.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>CASH IN / CASH OUT </title>
    
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: rgb(8, 57, 102);">
      <div class="container px-4">
        <a class="navbar-brand" href="Homepage.php">
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
  <?php
    require 'Alert2.php';
    
?>
 
        

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
        if (amount >= 50 && amount <= 99) {
            conversionFee = 40;
        } else if (amount >= 100 && amount <= 249) {
            conversionFee = 80;
        } else if (amount >= 250 && amount <= 499) {
            conversionFee = 200;
        } else if (amount >= 500) {
            conversionFee = 450;
        }
    }
    // Set the conversion fee value in the input field
    conversionFeeInput.value = conversionFee;
});

</script>
<script>
   // Get the amount input field
const amtInput = document.querySelector('input[name="amount"]');
// Get the conversion fee input field
const processingFeeInput = document.querySelector('input[name="profee"]');

// Listen for changes in the amount input field
amtInput.addEventListener('input', function() {
    // Get the amount value
    const amount = parseInt(this.value);
    
    // Calculate the processing fee based on the amount
    let processingFee = 0;
    if (amount >= 50) {
        const thousandBlocks = Math.floor(amount / 1000);
        processingFee = thousandBlocks * 20;
    }

    // Set the processing fee value in the input field
    processingFeeInput.value = processingFee;
});
</script>


<script>
  function toggleFields() {
    var transactionType = document.getElementById("cico").value;
    var amountField = document.getElementById("amountField");
    var gcashRefField = document.getElementById("gcashRefField");
    var processingFeeField = document.getElementById("processingFeeField");
    var conversionFeeField = document.getElementById("conversionFeeField");

    if (transactionType === "CashIn") {
      amountField.style.display = "block";
      gcashRefField.style.display = "block";
      processingFeeField.style.display = "none";
      conversionFeeField.style.display = "none";
    } else if (transactionType === "CashOut") {
      amountField.style.display = "block";
      gcashRefField.style.display = "none";
      processingFeeField.style.display = "block";
      conversionFeeField.style.display = "block";
    }
  }
</script>

</body>
</html>