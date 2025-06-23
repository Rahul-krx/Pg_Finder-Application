<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include timezone settings
require_once 'timezone.php';


define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'pg_finder');
define('DB_PORT', 3306);


try {
    $conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, '', DB_PORT);
    
    // डेटाबेस चेक और बनाएं अगर नहीं है
    if (!mysqli_select_db($conn, DB_NAME)) {
        $sql = "CREATE DATABASE IF NOT EXISTS " . DB_NAME;
        if (mysqli_query($conn, $sql)) {
            mysqli_select_db($conn, DB_NAME);
            
            // यूजर्स टेबल बनाएं
            $users_table = "CREATE TABLE IF NOT EXISTS users (
                id INT PRIMARY KEY AUTO_INCREMENT,
                name VARCHAR(100) NOT NULL,
                email VARCHAR(100) NOT NULL UNIQUE,
                password VARCHAR(255) NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )";
            
            if (!mysqli_query($conn, $users_table)) {
                throw new Exception("Error creating users table: " . mysqli_error($conn));
            }
        } else {
            throw new Exception("Error creating database: " . mysqli_error($conn));
        }
    }

} catch (Exception $e) {
    die("Connection failed: " . $e->getMessage());
}
?>