<?php
session_start();

// If condition to check if user is signed in. If not, the user is redirected to the logout page and eventually to the login page
if (!isset($_SESSION['username'])) {
    header("Location: ./Login/logout.php");
}

// To improve user experience, a loading page is displayed while the the program fetches data from an API
include_once './Loading-Page/loading-page.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Stock Index</title>

    <!-- CSS style sheet link -->
    <link rel="stylesheet" href="./Css/style.css">

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
                <strong><?php echo $_SESSION['name']; ?>'s DASHBOARD</strong>
                <hr>
            </div>

            <div class="stock-index-dashboard">
                <div class="dash-item" id="numStocks">
                    <div class="dash-item-header">Stocks</div>
                    <div class="dash-item-value">
                        <?php
                        require("./Database-Connection/connection.php");
                        $username = $_SESSION['username'];
                        $num_of_stocks = "SELECT * FROM `myindex` WHERE `username` = '$username'";
                        $run_num_of_stocks = mysqli_query($conn, $num_of_stocks);
                        $num_stocks_value = mysqli_num_rows($run_num_of_stocks) > 0 ? mysqli_num_rows($run_num_of_stocks) : 0;
                        echo $num_stocks_value;
                        ?>
                    </div>
                </div>

                <div class="dash-item" id="directIndex">
                    <div class="dash-item-header">Direct Index</div>
                    <div class="dash-item-value">0.00</div>
                </div>

                <div class="dash-item" id="indirectIndex">
                    <div class="dash-item-header">Indirect Index</div>
                    <div class="dash-item-value">0.00</div>
                </div>
            </div>

            <div class="securities-table" id="s-i-page-table">
                <table id="my-custom-stocks">
                    <?php
                    require("./Database-Connection/connection.php");
                    $username = $_SESSION['username'];
                    $user_stks = "SELECT `symbol` FROM `myindex` WHERE `username` = '$username'";
                    $run_user_stks = mysqli_query($conn, $num_of_stocks);
                    $has_stks = mysqli_num_rows($run_user_stks) > 0 ? true : false;

                    if ($has_stks) {
                        echo 
                        "
                            <caption>$_SESSION[name]'s Stock Index </caption>

                            <tr class='table-heading'>
                                <th>Symbol</th>
                                <th>Company</th>
                                <th>Price / GHc</th>
                                <th></th>
                            </tr>
                        ";

                        while ($rows = mysqli_fetch_assoc($run_user_stks)) {
                            echo ("
                                <script>
                                    fetch('https://dev.kwayisi.org/apis/gse/equities/$rows[symbol]')
                                        .then(response => response.json())
                                        .then(stockdata => {
                                            custom_stocks_table.innerHTML += `<tr><td>stockdata.name</td><td class='table-row-industry'>stockdata.company.name</td><td class='stock-price'>stockdata.price</td><td><a class='delete-stock'><img class='action-button' src='./Assets/delete_button.png' alt='img'></a></td></tr>`;
                                        })
                                    </script>
                                ");
                        }
                    }else {
                        echo 
                        "
                            <script>
                                document.getElementById('my-custom-stocks').style.outline = 'none';
                            </script>
                            
                            <p class='empty-index-toolkit'> Haven't a clue what these concepts mean? Go to <a href='./crashcourse.php'>Resources</a> for a quick tour. </br> If not, scroll down to add your first stock to your index ! </p>
                        ";
                    }
                    ?>
                </table>
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

        <?php
        if (isset($_GET['symbol_to_insert'])) {
            require("./Database-Connection/connection.php");

            $username = $_SESSION['username'];
            $stk = $_GET['symbol_to_insert'];

            $initial_check = "SELECT * FROM myindex WHERE `username` = '$username' AND `symbol` = '$stk'";
            $run_initial_check = mysqli_query($conn, $initial_check);
            $stock_exists = mysqli_num_rows($run_initial_check) > 0 ? true : false;

            if (!$stock_exists) {
                $add_stock = "INSERT INTO `myindex`(`username`, `symbol`) VALUES('$username','$stk')";
                $run_sql = mysqli_query($conn, $add_stock);

                if ($run_sql) {
                    echo "<script>alert('Added new stock')</script>";
                }
            } else {
                echo "<script>alert('Stock already exists')</script>";
            }
        }
        ?>

        <!-- A footer file  -->
        <?php include_once './Footer/footer.php'; ?>
    </div>
</body>

</html>