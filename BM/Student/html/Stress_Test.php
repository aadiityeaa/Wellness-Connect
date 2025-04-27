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
  <title>Stress Test | WellnessConnect</title>

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
    <h2>Stress Test</h2>
    <p>This test can help identify signs of Stress by evaluating your answers.</p>
</section>

<div class="form-container">  
    <div class="form-title">Q1. I find it hard to wind  down</div>
    <form>
        <div class="option" onclick="selectOption('question1', 'option1')">
            <div class="circle" id="circle-question1-option1"></div>
            <span class="label">Never</span>
            <input type="radio" name="question1" value="0" id="question1-option1" class="hidden-input">
        </div>

        <div class="option" onclick="selectOption('question1', 'option2')">
            <div class="circle" id="circle-question1-option2"></div>
            <span class="label">Sometimes</span>
            <input type="radio" name="question1" value="1" id="question1-option2" class="hidden-input">
        </div>

        <div class="option" onclick="selectOption('question1', 'option3')">
            <div class="circle" id="circle-question1-option3"></div>
            <span class="label">Often</span>
            <input type="radio" name="question1" value="2" id="question1-option3" class="hidden-input">
        </div>

        <div class="option" onclick="selectOption('question1', 'option4')">
            <div class="circle" id="circle-question1-option4"></div>
            <span class="label">Almost always</span>
            <input type="radio" name="question1" value="3" id="question1-option4" class="hidden-input">
        </div>

        <div class="form-title">Q2. I tend to over-react to situations</div>
    <form>
        <div class="option" onclick="selectOption('question2', 'option1')">
            <div class="circle" id="circle-question2-option1"></div>
            <span class="label">Never</span>
            <input type="radio" name="question2" value="0" id="question2-option1" class="hidden-input">
        </div>

        <div class="option" onclick="selectOption('question2', 'option2')">
            <div class="circle" id="circle-question2-option2"></div>
            <span class="label">Sometimes</span>
            <input type="radio" name="question2" value="1" id="question2-option2" class="hidden-input">
        </div>

        <div class="option" onclick="selectOption('question2', 'option3')">
            <div class="circle" id="circle-question2-option3"></div>
            <span class="label">Often</span>
            <input type="radio" name="question2" value="2" id="question2-option3" class="hidden-input">
        </div>

        <div class="option" onclick="selectOption('question2', 'option4')">
            <div class="circle" id="circle-question2-option4"></div>
            <span class="label">Almost always</span>
            <input type="radio" name="question2" value="3" id="question2-option4" class="hidden-input">
        </div>

        <div class="form-title">Q3. I felt that I was using a lot of nervous energy</div>
    <form>
        <div class="option" onclick="selectOption('question3', 'option1')">
            <div class="circle" id="circle-question3-option1"></div>
            <span class="label">Never</span>
            <input type="radio" name="question3" value="0" id="question3-option1" class="hidden-input">
        </div>

        <div class="option" onclick="selectOption('question3', 'option2')">
            <div class="circle" id="circle-question3-option2"></div>
            <span class="label">Sometimes</span>
            <input type="radio" name="question3" value="1" id="question3-option2" class="hidden-input">
        </div>

        <div class="option" onclick="selectOption('question3', 'option3')">
            <div class="circle" id="circle-question3-option3"></div>
            <span class="label">Often</span>
            <input type="radio" name="question3" value="2" id="question3-option3" class="hidden-input">
        </div>

        <div class="option" onclick="selectOption('question3', 'option4')">
            <div class="circle" id="circle-question3-option4"></div>
            <span class="label">Almost always</span>
            <input type="radio" name="question3" value="3" id="question3-option4" class="hidden-input">
        </div>

        <div class="form-title">Q4.  I found myself getting agitated</div>
    <form>
        <div class="option" onclick="selectOption('question4', 'option1')">
            <div class="circle" id="circle-question4-option1"></div>
            <span class="label">Never</span>
            <input type="radio" name="question4" value="0" id="question4-option1" class="hidden-input">
        </div>

        <div class="option" onclick="selectOption('question4', 'option2')">
            <div class="circle" id="circle-question4-option2"></div>
            <span class="label">Sometimes</span>
            <input type="radio" name="question4" value="1" id="question4-option2" class="hidden-input">
        </div>

        <div class="option" onclick="selectOption('question4', 'option3')">
            <div class="circle" id="circle-question4-option3"></div>
            <span class="label">Often</span>
            <input type="radio" name="question4" value="2" id="question4-option3" class="hidden-input">
        </div>

        <div class="option" onclick="selectOption('question4', 'option4')">
            <div class="circle" id="circle-question4-option4"></div>
            <span class="label">Almost always</span>
            <input type="radio" name="question4" value="3" id="question4-option4" class="hidden-input">
        </div>

        <div class="form-title">Q5. I found it difficult to relax</div>
        <form>
            <div class="option" onclick="selectOption('question5', 'option1')">
                <div class="circle" id="circle-question5-option1"></div>
                <span class="label">Never</span>
                <input type="radio" name="question5" value="0" id="question5-option1" class="hidden-input">
            </div>

            <div class="option" onclick="selectOption('question5', 'option2')">
                <div class="circle" id="circle-question5-option2"></div>
                <span class="label">Sometimes</span>
                <input type="radio" name="question5" value="1" id="question5-option2" class="hidden-input">
            </div>

            <div class="option" onclick="selectOption('question5', 'option3')">
                <div class="circle" id="circle-question5-option3"></div>
                <span class="label">often</span>
                <input type="radio" name="question5" value="2" id="question5-option3" class="hidden-input">
            </div>

            <div class="option" onclick="selectOption('question5', 'option4')">
                <div class="circle" id="circle-question5-option4"></div>
                <span class="label">Almost always</span>
                <input type="radio" name="question5" value="3" id="question5-option4" class="hidden-input">
            </div>

            <div class="form-title">Q6. I was intolerant of anything that kept me from getting on with what i was doing</div>
            <form>
                <div class="option" onclick="selectOption('question6', 'option1')">
                    <div class="circle" id="circle-question6-option1"></div>
                    <span class="label">Never</span>
                    <input type="radio" name="question6" value="0" id="question6-option1" class="hidden-input">
                </div>
    
                <div class="option" onclick="selectOption('question6', 'option2')">
                    <div class="circle" id="circle-question6-option2"></div>
                    <span class="label">Sometimes</span>
                    <input type="radio" name="question6" value="1" id="question6-option2" class="hidden-input">
                </div>
    
                <div class="option" onclick="selectOption('question6', 'option3')">
                    <div class="circle" id="circle-question6-option3"></div>
                    <span class="label">Often</span>
                    <input type="radio" name="question6" value="2" id="question6-option3" class="hidden-input">
                </div>
    
                <div class="option" onclick="selectOption('question6', 'option4')">
                    <div class="circle" id="circle-question6-option4"></div>
                    <span class="label">Almost always</span>
                    <input type="radio" name="question6" value="3" id="question6-option4" class="hidden-input">
                </div>

                <div class="form-title">Q7. I felt that I was rather physically tense</div>
    <form>
        <div class="option" onclick="selectOption('question7', 'option1')">
            <div class="circle" id="circle-question7-option1"></div>
            <span class="label">Never</span>
            <input type="radio" name="question7" value="0" id="question7-option1" class="hidden-input">
        </div>

        <div class="option" onclick="selectOption('question7', 'option2')">
            <div class="circle" id="circle-question7-option2"></div>
            <span class="label">Sometimes</span>
            <input type="radio" name="question7" value="1" id="question7-option2" class="hidden-input">
        </div>

        <div class="option" onclick="selectOption('question7', 'option3')">
            <div class="circle" id="circle-question7-option3"></div>
            <span class="label">Often</span>
            <input type="radio" name="question7" value="2" id="question7-option3" class="hidden-input">
        </div>

        <div class="option" onclick="selectOption('question7', 'option4')">
            <div class="circle" id="circle-question7-option4"></div>
            <span class="label">Almost always</span>
            <input type="radio" name="question7" value="3" id="question7-option4" class="hidden-input">
        </div>

        <button type="submit">Submit</button> </form>
    </form>
</div>

<script src="../js/Stress_Test.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</body>
</html>
