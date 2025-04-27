<?php
session_start();
include("../db.php");

// Log file setup
$logFile = 'test_debug.log';
file_put_contents($logFile, "=== NEW REQUEST ===\n", FILE_APPEND);

// Step 1: Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    file_put_contents($logFile, "User not logged in\n", FILE_APPEND);
    die("Not logged in");
}

$user_id = $_SESSION['user_id'];
$test_type = $_POST['test_type'] ?? '';
$score = $_POST['score'] ?? '';

file_put_contents($logFile, "User ID: $user_id | Test: $test_type | Score: $score\n", FILE_APPEND);

// Step 2: Check if table exists
$tableCheck = $conn->query("SHOW TABLES LIKE 'test_results'");
if ($tableCheck->num_rows == 0) {
    file_put_contents($logFile, "Table 'test_results' does not exist\n", FILE_APPEND);
    die("Table does not exist");
}

// Step 3: Log columns for extra safety
$cols = $conn->query("SHOW COLUMNS FROM test_results");
$colList = [];
while ($row = $cols->fetch_assoc()) {
    $colList[] = $row['Field'];
}
file_put_contents($logFile, "Columns: " . implode(", ", $colList) . "\n", FILE_APPEND);

// Step 4: Prepare and insert
$stmt = $conn->prepare("INSERT INTO test_results (user_id, test_name, score) VALUES (?, ?, ?)");
if (!$stmt) {
    $error = "Prepare failed: " . $conn->error;
    file_put_contents($logFile, $error . "\n", FILE_APPEND);
    die($error);
}

$stmt->bind_param("iss", $user_id, $test_type, $score);

if ($stmt->execute()) {
    file_put_contents($logFile, "Insert successful\n", FILE_APPEND);
    echo "Insert successful";
} else {
    $error = "Insert failed: " . $stmt->error;
    file_put_contents($logFile, $error . "\n", FILE_APPEND);
    die($error);
}
?>
