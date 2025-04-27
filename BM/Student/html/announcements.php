<?php
session_start();

// Redirect if not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: Login-Student.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>WellnessConnect</title>

  <link rel="stylesheet" href="../css/Announcements.css" />
  <link rel="stylesheet" href="../css/Header.css" />
</head>
<body>

<!-- Navigation bar -->
<header>
  <div class="logo">WellnessConnect</div>
  <nav>
    <ul>
      <li><a href="Home.php">Home</a></li>
      <li><a href="announcements.php">Announcements</a></li>
      <li><a href="#">Self help</a>
        <ul class="dropdown">
          <li><a href="#">Articles</a>
            <ul class="nested-dropdown">
              <li><a href="https://www.healthline.com/health/depression/how-to-fight-depression?" target="_blank">Depression</a></li>
              <li><a href="https://health.clevelandclinic.org/grounding-techniques?" target="_blank">Anxiety</a></li>
              <li><a href="https://www.berkeleywellbeing.com/stress-management.html?" target="_blank">Stress</a></li>
              <li><a href="https://www.sweetgrass-therapy.com/blog/how-to-heal-from-childhood-trauma" target="_blank">Childhood Trauma</a></li>
              <li><a href="https://www.betterup.com/blog/how-to-improve-self-esteem?" target="_blank">Self-esteem concerns</a></li>
              <li><a href="https://www.helpguide.org/mental-health/grief/coping-with-grief-and-loss" target="_blank">Grief and loss</a></li>
              <li><a href="https://www.harmonyrecoverync.com/self-care-for-addiction-recovery-30-tips-for-supporting-your-sobriety/?" target="_blank">Addictions</a></li>
              <li><a href="https://www.mindbodygreen.com/articles/family-issues?" target="_blank">Family issues</a></li>
            </ul>
          </li>
          <li><a href="#">Tests</a>
            <ul class="nested-dropdown">
              <li><a href="Depression_Test.php">Depression</a></li>
              <li><a href="Anxiety_Test.php">Anxiety</a></li>
              <li><a href="Stress_Test.php">Stress</a></li>
            </ul>
          </li>
        </ul>
      </li>
      <li><a href="SB2.php">Slot booking</a></li>
      <li><a href="../html/Contact-Us.php">Contact us</a></li>

      <?php if (isset($_SESSION['user_id'])): ?>
        <li><a href="../../php/logout.php" class="button1" style="background-color: #c9302c">Logout</a></li>
      <?php else: ?>
        <li><a href="Login-Student.php" class="button1">LOGIN</a></li>
      <?php endif; ?>
    </ul>
  </nav>
</header>

<main id="announcements-container">
  <h1 class="section-title">Latest Announcements</h1>
  <!-- Announcements will be injected here via JS -->
</main>

<script src="../js/Announcements.js"></script>
</body>
</html>
