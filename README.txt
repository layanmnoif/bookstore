==================================================
PROJECT NAME: My Simple Bookstore
COURSE: COMP 426 - Internet Technology and Web Systems
SEMESTER: Fall 2026
==================================================

1. PROJECT OVERVIEW:
--------------------
This is a simple e-commerce website for buying programming books online. 
The website allows users to register a new account, login securely, browse a catalog of 10 books, search for books by title, sort books by price, and place a purchase order.

2. TECHNOLOGIES USED:
---------------------
- HTML5: For making the structure of the webpages.
- CSS3: For styling colors, fonts, and making the layout responsive for mobile phones.
- JavaScript: For checking form inputs (validation) and showing/hiding book descriptions.
- PHP: For server-side operations, user sessions, and database connection.
- MySQL: For storing data in 3 relational tables (users, products, orders).

3. DATABASE SETUP INSTRUCTIONS:
-------------------------------
1. Open XAMPP Control Panel and start Apache and MySQL.
2. Go to your browser and open: http://localhost/phpmyadmin/
3. Click "New" to create a new database. Name it: bookstore_db
4. Click on "bookstore_db" from the left menu, then go to the "SQL" tab at the top.
5. Open the "database.sql" file from the project folder, copy all the code.
6. Paste the code into the SQL box in phpMyAdmin and click the "Go" button.
7. This will automatically create the 3 tables (users, products, orders) and insert 10 sample books.

4. HOW TO RUN THE WEBSITE:
--------------------------
1. Copy the entire "bookstore" folder and paste it inside: C:\xampp\htdocs\
2. Make sure Apache and MySQL are running in XAMPP.
3. Open your web browser and go to this link: http://localhost/bookstore/index.php
4. Now you can use the website!

5. TEST ACCOUNT FOR LOGIN:
--------------------------
You can register a new account from the website, or use this ready test account:
- Email: student@test.com
- Password: password123

6. SECURITY FEATURES IMPLEMENTED:
---------------------------------
- SQL Injection Protection: We used PHP PDO Prepared Statements ($pdo->prepare) for all queries.
- XSS Protection: We used htmlspecialchars() function to clean text output.
- Password Security: We used password_hash() for registration and password_verify() for login.
==================================================
Live Demo: Run locally using XAMPP (http://localhost/bookstore/index.php)
