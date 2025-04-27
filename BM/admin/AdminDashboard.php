<?php
session_start();
include('../db.php');

if (!isset($_SESSION['admin'])) {
    header("Location: admin-login.php");
    exit();
}

// Fetch booked slots (nearest date/time first)
$slots = $conn->query("
    SELECT users.name, users.phone, bookings.date, bookings.time 
    FROM bookings
    JOIN users ON bookings.user_id = users.id
    ORDER BY bookings.date ASC, bookings.time ASC
");

// Fetch test results (most recent first)
$results = $conn->query("
    SELECT users.name, test_results.test_name, test_results.score 
    FROM test_results
    JOIN users ON test_results.user_id = users.id
    ORDER BY test_results.id DESC
");

// Fetch announcements (latest first)
$announcements = $conn->query("SELECT id, heading, content FROM announcements ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Admin Dashboard</title>
  <script src="AdminDashboard.js" defer></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="AdminDashboard.css" />
</head>
<body>
  <header>
    <h1>Admin Dashboard</h1>
    <button class="logout" onclick="location.href='../php/logout.php'">Logout</button>
  </header>

  <main>
    <!-- Booked Slots -->
    <section>
      <h2>Booked Slots</h2>
      <table>
        <thead>
          <tr>
            <th>Student Name</th>
            <th>Phone Number</th>
            <th>Date</th>
            <th>Time</th>
          </tr>
        </thead>
        <tbody id="slotsTableBody">
          <?php
          $count = 0;
          if ($slots->num_rows > 0):
            while ($row = $slots->fetch_assoc()):
              ?>
              <tr class="<?= $count++ >= 3 ? 'hidden' : '' ?>">
                <td><?= htmlspecialchars($row['name']) ?></td>
                <td><?= htmlspecialchars($row['phone']) ?></td>
                <td><?= htmlspecialchars($row['date']) ?></td>
                <td><?= htmlspecialchars($row['time']) ?></td>
              </tr>
            <?php endwhile; ?>
          <?php else: ?>
            <tr><td colspan="4">No booked slots found.</td></tr>
          <?php endif; ?>
        </tbody>
      </table>
      <?php if ($count > 3): ?>
        <button class="toggle-btn" onclick="toggleList(this, 'slotsTableBody')">Show More</button>
      <?php endif; ?>
    </section>

    <!-- Test Results -->
    <section>
      <h2>Test Results</h2>
      <table>
        <thead>
          <tr>
            <th>Student Name</th>
            <th>Test Name</th>
            <th>Score</th>
          </tr>
        </thead>
        <tbody id="resultsTableBody">
          <?php
          $count = 0;
          if ($results->num_rows > 0):
            while ($row = $results->fetch_assoc()):
              ?>
              <tr class="<?= $count++ >= 3 ? 'hidden' : '' ?>">
                <td><?= htmlspecialchars($row['name']) ?></td>
                <td><?= htmlspecialchars($row['test_name']) ?></td>
                <td><?= htmlspecialchars($row['score']) ?></td>
              </tr>
            <?php endwhile; ?>
          <?php else: ?>
            <tr><td colspan="3">No test results found.</td></tr>
          <?php endif; ?>
        </tbody>
      </table>
      <?php if ($count > 3): ?>
        <button class="toggle-btn" onclick="toggleList(this, 'resultsTableBody')">Show More</button>
      <?php endif; ?>
    </section>

    <!-- Announcements -->
    <section>
      <h2>Announcements</h2>
      <form id="announcementForm">
        <input type="text" id="announcementTitle" placeholder="Enter title" required />
        <textarea id="announcementText" placeholder="Enter content" required></textarea>
        <button type="submit">Post Announcement</button>
      </form>

      <div class="list-container" id="announcementList">
        <?php
        $index = 0;
        if ($announcements && $announcements->num_rows > 0):
          while ($row = $announcements->fetch_assoc()):
        ?>
          <div class="announcement <?= $index >= 3 ? 'hidden' : '' ?>">
            <h3><?= htmlspecialchars($row['heading']) ?></h3>
            <p><?= nl2br(htmlspecialchars($row['content'])) ?></p>
            <button class="delete-btn" data-id="<?= $row['id'] ?>"><i class="fas fa-trash"></i></button>
          </div>
        <?php
          $index++;
          endwhile;
        else:
        ?>
          <p>No announcements found.</p>
        <?php endif; ?>
      </div>
      <?php if ($index > 3): ?>
        <button class="toggle-btn" onclick="toggleList(this, 'announcementList')">Show More</button>
      <?php endif; ?>
    </section>
  </main>
</body>
</html>
