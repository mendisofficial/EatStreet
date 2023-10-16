<?php
require_once(__DIR__ . '/../vendor/autoload.php');

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

date_default_timezone_set("Asia/Colombo");
 
/* Attempt to connect to MySQL database */
$conn = mysqli_connect($_ENV['DB_HOST'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD'], $_ENV['DB_DATABASE']);
 
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>
