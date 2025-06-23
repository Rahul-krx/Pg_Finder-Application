<?php
session_start();

// Check if user is logged in and is admin
if (!isset($_SESSION["admin_loggedin"]) || $_SESSION["admin_loggedin"] !== true) {
    header("location: admin_login.php");
    exit;
}

require_once "config.php";

// Get current date
$current_date = date('Y-m-d');

// Update all booking dates to current date
$update_sql = "UPDATE bookings SET booking_date = ?";
$stmt = $conn->prepare($update_sql);
$stmt->bind_param("s", $current_date);

if ($stmt->execute()) {
    header("location: admin_bookings.php?success=2");
} else {
    header("location: admin_bookings.php?error=2");
}
exit;
?> 