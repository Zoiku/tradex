<?php require_once '../Database-Connection/connection.php';
    // Php file used along with the signup validation php for POST variables of usernames to check for usernames that already exists in the database. It echoes out the username if exits which is then used in the javascript validation
    $username = $_POST['usernameinput'];

    $query = "SELECT * FROM `users` where username = '$username';";
    $result = mysqli_query($conn, $query);
    $result_check = mysqli_num_rows($result);

    if($result_check > 0){
        echo "$username";
    } else die();
?>