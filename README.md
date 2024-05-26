# AOI Monthly Defects

Develop a PHP web-based system that will record the detection of model product defects in AOI Machine.

This guide will walk you through the steps to configure the database connection in `libs/server.php` and import the `aoi_monthly_defects.sql` file into MySQL.

## 1. Configuring Database Connection

Follow these steps to configure the database connection in `libs/server.php`:

1. Open the `server.php` file located in the `libs` directory of your project.
2. Locate the section where the database connection parameters are defined. It typically looks like this:

    ```php
    // Development Connection
    // $connect = new PDO("mysql:host=localhost;dbname=aoi_monthly_defects","root","root");

    // Remote SQL Connection
    $connect = new PDO("mysql:host=remotemysql.com;dbname=OuqhQAwYnh","OuqhQAwYnh","7DjFAmL7Ey");
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    ```

3. Update the values of `$dbHost`, `$dbUsername`, `$dbPassword`, and `$dbName` with your MySQL database connection details.

4. Save the changes to `server.php`.

## 2. Importing SQL File into MySQL

Follow these steps to import the `aoi_monthly_defects.sql` file into MySQL:

1. Make sure you have MySQL installed on your system and you have access to the MySQL command-line client or a graphical interface like phpMyAdmin.

2. Open your MySQL command-line client or phpMyAdmin.

3. Create a new database for your project if it doesn't exist already. You can use the following command in MySQL command-line client:

    ```sql
    CREATE DATABASE database_name;
    ```

4. Once the database is created, switch to that database using the following command:

    ```sql
    USE database_name;
    ```

5. Now, import the `aoi_monthly_defects.sql` file into the database. If you're using the MySQL command-line client, you can use the following command:

    ```bash
    mysql -u username -p database_name < path/to/aoi_monthly_defects.sql
    ```

    Replace `username` with your MySQL username, `database_name` with the name of your database, and `path/to/aoi_monthly_defects.sql` with the actual path to the SQL file.

    If you're using phpMyAdmin, there is typically an option to import SQL files directly through the interface. Navigate to the Import tab and select the `aoi_monthly_defects.sql` file.

6. Once the import is complete, you should see a message indicating the successful execution of the SQL queries.

7. Your database is now configured and populated with the necessary tables and data.

## Additional Notes

- Make sure your MySQL user has the necessary permissions to create databases and import SQL files.
- Double-check the database connection parameters and ensure they match your MySQL configuration.
- If you encounter any errors during the import process, double-check the SQL file for any syntax errors or inconsistencies.

