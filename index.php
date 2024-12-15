<?php
include 'database.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forex Strategy Case Studies</title>
    <link rel="stylesheet" href="style.css"> <!-- Link to external CSS -->
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
        <table>
            <thead>
                <tr>
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
                // Query to fetch all case study records
                $cases = $conn->query("SELECT * FROM cases ORDER BY id DESC");
                
                // Check if records exist
                if ($cases->num_rows > 0) {
                    while ($case = $cases->fetch_assoc()) {
                        echo "<tr>
                                <td>{$case['date']}</td>
                                <td>{$case['time']}</td>
                                <td>{$case['trend_15m']}</td>
                                <td>{$case['trend_5m']}</td>
                                <td>{$case['trend_1m']}</td>
                                <td>{$case['pricing']}</td>
                                <td>{$case['buy_sell']}</td>
                                <td>{$case['win_loss']}</td>
                                <td>{$case['reason']}</td>
                                <td>{$case['max_pips']} pips</td>
                                <td>{$case['sl']} pips</td>
                                <td>{$case['supply_demand']}</td>
                                <td>{$case['candle_break']}</td>
                                <td>
                                    <a href='view_case.php?id={$case['id']}'>View</a> | 
                                    <a href='edit_case.php?id={$case['id']}'>Edit</a> | 
                                    <a href='delete_case.php?id={$case['id']}' onclick=\"return confirm('Are you sure you want to delete this case?');\">Delete</a>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='14'>No case studies available.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </main>
</body>
</html>
