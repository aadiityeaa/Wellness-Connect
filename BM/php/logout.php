<?php
session_start();
include '../db.php';

// Optional: If you're tracking active sessions in the DB, clean up here
if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];

    // Example: clear session info or update last_active/logout_time
    // $conn->query("UPDATE users SET last_active = NOW() WHERE id = $userId");
}

// Clear session data
session_unset();
session_destroy();

// Redirect to student home page
header("Location: ../Student/html/Home.php");
exit;
