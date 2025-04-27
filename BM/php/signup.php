<?php
include('../db.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST['name'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    // Securely hash the password
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (name, phone, email, password_hash) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $phone, $email, $password_hash);

    if ($stmt->execute()) {
        header("Location: /BM/Student/html/Login-Student.php");
        exit();
    } else {
        echo "Signup failed: " . $stmt->error;
    }
}
?>
