<?php
// Create database connection 
include_once("../../connection.php");

// Fetch all artist data from database
$artists = mysqli_query($mysqli, "SELECT * FROM artists ORDER BY id ASC");


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap -->
        <link rel="stylesheet" href="../../CSS/bootstrap/bootstrap.min.css">
        <!-- icon -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <title>Admin Dashboard</title>
    </head>
</head>
<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <a href="../../index.php" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <span class="fs-5 d-none d-sm-inline">eventy.</span>
                    </a>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                        <li class="nav-item">
                            <a href="../dashboard.php" class="nav-link align-middle px-0 text-white border-right">
                                <i class="fas fa-tachometer-alt"></i> <span class="d-none d-sm-inline" style="padding-left: 15px;">Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle text-white">
                                <i class="fas fa-calendar-alt"></i> <span class="d-none d-sm-inline" style="padding-left: 15px;">Manage Events</span> </a>
                            <ul class="collapse nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                                <li class="w-100">
                                    <a href="viewevents.php" class="nav-link pr-0 pl-3 text-white"><i class="fa-solid fa-eye"></i> <span class="d-none d-sm-inline">View Events</a>
                                </li>
                                <li>
                                    <a href="addevent.php" class="nav-link pr-0 pl-3 text-white"><i class="fa-solid fa-calendar-plus"></i> <span class="d-none d-sm-inline">Add Event</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#submenu2" data-bs-toggle="collapse" class="nav-link px-0 align-middle text-white">
                                <i class="fas fa-user-alt"></i><span class="d-none d-sm-inline" style="padding-left: 15px;">Manage Artists</span></a>
                            <ul class="collapse nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">
                                <li class="w-100">
                                    <a href="../Artist/viewartist.php" class="nav-link pr-0 pl-3 text-white"><i class="fa-solid fa-eye"></i> <span class="d-none d-sm-inline">View Artists</a>
                                </li>
                                <li>
                                    <a href="../Artist/addartist.php" class="nav-link pr-0 pl-3 text-white"><i class="fa-solid fa-user-plus"></i> <span class="d-none d-sm-inline">Add Artist</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#submenu3" data-bs-toggle="collapse" class="nav-link px-0 align-middle text-white">
                                <i class="fas fa-user-alt"></i><span class="d-none d-sm-inline" style="padding-left: 15px;">Manage Registers</span></a>
                            <ul class="collapse nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">
                                <li class="w-100">
                                    <a href="../Register/viewregister.php" class="nav-link pr-0 pl-3 text-white"><i class="fa-solid fa-eye"></i> <span class="d-none d-sm-inline">View Registers</a>
                                </li>
                                <li>
                                    <a href="../Register/addregister.php" class="nav-link pr-0 pl-3 text-white"><i class="fa-solid fa-user-plus"></i> <span class="d-none d-sm-inline">Add Register</a>
                                </li>
                            </ul>
                        </li>
                        <hr>
                        
                    </ul>
                </div>
            </div>
            <div class="col py-3">
                
                <div class="row justify-content-center">
                   
                    <div class="col-lg-10 ">
                        <div class="text-end w-100 mb-5">
                            <h3>Welcome Admin!</h3>
                        </div>
                
                        <div class="mt-5 d-flex justify-content-between align-items-center">
                            <h3 class="">Add Event</h3>
                        </div>
                        <div class="mt-5">
                        <form action="add.php" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label for="file" class="form-label">Image *</label>
                                        <input class="form-control" type="file" id="file" name="file">
                                      </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="title" class="form-label">Event Title *</label>
                                        <input type="text" class="form-control" id="title" name="title">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="category" class="form-label">Category</label>
                                        <input type="text" class="form-control" id="category" name="category" rows="3"></textarea>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="artist" class="form-label">Artist</label>
                                        <select name="artist" id="artist" class="form-select">
                                            <option value="">Select Artist</option>
                                            <option value="">---------</option>
                                            
                                            <?php 
                                                while($artist_data = mysqli_fetch_array($artists)) {
                                            ?>
                                            <option value="<?php echo $artist_data['id'] ?>"><?php echo $artist_data['artist_name'] ?></option>
                                            <?php
                                                }
                                                mysqli_close($mysqli);
                                            ?>
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="attendance" class="form-label">Attendance</label>
                                        <input type="number" class="form-control" id="attendance" name="attendance">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="fees" class="form-label">Fees</label>
                                        <input type="text" class="form-control" id="fees" name="fees" value="Free">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="date" class="form-label">Date</label>
                                        <input type="date" class="form-control" id="date" name="date">
                                    </div>
                                    <div class="mb-3 col-md-3">
                                        <label for="starttime" class="form-label">Start Time</label>
                                        <input type="time" class="form-control" id="starttime" name="starttime">
                                    </div>
                                    <div class="mb-3 col-md-3">
                                        <label for="endtime" class="form-label">End Time</label>
                                        <input type="time" class="form-control" id="endtime" name="endtime">
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <button class="btn btn-dark" type="submit" name="submit">Add Event</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- JS -->
    <script src="../../JS/bootstrap/bootstrap.min.js"></script>
</body>
</html>