<?php
require 'connection.php';
session_start();
    if(isset($_POST['proceed'])){
        $tran_type = $_POST['cico'];
        $gcashref = $_POST['gcashref'];
        $amount = $_POST['amount'];
        $confee = $_POST['confee'];


        $ids = $_SESSION['uid'];
       
        $query = "INSERT INTO tb_ci_co (User_ID, transaction_type,gcash_ref_num, con_fee, amount,status)
        VALUES ('$ids','$tran_type','$gcashref','$confee','$amount','Confirmed')";
        $result = mysqli_query($db_connection, $query);

        if($result){
            if($amount >= 50 && $amount <= 99){
                $conversionRate = 40;
            }else if($amount >= 100 && $amount <=249){
                $conversionRate = 80;
            }else if($amount >= 250 && $amount <=499){
                $conversionRate = 200;
            }else if($amount == 500 && $amount <=699){
                $conversionRate = 450;
            }else if($amount == 1000 && $amount <=1049){
                $conversionRate = 950;
            }else{
                echo '<script>
                    window.alert("Invalid Amount");
                    window.location.href ="cashin_passenger.php";
                    </script>';
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