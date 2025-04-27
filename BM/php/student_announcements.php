<?php
session_start();
include '../db.php';

$query = "SELECT heading AS title, content AS message FROM announcements ORDER BY id DESC";
$result = $conn->query($query);

$announcements = [];

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $announcements[] = $row;
    }
}

$conn->close();

header('Content-Type: application/json');
echo json_encode($announcements);
?>
