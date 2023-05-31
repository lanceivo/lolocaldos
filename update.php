<?php

require 'connection.php'; 
if(isset($_POST['publish'])) {
    
    $location = $_POST['location'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
   
    $sql = "UPDATE tbcontact
            SET cLocation = '$location',
                cEmail = '$email',
                cPhone = '$phone'
            WHERE cID = '1'";
    if(mysqli_query($db_connection, $sql)) {
        echo '<script> 
   window.alert("Information Updated");
   window.location.href ="admin_setting.php";
   </script>';
    exit();
    } else {
        echo '<script> 
   window.alert("Information Error Cannot Update");
   window.location.href ="admin_setting.php";
   </script>';
    }
}
?>
