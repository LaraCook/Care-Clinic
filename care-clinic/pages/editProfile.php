<?php 

include '../fragments/loginSuccess.php';
require '../fragments/functions.php';
require './update_patient.php';

function editProfile(){
    $mysqli = new mysqli('localhost', 'root', '', 'careclinic');

    if($mysqli->connect_error){
        die("Connection Error: " . $mysqli->connect_errno . ":" . $mysqli->connect_error);
    }

    if(isset($_SESSION['username'])){
        $profileName = $_SESSION['username'];
        $userProfileQuery = "SELECT * FROM receptionist WHERE username = '$profileName'";

        if($result = $mysqli->query($userProfileQuery)){
            while($row = $result->fetch_assoc()){

                $profileID = $row['ReceptionistID'];
                $username = $row['username'];
                $email = $row['email'];
                $password = $row['password'];
    
                echo '
                    <form class="form"  enctype="multipart/form-data" method="post" action="update_profile.php?id='.$profileID.'">
    
                    <h1>Edit my Profile</h1>
                    <p>Please note: You will be logged out upon save</p>
    
                    <label>Full Name</label>
                    <input type="text" name="fullname" value="' .$username. '">
    
                    <label>Email</label>
                    <input type="email" name="email" value="'.$email.'">
    
                    <label>Password</label>
                    <input type="password" name="password" value="'.$password.'">
    
                    <label class="browse" for="photo-upload">Change profile picture</label>
                    <input type="file" id="photo-upload" name="new-profile-picture">
    
                    <a href="../pages/myProfile?id='.$profileID.'"><button class="btn save">Save</button></a>
    
                </form>
                    ';                   
            }

            $result->free();

        }

    }
} 

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- META TAGS -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- TITLE -->
    <title>My Profile</title>
    <link rel="icon" href="/img/caduceus-symbol.svg">

    <!-- FILE LINKS -->

    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <!-- MOMENT.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"
        integrity="sha512-rmZcZsyhe0/MAjquhTgiUcb4d9knaFc7b5xAfju483gbEXTkeJRUMIPk6s3ySZMYUHEcjKbjLjyddGWMrNEvZg=="
        crossorigin="anonymous"></script>

    <!-- JAVASCRIPT -->
    <script src="/js/dashboard.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="../css/editProfile.css" />

</head>

<body>

    <!-- NAV BAR -->
    <div class="navbar">

        <h1>My Profile</h1>

        <input type="text" name="search" id="search" placeholder="Search">

    </div>

    <!-- MAIN CONTENT -->
    <div class="main">

        <div class="profile">

            <div class="box profile-information">

                <div class="image">
                    <img src="../img/writing.svg">

                    <h1>Updating your profile is super easy!</h1>
                    <p>Don't want to edit your profile?</p>

                    <a href="../pages/dashboard.php"><div class="btn cancel">Cancel</div></a>

                </div>

                <?php editProfile(); ?>
                <!-- <form class="form">

                    <h1>Edit my Profile</h1>
                    <p>Click save to update your information</p>

                    <label>Full Name</label>
                    <input type="text" name="fullname">

                    <label>Email</label>
                    <input type="email" name="email">

                    <label>Password</label>
                    <input type="password">

                    <label class="browse" for="photo-upload">Change profile picture</label>
                    <input type="file" id="photo-upload">

                    <button class="btn save">Save</button>

                </form> -->

            </div>

        </div>

    </div> <!-- END OF MAIN CONTENT -->

    <!-- SIDE BAR -->
    <div class="side-bar">

        <div class="logo">
            <img src="../img/caduceus-symbol.svg">
        </div>

        <div class="user-info">
            <label class="welcome">Welcome back,</label>
            <label class="username"><?php showUsername(); ?></label>
        </div>

        <div class="nav-button">
            <a href="../pages/dashboard.php">
                <img src="../img/icons/home.svg">
                <h2>Dashboard</h2>
            </a>
        </div>

        <div class="nav-button">
            <a href="../pages/doctors.php">
                <img src="../img/icons/doctor.svg">
                <h2>Doctors</h2>
            </a>
        </div>

        <div class="nav-button">
            <a href="../pages/patients.php">
                <img src="../img/icons/patient.svg">
                <h2>Patients</h2>
            </a>
        </div>

        <div class="nav-button"><a href="../pages/appointments.php">
            <img src="../img/icons/calendar.svg">
            <h2>Appointments</h2></a>
        </div>

        <div class="nav-button nav-button-active">
            <a href="../pages/myprofile.php">
                <img src="../img/icons/user.svg">
                <h2>My Profile</h2>
            </a>
        </div>

        <div>
            <h3 id="time"></h3>
        </div>

        <a href="../fragments/logout.php">
            <div class="logout-btn">Sign Out</div>
        </a>

    </div><!-- END OF SIDE BAR -->



</body>

</html>