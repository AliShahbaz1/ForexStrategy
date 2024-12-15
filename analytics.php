<?php
include 'database.php';

// Fetch the win/loss count
$winCount = $conn->query("SELECT COUNT(*) AS count FROM cases WHERE win_loss = 'Win'")->fetch_assoc()['count'];
$lossCount = $conn->query("SELECT COUNT(*) AS count FROM cases WHERE win_loss = 'Loss'")->fetch_assoc()['count'];
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
    <main>
        <h2>Win/Loss Ratio</h2>
        <canvas id="winLossChart" width="400" height="400"></canvas>
        <script>
            const ctx = document.getElementById('winLossChart').getContext('2d');
            const data = {
                labels: ['Win', 'Loss'],
                datasets: [{
                    label: 'Win/Loss Ratio',
                    data: [<?php echo $winCount; ?>, <?php echo $lossCount; ?>],
                    backgroundColor: ['#28a745', '#dc3545']
                }]
            };
            const winLossChart = new Chart(ctx, {
                type: 'pie',
                data: data
            });
        </script>
    </main>
</body>
</html>
