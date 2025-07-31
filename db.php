<?php
// --- DATABASE CONNECTION ---
// This file establishes a connection to the MySQL database.

// --- Configuration ---
// For security, it's best to store these details in environment variables (.env file)
// and not directly in the code. For this example, we'll define them here.
define('DB_HOST', 'localhost');       // Your database host (often 'localhost')
define('DB_USER', 'your_db_user');    // Your database username
define('DB_PASS', 'your_db_password'); // Your database password
define('DB_NAME', 'aura_shop_db');     // Your database name

// --- Create Connection ---
// We use MySQLi for a secure, object-oriented connection.
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// --- Check Connection ---
// If the connection fails, we stop the script and show an error.
// This prevents the website from trying to run with a broken database link.
if ($conn->connect_error) {
    // In a real application, you would log this error instead of showing it to the user.
    die("Connection failed: " . $conn->connect_error);
}

// --- Set Character Set ---
// This ensures that text (like product names) is handled correctly.
$conn->set_charset("utf8mb4");

// The $conn object is now ready to be used by other PHP files.
?>
