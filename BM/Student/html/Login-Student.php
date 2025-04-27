<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login Page</title>

  <link rel="stylesheet" href="../css/Login-Student.css" />
  <link rel="stylesheet" href="../css/Header.css" />
</head>
<body>

<!-- Navigation bar -->
<header>
  <div class="logo">WellnessConnect</div>
  <nav>
    <ul>
    <li><a href="Home.php">Home</a></li>
      <?php if (isset($_SESSION['user_id'])): ?>
        <li><a href="#">Anouncements</a></li>
        <li><a href="#">Self help</a>
          <ul class="dropdown">
            <li><a href="#">Articles</a>
              <ul class="nested-dropdown">
                <li><a href="https://www.healthline.com/health/depression/how-to-fight-depression?" target="_blank">Depression</a></li>
                <li><a href="https://health.clevelandclinic.org/grounding-techniques?" target="_blank">Anxiety</a></li>
                <li><a href="https://www.berkeleywellbeing.com/stress-management.html?" target="_blank">Stress</a></li>
                <li><a href="https://www.sweetgrass-therapy.com/blog/how-to-heal-from-childhood-trauma" target="_blank">Childhood Trauma</a></li>
                <li><a href="https://www.betterup.com/blog/how-to-improve-self-esteem?" target="_blank">Self-esteem concerns</a></li>
                <li><a href="https://www.helpguide.org/mental-health/grief/coping-with-grief-and-loss" target="_blank">Gief and loss</a></li>
                <li><a href="https://www.harmonyrecoverync.com/self-care-for-addiction-recovery-30-tips-for-supporting-your-sobriety/?" target="_blank">Addictions</a></li>
                <li><a href="https://www.mindbodygreen.com/articles/family-issues?" target="_blank">Family issues</a></li>
              </ul>
            </li>
            <li><a href="#">Tests</a>
              <ul class="nested-dropdown">
                <li><a href="../html/Depression_Test.html">Depression</a></li>
                <li><a href="../html/Anxiety_Test.html">Anxiety</a></li>
                <li><a href="../html/Stress_Test.html">Stress</a></li>
              </ul>
            </li>
          </ul>
        </li>
        <li><a href="../html/SB2.html">Slot booking</a></li>
      <?php endif; ?>

      <li><a href="../html/Contact-Us.php">Contact us</a></li>

      <?php if (isset($_SESSION['user_id'])): ?>
        <li><a href="../php/logout.php" class="button1" style="background-color: #c9302c">Logout</a></li>
      <?php else: ?>
        <li><a href="/BM/student/html/login.html" class="button1">LOGIN</a></li>
      <?php endif; ?>
    </ul>
  </nav>
</header>

<!-- Page content below header -->
<div class="page-content">
  <div class="login-wrapper">
    <main class="login-container">
      <h2>Login to Your Account</h2>

      <?php if (isset($_GET['error'])): ?>
        <p style="color: red;">Invalid username or password. Please try again.</p>
      <?php endif; ?>

      <form action="/BM/php/login.php" method="POST">
        <div class="input-group">
          <label for="username">Email</label>
          <input type="email" id="username" name="email" required />
        </div>
        <div class="input-group">
          <label for="password">Password</label>
          <input type="password" id="password" name="password" required />
        </div>
        <button type="submit" class="login-btn">Login</button>
        <p class="register-link">Don't have an account? <a href="Sign-Up.php">Sign up</a></p>
      </form>
    </main>
  </div>
</div>

</body>
</html>
