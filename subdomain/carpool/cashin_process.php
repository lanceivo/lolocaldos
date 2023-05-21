<?php
require 'connection.php';
session_start();
    if(isset($_POST['proceed'])){
        $tran_type = $_POST['cico'];
        $amount = $_POST['amount'];
        $gcashref = $_POST['gcashref'];


        $ids = $_SESSION['uid'];
       
        $query = "INSERT INTO tb_ci_co (User_ID, transaction_type, amount,gcash_ref_num,status)
        VALUES ('$ids','$tran_type','$amount','$gcashref','Confirmed')";
        $result = mysqli_query($db_connection, $query);

        if($result){
            if($amount == 50){
                $conversionRate = 40;
            }else if($amount == 100){
                $conversionRate = 80;
            }else if($amount == 250){
                $conversionRate = 200;
            }else if($amount == 500){
                $conversionRate = 450;
            }else{
                echo "Invalid amount";
                exit;
            }
            $updateQuery = "UPDATE tbuser SET uBalance = uBalance + $conversionRate WHERE User_ID = '$ids'";
            $updateResult = mysqli_query($db_connection, $updateQuery);
            if ($updateResult) {
                echo '<script>
                    window.alert("Cash In Successfully");
                    window.location.href ="cashin_passenger.php";
                    </script>';
            } else {
                echo '<script>
                    window.alert("Cash In Failed");
                    window.location.href ="cashin_passenger.php";
                    </script>';
            }
        } else {
            echo '<script>
                    window.alert("Cash In Failed");
                    window.location.href ="cashin_passenger.php";
                    </script>';
        }
    }

?>