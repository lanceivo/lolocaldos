<?php
    session_start();
   require 'connection.php';
   use PHPMailer\PHPMailer\PHPMailer;
   use PHPMailer\PHPMailer\SMTP;
   use PHPMailer\PHPMailer\Exception;

   require 'phpmailer/src/Exception.php';
   require 'phpmailer/src/PHPMailer.php';
   require 'phpmailer/src/SMTP.php';
  
   if(isset($_POST['send'])){
         function sendemail_verify($fn,$ln,$email,$Confirmed){
        $mail = new PHPMailer(true);
        // $mail->SMTPDebug = SMTP::DEBUG_OFF; 
        $mail->isSMTP();                                           
        $mail->Host = 'smtp.hostinger.com';                     
        $mail->SMTPAuth = true;      
                                    
        $mail->Username = 'contact@lolocaldos.tech';                   
        $mail->Password = 'lance@15';                              
        $mail->SMTPSecure = "tls";           
        $mail->Port = 587;                                    
        //Recipients    

        $mail->setFrom('contact@lolocaldos.tech', 'User Registration Carpool');
        $mail->addAddress($email);     
        $mail->isHTML(true); 
        $mail->Subject = 'Email verification';
        
        $message= "<p><b style='font-size: 30px;'>Carpool App</b><hr><br>Good day, <b> $fn  $ln </b>
        you only have one step to use the app, Click the link below to finalize the Carpool App Registration.
        <a href='https://carpool.lolocaldos.tech/Registeredlist.php?token=$Confirmed'><br>Verifying Email Address</a>";
        $mail->Body = $message;
        $mail->send();
        
}
        //GET THE DATA FROM THE FORM
        require 'connection.php';
        $fn = $_POST['Firstname'];
        $mn = $_POST['middlename'];
        $ln = $_POST['lastname'];
        $contact = $_POST['contactnum'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $Confirmed = "Registered";
    
        //Email is Exist
        $email_exist = "SELECT Email FROM tbuser WHERE Email='$email' LIMIT 1";
        $email_exist_run = mysqli_query($db_connection, $email_exist);
        
        if(mysqli_num_rows($email_exist_run) > 0){

            echo "Email already Exist";
             header('Location:index.html');
        }else{
            // Insert User /
            $query = "INSERT INTO tbuser (Firstname, Middlename, Lastname,Contactnum,Email,Password,approved) VALUES ('$fn','$mn','$ln','$contact','$email','$password', 'Registered')";
            $query_run = mysqli_query($db_connection, $query);

            if($query_run){
                 sendemail_verify("$fn","$ln","$email","$Confirmed");
                 echo "<center><h1>CLICK THE LINK IN YOUR EMAIL</h1> </center>";
            }else{
                echo "Registered Failed";
                header('Location:index.html');
            }
  
        }

   }
?>