<?php
session_start();
require 'connection.php';

$uid = $_GET['id']; 

// Check if the user is a passenger and if it's their first car registration
$queryUser = "SELECT User_ID FROM tbdriver WHERE Driver_ID = '$uid'";
$resultUser = mysqli_query($db_connection, $queryUser);
$userID = mysqli_fetch_assoc($resultUser)['User_ID'];

$queryDriver = "SELECT COUNT(*) AS carCount FROM tbdriver WHERE User_ID = '$userID'";
$resultDriver = mysqli_query($db_connection, $queryDriver);
$carCount = mysqli_fetch_assoc($resultDriver)['carCount'];

if ($carCount > 1) {
  // User already has more than one car registration
  // no changes
} else {
  // Update tbuser table to add 40 tickets to the uBalance column
  $queryUpdateUser = "UPDATE tbuser SET uBalance = uBalance + 40 WHERE User_ID = '$userID'";
  if (mysqli_query($db_connection, $queryUpdateUser)) {
    // header("Location: cashinform.php");
    echo '<script>
    window.alert("First Car is Approved. 40 tickets added to Balance of the user");
    window.location.href ="Homepage_Admin.php";
    </script>';
  } else {
    // Error in updating tbuser table
    echo "Error updating tbuser table: " . mysqli_error($db_connection);
  }
}
$query = "UPDATE tbdriver SET Status = 'Approved' WHERE Driver_ID = '$uid'";
$query2 = "UPDATE tbuser SET approved = 'Driver' WHERE User_ID = (SELECT User_ID FROM tbdriver WHERE Driver_ID = '$uid')";

if(mysqli_query($db_connection, $query) && mysqli_query($db_connection, $query2)){
  $_SESSION['user_id'] = mysqli_fetch_assoc(mysqli_query($db_connection, "SELECT User_ID FROM tbdriver WHERE Driver_ID = '$uid'"))['User_ID'];

  header('Location: Homepage_Admin.php');
  exit();
} else {
  echo "Invalid Information. Please try again.";
}
?>
