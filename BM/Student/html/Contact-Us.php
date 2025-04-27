<?php
session_start();

// Check if student is logged in
$isLoggedIn = isset($_SESSION['student_email']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us - WellnessConnect</title>
  <link rel="stylesheet" href="../css/Contact-Us.css">
  <link rel="stylesheet" href="../css/Header.css">
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
                <li><a href="../html/Depression_Test.php">Depression</a></li>
                <li><a href="../html/Anxiety_Test.php">Anxiety</a></li>
                <li><a href="../html/Stress_Test.php">Stress</a></li>
              </ul>
            </li>
          </ul>
        </li>
        <li><a href="../html/SB2.php">Slot booking</a></li>
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

  <!-- Contact Us Section -->
  <section class="contact-us">
    <h2>Contact Us</h2>
    <div class="contact-container">
      <div class="contact-info">
        <h3>Ms. Darshana K. Jain</h3>
        <p><strong>Counsellor/Psychologist</strong></p>
        <p>Humanities and Applied Sciences Department</p>
        <p>Email: <a href="mailto:dkjain@apsit.org.in">dkjain@apsit.org.in</a></p>
        <p><strong>Phone No :-</strong> +91 8652769138</p>
        <p><strong>Working days and Time:</strong> Monday to Friday: 09:00 AM - 05:00 PM</p>
        <p><strong>Office:</strong> Room No. 116 (1st floor- C wing)</p>

        <h4>Qualification</h4>
        <ul>
          <li>M.A. in Applied Psychology, University of Mumbai (2015)</li>
          <li>B.A. in Psychology, Mithibai College (2013)</li>
        </ul>

        <h4>Workshops and Training Programs Attended</h4>
        <ul>
          <li>Basic Course in Integrated Clinical Hypnosis, California Hypnosis Institute of India</li>
          <li>Intensive Clinical Training in Psychotherapy, Desousa Foundation</li>
          <li>Training in Transactional Analysis with Gestalt work by Mr. Ashish Kordy</li>
          <li>Session on Clinical Testing (RoR and TAT), Dr. Avinash Desousa</li>
          <li>Workshop on “Neuro Linguistic Programming” by Ram Verma</li>
          <li>Workshop on "Teachers as Mental Health Soldiers", Dr. Harsh Shetty</li>
          <li>5th Annual Drishhti Symposium on “Technology Innovation Inclusion”</li>
          <li>Workshop on “Turning into a Healthy Parent Child Relationship”</li>
          <li>Personality Development Course, Mithibai College</li>
          <li>Workshop on “Developing Full Human Potential Enhancement of Life Skills”</li>
          <li>National Seminar on “Panchayat Raj and Youth Empowerment”</li>
          <li>10 days course of Vipassana, Dhamma Giri, Igapuri</li>
        </ul>

        <h4>Paper Presentation</h4>
        <p>Presented Paper on “Women Sarpanch in Maharashtra: A Psychosocial Study” at the 102nd Indian Science Congress, University of Mumbai (2015).</p>
      </div>
      <div class="contact-photo">
        <img src="../images/Contact-Us.PNG" alt="Contact Image">
      </div>
    </div>
  </section>

</body>
</html>
