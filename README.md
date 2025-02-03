# PHP Website Setup Guide (Using XAMPP & MySQL)

## Prerequisites

Before setting up the PHP website, ensure you have the following installed:

- [XAMPP](https://www.apachefriends.org/index.html) (Includes Apache, PHP, and MySQL)
- A web browser (Chrome, Firefox, Edge, etc.)
- A text editor (VS Code, Sublime Text, Notepad++, etc.)

## Installation and Setup

### Step 1: Install XAMPP
1. Download XAMPP from [Apache Friends](https://www.apachefriends.org/download.html).
2. Run the installer and follow the on-screen instructions.
3. Start XAMPP Control Panel and ensure **Apache** and **MySQL** are running.

### Step 2: Configure the PHP Website
1. Copy your PHP project folder into the `htdocs` directory located in your XAMPP installation directory (e.g., `C:\xampp\htdocs\mywebsite`).
2. Open XAMPP Control Panel and start **Apache** and **MySQL**.

### Step 3: Set Up the MySQL Database
1. Open your web browser and go to `http://localhost/phpmyadmin`.
2. Import your database SQL file:
   - Click on the database you just created.
   - Go to the **Import** tab.
   - Click **Choose File** and select the `database.sql` file
   - Click **Go** to import the database.

### Step 4: Configure Database Connection
1. Open your project folder in a text editor.
2. Locate the database configuration file (commonly `config.php` or `.env`).
3. Update the database credentials as follows:
   ```php
   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "mydatabase";
   ```

### Step 5: Run the Website
1. Open your browser and go to `http://localhost/fyp-system`.
2. Your PHP website should now be accessible.

## Troubleshooting

- **Apache or MySQL Not Starting?**
  - Check for port conflicts. Change Apache’s port in `httpd.conf` (`Listen 80` → `Listen 8080`).
  - Change MySQL’s port in `my.ini` (`port=3306` → `port=3307`).
  - Restart XAMPP after changes.

- **Database Connection Errors?**
  - Ensure MySQL is running.
  - Verify database credentials in `config.php`.

## Conclusion
Your PHP website is now set up and running locally using XAMPP. Happy coding!

