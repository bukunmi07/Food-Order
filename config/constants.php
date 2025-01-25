<?php
        //Start Session
        session_start();

        // Database connection constants
        $servername = "localhost"; // Your server name
        $username = "root";        // Your MySQL username
        $password = "Tobiloba07.";            // Your MySQL password (empty for XAMPP default)
        $database = "food_order";     // Name of your database
        define('SITEURL', 'http://localhost/food-order/');

        // Create connection
        $conn = mysqli_connect($servername, $username, $password);

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Select database
        mysqli_select_db($conn, $database) or die("Database not found: " . mysqli_error($conn));







        //Create constants to Store Non repeating Values
        // define('LOCALHOST', 'localhost');
        // define('DB_USERNAME', 'root');
        // define('DB_PASSWORD', 'Tobiloba07.');
        // define('DB_NAME', 'food_order');
        
        // $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error()); // Database Connection
        // $db_select = mysqli_select_db($conn, "DB_NAME") or die(mysqli_error()); // Selecting Database
?>