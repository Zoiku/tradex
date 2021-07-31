<?php
session_start();

// If condition to check if user is signed in. If not, the user is redirected to the logout page and eventually to the login page
if (!isset($_SESSION['username'])) {
    header("Location: ./Login/logout.php");
}

$username = $_SESSION['username'];

// To improve user experience, a loading page is displayed while the the program fetches data from an API
include_once './Loading-Page/loading-page.php';

include_once './pageunavailable.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <!-- CSS style sheet link -->
    <link rel="stylesheet" href="./Css/style.css">
    <link rel="icon" href="./Assets/favicon_io/favicon.ico">


    <!-- Script links to Jquery and script.js -->
    <script src="./JQuery/jquery-3.5.1.js"></script>
    <script defer src="./JS/script.js"></script>
    <script defer src="./mystocks.js"></script>
    <script defer src="./scriptindex.js"></script>
</head>

<body>
    <div class="loaded-page">
        <nav>
            <div class='logo'>
                <h4>Trade<small>x</small></h4>
            </div>

            <ul class='nav-links'>
                <li><a href='index.php'>Home</a></li>
                <li class='active-page'><a href='stockindex.php'>Dashboard</a></li>
                <li><a href='crashcourse.php'>Resources</a></li>
                <li><a href='./Login/logout.php'>Exit</a></li>
            </ul>
        </nav>

        <section id="section-1">
            <div>
                <h1>TRADE<small>x</small></h1>
            </div>

            <div class="s-i-page-header">
                <strong>WELCOME TO YOUR DASHBOARD, <?php echo $_SESSION['name'] ?></strong>
                <hr>
            </div>

            <div class="stock-index-dashboard">
                <div class="dash-item" id="numStocks">
                    <div class="dash-item-header">Stocks</div>
                    <div class="dash-item-value" id="num-stocks">0</div>

                    <div class="overlay">
                        <header>
                            what is a <br><p>STOCK?</p><br>
                        </header>

                        A stock is a type of investment that represents an ownership share in a company.
                        Investors buy stocks that they think will go up in value over time
                        <br><br>

                        <a target="_blank" href="https://www.nerdwallet.com/article/investing/what-is-a-stock">Read more here</a>
                    </div>
                </div>

                <div class="dash-item" id="directIndex">
                    <div class="dash-item-header">Direct Index</div>
                    <div class="dash-item-value" id="direct-index">0.00</div>

                    <div class="overlay">
                        <header>
                            calculating <br><p>DIRECT INDEX ?</p><br>
                        </header>

                        The direct index is the sum of all stock prices in an index.
                        A stock index might consist of 25 individual stocks. Their prices could be added together (e.g., price of stock #1 + price of stock #2 + ... = price of a stock index)
                        <br><br>

                        <a target="_blank" href="https://www.thebalance.com/how-stock-indices-are-calculated-1031353">Read more here</a>
                    </div>
                </div>

                <div class="dash-item" id="indirectIndex">
                    <div class="dash-item-header">Indirect Index</div>
                    <div class="dash-item-value" id="indirect-index">0.00</div>

                    <div class="overlay">
                        <header>
                            calculating <br>
                            <p>INDIRECT INDEX ?</p><br>
                        </header>

                        While there are several ways of calculating Indirect Index,
                        here, it is the average of all stock prices in the index.
                        <br><br>

                        <a target="_blank" href="https://www.thebalance.com/how-stock-indices-are-calculated-1031353">Read more here</a>
                    </div>
                
                </div>
            </div>

            <div class="securities-table" id="s-i-page-table">
                <table id="my-custom-stocks">
                    <?php
                    require("./Database-Connection/connection.php");
                    $username = $_SESSION['username'];
                    $user_stks = "SELECT `symbol` FROM `myindex` WHERE `username` = '$username'";
                    $run_user_stks = mysqli_query($conn, $user_stks);
                    $has_stks = mysqli_num_rows($run_user_stks) > 0 ? true : false;

                    if ($has_stks) {
                        $_SESSION['available'] = true;

                        echo <<<_STRING
                                <caption>My Stock Index </caption>

                                <tr class='table-heading'>
                                    <th>Symbol</th>
                                    <th>Company</th>
                                    <th>Price / GHc</th>
                                    <th></th>
                                </tr>
                            _STRING;

                        while ($rows = mysqli_fetch_assoc($run_user_stks)) {
                            echo <<<_STRING
                                        <script>
                                            fetch('https://dev.kwayisi.org/apis/gse/equities/$rows[symbol]')
                                                .then(response => response.json())
                                                .then(stockdata => {
                                                    num_stocks = num_stocks + 1;
                                                    direct_index += stockdata.price;
                                                    custom_stocks_table.innerHTML += "<tr><td>" + stockdata.name + "</td><td class='table-row-industry'>" + stockdata.company.name + "</td><td class='stock-price'>" + stockdata.price + "</td><td><a href='stockindex.php?symbol_to_delete=" + stockdata.name + "' class='delete-stock'><img class='action-button' src='./Assets/delete_button.png' alt='img'></a></td></tr>";
                                                    
                                                    stocks_DOM.innerHTML = num_stocks ;
                                                    direct_index_DOM.innerHTML = direct_index.toFixed(2);
                                                    indirect_index_DOM.innerHTML = ( direct_index / num_stocks ).toFixed(2);
                                                })
                                        </script>
                                _STRING;
                        }
                    } else {
                        $_SESSION['available'] = false;

                        echo
                        "
                                <script>
                                    document.getElementById('my-custom-stocks').style.outline = 'none';
                                </script>
                                <p class='empty-index-toolkit'> Haven't a clue what these concepts mean? Go to <a href='./crashcourse.php'>Resources</a> for a quick tour, or read more <a href='https://www.thebalance.com/how-stock-indices-are-calculated-1031353' target='_blank'>Here</a>. </br> If not, scroll down to add your first stock to your index! </p>
                            ";
                    }
                    ?>
                </table>

                <p class="deleteAll">
                    <?php
                    if (isset($_SESSION['available'])) {
                        if ($_SESSION['available']) {
                            echo <<<_String
                                    <a href="./stockindex.php?removeall=yes">Remove all</a>
                                _String;
                        }
                    }
                    ?>
                </p>
            </div>
        </section>

        <section id="section-2">
            <div class="securities-table">
                <table id="allstocks">
                    <tr class="table-heading">
                        <th>Symbol</th>
                        <th>Company</th>
                        <th>Email</th>
                        <th>Industry</th>
                        <th>Capital / GHc</th>
                        <th>Total Shares</th>
                        <th>Price / GHc</th>
                        <th></th>
                    </tr>
                </table>
            </div>
        </section>

        <?php require("./Database-Connection/connection.php");
        if (isset($_GET['symbol_to_insert'])) {
            $username = $_SESSION['username'];
            $stk = $_GET['symbol_to_insert'];

            $initial_check = "SELECT * FROM myindex WHERE `username` = '$username' AND `symbol` = '$stk'";
            $run_initial_check = mysqli_query($conn, $initial_check);
            $stock_exists = mysqli_num_rows($run_initial_check) > 0 ? true : false;

            if (!$stock_exists) {
                $add_stock = "INSERT INTO `myindex`(`username`, `symbol`) VALUES('$username','$stk')";
                $run_sql = mysqli_query($conn, $add_stock);

                if ($run_sql) {
                    echo "<script>location.href = './stockindex.php';</script>";
                }
            } else {
                echo <<<_String
                                <script>
                                    alert('Stock already exists'); 
                                    location.href = './stockindex.php';
                                </script>"
                            _String;
            }
        } else if (isset($_GET['symbol_to_delete'])) {
            $symbol = $_GET['symbol_to_delete'];
            $username = $_SESSION['username'];

            // After retrieving the symbole to delete, a query including username and symbol pair is used to delete the stock the user selected.
            $myindex_delete_sql = "DELETE FROM `myindex` WHERE username='$username' and symbol = '$symbol';";
            $myindex_delete_result = mysqli_query($conn, $myindex_delete_sql);

            if ($myindex_delete_result) {
                echo "<script> location.href = './stockindex.php'; </script>";
            }
        } else if (isset($_GET['removeall'])) {
            $username = $_SESSION['username'];
            $delete_all_sql = "DELETE FROM `myindex` WHERE username='$username'";
            $delete_all_result = mysqli_query($conn, $delete_all_sql);

            if ($delete_all_result) {
                echo "<script> location.href = './stockindex.php'; </script>";
            }
        }
        ?>

        <!-- A footer file  -->
        <?php include_once './Footer/footer.php'; ?>
    </div>
</body>

</html>