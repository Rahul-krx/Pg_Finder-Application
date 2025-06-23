<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

// Include database connection
require_once "config.php";

// Handle booking cancellation
if (isset($_POST['cancel_booking']) && isset($_POST['booking_id'])) {
    $booking_id = $_POST['booking_id'];
    
    if (isset($conn) && $conn instanceof mysqli) {
        // Delete the booking from the database
        $delete_sql = "DELETE FROM bookings WHERE booking_id = ? AND user_id = ?";
        $delete_stmt = $conn->prepare($delete_sql);
        $delete_stmt->bind_param("si", $booking_id, $_SESSION["id"]);
        $delete_stmt->execute();
        
        // Redirect to refresh the page
        header("Location: my_bookings.php");
        exit;
    }
}

// Initialize bookings array
$bookings = [];

// Check if database connection is successful
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
    
    if (mysqli_query($conn, $create_table_sql)) {
        // Check if there are any bookings for the current user
        $user_id = $_SESSION["id"];
        $check_sql = "SELECT COUNT(*) as count FROM bookings WHERE user_id = ?";
        $check_stmt = $conn->prepare($check_sql);
        $check_stmt->bind_param("i", $user_id);
        $check_stmt->execute();
        $check_result = $check_stmt->get_result();
        $row = $check_result->fetch_assoc();
        
        // If no bookings exist, insert some sample data
        if ($row['count'] == 0) {
            // Insert sample bookings
            $sample_bookings = [
                [
                    'booking_id' => 'BK' . rand(100000, 999999),
                    'pg_name' => 'Royal Retreat PG',
                    'address' => 'Model Town, Ludhiana',
                    'amount' => 3800,
                    'payment_method' => 'card',
                    'booking_date' => date('Y-m-d', strtotime('-5 days')),
                    'status' => 'Confirmed',
                    'move_in_date' => date('Y-m-d', strtotime('+5 days'))
                ],
                [
                    'booking_id' => 'BK' . rand(100000, 999999),
                    'pg_name' => 'Harmony Homes',
                    'address' => 'Ferozepur Road, Ludhiana',
                    'amount' => 3000,
                    'payment_method' => 'upi',
                    'booking_date' => date('Y-m-d', strtotime('-15 days')),
                    'status' => 'Confirmed',
                    'move_in_date' => date('Y-m-d', strtotime('-10 days'))
                ],
                [
                    'booking_id' => 'BK' . rand(100000, 999999),
                    'pg_name' => 'Perfect PG',
                    'address' => 'Main Market Dakoha, Jalandhar',
                    'amount' => 3000,
                    'payment_method' => 'netbanking',
                    'booking_date' => date('Y-m-d', strtotime('-30 days')),
                    'status' => 'Completed',
                    'move_in_date' => date('Y-m-d', strtotime('-25 days'))
                ]
            ];
            
            // Use direct SQL insert instead of prepared statement to avoid type issues
            foreach ($sample_bookings as $booking) {
                $booking_id = $booking['booking_id'];
                $pg_name = $booking['pg_name'];
                $address = $booking['address'];
                $amount = $booking['amount'];
                $payment_method = $booking['payment_method'];
                $booking_date = $booking['booking_date'];
                $status = $booking['status'];
                $move_in_date = $booking['move_in_date'];
                
                $insert_sql = "INSERT INTO bookings (booking_id, user_id, pg_name, address, amount, payment_method, booking_date, status, move_in_date) 
                               VALUES ('$booking_id', $user_id, '$pg_name', '$address', $amount, '$payment_method', '$booking_date', '$status', '$move_in_date')";
                
                mysqli_query($conn, $insert_sql);
            }
        }
        
        // Fetch user's bookings from the database
        $sql = "SELECT * FROM bookings WHERE user_id = ? ORDER BY booking_date DESC";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $bookings = $result->fetch_all(MYSQLI_ASSOC);
        
        // Debug: Check if payment_method exists in the fetched data
        if (!empty($bookings)) {
            foreach ($bookings as $key => $booking) {
                if (!isset($booking['payment_method']) || empty($booking['payment_method'])) {
                    // If payment_method is missing, set a default value
                    $bookings[$key]['payment_method'] = 'card';
                }
                
                // Debug: Print status values
                echo "<!-- Debug: Booking ID: " . $booking['booking_id'] . ", Status: " . $booking['status'] . " -->";
            }
        }
    }
}

