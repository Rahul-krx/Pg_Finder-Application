<?php
require_once "config.php";

$drop_table = "DROP TABLE IF EXISTS wishlist";
if(mysqli_query($conn, $drop_table)) {
    echo "Wishlist table dropped successfully.";
} else {
    echo "Error dropping table: " . mysqli_error($conn);
}

mysqli_close($conn);
?> 