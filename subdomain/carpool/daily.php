<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
   <link rel="stylesheet" href="css/reportgeneration.css">
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: rgb(8, 57, 102);">
    <div class="container px-4">
      <a class="navbar-brand" href="Homepage_Admin.php">
        <span style="color:#ffffff; font-size:26px; font-weight:bold; letter-spacing: 1px;">Report Generation</span>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
          class="navbar-toggler-icon"></span></button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item"><a class="nav-link" href="#" onclick="cashin()">Cash In Transaction</a></li>  
          <li class="nav-item"><a class="nav-link" href="#" onclick="cashout()">Cash Out Transaction</a></li>
          <li class="nav-item"><a class="nav-link" href="#" onclick="balance()">Balance Tickets</a></li>
          <li class="nav-item" id="logout"><a class="nav-link" href="logout.php">Log Out</a></li>

        </ul>
      </div> 
    </div>
  </nav>
    <div id="cashin" style="display: none;">
        <center><h1 style="color:black" >Cash In Transactions</h1></center>
     <?php
        require 'connection.php';
        $query = "SELECT
        ROW_NUMBER() OVER (ORDER BY CICO_ID) AS '#',
        CONCAT(tbuser.Firstname, ' ', tbuser.Lastname) AS 'Name',
        tb_ci_co.amount,
        tb_ci_co.con_fee
        FROM
        tb_ci_co
        INNER JOIN tbuser ON tbuser.User_ID = tb_ci_co.User_ID WHERE
            transaction_type = 'CashIn' AND
            tb_ci_co.transaction_created >= DATE_SUB(NOW(), INTERVAL 24 HOUR)";
        $result = mysqli_query($db_connection, $query);
        $totalAmount = 0;
        $totalConfee = 0;
        // Display the results in an HTML table
            echo '<table class="styled-table">
            <tr>
            <th>#</th>
            <th>Name</th>
            <th>Amount</th>
            <th>Confee</th>
            </tr>';

            while ($row = mysqli_fetch_assoc($result)) {
               // Add the amount and confee values to the totals
                $totalAmount += $row['amount'];
                $totalConfee += $row['con_fee']; 
            echo '<tr>
                <td>' . $row['#'] . '</td>
                <td>' . $row['Name'] . '</td>
                <td>' . $row['amount'] . '</td>
                <td>' . $row['con_fee'] . '</td>
            </tr>';
            
            }

            echo '</table>';
            // Display the totals below the table
            echo '<center>'; 
            echo '<div>Total Amount: ' . $totalAmount . '</div>';
            echo '<div>Total Confee: ' . $totalConfee . '</div>';
            echo '</center>';
            
            // Free the result set
            mysqli_free_result($result);
            ?>  
    </div>
    <div id="cashout" style="display: none;">
    <center><h1 style="color:black" >Cash Out Transactions</h1></center>
    <?php
        require 'connection.php';
        $query = "SELECT
        ROW_NUMBER() OVER (ORDER BY CICO_ID) AS '#',
        CONCAT(tbuser.Firstname, ' ', tbuser.Lastname) AS 'Name',
        tb_ci_co.amount,
        tb_ci_co.pro_fee
        FROM
        tb_ci_co
        INNER JOIN tbuser ON tbuser.User_ID = tb_ci_co.User_ID WHERE transaction_type = 'CashOut' AND
            tb_ci_co.transaction_created >= DATE_SUB(NOW(), INTERVAL 24 HOUR)";
        $result = mysqli_query($db_connection, $query);
        $totalAmount = 0;
        $totalProfee = 0;
        // Display the results in an HTML table
            echo '<table class="styled-table">
            <tr>
            <th>#</th>
            <th>Name</th>
            <th>Amount</th>
            <th>Profee</th>
            </tr>';

            while ($row = mysqli_fetch_assoc($result)) {
               // Add the amount and confee values to the totals
                $totalAmount += $row['amount'];
                $totalProfee += $row['pro_fee']; 
            echo '<tr>
                <td>' . $row['#'] . '</td>
                <td>' . $row['Name'] .  '</td>
                <td>' . $row['amount'] . '</td>
                <td>' . $row['pro_fee'] . '</td>
            </tr>';
            }

            echo '</table>';
            // Display the totals below the table
            echo '<center>'; 
            echo '<div>Total Amount: ' . $totalAmount . '</div>';
            echo '<div>Total Profee: ' . $totalProfee . '</div>';
            echo '</center>';
            
            // Free the result set
            mysqli_free_result($result);
            ?>     
    </div>
    <div id="balance" style="display: none;">
    <center><h1 style="color:black" >Balance Tickets</h1></center>
    <?php
        require 'connection.php';
        $query = "SELECT User_ID AS '#',
            CONCAT(tbuser.Firstname, ' ', tbuser.Lastname) AS 'Name',
            uBalance AS 'Balance'
          FROM tbuser WHERE User_ID > 1 ";
        $result = mysqli_query($db_connection, $query);
        $totalBalance = 0;

echo '<table class="styled-table">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Balance</th>
        </tr>';

        while ($row = mysqli_fetch_assoc($result)) {
            $totalBalance += $row['Balance'];
            echo '<tr>
                    <td>' . $row['#'] . '</td>
                    <td>' . $row['Name'] . '</td>
                    <td>' . $row['Balance'] . '</td>
                </tr>';
        }
echo '</table>';
// Display the total balance below the table
echo '<center>'; 
echo '<div class="total-balance">Total Balance: ' . $totalBalance . '</div>';

echo '</center>';
            // Free the result set
            mysqli_free_result($result);
            ?> 
    </div>

    <script>
        function cashin(){
            document.getElementById("cashin").style.display = "block";
            document.getElementById("cashout").style.display = "none";
            document.getElementById("balance").style.display = "none";
        }
        function cashout(){
            document.getElementById("cashin").style.display = "none";
            document.getElementById("cashout").style.display = "block";
            document.getElementById("balance").style.display = "none";
        }
        function balance(){
            document.getElementById("cashin").style.display = "none";
            document.getElementById("cashout").style.display = "none";
            document.getElementById("balance").style.display = "block";
        }
    </script>
     
</body>
</html>
