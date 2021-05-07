<?php

    // MAKE A FUNCTION TO SHOW THE USERS PROFILE
    function showUserProfile(){
        $mysqli = new mysqli('localhost', 'root', '', 'careclinic');

        if($mysqli->connect_error){
            die("Connection Error: " . $mysqli->connect_errno . ":" . $mysqli->connect_error);
        }

        if(isset($_SESSION['username'])){
            $profileName = $_SESSION['username'];
            $userProfileQuery = "SELECT * FROM receptionist WHERE username = '$profileName'";

            if($result = $mysqli->query($userProfileQuery)){
                while($row = $result->fetch_assoc()){

                    $profileID = $row['ReceptionistID'];
                    $username = $row['username'];
                    $profileImg = $row['avatar'];
                    $profileEmail = $row['email'];

                    echo'
                    
                    <div class="box profile-box">

                    <div class="user-avatar">
                        <img src="../img/' .$profileImg. '">
                    </div>
    
                    <h1 class="username">'.$username.'</h1>
                    <h3>Receptionist</h3>
                    <p class="user-email">'.$profileEmail.'</p>
                    <p>210 Wood Avenue</p>
    
                    <div class="edit"><a href="../pages/editProfile.php?id='.$profileID.'">
                            <h4>
                                Edit my profile
                            </h4>
                        </a></div>
                </div>

                    ';                    
                }

                $result->free();

            }

        }
    } // END OF PROFILE FUNCTION

    // MAKE A FUNCTION TO SHOW THE USERNAME
    function showUsername(){
        $mysqli = new mysqli('localhost', 'root', '', 'careclinic');
        if($mysqli->connect_error){
            die("Connection Error: " . $mysqli->connect_errno . ":" . $mysqli->connect_error);
        }
        if(isset($_SESSION['username'])){
            $profileName = $_SESSION['username'];
            $userProfileQuery = "SELECT username FROM receptionist WHERE username = '$profileName'";
            if($result = $mysqli->query($userProfileQuery)){
                while($row = $result->fetch_assoc()){
                    $profileName = $row['username'];
                    echo $profileName;
                }
                $result->free();
            }
        }
    } // END OF USERNAME FUNCTION 

    // MAKE A FUNCTION TO SHOW THE EMAIL
    function showUserEmail(){
        $mysqli = new mysqli('localhost', 'root', '', 'careclinic');

        if($mysqli->connect_error){
            die("Connection Error: " . $mysqli->connect_errno . ":" . $mysqli->connect_error);
        }

        if(isset($_SESSION['username'])){
            $profileName = $_SESSION['username'];
            $userProfileQuery = "SELECT email FROM receptionist WHERE username = '$profileName'";

            if($result = $mysqli->query($userProfileQuery)){
                while($row = $result->fetch_assoc()){
                    $userEmail = $row['email'];

                    echo $userEmail;
                }

                $result->free();

            }

        }
    } // END OF EMAIL FUNCTION 

        // MAKE A FUNCTION TO SHOW THE EMAIL
        function showPicture(){
            $mysqli = new mysqli('localhost', 'root', '', 'careclinic');
    
            if($mysqli->connect_error){
                die("Connection Error: " . $mysqli->connect_errno . ":" . $mysqli->connect_error);
            }
    
            if(isset($_SESSION['username'])){
                $profileName = $_SESSION['username'];
                $userProfileQuery = "SELECT avatar FROM receptionist WHERE username = '$profileName'";
    
                if($result = $mysqli->query($userProfileQuery)){
                    while($row = $result->fetch_assoc()){
                        $picture = $row['avatar'];
    
                        echo '<img src"../img/'.$picture.'" />';
                    }
    
                    $result->free();
    
                }
    
            }
        } // END OF EMAIL FUNCTION 




    // MAKE A FUNCTION TO DISPLAY THE PATIENTS
    function getPatients(){

        $mysqli = new mysqli('localhost', 'root', '', 'careclinic');

        if($mysqli->connect_error){
            die("Connection Error: " . $mysqli->connect_errno . ":" . $mysqli->connec_error);
        }

        $patientQuery = "SELECT * FROM patient";

        if($result = $mysqli->query($patientQuery)){

            // LOOP THROUGH PATIENTS 
            while($row = $result->fetch_assoc()){

                $patientID = $row['patientID'];
                $patientName = $row['name'];
                $patientEmail = $row['email'];
                $medicalAid = $row['medical_aid'];
                $profileImg = $row['avatar'];

                echo '
                <div class="box patient-box">
                <a href="./patient-profile.php?id= ' .$patientID. '">
                    <div>

                        <div class="patient-avatar">
                            <img src="../img/' .$profileImg. '">
                        </div>
                        <h2 class="patient-name">' .$patientName. '</h2>

                    </div>
                </a>

                <a href="../fragments/deletePatient.php?id=' .$patientID. '"><div class="remove" name="remove">
                    <h4>Remove</h4>
                </div></a>

            </div>
                ';
                
            }
            $result->free();

        }

    } // END OF ALL PATIENTS FUNCTION

        // MAKE A FUNCTION TO DISPLAY THE PATIENTS
        function getPatientsProfile(){

            $id = $_GET['id'];

            $mysqli = new mysqli('localhost', 'root', '', 'careclinic');
    
            if($mysqli->connect_error){
                die("Connection Error: " . $mysqli->connect_errno . ":" . $mysqli->connec_error);
            }
    
            $patientQuery = "SELECT * FROM patient WHERE patientID = $id";
    
            if($result = $mysqli->query($patientQuery)){
    
                // LOOP THROUGH PATIENTS 
                while($row = $result->fetch_assoc()){
    
                    $patientID = $row['patientID'];
                    $patientName = $row['name'];
                    $patientEmail = $row['email'];
                    $medicalAid = $row['medical_aid'];
                    $profileImg = $row['avatar'];
    
                    echo '
                    <div class="box profile">
                    <div class="patient-avatar">
                        <img src="../img/' .$profileImg. '">
                    </div>
                    <h1>' .$patientName. '</h1>
                    <label>Medical Aid</label>
                    <p name="medical-aid">' .$medicalAid. '</p>
                    <label>Contact</label>
                    <p name="contact">' .$patientEmail. '</p>
    
                    <a href="./editPatient.php?id=' .$patientID. '">
                        <div class="edit">
                            <h4>Edit Patient</h4>
                        </div>
                    </a>
                </div>
                    ';
                    
                }
    
                $result->free();
    
            }
    
    
        } // END OF PATIENT PROFILE FUNCTION





    // MAKE A FUNCTION TO DISPLAY THE DOCTORS
    function getDoctors(){

        $mysqli = new mysqli('localhost', 'root', '', 'careclinic');

        if($mysqli->connect_error){
            die("Connection Error: " . $mysqli->connect_errno . ":" . $mysqli->connec_error);
        }

        $patientQuery = "SELECT * FROM doctor";

        if($result = $mysqli->query($patientQuery)){

            // LOOP THROUGH PATIENTS 
            while($row = $result->fetch_assoc()){

                $doctorID = $row['doctorID'];
                $doctorName = $row['name'];
                $specialisation = $row['specialisation'];
                $profileImg = $row['profile_pic'];

                echo '
            <div class="box doctor-box">
            <div class="doctor-avatar">
                <img src="../img/' .$profileImg. '">
            </div>
            <h2 class="doctor-name">' .$doctorName. '</h2>
            <h3>' .$specialisation. '</h3>

            <a href="../pages/doctor-profile.php">
                <div class="btn view">
                    <a href="./doctor-profile.php?id= ' .$doctorID. '"><h4>View</h4></a>
                </div>
            </a>

            <a href="../fragments/deleteDoctor.php?id=' .$doctorID. '"><div class="btn remove">
                <h4>Remove</h4>
            </div></a>

        </div>
                ';
                
            }

            $result->free();

        }

    } // END OF ALL DOCTORS FUNCTION

    // MAKE A FUNCTION TO DISPLAY THE PATIENTS
    function getDoctorsProfile(){

        $id = $_GET['id'];
    
        $mysqli = new mysqli('localhost', 'root', '', 'careclinic');
        
        if($mysqli->connect_error){
            die("Connection Error: " . $mysqli->connect_errno . ":" . $mysqli->connect_error);
        }
        
        $patientQuery = "SELECT * FROM doctor WHERE doctorID = $id";
        
        if($result = $mysqli->query($patientQuery)){
        
            // LOOP THROUGH PATIENTS 
            while($row = $result->fetch_assoc()){
        
                $doctorID = $row['doctorID'];
                $doctorName = $row['name'];
                $doctorEmail = $row['email'];
                $specialisation = $row['specialisation'];
                $profileImg = $row['profile_pic'];
        
                echo '
                    <div class="box profile">
                        <div class="doctor-avatar">
                            <img src="../img/' .$profileImg. '">
                        </div>
                        <h1>' .$doctorName. '</h1>
                        <h3>' .$specialisation. '</h3>
                        <h3>' .$doctorEmail. '</h3>
        
                        <a href="./editDoctor.php?id=' .$doctorID. '">
                            <div class="edit">
                                <h4>Edit Doctor</h4>
                            </div>
                        </a>
                    </div>
                        ';
                        
            }
        
            $result->free();
        
        }
        
    } // END OF DOCTOR PROFILE FUNCTION

    function getDoctorAppointments(){

        $id = $_GET['id'];
    
        $mysqli = new mysqli('localhost', 'root', '', 'careclinic');
        
        if($mysqli->connect_error){
            die("Connection Error: " . $mysqli->connect_errno . ":" . $mysqli->connect_error);
        }
        
        $roomQuery = "SELECT * FROM appointment WHERE doctor_id = $id LIMIT 3";
        
        if($result = $mysqli->query($roomQuery)){
        
            // LOOP THROUGH PATIENTS 
            while($row = $result->fetch_assoc()){
        
                $date = $row['date_time'];
                $room = $row['room'];
                $patientName = $row['patient_name'];
        
                echo '
                <div class="appointment-information">
                    <h2 class="patient-name">Patient: '.$patientName.'</h2>
                    <div class="line"></div>
                    <div class="background-line">
                        <p>'.$date.'</p>
                        <p>'.$room.'</p>
                    </div>
                </div>
                        ';
                        
            }
        
            $result->free();
        
        } 
        
    } // END OF DOCTOR ROOM FUNCTION

    function getDoctorRooms(){

        $id = $_GET['id'];
    
        $mysqli = new mysqli('localhost', 'root', '', 'careclinic');
        
        if($mysqli->connect_error){
            die("Connection Error: " . $mysqli->connect_errno . ":" . $mysqli->connect_error);
        }
        
        $roomQuery = "SELECT * FROM room WHERE assigned_doc = $id LIMIT 3";
        
        if($result = $mysqli->query($roomQuery)){
        
            // LOOP THROUGH PATIENTS 
            while($row = $result->fetch_assoc()){
        
                $roomFloor = $row['floor'];
                $roomNumber = $row['number'];
        
                echo '
                <div class="room-box-individual">
                <h2>'.$roomFloor.'</h2>
                <h3>Room '.$roomNumber.'</h3>
            </div>
                        ';
                        
            }
        
            $result->free();
        
        }
        
    } // END OF DOCTOR ROOM FUNCTION





