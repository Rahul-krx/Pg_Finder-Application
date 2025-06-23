<?php
// एरर रिपोर्टिंग चालू करें
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
require_once "config.php";

$name = $email = $password = $confirm_password = "";
$name_err = $email_err = $password_err = $confirm_password_err = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // नाम की वैलिडेशन
        if (empty(trim($_POST["name"]))) {
            $name_err = "Please enter your name.";
        } else {
            $name = trim($_POST["name"]);
        }
        
        // ईमेल की वैलिडेशन
        if (empty(trim($_POST["email"]))) {
            $email_err = "Please enter an email.";
        } else {
            $sql = "SELECT id FROM users WHERE email = ?";
            
            if ($stmt = mysqli_prepare($conn, $sql)) {
                mysqli_stmt_bind_param($stmt, "s", $param_email);
                $param_email = trim($_POST["email"]);
                
                if (mysqli_stmt_execute($stmt)) {
                    mysqli_stmt_store_result($stmt);
                    
                    if (mysqli_stmt_num_rows($stmt) == 1) {
                        $email_err = "This email is already registered.";
                    } else {
                        $email = trim($_POST["email"]);
                    }
                } else {
                    throw new Exception("Error checking email: " . mysqli_error($conn));
                }
                mysqli_stmt_close($stmt);
            } else {
                throw new Exception("Error preparing statement: " . mysqli_error($conn));
            }
        }
        
        // पासवर्ड की वैलिडेशन
        if (empty(trim($_POST["password"]))) {
            $password_err = "Please enter a password.";     
        } elseif (strlen(trim($_POST["password"])) < 6) {
            $password_err = "Password must have at least 6 characters.";
        } else {
            $password = trim($_POST["password"]);
        }
        
        // कन्फर्म पासवर्ड की वैलिडेशन
        if (empty(trim($_POST["confirm_password"]))) {
            $confirm_password_err = "Please confirm password.";     
        } else {
            $confirm_password = trim($_POST["confirm_password"]);
            if (empty($password_err) && ($password != $confirm_password)) {
                $confirm_password_err = "Passwords did not match.";
            }
        }
        
        // डेटाबेस में डेटा इन्सर्ट करने से पहले एरर्स की जाँच
        if (empty($name_err) && empty($email_err) && empty($password_err) && empty($confirm_password_err)) {
            
            $sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
             
            if ($stmt = mysqli_prepare($conn, $sql)) {
                mysqli_stmt_bind_param($stmt, "sss", $param_name, $param_email, $param_password);
                
                $param_name = $name;
                $param_email = $email;
                $param_password = password_hash($password, PASSWORD_DEFAULT);
                
                if (mysqli_stmt_execute($stmt)) {
                    $_SESSION['success_message'] = "Registration successful! You can now login.";
                    header("location: login.php");
                    exit();
                } else {
                    throw new Exception("Error inserting data: " . mysqli_error($conn));
                }
                mysqli_stmt_close($stmt);
            } else {
                throw new Exception("Error preparing insert statement: " . mysqli_error($conn));
            }
        }
    } catch (Exception $e) {
        $error = "An error occurred: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - PG Finder</title>
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Arial', sans-serif;
    }

    body {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background-color: #f3f4f6;
        padding: 16px;
        background-image: url('https://t3.ftcdn.net/jpg/01/98/23/58/360_F_198235898_DLqECcCxh90nbw3J3RKE3h3D4EmgB3bF.jpg');

        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
    }

    .signup-container {
        width: 100%;
        max-width: 390px;
        background: #ffffff;
        border-radius: 8px;
        padding: 20px;
        text-align: center;
        border: 1px solid black;
    }

    .logo {
        font-size: 20px;
        font-weight: bold;
        color: #4a5568;
        margin-bottom: 20px;
        text-decoration: underline;
    }

    h1 {
        font-size: 18px;
        color: #4a5568;
        margin-bottom: 16px;
    }

    .form-group {
        margin-bottom: 16px;
        text-align: left;
    }

    label {
        font-size: 14px;
        color: #2d3748;
        margin-bottom: 4px;
        display: block;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"] {
        width: 100%;
        padding: 10px;
        font-size: 14px;
        border: 1px solid black;
        border-radius: 6px;
    }

    input:focus {
        border-color: #3182ce;
        outline: none;
    }

    .error-text {
        font-size: 12px;
        color: #e53e3e;
        margin-top: 4px;
    }

    .submit-btn,
    .home-btn {
        width: 100%;
        padding: 12px;
        font-size: 14px;
        font-weight: bold;
        color: white;
        background: #3182ce;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        transition: background 0.2s ease;
    }

    .submit-btn:hover,
    .home-btn:hover {
        background: #2b6cb0;
    }

    .alt-link {
        margin-top: 16px;
        font-size: 14px;
        color: #4a5568;
    }

    .alt-link a {
        color: #3182ce;
        text-decoration: none;
    }

    .alt-link a:hover {
        text-decoration: underline;
    }

    .home-btn {
        background: #4a5568;
        margin-top: 16px;
    }

    .home-btn:hover {
        background: #2d3748;
    }

    .success-message {
        background-color: #e6fffa;
        color: #2c7a7b;
        font-size: 14px;
        padding: 12px;
        border-radius: 6px;
        margin-bottom: 16px;
    }

    .error {
        color: #dc2626;
        background-color: #fee2e2;
        border: 1px solid #dc2626;
        padding: 10px;
        border-radius: 6px;
        margin-bottom: 16px;
        text-align: center;
    }
    </style>
</head>

<body>
    <div class="signup-container">
        <div class="logo">PG Finder</div>
        <h1>Sign Up</h1>

        <?php 
        if (!empty($error)) {
            echo '<div class="error">' . htmlspecialchars($error) . '</div>';
        }
        ?>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" placeholder="Enter your name"
                    value="<?php echo htmlspecialchars($name); ?>" required>
                <div class="error-text" <?php echo (!empty($name_err)) ? 'style="display:block"' : ''; ?>>
                    <?php echo htmlspecialchars($name_err); ?></div>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email"
                    value="<?php echo htmlspecialchars($email); ?>" required>
                <div class="error-text" <?php echo (!empty($email_err)) ? 'style="display:block"' : ''; ?>>
                    <?php echo htmlspecialchars($email_err); ?></div>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Create a password" required>
                <div class="error-text" <?php echo (!empty($password_err)) ? 'style="display:block"' : ''; ?>>
                    <?php echo htmlspecialchars($password_err); ?></div>
            </div>

            <div class="form-group">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm your password"
                    required>
                <div class="error-text" <?php echo (!empty($confirm_password_err)) ? 'style="display:block"' : ''; ?>>
                    <?php echo htmlspecialchars($confirm_password_err); ?></div>
            </div>

            <button type="submit" class="submit-btn">Sign Up</button>
        </form>

        <div class="alt-link">
            Already have an account? <a href="login.php">Log in</a>
        </div>

        <button onclick="window.location.href='index.php'" class="home-btn">Back to Home</button>
    </div>

</body>

</html>