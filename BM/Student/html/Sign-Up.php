<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Sign Up</title>

  <link rel="stylesheet" href="../css/Sign-Up.css" />
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

      <li><a href="../html/Contact-Us.html">Contact us</a></li>

      <?php if (isset($_SESSION['user_id'])): ?>
        <li><a href="../php/logout.php" class="button1" style="background-color: #c9302c">Logout</a></li>
      <?php else: ?>
        <li><a href="Login-Student.php" class="button1">LOGIN</a></li>
      <?php endif; ?>
    </ul>
  </nav>
</header>

<!-- Sign-Up Form -->
<div class="page-content">
<div class="login-wrapper">
<main class="signup-container">
  <h2>Create an Account</h2>

  <?php if (isset($_GET['error'])): ?>
    <p style="color: red;">Something went wrong. Please try again or use a different email.</p>
  <?php endif; ?>

  <form action="../../php/signup.php" method="POST" onsubmit="return validatePassword()">
    <div class="input-group">
      <label for="name">Full Name</label>
      <input type="text" id="name" name="name" required />
    </div>
    <div class="input-group">
      <label for="email">Email</label>
      <input type="email" id="email" name="email" required />
    </div>
    <div class="input-group">
      <label for="phone">Phone Number</label>
      <input type="tel" id="phone" name="phone" required />
    </div>
    <div class="input-group">
      <label for="password">Password</label>
      <input type="password" id="password" name="password" required />
    </div>
    <button type="submit" class="signup-btn">Sign Up</button>
    <p class="login-link">Already have an account? <a href="Login-Student.php">Login</a></p>
  </form>
</main>
</div>
</div>

</body>
</html>
