Project Title: Tradex

Project Description: The aim of this web application is to increase awareness of investment securties listed on the Ghana Stock Exchange, to particularly new investors. 
With a customizable stock index where users track their most performing stocks, users are able to create their own stock indexes with information about the indirec and indirect values of their indexes.


How to Build:
1. (THE API) The main resource for the project was the Ghana Stock Exchange APi.
   The api url (https://dev.kwayisi.org/apis/gse/equities) provides live reading of the stocks listed on the Ghana Stock Exchange Market in a index symbol, price pair. 
   For more details about the listed index, the stock index would have to be appended. For example (https://dev.kwayisi.org/apis/gse/equities/{symbol index goes here})
   As such for a more effective data on all the listed companies, first loop through the sybmbols in the api and then append them to the api url, creating new resources in each iteration.
2. (THE CLASSES AND TABLE)
   A Listing class, is then created taking in the values of the api data as parameters (Symbol, Company Name, Company Website,...) to create objects of the resources.
   This Listing class is used in the index home page, for all users to view. 
   To ensure organisation, objects are displayed in a table.
   For users that create account, functionalities are implemented for them to add and remove favorited stocks.
   As such the Listing class is extended and overloadded with getter methods passed to the server to allow for the deleteion and addition of records.
3. (ACCOUNT CREATION)
   On the index page, the list of live stocks are displayed.
   Account creations are purposefully for users that want more beyond only viewing stocks. With an account created, they are able to create a personalisable stock index to track their favorite stocks.
   The webpage has options to create accounts and login. The pages are created with simple php code, using forms, which has its data validated in a javascript file and then also validated in php file, before being inserted to the database.
   The passwords are multi hashed to ensure user safety.
   Also, with the aim of using usernames as session varibales, the usernames inputed into from the sign up form is validated live using ajax, by reading the users input and comparing it to the usernames in the database.
4. (STOCK INDEX)
    The stock index has two tables. One where a user can add stocks, into a table where the user can view their stocks. 
    The latter is created similarly to the one in the index page, but using the ListingV2 class, which contains an overloaded method that allows for the user to click and send to the server the symbol clicked to be appended in the database.
    For simplicity, user and the symbol are stored in a myindex database. In that format and with the help of session variables the user can be able to view all his recorded activites.
    The first table, which displays all of the users added stocks, are created by using the ListingV3 class, which has an overloaded method with a get method which sends to the server the symbol to delete and the username(which is the Session variable identifier since the usernames are made uniqye)
5. (CRASH COURSE)
    The crash course page is particularly for new investors with little knowledge on investment. Here, a grid is created to display 6 videos, reading from youtube. 
    Using CSS grid, the videos are structured in a sequential manner.
6. (LOGOUT)
    A logout php file is create to destroy all sessions. This file is passed in as a link in the navigation bars across all the pages.
7. (DATABESE)
    As explained, the user's favorties index are stored in a username and symbol pair. As such, using the session username, the user can be able to their selected stocks. 
    To implement, you need two tables. A table to records users (fullname, username, password). Next you need a database to record username and symbol. 
    Since the prices of the stocks change, only the symbols are stored in pairs with the username. 
    In the stock index page, the data is read from the api and comparisons are made with the users paired symbols to create objects of the user's stocks
    
HOW TO RUN
1. (CLONE)
   First clone the repository. Since the files are predominantly PHP, clone into htdocs.
2. (HTDOCS)
   In your local host click on the repository name, final-Zoiku to be redirected to the landing page.
3. (LOCAL HOST)
   Hopefully, you should be able to view the landing page. Click login and the click the create account link. 
   Once account is created, user would be redirected to the login page to login.
4. (STOCK INDEX)
   On the stock index page, you can either add or delete stocks. To make sure users are certain, a confirm dialog box displays on each click (Either delete or add).
5. (CRASH COURSE)
   Watch introductory videos on investment
6. (LOGOUT)
   User can then log out when finished
