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

        $email2 = $_POST["email"];
        $name2 = $_POST["name"];
        $subject2 = $_POST["subject"];
        $messages2 = $_POST["message"];

        $msg2 = '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
        </head>
        <body>
            <p> FROM: ' . $name2 . ' </p><br>
            <p><strong> Subject: </strong>' . $subject2 . '</p>
            <br>
            <p><strong> Message of the Sender: </strong>' . $messages2 . '
            </p>
            <br><br>
            Have the day you deserve,<br>
            <strong></b>Lolo Caldos Farmville Resort.</strong>
            <br><br>
        </body>
        </html>
        ';
        $mail2 = new PHPMailer(true);
        $mail2 -> isSMTP();
        $mail2 ->Host = 'smtp.gmail.com';
        $mail2 -> SMTPAuth = true;
        $mail2 -> Username = 'samsonlance1@gmail.com';
        $mail2 -> Password = 'yegtrkpoqwxcuzjo';
        $mail2 -> SMTPSecure ='tls';
        $mail2 -> Port = 587;
 
        // $mail2-> setFrom('samsonlance1@gmail.com', 'Lolo Caldos Farmville Resort');
        
        $mail2 ->addAddress('samsonlance1@gmail.com');
        $mail2 -> isHTML(true);
        
        $mail2 ->Subject = $subject2;
        $mail2 -> Body = $msg2;
        $mail2 ->send();
        header('location:index.html');    
    }
?>