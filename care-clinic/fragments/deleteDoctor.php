<?php 

    $id = $_GET['id'];

    $mysqli = new mysqli('localhost', 'root', '', 'careclinic');

    if($mysqli->connect_error){
        die("Connection Error " . $mysqli->connect_errno . ":" . $mysqli->connect_error);
    }

    $sql = "DELETE FROM doctor WHERE doctorID = $id";

    if(mysqli_query($mysqli, $sql)){

        mysqli_close($mysqli);
        header('location: ../pages/doctors.php');
        exit;
    } else {
        echo "Nah, didn't work";
    }

?>