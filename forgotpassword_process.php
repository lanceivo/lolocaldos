<?php
    require 'connection.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';
    require 'phpmailer/src/SMTP.php';
function send_password_reset($get_email,$token){
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'contactlolocaldos@gmail.com';
    $mail->Password = 'gnlinwxqbjmdkmwa';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->setFrom('contactlolocaldos@gmail.com', 'Lolo Caldos Farmville Resort');
    $mail->addAddress($get_email,$token);

    $mail->isHTML(true);
    $mail->Subject = "Reset Password Notification";
    $msg = "
        <!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
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
            <p>Hello <strong>$get_email!</strong></p>
            <p>Enter this code:  <strong>$token</strong></p>
            <p>Code to Reset your password.</p>
            <br><br>
                <a href='https://lolocaldos.tech/createpassword.php?token=$token&email=$get_email'>Verify Here</a>
            </body>
        </html>
    ";
    $mail->Body = $msg;
    
    // Call the send() function to send the email
    $mail->send();
}
    if(isset($_POST['forgotpassword'])){
        $email = mysqli_real_escape_string($db_connection,$_POST['email']);
        $token = md5(rand());

        $check_email = "SELECT email FROM tbuser WHERE email = '$email'";
        $check_email_run = mysqli_query($db_connection,$check_email);

        if(mysqli_num_rows($check_email_run)>0){
            $row = mysqli_fetch_array($check_email_run);
            $get_email= $row['email'];
            $update_code = "UPDATE tbuser SET code='$token' WHERE email='$get_email' LIMIT 1";
            $update_code_run = mysqli_query($db_connection,$update_code);

            if($update_code_run){
                    send_password_reset($get_email,$token);
                    echo '<script>
            window.alert("Password Emailed to you. ");
            window.location.href ="forgotpassword.php";
            </script>';
            
            exit();
            }else{
                echo '<script>
            window.alert("Something went wrong");
            window.location.href ="forgotpassword.php";
            </script>';
            exit();
            }

        }else{
            echo '<script>
            window.alert("No Email Found");
            window.location.href ="forgotpassword.php";
            </script>';
            exit();
        }
    }

    if(isset($_POST['password_update'])){
        $email = mysqli_real_escape_string($db_connection,$_POST['email']);
        $new = mysqli_real_escape_string($db_connection,$_POST['new_password']);
        $confirm = mysqli_real_escape_string($db_connection,$_POST['confirm_password']);
        $token = mysqli_real_escape_string($db_connection,$_POST['token']);

        if(!empty($token)){
            if(!empty($email) && !empty($new) && !empty($confirm)){
                $check_token = "SELECT code FROM tbuser WHERE code='$token' LIMIT 1";
                $check_token_run = mysqli_query($db_connection,$check_token);
                if(mysqli_num_rows($check_token_run)){
                          if($new == $confirm){
                                $update_password = "UPDATE tbuser SET password ='$new' WHERE code='$token' LIMIT 1";
                                $update_password_run = mysqli_query($db_connection,$update_password);
                                if($update_password_run){
                                    echo "<script>
                                    window.alert('New Password Updated');
                                    window.location.href ='login_register.html';
                                    </script>";
                                   
                                }else{
                                    echo "<script>
                                    window.alert('Did not update password. Something went wrong.);
                                    window.location.href ='createpassword.php?token=$token&email=$email';
                                    </script>";
                                }
                          } else{
                            echo "<script>
                            window.alert('Password and Confirm Password not Match');
                            window.location.href ='createpassword.php?token=$token&email=$email';
                            </script>"; 
                          } 
                }else{
                    echo "<script>
                            window.alert('Invalid Token');
                            window.location.href ='createpassword.php?token=$token&email=$email';
                            </script>";   
                }
            }else{
                echo "<script>
                            window.alert('All Field is Required');
                            window.location.href ='createpassword.php?token=$token&email=$email';
                            </script>"; 
            }
        }else{
            echo "<script>
            window.alert('No Token Available');
            window.location.href ='createpassword.php?token=$token&email=$email';
            </script>"; 
        }

    }

?>