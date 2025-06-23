<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();


if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: index.php");
    exit;
}

require_once "config.php";

$email = $password = "";
$email_err = $password_err = $login_err = "";
$success_message = "";

// Check if success message exists in session
if(isset($_SESSION['success_message'])) {
    $success_message = $_SESSION['success_message'];
    unset($_SESSION['success_message']); // Clear the message after displaying
}

// फॉर्म डेटा प्रोसेस करें
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    // ईमेल की जाँच
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter email.";
    } else{
        $email = trim($_POST["email"]);
    }
    
    // पासवर्ड की जाँच
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // वैलिडेशन
    if(empty($email_err) && empty($password_err)){
        $sql = "SELECT id, name, email, password FROM users WHERE email = ?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            $param_email = $email;
            
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    mysqli_stmt_bind_result($stmt, $id, $name, $email, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // पासवर्ड सही है, सेशन शुरू करें
                            session_start();
                            
                            // सेशन वेरिएबल्स सेट करें
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["name"] = $name;
                            $_SESSION["email"] = $email;
                            
                            // डैशबोर्ड पर रीडायरेक्ट करें
                            header("location: dashboard.php");
                            exit();
                        } else{
                            $login_err = "Invalid email or password.";
                        }
                    }
                } else{
                    $login_err = "Invalid email or password.";
                }
            } else{
                $login_err = "Oops! Something went wrong. Please try again later.";
            }

            mysqli_stmt_close($stmt);
        }
    }
    
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - PG Finder</title>
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

    .login-container {
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
        background-color: #dcfce7;
        color: #166534;
        padding: 12px;
        border-radius: 6px;
        margin-bottom: 16px;
        text-align: center;
        border: 1px solid #166534;
    }

    .error-message {
        background-color: #fee2e2;
        color: #dc2626;
        padding: 12px;
        border-radius: 6px;
        margin-bottom: 16px;
        text-align: center;
        border: 1px solid #dc2626;
    }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="logo">PG Finder</div>
        <h1>Login</h1>

        <?php if(!empty($success_message)): ?>
        <div class="success-message">
            <?php echo htmlspecialchars($success_message); ?>
        </div>
        <?php endif; ?>

        <?php if(!empty($login_err)): ?>
        <div class="error-message">
            <?php echo htmlspecialchars($login_err); ?>
        </div>
        <?php endif; ?>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email"
                    value="<?php echo htmlspecialchars($email); ?>" required>
                <?php if(!empty($email_err)): ?>
                <div class="error-text"><?php echo htmlspecialchars($email_err); ?></div>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
                <?php if(!empty($password_err)): ?>
                <div class="error-text"><?php echo htmlspecialchars($password_err); ?></div>
                <?php endif; ?>
            </div>

            <button type="submit" class="submit-btn">Login</button>
        </form>

        <div class="alt-link">
            Don't have an account? <a href="signup.php">Sign up</a>
        </div>

        <button onclick="window.location.href='index.php'" class="home-btn">Back to Home</button>
    </div>
</body>

</html>