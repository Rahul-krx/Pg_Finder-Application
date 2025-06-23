<?php
session_start();

// Check if user is logged in and is admin
if (!isset($_SESSION["admin_loggedin"]) || $_SESSION["admin_loggedin"] !== true) {
    header("location: admin_login.php");
    exit;
}

require_once "config.php";

// Debug: Check server date
$server_date = date('Y-m-d');
$server_datetime = date('Y-m-d H:i:s');
$timezone = date_default_timezone_get();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Generate a unique booking ID
    $booking_id = 'BK' . rand(100000, 999999);
    
    // Get form data
    $user_id = $_POST['user_id'];
    $pg_name = $_POST['pg_name'];
    $address = $_POST['address'];
    $amount = $_POST['amount'];
    $payment_method = $_POST['payment_method'];
    $booking_date = date('Y-m-d'); // Always set to current date
    $move_in_date = $_POST['move_in_date'];
    $status = $_POST['status'];
    
    // Debug: Log the date being used
    error_log("Creating new booking with date: $booking_date (Server date: $server_date)");
    
    // Insert booking into database
    $insert_sql = "INSERT INTO bookings (booking_id, user_id, pg_name, address, amount, payment_method, booking_date, status, move_in_date) 
                   VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($insert_sql);
    $stmt->bind_param("sisdsisss", 
        $booking_id, 
        $user_id, 
        $pg_name, 
        $address, 
        $amount, 
        $payment_method, 
        $booking_date, 
        $status, 
        $move_in_date
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