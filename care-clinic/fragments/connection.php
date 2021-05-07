<?php
//PDO CONNECTION AND LOGIN VALIDATION

// ESTABLISH SERVER CREDENTIALS
session_start();
$host = "localhost";
$username = "root";
$password = "";
$database = "careclinic";
$message = "";


//CONNECTION SCRIPT 
try{
    $connect = new PDO("mysql:host=$host; dbname=$database", $username, $password);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if(isset($_POST['login'])){

        // MESSAGE IF THE USER LEAVES THE FIELDS EMPTY
        if(empty($_POST['username']) || empty($_POST['password'])){
            $message = '<p>All fields are required for login</p>';
            header("location: ../login.php");

        }
        // CHECK IF THERE IS A USER WITH THE INPUTTED VALUES
        else {
            $query = 'SELECT * FROM receptionist WHERE username = :username AND password = :password';
            $statement = $connect->prepare($query);
            $statement->execute(

                // ACCESS CERTAIN VALUES IN THE ARRAY
                array(

                    'username' => $_POST["username"],
                    'password' => $_POST["password"]

                )
            );


            // LOOP THROUGH THE ARRAY TO FIND THE USER
            $count = $statement->rowCount();
            if($count > 0){

                // REDIRECT USER TO THE HOMEPAGE
                $_SESSION["username"] = $_POST["username"];
                header("location: ../pages/dashboard.php");
            }
            // GIVE USER AN ERROR IF THE INPUTS ARE NOT FOUND IN THE DATABASE
            else {
                $message = '<div id="input-error"><p>Please ensure your details are correct!</p></div>';
                header("location: ../login.php");
            }

        };

    };

}

//WRITE AN ERROR IF CONNECTION FAILS
catch(PDOException $error){
    $message = $error->getMessage();
}

?>