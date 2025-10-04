<?php 
// Database configuration
$database_url = $_ENV['JAWSDB_URL'] ?? $_ENV['DATABASE_URL'] ?? '';
if ($database_url) {
    // Parse Heroku's JAWSDB_URL for MySQL
    $url = parse_url($database_url);
    $host = $url['host'];
    $port = $url['port'] ?? 3306;
    $database = ltrim($url['path'], '/');
    $username = $url['user'];
    $password = $url['pass'];
    
    $conn = new mysqli($host, $username, $password, $database, $port);
    if ($conn->connect_error) {
        error_log("Database connection failed: " . $conn->connect_error);
        die("Database connection failed.");
    }
} else {
    // Fallback for local development
    $conn = new mysqli("localhost", "root", "", "anipaca");
    if ($conn->connect_error) {
        error_log("Database connection failed: " . $conn->connect_error);
        die("Database connection failed.");
    }
}
// Website configuration
$websiteTitle = "AniPaca";
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https" : "http";
$websiteUrl = "{$protocol}://{$_SERVER['SERVER_NAME']}";
$websiteLogo = $websiteUrl . "/public/logo/logo.png";
$contactEmail = "contact@anipaca.com";

$version = "2.1";

// Social links
$discord = "https://dcd.gg/anipaca";
$github = "https://github.com/PacaHat";
$telegram = "https://t.me/anipaca";
$instagram = "https://www.instagram.com/pxr15_"; 

// API endpoints - UPDATE THESE WITH YOUR DEPLOYED API URLS
$zpi = $_ENV['ZEN_API_URL'] ?? "https://zen-api-pi.vercel.app/api";
$proxy = $websiteUrl . "/src/ajax/proxy.php?url="; // Use built-in proxy

// Banner image
$banner = $websiteUrl . "/public/images/banner.png";
?>
