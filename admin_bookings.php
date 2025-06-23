<?php
session_start();

// Check if user is logged in and is admin
if (!isset($_SESSION["admin_loggedin"]) || $_SESSION["admin_loggedin"] !== true) {
    header("location: admin_login.php");
    exit;
}

require_once "config.php";

// Format payment methods for display
function formatPaymentMethod($method) {
    if (!$method) {
        return 'N/A';
    }
    switch(strtolower($method)) {
        case 'card':
            return 'Credit/Debit Card';
        case 'upi':
            return 'UPI';
        case 'netbanking':
            return 'Net Banking';
        default:
            return ucfirst($method);
    }
}

// Handle status updates
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['booking_id']) && isset($_POST['status'])) {
    $booking_id = $_POST['booking_id'];
    $status = $_POST['status'];
    
    $update_sql = "UPDATE bookings SET status = ? WHERE booking_id = ?";
    $stmt = $conn->prepare($update_sql);
    $stmt->bind_param("ss", $status, $booking_id);
    $stmt->execute();
    
    header("location: admin_bookings.php");
    exit;
}

// Handle booking deletion
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_booking'])) {
    $booking_id = $_POST['booking_id'];
    
    $delete_sql = "DELETE FROM bookings WHERE booking_id = ?";
    $stmt = $conn->prepare($delete_sql);
    $stmt->bind_param("s", $booking_id);
    $stmt->execute();
    
    header("location: admin_bookings.php");
    exit;
}

// Fetch all bookings
$sql = "SELECT b.*, u.name as username FROM bookings b 
        LEFT JOIN users u ON b.user_id = u.id 
        ORDER BY b.created_at DESC";
