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
    }else if(isset($_SESSION['register_failed']) && $_SESSION['register_failed'] == 5){
      $message = '<div id="incorrectMessage">Registration Error</div><script>setTimeout(function(){ document.getElementById("incorrectMessage").style.display = "none"; }, 8000);</script>';
      unset($_SESSION['register_failed']);
    }else if(isset($_SESSION['register_passed']) && $_SESSION['register_passed'] == 6){
      $message = '<div id="incorrectMessage">Verify your account from your email inbox.</div><script>setTimeout(function(){ document.getElementById("incorrectMessage").style.display = "none"; }, 8000);</script>';
      unset($_SESSION['register_passed']);
    }else if(isset($_SESSION['cashin_failed']) && $_SESSION['cashin_failed'] == 7){
      $message = '<div id="incorrectMessage">cashin_failed</div><script>setTimeout(function(){ document.getElementById("incorrectMessage").style.display = "none"; }, 8000);</script>';
      unset($_SESSION['cashin_failed']);
    }else if(isset($_SESSION['insufficient']) && $_SESSION['insufficient'] == 8){
      $message = '<div id="incorrectMessage">Insufficient Balance</div><script>setTimeout(function(){ document.getElementById("incorrectMessage").style.display = "none"; }, 8000);</script>';
      unset($_SESSION['insufficient']);
    }else if(isset($_SESSION['cashout_success']) && $_SESSION['cashout_success'] == 9){
      $message = '<div id="incorrectMessage">Cash Out Success</div><script>setTimeout(function(){ document.getElementById("incorrectMessage").style.display = "none"; }, 8000);</script>';
      unset($_SESSION['cashout_success']);
    }
    ?>