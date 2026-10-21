# Tradex

A PHP and MySQL web application for exploring Ghana Stock Exchange equities and maintaining a personal stock watchlist. It includes registration, login/logout, stock selection, and an introductory investing video page.

Stock information is requested from the external Ghana Stock Exchange API at `dev.kwayisi.org`. This repository contains a watchlist application, not an order-execution service.

## Run locally

Requirements: PHP with the MySQLi extension, MySQL or MariaDB, and a PHP-capable server such as XAMPP. The supplied SQL dump was produced with PHP 7.4 and MariaDB 10.4; no runtime version is pinned.

1. Clone the repository into your server's document directory, for example XAMPP's `htdocs/tradex`.
2. Start the web server and database.
3. Import `MySql/myproject.sql`. It creates the `myproject` database and the `users` and `myindex` tables, including historical sample user records.
4. Edit `Database-Connection/connection.php` to use your local database host, username, password, and database name. The checked-in file targets an old hosted database.
5. Open `http://localhost/tradex/` when using that XAMPP directory layout.

`composer.json` is empty; there is no Composer dependency installation step.

## Usage

Browse equities on the homepage, create an account, and log in to manage your selected stock symbols. The stock-index page supports adding and removing selections. `crashcourse.php` embeds introductory videos.

The external equity API and embedded videos require internet access. Historical API URLs and hosted database settings should be checked before reuse.

## Code guide

- `index.php`: public landing page.
- `stockindex.php`: personal stock index and database actions.
- `Login/`, `SignUp/`: account forms and handlers.
- `Database-Connection/`: MySQLi connection.
- `MySql/myproject.sql`: schema and sample data.
- `Css/`, `JS/`, `JQuery/`: presentation and browser scripts.

## Development checks

There is no automated test runner. With a local database, check registration, login, adding/removing stocks, logout, and behavior when the equity API is unavailable. This historical project needs application and credential review before production reuse.
