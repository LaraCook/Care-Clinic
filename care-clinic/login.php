<?php 

    require 'fragments/connection.php'

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- META TAGS -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- TITLE -->
    <title>Care Clinic</title>
    <link rel="icon" href="/img/caduceus-symbol.svg">

    <!-- FILE LINKS -->

    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!-- JAVASCRIPT -->
    <script src="js/index.js"></script>
    <script src="js/login.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="css/index.css" />

</head>

<body>

    <!-- CONTAINER -->
    <div class="container" id="container">



        <!-- REGISTER FORM -->
        <div class="register-form">

            <div class="col-10 col-lg-6 left-side">
                <h1 class="register-h1">Create an Account</h1>
                <p>Please use your Care Clinic email to register</p>
                <form enctype="multipart/form-data" method="post" action="fragments/registerUser.php">

                    <label>Full Name</label>
                    <input type="text" id="reg-input" name="reg-name">

                    <label>Email</label>
                    <input type="email" id="reg-input" name="reg-email">

                    <label>Password</label>
                    <input type="password" id="reg-input" name="reg-password">

                    <label class="browse" for="photo-upload">Add a profile picture</label>
                    <input type="file" id="photo-upload" name="user-profile">


                    <button class="btn register-btn">Register</button>

                </form>
            </div>

            <div class="col-10 col-lg-6 right-side">

                <img src="img/caduceus-symbol.svg">

                <h1>Welcome to the Care Clinic</h1>
                <p class="already">Already have an account?</p>

                <button class="account sign-in">Sign In</button>

            </div>
        </div>
        <!-- END OF REGISTER FORM -->




        <!-- LOGIN FORM -->
        <div class="login-form">

            <div class="col-10 col-lg-6 right-side">

                <img src="img/caduceus-symbol.svg">

                <h1>Welcome to the Care Clinic</h1>
                <p class="already">Don't have an account?</p>

                <button class="account sign-up">Register</button>

            </div>

            <div class="col-10 col-lg-6 left-side">
                <h1>Welcome Back</h1>
                <p class="welcome-msg">Please sign into your account</p>
                <form method="post" action="fragments/connection.php">

                    <label>Name</label>
                    <input type="text" id="log-input" name="username">

                    <label>Password</label>
                    <input type="password" id="log-input" name="password">

                    <!-- <div id="input-error"><p>Please ensure your details are correct!</p></div> -->

                    <p class="forgot-pwd">Forgot password?</p>

                    <button class="btn login-btn" name="login" >Sign In</button>
                </form>

            </div>

        </div>
        <!-- END OF LOGIN FORM -->



    </div>
    <!-- END OF CONTAINER -->

</body>

</html>