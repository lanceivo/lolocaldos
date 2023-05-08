<?php
    session_start();
    $message='';
    if (isset($_SESSION['Email_exist']) && $_SESSION['Email_exist'] == 1) {
      $message = '<div id="incorrectMessage">Email is Already Exist</div><script>setTimeout(function(){ document.getElementById("incorrectMessage").style.display = "none"; }, 8000);</script>';
      unset($_SESSION['Email_exist']);
    }else if(isset($_SESSION['car_alert']) && $_SESSION['car_alert'] == 3){
        $message = '<div id="incorrectMessage">Wait for your Car Approval</div><script>setTimeout(function(){ document.getElementById("incorrectMessage").style.display = "none"; }, 8000);</script>';
      unset($_SESSION['car_alert']);
    }else if(isset($_SESSION['car_failed']) && $_SESSION['car_failed'] == 4){
      $message = '<div id="incorrectMessage">Car Registration Failed</div><script>setTimeout(function(){ document.getElementById("incorrectMessage").style.display = "none"; }, 8000);</script>';
      unset($_SESSION['car_failed']);
    }else if(isset($_SESSION['register_failed']) && $_SESSION['register_failed'] == 5){
      $message = '<div id="incorrectMessage">Registration Error</div><script>setTimeout(function(){ document.getElementById("incorrectMessage").style.display = "none"; }, 8000);</script>';
      unset($_SESSION['register_failed']);
    }else if(isset($_SESSION['register_passed']) && $_SESSION['register_passed'] == 6){
      $message = '<div id="incorrectMessage">Verify your account from your email inbox.</div><script>setTimeout(function(){ document.getElementById("incorrectMessage").style.display = "none"; }, 8000);</script>';
      unset($_SESSION['register_passed']);
    }
    ?>