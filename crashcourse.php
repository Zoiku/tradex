<?php
session_start();

// An if condition that checks if a user is logged in before allow them access to the page. If not, the user is directed to the logout page, which also redirects the user to the login page
if (!isset($_SESSION['username'])) {
    header("Location: ./Login/logout.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crash Course</title>

    <link rel="stylesheet" href="./Css/style.css">
    <script src="Jquery/jquery-3.5.1.js"></script>
</head>

<body>
    <!-- Nav bar once the user is signed in -->
    <nav>
        <div class="logo">
            <h4>Trade<small>X</small></h4>
        </div>

        <ul class="nav-links">
            <li><a href="index.php">Home</a></li>
            <li><a href="stockindex.php">Dashboard</a></li>
            <li class='active-page'><a href="crashcourse.php">Resources</a></li>
            <li><a href="./Login/logout.php">Exit</a></li>
        </ul>
    </nav>

    <section id="section-1">

        <div>
            <h1>TRADE<small>x</small></h1>
        </div>

        <div class="s-i-page-header">
            <strong>HOW THE STOCK MARKET WORKS</strong>
            <hr>
        </div>

        <!-- A crash course grid where introductory videos on Investments are displayed to the user -->
        <div id="crash-course-grid">
            <div id="video-1" class="video">
                <iframe src="https://www.youtube.com/embed/ZCFkWDdmXG8" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>

            <div id="video-2" class="video">
                <iframe src="https://www.youtube.com/embed/Sbp_t4guM8g" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>

            <div id="video-3" class="video">
                <iframe src="https://www.youtube.com/embed/WA3Jhvm4W9k" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>

            <div id="video-4" class="video">
                <iframe src="https://www.youtube.com/embed/CMQLdJa64Wk" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>

            <div id="video-5" class="video">
                <iframe src="https://www.youtube.com/embed/GEOTrWwuNZ0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
    </section>

    <!-- A footer included to allow for simplicity -->
    <?php include_once './Footer/footer.php'; ?>

    <script src='./JS/nav.js'></script>
</body>

</html>