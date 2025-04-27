<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Home | WellnessConnect</title>

  <link rel="stylesheet" href="../css/Home.css" />
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
        <li><a href="announcements.php">Anouncements</a></li>
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
                <li><a href="Depression_Test.php">Depression</a></li>
                <li><a href="Anxiety_Test.php">Anxiety</a></li>
                <li><a href="Stress_Test.php">Stress</a></li>
              </ul>
            </li>
          </ul>
        </li>
        <li><a href="SB2.php">Slot booking</a></li>
      <?php endif; ?>

      <li><a href="../html/Contact-Us.php">Contact us</a></li>
      <?php if (isset($_SESSION['user_id'])): ?>
        <li><a href="../../php/logout.php" class="button1" style="background-color: #c9302c">Logout</a></li>
      <?php else: ?>
        <li><a href="login.html" class="button1">LOGIN</a></li>
      <?php endif; ?>
    </ul>
  </nav>

</header>

 <!-- front Section -->
 <section class="front">
        <div class="front-content">
            <h1>APSIT COUNSELLOR</h1>
            <p>Start your mental health journey today for a happy & bright tomorrow.</p>
            <a href="../html/Contact-Us.php" class="button2">Learn More</a>
        </div>
    </section>

    <!-- option Section --> 
    <section class="options">
        <h2>What are you looking for today?</h2>
        <div class="options-cards">
            <div class="card">
                <h3>Personal assessment</h3>
                <p>Common test to let one know his happiness index.</p>
            </div>
            <div class="card">
                <h3>Individual Therapy</h3>
                <p>Don't be shy book a slot today and take the first step towards improvement.</p>
            </div>
            <div class="card">
                <h3>Self-help article</h3>
                <p>An introvert who finds it hard to open up? Don't worry we got you.</p>
            </div>
        </div>
    </section>
</body>
</html>
