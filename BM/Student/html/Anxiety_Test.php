<?php
session_start();

// Redirect to login if not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: Login-Student.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Anxiety Test | WellnessConnect</title>

  <link rel="stylesheet" href="../css/Test.css" />
  <link rel="stylesheet" href="../css/Header.css" />
</head>
<body>

<!-- Navigation bar -->
<header>
  <div class="logo">WellnessConnect</div>
  <nav>
    <ul>
      <?php if (isset($_SESSION['user_id'])): ?>
        <li><a href="Home.php">Home</a></li>
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
        <li><a href="Login-Student.php" class="button1">LOGIN</a></li>
      <?php endif; ?>
    </ul>
  </nav>
</header>

<section class="intro">
    <h2>Anxiety Test</h2>
    <p>This test can help identify signs of anxiety by evaluating your answers.</p>
</section>

<div class="form-container">  
    <div class="form-title">Q1. The closer I am to a major exam, the harder it is for me to concentrate on the material</div>
    <form>
        <div class="option" onclick="selectOption('question1', 'option1')">
            <div class="circle" id="circle-question1-option1"></div>
            <span class="label">Not at all true</span>
            <input type="radio" name="question1" value="1" id="question1-option1" class="hidden-input">
        </div>

        <div class="option" onclick="selectOption('question1', 'option2')">
            <div class="circle" id="circle-question1-option2"></div>
            <span class="label">Slightly true</span>
            <input type="radio" name="question1" value="2" id="question1-option2" class="hidden-input">
        </div>

        <div class="option" onclick="selectOption('question1', 'option3')">
            <div class="circle" id="circle-question1-option3"></div>
            <span class="label">Moderately true</span>
            <input type="radio" name="question1" value="3" id="question1-option3" class="hidden-input">
        </div>

        <div class="option" onclick="selectOption('question1', 'option4')">
            <div class="circle" id="circle-question1-option4"></div>
            <span class="label">Highly true</span>
            <input type="radio" name="question1" value="4" id="question1-option4" class="hidden-input">
        </div>

        <div class="option" onclick="selectOption('question1', 'option5')">
            <div class="circle" id="circle-question1-option5"></div>
            <span class="label">Extremely true</span>
            <input type="radio" name="question1" value="5" id="question1-option5" class="hidden-input">
        </div>

        <div class="form-title">Q2. When I study, I worry that I will not remember the material on the exam</div>
    <form>
        <div class="option" onclick="selectOption('question2', 'option1')">
            <div class="circle" id="circle-question2-option1"></div>
            <span class="label">Not at all true</span>
            <input type="radio" name="question2" value="1" id="question2-option1" class="hidden-input">
        </div>

        <div class="option" onclick="selectOption('question2', 'option2')">
            <div class="circle" id="circle-question2-option2"></div>
            <span class="label">Slightly true</span>
            <input type="radio" name="question2" value="2" id="question2-option2" class="hidden-input">
        </div>

        <div class="option" onclick="selectOption('question2', 'option3')">
            <div class="circle" id="circle-question2-option3"></div>
            <span class="label">Moderately true</span>
            <input type="radio" name="question2" value="3" id="question2-option3" class="hidden-input">
        </div>

        <div class="option" onclick="selectOption('question2', 'option4')">
            <div class="circle" id="circle-question2-option4"></div>
            <span class="label">Highly true</span>
            <input type="radio" name="question2" value="4" id="question2-option4" class="hidden-input">
        </div>

        <div class="option" onclick="selectOption('question2', 'option5')">
            <div class="circle" id="circle-question2-option5"></div>
            <span class="label">Extremely true</span>
            <input type="radio" name="question2" value="5" id="question2-option5" class="hidden-input">
        </div>

        <div class="form-title">Q3. During important exams, I think that I am doing awful or that I may fail</div>
    <form>
        <div class="option" onclick="selectOption('question3', 'option1')">
            <div class="circle" id="circle-question3-option1"></div>
            <span class="label">Not at all true</span>
            <input type="radio" name="question3" value="1" id="question3-option1" class="hidden-input">
        </div>

        <div class="option" onclick="selectOption('question3', 'option2')">
            <div class="circle" id="circle-question3-option2"></div>
            <span class="label">Slightly true</span>
            <input type="radio" name="question3" value="2" id="question3-option2" class="hidden-input">
        </div>

        <div class="option" onclick="selectOption('question3', 'option3')">
            <div class="circle" id="circle-question3-option3"></div>
            <span class="label">Moderately true</span>
            <input type="radio" name="question3" value="3" id="question3-option3" class="hidden-input">
        </div>

        <div class="option" onclick="selectOption('question3', 'option4')">
            <div class="circle" id="circle-question3-option4"></div>
            <span class="label">Highly true</span>
            <input type="radio" name="question3" value="4" id="question3-option4" class="hidden-input">
        </div>

        <div class="option" onclick="selectOption('question3', 'option5')">
            <div class="circle" id="circle-question3-option5"></div>
            <span class="label">Extremely true</span>
            <input type="radio" name="question3" value="5" id="question3-option5" class="hidden-input">
        </div>

        <div class="form-title">Q4.  I lose focus on important exams, and I cannot remember material that I knew before the exam</div>
    <form>
        <div class="option" onclick="selectOption('question4', 'option1')">
            <div class="circle" id="circle-question4-option1"></div>
            <span class="label">Not at all true</span>
            <input type="radio" name="question4" value="1" id="question4-option1" class="hidden-input">
        </div>

        <div class="option" onclick="selectOption('question4', 'option2')">
            <div class="circle" id="circle-question4-option2"></div>
            <span class="label">Slightly true</span>
            <input type="radio" name="question4" value="2" id="question4-option2" class="hidden-input">
        </div>

        <div class="option" onclick="selectOption('question4', 'option3')">
            <div class="circle" id="circle-question4-option3"></div>
            <span class="label">Moderately true</span>
            <input type="radio" name="question4" value="3" id="question4-option3" class="hidden-input">
        </div>

        <div class="option" onclick="selectOption('question4', 'option4')">
            <div class="circle" id="circle-question4-option4"></div>
            <span class="label">Highly true</span>
            <input type="radio" name="question4" value="4" id="question4-option4" class="hidden-input">
        </div>

        <div class="option" onclick="selectOption('question4', 'option5')">
            <div class="circle" id="circle-question4-option5"></div>
            <span class="label">Extremely true</span>
            <input type="radio" name="question4" value="5" id="question4-option5" class="hidden-input">
        </div>

        <div class="form-title">Q5. I finally remember the answer to exam questions after the exam is already over</div>
    <form>
        <div class="option" onclick="selectOption('question5', 'option1')">
            <div class="circle" id="circle-question5-option1"></div>
            <span class="label">Not at all true</span>
            <input type="radio" name="question5" value="1" id="question5-option1" class="hidden-input">
        </div>

        <div class="option" onclick="selectOption('question5', 'option2')">
            <div class="circle" id="circle-question5-option2"></div>
            <span class="label">Slightly true</span>
            <input type="radio" name="question5" value="2" id="question5-option2" class="hidden-input">
        </div>

        <div class="option" onclick="selectOption('question5', 'option3')">
            <div class="circle" id="circle-question5-option3"></div>
            <span class="label">Moderately true</span>
            <input type="radio" name="question5" value="3" id="question5-option3" class="hidden-input">
        </div>

        <div class="option" onclick="selectOption('question5', 'option4')">
            <div class="circle" id="circle-question5-option4"></div>
            <span class="label">Highly true</span>
            <input type="radio" name="question5" value="4" id="question5-option4" class="hidden-input">
        </div>

        <div class="option" onclick="selectOption('question5', 'option5')">
            <div class="circle" id="circle-question5-option5"></div>
            <span class="label">Extremely true</span>
            <input type="radio" name="question5" value="5" id="question5-option5" class="hidden-input">
        </div>

        <div class="form-title">Q6. I worry so much before a major exam that I am too worn out to do my best on the exam</div>
    <form>
        <div class="option" onclick="selectOption('question6', 'option1')">
            <div class="circle" id="circle-question6-option1"></div>
            <span class="label">Not at all true</span>
            <input type="radio" name="question6" value="1" id="question6-option1" class="hidden-input">
        </div>

        <div class="option" onclick="selectOption('question6', 'option2')">
            <div class="circle" id="circle-question6-option2"></div>
            <span class="label">Slightly true</span>
            <input type="radio" name="question6" value="2" id="question6-option2" class="hidden-input">
        </div>

        <div class="option" onclick="selectOption('question6', 'option3')">
            <div class="circle" id="circle-question6-option3"></div>
            <span class="label">Moderately true</span>
            <input type="radio" name="question6" value="3" id="question6-option3" class="hidden-input">
        </div>

        <div class="option" onclick="selectOption('question6', 'option4')">
            <div class="circle" id="circle-question6-option4"></div>
            <span class="label">Highly true</span>
            <input type="radio" name="question6" value="4" id="question6-option4" class="hidden-input">
        </div>

        <div class="option" onclick="selectOption('question6', 'option5')">
            <div class="circle" id="circle-question6-option5"></div>
            <span class="label">Extremely true</span>
            <input type="radio" name="question6" value="5" id="question6-option5" class="hidden-input">
        </div>

        <div class="form-title">Q7. I feel out of sorts or not really myself when I take important exams</div>
    <form>
        <div class="option" onclick="selectOption('question7', 'option1')">
            <div class="circle" id="circle-question7-option1"></div>
            <span class="label">Not at all true</span>
            <input type="radio" name="question7" value="1" id="question7-option1" class="hidden-input">
        </div>

        <div class="option" onclick="selectOption('question7', 'option2')">
            <div class="circle" id="circle-question7-option2"></div>
            <span class="label">Slightly true</span>
            <input type="radio" name="question7" value="2" id="question7-option2" class="hidden-input">
        </div>

        <div class="option" onclick="selectOption('question7', 'option3')">
            <div class="circle" id="circle-question7-option3"></div>
            <span class="label">Moderately true</span>
            <input type="radio" name="question7" value="3" id="question7-option3" class="hidden-input">
        </div>

        <div class="option" onclick="selectOption('question7', 'option4')">
            <div class="circle" id="circle-question7-option4"></div>
            <span class="label">Highly true</span>
            <input type="radio" name="question7" value="4" id="question7-option4" class="hidden-input">
        </div>

        <div class="option" onclick="selectOption('question7', 'option5')">
            <div class="circle" id="circle-question7-option5"></div>
            <span class="label">Extremely true</span>
            <input type="radio" name="question7" value="5" id="question7-option5" class="hidden-input">
        </div>

        <div class="form-title">Q8. I find that my mind sometimes wanders when I am taking important exams</div>
    <form>
        <div class="option" onclick="selectOption('question8', 'option1')">
            <div class="circle" id="circle-question8-option1"></div>
            <span class="label">Not at all true</span>
            <input type="radio" name="question8" value="1" id="question8-option1" class="hidden-input">
        </div>

        <div class="option" onclick="selectOption('question8', 'option2')">
            <div class="circle" id="circle-question8-option2"></div>
            <span class="label">Slightly true</span>
            <input type="radio" name="question8" value="2" id="question8-option2" class="hidden-input">
        </div>

        <div class="option" onclick="selectOption('question8', 'option3')">
            <div class="circle" id="circle-question8-option3"></div>
            <span class="label">Moderately true</span>
            <input type="radio" name="question8" value="3" id="question8-option3" class="hidden-input">
        </div>

        <div class="option" onclick="selectOption('question8', 'option4')">
            <div class="circle" id="circle-question8-option4"></div>
            <span class="label">Highly true</span>
            <input type="radio" name="question8" value="4" id="question8-option4" class="hidden-input">
        </div>

        <div class="option" onclick="selectOption('question8', 'option5')">
            <div class="circle" id="circle-question8-option5"></div>
            <span class="label">Extremely true</span>
            <input type="radio" name="question8" value="5" id="question8-option5" class="hidden-input">
        </div>

        <div class="form-title">Q9.  After an exam, I worry about whether I did well enough</div>
    <form>
        <div class="option" onclick="selectOption('question9', 'option1')">
            <div class="circle" id="circle-question9-option1"></div>
            <span class="label">Not at all true</span>
            <input type="radio" name="question9" value="1" id="question9-option1" class="hidden-input">
        </div>

        <div class="option" onclick="selectOption('question9', 'option2')">
            <div class="circle" id="circle-question9-option2"></div>
            <span class="label">Slightly true</span>
            <input type="radio" name="question9" value="2" id="question9-option2" class="hidden-input">
        </div>

        <div class="option" onclick="selectOption('question9', 'option3')">
            <div class="circle" id="circle-question9-option3"></div>
            <span class="label">Moderately true</span>
            <input type="radio" name="question9" value="3" id="question9-option3" class="hidden-input">
        </div>

        <div class="option" onclick="selectOption('question9', 'option4')">
            <div class="circle" id="circle-question9-option4"></div>
            <span class="label">Highly true</span>
            <input type="radio" name="question9" value="4" id="question9-option4" class="hidden-input">
        </div>

        <div class="option" onclick="selectOption('question9', 'option5')">
            <div class="circle" id="circle-question9-option5"></div>
            <span class="label">Extremely true</span>
            <input type="radio" name="question9" value="5" id="question9-option5" class="hidden-input">
        </div>

        <div class="form-title">Q10.  I struggle with writing assignments, or avoid them as long as I can.  I feel that whatever I do will 
            not be good enough</div>
    <form>
        <div class="option" onclick="selectOption('question10', 'option1')">
            <div class="circle" id="circle-question10-option1"></div>
            <span class="label">Not at all true</span>
            <input type="radio" name="question10" value="1" id="question10-option1" class="hidden-input">
        </div>

        <div class="option" onclick="selectOption('question10', 'option2')">
            <div class="circle" id="circle-question10-option2"></div>
            <span class="label">Slightly true</span>
            <input type="radio" name="question10" value="2" id="question10-option2" class="hidden-input">
        </div>

        <div class="option" onclick="selectOption('question10', 'option3')">
            <div class="circle" id="circle-question10-option3"></div>
            <span class="label">Moderately true</span>
            <input type="radio" name="question10" value="3" id="question10-option3" class="hidden-input">
        </div>

        <div class="option" onclick="selectOption('question10', 'option4')">
            <div class="circle" id="circle-question10-option4"></div>
            <span class="label">Highly true</span>
            <input type="radio" name="question10" value="4" id="question10-option4" class="hidden-input">
        </div>

        <div class="option" onclick="selectOption('question10', 'option5')">
            <div class="circle" id="circle-question10-option5"></div>
            <span class="label">Extremely true</span>
            <input type="radio" name="question10" value="5" id="question10-option5" class="hidden-input">
        </div>

        <button type="submit">Submit</button> </form>
    </form>
</div>

    <script src="../js/Anxiety_Test.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
