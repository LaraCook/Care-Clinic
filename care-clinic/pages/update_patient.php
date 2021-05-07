<?php 

if(!empty($_FILES["new-patient-profile"])){

    $path = "../img/";
    $path = $path.basename( $_FILES["new-patient-profile"]["name"]);
    if(move_uploaded_file($_FILES["new-patient-profile"]["tmp_name"], $path)){
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

    if($_FILES["new-patient-profile"]["error"] == 4){
        $profilePicture = "default-profile.png";
    } else {
        $profilePicture = $_FILES["new-patient-profile"]["name"];
    }

    $id = $_GET['id'];
    $patientName = $_POST['name'];
    $patientEmail = $_POST['email'];
    $medicalAid = $_POST['medicalAid'];
    $profilePicture = $_FILES["new-patient-profile"]["name"];

    $sql = "UPDATE patient SET name = '$patientName', avatar = '$profilePicture', email = '$patientEmail', medical_aid = '$medicalAid' WHERE patientID = '$id'";

    $update = $mysqli->query($sql);

    if($update){
        echo '
        Great Success!
        ';
    } else {
        die("Error: ($mysqli->errno) : ($mysqli->error)");
    }

    $mysqli->close();

    header("location: ../pages/patients.php");

}


?>