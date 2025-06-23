<?php
require_once "config.php";

// Check if columns exist and add them if they don't
$columns_to_check = [
    'image' => "ALTER TABLE accommodations ADD COLUMN image VARCHAR(255) DEFAULT NULL",
    'rating' => "ALTER TABLE accommodations ADD COLUMN rating FLOAT DEFAULT 0",
    'gender' => "ALTER TABLE accommodations ADD COLUMN gender VARCHAR(10) DEFAULT 'both'",
    'interested' => "ALTER TABLE accommodations ADD COLUMN interested INT DEFAULT 0"
];

foreach($columns_to_check as $column => $sql) {
    // Check if column exists
    $check_sql = "SHOW COLUMNS FROM accommodations LIKE '$column'";
    $result = mysqli_query($conn, $check_sql);
    
    if(mysqli_num_rows($result) == 0) {
        // Column doesn't exist, add it
        if(mysqli_query($conn, $sql)) {
            echo "Column '$column' added successfully.<br>";
        } else {
            echo "Error adding column '$column': " . mysqli_error($conn) . "<br>";
        }
    } else {
        echo "Column '$column' already exists.<br>";
    }
}

// Close connection
mysqli_close($conn);
?> 