<!-- <?php
// require_once "config.php";

// $sql = "CREATE TABLE IF NOT EXISTS admin (
//     id INT AUTO_INCREMENT PRIMARY KEY,
//     username VARCHAR(50) NOT NULL UNIQUE,
//     password VARCHAR(255) NOT NULL,
//     email VARCHAR(100) NOT NULL UNIQUE,
//     created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
// )";

// if(mysqli_query($conn, $sql)) {
//     // Check if admin exists, if not create default admin
//     $check_admin = "SELECT id FROM admin WHERE username = 'admin'";
//     $result = mysqli_query($conn, $check_admin);
    
//     if(mysqli_num_rows($result) == 0) {
//         $default_password = password_hash('admin123', PASSWORD_DEFAULT);
//         $insert_admin = "INSERT INTO admin (username, password, email) VALUES ('admin', '$default_password', 'admin@pgfinder.com')";
//         mysqli_query($conn, $insert_admin);
//         echo "Admin table created and default admin account added!<br>";
//         echo "Default credentials:<br>";
//         echo "Username: admin<br>";
//         echo "Password: admin123<br>";
//         echo "Please change these credentials after first login.";
//     } else {
//         echo "Admin table already exists.";
//     }
// } else {
//     echo "Error creating table: " . mysqli_error($conn);
// }

// mysqli_close($conn);
// ?>  -->