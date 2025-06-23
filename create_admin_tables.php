<?php
require_once "config.php";

// Drop existing tables if they exist (for testing purposes)
$sql = "DROP TABLE IF EXISTS admin, accommodations, users";
if(mysqli_query($conn, $sql)){
    echo "Existing tables dropped successfully.<br>";
} else{
    echo "Error dropping tables: " . mysqli_error($conn) . "<br>";
}

// Create admin table
$sql = "CREATE TABLE admin (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
)";

if(mysqli_query($conn, $sql)){
    echo "Admin table created successfully.<br>";
} else{
    echo "Error creating admin table: " . mysqli_error($conn) . "<br>";
}

// Create accommodations table
$sql = "CREATE TABLE accommodations (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    location VARCHAR(100) NOT NULL,
    city VARCHAR(50) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    description TEXT,
    amenities TEXT,
    contact_number VARCHAR(20),
    address TEXT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if(mysqli_query($conn, $sql)){
    echo "Accommodations table created successfully.<br>";
} else{
    echo "Error creating accommodations table: " . mysqli_error($conn) . "<br>";
}

// Create users table
$sql = "CREATE TABLE users (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    name VARCHAR(100) NOT NULL,
    phone VARCHAR(20),
    is_verified BOOLEAN DEFAULT FALSE,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
)";

if(mysqli_query($conn, $sql)){
    echo "Users table created successfully.<br>";
} else{
    echo "Error creating users table: " . mysqli_error($conn) . "<br>";
}

// Add default admin account
$username = "admin";
$password = password_hash("admin123", PASSWORD_DEFAULT);
$email = "admin@pgfinder.com";

$sql = "INSERT INTO admin (username, password, email) VALUES (?, ?, ?)";
if($stmt = mysqli_prepare($conn, $sql)){
    mysqli_stmt_bind_param($stmt, "sss", $username, $password, $email);
    if(mysqli_stmt_execute($stmt)){
        echo "Default admin account created successfully.<br>";
        echo "Username: admin<br>";
        echo "Password: admin123<br>";
    } else{
        echo "Error creating default admin account: " . mysqli_error($conn) . "<br>";
    }
    mysqli_stmt_close($stmt);
}

echo "<br>All tables have been created successfully. You can now <a href='admin_login.php'>login to the admin panel</a>.";
?> 