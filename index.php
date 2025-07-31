<?php
// --- SIMPLE API ROUTER ---
// This file directs incoming requests to the correct endpoint file.

// --- Get the requested path from the URL ---
// For example, if the URL is "yourwebsite.com/api/products",
// the request URI might be "/api/products".
$request_uri = $_SERVER['REQUEST_URI'];

// --- Simple Routing Logic ---
// We use a switch statement to handle different API paths.
// As we add more features (like users, orders), we will add more cases here.
switch ($request_uri) {
    // If the request is for '/products' or '/api/products'
    case '/products':
    case '/api/products':
        // Load the products.php file to handle the request.
        require __DIR__ . '/products.php';
        break;

    // Default case for any other request
    default:
        // Set a 404 Not Found HTTP status code.
        http_response_code(404);
        // Return a simple error message in JSON format.
        echo json_encode(
            array("message" => "Endpoint not found.")
        );
        break;
}
?>
