<?php 
    error_reporting(0);    

    // Variables to connect to database
    $servername = 'us-cdbr-east-04.cleardb.com';
    $username = 'b088a86b970f6f';
    $password = "97bec10a";
    $dbname = 'heroku_36a0a1780e5576c';

    //Proceedural approach to connection to database
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    //Printing out report is connection fails.
    if(!$conn){
        die("Trouble connecting to database: ".mysqli_connect_error());
    }
?>