<?php
session_start();

if(!isset($_SESSION["admin_loggedin"]) || $_SESSION["admin_loggedin"] !== true){
    header("location: admin_login.php");
    exit;
}

require_once "config.php";

$name = $location = $city = $price = $description = $amenities = $contact_number = $address = "";
$name_err = $location_err = $city_err = $price_err = $description_err = $amenities_err = $contact_number_err = $address_err = "";

if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    $id = trim($_GET["id"]);
    
    // Get PG details
    $sql = "SELECT * FROM accommodations WHERE id = ?";
    if($stmt = mysqli_prepare($conn, $sql)){
        mysqli_stmt_bind_param($stmt, "i", $id);
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
            if(mysqli_num_rows($result) == 1){
                $row = mysqli_fetch_array($result);
                $name = $row["name"];
                $location = $row["location"];
                $city = $row["city"];
                $price = $row["price"];
                $description = $row["description"];
                $amenities = $row["amenities"];
                $contact_number = $row["contact_number"];
                $address = $row["address"];
            } else {
                header("location: admin_manage_pgs.php");
                exit;
            }
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }
        mysqli_stmt_close($stmt);
    }
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = trim($_POST["id"]);
    
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
        $city_err = "Please enter city.";
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
    
    // Check input errors before updating in database
    if(empty($name_err) && empty($location_err) && empty($city_err) && empty($price_err) && empty($description_err) && empty($amenities_err) && empty($contact_number_err) && empty($address_err)){
        $sql = "UPDATE accommodations SET name=?, location=?, city=?, price=?, description=?, amenities=?, contact_number=?, address=? WHERE id=?";
        if($stmt = mysqli_prepare($conn, $sql)){
            mysqli_stmt_bind_param($stmt, "sssdssssi", $name, $location, $city, $price, $description, $amenities, $contact_number, $address, $id);
            if(mysqli_stmt_execute($stmt)){
                header("location: admin_manage_pgs.php?success=PG updated successfully");
                exit;
            } else {
                echo "Something went wrong. Please try again later.";
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
    <title>Edit PG - Admin Panel</title>
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
                    <h2>Edit PG</h2>
                    <a href="admin_manage_pgs.php" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Back to PGs
                    </a>
                </div>

                <div class="card">
                    <div class="card-body">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label">PG Name</label>
                                    <input type="text" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" 
                                        id="name" name="name" value="<?php echo $name; ?>">
                                    <div class="invalid-feedback"><?php echo $name_err; ?></div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="location" class="form-label">Location</label>
                                    <input type="text" class="form-control <?php echo (!empty($location_err)) ? 'is-invalid' : ''; ?>" 
                                        id="location" name="location" value="<?php echo $location; ?>">
                                    <div class="invalid-feedback"><?php echo $location_err; ?></div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="city" class="form-label">City</label>
                                    <input type="text" class="form-control <?php echo (!empty($city_err)) ? 'is-invalid' : ''; ?>" 
                                        id="city" name="city" value="<?php echo $city; ?>">
                                    <div class="invalid-feedback"><?php echo $city_err; ?></div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="price" class="form-label">Price (Rs)</label>
                                    <input type="number" class="form-control <?php echo (!empty($price_err)) ? 'is-invalid' : ''; ?>" 
                                        id="price" name="price" value="<?php echo $price; ?>">
                                    <div class="invalid-feedback"><?php echo $price_err; ?></div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control <?php echo (!empty($description_err)) ? 'is-invalid' : ''; ?>" 
                                    id="description" name="description" rows="3"><?php echo $description; ?></textarea>
                                <div class="invalid-feedback"><?php echo $description_err; ?></div>
                            </div>

                            <div class="mb-3">
                                <label for="amenities" class="form-label">Amenities (comma separated)</label>
                                <input type="text" class="form-control <?php echo (!empty($amenities_err)) ? 'is-invalid' : ''; ?>" 
                                    id="amenities" name="amenities" value="<?php echo $amenities; ?>">
                                <div class="invalid-feedback"><?php echo $amenities_err; ?></div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="contact_number" class="form-label">Contact Number</label>
                                    <input type="text" class="form-control <?php echo (!empty($contact_number_err)) ? 'is-invalid' : ''; ?>" 
                                        id="contact_number" name="contact_number" value="<?php echo $contact_number; ?>">
                                    <div class="invalid-feedback"><?php echo $contact_number_err; ?></div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" class="form-control <?php echo (!empty($address_err)) ? 'is-invalid' : ''; ?>" 
                                        id="address" name="address" value="<?php echo $address; ?>">
                                    <div class="invalid-feedback"><?php echo $address_err; ?></div>
                                </div>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">Update PG</button>
                                <a href="admin_manage_pgs.php" class="btn btn-secondary">Cancel</a>
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