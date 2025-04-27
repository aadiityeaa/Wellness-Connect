<?php
$host = 'localhost';
$db   = 'wellness-connect'; // change to your actual database name
$user = 'root';
$pass = ''; // default is empty for XAMPP

// Create connection
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
