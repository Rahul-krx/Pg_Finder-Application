<?php
session_start();
// Initialize variables to store form data and errors
$formData = [
    'name' => '',
    'mobile' => '',
    'city' => '',
    'category' => '',
    'call_time' => '',
    'pg_address' => ''
];
$errors = [];
$formSubmitted = false;
$submissionError = false;

// Check if we're returning from a successful submission
if (isset($_GET['submitted']) && $_GET['submitted'] === 'true') {
    $formSubmitted = true;
    // Store submission status in session
    $_SESSION['form_submitted'] = true;
} elseif (isset($_SESSION['form_submitted']) && $_SESSION['form_submitted']) {
    // Coming back after submission (e.g., via back button)
    $formSubmitted = true;
    // Clear the session flag after displaying the success message once
    unset($_SESSION['form_submitted']);
}

// Form processing
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate name
    if (empty($_POST['name'])) {
        $errors['name'] = "Name is required";
    } else {
        $formData['name'] = htmlspecialchars($_POST['name']);
    }
    
    // Validate mobile
    if (empty($_POST['mobile'])) {
        $errors['mobile'] = "Mobile number is required";
    } else {
        $formData['mobile'] = htmlspecialchars($_POST['mobile']);
    }
    
    // Validate city
    if (empty($_POST['city'])) {
        $errors['city'] = "City is required";
    } else {
        $formData['city'] = htmlspecialchars($_POST['city']);
    }
    
    // Validate category
    if (empty($_POST['category']) || $_POST['category'] === '---Select Category---') {
        $errors['category'] = "Please select a category";
    } else {
        $formData['category'] = htmlspecialchars($_POST['category']);
    }
    
    // Validate call time
    if (empty($_POST['call_time']) || $_POST['call_time'] === '---Select Time---') {
        $errors['call_time'] = "Please select a call time";
    } else {
        $formData['call_time'] = htmlspecialchars($_POST['call_time']);
    }
    
    // Validate PG address
    if (empty($_POST['pg_address'])) {
        $errors['pg_address'] = "PG address is required";
    } else {
        $formData['pg_address'] = htmlspecialchars($_POST['pg_address']);
    }
    
    // If no errors, process form
    if (empty($errors)) {
        $formSubmitted = true;
        
        // Store submission status in session
        $_SESSION['form_submitted'] = true;
        
        // Redirect to prevent form resubmission on refresh
        header("Location: " . htmlspecialchars($_SERVER["PHP_SELF"]) . "?submitted=true");
        exit;
    }
}

// Categories for dropdown
$categories = [
    "Software Companies",
    "PG Owners",
    "Property Owners",
    "Investors"
];

