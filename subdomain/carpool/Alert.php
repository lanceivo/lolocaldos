<?php
    session_start();
    $message='';
    if (isset($_SESSION['Email_exist']) && $_SESSION['Email_exist'] == 1) {
      $message = '<div id="incorrectMessage">Email is Already Exist</div><script>setTimeout(function(){ document.getElementById("incorrectMessage").style.display = "none"; }, 8000);</script>';
      unset($_SESSION['Email_exist']);
    }else if(isset($_SESSION['login_alert1']) && $_SESSION['login_alert1'] == 2){
        $message = '<div id="incorrectMessage">Email and Password is Incorrect</div><script>setTimeout(function(){ document.getElementById("incorrectMessage").style.display = "none"; }, 8000);</script>';
      unset($_SESSION['login_alert1']);
    }else if(isset($_SESSION['car_alert']) && $_SESSION['car_alert'] == 3){
        $message = '<div id="incorrectMessage">Wait for your Car Approval</div><script>setTimeout(function(){ document.getElementById("incorrectMessage").style.display = "none"; }, 8000);</script>';
      unset($_SESSION['car_alert']);
    }else if(isset($_SESSION['car_failed']) && $_SESSION['car_failed'] == 4){
      $message = '<div id="incorrectMessage">Car Registration Failed</div><script>setTimeout(function(){ document.getElementById("incorrectMessage").style.display = "none"; }, 8000);</script>';
      unset($_SESSION['car_failed']);

    }
    ?>