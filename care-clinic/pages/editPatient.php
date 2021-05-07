<?php

    require './update_patient.php';

    function editPatient(){

        $id = $_GET['id'];

        $mysqli = new mysqli('localhost', 'root', '', 'careclinic');

        if($mysqli->connect_error){
            die("Connection Error " . $mysqli->connect_errno . ":" . $mysqli->connect_error);
        }

        $patientUpdate = "SELECT * FROM patient WHERE patientID = $id";

        if($result = $mysqli->query($patientUpdate)){

            // LOOP THROUGH PATIENTS
            while($row = $result->fetch_assoc()){

                $patientID = $row['patientID'];
                $patientName = $row['name'];
                $medicalAid = $row['medical_aid'];
                $patientEmail = $row['email'];
                $profileImg = $row['avatar'];


                // CREATE A FORM TO EDIT PATIENT
                echo '
                <form class="form" enctype="multipart/form-data" method="post" action="update_patient.php?id='.$patientID.'">

                <h1 name="patient-name">' .$patientName. '</h1>
                <p>Edit this patients information below</p>

                <label>Full Name</label>
                <input type="text" name="name" value="' .$patientName. '">

                <label>Contact</label>
                <input type="email" name="email" value="' .$patientEmail. '">

                <label>Medical Aid Number</label>
                <input type="text" name="medicalAid" value="' .$medicalAid. '">

                <label class="browse" for="photo-upload">Change Patient picture</label>
                <input type="file" id="photo-upload" name="new-patient-profile">

                <button class="btn save">Save</button>

            </form>

            <div class="image">
            <img src="../img/patient.svg">

            <h1>Edit patient information</h1>
            <p>Please make sure all inputs are filled before saving</p>

            <a href="./patient-profile.php?id=' .$patientID. '"><div class="btn cancel">Cancel</div></a>

            </div>
                ';
                
            }

            $result->free();

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
    <title>Patients</title>
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
    <script src="../js/dashboard.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="../css/editPage.css" />

</head>

<body>

    <!-- NAV BAR -->
    <div class="navbar">

        <h1>Edit Patient</h1>

        <input type="text" name="search" id="search" placeholder="Search">

    </div>

    <!-- MAIN CONTENT -->
    <div class="main">

        <div class="doctor">

            <div class="box doctor-information">

                <?php editPatient(); ?>

                <!-- <form class="form">

                    <h1 name="patient-name">Mary Thompson</h1>
                    <p>Edit this patient's information below</p>

                    <label>Full Name</label>
                    <input type="text" name="fullname">

                    <label>Contact</label>
                    <input type="email" name="email">

                    <label>Medical Aid Number</label>
                    <input type="text" name="specification">

                    <label class="browse" for="photo-upload">Change Patient picture</label>
                    <input type="file" id="photo-upload">

                    <button class="btn save">Save</button>

                </form> -->

                <!-- <div class="image">
                    <img src="../img/patient.svg">

                    <h1>Edit patient information</h1>
                    <p>Please make sure all inputs are filled before saving</p>

                    <a href="./patients.php"><div class="btn cancel">Cancel</div></a>

                </div> -->

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
            <label class="username"></label>
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

        <div class="nav-button nav-button-active">
            <a href="../pages/patients.php">
                <img src="../img/icons/patient.svg">
                <h2>Patients</h2>
            </a>
        </div>

        <div class="nav-button"><a href="../pages/appointments.php">
            <img src="../img/icons/calendar.svg">
            <h2>Appointments</h2></a>
        </div>

        <div class="nav-button">
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