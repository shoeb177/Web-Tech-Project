<?php
$servername = "localhost";   // your server, usually localhost
$username = "root";          // your DB username
$password = "";              // your DB password
$dbname = "car_rental";     // your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
