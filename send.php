<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';
    require 'phpmailer/src/SMTP.php';

    if(isset($_POST["send"])){
        $email = $_POST["email"];
        $name = $_POST["name"];
        $subject = $_POST["subject"];
        // $msg = $_POST["message"];

        $msg = '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
        </head>
        <body>
            <p> Dear <strong> ' .$name . ' !</strong></p>
            <p>Thank you for your interest in our business resort! We are here to answer any questions you have about our facilities and services. 
                <br>If you have any suggestions on how we can improve, we would love to hear from you. Looking forward to hearing back from you soon.
            </p>
            <br><br>
            Have the day you deserve,<br>
            Lance Cunanan <br>
            <strong></b>Lolo Caldos Farmville Resort.</strong>

            <br><br>
        </body>
        </html>
        ';
        $mail = new PHPMailer(true);
        $mail -> isSMTP();
        $mail ->Host = 'smtp.hostinger.com';
        $mail -> SMTPAuth = true;
        $mail -> Username = 'contact@lolocaldos.tech';
        $mail -> Password = 'Lance@15';
        $mail -> SMTPSecure ='tls';
        $mail -> Port = 587;

        $mail-> setFrom('contact@lolocaldos.tech', 'Lolo Caldos Farmville Resort');
        
        $mail ->addAddress($email);

        $mail -> isHTML(true);

        $mail ->Subject = $subject;
        $mail -> Body = $msg;

        $mail ->send();
        header('location:index.php');    
    }
?>