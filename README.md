PDOGS Web
===========

PDOGS (Programming Design Online Grading System) is an online judge used in the Programming Design course of Department of Information Management, National Taiwan University.

The current version of PDOGS is forked from HOJ and maintained by students of NTU IM.

## Requirement
* PHP 5.5
* MySQL 5.5

## Getting Started
Make sure you install PHP and MySQL on your machine. A bundled XAMPP package is recommended for beginners.

### Setting up database schema
Create a database and user with required privileges using MySQL command line tool or PhpMyAdmin, and restore the **judge.schema.sql** located in **docs/** to the database.

### Setting up configuration file
The configuration files are located in **application/config/**, there are two of them you may have to set up manually.

To set up database configurations, make a copy of **database.example.php** and name it **database.php**, edit the values of **hostname**, **username**, **database**, and **password** to fit your situation.

To set up SMTP configurations, which is not required for development. Make a copy of **mail.example.php** and name it **mail.php**, edit the SMTP credentials to fit your situation.

### Confirmation for new user
As mentioned above, the mail configuration is not required, if you plan to confirm new user manually, simply register a new account using the web interface, and update the **level** of desired admin user to **5** using PhpMyAdmin, users at level 5 are granted with administrative power.

## Contributors
 - ArbuzTW
 - Bigelephant29
 - Shouko
 - HOJ Original Author