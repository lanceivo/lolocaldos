<?php

    require 'connection.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
function sendemail($name, $email, $subject) {
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.hostinger.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'contact@lolocaldos.tech';
    $mail->Password = 'Lance@15';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->setFrom('contact@lolocaldos.tech', 'Lolo Caldos Farmville Resort');
    $mail->addAddress($email);

    $mail->isHTML(true);
    $mail->Subject = $subject;
    $msg = '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <style>
                body {
                    font-family: Arial, sans-serif;
                    line-height: 1.5;
                    color: #333;
                    margin: 0;
                    padding: 20px;
                }
                
                p {
                    margin-bottom: 10px;
                }
                
                strong {
                    font-weight: bold;
                }
                
                .signature {
                    margin-top: 30px;
                }
                
                .signature strong {
                    font-size: 18px;
                }
            </style>
        </head>
        <body>
            <p>Dear <strong>' . $name . '!</strong></p>
            <p>Thank you for your interest in our business resort! We are here to answer any questions you have about our facilities and services.</p>
            <p>If you have any suggestions on how we can improve, we would love to hear from you. Looking forward to hearing back from you soon.</p>
            <br><br>
            <p class="signature">Have the day you deserve,</p>
            <p class="signature"><strong>Lolo Caldos Farmville Resort.</strong></p>
        </body>
        </html>
    ';
    $mail->Body = $msg;
    
    // Call the send() function to send the email
    $mail->send();
}

if (isset($_POST["send"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $msg = $_POST["message"];

    $query = "INSERT INTO tbcontact (name,email,subject,message) VALUES ('$name','$email','$subject','$msg')";
    $query_run = mysqli_query($db_connection, $query);

    if($query_run){
        sendemail($name,$email,$subject);
        echo '<script>
        window.alert("Message Inquiry Sent");
        window.location.href ="contact.php";
        </script>';
    }else{
        echo '<script>
        window.alert("Message Failed to sent");
        window.location.href ="contact.php";
        </script>';
    } 
}

?>
