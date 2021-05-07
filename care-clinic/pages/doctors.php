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
    <title>Doctors</title>
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
    <link rel="stylesheet" href="../css/doctors.css" />

</head>

<body>

    <!-- NAV BAR -->
    <div class="navbar">

        <h1>Doctors</h1>

        <input type="text" name="search" id="search" placeholder="Search">

    </div>

    <!-- MAIN CONTENT -->
    <div class="main">

        <div class="doctors">

            <div>
                <label>Showing all Doctors</label>
            </div>

            <?php getDoctors(); ?>

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

        <div class="nav-button nav-button-active">
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