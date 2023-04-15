<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';
    require 'phpmailer/src/SMTP.php';

    if(isset($_POST["send"])){
        $mail = new PHPMailer(true);
        session_start();

        $email = $_POST["email"];
        $msg = $_POST["message"];
        $name = $_POST["name"];
        $subject = $_POST["subject"];

        $_SESSION['name'] =$name;
        $_SESSION['subject'] = $subject;
        $_SESSION['email'] = $email;
        $_SESSION['message'] = $msg;
       
        $mail -> isSMTP();
        $mail ->Host = 'smtp.gmail.com';
        $mail -> SMTPAuth = true;
        $mail -> Username = 'samsonlance1@gmail.com';
        $mail -> Password = 'tywnlftvwpvcjmjl';
        $mail -> SMTPSecure ='ssl';
        $mail -> Port = 465;

        $mail-> setFrom('samsonlance1@gmail.com');

        $mail ->addAddress('samsonlance1@gmail.com');

        $mail -> isHTML(true);

        $mail ->Subject = $_POST["email"];
        $mail -> Body = $_POST["message"];

        $mail ->send();
        
        echo
        "
        <script>
        Alert('Send Successfully');
        document.location.href = 'index.php';
        </script>

        ";
        header('location:receive.php');
    }
?>