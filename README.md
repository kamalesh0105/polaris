# Polaris
## Introduction

This guide provides step-by-step instructions for installing and setting up the Polaris (LAMP Stack).
## Prerequisites

Before proceeding with the installation, ensure that you have the following prerequisites installed:

-   Linux Operating System or WSL (Ubuntu Preferred)
-   Apache Web Server
-   MySQL Database Server
-   PHP

## Installation Steps
Use Sudo cmd for privleged commmands
### Step 1: Clone the Repository
git clone https://github.com/kamalesh0105/polaris.git (for https method)
`cd polaris`
`sudo mv ./polaris  /var/www/html/`   or any preferred location
### Step 2:Configure Apache
`sudo apt install apache2 mysql-server php libapache2-mod-php php-mysql`.
`sudo nano /etc/apache2/sites-available/000-default.conf`.
paste the below or set the document root as /path/to/polaris/htdocs/
Ex:
Edit-`DocumentRoot /var/www/html/polaris/htdocs/`  
`cd /etc/apache2/sites-available/`  
`sudo a2ensite 000-default.conf `  
`sudo service apache2 restart`  

### Step 3:Configure PHP
#### Using php.ini:

1.  Open your `php.ini` file. The location of this file may vary depending on your system. Common locations are  `sudo nano /etc/php/8.1/apache2/php.ini`.
2.  Look for the `short_open_tag` directive.
3.  Set it to `On`:        
    `short_open_tag = On`   
4.  Save the file.
5.  Restart your web server for the changes to take effect.
    `sudo service apache2 restart`
### Step 4:Configure Mysql 
Refer here to configure mysql server for root user
1.https://www.digitalocean.com/community/tutorials/how-to-install-mysql-on-ubuntu-20-04
2.After configuring root user create a database named `polaris`
	`create database polaris;`
3.And import the db.sql in project home folder
	`cd /var/www/html/polaris/`
	`sudo mysql -u root -p your_database_name < db.sql`
	
### Step 5:General configuration
