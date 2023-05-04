<?php
session_start();
require 'connection.php';

$email = $_POST['email'];
$password = $_POST['password'];

$_SESSION['email'] = $email;
$_SESSION['password'] = $password;

$query = "SELECT * FROM tbuser WHERE Email = '$email' AND Password = '$password' AND approved = 'Registered'";
$result = mysqli_query($db_connection, $query);

if (mysqli_num_rows($result) > 0) {
    $row = $result->fetch_assoc();
    $_SESSION['email'] = $email;
    $_SESSION['password'] = $password;
    
    $ids = $row['User_ID'];
    $_SESSION['uid'] = $ids;
    header("Location:Homepage.php");
    exit();
} else{
    $_SESSION['login_alert1'] = '2';
    header("Location:Login.php"); 
    
}
$email2 = 'admin@gmail.com';
$password2 = 'admin';
$query2 = "SELECT * FROM tbuser WHERE Email = '$email2' AND Password = '$password2' AND approved = 'Admin'";
$result2 = mysqli_query($db_connection, $query2);

if (mysqli_num_rows($result2) > 0) {
    $row = $result2->fetch_assoc();
    $_SESSION['email'] = $email;
    $_SESSION['password'] = $password;

    $ids = $row['User_ID'];
    $_SESSION['uid'] = $ids;
    header("Location:Homepage_Admin.php");
    exit();
} else {
    $_SESSION['login_alert1'] = '2';
    header("Location:Login.php"); 
    exit();
}
mysqli_close($db_connection);
?>