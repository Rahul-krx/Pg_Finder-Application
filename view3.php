<?php
session_start();
// Include the accommodations array
$accommodations = [
    [
        'id' => 1,
        'name' => 'Royal Retreat PG',
        'address' => 'Model Town, Ludhiana',
        'rating' => 4.7,
        'price' => 7800,
        'gender' => 'male', 
        'interested' => 48,
        'Availability' => 'Available',
        'deposit' => 3800,
        'lat' => 30.9010,
        'lng' => 75.8573,
        'nearby' => [
            'Punjab Agricultural University - 2.5 km',
            'Model Town Market - 0.8 km',
            'Ludhiana Bus Stand - 4 km',
            'Ludhiana Railway Station - 5 km'
        ],
        'images' => [
            'https://cripa.in/wp-content/uploads/2024/11/UYGYUY-818x417.jpg',
            'https://content.jdmagicbox.com/comp/noida/i8/011pxx11.xx11.190329185724.w2i8/catalogue/cripa-boyes-pg-noida-gcq1p18nlt.jpg'
            
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
        'about' => 'Move into Royal Retreat PG, a professionally managed PG home in the Model Town, Ludhiana. Located in a safe neighborhood, this unisex PG offers various modern amenities for your comfort, such as Power Backup, Wi-Fi, TV etc. This PG has double occupancy types. This PG is nearby major commercial and educational hubs. Please contact the seller to book this fast selling high in demand PG to stay.',
    ],
   
    [
        'id' => 2,
        'name' => 'Harmony Homes',
        'address' => 'Ferozepur Road, Ludhiana',
        'rating' => 3.9,
        'price' => 4500,
        'gender' => 'both',
        'interested' => 25,
        'Availability' => 'Available',
        'deposit' => 3000,
        'lat' => 30.9120,
        'lng' => 75.8450,
        'nearby' => [
            'Christian Medical College - 1.2 km',
            'Ferozepur Road Market - 0.5 km',
            'Ludhiana Bus Stand - 3.5 km',
            'Ludhiana Railway Station - 4.5 km'
        ],
        'images' => [
            'https://content.jdmagicbox.com/v2/comp/bangalore/g7/080pxx80.xx80.140326164226.h6g7/catalogue/bella-vista-kerala-pg-whitefield-bangalore-paying-guest-accommodations-for-women-ujrkcwlt67.jpg',
            'https://productimages.withfloats.com/serviceimages/tile/667142829155efef60b6a8a0WhatsAppImage2024-06-18at1.02.51PM'
            
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
        'about' => 'Located in Near Ferozepur Road, Ludhiana , Harmony Homes is a modern and spacious PG home that is close to major educational commercial hubs in the area. This unisex PG offers all the comforts like AC, TV, Food, Power Backup, Wi-Fi, etc. The PG has strict adherence to hygiene standards and offers single, double, triple, four, other rooms. Please contact me in case you are interested or have queries. Looking forward to serving you.',
    ],

    [
        'id' => 3,
        'name' => 'Sunrise PG',
        'address' => 'Sarabha Nagar, Ludhiana',
        'rating' => 4.2,
        'price' => 6200,
        'gender' => 'female',
        'interested' => 31,
        'Availability' => 'Available',
        'deposit' => 3500,
        'lat' => 30.8950,
        'lng' => 75.8650,
        'nearby' => [
            'Sarabha Nagar Market - 0.3 km',
            'Punjab University - 2.0 km',
            'Ludhiana Bus Stand - 3.8 km',
            'Ludhiana Railway Station - 4.8 km'
        ],
        'images' => [
            'https://content.jdmagicbox.com/v2/comp/bangalore/c3/080pxx80.xx80.180202172713.h6c3/catalogue/sai-girls-pg-vijayanagar-bangalore-estate-agents-for-residential-rental-49i21.jpg',

         'https://content.jdmagicbox.com/comp/bangalore/g4/080pxx80.xx80.230204151959.i3g4/catalogue/monith-ladies-pg-in-domlur-domlur-bangalore-hostels-d7lv855k77.jpg'
            
        ],
        'ownerContact' => '+91 9876543210',
        'amenities' => [
            'Building' => ['Power Backup', 'Fire Extinguisher', 'Parking', 'Lift', 'CCTV'],
            'Common Area' => ['WiFi', 'TV', 'Water Purifier', 'Washing Machine'],
            'Bedroom' => ['Bed with Mattress', 'Air Conditioner'],
            'Washroom' => ['Geyser'],
        ],
        'propertyRatings' => [
            'Cleanliness' => 5.0,
            'Food Quality' => 4.6,
            'Safety' => 4.0,
        ],
        'about' => 'Located in Sarabha Nagar, Ludhiana, Sunrise PG is modern and spacious PG home is close to major educational commercial hubs in the area. Sardar Apartments PG offers students accommodation with all the comforts like Power Backup, Wi-Fi etc. The PG has strict adherence to hygiene standards and offers double rooms. Please contact in case you are interested or queries. Looking forward to serving you. ',
    ],

    [
        'id' => 4,
        'name' => 'Tranquil Stay',
        'address' => 'Civil Lines, Ludhiana',
        'rating' => 4.0,
        'price' => 5300,
        'gender' => 'male',
        'interested' => 19,
        'Availability' => 'Available',
        'deposit' => 3200,
        'lat' => 30.9080,
        'lng' => 75.8520,
        'nearby' => [
            'Civil Lines Market - 0.4 km',
            'Government College - 1.5 km',
            'Ludhiana Bus Stand - 2.5 km',
            'Ludhiana Railway Station - 3.5 km'
        ],
        'images' => [
            'https://content.jdmagicbox.com/comp/gurgaon/s4/011pxx11.xx11.181102212756.s2s4/catalogue/paridhi-boys-pg--sector-21-gurgaon-paying-guest-accommodations-for-men-0gkgxo3agh.jpeg',
         'https://www.shreedurgapg.in/images/blogs/img-common-problems-faced-by-people-living-in-pg.jpg',
            
        ],
        'ownerContact' => '+91 9876543210',
        'amenities' => [
            'Building' => ['Power Backup', 'Fire Extinguisher', 'Parking', 'Lift', 'CCTV'],
            'Common Area' => ['WiFi', 'TV', 'Water Purifier', 'Washing Machine'],
            'Bedroom' => ['Bed with Mattress', 'Air Conditioner'],
            'Washroom' => ['Geyser'],
        ],
        'propertyRatings' => [
            'Cleanliness' => 4.0,
            'Food Quality' => 3.6,
            'Safety' => 4.7,
        ],
        'about' => 'Move into Tranquil Stay, A Professionally Managed PG Home Civil Lines, Ludhiana. Located in a Safe Neighborhood, This Male PG offers Various Modern Amenities For Your Comfort, Such as Food, Power Backup, Wi-Fi, etc. This PG has Single, Double, and Triple Occupancy types. This PG is Nearby Major Commercial and Educational hubs. Please Contact the Seller to Book this Fast Selling high in Demand PG Stay.',
    ],

    [
        'id' => 5,
        'name' => 'Lotus Residency',
        'address' => 'Dugri Phase 1, Ludhiana',
        'rating' => 4.8,
        'price' => 6900,
        'gender' => 'both',
        'interested' => 53,
        'Availability' => 'Available',
        'deposit' => 4000,
        'lat' => 30.8850,
        'lng' => 75.8750,
        'nearby' => [
            'Dugri Market - 0.7 km',
            'Punjab University - 3.0 km',
            'Ludhiana Bus Stand - 5.0 km',
            'Ludhiana Railway Station - 6.0 km'
        ],
        'images' => [
           'https://content.jdmagicbox.com/v2/comp/delhi/u6/011pxx11.xx11.190531224012.v5u6/catalogue/yo-boys-and-girls-pg-gurgaon-sector-10-gurgaon-paying-guest-accommodations-onmg017kmx.jpg',
         'https://housing-images.n7net.in/01c16c28/0eb63b3c551a2f63fdf82b72f946a2d2/v0/medium/3_rk_-for-rent-chinhat-Lucknow-double_sharing_room.jpg'
            
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
        'about' => 'Move into Lotus Residency, a professionally managed PG home in the Dugri Phase 1, Ludhiana. Located in a safe neighborhood, this unisex PG offers various modern amenities for your comfort, such as Wi-Fi, TV etc. This PG has double occupancy types. This PG is nearby major commercial and educational hubs. Please contact the seller to book this fast selling high in demand PG stay.',
    ],

    [
        'id' => 6,
        'name' => 'Emerald Haven PG',
        'address' => 'BRS Nagar, Ludhiana',
        'rating' => 4.5,
        'price' => 7450,
        'gender' => 'female',
        'interested' => 39,
        'Availability' => 'Available',
        'deposit' => 3800,
        'lat' => 30.8900,
        'lng' => 75.8600,
        'nearby' => [
            'BRS Nagar Market - 0.6 km',
            'Punjab University - 2.2 km',
            'Ludhiana Bus Stand - 4.2 km',
            'Ludhiana Railway Station - 5.2 km'
        ],
        'images' => [
            'https://5.imimg.com/data5/SELLER/Default/2021/12/VU/PT/DL/85644011/sai-cottage-boys-pg-500x500.jpg',
             'https://content.jdmagicbox.com/comp/siliguri/c2/9999px353.x353.230312132749.p5c2/catalogue/happy-living-p-g-siliguri-hostels-zr4qf5s6l8.jpg'
            
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
        'about' => 'Located in BRS Nagar, Ludhiana, The Emerald Haven PG is Modern and Spacious PG Home is Close to Major Educational Commercial Hubs in the Area. This PG Offers all the Comforts Like Food etc. The PG has Strict Adherence to Hygiene Standards and Offers Single, Double Rooms. Please Contact in Case you are Interested or Queries. Looking forward to Serving you.',
    ],

    [
        'id' => 7,
        'name' => 'Pearl Nest',
        'address' => 'Pakhowal Road, Ludhiana',
        'rating' => 3.7,
        'price' => 4800,
        'gender' => 'male',
        'interested' => 22,
        'Availability' => 'Available',
        'deposit' => 2800,
        'lat' => 30.8800,
        'lng' => 75.8700,
        'nearby' => [
            'Pakhowal Road Market - 0.5 km',
            'Punjab University - 2.5 km',
            'Ludhiana Bus Stand - 4.5 km',
            'Ludhiana Railway Station - 5.5 km'
        ],
        'images' => [
            'https://5.imimg.com/data5/SELLER/Default/2021/12/UJ/UZ/IN/85644011/sai-cottage-boys-pg-500x500.jpg',
        'https://images.jdmagicbox.com/v2/comp/mumbai/v5/022pxx22.xx22.161216144534.i4v5/catalogue/fargo-park-boys-and-girls-pg-malad-west-mumbai-paying-guest-accommodations-wrb5togute.jpg'
            
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
        'about' => 'Move into Pearl Nest For Boys/Hostels Pakhowal Road, Ludhiana. Located in a safe neighborhood, this Property offers various modern amenities for your comfort, such as Parking, etc. This Property is new construction having double room types available. This Property is nearby Curo Mall major commercial and educational hubs. Please contact to book this fast-selling high in demand residential stay.',
    ],
    
    
    // ... other accommodations remain the same (you would replace their single 'image' with 'images' array)
];

// Get the ID from the URL
$id = isset($_GET['id']) ? intval($_GET['id']) : null;

// Find the specific accommodation
$pgListing = null;
if ($id) {
    foreach ($accommodations as $accommodation) {
        if ($accommodation['id'] === $id) {
            $pgListing = $accommodation;
            break;
        }
    }
}

// If no accommodation found, display an error
if (!$pgListing) {
    echo "<h1 style='text-align:center; color:red;'>Sorry no data available to show!</h1>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PG Finder - <?php echo htmlspecialchars($pgListing['name']); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        .breadcrumb a {
            text-decoration: none;
            color: #00BCD4;
        }
        .btn {
            background-color: #00BCD4;
            color: white;
            border-radius: 3px;
            padding: 10px 20px;
            text-decoration: none;
            cursor: pointer;
        }
        .carousel-container {
            position: relative;
            width: 100%;
            overflow: hidden;
        }
        .carousel-inner {
            display: flex;
            transition: transform 0.5s ease;
        }
        .carousel-item {
            min-width: 100%;
            height: 400px;
            object-fit: cover;
        }
        .carousel-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(0,0,0,0.5);
            color: white;
            padding: 10px;
            text-decoration: none;
            z-index: 10;
        }
        .carousel-btn-prev {
            left: 10px;
        }
        .carousel-btn-next {
            right: 10px;
        }
        .carousel-dots {
            position: absolute;
            bottom: 10px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 10px;
        }
        .carousel-dot {
            width: 10px;
            height: 10px;
            background-color: rgba(255,255,255,0.5);
            border-radius: 50%;
            cursor: pointer;
        }
        .carousel-dot.active {
            background-color: white;
        }
        .p-6{
            border:1px solid black;
        }
        #map {
            height: 400px;
            width: 100%;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .nearby-places {
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .payment-section {
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 20px;
            background-color: #f8fafc;
            margin-bottom: 20px;
        }
        .payment-option {
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 12px;
            margin: 10px 0;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .payment-option:hover {
            border-color: #00BCD4;
            background-color: #f0f9fa;
        }
        .payment-option.selected {
            border-color: #00BCD4;
            background-color: #e0f7fa;
        }
        .payment-form {
            margin-top: 20px;
            display: none;
        }
        .tab-container {
            margin-bottom: 20px;
        }
        .tab-buttons {
            display: flex;
            border-bottom: 1px solid #e2e8f0;
            margin-bottom: 20px;
        }
        .tab-btn {
            padding: 10px 20px;
            cursor: pointer;
            border-bottom: 3px solid transparent;
            transition: all 0.3s ease;
        }
        .tab-btn.active {
            border-bottom-color: #00BCD4;
            color: #00BCD4;
            font-weight: 600;
        }
        .tab-content {
            display: none;
        }
        .tab-content.active {
            display: block;
        }
    </style>
</head>
<body class="bg-gray-100">
    <header class="bg-white shadow-md py-4">
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
        <div class="breadcrumb bg-gray-200 py-2">
            <div class="container mx-auto px-4">
                <a href="index.php">Home</a> /
                <a href="inner_ludhiana.php">Ludhiana</a> /
                <span><?php echo htmlspecialchars($pgListing['name']); ?></span>
            </div>
        </div>
    </header>

    <div class="container mx-auto px-4 py-8">
        <div class="bg-white shadow-md rounded-lg overflow-hidden mb-8">
            <!-- Image Carousel -->
            <div class="carousel-container relative">
                <div class="carousel-inner flex" id="carouselInner">
                    <?php foreach ($pgListing['images'] as $image): ?>
                        <img src="<?php echo htmlspecialchars($image); ?>" class="carousel-item" alt="PG Image">
                    <?php endforeach; ?>
                </div>
                <a href="#" class="carousel-btn carousel-btn-prev" id="prevBtn">&lt;</a>
                <a href="#" class="carousel-btn carousel-btn-next" id="nextBtn">&gt;</a>
                
                <!-- Carousel Dots -->
                <div class="carousel-dots" id="carouselDots">
                    <?php foreach ($pgListing['images'] as $index => $image): ?>
                        <span class="carousel-dot <?php echo $index === 0 ? 'active' : ''; ?>" data-index="<?php echo $index; ?>"></span>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="p-6">
                <div class="flex justify-between items-center mb-4">
                    <div>
                        <h1 class="text-2xl font-bold"><?php echo htmlspecialchars($pgListing['name']); ?></h1>
                        <p class="text-gray-600"><?php echo htmlspecialchars($pgListing['address']); ?></p>
                    </div>
                    <div class="text-right">
                        <p class="text-xl font-semibold">Rs <?php echo number_format($pgListing['price']); ?> <span class="text-sm text-gray-500">per month</span></p>
                        <button class="btn" id="openBookingBtn">Book Now</button>
                    </div>
                </div>
                
                <!-- Tab Navigation -->
                <div class="tab-buttons mb-6">
                    <div class="tab-btn active" data-tab="details">Details</div>
                    <div class="tab-btn" data-tab="location">Map & Location</div>
                    <div class="tab-btn" data-tab="payment">Book & Pay</div>
                </div>
                
                <!-- Details Tab -->
                <div class="tab-content active" id="details-tab">
                    <h3 class="text-lg font-semibold">Owner Contact:</h3>
                    <p class="text-gray-700 mb-6"><?php echo htmlspecialchars($pgListing['ownerContact']); ?></p>
                    <h2 class="text-xl font-semibold mb-4">Amenities</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                        <?php foreach ($pgListing['amenities'] as $category => $items): ?>
                            <div>
                                <h3 class="font-semibold"><?php echo htmlspecialchars($category); ?></h3>
                                <ul class="list-disc list-inside text-gray-700">
                                    <?php foreach ($items as $item): ?>
                                        <li><?php echo htmlspecialchars($item); ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <h2 class="text-xl font-semibold mb-4">About the PG</h2>
                    <p class="text-gray-700"><?php echo htmlspecialchars($pgListing['about']); ?></p>
                    <h2 class="text-xl font-semibold mb-4">Property Rating</h2>
                    <div class="flex items-center">
                        <div>
                            <?php foreach ($pgListing['propertyRatings'] as $category => $rating): ?>
                                <div class="flex items-center mb-2">
                                    <span class="w-32 font-medium"><?php echo htmlspecialchars($category); ?></span>
                                    <div>
                                        <?php for ($i = 1; $i <= 5; $i++): ?>
                                            <span class="<?php echo $i <= $rating ? 'text-yellow-500' : 'text-gray-400'; ?>">★</span>
                                        <?php endfor; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                
                <!-- Location Tab -->
                <div class="tab-content" id="location-tab">
                    <h2 class="text-xl font-semibold mb-4">Location on Map</h2>
                    <div id="map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d109534.70384136164!2d75.69465151934196!3d30.91575630948603!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391a83c2ea256853%3A0x27b12e68abe89b3!2sR%20T%20ROYAL%20GUEST%20HOUSE!5e0!3m2!1sen!2sin!4v1745173158204!5m2!1sen!2sin" width="100%" height="420" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    
                    <div class="nearby-places">
                        <h3 class="text-lg font-semibold mb-3">Nearby Places</h3>
                        <ul class="list-disc list-inside">
                            <?php foreach ($pgListing['nearby'] as $place): ?>
                                <li class="mb-2"><?php echo htmlspecialchars($place); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                
                <!-- Payment Tab -->
                <div class="tab-content" id="payment-tab">
                    <?php if ($pgListing['Availability'] == 'Available'): ?>
                        <h2 class="text-xl font-semibold mb-4">Book This PG</h2>
                        <div class="payment-section">
                            <div class="mb-4">
                                <p class="text-gray-700">Booking this PG requires an initial payment of <strong>Rs <?php echo number_format($pgListing['deposit']); ?></strong> as security deposit.</p>
                                <p class="text-gray-700 mt-2">After your booking is confirmed, you'll need to pay the first month's rent (Rs <?php echo number_format($pgListing['price']); ?>) at move-in.</p>
                            </div>
                            
                            <h3 class="text-lg font-semibold mb-3">Select Payment Method</h3>
                            <div class="payment-options">
                                <div class="payment-option" data-method="card">
                                    <div class="flex items-center">
                                        <i class="fas fa-credit-card text-blue-500 mr-3 text-xl"></i>
                                        <div>
                                            <h4 class="font-semibold">Credit/Debit Card</h4>
                                            <p class="text-sm text-gray-600">Pay securely with your card</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="payment-option" data-method="upi">
                                    <div class="flex items-center">
                                        <i class="fas fa-mobile-alt text-green-500 mr-3 text-xl"></i>
                                        <div>
                                            <h4 class="font-semibold">UPI</h4>
                                            <p class="text-sm text-gray-600">Google Pay, PhonePe, Paytm & more</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="payment-option" data-method="netbanking">
                                    <div class="flex items-center">
                                        <i class="fas fa-university text-purple-500 mr-3 text-xl"></i>
                                        <div>
                                            <h4 class="font-semibold">Net Banking</h4>
                                            <p class="text-sm text-gray-600">All major banks supported</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Card Payment Form -->
                            <div class="payment-form" id="card-form">
                                <h4 class="font-semibold mb-3">Enter Card Details</h4>
                                <div class="form-row">
                                    <label class="form-label">Card Number</label>
                                    <input type="text" class="form-input" placeholder="1234 5678 9012 3456" maxlength="19">
                                </div>
                                <div class="form-row form-group">
                                    <div>
                                        <label class="form-label">Expiry Date</label>
                                        <input type="text" class="form-input" placeholder="MM/YY" maxlength="5">
                                    </div>
                                    <div>
                                        <label class="form-label">CVV</label>
                                        <input type="text" class="form-input" placeholder="123" maxlength="3">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <label class="form-label">Card Holder Name</label>
                                    <input type="text" class="form-input" placeholder="John Doe">
                                </div>
                                <button class="btn w-full mt-4" onclick="processPayment('card', <?php echo $pgListing['deposit']; ?>, '<?php echo htmlspecialchars($pgListing['name']); ?>')">Pay Rs <?php echo number_format($pgListing['deposit']); ?></button>
                            </div>
                            
                            <!-- UPI Payment Form -->
                            <div class="payment-form" id="upi-form">
                                <h4 class="font-semibold mb-3">Enter UPI ID</h4>
                                <div class="form-row">
                                    <label class="form-label">UPI ID</label>
                                    <input type="text" class="form-input" placeholder="yourname@upi">
                                </div>
                                <button class="btn w-full mt-4" onclick="processPayment('upi', <?php echo $pgListing['deposit']; ?>, '<?php echo htmlspecialchars($pgListing['name']); ?>')">Pay Rs <?php echo number_format($pgListing['deposit']); ?></button>
                            </div>
                            
                            <!-- Net Banking Form -->
                            <div class="payment-form" id="netbanking-form">
                                <h4 class="font-semibold mb-3">Select Your Bank</h4>
                                <div class="form-row">
                                    <label class="form-label">Bank Name</label>
                                    <select class="form-input">
                                        <option value="">Select Bank</option>
                                        <option value="sbi">State Bank of India</option>
                                        <option value="hdfc">HDFC Bank</option>
                                        <option value="icici">ICICI Bank</option>
                                        <option value="axis">Axis Bank</option>
                                        <option value="pnb">Punjab National Bank</option>
                                    </select>
                                </div>
                                <button class="btn w-full mt-4" onclick="processPayment('netbanking', <?php echo $pgListing['deposit']; ?>, '<?php echo htmlspecialchars($pgListing['name']); ?>')">Pay Rs <?php echo number_format($pgListing['deposit']); ?></button>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="p-10 text-center">
                            <i class="fas fa-ban text-red-500 text-5xl mb-4"></i>
                            <h3 class="text-xl font-bold mb-2">This PG is Already Booked</h3>
                            <p class="text-gray-600">Sorry, this accommodation is no longer available. Please check our other listings.</p>
                            <a href="inner_ludhiana.php" class="btn inline-block mt-4">View Other PGs</a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <footer class="text-center text-gray-500">
            <p>© 2025 PG Finder. Locations in Ludhiana, Punjab</p>
        </footer>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const carouselInner = document.getElementById('carouselInner');
            const prevBtn = document.getElementById('prevBtn');
            const nextBtn = document.getElementById('nextBtn');
            const carouselDots = document.getElementById('carouselDots');
            let currentIndex = 0;
            const totalImages = <?php echo count($pgListing['images']); ?>;

            // Navigation buttons
            nextBtn.addEventListener('click', function(e) {
                e.preventDefault();
                currentIndex = (currentIndex + 1) % totalImages;
                updateCarousel();
            });

            prevBtn.addEventListener('click', function(e) {
                e.preventDefault();
                currentIndex = (currentIndex - 1 + totalImages) % totalImages;
                updateCarousel();
            });

            // Dot navigation
            carouselDots.addEventListener('click', function(e) {
                if (e.target.classList.contains('carousel-dot')) {
                    currentIndex = parseInt(e.target.getAttribute('data-index'));
                    updateCarousel();
                }
            });

            function updateCarousel() {
                // Update carousel position
                carouselInner.style.transform = `translateX(-${currentIndex * 100}%)`;

                // Update active dot
                const dots = document.querySelectorAll('.carousel-dot');
                dots.forEach((dot, index) => {
                    dot.classList.toggle('active', index === currentIndex);
                });
            }

            // Tab navigation
            const tabButtons = document.querySelectorAll('.tab-btn');
            const tabContents = document.querySelectorAll('.tab-content');
            
            tabButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const tabId = button.getAttribute('data-tab');
                    
                    // Remove active class from all buttons and tabs
                    tabButtons.forEach(btn => btn.classList.remove('active'));
                    tabContents.forEach(content => content.classList.remove('active'));
                    
                    // Add active class to current button and tab
                    button.classList.add('active');
                    document.getElementById(`${tabId}-tab`).classList.add('active');
                });
            });
            
            // Book Now button
            const openBookingBtn = document.getElementById('openBookingBtn');
            if (openBookingBtn) {
                openBookingBtn.addEventListener('click', () => {
                    // Switch to payment tab
                    tabButtons.forEach(btn => btn.classList.remove('active'));
                    tabContents.forEach(content => content.classList.remove('active'));
                    
                    document.querySelector('[data-tab="payment"]').classList.add('active');
                    document.getElementById('payment-tab').classList.add('active');
                });
            }
            
            // Payment method selection
            const paymentOptions = document.querySelectorAll('.payment-option');
            const paymentForms = document.querySelectorAll('.payment-form');
            
            paymentOptions.forEach(option => {
                option.addEventListener('click', () => {
                    const method = option.getAttribute('data-method');
                    
                    // Remove selected class from all options
                    paymentOptions.forEach(opt => opt.classList.remove('selected'));
                    
                    // Hide all payment forms
                    paymentForms.forEach(form => form.style.display = 'none');
                    
                    // Add selected class to clicked option
                    option.classList.add('selected');
                    
                    // Show the selected payment form
                    document.getElementById(`${method}-form`).style.display = 'block';
                });
            });
        });

        // Function to process payment and redirect to success page
        function processPayment(method, amount, pgName) {
            // Show loading state
            const button = event.target;
            const originalText = button.innerHTML;
            button.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Processing...';
            button.disabled = true;
            
            // Simulate payment processing (2 seconds delay)
            setTimeout(function() {
                // Redirect to payment success page with parameters
                window.location.href = `payment_success.php?amount=${amount}&pg_name=${encodeURIComponent(pgName)}&method=${method}`;
            }, 2000);
        }
    </script>
</body>
</html>