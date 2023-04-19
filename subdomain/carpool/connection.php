<?php

        //$server = "localhost";
        $username = "u235219407_lance";
        $password = "Lance@15";
        $database = "u235219407_carpooling";
    
    $db_connection = mysqli_connect($username,$password,$database);
    if(mysqli_connect_errno()){
        echo "Failed to connect to MYSQL:" .mysqli_connect_error();
        exit();
}
?>