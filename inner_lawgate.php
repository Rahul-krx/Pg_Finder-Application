<?php
session_start();
require_once "config.php";

// Default PGs for Law Gate
$accommodations = [
    [
        'id' => 1,
        'name' => 'Brothers PG',
        'address' => '7M4W+7HF, Law Gate Rd, Punjab 144411',
        'rating' => 4.5,
        'price' => 5000,
        'gender' => 'male',
        'interested' => 38,
        'Availability' => 'Available',
        'image' => 'https://housing-images.n7net.in/01c16c28/4d2cc7877c9572ddb526ba5808710216/v0/medium/3_rk_-for-rent-sector_45-Gurgaon-single_room.jpg'
    ],
    [
        'id' => 2,
        'name' => 'AANAND PG',
        'address' => '475, near LPU LAW GATE MEHARU, Phagwara, Punjab',
        'rating' => 3.5,
        'price' => 6000,
        'gender' => 'both',
        'interested' => 16,
        'Availability' => 'Available',
        'image' => 'https://lh3.googleusercontent.com/p/AF1QipM2xW7j03NQt-6hI5KG8wOabdCX2DrV0r8121zd=s1360-w1360-h1020'
    ],
    [
        'id' => 3,
        'name' => 'Campus PG',
        'address' => 'Law Gate, Maheru, near Lovely Professional University, Phagwara',
        'rating' => 4.5,
        'price' => 5500,
        'gender' => 'male',
        'interested' => 11,
        'Availability' => 'Available',
        'image' => 'https://lh3.googleusercontent.com/p/AF1QipNNkX4ujXNK0rMOjkTA87U2FwR29KBRqso0WRcf=s1360-w1360-h1020'
    ],
    [
        'id' => 4,
        'name' => 'Shree Balaji Haveli',
        'address' => '7M3W+XJ2, Law Gate Rd, Punjab',
        'rating' => 3.8,
        'price' => 5500,
        'gender' => 'male',
        'interested' => 4,
        'Availability' => 'Available',
        'image' => 'https://lh3.googleusercontent.com/p/AF1QipO7IIqnz_vi_5m1-lhXimDgrasY3DqZYKylK0kP=s1360-w1360-h1020'
    ],
    [
        'id' => 5,
        'name' => 'Centra Green PG',
        'address' => 'Maheru, Auto Stand, Law Gate Rd, At, Phagwara',
        'rating' => 4.5,
        'price' => 4500,
        'gender' => 'male',
        'interested' => 9,
        'Availability' => 'Available',
        'image' => 'https://lh3.googleusercontent.com/p/AF1QipML3a4LKbT9ns2JhepRw9Q9zNq1TkjLOTkLmWqd=s1360-w1360-h1020'
    ],
    [
        'id' => 6,
        'name' => 'The nest pg',
        'address' => 'The nest, p.g & hotel phase 3, Law Gate Rd, Phagwara',
        'rating' => 4.1,
        'price' => 5000,
        'gender' => 'male',
        'interested' => 18,
        'Availability' => 'Available',
        'image' => 'https://lh3.googleusercontent.com/p/AF1QipOXvnO2E1no32K1j3Lr-QQjEYKPGYsTx9tAcp78=s1360-w1360-h1020'
    ],
    [
        'id' => 7,
        'name' => 'Royal PG',
        'address' => '13/B, Law Gate Rd, near LPU, Punjab',
        'rating' => 3.9,
        'price' => 6500,
        'gender' => 'male',
        'interested' => 23,
        'Availability' => 'Available',
        'image' => 'https://lh3.googleusercontent.com/p/AF1QipNDQDECXSaR5sO6ooniT8P1cYhf12pnN0_DVg8G=s1360-w1360-h1020'
    ]
];

// Get all PGs for Law Gate from the database
$sql = "SELECT * FROM accommodations WHERE city = 'Law Gate' ORDER BY created_at DESC";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)) {
    // Set default values for missing fields
    $row['rating'] = isset($row['rating']) ? $row['rating'] : 0;
    $row['gender'] = isset($row['gender']) ? $row['gender'] : 'both';
    $row['interested'] = isset($row['interested']) ? $row['interested'] : 0;
    $row['Availability'] = isset($row['Availability']) ? $row['Availability'] : 'Available';
    $accommodations[] = $row; // Add database PGs to the list
}

// Sort function based on user selection
$sort_type = isset($_GET['sort']) ? $_GET['sort'] : '';