// MAKE A FUNCTION TO DISPLAY THE DOCTORS ON DASHBOARD
function getDashboardDoctors(){

    $mysqli = new mysqli('localhost', 'root', '', 'careclinic');
            
    if($mysqli->connect_error){
        die("Connection Error: " . $mysqli->connect_errno . ":" . $mysqli->connec_error);
    }
            
    $patientQuery = "SELECT * FROM doctor LIMIT 3";
            
    if($result = $mysqli->query($patientQuery)){
            
        // LOOP THROUGH PATIENTS 
        while($row = $result->fetch_assoc()){
            
            $doctorID = $row['doctorID'];
            $doctorName = $row['name'];
            $specialisation = $row['specialisation'];
            $profileImg = $row['profile_pic'];
            
            echo '
            <a href="../pages/doctor-profile.php?id='.$doctorID.'">
                <div class="doctor-box-individual">

                    <div class="doctor-avatar">
                        <img src="../img/'.$profileImg.'">
                    </div>
                    <h2 class="doctor-name">'.$doctorName.'</h2>
                    <h3>'.$specialisation.'</h3>
                </div>
            </a>
            ';
                            
        }
            
    $result->free();
            
    }
            
} // END OF DASHBOARD DOCTORS FUNCTION

// MAKE A FUNCTION TO DISPLAY THE APPOINTMENTS ON DASHBOARD
function getDashboardAppointments(){

    $mysqli = new mysqli('localhost', 'root', '', 'careclinic');
            
    if($mysqli->connect_error){
        die("Connection Error: " . $mysqli->connect_errno . ":" . $mysqli->connec_error);
    }

    $appointmentQuery = "SELECT * FROM appointment LIMIT 2";
            
    if($result = $mysqli->query($appointmentQuery)){
            
        // LOOP THROUGH APPOINTMENTS 
        while($row = $result->fetch_assoc()){
            
            $appointmentID = $row['appointmentID'];
            $room = $row['room'];
            $date = $row['date_time'];
            $doctorName = $row['doctor_name'];
            $patientName = $row['patient_name'];

            // $doctorID = $row['doctor_id'];
            // $patientID = $row['patient_id'];

            // $nameQuery = "SELECT name FROM doctor WHERE doctorID = $doctorID";

            // if($result = $mysqli->query($nameQuery)){
            //     while($row = $result->fetch_assoc()){
            //         $doctorName = $row['name'];
            //     }
            // }

            // $patientNameQuery = "SELECT name FROM patient WHERE patientID = $patientID";

            // if($result = $mysqli->query($patientNameQuery)){
            //     while($row = $result->fetch_assoc()){
            //         $patientName = $row['name'];
            //     }
            // }

            echo '
            <div class="appointment-information">
            <h2 class="doctor-name">'.$doctorName.'</h2>
            <div class="line"></div>
            <div class="background-line">
                <p>'.$patientName.'</p>
                <p>'.$date.'</p>
                <p>'.$room.'</p>
            </div>
            </div>
            ';

        }
    }
            
    $result->free();
               
} // END OF DASHBOARD APPOINTMENTS

