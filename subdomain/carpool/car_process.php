<?php
    require 'connection.php';
    session_start();

    if(isset($_POST['registercar'])){
        $vin = $_POST['vin'];
        $caryear = $_POST['caryear'];
        $carmake = $_POST['carmake'];
        $carcolor = $_POST['carcolor'];
        $carmodel = $_POST['carmodel'];
        $license =$_POST['license'];
        
      
        $ids = $_SESSION['uid'];
       
        $query = "INSERT INTO tbdriver (User_ID, VIN, Car_year, Car_make, Car_color, Car_Model, License_Plate_Num, Total_feedback,Number_of_trips,Status)
        VALUES ('$ids','$vin','$caryear','$carmake','$carcolor','$carmodel','$license','0','0','Pending')";
        $result = mysqli_query($db_connection, $query);
        
        if($result){
            $_SESSION['car_alert'] = '3';
            header('Location:Homepage.php');
        }else{
            $_SESSION['car_failed'] = '4';
            header('Location:Homepage.php');
        }
    }
  
?>