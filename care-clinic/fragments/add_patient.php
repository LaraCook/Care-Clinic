<?php 

if(!empty($_FILES["patient-profile"])){

    $path = "../img/";
    $path = $path.basename( $_FILES["patient-profile"]["name"]);
    if(move_uploaded_file($_FILES["patient-profile"]["tmp_name"], $path)){
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

    if($_FILES["patient-profile"]["error"] == 4){
        $profilePicture = "default-profile.png";
    } else {
        $profilePicture = $_FILES["patient-profile"]["name"];
    }

    $sql = "INSERT INTO patient (name, avatar, medical_aid, email) VALUES (

        '{$mysqli->real_escape_string($_POST['name'])}',
        '{$profilePicture}',
        '{$mysqli->real_escape_string($_POST['medicalAid'])}',
        '{$mysqli->real_escape_string($_POST['email'])}'
    
    )";

    $insert = $mysqli->query($sql);

    if($insert){
        echo "Added Patient!";
    }
    else {
        die("Error: {$mysqli->error} : {$mysqli->error}");
    }

    $mysqli->close();

    header("location: ../pages/patients.php");

}



?>