function medicalAidOptions(){

    $mysqli = new mysqli('localhost', 'root', '', 'careclinic');
    
    if($mysqli->connect_error){
    die("Connection Error: " . $mysqli->connect_errno . ':' . $mysqli->connec_error);
    }

    $sql = "SELECT * FROM patient";

    if($result = $mysqli->query($sql)){
        while($row = $result->fetch_assoc()){
            $medicalAid = $row["medical_aid"];

            echo '<option>'.$medicalAid.'</option>';

        }

    }

    $result->free();
    return $patientLibrary;

} //END OF MEDICAL AID OPTIONS


function getAppointments(){

    $mysqli = new mysqli('localhost', 'root', '', 'careclinic');

    if($mysqli->connect_error){
        die("Connection Error: " . $mysqli->connect_errno . ":" . $mysqli->connec_error);
    }

    $appointmentQuery = "SELECT * FROM appointment";

    if($result = $mysqli->query($appointmentQuery)){

        // LOOP THROUGH APPOINTMENTS 
        while($row = $result->fetch_assoc()){

            $doctorName = $row['doctor_name'];
            $patientName = $row['patient_name'];
            $room = $row['room'];
            $date = $row['date_time'];

            echo '
            <div class="box appointment-box">

                <div class="appointment-information">
                    <h2 class="doctor-name">'.$doctorName.'</h2>
                    <div class="line"></div>
                    <div class="background-line">
                        <p>'.$patientName.'</p>
                        <p>'.$room.'</p>
                        <p>'.$date.'</p>
                    </div>
                </div>

            </div>
            ';
            
        }

        $result->free();

    }

} // END OF ALL APPOINTMENTS FUNCTION