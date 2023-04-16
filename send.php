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
            Best regards,<br>
            Lance Cunanan <br>
            <strong>Lolo Caldos Farmville Resort.</strong>

            <br><br>
        </body>
        </html>
        ';
        $mail = new PHPMailer(true);
        $mail -> isSMTP();
        $mail ->Host = 'smtp.gmail.com';
        $mail -> SMTPAuth = true;
        $mail -> Username = 'samsonlance1@gmail.com';
        $mail -> Password = 'tywnlftvwpvcjmjl';
        $mail -> SMTPSecure ='ssl';
        $mail -> Port = 465;

        $mail-> setFrom('samsonlance1@gmail.com', 'Lolo Caldos Farmville Resort');
        
        $mail ->addAddress($email);

        $mail -> isHTML(true);

        $mail ->Subject = $subject;
        $mail -> Body = $msg;

        $mail ->send();
        header('location:index.php');    
    }
?>