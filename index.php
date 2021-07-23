<?php
session_start();
// PHP Session starts to check if SESSION VARIBALE USERNAME if set
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tradex</title>

    <!-- Link to Css file -->
    <link rel="stylesheet" href="./Css/style.css">
    <link rel="icon" href="./Assets/favicon_io/favicon.ico">

    <!-- Linking file to JQuery -->
    <script defer src="./JQuery/jquery-3.5.1.js"></script>
    <script defer src="./app.js"></script>

</head>

<body>
    <?php
    // If session varibale, username, is set then it infers that the user is already logged in and this gains access to the extra pages through the nav bar. If the username is not set, the user only gains access to the log in page on the nav bar 
    if (isset($_SESSION['username'])) {
        print("
                    <nav>
                    <div class='logo'>
                        <h4></h4>
                    </div>
        
                    <ul class='nav-links'>
                        <li class='active-page'><a href='index.php'>Home</a></li>
                        <li><a href='stockindex.php'>Dashboard</a></li>
                        <li><a href='crashcourse.php'>Resources</a></li>
                        <li><a href='./Login/logout.php'>Exit</a></li>
                    </ul>
                </nav>
                    ");
    } else {
        // If the user is not logged in, he or she gains access to only the index page and the log in page via the nav bar
        print('
                <nav>
                    <div class="logo">
                        <h4></h4>
                    </div>

                    <ul class="nav-links">
                        <li class="active-page"><a href="index.php">Home</a></li>
                        <li><a href="./Login/login.php">Login</a></li>
                    </ul>
                </nav>
                ');
    }
    ?>

    <section id="section-1">
        <div>
            <h1>TRADE<small>x</small></h1>
        </div>

        <img class="index-page-header" src="Assets/header1.jpg" alt="header">

        <div class="index-page-about">
            TRADEx aims to increase awareness on the Ghanaian Stock Market to particularly, new investors.<br>
            <strong>New to investing?</strong> Create your free account and begin your journey into the exciting world of charts and numbers.<br>
            <strong>Swipe down</strong> if you are only interested in viewing listed stocks.
        </div>

        <a id="next-section-button" href="#section-2"><span></span></a>
    </section>

    <section id="section-2">
        <div class="securities-table">
            <table id="home-table">
                <tr class="table-heading">
                    <th>Symbol</th>
                    <th>Company</th>
                    <th>Email</th>
                    <th>Industry</th>
                    <th>Capital / GHc</th>
                    <th>Total Shares</th>
                    <th>Price / GHc</th>
                </tr>
            </table>
        </div>
    </section>

    <?php include_once './Footer/footer.php'; ?>
</body>

</html>