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
    if ($result) {
        // If insertion is successful
        echo '<script>
                setTimeout(function() {
                    window.location.href = "regevents.php?success=1"; // Redirect to regevents.php with success parameter
                }); 
              </script>';
    } else {
        // If insertion fails
        echo '<script>
                setTimeout(function() {
                    window.location.href = "regevents.php"; // Redirect to regevents.php without success parameter
                });
              </script>';
    }
    mysqli_close($mysqli);
?>