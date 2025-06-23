<?php
session_start();


if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

require_once "config.php";


$check_column = "SHOW COLUMNS FROM users LIKE 'profile_photo'";
$result = mysqli_query($conn, $check_column);
if(mysqli_num_rows($result) == 0) {
    // Add the column if it doesn't exist
    $add_column = "ALTER TABLE users ADD COLUMN profile_photo VARCHAR(255) DEFAULT NULL";
    if(!mysqli_query($conn, $add_column)) {
        die("Error adding profile_photo column: " . mysqli_error($conn));
    }
}

$name = $email = "";
$name_err = $email_err = $password_err = "";
$success_msg = $error_msg = "";

// अगर फॉर्म सबमिट हुआ है
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    // Handle profile photo upload
    if(isset($_FILES["profile_photo"]) && $_FILES["profile_photo"]["error"] == 0) {
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename = $_FILES["profile_photo"]["name"];
        $filetype = $_FILES["profile_photo"]["type"];
        $filesize = $_FILES["profile_photo"]["size"];
        
        error_log("Processing file upload: " . $filename);
        
        // Verify file extension
        $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        if(!array_key_exists($ext, $allowed)) {
            $error_msg = "Error: Please select a valid file format (JPG, JPEG, PNG, GIF).";
            error_log("Invalid file extension: " . $ext);
        } else {
            // Verify file size - 5MB maximum
            $maxsize = 5 * 1024 * 1024;
            if($filesize > $maxsize) {
                $error_msg = "Error: File size is larger than the allowed limit (5MB).";
                error_log("File too large: " . $filesize);
            } else {
                // Create upload directory if it doesn't exist
                $upload_dir = "profile_photos";
                if (!file_exists($upload_dir)) {
                    mkdir($upload_dir, 0777, true);
                    error_log("Created directory: " . $upload_dir);
                }

                // Generate unique filename
                $new_filename = uniqid() . '.' . $ext;
                $upload_path = $upload_dir . '/' . $new_filename;
                
                error_log("Attempting to upload to: " . $upload_path);
                
                if(move_uploaded_file($_FILES["profile_photo"]["tmp_name"], $upload_path)) {
                    error_log("File uploaded successfully to: " . $upload_path);
                    
                    // Update database with new photo path
                    $sql = "UPDATE users SET profile_photo = ? WHERE id = ?";
                    if($stmt = mysqli_prepare($conn, $sql)) {
                        mysqli_stmt_bind_param($stmt, "si", $upload_path, $_SESSION["id"]);
                        if(mysqli_stmt_execute($stmt)) {
                            $_SESSION["profile_photo"] = $upload_path;
                            $success_msg = "Profile photo updated successfully!";
                            error_log("Database updated with path: " . $upload_path);
                            
                            // Redirect to refresh the page
                            header("Location: " . $_SERVER['PHP_SELF']);
                            exit;
                        } else {
                            $error_msg = "Error updating database: " . mysqli_error($conn);
                            error_log("Database error: " . mysqli_error($conn));
                        }
                        mysqli_stmt_close($stmt);
                    }
                } else {
                    $error_msg = "Error uploading file. Please try again.";
                    error_log("Upload failed. Error code: " . $_FILES["profile_photo"]["error"]);
                }
            }
        }
    }
    
    // वैलिडेट नाम
    if(!isset($_POST["name"]) || empty(trim($_POST["name"]))){
        $name_err = "Please enter your name.";
    } else {
        $name = trim($_POST["name"]);
    }
    
    // वैलिडेट ईमेल
    if(!isset($_POST["email"]) || empty(trim($_POST["email"]))){
        $email_err = "Please enter your email.";
    } else {
        // चेक करें कि नया ईमेल पहले से मौजूद तो नहीं है
        $sql = "SELECT id FROM users WHERE email = ? AND id != ?";
        if($stmt = mysqli_prepare($conn, $sql)){
            mysqli_stmt_bind_param($stmt, "si", $param_email, $_SESSION["id"]);
            $param_email = trim($_POST["email"]);
            
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $email_err = "This email is already taken.";
                } else {
                    $email = trim($_POST["email"]);
                }
            } else {
                $error_msg = "Oops! Something went wrong. Please try again later.";
            }
            mysqli_stmt_close($stmt);
        }
    }
    
    // वैलिडेट पासवर्ड
    if(isset($_POST["new_password"]) && !empty(trim($_POST["new_password"]))){
        if(strlen(trim($_POST["new_password"])) < 6){
            $password_err = "Password must have at least 6 characters.";
        } else {
            $new_password = trim($_POST["new_password"]);
        }
    }
    
    // अगर कोई एरर नहीं है तो डेटा अपडेट करें
    if(empty($name_err) && empty($email_err) && empty($password_err)){
        if(!empty($new_password)){
            $sql = "UPDATE users SET name=?, email=?, password=? WHERE id=?";
            $stmt = mysqli_prepare($conn, $sql);
            $param_password = password_hash($new_password, PASSWORD_DEFAULT);
            mysqli_stmt_bind_param($stmt, "sssi", $name, $email, $param_password, $_SESSION["id"]);
        } else {
            $sql = "UPDATE users SET name=?, email=? WHERE id=?";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "ssi", $name, $email, $_SESSION["id"]);
        }
        
        if(mysqli_stmt_execute($stmt)){
            $_SESSION["name"] = $name;
            $_SESSION["email"] = $email;
            $success_msg = "Profile updated successfully!";
        } else {
            $error_msg = "Something went wrong. Please try again later.";
        }
        mysqli_stmt_close($stmt);
    }
}

