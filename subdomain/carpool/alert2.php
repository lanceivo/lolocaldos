<?php
 $message='';
if(isset($_SESSION['insufficient']) && $_SESSION['insufficient'] == 8){
    $message = '<div id="incorrectMessage">Insufficient Balance</div><script>setTimeout(function(){ document.getElementById("incorrectMessage").style.display = "none"; }, 8000);</script>';
    unset($_SESSION['insufficient']);
  }else if(isset($_SESSION['cashin_success']) && $_SESSION['cashin_success'] == 10){
    $message = '<div id="incorrectMessage">Cash In Successfully</div><script>setTimeout(function(){ document.getElementById("incorrectMessage").style.display = "none"; }, 8000);</script>';
    unset($_SESSION['cashin_success']);
  }
?>