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
        $query = "INSERT INTO tb_ci_co (User_ID, transaction_type, amount, gcash_ref_num, status)
                  VALUES ('$ids', '$tran_type', '$amount', '$gcashref', 'Confirmed')";
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
                    header('Location: cashinform.php');
                } else {
                    $_SESSION['cashin_failed'] = '7';
                    header('Location: CICO.php');
                }
            } else {
                echo "Invalid amount";
                exit;
            }
        } else {
            $_SESSION['cashin_failed'] = '7';
            header('Location: CICO.php');
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
                $_SESSION['cashout_success'] = '9';
                header('Location: CICO.php');
            } else {
                $_SESSION['cashout_failed'] = '7';
                header('Location: Cashout.php');
            }
        } else {
            $_SESSION['insufficient'] = '8';
            header('Location: CICO.php');
        }
    }
}
?>
