<?php
session_start();

// Get the search query and convert to lowercase for case-insensitive comparison
$search = strtolower(trim($_GET['city']));

// Define valid cities and their corresponding pages
$valid_cities = [
    'jalandhar' => 'inner_jalandhar.php',
    'lawgate' => 'inner_lawgate.php',
    'ludhiana' => 'inner_ludhiana.php',
    'phagwara' => 'inner_phagwara.php'
];

// Check if the search matches any valid city
$found = false;
foreach ($valid_cities as $city => $page) {
    // Check if the search term is contained within the city name
    if (strpos($city, $search) !== false) {
        header("Location: " . $page);
        $found = true;
        exit;
    }
}

// If no match found, redirect back to index with error
if (!$found) {
    header("Location: index.php?error=nocity");
    exit;
}
?> 