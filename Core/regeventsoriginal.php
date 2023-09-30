<?php
// Create database connection 
include_once("connection.php");

// Fetch all Events data from database
$event = mysqli_query($mysqli, "SELECT * 
FROM events 
WHERE events.date BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 6 MONTH)
ORDER BY id ASC, events.date ASC;
");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">        
    <link rel="stylesheet" href="CSS/bootstrap/bootstrap.min.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="CSS/bootstrap/bootstrap.min.css">
    <!-- icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Register | Register Events</title>

</head>
<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col py-3">
                
                <div class="row justify-content-center">
                   
                    <div class="col-lg-10 ">
                        <div class="text-end w-100 mb-5">
                            <h3>Welcome User!</h3>
                        </div>
                
                        <div class="mt-5 d-flex justify-content-between align-items-center">
                            <h3 class="">Register Event</h3>
                        </div>
                        <div class="mt-5">
                            <form action="register.php" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label for="file" class="form-label">Image *</label>
                                        <input class="form-control" type="file" id="file" name="file" required>
                                      </div>                                    
                                    <div class="mb-3 col-md-6">
                                        <label for="aadhar" class="form-label">Aadhar No *</label>
                                        <input type="text" class="form-control" id="aadhar" name="aadhar" required>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="name" class="form-label">Name *</label>
                                        <input type="text" class="form-control" id="name" name="name" required>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="age" class="form-label">Age</label>
                                        <input type="text" class="form-control" id="age" name="age" rows="3" required></textarea>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="mno" class="form-label">Mobile No</label>
                                        <input type="text" class="form-control" id="mno" name="mno">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="gender" class="form-label">Gender</label>
                                        <input type="text" class="form-control" id="gender" name="gender">
                                    </div>
                                    
                                    <div class="mb-3 col-md-6">
                                        <label for="email" class="form-label">EMail ID</label>
                                        <input type="text" class="form-control" id="email" name="email">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="event" class="form-label">event</label>
                                        <select name="event" id="event" class="form-select">
                                            <option value="">Select Event</option>
                                            <option value="">---------</option>
                                            
                                            <?php 
                                                while($Event_data = mysqli_fetch_array($event)) {
                                            ?>
                                            <option value="<?php echo $Event_data['id'] ?>"><?php echo $Event_data['title'] ?></option>
                                            <?php
                                                }
                                                mysqli_close($mysqli);
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <button class="btn btn-dark" type="submit" name="submit">Register Event</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- JS -->
    <script src="JS/bootstrap/bootstrap.min.js"></script>
</body>
</html>