<?php
session_start();
include("../db.php");

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: ../Student/html/Login-Student.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Delete the booking associated with this user
$stmt = $conn->prepare("DELETE FROM bookings WHERE user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();

// Optional: Add feedback message via session (not shown in UI here)
// $_SESSION['message'] = "Booking canceled successfully.";

// Redirect back to slot booking page
header("Location: ../Student/html/SB2.php");
exit();
?>
