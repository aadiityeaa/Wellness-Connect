
<?php
session_start();
include("../db.php");

// Only allow if user is logged in
if (!isset($_SESSION['user_id'])) {
    exit(); // No output, just silent fail or handle on client
}

// Decode JSON input
$data = json_decode(file_get_contents("php://input"), true);

// Basic validation
if (!isset($data['date'], $data['time'])) {
    exit(); // silent exit or handle error client-side
}

$date = $data['date'];
$time = $data['time'];
$user_id = $_SESSION['user_id'];

// Check if user already booked
$check = $conn->prepare("SELECT id FROM bookings WHERE user_id = ?");
$check->bind_param("i", $user_id);
$check->execute();
$res = $check->get_result();

if ($res->num_rows > 0) {
    exit(); // Already booked — handle on client
}

// Insert booking
$stmt = $conn->prepare("INSERT INTO bookings (user_id, date, time) VALUES (?, ?, ?)");
$stmt->bind_param("iss", $user_id, $date, $time);
$stmt->execute();
?>
