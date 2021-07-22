<?php 
    // error_reporting(0);    

    // Variables to connect to database
    $servername = 'localhost';
    $username = 'root';
    $password = getenv('MYSQL_ROOT') ?? '';
    $dbname = 'myproject';

    //Proceedural approach to connection to database
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    //Printing out report is connection fails.
    if(!$conn){
        die("Trouble connecting to database: ".mysqli_connect_error());
    }
?>