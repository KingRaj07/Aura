<?php
// --- PRODUCTS API ENDPOINT ---
// This file fetches all products from the database and returns them as JSON.

// --- Headers ---
// These headers tell the browser that we are sending JSON data,
// and allow any website to access this API (CORS).
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");

// --- Include Database Connection ---
// We use 'require_once' to include the db.php file. If it can't be found,
// the script will stop, preventing errors.
require_once 'db.php';

// --- SQL Query ---
// A simple and secure query to select all columns from the 'products' table.
$sql = "SELECT * FROM products ORDER BY created_at DESC";

// --- Execute Query ---
$result = $conn->query($sql);

// --- Process Results ---
$products = array(); // Create an empty array to hold our products.

if ($result->num_rows > 0) {
    // Loop through each row of the result from the database.
    while($row = $result->fetch_assoc()) {
        // Add the row (which is an associative array) to our products array.
        $products[] = $row;
    }
}

// --- Close Connection ---
// It's good practice to close the database connection when we're done with it.
$conn->close();

// --- Return JSON Response ---
// We use json_encode to convert our PHP array of products into a JSON string,
// which JavaScript can easily understand.
echo json_encode($products);
?>
