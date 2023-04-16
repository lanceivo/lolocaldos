<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    session_start();
    $email = $_SESSION['email'];
    $msg = $_SESSION['message'];
    $name = $_SESSION['name'];
    $subject = $_SESSION['subject'];
?>
<center>
    <div class="receive-content">
        <h1 class="#">Name: <?php echo $name ?></h1>
        <h1>Email: <?php echo $email ?></h1>
        <h1>Subject: <?php echo $subject ?></h1>
        <h1>Feedback: <?php echo $msg ?></h1>

        <h1>THANK YOU FOR YOUR FEEDBACK</h1>
        <a href="index.php"> <input type="button" value="Back"> <a>
    </div>
</center>
</body>
</html>