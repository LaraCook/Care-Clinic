<?php 

if(!empty($_FILES["new-doctor-profile"])){

    $path = "../img/";
    $path = $path.basename( $_FILES["new-doctor-profile"]["name"]);
    if(move_uploaded_file($_FILES["new-doctor-profile"]["tmp_name"], $path)){
        echo "The file has been uploaded";
    }
    else {
        echo "The file has not been uploaded";
    }
}


if(!empty($_POST)){
        
    $mysqli = new mysqli('localhost', 'root', '', 'careclinic');
    
    if($mysqli->connect_error){
        die("Connection Error " . $mysqli->connect_errno . ":" . $mysqli->connect_error);
    }

    if($_FILES["new-doctor-profile"]["error"] == 4){
        $profilePicture = "default-profile.png";
    } else {
        $profilePicture = $_FILES["new-doctor-profile"]["name"];
    }

    $id = $_GET['id'];
    $doctorName = $_POST['fullname'];
    $doctorEmail = $_POST['email'];
    $specialisation = $_POST['specification'];
    $profilePicture = $_FILES["new-doctor-profile"]["name"];

    $sql = "UPDATE doctor SET name = '$doctorName', profile_pic = '$profilePicture', email = '$doctorEmail', specialisation = '$specialisation' WHERE doctorID = '$id'";

    $update = $mysqli->query($sql);

    if($update){
        echo '
        Great Success!
        ';
    } else {
        die("Error: ($mysqli->errno) : ($mysqli->error)");
    }

    $mysqli->close();

    header("location: ../pages/doctors.php");

}


?>