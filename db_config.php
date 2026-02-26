<?php
// db_config.php — Database connection settings for XAMPP
// Place this file in your project root: C:\xampp\htdocs\nepal-voting\

define('DB_HOST', 'sql209.infinityfree.com');
define('DB_USER', 'if0_41241132');       // Default XAMPP username
define('DB_PASS', 'tQF6W6195oPXoAa');           // Default XAMPP password (empty)
define('DB_NAME', 'if0_41241132_nepal_voting');
define('DB_PORT', 3306);

function getDB()
{
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);
    if ($conn->connect_error) {
        http_response_code(500);
        die(json_encode([
            'success' => false,
            'message' => 'Database connection failed: ' . $conn->connect_error
        ]));
    }
    $conn->set_charset('utf8mb4');
    return $conn;
}
