<?php 
    session_start();

    // Destroying the session variable and redirecting the user to the landing page after logout
    if(isset($_SESSION['username'])){
        session_destroy();

        echo "<script>location.href='../index.php'</script>";
    }else 
        echo "<script>location.href='../index.php'</script>";
?>