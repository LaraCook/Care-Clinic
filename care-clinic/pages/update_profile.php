<?php 


if(!empty($_POST) || !empty($_FILES["new-profile-picture"])){
        
    $mysqli = new mysqli('localhost', 'root', '', 'careclinic');
    
    if($mysqli->connect_error){
        die("Connection Error " . $mysqli->connect_errno . ":" . $mysqli->connect_error);
    }

    $path = "../img/";
    $path = $path.basename( $_FILES["new-profile-picture"]["name"]);
    if(move_uploaded_file($_FILES["new-profile-picture"]["tmp_name"], $path)){
        echo "The file has been uploaded";
    }
    else {
        echo "The file has not been uploaded";
    }

    if($_FILES["new-profile-picture"]["error"] == 4){
        $profilePicture = "default-profile.png";
    } else {
        $profilePicture = $_FILES["new-profile-pciture"]["name"];
    }

    $id = $_GET['id'];
    $username = $_POST['fullname'];
    $profileEmail = $_POST['email'];
    $password = $_POST['password'];
    $profilePicture = $_FILES["new-profile-picture"]["name"];

    $sql = "UPDATE receptionist SET username = '$username', avatar = '$profilePicture', email = '$profileEmail', password = '$password' WHERE ReceptionistID = '$id'";

    $update = $mysqli->query($sql);

    if($update){
        echo '
        Great Success!
        ';
    } else {
        die("Error: ($mysqli->errno) : ($mysqli->error)");
    }

    $mysqli->close();

    header("location: ../fragments/logout.php");

}


?>