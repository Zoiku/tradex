<?php 

    /**
    *@author Mark Zoiku
    */
    // Session starts to initialise session [username] to the username after the user logs in. This was done to allow for the webpages track of users across the webpages
    session_start();
?>

<?php require_once '../Database-Connection/connection.php';

    //If sessions variable username is set, it infers user has already been logged in and thus would be redirected to his or her stock index page
    if(isset($_SESSION['username'])){
        echo "<script>location.href='../stockindex.php'</script>";     
    } 
    else{
        $username = $_POST['username'];
        $userpassword = md5(sha1($_POST['password']));
    
        //The proceedural approach of an sql select query to validate POST variables / user credentials 
        $query = "SELECT * FROM users WHERE username = '$username' and userpassword = '$userpassword' ";
        $result = mysqli_query($conn, $query);

        if(!mysqli_num_rows($result) > 0){
            //If the validation does not succeed, the user recieves an invalidation report and is redirected to the log in page to retry the login process.
            // echo "username or password invalid";
            echo "<script>alert('Username or password invalid')</script>";
            echo "<script>location.href='login.php'</script>";
        }
        else{
        // If the session varibale has not been set, it infers that the user has not signed in, and thus would have his credentials validated. If credentails are validated, the session variable is set, and the user redirected to the stock index page.
            $user = mysqli_fetch_assoc($result);

            $_SESSION['name']= $user['fullname'];
            $_SESSION['username'] = $username;
            echo "<script>location.href='login-verification.php'</script>";     
        }
    }
?>
