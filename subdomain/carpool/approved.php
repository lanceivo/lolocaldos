<?php
  require 'connection.php';
  $uid = $_GET['id'];
  
  $query = "UPDATE tbdriver SET Status = 'Approved' WHERE Driver_ID = '$uid'";
  
  if(mysqli_query($db_connection, $query)){
    header('Location: Homepage_Admin.php');
    exit();
  }else{
    echo "Invalid Information. Please try again.";
  }
?>
