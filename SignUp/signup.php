<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <!-- Link to Css file and a font awesome library for icons on the user login page-->
    <link rel="stylesheet" href="../Css/style.css">
    <link rel="icon" href="../Assets/favicon_io/favicon.ico">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

    <!-- JQuery File and signup verification file where user credentials would be validate before second validation over on the server side -->
    <script src="../JQuery/jquery-3.5.1.js"></script>
    <script src="signupverification.js"></script>
</head>

<body>
    <div class="unavailable-screen-res">
        Mobile Version in progress. Please view on a larger screen.
    </div>
    <!-- Nav bar -->
    <div class="available-screen-res">
        <nav>
            <div class="logo">
                <h4>Trade<small>x</small></h4>
            </div>

            <ul class="nav-links">
                <li><a href="../index.php">Home</a></li>
                <li class='active-page'><a href="../Login/login.php">Login</a></li>
            </ul>
        </nav>

        <div class="form-container-wrapper">
            <!-- Form container for the Sign up form -->
            <div class="form-container" id="signup-form-container">
                <form id="form" method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>" onsubmit="return validation()">
                    <header>Sign up</header>

                    <!-- Field classes where user input would be taken  -->
                    <div class="field">
                        <div class="input-field">
                            <input name='name' id='name' type="text" autocomplete="off" placeholder='&#xf007;' required>
                            <label class='label-name'>
                                <span class='content-name'>Full Name</span>
                            </label>
                        </div>
                        <span id="error-1" class="error-message">Name length must be between 8-30 characters</span>
                    </div>

                    <div class="field">
                        <div class="input-field">
                            <input name='username' id='username' type="text" autocomplete="off" placeholder='&#xf007;' required>
                            <label class='label-name'>
                                <span class='content-name'>Username</span>
                            </label>
                        </div>
                        <span id="error-2" class="error-message">Username taken</span>
                    </div>

                    <div class="field">
                        <div class="input-field">
                            <input name='password' id='password' type="password" autocomplete="off" placeholder='&#xf023;' required>
                            <label class='label-name'>
                                <span class='content-name'>Password</span>
                            </label>
                        </div>
                        <span id="error-3" class="error-message">Password length must between 8-30 characters with at least one special and a capital letter</span>
                    </div>

                    <div class="field">
                        <div class="input-field">
                            <input name='re-password' id='re-password' type="password" autocomplete="off" placeholder='&#xf023;' required>
                            <label class='label-name'>
                                <span class='content-name'>Confirm Password</span>
                            </label>
                        </div>
                        <span id="error-4" class="error-message">Password mismatch</span>
                    </div>

                    <!-- An authentication class with a button of type submit for users to log in and a link to a terms and condition page-->
                    <div class="authentication">
                        <button name='submit-btn' type='submit' class='button' id='signup-button'>Get Started</button>
                        <!-- <p>By clicking this button you are agreeing to all <a href="#">terms and conditions</a></p> -->
                    </div>
                </form>

                <!-- A Sign-Up/Login class which with code to redirect the user to log into account if that user already has an existing account -->
                <div id="login-account" class="signup-login">
                    <hr>
                    <div>
                        <p>Already own an account? <a class="link-custom" href="../Login/login.php">Login</a></p>
                    </div>
                </div>
            </div>
        </div>

        <?php include_once '../Database-Connection/connection.php';
        //Once the submit POST variable is set, the user credentails can now be recorded in the database and then have the user be redirected to a log in page to sign in
        if (isset($_POST['submit-btn'])) {
            // Post varibales from the sign up form
            $fullname = $_POST['name'];
            $username = $_POST['username'];
            $userpassword = md5(sha1($_POST['password']));

            $query = "INSERT INTO `users` VALUES ('$fullname', '$username', '$userpassword')";
            $result = mysqli_query($conn, $query);

            //The Post variable for submit is set to null (To disallow resubmission) and user is redirected to login page after signing in
            $_POST['submit-btn'] = NULL;
            echo "<script>location.href='../Login/login.php'</script>";
        } else {
            die();
        }
        ?>
    </div>
</body>

</html>