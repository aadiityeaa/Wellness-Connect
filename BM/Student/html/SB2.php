<?php
session_start();

// Redirect to login if not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: Login-Student.php");
    exit();
}

include("../../db.php");

// Fetch current user's booking
$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT date, time FROM bookings WHERE user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$booking = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slot Booking</title>
    <link rel="stylesheet" href="../css/SB2.css">
    <link rel="stylesheet" href="../css/Header.css">
</head>
<body>

<header>
    <div class="logo">WellnessConnect</div>
    <nav>
        <ul>
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
            <li><a href="../html/Contact-Us.php">Contact us</a></li>
            <?php if (isset($_SESSION['user_id'])): ?>
                <li><a href="../../php/logout.php" class="button1" style="background-color: #c9302c">Logout</a></li>
            <?php else: ?>
                <li><a href="Login-Student.php" class="button1">LOGIN</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>

<div id="calendar-picker">
    <input type="date" id="date-picker">
</div>

<div id="calendar-container">
    <button id="prev-arrow" class="arrow">&lt;</button>
    <div id="calendar"></div>
    <button id="next-arrow" class="arrow">&gt;</button>
</div>

<div id="slots-container"></div>

<div id="actions">
    <button id="book-button">Book Slot</button>
</div>

<div id="confirmation" style="display: none;">
    <p id="confirmed-slot"></p>
</div>

<!-- BOOKED SLOT SECTION -->
<div id="booked-slot">
    <h2 style="text-align: center;">BOOKED SLOT</h2>
    <?php if ($booking): ?>
        <p><strong>Date:</strong> <?= htmlspecialchars($booking['date']) ?></p>
        <p><strong>Time:</strong> <?= htmlspecialchars($booking['time']) ?></p>
        <form method="POST" action="../../php/cancel_booking.php">
            <button type="submit" id="cancel-button" class="cancel-button">Cancel</button>
        </form>
    <?php else: ?>
        <p style="text-align: center;">You have not booked any slot yet.</p>
    <?php endif; ?>
</div>

<script>
const userBookingFromServer = <?php
    $bookingData = [];
    if ($booking) {
        $bookingData[$booking['date']] = [$booking['time']];
    }
    echo json_encode($bookingData);
?>;
</script>

<script src="../js/SB2.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>
</html>