switch ($sort_type) {
    case 'high_rent':
        usort($accommodations, function($a, $b) {
            return $b['price'] - $a['price'];
        });
        break;
    case 'low_rent':
        usort($accommodations, function($a, $b) {
            return $a['price'] - $b['price'];
        });
        break;
    case 'rating':
        usort($accommodations, function($a, $b) {
            return $b['rating'] - $a['rating'];
        });
        break;
    default:
        // Default sorting (by created_at DESC)
        break;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <title>PG Finder - Find Your Perfect PG Accommodation</title>
    <style>
        /* Reset and Base Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        
        body {
            background-color: #f5f5f5;
        }
        
        /* Header Styles */
        header {
            background-color: white;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            padding: 15px 0;
            position: relative;
        }
        
        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        .logo {
            display: flex;
            align-items: center;
        }
        
        .logo img {
            height: 40px;
        }
        
        .auth-links a {
            margin-left: 20px;
            text-decoration: none;
            color: #333;
        }
        
        /* Breadcrumb Styles */
        .breadcrumb {
            background-color: #eee;
            padding: 10px 0;
        }
        
        .breadcrumb-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        .breadcrumb a {
            text-decoration: none;
            color: #00BCD4;
        }
        
        /* Sort Options Styles */
        .sort-options {
            display: flex;
            justify-content: center;
            margin: 30px 0;
        }
        
        .sort-option {
            display: flex;
            align-items: center;
            margin: 0 20px;
            cursor: pointer;
            color: #333;
            text-decoration: none;
        }
        
        .sort-option:hover {
            color:black;
        }
        
        .sort-option svg {
            margin-right: 5px;
            height: 24px;
            width: 24px;
        }
        
        /* Listing Styles */
        .listings-container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        .listing-card {
            display: flex;
            background-color: white;
            border-radius: 5px;
            margin-bottom: 20px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            position: relative;
            overflow: hidden;
            border: 1px solid black;
        }
        
        .listing-image {
            width: 250px;
            height: 180px;
            overflow: hidden;
        }
        
        .listing-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .listing-details {
            flex: 1;
            padding: 15px;
            position: relative;
        }
        
        .listing-favorite {
            position: absolute;
            top: 15px;
            right: 15px;
            color: #ff5a5f;
            cursor: pointer;
           
        }
        
        .interested-count {
            font-size: 12px;
            color: #777;
            position: absolute;
            top: 15px;
            right: 50px;
            
        }
        
        .listing-rating {
            margin-bottom: 10px;
            color: #ff9800;
        }
        
        .listing-rating .fa-star.filled {
            color: #ff9800;
        }
        
        .listing-rating .fa-star {
            color: #ddd;
        }
        
        .listing-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 5px;
            color: #333;
        }
        
        .listing-address {
            font-size: 14px;
            color: #777;
            margin-bottom: 15px;
        }
        
        .gender-icons {
            margin: 10px 0;
            
        }
        
        .gender-icon {
            display: inline-block;
            background-color: #00BCD4;
            color: white;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            text-align: center;
            line-height: 30px;
            margin-right: 5px;
            display: none;               //edit.....
        }
        
        .female-icon {
            background-color: #FF5722;
        }
        
        .listing-price {
            font-size: 16px;
            font-weight: bold;
            color: #333;
            margin-top: 15px;
        }
        
        .per-month {
            font-size: 14px;
            color: #777;
            font-weight: normal;
        }
        
        .map-marker {
            display: inline-block;
            margin-right: 10px;
        }
        
        .view-button {
            display: block;
            background-color: #00BCD4;
            color: white;
            text-align: center;
            padding: 10px;
            border-radius: 3px;
            text-decoration: none;
            float: right;
            width: 100px;
            border: 1px solid black;
        }

        .fa-arrow-up{
            font-size: 23px;
            margin-right: 3px; 
        }
        .fa-arrow-up:hover{
            transform: scale(1.2);
        }
        .fa-arrow-down{
            font-size: 23px;
            margin-right: 3px;
        }
        .fa-arrow-down:hover{
            transform:scale(1.2);
            
        }
        .star:hover{
            transform:scale(1.2);
        }
        .svg:hover{
            fill: red;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="header-container">
            <div class="logo">
                <a href="index.php">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/b/bf/IFCO_PG_%28Cinema%29.png" alt="PG Finder Logo" class="h-10">
                </a>
                <span class="ml-2 text-lg font-semibold">PG Finder</span>
            </div>
            <div class="auth-links">
                <?php if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true): ?>
                    <a href="dashboard.php" class="mr-4">
                        <i class="fas fa-user"></i> Welcome, <?php echo htmlspecialchars($_SESSION["name"]); ?>
                    </a>
                    <a href="logout.php">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                <?php else: ?>
                    <a href="signup.php" class="mr-4"><i class="fas fa-user"></i> Signup</a>
                    <a href="login.php"><i class="fas fa-sign-in-alt"></i> Login</a>
                <?php endif; ?>
            </div>
        </div>
    </header>
    
    <!-- Breadcrumb -->
    <div class="breadcrumb">
        <div class="breadcrumb-container">
            <a href="index.php">Home</a> / Lawgate
        </div>
    </div>
    
    <!-- Sort Options -->
    <div class="sort-options">
        <a href="?sort=high_rent" class="sort-option">
        <i class="fa-solid fa-arrow-up"></i>
            Highest rent first
        </a>
        <a href="?sort=low_rent" class="sort-option">
        <i class="fa-solid fa-arrow-down"></i>
            Lowest rent first
        </a>
        <a href="?sort=rating" class="sort-option">
            <svg viewBox="0 0 24 24" class='star' width="24" height="24">
                <path fill="currentColor" d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"></path>
            </svg>
            Rating
        </a>
    </div>
    
    <!-- Listings -->
    <div class="listings-container">
        <?php foreach ($accommodations as $accommodation): ?>
            <div class="listing-card">
                <div class="listing-image">
                    <img src="<?php echo $accommodation['image']; ?>" alt="<?php echo $accommodation['name']; ?>">
                </div>
                <div class="listing-details">
                    <div class="listing-favorite">
                        <svg viewBox="0 0 24 24" width="24" height="24">
                            <path fill="lightpink" d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" class="svg"></path>
                        </svg>
                        <div class="interested-count"><?php echo $accommodation['interested']; ?> interested</div>
                    </div>
                    
                    <div class="listing-info">
                        <h3><?php echo htmlspecialchars($accommodation['name']); ?></h3>
                        <p class="listing-address"><?php echo htmlspecialchars($accommodation['address']); ?></p>
                        <div class="listing-rating">
                            <span class="rating-value"><?php echo $accommodation['rating']; ?></span>
                            <span class="rating-stars">
                                <?php 
                                $rating = $accommodation['rating'];
                                for($i = 0; $i < 5; $i++): 
                                    if($i < floor($rating)): ?>
                                        <i class="fas fa-star filled"></i>
                                    <?php elseif($i == floor($rating) && $rating - floor($rating) >= 0.5): ?>
                                        <i class="fas fa-star-half-alt filled"></i>
                                    <?php else: ?>
                                        <i class="fas fa-star"></i>
                                    <?php endif;
                                endfor; ?>
                            </span>
                        </div>
                    </div>
                    
                    <div class="gender-icons">
                        <?php if ($accommodation['gender'] == 'male' || $accommodation['gender'] == 'both'): ?>
                            <div class="gender-icon male-icon">
                                <svg viewBox="0 0 24 24" width="16" height="16">
                                    <path fill="white" d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"></path>
                                </svg>
                            </div>
                        <?php endif; ?>
                        
                        <?php if ($accommodation['gender'] == 'female' || $accommodation['gender'] == 'both'): ?>
                            <div class="gender-icon female-icon">
                                <svg viewBox="0 0 24 24" width="16" height="16">
                                    <path fill="white" d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"></path>
                                </svg>
                            </div>
                        <?php endif; ?>
                    </div>
                    
                    <div class="listing-footer" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="listing-price">
                            Rs <?php echo number_format($accommodation['price']); ?>/
                            <span class="per-month"> per month</span>
                        </div>
                        
                        <div style="display: flex; align-items: center;">
                            <div class="map-marker">
                                <svg viewBox="0 0 24 24" width="24" height="24" fill="#ff9800">
                                    <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"></path>
                                </svg>
                            </div>
                            <?php if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true): ?>
                                <a href="view2.php?id=<?php echo $accommodation['id']; ?>" class="view-button">View</a>
                            <?php else: ?>
                                <a href="login.php" class="view-button" onclick="alert('Please login to view PG details')">View</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const wishlistIcons = document.querySelectorAll('.wishlist-icon');
        
        wishlistIcons.forEach(icon => {
            icon.addEventListener('click', function() {
                <?php if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true): ?>
                    const pgId = this.getAttribute('data-pg-id');
                    const city = this.getAttribute('data-city');
                    const isWishlisted = this.querySelector('path').getAttribute('fill') === 'red';
                    
                    fetch('wishlist_action.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                        },
                        body: `action=${isWishlisted ? 'remove' : 'add'}&pg_id=${pgId}&city=${city}`
                    })
                    .then(response => response.json())
                    .then(data => {
                        if(data.status === 'success') {
                            this.querySelector('path').setAttribute('fill', isWishlisted ? 'lightpink' : 'red');
                            alert(data.message);
                        } else {
                            alert(data.message);
                        }
                    });
                <?php else: ?>
                    alert('Please login to add to wishlist');
                <?php endif; ?>
            });
        });
    });
    </script>
</body>
</html>