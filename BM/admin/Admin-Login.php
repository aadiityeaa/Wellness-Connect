<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    // Admin credentials (you can link this to DB later)
    $adminEmail = 'admin@gmail.com';
    $adminPassword = 'Admin@123';

    if ($email === $adminEmail && $password === $adminPassword) {
        $_SESSION['admin'] = true;
        header("Location: AdminDashboard.php");
        exit();
    } else {
        header("Location: Admin-Login.php?error=1");
        exit();
    }
}
?> 

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin login</title>
  <link rel="stylesheet" href="../student/css/Sign-Up.css">
  <link rel="stylesheet" href="../student/css/Header.css">
</head>
<body>

<!-- Navigation bar -->
<header>
  <div class="logo">WellnessConnect</div>
  <nav>
    <ul>
    <li><a href="../student/html/Home.php">Home</a></li>
      <li><a href="../student/html/Contact-Us.php">Contact us</a></li>

      <?php if (isset($_SESSION['user_id'])): ?>
        <li><a href="../php/logout.php" class="button1">Logout</a></li>
      <?php else: ?>
        <li><a href="AdminDashboard.php" class="button1">LOGIN</a></li>
      <?php endif; ?>
    </ul>
  </nav>
</header>

<body>

<div class="page-content">
<div class="login-wrapper">
<main class="signup-container">
  <h2>Admin Login</h2>

  <?php if (isset($_GET['error'])): ?>
    <p style="color: red;">Invalid email or password.</p>
  <?php endif; ?>

  <form action="Admin-Login.php" method="POST">
    <div class="input-group">
      <label for="email">Email</label>
      <input type="email" id="email" name="email" required />
    </div>
    <div class="input-group">
      <label for="password">Password</label>
      <input type="password" id="password" name="password" required />
    </div>
    <button type="submit" class="signup-btn">Login</button>
  </form>
</main>
</div>
</div>

</body>
</html>