// If no bookings found or database connection failed, we'll use dummy data for demonstration
if (empty($bookings)) {
    $bookings = [
        [
            'booking_id' => 'BK' . rand(100000, 999999),
            'pg_name' => 'Royal Retreat PG',
            'address' => 'Model Town, Ludhiana',
            'amount' => 3800,
            'payment_method' => 'card',
            'booking_date' => date('Y-m-d', strtotime('-5 days')),
            'status' => 'Confirmed',
            'move_in_date' => date('Y-m-d', strtotime('+5 days'))
        ],
        [
            'booking_id' => 'BK' . rand(100000, 999999),
            'pg_name' => 'Harmony Homes',
            'address' => 'Ferozepur Road, Ludhiana',
            'amount' => 3000,
            'payment_method' => 'upi',
            'booking_date' => date('Y-m-d', strtotime('-15 days')),
            'status' => 'Confirmed',
            'move_in_date' => date('Y-m-d', strtotime('-10 days'))
        ],
        [
            'booking_id' => 'BK' . rand(100000, 999999),
            'pg_name' => 'Perfect PG',
            'address' => 'Main Market Dakoha, Jalandhar',
            'amount' => 3000,
            'payment_method' => 'netbanking',
            'booking_date' => date('Y-m-d', strtotime('-30 days')),
            'status' => 'Completed',
            'move_in_date' => date('Y-m-d', strtotime('-25 days'))
        ]
    ];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Bookings - PG Finder</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        .breadcrumb a {
            text-decoration: none;
            color: #00BCD4;
        }
        .btn {
            background-color: #00BCD4;
            color: white;
            border-radius: 3px;
            padding: 10px 20px;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .btn:hover {
            background-color: #0097A7;
        }
        .booking-card {
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        .booking-card:hover {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transform: translateY(-2px);
        }
        .status-badge {
            display: inline-block;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 0.75rem;
            font-weight: 600;
        }
        .status-Confirmed {
            background-color: #E0F7FA;
            color: #00BCD4;
        }
        .status-Completed {
            background-color: #E8F5E9;
            color: #4CAF50;
        }
        .status-Cancelled {
            background-color: #FFEBEE;
            color: #F44336;
        }
        .status-Pending {
            background-color: #FFF8E1;
            color: #FFC107;
        }
    </style>
</head>
<body class="bg-gray-100">
    <header class="bg-white shadow-md py-4">
        <div class="header-container">
            <div class="logo">
                <a href="index.php">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/b/bf/IFCO_PG_%28Cinema%29.png" alt="PG Finder Logo" class="h-10">
                </a>
                <span class="ml-2 text-lg font-semibold">PG Finder</span>
            </div>
            <div class="auth-links">
                <a href="dashboard.php" class="mr-4">
                    <i class="fas fa-user"></i> Welcome, <?php echo htmlspecialchars($_SESSION["name"]); ?>
                </a>
                <a href="logout.php">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div>
        </div>
        <div class="breadcrumb bg-gray-200 py-2">
            <div class="container mx-auto px-4">
                <a href="index.php">Home</a> /
                <span>My Bookings</span>
            </div>
        </div>
    </header>

    <div class="container mx-auto px-4 py-8">
        <div class="bg-white shadow-md rounded-lg overflow-hidden mb-8">
            <div class="p-6">
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-2xl font-bold">My Bookings</h1>
                    <a href="index.php" class="btn">
                        <i class="fas fa-home mr-2"></i> Back to Home
                    </a>
                </div>
                
                <?php if (empty($bookings)): ?>
                    <div class="text-center py-10">
                        <i class="fas fa-calendar-times text-gray-400 text-5xl mb-4"></i>
                        <h3 class="text-xl font-bold mb-2">No Bookings Found</h3>
                        <p class="text-gray-600 mb-4">You haven't made any bookings yet.</p>
                        <a href="index.php" class="btn">Browse PGs</a>
                    </div>
                <?php else: ?>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <?php foreach ($bookings as $booking): ?>
                            <div class="booking-card p-5">
                                <div class="flex justify-between items-start mb-4">
                                    <div>
                                        <h3 class="font-semibold text-lg"><?php echo htmlspecialchars($booking['pg_name']); ?></h3>
                                        <p class="text-gray-600 text-sm"><?php echo htmlspecialchars($booking['address']); ?></p>
                                    </div>
                                    <span class="status-badge status-<?php echo $booking['status']; ?>">
                                        <?php echo htmlspecialchars($booking['status']); ?>
                                    </span>
                                </div>
                                
                                <div class="border-t border-gray-200 pt-4">
                                    <div class="grid grid-cols-2 gap-4 mb-4">
                                        <div>
                                            <p class="text-gray-500 text-sm">Booking ID</p>
                                            <p class="font-medium"><?php echo htmlspecialchars($booking['booking_id']); ?></p>
                                        </div>
                                        <div>
                                            <p class="text-gray-500 text-sm">Amount Paid</p>
                                            <p class="font-medium">Rs <?php echo number_format($booking['amount']); ?></p>
                                        </div>
                                        <div>
                                            <p class="text-gray-500 text-sm">Payment Method</p>
                                            <p class="font-medium capitalize">
                                                <?php 
                                                switch(strtolower($booking['payment_method'])) {
                                                    case 'card':
                                                        echo 'Credit/Debit Card';
                                                        break;
                                                    case 'upi':
                                                        echo 'UPI';
                                                        break;
                                                    case 'netbanking':
                                                        echo 'Net Banking';
                                                        break;
                                                    default:
                                                        echo htmlspecialchars($booking['payment_method']);
                                                }
                                                ?>
                                            </p>
                                        </div>
                                        <div>
                                            <p class="text-gray-500 text-sm">Booking Date</p>
                                            <p class="font-medium"><?php echo date('d M Y', strtotime($booking['booking_date'])); ?></p>
                                        </div>
                                    </div>
                                    
                                    <?php if (isset($booking['move_in_date'])): ?>
                                        <div class="mb-4">
                                            <p class="text-gray-500 text-sm">Move-in Date</p>
                                            <p class="font-medium"><?php echo date('d M Y', strtotime($booking['move_in_date'])); ?></p>
                                        </div>
                                    <?php endif; ?>
                                    
                                    <div class="flex justify-between mt-4">
                                        <a href="#" class="text-blue-500 hover:text-blue-700 text-sm">
                                            <i class="fas fa-file-invoice mr-1"></i> View Receipt
                                        </a>
                                        <?php if ($booking['status'] == 'Confirmed'): ?>
                                            <form method="post" action="my_bookings.php" style="display: inline;">
                                                <input type="hidden" name="booking_id" value="<?php echo htmlspecialchars($booking['booking_id']); ?>">
                                                <button type="submit" name="cancel_booking" class="text-red-500 hover:text-red-700 text-sm bg-transparent border-0 p-0 cursor-pointer">
                                                    <i class="fas fa-times-circle mr-1"></i> Cancel Booking
                                                </button>
                                            </form>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        
        <footer class="text-center text-gray-500">
            <p>© 2025 PG Finder. All rights reserved.</p>
        </footer>
    </div>

    <script>
        // Add any JavaScript functionality here
        document.addEventListener('DOMContentLoaded', function() {
            // Add confirmation dialog for cancel booking
            const cancelForms = document.querySelectorAll('form[action="my_bookings.php"]');
            cancelForms.forEach(form => {
                form.addEventListener('submit', function(e) {
                    if (!confirm('Are you sure you want to cancel this booking? This action cannot be undone.')) {
                        e.preventDefault();
                    }
                });
            });
        });
    </script>
</body>
</html> 