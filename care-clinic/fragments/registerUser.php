
<?php

require "connection.php";

// THE FUNCTION ADDS NEW USERS TO THE DATABASE
// THE FUNCTION  ALSO NEEDS TO PREVENT YOU FROM ADDING ANOTHER USER WITH THE SAME NAME

if(!empty($_POST['reg-name'])  || !empty($_POST['reg-password']) || !empty($_POST['reg-email']) || !empty($_FILES["user-profile"])){

    $mysqli = new mysqli('localhost', 'root', '', 'careclinic');
        
    if($mysqli->connect_error){
        die("Connection Error " . $mysqli->connect_errno . ":" . $mysqli->connect_error);
    }

    $path = "../img/";
    $path = $path.basename( $_FILES["user-profile"]["name"]);
    if(move_uploaded_file($_FILES["user-profile"]["tmp_name"], $path)){
        echo "The file has been uploaded";
    }
    else {
        echo "The file has not been uploaded";
    }

    if($_FILES["user-profile"]["error"] == 4){
        $userProfile = "default-profile.png";
    } else {
        $userProfile = $_FILES["user-profile"]["name"];
    }

    // $userProfile = $_FILES["user-profile"]["name"];
    $userName = $_POST["reg-name"];

    $checkQuery = "SELECT * FROM receptionist WHERE username = '$userName'";
    $userResult = mysqli_query($mysqli, $checkQuery);

    if(mysqli_num_rows($userResult) > 0){
        echo "This username is already taken";
    } else {

        $sql = "INSERT INTO receptionist (username, email, password, avatar) VALUES (

            '{$mysqli->real_escape_string($_POST['reg-name'])}',
            '{$mysqli->real_escape_string($_POST['reg-email'])}',
            '{$mysqli->real_escape_string($_POST['reg-password'])}',
            '{$userProfile}'

        )";

        $insert = $mysqli->query($sql);

        if($insert){
            echo "Added user!";
        }
        else {
            die("Error: {$mysqli->error} : {$mysqli->error}");
        }

        $mysqli->close();
        
    }

    header("location: ../login.php");

} // END OF NEW IF STATEMENT

?>