// यूजर का वर्तमान डेटा लें
$sql = "SELECT name, email, profile_photo FROM users WHERE id = ?";
if($stmt = mysqli_prepare($conn, $sql)){
    mysqli_stmt_bind_param($stmt, "i", $_SESSION["id"]);
    if(mysqli_stmt_execute($stmt)){
        $result = mysqli_stmt_get_result($stmt);
        if($row = mysqli_fetch_array($result)){
            $name = $row["name"];
            $email = $row["email"];
            $profile_photo = $row["profile_photo"];
            
            error_log("Current user data - Name: $name, Email: $email, Photo: $profile_photo");
            
            // Convert relative path to absolute URL
            if(!empty($profile_photo)) {
                $profile_photo = '/' . ltrim($profile_photo, '/');
            }
            
            // Debug information
            echo "<!-- Debug Info:";
            echo "\nProfile Photo Path: " . $profile_photo;
            echo "\nAbsolute Path: " . $_SERVER['DOCUMENT_ROOT'] . $profile_photo;
            echo "\nFile Exists: " . (file_exists($_SERVER['DOCUMENT_ROOT'] . $profile_photo) ? 'Yes' : 'No');
            echo "\nSession ID: " . $_SESSION["id"];
            echo "\nRow Data: " . print_r($row, true);
            echo "\n-->";
        }
    }
    mysqli_stmt_close($stmt);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - PG Finder</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .profile-section {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            padding: 2rem;
            margin-top: 2rem;
        }
        .profile-header {
            text-align: center;
            margin-bottom: 2rem;
        }
        .profile-avatar {
            width: 120px;
            height: 120px;
            border-radius: 60px;
            background-color: #3182ce;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            margin: 0 auto 1rem;
            overflow: hidden;
        }
        .profile-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .success-message {
            background-color: #dcfce7;
            color: #166534;
            padding: 1rem;
            border-radius: 6px;
            margin-bottom: 1rem;
        }
        .error-message {
            background-color: #fee2e2;
            color: #dc2626;
            padding: 1rem;
            border-radius: 6px;
            margin-bottom: 1rem;
        }
        .file-upload {
            position: relative;
            display: inline-block;
        }
        .file-upload input[type="file"] {
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
            width: 100%;
            height: 100%;
            cursor: pointer;
        }
    </style>
</head>
<body class="bg-light">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="https://upload.wikimedia.org/wikipedia/commons/b/bf/IFCO_PG_%28Cinema%29.png" height="40">
                <span class="fw-bold">PG Finder</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="profile-section">
                    <div class="profile-header">
                        <div class="profile-avatar mb-3">
                            <?php 
                            $photo_path = !empty($profile_photo) ? $profile_photo : '';
                            if(!empty($photo_path) && file_exists($_SERVER['DOCUMENT_ROOT'] . '/PG_Finder/' . $photo_path)): 
                            ?>
                                <img src="/PG_Finder/<?php echo htmlspecialchars($photo_path); ?>" alt="Profile Photo" style="width: 100%; height: 100%; object-fit: cover;">
                            <?php else: ?>
                                <i class="fas fa-user"></i>
                            <?php endif; ?>
                        </div>

                        <!-- Separate form for photo upload -->
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data" class="mb-4">
                            <div class="d-flex justify-content-center">
                                <div class="file-upload">
                                    <input type="file" name="profile_photo" id="profile_photo" class="d-none" accept="image/*" onchange="this.form.submit()">
                                    <label for="profile_photo" class="btn btn-outline-primary">
                                        <i class="fas fa-camera"></i> Change Profile Photo
                                    </label>
                                </div>
                            </div>
                        </form>

                        <h2 class="mb-0"><?php echo htmlspecialchars($name); ?></h2>
                        <p class="text-muted"><?php echo htmlspecialchars($email); ?></p>
                    </div>

                    <?php if(!empty($success_msg)): ?>
                        <div class="success-message"><?php echo $success_msg; ?></div>
                    <?php endif; ?>

                    <?php if(!empty($error_msg)): ?>
                        <div class="error-message"><?php echo $error_msg; ?></div>
                    <?php endif; ?>

                    <!-- Separate form for profile information -->
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" 
                                id="name" name="name" value="<?php echo htmlspecialchars($name); ?>">
                            <div class="invalid-feedback"><?php echo $name_err; ?></div>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" 
                                id="email" name="email" value="<?php echo htmlspecialchars($email); ?>">
                            <div class="invalid-feedback"><?php echo $email_err; ?></div>
                        </div>

                        <div class="mb-3">
                            <label for="new_password" class="form-label">New Password (leave blank to keep current)</label>
                            <input type="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" 
                                id="new_password" name="new_password">
                            <div class="invalid-feedback"><?php echo $password_err; ?></div>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Update Profile</button>
                            <a href="index.php" class="btn btn-secondary">Back to Home</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html> 