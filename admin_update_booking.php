<?php
session_start();

// Check if user is logged in and is admin
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || $_SESSION["role"] !== "admin") {
    header("location: login.php");
    exit;
}

require_once "config.php";

// Debug: Check server date
$server_date = date('Y-m-d');
$server_datetime = date('Y-m-d H:i:s');
$timezone = date_default_timezone_get();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $booking_id = $_POST['booking_id'];
    $pg_name = $_POST['pg_name'];
    $amount = $_POST['amount'];
    $move_in_date = $_POST['move_in_date'];
    $status = $_POST['status'];
    $booking_date = date('Y-m-d'); // Set booking date to current date
    
    // Debug: Log the date being used
    error_log("Updating booking $booking_id with date: $booking_date (Server date: $server_date)");
    
    // Update booking details
    $update_sql = "UPDATE bookings SET 
                   pg_name = ?,
                   amount = ?,
                   move_in_date = ?,
                   status = ?,
                   booking_date = ?
                   WHERE booking_id = ?";
                   
    $stmt = $conn->prepare($update_sql);
    $stmt->bind_param("sdssss", 
        $pg_name,
        $amount,
        $move_in_date,
        $status,
        $booking_date,
        $booking_id
    );
    
    if ($stmt->execute()) {
        header("location: admin_bookings.php?success=1");
    } else {
        header("location: admin_bookings.php?error=1");
    }
    exit;
} else {
    header("location: admin_bookings.php");
    exit;
}
?> 