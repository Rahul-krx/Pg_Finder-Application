<?php
session_start();

if(!isset($_SESSION["admin_loggedin"]) || $_SESSION["admin_loggedin"] !== true){
    header("location: admin_login.php");
    exit;
}

require_once "config.php";

// Get total users count
$users_count = 0;
$sql = "SELECT COUNT(*) as total FROM users";
$result = mysqli_query($conn, $sql);
if($row = mysqli_fetch_assoc($result)) {
    $users_count = $row['total'];
}

// Get total PGs count
$pgs_count = 0;
$sql = "SELECT COUNT(*) as total FROM accommodations";
$result = mysqli_query($conn, $sql);
if($row = mysqli_fetch_assoc($result)) {
    $pgs_count = $row['total'];
}

// Get recent users
$recent_users = [];
$sql = "SELECT id, name, email, created_at FROM users ORDER BY created_at DESC LIMIT 5";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)) {
    $recent_users[] = $row;
}

// Get recent PGs
$recent_pgs = [];
$sql = "SELECT id, name, address, price, city FROM accommodations ORDER BY id DESC LIMIT 5";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)) {
    $recent_pgs[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - PG Finder</title>
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
        .stat-card {
            background: white;
            border-radius: 10px;
            padding: 1.5rem;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            margin-bottom: 1.5rem;
        }
        .stat-card i {
            font-size: 2rem;
            margin-bottom: 1rem;
            color: #0d6efd;
        }
        .recent-list {
            background: white;
            border-radius: 10px;
            padding: 1.5rem;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .recent-list h5 {
            margin-bottom: 1rem;
            padding-bottom: 0.5rem;
            border-bottom: 1px solid #dee2e6;
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
                            <a class="nav-link active" href="admin_dashboard.php">
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
                            <a class="nav-link" href="admin_bookings.php">
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
                    <h2>Dashboard Overview</h2>
                    <div>
                        Welcome, <?php echo htmlspecialchars($_SESSION["admin_username"]); ?>
                    </div>
                </div>

                <!-- Stats Cards -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="stat-card">
                            <i class="fas fa-users"></i>
                            <h3><?php echo $users_count; ?></h3>
                            <p>Total Users</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="stat-card">
                            <i class="fas fa-building"></i>
                            <h3><?php echo $pgs_count; ?></h3>
                            <p>Total PGs</p>
                        </div>
                    </div>
                </div>

                <!-- Recent Activity -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="recent-list">
                            <h5>Recent Users</h5>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Joined</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($recent_users as $user): ?>
                                        <tr>
                                            <td><?php echo htmlspecialchars($user['name']); ?></td>
                                            <td><?php echo htmlspecialchars($user['email']); ?></td>
                                            <td><?php echo date('M d, Y', strtotime($user['created_at'])); ?></td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="recent-list">
                            <h5>Recent PGs</h5>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>City</th>
                                            <th>Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($recent_pgs as $pg): ?>
                                        <tr>
                                            <td><?php echo htmlspecialchars($pg['name']); ?></td>
                                            <td><?php echo htmlspecialchars($pg['city']); ?></td>
                                            <td>Rs <?php echo number_format($pg['price']); ?></td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html> 