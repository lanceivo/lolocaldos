<?php

    require 'connection.php';
    session_start();
    
    if(isset($_POST['update'])) {
        $ids = $_SESSION['uid'];
        $updated_firstname = $_POST['firstname'];
        $updated_middlename = $_POST['middlename'];
        $updated_lastname = $_POST['lastname'];
        $updated_barangay = $_POST['brgy'];
        $updated_municipality = $_POST['city'];
        $updated_province = $_POST['province'];
        
        $sql = "UPDATE tbuser
                SET Firstname = '$updated_firstname',
                    Middlename = '$updated_middlename',
                    Lastname = '$updated_lastname',
                    Barangay = '$updated_barangay',
                    Municipality = '$updated_municipality',
                    Province = '$updated_province'
                WHERE User_ID = {$ids}";
    
        if(mysqli_query($db_connection, $sql)) {
            header('Location:Homepage.php');
        } else {
            echo "error updating";
        }
    }
    
?>
