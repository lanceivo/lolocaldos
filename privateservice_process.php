<?php
require 'connection.php';

if (isset($_POST['changeservice'])) {
    $A = $_POST['packageA'];
    $B = $_POST['packageB'];
    $C = $_POST['packageC'];
    $rate = $_POST['servicerate'];

    // Handle the uploaded image
    $targetDir = 'uploadss/'; // Set the target directory
    $targetFile = $targetDir . basename($_FILES['serviceImage']['name']); // Get the file path
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION)); // Get the file extension

    // Check if the file is a JPG or PNG image
    if ($imageFileType == 'jpg' || $imageFileType == 'png') {
        if (move_uploaded_file($_FILES['serviceImage']['tmp_name'], $targetFile)) {
            $serviceImagePath = $targetFile; // Save the file path

            // Get the original image width and height
            $imageInfo = getimagesize($targetFile);
            $imageWidth = $imageInfo[0];
            $imageHeight = $imageInfo[1];

            // Store the image width and height in the database
            $sql = "UPDATE tbprivate SET packageA = '$A',
                                         packageB = '$B',
                                         packageC = '$C',
                                         img_file = '$serviceImagePath',
                                         img_width = '$imageWidth',
                                         img_height = '$imageHeight',
                                         price = '$rate'
                    WHERE privateID = '1'";

            if (mysqli_query($db_connection, $sql)) {
                echo '<script> 
                        window.alert("Private Service Updated");
                        window.location.href ="admin_setting.php";
                      </script>';
                exit();
            } else {
                echo '<script> 
                        window.alert("Private Service Cannot Update");
                        window.location.href ="admin_setting.php";
                      </script>';
            }
        } else {
            // Handle the case when the file upload fails
            $serviceImagePath = ''; // Set a default or empty value
        }
    } else {
        // Handle the case when the file is not a JPG or PNG image
        echo '<script> 
                window.alert("Only JPG and PNG images are allowed");
                window.location.href ="admin_setting.php";
              </script>';
        exit();
    }
}
?>
