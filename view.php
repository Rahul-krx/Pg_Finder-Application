<?php
session_start();
// Include the accommodations array
$accommodations = [
    [
        'id' => 1,
        'name' => 'G-1 Apartment',
        'address' => 'G-1 appartment, Maheru, Phagwara',
        'rating' => 4.5,
        'price' => 5000,
        'gender' => 'male',
        'interested' => 33,
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
        'Availability' => 'Available',
        'deposit' => 3000,
        'lat' => 31.2207,
        'lng' => 75.7704,
        'nearby' => [
            'LPU University - 1.2 km',
            'Law Gate Market - 0.5 km',
            'Phagwara Bus Stand - 3 km',
            'Phagwara Railway Station - 4 km'
        ],
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
        'Availability' => 'Available',
        'deposit' => 3000,
        'lat' => 31.2207,
        'lng' => 75.7704,
        'nearby' => [
            'LPU University - 1.2 km',
            'Law Gate Market - 0.5 km',
            'Phagwara Bus Stand - 3 km',
            'Phagwara Railway Station - 4 km'
        ],
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
        'Availability' => 'Available',
        'deposit' => 3000,
        'lat' => 31.2207,
        'lng' => 75.7704,
        'nearby' => [
            'LPU University - 1.2 km',
            'Law Gate Market - 0.5 km',
            'Phagwara Bus Stand - 3 km',
            'Phagwara Railway Station - 4 km'
        ],
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
        'Availability' => 'Available',
        'deposit' => 2500,
        'lat' => 31.2207,
        'lng' => 75.7704,
        'nearby' => [
            'LPU University - 1.2 km',
            'Law Gate Market - 0.5 km',
            'Phagwara Bus Stand - 3 km',
            'Phagwara Railway Station - 4 km'
        ],
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
        'Availability' => 'Available',
        'deposit' => 2500,
        'lat' => 31.2207,
        'lng' => 75.7704,
        'nearby' => [
            'LPU University - 1.2 km',
            'Law Gate Market - 0.5 km',
            'Phagwara Bus Stand - 3 km',
            'Phagwara Railway Station - 4 km'
        ],
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
        'Availability' => 'Available',
        'deposit' => 2000,
        'lat' => 31.2207,
        'lng' => 75.7704,
        'nearby' => [
            'LPU University - 1.2 km',
            'Law Gate Market - 0.5 km',
            'Phagwara Bus Stand - 3 km',
            'Phagwara Railway Station - 4 km'
        ],
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
        'about' => 'Contact at Move into Aman Hostels PG, a professionally managed PG home in Bhankoti road, Bhagatpura, Phagwara. Located in a safe neighborhood, this unisex PG offers various modern amenities for your comfort, such as Food, Power Backup, Wi-Fi etc. This PG has double occupancy types. This PG is nearby major commercial and educational hubs. Please contact the seller to book this fast selling high in demand PG stay.',
    ],
    [
        'id' => 10,
        'name' => 'GKaul Pg and Guest House',
        'address' => 'Gali Number 3, Prem Nagar, Guru Hargobind Nagar, Phagwara',
        'rating' => 4.0,
        'price' => 2500,
        'gender' => 'male',
        'interested' => 24,
        'Availability' => 'Available',
        'deposit' => 1500,
        'lat' => 31.2207,
        'lng' => 75.7704,
        'nearby' => [
            'LPU University - 1.2 km',
            'Law Gate Market - 0.5 km',
            'Phagwara Bus Stand - 3 km',
            'Phagwara Railway Station - 4 km'
        ],
        'images' => [
            'https://housing-images.n7net.in/01c16c28/1c8e95a28de45277559b7ae43026c583/v0/medium/3_rk_-for-rent-sector_39_gurgaon-Gurgaon-bedroom.jpg',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTnGDsd2DFPpOPc8MZiRVuXJS-pePD6VY-lTA&s',
           
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
            'Safety' => 3.7,
        ],
        'about' => 'Move into GKaul Pg and Guest House, a professionally managed PG home in the Gali Number 3, Prem Nagar, Guru Hargobind Nagar. Located in a safe neighborhood, this unisex PG offers various modern amenities for your comfort, such as Power Backup, Wi-Fi etc. This PG has double occupancy types. This PG is nearby major commercial and educational hubs. Please contact the seller to book this fast selling high in demand PG stay.',
    ],
    [
        'id' => 11,
        'name' => 'Veston PG',
        'address' => 'Veston Pg, Khalsa Enclave St No-4, Hadiabad, Phagwara',
        'rating' => 4.5,
        'price' => 7500,
        'gender' => 'male',
        'interested' => 14,
        'Availability' => 'Available',
        'deposit' => 4000,
        'lat' => 31.2207,
        'lng' => 75.7704,
        'nearby' => [
            'LPU University - 1.2 km',
            'Law Gate Market - 0.5 km',
            'Phagwara Bus Stand - 3 km',
            'Phagwara Railway Station - 4 km'
        ],
        'images' => [
            'https://images.jdmagicbox.com/comp/phagwara/h3/9999p1824.1824.180225100505.n3h3/catalogue/veston-pg-hadiabad-phagwara-paying-guest-accommodations-8vwebxn1uq.jpg',
            'https://content.jdmagicbox.com/comp/anand/j5/9999p2692.2692.221008122525.z8j5/catalogue/satkratu-pg-and-hostel-services-vallabh-vidyanagar-anand-hostels-nympli60x1.jpg',
            
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
        'about' => 'Fully furnished independent rooms with attached bathroom, small kitchen slab, full wardrobe, beds with mattresses, air conditioner, LED TV, and WiFi facilities. Homely environment with a lady owner and separate entrance to PG at the first floor. located in Khalsa Enclave St No-4, Hadiabad, Phagwara',
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

if (!$pgListing) {
    echo "<h1 style='text-align:center; color:red;'>Accommodation not found</h1>";
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
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
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
                <a href="inner_phagwara.php">Phagwara</a> /
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
                    <iframe src="https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d56861.91865785543!2d75.6994400418177!3d31.22882356714037!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e6!4m5!1s0x391af4cbf30492dd%3A0x422be8009b1e0052!2sG%20I%20Apartments%2C%20Onkar%20Nagar%2C%20Phagwara%2C%20Punjab!3m2!1d31.2013671!2d75.778391!4m5!1s0x391a5f5e9c489cf3%3A0x4049a5409d53c300!2sLovely%20Professional%20University%2C%20Grand%20Trunk%20Road%2C%20Phagwara%2C%20Punjab!3m2!1d31.255392099999998!2d75.7048678!5e0!3m2!1sen!2sin!4v1745174528717!5m2!1sen!2sin" width="100%" height="420" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
                                            <p class="text-sm text-gray-600">Pay directly from your bank account</p>
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
                        <div class="text-center py-8">
                            <h2 class="text-xl font-semibold mb-4">This PG is Currently Not Available</h2>
                            <p class="text-gray-600">Please check back later or explore other PGs in the area.</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <footer class="text-center text-gray-500">
            <p>© 2025 PG Finder. Locations in Phagwara, Punjab</p>
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