<?php
session_start();
// Include the accommodations array
$accommodations = [
    [
        'id' => 1,
        'name' => 'Brothers PG',
        'address' => '7M4W+7HF, Law Gate Rd, Punjab 144411',
        'rating' => 4.5,
        'price' => 5000,
        'gender' => 'male', // male, female, or both
        'interested' => 38,
        'Availability' => 'Available',
        'deposit' => 3500,
        'lat' => 31.2207,
        'lng' => 75.7704,
        'nearby' => [
            'LPU University - 1.2 km',
            'Law Gate Market - 0.5 km',
            'Phagwara Bus Stand - 3 km',
            'Phagwara Railway Station - 4 km'
        ],
        'images' => ['https://housing-images.n7net.in/01c16c28/4d2cc7877c9572ddb526ba5808710216/v0/medium/3_rk_-for-rent-sector_45-Gurgaon-single_room.jpg',
        'https://lh3.googleusercontent.com/p/AF1QipP9_wj5yuZhq6oN2S6pFuSvIhBs6jIt-a5gJTJe=s1360-w1360-h1020'
            
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
        'about' => 'Move into Perfect PG, a professionally managed PG home in the Main Market Dakoha, Jalandhar. Located in a safe neighborhood, this unisex PG offers various modern amenities for your comfort, such as Power Backup, Wi-Fi, TV etc. This PG has double occupancy types. This PG is nearby major commercial and educational hubs. Please contact the seller to book this fast selling high in demand PG to stay.',
    ],
   
    [
        'id' => 2,
        'name' => 'AANAND PG ',
        'address' => '475, near LPU LAW GATE MEHARU, Phagwara, Punjab',
        'rating' => 3.5,
        'price' => 6000,
        'gender' => 'both',
        'interested' => 16,
        'Availability' => 'Available',
        'deposit' => 3800,
        'lat' => 31.2210,
        'lng' => 75.7710,
        'nearby' => [
            'LPU University - 1.0 km',
            'Law Gate Market - 0.3 km',
            'Phagwara Bus Stand - 3.2 km',
            'Phagwara Railway Station - 4.2 km'
        ],
        'images' => [
            'https://apollo.olx.in/v1/files/xpcn92je2upe1-ADVIN/image;s=780x0;q=60',
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
            'Food Quality' => 3.6,
            'Safety' => 4.7,
        ],
        'about' => 'Located in Near Jalandhar Distributary, Jalandhar , Decent PG is a modern and spacious PG home that is close to major educational commercial hubs in the area. This unisex PG offers all the comforts like AC, TV, Food, Power Backup, Wi-Fi, etc. The PG has strict adherence to hygiene standards and offers single, double, triple, four, other rooms. Please contact me in case you are interested or have queries. Looking forward to serving you.',
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
        'deposit' => 3200,
        'lat' => 31.2215,
        'lng' => 75.7715,
        'images' => [
            'https://apollo.olx.in/v1/files/5e1d7k54axli1-ADVIN/image;s=780x0;q=60',
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
            'Cleanliness' => 5.0,
            'Food Quality' => 4.6,
            'Safety' => 4.0,
        ],
        'about' => 'Located in Dakoha, Jalandhar, Homely PG is modern and spacious PG home is close to major educational commercial hubs in the area. Sardar Apartments PG offers students accommodation with all the comforts like Power Backup, Wi-Fi etc. The PG has strict adherence to hygiene standards and offers double rooms. Please contact in case you are interested or queries. Looking forward to serving you. ',
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
        'deposit' => 3400,
        'lat' => 31.2220,
        'lng' => 75.7720,
        'images' => [
            'https://apollo.olx.in/v1/files/ccn0lmnuvow72-IN/image;s=780x0;q=60',
            'https://content.jdmagicbox.com/v2/comp/bangalore/g2/080pxx80.xx80.200104135109.k2g2/catalogue/srm-pg-chamarajpet-bangalore-paying-guest-accommodations-for-men-qjfakk97b8.jpg',
            
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
        'about' => 'Move into Batchmate living Paying Guest/Hostels, A Professionally Managed PG Home in Reru, Jalandhar. Located in a Safe Neighborhood, This Male PG offers Various Modern Amenities For Your Comfort, Such as Food, Power Backup, Wi-Fi, etc. This PG has Single, Double, and Triple Occupancy types. This PG is Nearby Major Commercial and Educational hubs. Please Contact the Seller to Book this Fast Selling high in Demand PG Stay.',
    ],

    [
        'id' => 5,
        'name' => 'Centra Green PG',
        'address' => 'Maheru, Auto Stand, Law Gate Rd, At, Phagwara,',
        'rating' => 4.5,
        'price' => 4500,
        'gender' => 'male',
        'interested' => 9,
        'Availability' => 'Available',
        'deposit' => 3000,
        'lat' => 31.2225,
        'lng' => 75.7725,
        'images' => [
            'https://content.jdmagicbox.com/comp/noida/i8/011pxx11.xx11.190329185724.w2i8/catalogue/cripa-boyes-pg-noida-gcq1p18nlt.jpg',
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
        'about' => 'Move into Preeti PG, a professionally managed PG home in the Jalandhar Bypass Road, Jalandhar. Located in a safe neighborhood, this unisex PG offers various modern amenities for your comfort, such as Wi-Fi, TV etc. This PG has double occupancy types. This PG is nearby major commercial and educational hubs. Please contact the seller to book this fast selling high in demand PG stay.',
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
        'deposit' => 3600,
        'lat' => 31.2230,
        'lng' => 75.7730,
        'images' => [
            'https://housing-images.n7net.in/01c16c28/1c8e95a28de45277559b7ae43026c583/v0/medium/3_rk_-for-rent-sector_39_gurgaon-Gurgaon-bedroom.jpg',
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
        'about' => 'Located in Deep Nagar Road, Jalandha, The dhaliwal jalandhar cantt PG is Modern and Spacious PG Home is Close to Major Educational Commercial Hubs in the Area. This PG Offers all the Comforts Like Food etc. The PG has Strict Adherence to Hygiene Standards and Offers Single, Double Rooms. Please Contact in Case you are Interested or Queries. Looking forward to Serving you.',
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
        'deposit' => 3900,
        'lat' => 31.2235,
        'lng' => 75.7735,
        'images' => [
            'https://apollo.olx.in/v1/files/licxtmrn44ny-ADVIN/image;s=780x0;q=60',
            'https://zolostays.com/blog/wp-content/uploads/2023/11/0-cover-1160x773.jpg',
            
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
        'about' => 'Move into Ram Niwas For Boys/Hostels Jalandhar Bypass Road, Jalandhar. Located in a safe neighborhood, this Property offers various modern amenities for your comfort, such as Parking, etc. This Property is new construction having double room types available. This Property is nearby Curo Mall major commercial and educational hubs. Please contact to book this fast-selling high in demand residential stay.',
    ],

    [
        'id' => 8,
        'name' => 'Golden PG',
        'address' => '500 meter to lpu, Law Gate Rd, Phagwara, Punjab',
        'rating' => 4.0,
        'price' => 6000,
        'gender' => 'male',
        'interested' => 27,
        'Availability' => 'Available',
        'deposit' => 3700,
        'lat' => 31.2240,
        'lng' => 75.7740,
        'images' => [
            'https://lh3.googleusercontent.com/p/AF1QipMOIfJbEmv-Gz4sBI8Om9Cc5wps-qGCDjlB2-uU=s1360-w1360-h1020',
         'https://lh3.googleusercontent.com/p/AF1QipOfy_iWSkzjrhwkP0GnS8rAcdEjHWsIjt5V_-w-=s1360-w1360-h1020',
            
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
        'about' => 'Move into Ram Niwas For Boys/Hostels Jalandhar Bypass Road, Jalandhar. Located in a safe neighborhood, this Property offers various modern amenities for your comfort, such as Parking, etc. This Property is new construction having double room types available. This Property is nearby Curo Mall major commercial and educational hubs. Please contact to book this fast-selling high in demand residential stay.',
    ],

    [
        'id' => 9,
        'name' => 'The Grand Sardar PG',
        'address' => ' near Green Valley, LPU, Maheru, Punjab',
        'rating' => 4.2,
        'price' => 7000,
        'gender' => 'male',
        'interested' => 9,
        'Availability' => 'Available',
        'deposit' => 4000,
        'lat' => 31.2245,
        'lng' => 75.7745,
        'images' => [
            'https://lh3.googleusercontent.com/p/AF1QipNXdP0YmBm5D-oMsHQXQ6G08N_j4n_kTASRNlaN=s1360-w1360-h1020',
         'https://lh3.googleusercontent.com/p/AF1QipM9AfbZfDVbFwexpDt27wl6Y7pTAaWHGxs8QDg1=s1360-w1360-h1020'
            
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
        'about' => 'Move into Ram Niwas For Boys/Hostels Jalandhar Bypass Road, Jalandhar. Located in a safe neighborhood, this Property offers various modern amenities for your comfort, such as Parking, etc. This Property is new construction having double room types available. This Property is nearby Curo Mall major commercial and educational hubs. Please contact to book this fast-selling high in demand residential stay.',
    ],
    

    [
        'id' => 10,
        'name' => 'Tiger PG & Accommodations',
        'address' => 'University view ,Law gate phase 3, maheru, Phagwara',
        'rating' => 4.0,
        'price' => 5200,
        'gender' => 'male',
        'interested' => 50,
        'Availability' => 'Available',
        'deposit' => 3300,
        'lat' => 31.2250,
        'lng' => 75.7750,
        'images' => [
            'https://lh3.googleusercontent.com/p/AF1QipO047zMLbmueLLqhwY9Bq3QLXQjx0pvlwewWl8=s1360-w1360-h1020',
         'https://lh3.googleusercontent.com/p/AF1QipNTOB3rQQuET4-r6Z7nWYwVKoEGE4fmj7F14c8=s1360-w1360-h1020'
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
        'about' => 'Move into Ram Niwas For Boys/Hostels Jalandhar Bypass Road, Jalandhar. Located in a safe neighborhood, this Property offers various modern amenities for your comfort, such as Parking, etc. This Property is new construction having double room types available. This Property is nearby Curo Mall major commercial and educational hubs. Please contact to book this fast-selling high in demand residential stay.',
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
    echo "<h1 style='text-align:center; color:red;'>Nothing to show</h1>";
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
    <!-- Leaflet CSS for maps -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin=""/>
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
            transition: all 0.3s ease;
        }
        .btn:disabled {
            background-color: #ccc;
            cursor: not-allowed;
            opacity: 0.7;
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
        .p-6 {
            border: 1px solid black;
        }
        .status-available {
            color: green;
            font-weight: bold;
        }
        .status-booked {
            color: red;
            font-weight: bold;
        }
        .booking-status {
            font-size: 16px;
            margin-top: 10px;
            display: flex;
            align-items: center;
        }
        .status-indicator {
            display: inline-block;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            margin-right: 6px;
        }
        .indicator-available {
            background-color: green;
        }
        .indicator-booked {
            background-color: red;
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
        .form-row {
            margin-bottom: 15px;
        }
        .form-label {
            display: block;
            margin-bottom: 5px;
            font-weight: 500;
        }
        .form-input {
            width: 100%;
            padding: 10px;
            border: 1px solid #e2e8f0;
            border-radius: 4px;
        }
        .form-group {
            display: flex;
            gap: 10px;
        }
        .form-group .form-input {
            flex: 1;
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
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>

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
                <a href="inner_lawgate.php">Lawgate</a> /
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
                        
                        <!-- Availability Status -->
                        <div class="booking-status mt-2">
                            <span class="status-indicator <?php echo $pgListing['Availability'] == 'Available' ? 'indicator-available' : 'indicator-booked'; ?>"></span>
                            <span class="<?php echo $pgListing['Availability'] == 'Available' ? 'status-available' : 'status-booked'; ?>">
                                Booking Status: <?php echo htmlspecialchars($pgListing['Availability']); ?>
                            </span>
                        </div>
                    </div>
                    <div class="text-right">
                        <p class="text-xl font-semibold">Rs <?php echo number_format($pgListing['price']); ?> <span class="text-sm text-gray-500">per month</span></p>
                        
                        <!-- Book Now Button - Disabled if already booked -->
                        <?php if ($pgListing['Availability'] == 'Available'): ?>
                            <button class="btn mt-3" id="openBookingBtn">Book Now</button>
                        <?php else: ?>
                            <button class="btn mt-3" disabled>Already Booked</button>
                        <?php endif; ?>
                    </div>
                </div>
                
                <!-- Tab Navigation -->
                <div class="tab-container">
                    <div class="tab-buttons">
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
                        <iframe src="https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d3338.77890718255!2d75.6940766949646!3d31.255019438574234!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e6!4m5!1s0x391a5f41f8de65cb%3A0x19e454a7b356de02!2sBrothers%20PG%2C%20Law%20Gate%20Road%2C%20Punjab!3m2!1d31.255689999999998!2d75.6964292!4m5!1s0x391a5f6a0466231b%3A0xd755cdad1fd82da7!2sLaw%20Gate%20Rd%20Punjab%20144411!3m2!1d31.2543856!2d75.6964316!5e0!3m2!1sen!2sin!4v1745153429353!5m2!1sen!2sin" width="1000" height="420" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
                                <a href="inner_phagwara.php" class="btn inline-block mt-4">View Other PGs</a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <footer class="text-center text-gray-500">
            <p>© 2025 PG Finder. Locations in Phagwara, Punjab</p>
        </footer>
    </div>

    <!-- Leaflet JS for maps -->
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Carousel functionality
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
                    
                    // Initialize map when location tab is selected
                    if (tabId === 'location') {
                        initMap();
                    }
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
            
            // Initialize map
            function initMap() {
                // Check if map is already initialized
                if (window.map) return;
                
                // Create map
                window.map = L.map('map').setView([<?php echo $pgListing['lat']; ?>, <?php echo $pgListing['lng']; ?>], 15);
                
                // Add OpenStreetMap tile layer
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                }).addTo(window.map);
                
                // Add marker for PG location
                L.marker([<?php echo $pgListing['lat']; ?>, <?php echo $pgListing['lng']; ?>])
                    .addTo(window.map)
                    .bindPopup("<?php echo htmlspecialchars($pgListing['name']); ?>")
                    .openPopup();
            }
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