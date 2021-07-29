<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Link to Css file and a font awesome library for icons on the user login page-->
    <link rel="stylesheet" href="../Css/style.css">
    <link rel="icon" href="../Assets/favicon_io/favicon.ico">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

    <!-- JQuery File -->
    <script src="../JQuery/jquery-3.5.1.js"></script>
</head>

<body>
    <!-- Nav bar   -->
    <nav>
        <div class="logo">
            <h4>Trade<small>x</small></h4>
        </div>

        <ul class="nav-links">
            <li><a href="../index.php">Home</a></li>
            <li class='active-page'><a href="login.php">Login</a></li>
        </ul>
    </nav>

    <div class="form-container-wrapper">
        <!-- Form container for the log in form -->
        <div class="form-container" id="login-form-container">
            <form action="login-verification.php" id="form" method='POST'>
                <header>Sign in</header>

                <!-- Field classes where user input would be taken  -->
                <div class="field">
                    <div class="input-field">
                        <input name='username' id='username' type="text" autocomplete="off" placeholder='&#xf007;' required>
                        <label class='label-name'>
                            <span class='content-name'>Username</span>
                        </label>
                    </div>
                    <span id="error-1" class="error-message">Invalid Username</span>
                </div>

                <div class="field">
                    <div class="input-field">
                        <input name='password' id='password' type="password" autocomplete="off" placeholder='&#xf023;' required>
                        <label class='label-name'>
                            <span class='content-name'>Password</span>
                        </label>
                    </div>
                </div>

                <!-- An authentication class with a button of type submit for users to log in -->
                <div class="authentication">
                    <button name='submit-btn' type='submit' class='button' id='login-button'>Sign in</button>
                </div>
            </form>

            <!-- A Sign-Up/Login class which with code to redirect the user to create an account if required -->
            <div id="create-account" class="signup-login">
                <hr>
                <div>
                    <p>New here? <a class="link-custom" href="../SignUp/signup.php">Create account</a></p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>