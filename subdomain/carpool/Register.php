<?php
    session_start();
    require 'connection.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

   require 'phpmailer/src/Exception.php';
   require 'phpmailer/src/PHPMailer.php';
   require 'phpmailer/src/SMTP.php';

   function sendemail_verify($fn, $email){
        $mail = new PHPMailer(true);
        
        $mail->isSMTP();                                           
        $mail->Host = 'smtp.gmail.com';                     
        $mail->SMTPAuth = true;                              
        $mail->Username = 'contactlolocaldos@gmail.com';                   
        $mail->Password = 'cbbknihzdvdyensl';                              
        $mail->SMTPSecure = "tls";           
        $mail->Port = 587;                                    
        //Recipients

        $mail->setFrom('contactlolocaldos@gmail.com', 'User Registration Carpool');
        $mail->addAddress($email);     
        $mail->isHTML(true); 
        $mail->Subject = 'Email verification';
        
        $message= "<p><b style='font-size: 30px;'>Carpool App</b><hr><br>Good day, <b> $fn </b>
        you only have one step to use the app, Click the link below to finalize the Carpool App Registration.
        <a href='https://carpool.lolocaldos.tech/login.php'><br>Verifying Email Address</a>";
        $mail->Body = $message;
        $mail->send();
        
   }
   if(isset($_POST['register'])){

        $fn = $_POST['firstname'];
        $mn = $_POST['middlename'];
        $ln = $_POST['lastname'];
        $contact = $_POST['contactnum'];
        $brgy = $_POST['brgy'];
        $city = $_POST['city'];
        $province = $_POST['province'];
        $email = $_POST['email'];
        $password = $_POST['password'];

       // Email is Exist //
        $email_exist = "SELECT Email FROM tbuser WHERE Email='$email' LIMIT 1";
        $email_exist_run = mysqli_query($db_connection, $email_exist);

        if(mysqli_num_rows($email_exist_run) > 0){
            $_SESSION['Email_exist']='1';
            header('Location:index.php');
        }else{
            $query = "INSERT INTO tbuser (Firstname, Middlename, Lastname, Contactnum, Barangay, Municipality, Province, Email, Password, approved) 
            VALUES ('$fn','$mn','$ln','$contact','$brgy','$city','$province','$email','$password','Registered')";
            
            $query_run = mysqli_query($db_connection, $query);
            
            if($query_run){
                sendemail_verify("$fn","$email");
                $_SESSION['register_passed']='6';
                header('Location:login.php');
            }else{
                $_SESSION['register_failed']='5';
                header('Location:index.php');
                
            }
        }   
   }
?>