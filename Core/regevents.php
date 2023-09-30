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
<?php
if (isset($_GET['success']) && $_GET['success'] == 1) {
    echo '<script>
            setTimeout(function() {
                Swal.fire({
                    icon: "success",
                    title: "Registration successful!",
                    showConfirmButton: false,
                    timer: 3000 // 3000 milliseconds = 3 seconds
                });
            }, 1000); // Delay for 1 second before showing the alert
          </script>';
}
?>
<!-- Rest of your regevents.php code -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="CSS/bootstrap/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="CSS/responsive.css">
    <!-- Include SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <style>
         body {
    line-height: 1.5;
    -webkit-font-smoothing: antialiased;
    background:rgb(244, 240, 232);
  }
    </style>
    <!-- Icons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <title>Register | Register Events</title>
</head>
<body>
<header>
        <nav class="navbar navbar-expand-lg py-3" >
            <div class="container">
                <a class="navbar-brand font-weight-bold d-inline d-lg-none" href="index.php">eventy.</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                    <a class="navbar-brand font-weight-bold d-none d-lg-inline" href="index.php">eventy.</a>
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="upcoming.php">Upcoming Events</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="past.php">Past Events</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link active" href="regevents.php">Register</a>
                        </li>
                    </ul>
                    <button class="btn btn-dark"><a href="login.php">Admin Login</a></button>
                </div>
            </div>
        </nav>
    </header>
    <main>
    <div class="page-header">
                <h1 class="text-center text-white">Register Events</h1>
            </div>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col py-3">                
                <div class="row justify-content-center">
                   
                    <div class="col-lg-10 ">
                        <div class="mt-5">
                            <form action="register.php" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label for="file" class="form-label">Image *</label>
                                        <input class="form-control" type="file" id="file" name="file" required>
                                      </div>                                    
                                    <div class="mb-3 col-md-6">
                                        <label for="aadhar" class="form-label">Aadhar No *</label>
                                        <input type="text1" class="form-control" id="aadhar" name="aadhar" required>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="name" class="form-label">Name *</label>
                                        <input type="text1" class="form-control" id="name" name="name" required>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="age" class="form-label">Age</label>
                                        <input type="text1" class="form-control" id="age" name="age" rows="3" required></textarea>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="mno" class="form-label">Mobile No</label>
                                        <input type="text1" class="form-control" id="mno" name="mno">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="gender" class="form-label">Gender</label>
                                        <input type="text1" class="form-control" id="gender" name="gender">
                                    </div>
                                    
                                    <div class="mb-3 col-md-6">
                                        <label for="email" class="form-label">EMail ID</label>
                                        <input type="text1" class="form-control" id="email" name="email">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="event" class="form-label">event</label>
                                        <select name="event" id="event" class="form-select" required>>
                                            <option value="">Select Event</option>
                                            
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
    </main>
    <footer class="py-3">
        <p class="text-center mb-0">©2023 copyright eventy.</p>
    </footer>
    <!-- JS -->
    <script src="JS/bootstrap/bootstrap.min.js"></script>
    <script>
        function validateForm() {
            var selectedEvent = document.getElementById("event").value;

            if (selectedEvent === "") {
                alert("Please select an event");
                return false; // Prevent form submission
            }
            return true; // Allow form submission
        }
</body>
</html>