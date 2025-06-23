<?php
session_start();

if(!isset($_SESSION["admin_loggedin"]) || $_SESSION["admin_loggedin"] !== true){
    header("location: admin_login.php");
    exit;
}

require_once "config.php";

// Handle PG deletion
if(isset($_GET["delete"]) && !empty($_GET["delete"])){
    $sql = "DELETE FROM accommodations WHERE id = ?";
    if($stmt = mysqli_prepare($conn, $sql)){
        mysqli_stmt_bind_param($stmt, "i", $_GET["delete"]);
        if(mysqli_stmt_execute($stmt)){
            header("location: admin_manage_pgs.php?success=PG deleted successfully");
            exit;
        }
    }
}

// Get all PGs
$pgs = [];
$sql = "SELECT * FROM accommodations ORDER BY created_at DESC";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)) {
    $pgs[] = $row;
}

// Initialize variables
$name = $location = $city = $price = $description = $amenities = $contact_number = $address = $image = "";
$name_err = $location_err = $city_err = $price_err = $description_err = $amenities_err = $contact_number_err = $address_err = $image_err = "";
$success_msg = $error_msg = "";

// Handle form submission
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    if(empty(trim($_POST["name"]))){
        $name_err = "Please enter PG name.";
    } else {
        $name = trim($_POST["name"]);
    }
    
    // Validate location
    if(empty(trim($_POST["location"]))){
        $location_err = "Please enter location.";
    } else {
        $location = trim($_POST["location"]);
    }
    
    // Validate city
    if(empty(trim($_POST["city"]))){
        $city_err = "Please select city.";
    } else {
        $city = trim($_POST["city"]);
    }
    
    // Validate price
    if(empty(trim($_POST["price"]))){
        $price_err = "Please enter price.";
    } else {
        $price = trim($_POST["price"]);
    }
    
    // Validate description
    if(empty(trim($_POST["description"]))){
        $description_err = "Please enter description.";
    } else {
        $description = trim($_POST["description"]);
    }
    
    // Validate amenities
    if(empty(trim($_POST["amenities"]))){
        $amenities_err = "Please enter amenities.";
    } else {
        $amenities = trim($_POST["amenities"]);
    }
    
    // Validate contact number
    if(empty(trim($_POST["contact_number"]))){
        $contact_number_err = "Please enter contact number.";
    } else {
        $contact_number = trim($_POST["contact_number"]);
    }
    
    // Validate address
    if(empty(trim($_POST["address"]))){
        $address_err = "Please enter address.";
    } else {
        $address = trim($_POST["address"]);
    }

    // Handle image upload
    if(isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename = $_FILES["image"]["name"];
        $filetype = $_FILES["image"]["type"];
        $filesize = $_FILES["image"]["size"];
    
        // Verify file extension
        $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        if(!array_key_exists($ext, $allowed)) {
            $image_err = "Error: Please select a valid file format (JPG, JPEG, PNG, GIF).";
        } else {
            // Verify file size - 5MB maximum
            $maxsize = 5 * 1024 * 1024;
            if($filesize > $maxsize) {
                $image_err = "Error: File size is larger than the allowed limit (5MB).";
            } else {
                // Create upload directory if it doesn't exist
                $upload_dir = "pg_images";
                if (!file_exists($upload_dir)) {
                    mkdir($upload_dir, 0777, true);
                }

                // Generate unique filename
                $new_filename = uniqid() . '.' . $ext;
                $upload_path = $upload_dir . '/' . $new_filename;
                
                if(move_uploaded_file($_FILES["image"]["tmp_name"], $upload_path)) {
                    $image = $upload_path;
                } else {
                    $image_err = "Error uploading file. Please try again.";
                }
            }
        }
    } else {
        $image_err = "Please select an image.";
    }
    
    // Check input errors before inserting in database
    if(empty($name_err) && empty($location_err) && empty($city_err) && empty($price_err) && 
       empty($description_err) && empty($amenities_err) && empty($contact_number_err) && 
       empty($address_err) && empty($image_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO accommodations (name, location, city, price, description, amenities, contact_number, address, image, rating, gender, interested) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($conn, $sql)){
            // Set default values for rating, gender, and interested
            $rating = 0;
            $gender = 'both';
            $interested = 0;
            
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssdssssssss", $name, $location, $city, $price, $description, $amenities, $contact_number, $address, $image, $rating, $gender, $interested);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $success_msg = "PG added successfully!";
            } else {
                $error_msg = "Something went wrong. Please try again later.";
            }

            // Close statement
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
    <title>Manage PGs - Admin Panel</title>
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
                            <a class="nav-link active" href="admin_manage_pgs.php">
                                <i class="fas fa-building"></i> Manage PGs
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="admin_manage_users.php">
                                <i class="fas fa-users"></i> Manage Users
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
                    <h2>Manage PGs</h2>
                    <a href="admin_add_pg.php" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Add New PG
                    </a>
                </div>

                <?php if(isset($_GET["success"])): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?php echo $_GET["success"]; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>

                <?php if(!empty($success_msg)): ?>
                    <div class="alert alert-success"><?php echo $success_msg; ?></div>
                <?php endif; ?>
                
                <?php if(!empty($error_msg)): ?>
                    <div class="alert alert-danger"><?php echo $error_msg; ?></div>
                <?php endif; ?>

                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>City</th>
                                        <th>Location</th>
                                        <th>Price</th>
                                        <th>Added On</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($pgs as $pg): ?>
                                    <tr>
                                        <td><?php echo $pg['id']; ?></td>
                                        <td><?php echo htmlspecialchars($pg['name']); ?></td>
                                        <td><?php echo htmlspecialchars($pg['city']); ?></td>
                                        <td><?php echo htmlspecialchars($pg['location']); ?></td>
                                        <td>Rs <?php echo number_format($pg['price']); ?></td>
                                        <td><?php echo date('M d, Y', strtotime($pg['created_at'])); ?></td>
                                        <td class="action-buttons">
                                            <a href="admin_edit_pg.php?id=<?php echo $pg['id']; ?>" class="btn btn-sm btn-primary">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <a href="admin_manage_pgs.php?delete=<?php echo $pg['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this PG?')">
                                                <i class="fas fa-trash"></i> Delete
                                            </a>
                                        </td>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html> 