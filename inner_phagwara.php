<?php
session_start();
require_once "config.php";

// Default PGs for Phagwara
$accommodations = [
    [
        'id' => 1,
        'name' => 'G-1 Apartment',
        'address' => 'G-1 appartment, Maheru, Phagwara',
        'rating' => 4.5,
        'price' => 5000,
        'gender' => 'male',
        'interested' => 33,
        'images' => [
            'https://apollo.olx.in/v1/files/6v9f2sxdznaf1-ADVIN/image;s=1080x1080',
            'https://i.pinimg.com/736x/e7/e7/ff/e7e7ffa4a4fc431581617b0850c41164.jpg',
        ],
        'ownerContact' => '+91 9876543210',
        'amenities' => [
            'Building' => ['Power Backup', 'Fire Extinguisher', 'Parking', 'Lift', 'CCTV'],
            'Common Area' => ['WiFi', 'TV', 'Water Purifier', 'Washing Machine'],
            'Bedroom' => ['Bed with Mattress', 'Air Conditioner'],
            'Washroom' => ['Geyser'],
        ],
        'propertyRatings' => [
            'Cleanliness' => 3.5,
            'Food Quality' => 4.6,
            'Safety' => 4.7,
        ],
        'about' => 'Move into G-1 Apartment, a professionally managed PG home in the Maheru, Phagwara. Located in a safe neighborhood, this unisex PG offers various modern amenities for your comfort, such as Power Backup, Wi-Fi, TV etc. This PG has double occupancy types. This PG is nearby major commercial and educational hubs. Please contact the seller to book this fast selling high in demand PG to stay.',
    ],
    [
        'id' => 2,
        'name' => 'Navrang PG Home',
        'address' => 'Near Hanuman Mandir, Phagwara',
        'rating' => 4.0,
        'price' => 6000,
        'gender' => 'male',
        'interested' => 16,
        'images' => [
            'https://apollo.olx.in/v1/files/twr8i2n36lxb2-ADVIN/image;s=1080x1080',
            'https://content.jdmagicbox.com/comp/bhiwani/b1/9999p1664.1664.201204235017.g8b1/catalogue/h-d-pg-bhiwani-haryana-bhiwani-paying-guest-accommodations-for-men-ykj4tz4px8.jpg',
        ],
        'ownerContact' => '+91 9876543210',
        'amenities' => [
            'Building' => ['Power Backup', 'Fire Extinguisher', 'Parking', 'Lift', 'CCTV'],
            'Common Area' => ['WiFi', 'TV', 'Water Purifier', 'Washing Machine'],
            'Bedroom' => ['Bed with Mattress', 'Air Conditioner'],
            'Washroom' => ['Geyser'],
        ],
        'propertyRatings' => [
            'Cleanliness' => 4.5,
            'Food Quality' => 4.6,
            'Safety' => 4.7,
        ],
        'about' => 'Located in Near Hanuman Mandir, Phagwara , Navrang PG Home is a modern and spacious PG home that is close to major educational commercial hubs in the area. This unisex PG offers all the comforts like AC, TV, Food, Power Backup, Wi-Fi, etc. The PG has strict adherence to hygiene standards and offers single, double, triple, four, other rooms. Please contact me in case you are interested or have queries. Looking forward to serving you.',
    ],
    [
        'id' => 3,
        'name' => 'GreenView PG',
        'address' => 'JBS TOWER, Maheru, Phagwara',
        'rating' => 4.0,
        'price' => 5500,
        'gender' => 'male',
        'interested' => 10,
        'images' => [
            'https://apollo.olx.in/v1/files/emwtfi03zspp1-IN/image;s=1080x1080',
            'https://images.nobroker.in/images/8a9f0f828808fb7201880995d34b5ae0/8a9f0f828808fb7201880995d34b5ae0_87830_774252_medium.jpg',
        ],
        'ownerContact' => '+91 9876543210',
        'amenities' => [
            'Building' => ['Power Backup', 'Fire Extinguisher', 'Parking', 'Lift', 'CCTV'],
            'Common Area' => ['WiFi', 'TV', 'Water Purifier', 'Washing Machine'],
            'Bedroom' => ['Bed with Mattress', 'Air Conditioner'],
            'Washroom' => ['Geyser'],
        ],
        'propertyRatings' => [
            'Cleanliness' => 4.5,
            'Food Quality' => 4.6,
            'Safety' => 4.7,
        ],
        'about' => 'Located in JBS TOWER, Maheru, Phagwara, GreenView PG is modern and spacious PG home is close to major educational commercial hubs in the area. Sardar Apartments PG offers students accommodation with all the comforts like Power Backup, Wi-Fi etc. The PG has strict adherence to hygiene standards and offers double rooms. Please contact in case you are interested or queries. Looking forward to serving you. ',
    ],
    [
        'id' => 4,
        'name' => 'Maruti Apartments PG',
        'address' => 'Maruti Apartments, Maheru, Phagwara',
        'rating' => 4.0,
        'price' => 5500,
        'gender' => 'male',
        'interested' => 24,
        'images' => [
            'https://apollo.olx.in/v1/files/6v9f2sxdznaf1-ADVIN/image;s=1080x1080',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSIXdxjHQm7dQ1sLm0XxPc6CJD7IxzV6iu2AyHNHZ7wOlKfL3AOV7OuqUBCNdYbHMt99PY&usqp=CAU',
        ],
        'ownerContact' => '+91 9876543210',
        'amenities' => [
            'Building' => ['Power Backup', 'Fire Extinguisher', 'Parking', 'Lift', 'CCTV'],
            'Common Area' => ['WiFi', 'TV', 'Water Purifier', 'Washing Machine'],
            'Bedroom' => ['Bed with Mattress', 'Air Conditioner'],
            'Washroom' => ['Geyser'],
        ],
        'propertyRatings' => [
            'Cleanliness' => 4.5,
            'Food Quality' => 4.6,
            'Safety' => 4.7,
        ],
        'about' => 'Move into Maruti Apartments PG, A Professionally Managed PG Home in Guru Nanak Pura, Phagwara. Located in a Safe Neighborhood, This Male PG offers Various Modern Amenities For Your Comfort, Such as Food, Power Backup, Wi-Fi, etc. This PG has Single, Double, and Triple Occupancy types. This PG is Nearby Major Commercial and Educational hubs. Please Contact the Seller to Book this Fast Selling high in Demand PG Stay.',
    ],
    [
        'id' => 5,
        'name' => 'Green Avenue PG',
        'address' => 'Green Avenue PG, GT Road, Phagwara',
        'rating' => 4.5,
        'price' => 6000,
        'gender' => 'male',
        'interested' => 19,
        'images' => [
            'https://housing-images.n7net.in/01c16c28/1c8e95a28de45277559b7ae43026c583/v0/medium/3_rk_-for-rent-sector_39_gurgaon-Gurgaon-bedroom.jpg',
            'https://images.nobroker.in/images/8a9fa28994f0034f0194f0443bde1715/8a9fa28994f0034f0194f0443bde1715_71221_796411_medium.jpg',
        ],
        'ownerContact' => '+91 9876543210',
        'amenities' => [
            'Building' => ['Power Backup', 'Fire Extinguisher', 'Parking', 'Lift', 'CCTV'],
            'Common Area' => ['WiFi', 'TV', 'Water Purifier', 'Washing Machine'],
            'Bedroom' => ['Bed with Mattress', 'Air Conditioner'],
            'Washroom' => ['Geyser'],
        ],
        'propertyRatings' => [
            'Cleanliness' => 4.5,
            'Food Quality' => 4.6,
            'Safety' => 4.7,
        ],
        'about' => 'Move into Green Avenue PG, a professionally managed PG home in the GT Road, Phagwara. Located in a safe neighborhood, this unisex PG offers various modern amenities for your comfort, such as Wi-Fi, TV etc. This PG has double occupancy types. This PG is nearby major commercial and educational hubs. Please contact the seller to book this fast selling high in demand PG stay.',
    ],
    [
        'id' => 6,
        'name' => 'The Grand Sardar PG',
        'address' => 'The Grand Sardar PG, Maheru, Phagwara',
        'rating' => 4.5,
        'price' => 5000,
        'gender' => 'male',
        'interested' => 21,
        'images' => [
            'https://images.jdmagicbox.com/v2/comp/phagwara/g2/9999p1824.1824.190221162551.i7g2/catalogue/sardar-apartments-meheru-phagwara-uf1lf6weo7.jpg',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQDIa2k8kgh_uQzMCBVfjfoqHOdjQ1fmEsOfw&s',
        ],
        'ownerContact' => '+91 9876543210',
        'amenities' => [
            'Building' => ['Power Backup', 'Fire Extinguisher', 'Parking', 'Lift', 'CCTV'],
            'Common Area' => ['WiFi', 'TV', 'Water Purifier', 'Washing Machine'],
            'Bedroom' => ['Bed with Mattress', 'Air Conditioner'],
            'Washroom' => ['Geyser'],
        ],
        'propertyRatings' => [
            'Cleanliness' => 3.5,
            'Food Quality' => 4.6,
            'Safety' => 4.7,
        ],
        'about' => 'Located in Maheru, Phagwara, The Grand Sardar PG is Modern and Spacious PG Home is Close to Major Educational Commercial Hubs in the Area. This PG Offers all the Comforts Like Food etc. The PG has Strict Adherence to Hygiene Standards and Offers Single, Double Rooms. Please Contact in Case you are Interested or Queries. Looking forward to Serving you.',
    ],
    [
        'id' => 7,
        'name' => 'Raunak PG For Boys/Hostels',
        'address' => 'Raunak PG For Boys, Satnampura, Phagwara',
        'rating' => 4.0,
        'price' => 4500,
        'gender' => 'male',
        'interested' => 11,
        'images' => [
            'https://img.staticmb.com/mbphoto/pg/grd2/cropped_images/2023/Nov/30/Photo_h400_w540/GR2-409263-1957935_400_540.jpeg',
            'https://content.jdmagicbox.com/comp/pune/z8/020pxx20.xx20.210704200512.p1z8/catalogue/ayyappa-pg-for-gents-and-ladies-yerawada-pune-paying-guest-accommodations-for-men-wzq6ft5t7g.jpg',
        ],
        'ownerContact' => '+91 9876543210',
        'amenities' => [
            'Building' => ['Power Backup', 'Fire Extinguisher', 'Parking', 'Lift', 'CCTV'],
            'Common Area' => ['WiFi', 'TV', 'Water Purifier', 'Washing Machine'],
            'Bedroom' => ['Bed with Mattress', 'Air Conditioner'],
            'Washroom' => ['Geyser'],
        ],
        'propertyRatings' => [
            'Cleanliness' => 4.5,
            'Food Quality' => 2.6,
            'Safety' => 4.7,
        ],
        'about' => 'Move into Raunak PG For Boys/Hostels Satnampura, Phagwara. Located in a safe neighborhood, this Property offers various modern amenities for your comfort, such as Parking, etc. This Property is new construction having double room types available. This Property is nearby Curo Mall major commercial and educational hubs. Please contact to book this fast-selling high in demand residential stay.',
    ],
    [
        'id' => 8,
        'name' => 'Satyam Pg Boys Hostel',
        'address' => 'GT Road, Phagwara (Near Chak Hakeem Gurduwara)',
        'rating' => 4.5,
        'price' => 5500,
        'gender' => 'male',
        'interested' => 41,
        'images' => [
            'https://apollo.olx.in/v1/files/5kuyj115cmad-ADVIN/image;s=780x0;q=60',
            'https://content.jdmagicbox.com/v2/comp/bangalore/s3/080pxx80.xx80.160713101545.j2s3/catalogue/sri-balaji-pg-for-gents-kodihalli-bangalore-paying-guest-accommodations-for-men-fs2nt.jpg',
        ],
        'ownerContact' => '+91 9876543210',
        'amenities' => [
            'Building' => ['Power Backup', 'Fire Extinguisher', 'Parking', 'Lift', 'CCTV'],
            'Common Area' => ['WiFi', 'TV', 'Water Purifier', 'Washing Machine'],
            'Bedroom' => ['Bed with Mattress', 'Air Conditioner'],
            'Washroom' => ['Geyser'],
        ],
        'propertyRatings' => [
            'Cleanliness' => 4.5,
            'Food Quality' => 4.6,
            'Safety' => 3.7,
        ],
        'about' => 'Move into Satyam Pg Boys Hostel, cont a professionally managed PG home in GT Road, Phagwara (Near Chak Hakeem Gurduwara). Located in a safe neighborhood, this  PG offers various modern amenities for your comfort. This PG has Double Occupancy types. This PG is nearby major commercial and educational hubs. Please contact the seller to book this fast selling high in demand PG stay.',
    ],
    [
        'id' => 9,
        'name' => 'Aman Hostels PG',
        'address' => 'Bhankoti road, Bhagatpura, Phagwara HO, Phagwara',
        'rating' => 3.0,
        'price' => 3500,
        'gender' => 'male',
        'interested' => 17,
        'images' => [
            'https://apollo.olx.in/v1/files/zspl80zhrqv32-IN/image;s=780x0;q=60',
            'https://images.jdmagicbox.com/v2/comp/mumbai/v5/022pxx22.xx22.161216144534.i4v5/catalogue/fargo-park-boys-and-girls-pg-malad-west-mumbai-paying-guest-accommodations-wrb5togute.jpg',
        ],
        'ownerContact' => '+91 9876543210',
        'amenities' => [
            'Building' => ['Power Backup', 'Fire Extinguisher', 'Parking', 'Lift', 'CCTV'],
            'Common Area' => ['WiFi', 'TV', 'Water Purifier', 'Washing Machine'],
            'Bedroom' => ['Bed with Mattress', 'Air Conditioner'],
            'Washroom' => ['Geyser'],
        ],
        'propertyRatings' => [
            'Cleanliness' => 4.5,
            'Food Quality' => 3.6,
            'Safety' => 4.7,
        ],
        'about' => 'Move into Aman Hostels PG, a professionally managed PG home in Bhankoti road, Bhagatpura, Phagwara HO, Phagwara. Located in a safe neighborhood, this unisex PG offers various modern amenities for your comfort, such as Wi-Fi, TV etc. This PG has double occupancy types. This PG is nearby major commercial and educational hubs. Please contact the seller to book this fast selling high in demand PG stay.',
    ],
    [
        'id' => 10,
        'name' => 'Gkaul PG and Guest House',
        'address' => 'Gkaul PG and Guest House, Maheru, Phagwara',
        'rating' => 4.0,
        'price' => 4500,
        'gender' => 'male',
        'interested' => 15,
        'images' => [
            'https://apollo.olx.in/v1/files/6v9f2sxdznaf1-ADVIN/image;s=1080x1080',
            'https://i.pinimg.com/736x/e7/e7/ff/e7e7ffa4a4fc431581617b0850c41164.jpg',
        ],
        'ownerContact' => '+91 9876543210',
        'amenities' => [
            'Building' => ['Power Backup', 'Fire Extinguisher', 'Parking', 'Lift', 'CCTV'],
            'Common Area' => ['WiFi', 'TV', 'Water Purifier', 'Washing Machine'],
            'Bedroom' => ['Bed with Mattress', 'Air Conditioner'],
            'Washroom' => ['Geyser'],
        ],
        'propertyRatings' => [
            'Cleanliness' => 4.5,
            'Food Quality' => 4.6,
            'Safety' => 4.7,
        ],
        'about' => 'Move into Gkaul PG and Guest House, a professionally managed PG home in Maheru, Phagwara. Located in a safe neighborhood, this unisex PG offers various modern amenities for your comfort, such as Wi-Fi, TV etc. This PG has double occupancy types. This PG is nearby major commercial and educational hubs. Please contact the seller to book this fast selling high in demand PG stay.',
    ],
    [
        'id' => 11,
        'name' => 'Veston PG',
        'address' => 'Veston Pg, Khalsa Enclave St No-4, Hadiabad, Phagwara',
        'rating' => 4.5,
        'price' => 7500,
        'gender' => 'male',
        'interested' => 25,
        'images' => [
            'https://apollo.olx.in/v1/files/6v9f2sxdznaf1-ADVIN/image;s=1080x1080',
            'https://i.pinimg.com/736x/e7/e7/ff/e7e7ffa4a4fc431581617b0850c41164.jpg',
        ],
        'ownerContact' => '+91 9876543210',
        'amenities' => [
            'Building' => ['Power Backup', 'Fire Extinguisher', 'Parking', 'Lift', 'CCTV'],
            'Common Area' => ['WiFi', 'TV', 'Water Purifier', 'Washing Machine'],
            'Bedroom' => ['Bed with Mattress', 'Air Conditioner'],
            'Washroom' => ['Geyser'],
        ],
        'propertyRatings' => [
            'Cleanliness' => 4.5,
            'Food Quality' => 5.0,
            'Safety' => 4.7,
        ],
        'about' => 'Move into Veston PG, a professionally managed PG home in Khalsa Enclave St No-4, Hadiabad, Phagwara. Located in a safe neighborhood, this unisex PG offers various modern amenities for your comfort, such as Wi-Fi, TV etc. This PG has double occupancy types. This PG is nearby major commercial and educational hubs. Please contact the seller to book this fast selling high in demand PG stay.',
    ]
];

// Get all PGs for Phagwara from the database
$sql = "SELECT * FROM accommodations WHERE city = 'Phagwara' ORDER BY created_at DESC";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)) {
    // Set default values for missing fields
    $row['rating'] = isset($row['rating']) ? $row['rating'] : 0;
    $row['gender'] = isset($row['gender']) ? $row['gender'] : 'both';
    $row['interested'] = isset($row['interested']) ? $row['interested'] : 0;
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
    
    <title>PG Finder</title>
    <style>
       
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
    
  
    <div class="breadcrumb">
        <div class="breadcrumb-container">
            <a href="index.php">Home</a> / phagwara
        </div>
    </div>
    
    
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
                <path fill="currentColor" d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" ></path>
            </svg>
            Rating
        </a>
    </div>
    
    <!-- Listings -->
    <div class="listings-container">
        <?php foreach ($accommodations as $accommodation): ?>
            <div class="listing-card">
                <div class="listing-image">
                    <img src="<?php echo $accommodation['images'][0]; ?>" alt="<?php echo $accommodation['name']; ?>">
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
                                <a href="view.php?id=<?php echo $accommodation['id']; ?>" class="view-button">View</a>
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