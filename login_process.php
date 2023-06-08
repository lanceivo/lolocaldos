<?php
 require 'connection.php';
session_start();

$email = $_POST['email'];
$password = $_POST['password'];

$query = "SELECT * FROM tbuser WHERE email = '$email' AND Password = '$password'";
$result = mysqli_query($db_connection, $query);

if (mysqli_num_rows($result) > 0) {
    $row = $result->fetch_assoc();
    if ($row['email'] == $email && $row['password']==$password) {
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        $_SESSION['uid'] = $row['userID'];
        header("Location:admin_setting.php");
        exit();
    } else {
       echo '<script> 
       window.alert("Failed to Login");
       window.location.href ="login_register.html";
       </script>';
        exit();
    }
} else {
    echo '<script> 
       window.alert("Incorrect Information");
       window.location.href ="login_register.html";
       </script>';
        exit();
}
mysqli_close($db_connection);
?>
