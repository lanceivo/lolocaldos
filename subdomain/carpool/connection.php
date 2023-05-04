<?php

        $server = "localhost";
        $username = "u235219407_lancexx";
        $password = "Lance@15xx";
        $database = "u235219407_carpoolingxx";
    
    $db_connection = mysqli_connect($server,$username,$password,$database);
    if(mysqli_connect_errno()){
        echo "Failed to connect to MYSQL:" .mysqli_connect_error();
        exit();
}
?>