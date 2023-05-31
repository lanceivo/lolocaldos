<?php
            $server = "localhost";
            $username = "u235219407_LanceCun";
            $password = "Lance123";
            $database = "u235219407_lolocaldos";
        
        $db_connection = mysqli_connect($server,$username,$password,$database);
        if(mysqli_connect_errno()){
            echo "Failed to connect to MYSQL:" .mysqli_connect_error();
            exit();
    }

?>