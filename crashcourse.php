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
    <link rel="icon" href="./Assets/favicon_io/favicon.ico">

    <script src="Jquery/jquery-3.5.1.js"></script>
</head>

<body>
    <div class="unavailable-screen-res">
        Mobile Version in progress. Please view on a larger screen.
    </div>

    <div class="available-screen-res">
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
            <div id="video-resources">
                <div class="videos-row" id="row1">
                    <div class="video-section" id="collection1">
                        <p class="video-section-header">
                            What is a Stock ?
                        </p>

                        <div class="video-collection-row">
                            <iframe src="https://www.youtube.com/embed/ZCFkWDdmXG8" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            <iframe src="https://www.youtube.com/embed/o4jfBC0AgIM" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>

                        <div class="video-collection-row">
                            <iframe src="https://www.youtube.com/embed/fn3y1hNVgA4" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    </div>

                    <div class="video-section" id="collection2">
                        <p class="video-section-header">
                            How the Market Works ?
                        </p>

                        <div class="video-collection-row">
                            <iframe src="https://www.youtube.com/embed/p7HKvqRI_Bo" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            <iframe src="https://www.youtube.com/embed/F3QpgXBtDeo" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>

                        <div class="video-collection-row">
                            <iframe src="https://www.youtube.com/embed/CMQLdJa64Wk" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            <iframe src="https://www.youtube.com/embed/dmqoqVwFopE" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>

                <div class="videos-row" id="row2">
                    <div class="video-section" id="collection3">
                        <p class="video-section-header">
                            What are Indexes ?
                        </p>

                        <div class="video-collection-row">
                            <iframe src="https://www.youtube.com/embed/WA3Jhvm4W9k" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            <iframe src="https://www.youtube.com/embed/VJQ6-DDr3jA" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>

                        <div class="video-collection-row">
                            <iframe src="https://www.youtube.com/embed/y-RGEos-lus" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>



                    </div>

                    <div class="video-section" id="collection4">
                        <p class="video-section-header">
                            The Ghanaian Stock Market
                        </p>

                        <div class="video-collection-row">
                            <iframe src="https://www.youtube.com/embed/GEOTrWwuNZ0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>


            </div>
        </section>

        <!-- A footer included to allow for simplicity -->
        <?php include_once './Footer/footer.php'; ?>
    </div>
</body>

</html>