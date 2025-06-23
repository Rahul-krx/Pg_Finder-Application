<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PG Finder</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
    .hero-section {
        background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('https://t3.ftcdn.net/jpg/01/98/23/58/360_F_198235898_DLqECcCxh90nbw3J3RKE3h3D4EmgB3bF.jpg');
        background-size: cover;
        background-position: center;
        color: white;
        padding: 120px 0;
        text-align: center;
    }

    .city-card {
        text-align: center;
        transition: transform 0.3s;
    }

    .city-card:hover {
        transform: translateY(-10px);
    }

    .city-img {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        background-color: #f8f9fa;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
    }

    .logo {
        height: 40px;
    }

    .navbar {
        padding: 15px 0;

    }

    .navbar-nav {
        display: flex;
        /* flex-direction: row; */
        align-items: center;
        justify-content: space-around;

    }

    .navbar-nav . .img-fluid {
        border-radius: 50%;
    }

    .complain a {
        /* color: red; */
        font-size: 17px;
        color: white;
        cursor: pointer;
        transition: color 0.3s;
        text-decoration: none;
    }

    .complain a:hover {
        color: #c99b93;
    }

    .nav-item {
        font-weight: 500;
        font-family: 'Poppins', sans-serif;
        /* color:red; */
        margin-left: 10px;
    }

    .item {
        font-weight: 600;
    }

    .text {
        font-size: 18px;
        font-weight: 600;
    }
    </style>
</head>

<body>
    <?php
   
    $cities = [
        [
            'name' => 'Phagwara',
            'icon' => 'https://bolt-gcdn.sc-cdn.net/3/OEgJAzZhPGc0O8LDDDJ7S?bo=EhgaABoAMgF9OgEEQgYIh4bqrwZIAlASYAE%3D&uc=18',
        ],
        [
            'name' => 'Jalandhar',
            'icon' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSjwPccZKxqaGJC53ufz23nfFUNsMcfYY4Odg&s'
        ],
        [
            'name' => 'Lawgate',
            'icon' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSmZJJDOSC7aKOmb0dV8WYa46W6mUrBJwkUiQ&s'
        ],
        [
            'name' => 'Ludhiana',
            'icon' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSBXcTpXZaw3LDy4RqI9woO7gCuauOIgFahgg&s'
        ]
    ];
    ?>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand " href="#home">
                <img src="https://upload.wikimedia.org/wikipedia/commons/b/bf/IFCO_PG_%28Cinema%29.png" class="logo">
                <span class="text">PG Finder</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item item">
                        <a class="nav-link" href="index.php"><i class="fas fa-home me-2"></i>Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="complaint.php">Raise a Complaint</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="about.php"></i>About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="partner.php"></i>Partner Us</a>
                    </li>

                    <?php if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="dashboard.php">
                                <i class="fas fa-user me-2"></i>Welcome, <?php echo htmlspecialchars($_SESSION["name"]); ?>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="my_bookings.php">
                                <i class="fas fa-calendar-check me-2"></i>My Bookings
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">
                                <i class="fas fa-sign-out-alt me-2"></i>Logout
                            </a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="signup.php"><i class="fas fa-user me-2"></i>Signup</a>
                        </li>|
                        <li class="nav-item">
                            <a class="nav-link" href="login.php"><i class="fas fa-sign-in-alt me-2"></i>Login</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>


    <section class="hero-section">
        <div class="container">
            <h1 class="display-4 fw-bold mb-5">Find PG's Near Lpu</h1>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <?php if(isset($_GET['error']) && $_GET['error'] == 'nocity'): ?>
                        <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
                            City not found. Please search for Jalandhar, Lawgate, Ludhiana, or Phagwara.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>
                    <form action="search.php" method="GET">
                        <div class="input-group">
                            <input type="text" class="form-control form-control-lg" name="city"
                                placeholder="Search for pg`s"
                                list="cityList">
                            <datalist id="cityList">
                                <option value="Jalandhar">
                                <option value="Lawgate">
                                <option value="Ludhiana">
                                <option value="Phagwara">
                            </datalist>
                            <button class="btn btn-dark" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>


    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-5">Major Areas Near LPU</h2>
            <div class="row">
                <?php
                foreach ($cities as $city) { 
                   
                    $innerPage = 'inner_' . strtolower($city['name']) . '.php';
                ?>
                <div class="col-md-3 mb-4">
                    <a href="<?php echo $innerPage; ?>" class="text-decoration-none">
                        <div class="city-card">
                            <div class="city-img shadow-sm">
                                <img src="<?php echo $city['icon']; ?>" alt="<?php echo $city['name']; ?>"
                                    class="img-fluid p-3">
                            </div>
                            <h5 class="text-dark"><?php echo $city['name']; ?></h5>
                        </div>
                    </a>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white py-5">
        <div class="container">
            <div class="row">
                <!-- About Section -->
                <div class="col-md-4 mb-4">
                    <h5 class="text-uppercase fw-bold mb-3">PG Finder</h5>
                    <p>
                        Find your perfect PG near LPU with ease and convenience. Explore verified listings and enjoy a
                        seamless experience.
                    </p>
                </div>

                <!-- Contact Section -->
                <div class="col-md-4 mb-4">
                    <h5 class="text-uppercase fw-bold mb-3">Contact Us</h5>
                    <ul class="list-unstyled">
                        <li>
                            <i class="fas fa-envelope me-2"></i>
                            <a href="mailto:info@pgfinder.com"
                                class="text-white text-decoration-none">info@pgfinder.com</a>
                        </li>
                        <li>
                            <i class="fas fa-phone me-2"></i>
                            <a href="tel:+919876543210" class="text-white text-decoration-none hover:underline">+91
                                9876543210</a>
                        </li>
                    </ul>
                </div>

                <!-- Quick Links Section -->
                <div class="col-md-4">
                    <h5 class="text-uppercase fw-bold mb-3">Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="index.php" class="text-white text-decoration-none"><i
                                    class="fas fa-home me-2"></i>Home</a></li>
                        <li><a href="about.php" class="text-white text-decoration-none"><i
                                    class="fas fa-info-circle me-2"></i>About Us</a></li>
                        <li><a href="complaint.php" class="text-white text-decoration-none"><i
                                    class="fas fa-exclamation-circle me-2"></i>Raise a Complaint</a></li>
                    </ul>
                </div>
            </div>

            <hr class="border-secondary my-4">

            <div class="text-center">
                <p class="mb-0">&copy; <?php echo date('Y'); ?> PG Finder. All Rights Reserved.</p>
            </div>
        </div>
    </footer>




    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>