<?php
session_start();
require 'connection.php';

$email = $_POST['email'];
$password = $_POST['password'];

$query = "SELECT * FROM tbuser WHERE Email = '$email' AND Password = '$password'";
$result = mysqli_query($db_connection, $query);

if (mysqli_num_rows($result) > 0) {
    $row = $result->fetch_assoc();
    if ($row['approved'] == 'Passenger') {
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        $_SESSION['uid'] = $row['User_ID'];
        header("Location:Homepage_passenger.php");
        exit();
    }else if($row['approved'] == 'Driver' ){
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        $_SESSION['uid'] = $row['User_ID'];
        header("Location:Homepage.php");
        exit();
    } else if ($row['approved'] == 'Admin' && $email == 'admin@gmail.com' && $password == 'admin') {
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        $_SESSION['uid'] = $row['User_ID'];
        header("Location:Homepage_Admin.php");
        exit();
    } else {
        $_SESSION['login_alert1'] = '2';
        header("Location: login.php?email=$email&password=$password");
        exit();
    }
} else {
    $_SESSION['login_alert1'] = '2';
    header("Location: login.php?email=$email&password=$password");
    exit();
}

mysqli_close($db_connection);

?>