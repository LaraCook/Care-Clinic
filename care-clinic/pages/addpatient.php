<?php 

    require '../fragments/functions.php';
    include '../fragments/loginSuccess.php';

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

        <h1>New Patient</h1>

        <input type="text" name="search" id="search" placeholder="Search">

    </div>

    <!-- MAIN CONTENT -->
    <div class="main">

        <div class="doctor">

            <div class="box doctor-information">

                <form class="form" enctype="multipart/form-data" method="post" action="../fragments/add_patient.php">

                    <h1 name="patient-name">Patient Form</h1>
                    <p>Create a new patient profile below</p>

                    <label>Full Name</label>
                    <input type="text" name="name">

                    <label>Email</label>
                    <input type="email" name="email">

                    <label>Medical Aid Number</label>
                    <input type="text" name="medicalAid">

                    <label class="browse" for="photo-upload">Add a picture</label>
                    <input type="file" id="photo-upload" name="patient-profile">

                    <button class="btn save">Add</button>

                </form>

                <div class="image">
                    <img src="../img/medicine.svg">

                    <h1>Fill the form in accurately</h1>
                    <p>Please make sure all inputs are filled before saving</p>

                    <div class="btn cancel">Cancel</div>


                </div>

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

        <div class="nav-button ">
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