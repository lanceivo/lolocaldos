<?php
session_start();
require 'connection.php';

unset($_SESSION['email']);
header("location:login.php");
?>