<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    http_response_code(401);
    echo json_encode(["status" => "error", "message" => "Unauthorized"]);
    exit();
}

include '../db.php';

// ✅ Decode JSON input
$input = json_decode(file_get_contents('php://input'), true);
$title = $input['title'] ?? '';
$content = $input['content'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($title) && !empty($content)) {
        $stmt = $conn->prepare("INSERT INTO announcements (heading, content) VALUES (?, ?)");
        $stmt->bind_param("ss", $title, $content);

        if ($stmt->execute()) {
            echo json_encode(["status" => "success"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Database error: " . $conn->error]);
        }

        $stmt->close();
    } else {
        echo json_encode(["status" => "error", "message" => "Missing title or content"]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request method"]);
}

$conn->close();
?>
