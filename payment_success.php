<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

// Include database connection
require_once "config.php";

// Debug: Check server date
$server_date = date('Y-m-d');
$server_datetime = date('Y-m-d H:i:s');
$timezone = date_default_timezone_get();

// Generate a unique booking ID
$booking_id = 'BK' . rand(100000, 999999);

// Get payment details from URL parameters
$amount = isset($_GET['amount']) ? $_GET['amount'] : 0;
$pg_name = isset($_GET['pg_name']) ? $_GET['pg_name'] : 'N/A';
$payment_method = isset($_GET['method']) ? $_GET['method'] : 'card';
$address = isset($_GET['address']) ? $_GET['address'] : 'N/A';

// Save booking to database
if (isset($conn) && $conn instanceof mysqli) {
    // Create bookings table if it doesn't exist
    $create_table_sql = "CREATE TABLE IF NOT EXISTS bookings (
        id INT PRIMARY KEY AUTO_INCREMENT,
        booking_id VARCHAR(20) NOT NULL,
        user_id INT NOT NULL,
        pg_name VARCHAR(100) NOT NULL,
        address TEXT NOT NULL,
        amount DECIMAL(10,2) NOT NULL,
        payment_method VARCHAR(50) NOT NULL,
        booking_date DATE NOT NULL,
        status VARCHAR(20) NOT NULL,
        move_in_date DATE,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (user_id) REFERENCES users(id)
    )";
    
    mysqli_query($conn, $create_table_sql);
    
    // Insert booking into database
    $user_id = $_SESSION["id"];
    $booking_date = date('Y-m-d');
    $status = 'Confirmed';
    $move_in_date = date('Y-m-d', strtotime('+7 days')); // Default move-in date is 7 days from now
    
    // Debug: Log the date being used
    error_log("Creating booking from payment with date: $booking_date (Server date: $server_date)");
    
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
    
    $stmt->execute();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Successful - PG Finder</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8fafc;
        }
        .success-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 40px 20px;
        }
        .success-icon {
            color: #10B981;
            font-size: 80px;
            margin-bottom: 20px;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #00BCD4;
            color: white;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s;
        }
        .btn:hover {
            background-color: #0097A7;
        }
    </style>
</head>
<body>
    <div class="success-container text-center">
        <i class="fas fa-check-circle success-icon"></i>
        <h1 class="text-3xl font-bold mb-4">Payment Successful!</h1>
        <p class="text-gray-600 mb-6">Your payment of Rs <?php echo number_format($amount); ?> has been processed successfully.</p>
        <div class="bg-white p-6 rounded-lg shadow-md mb-6">
            <h2 class="text-xl font-semibold mb-4">Booking Details</h2>
            <div class="text-left">
                <p class="mb-2"><strong>PG Name:</strong> <?php echo htmlspecialchars($pg_name); ?></p>
                <p class="mb-2"><strong>Booking ID:</strong> <?php echo $booking_id; ?></p>
                <p class="mb-2"><strong>Date:</strong> <?php echo date('d M Y'); ?></p>
                <p class="mb-2"><strong>Payment Method:</strong> <?php echo htmlspecialchars($payment_method); ?></p>
            </div>
        </div>
        <p class="text-gray-600 mb-6">A confirmation email has been sent to your registered email address.</p>
        <div class="flex justify-center space-x-4">
            <a href="index.php" class="btn">Back to Home</a>
            <a href="my_bookings.php" class="btn">View My Bookings</a>
        </div>
    </div>

    <script>
        // Automatically redirect to home page after 10 seconds
        setTimeout(function() {
            window.location.href = 'index.php';
        }, 10000);
    </script>
</body>
</html> 