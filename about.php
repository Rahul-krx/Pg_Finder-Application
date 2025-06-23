<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PG Finder - About Us</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
        }
        /* Navbar Styles */
        .navbar {
            background-color: #fff;
            padding: 10px 0;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .navbar-container {
            max-width: 1200px;
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
        /* Secondary Navigation */
        .secondary-nav {
            background-color: #f5f5f5;
            padding: 10px 0;
        }
        .secondary-nav-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }
        .breadcrumb a {
            text-decoration: none;
            color: #00b3b3;
        }
        /* Main Content Styles */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }
        .page-title {
            color: #0e4c92;
            font-size: 2.2rem;
            margin-top: 40px;
            margin-bottom: 20px;
        }
        .title-underline {
            width: 100px;
            height: 3px;
            background-color: #0e9dd9;
            margin-bottom: 30px;
        }
        .content-section {
            margin-bottom: 50px;
        }
        .section-title {
            color: #0e4c92;
            font-size: 1.8rem;
            margin-bottom: 20px;
        }
        .section-underline {
            width: 80px;
            height: 3px;
            background-color: #0e9dd9;
            margin-bottom: 25px;
        }
        .description {
            line-height: 1.6;
            margin-bottom: 20px;
        }
        .featured-image {
            width: 100%;
            max-width: 600px;
            display: block;
            margin: 30px 0;
        }
        .content-columns {
            display: flex;
            flex-wrap: wrap;
            margin-bottom: 50px;
        }
        .text-column {
            flex: 1;
            padding-right: 30px;
        }
        .image-column {
            flex: 1;
        }
        .building-image {
            width: 100%;
            max-height: 600px;
            object-fit: cover;
        }
       
        @media (max-width: 768px) {
            .content-columns {
                flex-direction: column;
            }
            .text-column, .image-column {
                width: 100%;
                padding-right: 0;
            }
        }
        .featured-image{
            margin-top:-13px;
            margin-left:-10px;
            height:380px;
        }
    </style>
</head>
<body>
    <?php
    // Define content variables
    $pageTitle = "About us";
    $mainDescription = " PG Finder is a technology-based platform for Booking PG, Serviced Apartments, Shared Flat and Rooms <br> by Location with Specific requirement by filtering by Location, IT Parks, Land Mark, Price, Room type, Amenities, <br> Gender and Food. Presently we have Launched in Platform in Chennai, Coimbatore and Bangalore. We will soon <br> expand to all the Major Cities of the Country";
    
    $sectionTitle1 = "Who we are?";
    $sectionDescription1 = "We are a set of well-selected and chosen Paying Guest services. This is a platform where those, who are willing to open their homes to guests, meet the people looking for wonderful homes to stay in and not have to look for hotels or favors in any city for their long stays. We ensure the places listed and the people looking for a stay are selected based on careful filtering criteria so that both parties benefit and the safety of all involved persons is ensured. We know how important a safe home is to you at both ends of the deal and that is a promise we make.";
    
    $sectionTitle2 = "What we do?";
    $sectionDescription2 = "We put together a list of places where our guests can stay as a PG. This is done based on listings on our site by homeowners. We ensure that not only are they a safe home for the guest but the guest too is safe for them. These places can be searched based on locality, budget, need, and multiple other filters. Find the perfect PG stay or guest with us. <br> <br>

To meet our aim, we eliminate the two major problems a guest or host may face. The first of these is a lack of information for anyone new in a city. Our site will list all the information you can seek not just about the house and homeowners but also the locality and other aspects. The other is the loss of capital to a host when a paying guest leaves. We do not wish our homeowners and makers to lose money waiting for the next stroke of luck and therefore listing with us helps them find a guest sooner.";
    
    $sectionTitle3 = "What are we aiming at?";
    $sectionDescription3 = "Our aim and motto are simple and singular. To provide the guests with a PG that feels <br> like home best fitting their needs and the homeowners a guest who fits right in. To <br> attain this we work with homeowners and guests to give everyone involved the best possible <br>experience. <br>

Our method of arriving at this involves detailed verification of all parties, a good  <br>database of homes and guests and being updated in real-time ensuring there is no problem <br> for either party to find the right person/ home sitting where they are from their systems.<br> <br>

So come together home makers/ owners and guests to find what you seek. We hope we will <br> be able to give you what you seek with us. We hope to make the PG community a secure one <br> where all people get the best out of the system.";
    
    $featuredImagePath1 = "https://housing-images.n7net.in/4f2250e8/fad78c4772c29883bf52ae880e5896b1/v0/large/harsh_avenue-jail_road_1-nashik-shree_swami_buildcon.jpeg"; // Replace with your actual image path
    $featuredImagePath2 = "https://housing-images.n7net.in/4f2250e8/197751dda491218d675e90f6e0c25fb5/v0/large/rajashree_deepkund-kamatwade_gaon-nashik-rajashree_properties.jpeg"; // Replace with your actual image path
    $currentLocation = "phagwara"; // This would typically come from a URL parameter or database
    ?>

    <!-- Top Navbar -->
    <div class="navbar">
        <div class="navbar-container">
            <div class="logo-container">
                <div class="logo-img">PG</div>
                <span class="logo-text">PG Finder</span>
            </div>
            <div class="nav-links">
                <?php if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true): ?>
                    <a href="dashboard.php">
                        <i class="fas fa-user"></i> Welcome, <?php echo htmlspecialchars($_SESSION["name"]); ?>
                    </a>  |
                    <a href="logout.php">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                <?php else: ?>
                    <a href="signup.php"><i class="fas fa-user"></i> Signup</a> |
                    <a href="login.php"><i class="fas fa-sign-in-alt"></i> Login</a>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Secondary Navigation / Breadcrumb -->
    <div class="secondary-nav">
        <div class="secondary-nav-container">
            <div class="breadcrumb">
                <a href="index.php">Home</a> / <?php echo $pageTitle; ?>
            </div>
        </div>
    </div>
    
    <div class="container">
        <h1 class="page-title"><?php echo $pageTitle; ?></h1>
        <div class="title-underline"></div>
        
        <div class="content-section">
            <p class="description"><?php echo $mainDescription; ?></p>
        </div>
        
        <div class="content-columns">
            <div class="image-column">
                <img src="<?php echo $featuredImagePath1; ?>" alt="Apartment Interior" class="featured-image">
            </div>
            
            <div class="text-column">
                <h2 class="section-title"><?php echo $sectionTitle1; ?></h2>
                <div class="section-underline"></div>
                <p class="description"><?php echo $sectionDescription1; ?></p>
            </div>
        </div>
        
        <!-- What we do section -->
        <div class="content-columns">
            <div class="text-column">
                <h2 class="section-title"><?php echo $sectionTitle2; ?></h2>
                <div class="section-underline"></div>
                <p class="description"><?php echo $sectionDescription2; ?></p>
            </div>
            
            <div class="image-column">
                <img src="<?php echo $featuredImagePath2; ?>" alt="Modern Building" class="building-image">
            </div>
        </div>
        
        
        <div class="content-section">
            <h2 class="section-title"><?php echo $sectionTitle3; ?></h2>
            <div class="section-underline"></div>
            <p class="description"><?php echo $sectionDescription3; ?></p>
        </div>
    </div>
    
           <!-- footer -->
    
    <footer class="bg-gray-800 text-white py-5">
    <div class="container mx-auto">
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

        <div class="text-center text-sm">
            &copy; <?php echo date('Y'); ?> PG Finder. All Rights Reserved.
        </div>
    </div>
</footer>




    
</body>
</html>