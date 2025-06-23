<?php
require_once "config.php";

// Add image column to accommodations table
$sql = "ALTER TABLE accommodations ADD COLUMN image VARCHAR(255) DEFAULT NULL";

if(mysqli_query($conn, $sql)) {
    echo "Image column added successfully to accommodations table.";
} else {
    echo "Error adding image column: " . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?> 