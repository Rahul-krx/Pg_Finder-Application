<?php
session_start();
require_once "config.php";

// Default sample data for PG accommodations
$default_accommodations = [
    [
        'id' => 1,
        'name' => 'Perfect PG',
        'address' => 'Main Market Dakoha, Jalandhar',
        'rating' => 4.5,
        'price' => 5000,
        'gender' => 'male',
        'interested' => 28,
        'image' => 'https://apollo.olx.in/v1/files/26txd0lavh7f2-IN/image;s=780x0;q=60'
    ],
    [
        'id' => 2,
        'name' => 'Decent PG',
        'address' => 'Jalandhar Distributary, Jalandhar',
        'rating' => 3.5,
        'price' => 6000,
        'gender' => 'both',
        'interested' => 16,
        'image' => 'https://apollo.olx.in/v1/files/xpcn92je2upe1-ADVIN/image;s=780x0;q=60'
    ],
    [
        'id' => 3,
        'name' => 'Homely PG',
        'address' => 'Homely PG, Dakoha, Jalandhar',
        'rating' => 4.0,
        'price' => 7000,
        'gender' => 'male',
        'interested' => 12,
        'image' => 'https://apollo.olx.in/v1/files/5e1d7k54axli1-ADVIN/image;s=780x0;q=60'
    ],
    [
        'id' => 4,
        'name' => 'Batchmate living Paying Guest/Hostels',
        'address' => 'Batchmate living, Reru, Jalandhar',
        'rating' => 4.1,
        'price' => 5000,
        'gender' => 'male',
        'interested' => 22,
        'image' => 'https://apollo.olx.in/v1/files/ccn0lmnuvow72-IN/image;s=780x0;q=60'
    ],
    [
        'id' => 5,
        'name' => 'Preeti PG',
        'address' => 'Preeti, Jalandhar Bypass Road, Jalandhar',
        'rating' => 3.7,
        'price' => 3500,
        'gender' => 'male',
        'interested' => 4,
        'image' => 'https://content.jdmagicbox.com/comp/noida/i8/011pxx11.xx11.190329185724.w2i8/catalogue/cripa-boyes-pg-noida-gcq1p18nlt.jpg'
    ],
    [
        'id' => 6,
        'name' => 'dhaliwal jalandhar cantt PG',
        'address' => 'dhaliwal jalandhar cantt, Deep Nagar Road, Jalandhar',
        'rating' => 3.5,
        'price' => 5200,
        'gender' => 'male',
        'interested' => 21,
        'image' => 'https://housing-images.n7net.in/01c16c28/1c8e95a28de45277559b7ae43026c583/v0/medium/3_rk_-for-rent-sector_39_gurgaon-Gurgaon-bedroom.jpg'
    ],
    [
        'id' => 7,
        'name' => 'Ram Niwas',
        'address' => 'Ram Niwas, Jalandhar Bypass Road, Jalandhar',
        'rating' => 4.4,
        'price' => 6500,
        'gender' => 'male',
        'interested' => 11,
        'image' => 'https://apollo.olx.in/v1/files/licxtmrn44ny-ADVIN/image;s=780x0;q=60'
    ]
];

// Get PGs from the database
$db_accommodations = [];
$sql = "SELECT * FROM accommodations WHERE city = 'Jalandhar' ORDER BY created_at DESC";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)) {
    // Set default values for missing fields
    $row['rating'] = isset($row['rating']) ? $row['rating'] : 0;
    $row['gender'] = isset($row['gender']) ? $row['gender'] : 'both';
    $row['interested'] = isset($row['interested']) ? $row['interested'] : 0;
    $db_accommodations[] = $row;
}

// Combine default and database accommodations
$accommodations = array_merge($default_accommodations, $db_accommodations);

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
        
        .rating {
            margin-bottom: 10px;
            color: #ff9800;
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
            <a href="index.php">Home</a> / Jalandhar
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
                    
                    <div class="rating">
                        <?php for ($i = 1; $i <= 5; $i++): ?>
                            <?php if ($i <= floor($accommodation['rating'])): ?>
                                <svg viewBox="0 0 24 24" width="16" height="16">
                                    <path fill="currentColor" d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"></path>
                                </svg>
                            <?php elseif ($i - 0.5 <= $accommodation['rating']): ?>
                                <svg viewBox="0 0 24 24" width="16" height="16">
                                    <path fill="currentColor" d="M22 9.24l-7.19-.62L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21 12 17.27 18.18 21l-1.63-7.03L22 9.24zM12 15.4V6.1l1.71 4.04 4.38.38-3.32 2.88 1 4.28L12 15.4z"></path>
                                </svg>
                            <?php else: ?>
                                <svg viewBox="0 0 24 24" width="16" height="16">
                                    <path fill="currentColor" d="M22 9.24l-7.19-.62L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21 12 17.27 18.18 21l-1.63-7.03L22 9.24zM12 15.4l-3.76 2.27 1-4.28-3.32-2.88 4.38-.38L12 6.1l1.71 4.04 4.38.38-3.32 2.88 1 4.28L12 15.4z"></path>
                                </svg>
                            <?php endif; ?>
                        <?php endfor; ?>
                    </div>
                    
                    <h2 class="listing-title"><?php echo $accommodation['name']; ?></h2>
                    <p class="listing-address"><?php echo $accommodation['address']; ?></p>
                    
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
                                <a href="view1.php?id=<?php echo $accommodation['id']; ?>" class="view-button">View</a>
                            <?php else: ?>
                                <a href="login.php" class="view-button" onclick="alert('Please login to view PG details')">View</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>