// Time slots for dropdown
$timeSlots = [
    "9:00 AM - 11:00 AM",
    "11:00 AM - 1:00 PM",
    "2:00 PM - 4:00 PM",
    "4:00 PM - 6:00 PM"
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Partner with Us - PG Finder</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        .bread{
            box-shadow: 2px 2px 5px rgba(44, 43, 43, 0.1);
        }

        .breadcrumb {
            display: flex;
            margin-bottom: 30px;
        }
        .breadcrumb a {
            text-decoration: none;
            color: #0078d4;
        }
        .breadcrumb span {
            margin: 0 10px;
        }
        .page-title {
            color: #0078d4;
            border-bottom: 2px solid #0078d4;
            padding-bottom: 10px;
            margin-bottom: 30px;
        }
        .partner-info {
            margin-bottom: 30px;
        }
        .partner-options {
            margin-bottom: 30px;
        }
        .partner-option {
            margin-bottom: 15px;
        }
        .form-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
        .form-column {
            flex: 1;
            min-width: 300px;
            padding-right: 20px;
        }
        .image-column {
            flex: 1;
            min-width: 300px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #0078d4;
        }
        .form-group input, .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .form-group input::placeholder {
            color: #f55;
        }
        .submit-btn {
            background-color: #0078d4;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }
        .submit-btn:hover {
            background-color: #005fa3;
        }
        .error {
            color: #f55;
            font-size: 0.9em;
            margin-top: 5px;
        }
        .success-message {
            background-color: #dff2bf;
            color: #4f8a10;
            padding: 15px;
            border-radius: 4px;
            margin-bottom: 20px;
            position: relative;
        }
        .error-message {
            background-color: #ffbaba;
            color: #d8000c;
            padding: 15px;
            border-radius: 4px;
            margin-bottom: 20px;
        }
        .back-btn {
            background-color: #6c757d;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
            display: inline-block;
            text-decoration: none;
        }
        .back-btn:hover {
            background-color: #5a6268;
        }

        .navbar-container {
            width: 120%;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 15px;
        }
        .logo-container {
            display: flex;
            align-items: center;
        }
        .logo-img {
            width: 40px;
            height: 40px;
            background-color: #198754;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            font-weight: bold;
            margin-right: 5px;
        }
        .logo-text {
            font-size: 20px;
            font-weight: bold;
            color: #333;
        }
        .nav-links {
            display: flex;
            align-items: center;
        }
        .nav-links a {
            text-decoration: none;
            color: #333;
            margin-left: 20px;
        }
    </style>
</head>
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<body>

<div class="navbar w-full bg-white">
    <div class="navbar-container flex justify-between items-center">
        <div class="logo-container flex items-center">
            <div class="logo-img bg-green-600 text-white rounded-full w-10 h-10 flex justify-center items-center text-lg font-bold">PG</div>
            <span class="logo-text text-xl font-semibold text-gray-800 ml-2">PG Finder</span>
        </div>
        <div class="nav-links flex items-center space-x-4">
            <?php if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true): ?>
                <a href="dashboard.php" class="text-green-600 font-medium flex items-center">
                    <i class="fas fa-user mr-1"></i> Welcome, <?php echo htmlspecialchars($_SESSION["name"]); ?>
                </a>
                <span class="text-gray-400">|</span>
                <a href="logout.php" class="text-green-600 font-medium flex items-center">
                    <i class="fas fa-sign-out-alt mr-1"></i> Logout
                </a>
            <?php else: ?>
                <a href="signup.php" class="text-green-600 font-medium flex items-center">
                    <i class="fas fa-user mr-1"></i> Signup
                </a>
                <span class="text-gray-400">|</span>
                <a href="login.php" class="text-green-600 font-medium flex items-center">
                    <i class="fas fa-sign-in-alt mr-1"></i> Login
                </a>
            <?php endif; ?>
        </div>
    </div>
    
</div>

<!-- Secondary Navigation / Breadcrumb -->
<div style="width: 121%; background-color: #f5f5f5; padding: 10px 0; margin-top: 18px; margin-bottom: 26px;" class="bread">
    <div style="display: flex; justify-content: start; align-items: center; width: 100%; max-width: 100%; padding: 0 15px;">
        <a href="index.php" style="text-decoration: none; color: #00b3b3; font-size:16px; ">Home</a>
        <span style="margin: 0 5px; color: #555;">/</span>
        <a style="text-decoration: none; color: black; cursor:text; font-size: 16px;">Partner us</a>
    </div>
</div>

    <h1 class="page-title font-bold">PARTNER WITH US</h1>
    
    <?php if ($formSubmitted): ?>
        <div class="success-message">
            Thank you for your interest in partnering with us! We will contact you shortly.
            <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="back-btn" id="newFormBtn">
                <i class="fas fa-arrow-left mr-1"></i> Submit Another Request
            </a>
        </div>
    <?php endif; ?>

    <?php if ($submissionError): ?>
        <div class="error-message">
            Sorry, there was an error processing your submission. Please try again later.
        </div>
    <?php endif; ?>

    <div class="partner-info">
        <p class="px-5">If you are in Similar Business and Interested in Partnering with us for selling any of your Product or Services. Which are Interest with our Clients. Please let us know. We are happy to help you.</p>
    </div>

    <div class="partner-options px-5">
        <div class="partner-option">Software Companies – Who have any Customized Software for Selling to PG Management</div>
        <div class="partner-option">PG Owners – Wanted to List your PG in our Website for Marketing</div>
        <div class="partner-option">Property Owners – Who are Interested in Converting your Property to PG</div>
        <div class="partner-option">Investors - Who wanted to Invest in our Business as a Business Partners.</div>
    </div>

    <?php if (!$formSubmitted): ?>
    <div class="form-container px-5">
        <div class="form-column">
            <!-- Form with Web3Forms Integration -->
            <form action="https://api.web3forms.com/submit" method="POST" id="partnerForm">
                <!-- Web3Forms Access Key (Required) -->
                <input type="hidden" name="access_key" value="2830fc66-91c5-45f0-937e-d147088a2d34">
                
                <!-- Optional: Redirect URL after submission -->
                <input type="hidden" name="redirect" value="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?submitted=true">
                
                <!-- Subject Field for Email -->
                <input type="hidden" name="subject" value="New Partner Request from PG Finder Website">
                
                <!-- Form Fields -->
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" value="<?php echo $formData['name']; ?>" required>
                    <?php if (isset($errors['name'])): ?>
                        <div class="error"><?php echo $errors['name']; ?></div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="mobile">Mobile</label>
                    <input type="text" id="mobile" name="mobile" value="<?php echo $formData['mobile']; ?>" required>
                    <?php if (isset($errors['mobile'])): ?>
                        <div class="error"><?php echo $errors['mobile']; ?></div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="city">City</label>
                    <input type="text" id="city" name="city" value="<?php echo $formData['city']; ?>" required>
                    <?php if (isset($errors['city'])): ?>
                        <div class="error"><?php echo $errors['city']; ?></div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="category">Category</label>
                    <select id="category" name="category">
                        <option value="---Select Category---">---Select Category---</option>
                        <?php foreach ($categories as $category): ?>
                            <option value="<?php echo $category; ?>" <?php echo ($formData['category'] === $category) ? 'selected' : ''; ?>>
                                <?php echo $category; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <?php if (isset($errors['category'])): ?>
                        <div class="error"><?php echo $errors['category']; ?></div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="call_time">Perfect time to call</label>
                    <select id="call_time" name="call_time">
                        <option value="---Select Time---">---Select Time---</option>
                        <?php foreach ($timeSlots as $timeSlot): ?>
                            <option value="<?php echo $timeSlot; ?>" <?php echo ($formData['call_time'] === $timeSlot) ? 'selected' : ''; ?>>
                                <?php echo $timeSlot; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <?php if (isset($errors['call_time'])): ?>
                        <div class="error"><?php echo $errors['call_time']; ?></div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="pg_address">PG Address</label>
                    <input type="text" id="pg_address" name="pg_address" value="<?php echo $formData['pg_address']; ?>" required>
                    <?php if (isset($errors['pg_address'])): ?>
                        <div class="error"><?php echo $errors['pg_address']; ?></div>
                    <?php endif; ?>
                </div>
                
                <!-- Honeypot field to prevent spam -->
                <input type="checkbox" name="botcheck" class="hidden" style="display: none;">

                <button type="submit" class="submit-btn">Submit</button>
            </form>
        </div>
        
        <div class="image-column">
            <img src="https://lh5.googleusercontent.com/Gym44Smh2Fi669F1YQLcvDcphw3-yvbAuhf4CT8tf3iz_lgX9RPtytVZQLzQe_6DWmlu6OUmjpMIqKtKZd1MvPBbX5aw-9YzwpNn4KIfhsRhqDmLs65cVtD8PNbr3il29PeHDIFXVvJIQogeZJyf594" alt="Partnership Illustration" style="max-width: 130%; height: auto;">
        </div>
    </div>
    <?php else: ?>
        <div class="px-5">
            <div class="image-column mx-auto">
                <img src="https://lh5.googleusercontent.com/Gym44Smh2Fi669F1YQLcvDcphw3-yvbAuhf4CT8tf3iz_lgX9RPtytVZQLzQe_6DWmlu6OUmjpMIqKtKZd1MvPBbX5aw-9YzwpNn4KIfhsRhqDmLs65cVtD8PNbr3il29PeHDIFXVvJIQogeZJyf594" alt="Partnership Illustration" style="max-width: 100%; height: auto;">
            </div>
        </div>
    <?php endif; ?>

    <footer style="width:121%;" class="bg-gray-800 text-white py-5 mt-5">
    <div class="container mx-auto mb-0 ">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- About Section -->
            <div>
                <h5 class="text-lg font-bold mb-3">PG Finder</h5>
                <p>
                    Find your perfect PG near LPU with ease and convenience. Explore verified listings and enjoy a seamless experience.
                </p>
            </div>

            <!-- Contact Section -->
            <div>
                <h5 class="text-lg font-bold mb-3">Contact Us</h5>
                <ul class="space-y-2">
                    <li>
                        <i class="fas fa-envelope mr-2"></i>
                        <a href="mailto:info@pgfinder.com" class="text-white hover:underline">info@pgfinder.com</a>
                    </li>
                    <li>
                        <i class="fas fa-phone mr-2"></i>
                        <a href="tel:+911234567890" class="text-white hover:underline">+91 1234567890</a>
                    </li>
                </ul>
            </div>

            <!-- Quick Links Section -->
            <div>
                <h5 class="text-lg font-bold mb-3">Quick Links</h5>
                <ul class="space-y-2">
                    <li><a href="index.php" class="text-white hover:underline"><i class="fas fa-home mr-2"></i>Home</a></li>
                    <li><a href="complaint.php" class="text-white hover:underline"><i class="fas fa-exclamation-circle mr-2"></i>Raise a Complaint</a></li>
                    <li><a href="about.php" class="text-white hover:underline"><i class="fas fa-info-circle mr-2"></i>About Us</a></li>
                </ul>
            </div>
        </div>

        <hr class="my-4 border-gray-600">

        <div class="text-center text-sm ">
            &copy; <?php echo date('Y'); ?> PG Finder. All Rights Reserved.
        </div>
    </div>
</footer>

<!-- JavaScript to handle back button and form submission -->
<script>
    window.onload = function() {
        // Check URL parameters for submission status
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.get('submitted') === 'true') {
            // We arrived here after a successful form submission
            document.querySelector('.success-message')?.scrollIntoView({ behavior: 'smooth' });
        }
        
        // Clear form data in browser's memory when back button is pressed
        if (window.performance && window.performance.navigation.type === window.performance.navigation.TYPE_BACK_FORWARD) {
            // User navigated back to this page
            if (document.getElementById('partnerForm')) {
                document.getElementById('partnerForm').reset();
            }
            // Remove URL parameters if any
            if (window.location.search) {
                window.history.replaceState({}, document.title, window.location.pathname);
            }
        }
        
        // Handle browser cache for back button
        window.addEventListener('pageshow', function(event) {
            if (event.persisted || (window.performance && window.performance.navigation.type === 2)) {
                // Page was restored from cache (back/forward button)
                window.location.reload();
            }
        });
    }
</script>

</body>
</html>