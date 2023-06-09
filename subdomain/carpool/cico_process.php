<?php
require 'connection.php';
session_start();

if (isset($_POST['proceed'])) {
    $tran_type = $_POST['cico'];
    $amount = $_POST['amount'];
    $gcashref = $_POST['gcashref'];
    $profee = $_POST['profee'];
    $confee = $_POST['confee'];

    if ($tran_type == 'CashIn') {
        $ids = $_SESSION['uid'];
        $query = "INSERT INTO tb_ci_co (User_ID, transaction_type,gcash_ref_num, con_fee, amount,  status)
                  VALUES ('$ids', '$tran_type','$gcashref','$confee','$amount','Confirmed')";
        $result = mysqli_query($db_connection, $query);

        if ($result) {
            // Conversion rates for different amounts
            $conversionRates = [
                50 => 40,
                100 => 80,
                250 => 200,
                500 => 450,
                1000 => 950
            ];

            if (isset($conversionRates[$amount])) {
                $conversionRate = $conversionRates[$amount];
                $updateQuery = "UPDATE tbuser SET uBalance = uBalance + $conversionRate WHERE User_ID = '$ids'";
                $updateResult = mysqli_query($db_connection, $updateQuery);

                if ($updateResult) {
                    echo '<script>
                    window.alert("Cash In Successfully");
                    window.location.href ="CICO.php";
                    </script>';
                } else {
                    echo '<script>
                    window.alert("Cash In Failed. Try Again");
                    window.location.href ="CICO.php";
                    </script>';
                }
            } else {
                echo '<script>
                    window.alert("Invalid Amount. Please Try Again");
                    window.location.href ="CICO.php";
                    </script>';
                exit;
            }
        } else {
            echo '<script>
                    window.alert("Cash In Failed. Try Again");
                    window.location.href ="CICO.php";
                    </script>';
        }
    } else if ($tran_type == 'CashOut') {
        $ids = $_SESSION['uid'];
        $queryUser = "SELECT uBalance FROM tbuser WHERE User_ID = '$ids'";
        $resultUser = mysqli_query($db_connection, $queryUser);
        $userBalance = mysqli_fetch_assoc($resultUser)['uBalance'];

        // Get the amount value
        $amount = $_POST['amount'];

        // Calculate the amount in tickets based on the user's balance and the conversion rate
        $amountInTickets = floor($amount / 1); // Conversion rate: 1 ticket = 1 peso

        // Calculate the processing fee in tickets
        $processingFee = floor($amountInTickets / 1000) * 20;

        // Check if the user has enough tickets to cover the processing fee and the converted amount
        if ($userBalance >= ($amountInTickets + $processingFee)) {
            // Perform the cash-out operation
            $updatedBalance = $userBalance - ($amountInTickets + $processingFee);
            $updateQuery = "UPDATE tbuser SET uBalance = $updatedBalance WHERE User_ID = '$ids'";
            $updateResult = mysqli_query($db_connection, $updateQuery);

            if ($updateResult) {
                // Proceed with the cash-out process
                $query = "INSERT INTO tb_ci_co (User_ID, transaction_type, amount, pro_fee, con_fee, status)
                          VALUES ('$ids', '$tran_type', '$amount', '$profee', '$confee', 'Confirmed')";
                $result = mysqli_query($db_connection, $query);
                echo '<script>
                    window.alert("Cash Out Successfully");
                    window.location.href ="CICO.php";
                    </script>';
            } else {
                echo '<script>
                    window.alert("Cash Out Failed");
                    window.location.href ="CICO.php";
                    </script>';
            }
        } else {
            echo '<script>
                    window.alert("Your Balance Is Insufficient");
                    window.location.href ="CICO.php";
                    </script>';
           
        }
    }
}
?>
