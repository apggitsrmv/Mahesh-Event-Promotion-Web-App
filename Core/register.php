<?php
include_once("connection.php");
    $name = $_POST['name'];
    $aadhar = $_POST['aadhar'];
    $age = $_POST['age'];
    $mno = $_POST['mno'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $event = $_POST['event'];
    $filename = $_FILES["file"]["name"];
    $tempname = $_FILES["file"]["tmp_name"];
    $folder = "Images/" . $filename;
    $query = "INSERT INTO register(visiter_image,visiter_name,visiter_aadhar,visiter_age,visiter_mno,visiter_email,visiter_gender,visiter_event) 
    VALUES('$filename','$name','$aadhar','$age','$mno','$email','$gender','$event')";
    // Insert event data into table
    $result = mysqli_query($mysqli, $query);
    if (move_uploaded_file($tempname, $folder)) {
        header('Location: regevents.php');
        //echo "<h3> Registration Successful!</h3>";
    }
    else {
        echo "<h3> Failed to upload image!</h3>";
    }
    mysqli_close($mysqli);
?>