<?php 
// Database configuration
$conn = new mysqli(
    $_ENV['DB_HOST'] ?? "localhost", 
    $_ENV['DB_USER'] ?? "root", 
    $_ENV['DB_PASS'] ?? "", 
    $_ENV['DB_NAME'] ?? "anipaca"
);

if ($conn->connect_error) {
    error_log("Database connection failed: " . $conn->connect_error);
    die("Database connection failed.");
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
