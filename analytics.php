<?php
include 'database.php';

// Fetch overall win/loss/be counts
$winCount = $conn->query("SELECT COUNT(*) AS count FROM cases WHERE win_loss = 'Win'")->fetch_assoc()['count'];
$lossCount = $conn->query("SELECT COUNT(*) AS count FROM cases WHERE win_loss = 'Loss'")->fetch_assoc()['count'];
$beCount = $conn->query("SELECT COUNT(*) AS count FROM cases WHERE win_loss = 'BE'")->fetch_assoc()['count'];

// Fetch win/loss by time period
$timePeriods = ['3 AM', '6 AM', '9 AM', '12 PM'];
$winsByTime = [];
$lossesByTime = [];
foreach ($timePeriods as $time) {
    $winsByTime[] = $conn->query("SELECT COUNT(*) AS count FROM cases WHERE time = '$time' AND win_loss = 'Win'")->fetch_assoc()['count'];
    $lossesByTime[] = $conn->query("SELECT COUNT(*) AS count FROM cases WHERE time = '$time' AND win_loss = 'Loss'")->fetch_assoc()['count'];
}

// Fetch win rates by day of the week
$daysOfWeek = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
$winsByDay = [];
foreach ($daysOfWeek as $day) {
    $winsByDay[] = $conn->query("SELECT COUNT(*) AS count FROM cases WHERE DAYNAME(date) = '$day' AND win_loss = 'Win'")->fetch_assoc()['count'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analytics - Forex Strategy</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Analytics</h1>
        <nav>
            <a href="index.php">Back to Dashboard</a>
        </nav>
    </header>
    <main class="analytics-container">
        <div class="card">
            <h3>Overall Win/Loss Ratio</h3>
            <p>Visualize the overall distribution of Wins, Losses, and Break Even trades.</p>
            <canvas id="winLossChart"></canvas>
        </div>

        <div class="card">
            <h3>Win/Loss Ratio by Time Period</h3>
            <p>Analyze performance across different time periods (3 AM, 6 AM, etc.).</p>
            <canvas id="timePeriodChart"></canvas>
        </div>

        <div class="card">
            <h3>Wins by Day of the Week</h3>
            <p>Evaluate your win rate by the day of the week to identify trends.</p>
            <canvas id="dayOfWeekChart"></canvas>
        </div>
    </main>

    <script>
        // Overall Win/Loss Pie Chart
        const winLossCtx = document.getElementById('winLossChart').getContext('2d');
        new Chart(winLossCtx, {
            type: 'pie',
            data: {
                labels: ['Win', 'Loss', 'Break Even'],
                datasets: [{
                    data: [<?= $winCount ?>, <?= $lossCount ?>, <?= $beCount ?>],
                    backgroundColor: ['#28a745', '#dc3545', '#ffc107']
                }]
            }
        });

        // Win/Loss by Time Period Chart
        const timePeriodCtx = document.getElementById('timePeriodChart').getContext('2d');
        new Chart(timePeriodCtx, {
            type: 'bar',
            data: {
                labels: <?= json_encode($timePeriods) ?>,
                datasets: [
                    {
                        label: 'Wins',
                        data: <?= json_encode($winsByTime) ?>,
                        backgroundColor: '#28a745'
                    },
                    {
                        label: 'Losses',
                        data: <?= json_encode($lossesByTime) ?>,
                        backgroundColor: '#dc3545'
                    }
                ]
            },
            options: {
                responsive: true,
                scales: {
                    x: { title: { display: true, text: 'Time Period' } },
                    y: { title: { display: true, text: 'Number of Trades' }, beginAtZero: true }
                }
            }
        });

        // Wins by Day of the Week Chart
        const dayOfWeekCtx = document.getElementById('dayOfWeekChart').getContext('2d');
        new Chart(dayOfWeekCtx, {
            type: 'bar',
            data: {
                labels: <?= json_encode($daysOfWeek) ?>,
                datasets: [{
                    label: 'Wins',
                    data: <?= json_encode($winsByDay) ?>,
                    backgroundColor: '#007bff'
                }]
            },
            options: {
                responsive: true,
                scales: {
                    x: { title: { display: true, text: 'Day of the Week' } },
                    y: { title: { display: true, text: 'Number of Wins' }, beginAtZero: true }
                }
            }
        });
    </script>
</body>
</html>
