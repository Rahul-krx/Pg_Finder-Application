<?php
session_start();

if(!isset($_SESSION["admin_loggedin"]) || $_SESSION["admin_loggedin"] !== true){
    header("location: admin_login.php");
    exit;
}

require_once "config.php";

$username = $email = $current_password = $new_password = $confirm_password = "";
$username_err = $email_err = $current_password_err = $new_password_err = $confirm_password_err = "";

// Get current admin details
$sql = "SELECT username, email FROM admin WHERE id = ?";
if($stmt = mysqli_prepare($conn, $sql)){
    mysqli_stmt_bind_param($stmt, "i", $_SESSION["admin_id"]);
    if(mysqli_stmt_execute($stmt)){
        $result = mysqli_stmt_get_result($stmt);
        if($row = mysqli_fetch_assoc($result)){
            $username = $row["username"];
            $email = $row["email"];
        }
    }
    mysqli_stmt_close($stmt);
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else {
        $username = trim($_POST["username"]);
    }
    
    // Validate email
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter an email.";
    } else {
        $email = trim($_POST["email"]);
    }
    
    // Validate current password
    if(empty(trim($_POST["current_password"]))){
        $current_password_err = "Please enter your current password.";
    } else {
        $current_password = trim($_POST["current_password"]);
    }
    
    // Validate new password
    if(!empty(trim($_POST["new_password"]))){
        if(strlen(trim($_POST["new_password"])) < 6){
            $new_password_err = "Password must have at least 6 characters.";
        } else {
            $new_password = trim($_POST["new_password"]);
        }
    }
    
    // Validate confirm password
    if(!empty(trim($_POST["confirm_password"]))){
        if(empty($new_password_err) && ($new_password != trim($_POST["confirm_password"]))){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    // Check input errors before updating the database
    if(empty($username_err) && empty($email_err) && empty($current_password_err) && empty($new_password_err) && empty($confirm_password_err)){
        // Verify current password
        $sql = "SELECT password FROM admin WHERE id = ?";
        if($stmt = mysqli_prepare($conn, $sql)){
            mysqli_stmt_bind_param($stmt, "i", $_SESSION["admin_id"]);
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
                if($row = mysqli_fetch_assoc($result)){
                    if(password_verify($current_password, $row["password"])){
                        // Current password is correct, proceed with update
                        if(!empty($new_password)){
                            // Update password
                            $sql = "UPDATE admin SET username = ?, email = ?, password = ? WHERE id = ?";
                            $param_password = password_hash($new_password, PASSWORD_DEFAULT);
                        } else {
                            // Don't update password
                            $sql = "UPDATE admin SET username = ?, email = ? WHERE id = ?";
                        }
                        
                        if($stmt = mysqli_prepare($conn, $sql)){
                            if(!empty($new_password)){
                                mysqli_stmt_bind_param($stmt, "sssi", $username, $email, $param_password, $_SESSION["admin_id"]);
                            } else {
                                mysqli_stmt_bind_param($stmt, "ssi", $username, $email, $_SESSION["admin_id"]);
                            }
                            
                            if(mysqli_stmt_execute($stmt)){
                                $_SESSION["admin_username"] = $username;
                                header("location: admin_settings.php?success=Settings updated successfully");
                                exit;
                            } else {
                                echo "Something went wrong. Please try again later.";
                            }
                            mysqli_stmt_close($stmt);
                        }
                    } else {
                        $current_password_err = "Current password is incorrect.";
                    }
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
            mysqli_stmt_close($stmt);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings - Admin Panel</title>
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
                            <a class="nav-link active" href="admin_settings.php">
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
                    <h2>Settings</h2>
                </div>

                <?php if(isset($_GET["success"])): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?php echo $_GET["success"]; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>

                <div class="card">
                    <div class="card-body">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" 
                                        id="username" name="username" value="<?php echo $username; ?>">
                                    <div class="invalid-feedback"><?php echo $username_err; ?></div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" 
                                        id="email" name="email" value="<?php echo $email; ?>">
                                    <div class="invalid-feedback"><?php echo $email_err; ?></div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="current_password" class="form-label">Current Password</label>
                                <input type="password" class="form-control <?php echo (!empty($current_password_err)) ? 'is-invalid' : ''; ?>" 
                                    id="current_password" name="current_password">
                                <div class="invalid-feedback"><?php echo $current_password_err; ?></div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="new_password" class="form-label">New Password</label>
                                    <input type="password" class="form-control <?php echo (!empty($new_password_err)) ? 'is-invalid' : ''; ?>" 
                                        id="new_password" name="new_password">
                                    <div class="invalid-feedback"><?php echo $new_password_err; ?></div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="confirm_password" class="form-label">Confirm New Password</label>
                                    <input type="password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" 
                                        id="confirm_password" name="confirm_password">
                                    <div class="invalid-feedback"><?php echo $confirm_password_err; ?></div>
                                </div>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">Update Settings</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html> 