<?php
include 'database.php';

// Sorting logic
$sort = isset($_GET['sort']) && $_GET['sort'] === 'asc' ? 'ASC' : 'DESC';
$cases = $conn->query("SELECT * FROM cases ORDER BY date $sort, id $sort");
$counter = 1; // Case numbering
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forex Strategy Case Studies</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Forex Strategy Case Studies</h1>
        <nav>
            <a href="add_case.php">Add New Case</a> |
            <a href="analytics.php">View Analytics</a>
        </nav>
    </header>
    <main>
        <h2>All Case Studies</h2>
        <div>
            <a href="?sort=asc">Sort by Oldest</a> | 
            <a href="?sort=desc">Sort by Newest</a>
        </div>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>15m Trend</th>
                    <th>5m Trend</th>
                    <th>1m Trend</th>
                    <th>Pricing</th>
                    <th>Buy/Sell</th>
                    <th>Win/Loss</th>
                    <th>Reason</th>
                    <th>Max Pips</th>
                    <th>SL</th>
                    <th>Supply/Demand</th>
                    <th>Candle Break</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($cases->num_rows > 0) {
                    while ($case = $cases->fetch_assoc()) {
                        echo "<tr>
                                <td>{$counter}</td>
                                <td>{$case['date']}</td>
                                <td>{$case['time']}</td>
                                <td>{$case['trend_15m']}</td>
                                <td>{$case['trend_5m']}</td>
                                <td>{$case['trend_1m']}</td>
                                <td>{$case['pricing']}</td>
                                <td>{$case['buy_sell']}</td>
                                <td>{$case['win_loss']}</td>
                                <td>" . (strlen($case['reason']) > 30 ? substr($case['reason'], 0, 30) . '...' : $case['reason']) . "</td>
                                <td>{$case['max_pips']} pips</td>
                                <td>{$case['sl']} pips</td>
                                <td>{$case['supply_demand']}</td>
                                <td>{$case['candle_break']}</td>
                                <td>
                                    <a href='view_case.php?id={$case['id']}'>View</a> |
                                    <a href='edit_case.php?id={$case['id']}'>Edit</a> |
                                    <a href='delete_case.php?id={$case['id']}' onclick=\"return confirm('Are you sure?');\">Delete</a>
                                </td>
                              </tr>";
                        $counter++;
                    }
                } else {
                    echo "<tr><td colspan='15'>No case studies available.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </main>
</body>
</html>