$result = $conn->query($sql);

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Bookings - Admin Panel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .sidebar {
            min-height: 100vh;
            background: #343a40;
            color: white;
        }
        .sidebar .nav-link {
            color: rgba(255,255,255,.75);
            padding: 1rem;
            margin: 0.2rem 0;
        }
        .sidebar .nav-link:hover {
            color: white;
            background: rgba(255,255,255,.1);
        }
        .sidebar .nav-link.active {
            color: white;
            background: rgba(255,255,255,.1);
        }
        .sidebar .nav-link i {
            margin-right: 0.5rem;
        }
        .main-content {
            padding: 2rem;
        }
        .status-badge {
            padding: 5px 10px;
            border-radius: 15px;
            font-size: 0.85em;
        }
        .status-Pending { background-color: #ffd700; }
        .status-Confirmed { background-color: #90EE90; }
        .status-Cancelled { background-color: #ffcccb; }
        .status-Completed { background-color: #87CEEB; }
        .action-buttons .btn {
            margin-right: 0.5rem;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 px-0 sidebar">
                <div class="p-3">
                    <h4>Admin Panel</h4>
                    <hr>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="admin_dashboard.php">
                                <i class="fas fa-tachometer-alt"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="admin_manage_pgs.php">
                                <i class="fas fa-building"></i> Manage PGs
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="admin_manage_users.php">
                                <i class="fas fa-users"></i> Manage Users
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="admin_bookings.php">
                                <i class="fas fa-calendar-check"></i> Manage Bookings
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="admin_settings.php">
                                <i class="fas fa-cog"></i> Settings
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="admin_logout.php">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-9 col-lg-10 main-content">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2>Manage Bookings</h2>
                    <div>
                        <form method="POST" action="admin_update_all_dates.php" class="d-inline me-2">
                            <button type="submit" class="btn btn-warning">
                                <i class="fas fa-calendar-day"></i> Update All Dates to Today
                            </button>
                        </form>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addBookingModal">
                            <i class="fas fa-plus"></i> Add New Booking
                        </button>
                    </div>
                </div>

                <?php if(isset($_GET['success']) && $_GET['success'] == 2): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        All booking dates have been updated to today's date.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <?php if(isset($_GET['error']) && $_GET['error'] == 2): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Error updating booking dates. Please try again.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Booking ID</th>
                                        <th>User</th>
                                        <th>PG Name</th>
                                        <th>Amount</th>
                                        <th>Payment Method</th>
                                        <th>Booking Date</th>
                                        <th>Move-in Date</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while($booking = $result->fetch_assoc()) { ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($booking['booking_id']); ?></td>
                                        <td><?php echo htmlspecialchars($booking['username']); ?></td>
                                        <td><?php echo htmlspecialchars($booking['pg_name']); ?></td>
                                        <td>Rs <?php echo number_format($booking['amount']); ?></td>
                                        <td><?php echo formatPaymentMethod(htmlspecialchars($booking['payment_method'])); ?></td>
                                        <td><?php echo date('d M Y', strtotime($booking['booking_date'])); ?></td>
                                        <td><?php echo date('d M Y', strtotime($booking['move_in_date'])); ?></td>
                                        <td>
                                            <form method="POST" class="d-inline">
                                                <input type="hidden" name="booking_id" value="<?php echo $booking['booking_id']; ?>">
                                                <select name="status" class="form-select form-select-sm" onchange="this.form.submit()">
                                                    <option value="Pending" <?php echo $booking['status'] == 'Pending' ? 'selected' : ''; ?>>Pending</option>
                                                    <option value="Confirmed" <?php echo $booking['status'] == 'Confirmed' ? 'selected' : ''; ?>>Confirmed</option>
                                                    <option value="Cancelled" <?php echo $booking['status'] == 'Cancelled' ? 'selected' : ''; ?>>Cancelled</option>
                                                    <option value="Completed" <?php echo $booking['status'] == 'Completed' ? 'selected' : ''; ?>>Completed</option>
                                                </select>
                                            </form>
                                        </td>
                                        <td class="action-buttons">
                                            <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#editBookingModal<?php echo $booking['booking_id']; ?>">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <form method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this booking?');">
                                                <input type="hidden" name="booking_id" value="<?php echo $booking['booking_id']; ?>">
                                                <button type="submit" name="delete_booking" class="btn btn-sm btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editBookingModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Booking</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="admin_update_booking.php">
                        <input type="hidden" name="booking_id" id="edit_booking_id">
                        
                        <div class="mb-3">
                            <label class="form-label">PG Name</label>
                            <input type="text" class="form-control" name="pg_name" id="edit_pg_name" required>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Amount</label>
                            <input type="number" class="form-control" name="amount" id="edit_amount" required>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Move-in Date</label>
                            <input type="date" class="form-control" name="move_in_date" id="edit_move_in_date" required>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-select" id="edit_status">
                                <option value="Pending">Pending</option>
                                <option value="Confirmed">Confirmed</option>
                                <option value="Cancelled">Cancelled</option>
                                <option value="Completed">Completed</option>
                            </select>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Update Booking</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Booking Modal -->
    <div class="modal fade" id="addBookingModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Booking</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="admin_add_booking.php">
                        <div class="mb-3">
                            <label class="form-label">User</label>
                            <select class="form-select" name="user_id" required>
                                <option value="">Select User</option>
                                <?php
                                $users_sql = "SELECT id, name FROM users ORDER BY name";
                                $users_result = $conn->query($users_sql);
                                while($user = $users_result->fetch_assoc()) {
                                    echo "<option value='" . $user['id'] . "'>" . htmlspecialchars($user['name']) . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">PG Name</label>
                            <input type="text" class="form-control" name="pg_name" required>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Address</label>
                            <textarea class="form-control" name="address" required></textarea>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Amount</label>
                            <input type="number" class="form-control" name="amount" required>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Payment Method</label>
                            <select class="form-select" name="payment_method" required>
                                <option value="card">Credit/Debit Card</option>
                                <option value="upi">UPI</option>
                                <option value="netbanking">Net Banking</option>
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Booking Date</label>
                            <input type="date" class="form-control" name="booking_date" value="<?php echo date('Y-m-d'); ?>" required>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Move-in Date</label>
                            <input type="date" class="form-control" name="move_in_date" required>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-select" required>
                                <option value="Pending">Pending</option>
                                <option value="Confirmed">Confirmed</option>
                                <option value="Cancelled">Cancelled</option>
                                <option value="Completed">Completed</option>
                            </select>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Add Booking</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        // Add event listener for edit modal
        document.addEventListener('DOMContentLoaded', function() {
            const editModal = document.getElementById('editBookingModal');
            if (editModal) {
                editModal.addEventListener('show.bs.modal', function(event) {
                    const button = event.relatedTarget;
                    const bookingId = button.getAttribute('data-booking-id');
                    const pgName = button.getAttribute('data-pg-name');
                    const amount = button.getAttribute('data-amount');
                    const moveInDate = button.getAttribute('data-move-in-date');
                    const status = button.getAttribute('data-status');

                    document.getElementById('edit_booking_id').value = bookingId;
                    document.getElementById('edit_pg_name').value = pgName;
                    document.getElementById('edit_amount').value = amount;
                    document.getElementById('edit_move_in_date').value = moveInDate;
                    document.getElementById('edit_status').value = status;
                });
            }
        });
    </script>
</body>
</html> 