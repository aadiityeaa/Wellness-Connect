
<?php
session_start();
include('../db.php');

if (!isset($_SESSION['admin'])) {
    header("Location: admin-login.php");
    exit();
}

// Fetch data
$slots = $conn->query("SELECT users.name, users.phone, bookings.date, bookings.time FROM bookings JOIN users ON bookings.user_id = users.id");
$results = $conn->query("SELECT users.name, test_results.test_name, test_results.score FROM test_results JOIN users ON test_results.user_id = users.id");
$announcements = $conn->query("SELECT heading, content FROM announcements ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="AdminDashboard.css">
    <style>
        .hidden { display: none; }
    </style>
</head>
<body>
    <header>
        <h1>Admin Dashboard</h1>
        <div class="header-buttons">
            <button onclick="location.href='logout.php'">Logout</button>
        </div>
    </header>

    <main>
        <!-- Booked Slots Section -->
        <section id="booked-slots">
            <h2>Booked Slots</h2>
            <table>
                <thead>
                    <tr>
                        <th>Student Name</th>
                        <th>Phone</th>
                        <th>Date</th>
                        <th>Time</th>
                    </tr>
                </thead>
                <tbody id="slotsTable">
                    <?php if ($slots && $slots->num_rows > 0): ?>
                        <?php $counter = 0; ?>
                        <?php while ($row = $slots->fetch_assoc()): ?>
                            <tr <?= ++$counter > 3 ? 'class="hidden"' : '' ?>>
                                <td><?= htmlspecialchars($row['name']) ?></td>
                                <td><?= htmlspecialchars($row['phone']) ?></td>
                                <td><?= htmlspecialchars($row['date']) ?></td>
                                <td><?= htmlspecialchars($row['time']) ?></td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr><td colspan="4">No bookings found</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
            <?php if ($slots && $slots->num_rows > 3): ?>
                <button class="toggle-btn" onclick="toggleVisibility('slotsTable', 'tr')">Show More</button>
            <?php endif; ?>
        </section>

        <!-- Test Results Section -->
        <section id="test-results">
            <h2>Test Results</h2>
            <table>
                <thead>
                    <tr>
                        <th>Student</th>
                        <th>Test</th>
                        <th>Score</th>
                    </tr>
                </thead>
                <tbody id="resultsTable">
                    <?php if ($results && $results->num_rows > 0): ?>
                        <?php $counter = 0; ?>
                        <?php while ($row = $results->fetch_assoc()): ?>
                            <tr <?= ++$counter > 3 ? 'class="hidden"' : '' ?>>
                                <td><?= htmlspecialchars($row['name']) ?></td>
                                <td><?= htmlspecialchars($row['test_name']) ?></td>
                                <td><?= htmlspecialchars($row['score']) ?></td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr><td colspan="3">No results found</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
            <?php if ($results && $results->num_rows > 3): ?>
                <button class="toggle-btn" onclick="toggleVisibility('resultsTable', 'tr')">Show More</button>
            <?php endif; ?>
        </section>

        <!-- Announcements Section -->
        <section id="announcements">
            <h2>Past Announcements</h2>
            <ul id="announcementsList">
                <?php if ($announcements && $announcements->num_rows > 0): ?>
                    <?php $counter = 0; ?>
                    <?php while ($row = $announcements->fetch_assoc()): ?>
                        <li <?= ++$counter > 3 ? 'class="hidden"' : '' ?>>
                            <strong><?= htmlspecialchars($row['heading']) ?></strong>
                            <p><?= htmlspecialchars($row['content']) ?></p>
                        </li>
                    <?php endwhile; ?>
                <?php else: ?>
                    <li>No announcements yet</li>
                <?php endif; ?>
            </ul>
            <?php if ($announcements && $announcements->num_rows > 3): ?>
                <button class="toggle-btn" onclick="toggleVisibility('announcementsList', 'li')">Show More</button>
            <?php endif; ?>
        </section>
    </main>

    <script>
        function toggleVisibility(containerId, itemTag) {
            const container = document.getElementById(containerId);
            const items = container.getElementsByTagName(itemTag);
            const button = container.nextElementSibling;
            
            let allVisible = true;
            for (let i = 0; i < items.length; i++) {
                if (items[i].classList.contains('hidden')) {
                    allVisible = false;
                    break;
                }
            }
            
            for (let i = 0; i < items.length; i++) {
                if (i >= 3) {
                    if (allVisible) {
                        items[i].classList.add('hidden');
                    } else {
                        items[i].classList.remove('hidden');
                    }
                }
            }
            
            button.textContent = allVisible ? 'Show More' : 'Show Less';
        }
    </script>
</body>
</html>
<?php $conn->close(); ?>