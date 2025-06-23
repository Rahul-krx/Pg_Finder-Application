<?php
require_once "config.php";

// Drop the table if it exists
$sql = "DROP TABLE IF EXISTS accommodations";
if(mysqli_query($conn, $sql)) {
    echo "Old accommodations table dropped successfully.<br>";
} else {
    echo "Error dropping table: " . mysqli_error($conn) . "<br>";
}

// Create new accommodations table with all required columns
$sql = "CREATE TABLE accommodations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    location VARCHAR(255) NOT NULL,
    city VARCHAR(255) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    description TEXT,
    amenities TEXT,
    contact_number VARCHAR(20),
    address TEXT,
    image VARCHAR(255),
    rating FLOAT DEFAULT 0,
    gender VARCHAR(10) DEFAULT 'both',
    interested INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if(mysqli_query($conn, $sql)) {
    echo "New accommodations table created successfully with all required columns.";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?> 