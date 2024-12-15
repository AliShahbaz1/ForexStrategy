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
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Buy/Sell</th>
                    <th>Win/Loss</th>
                    <th>Reason</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'database.php';
                $cases = $conn->query("SELECT * FROM cases ORDER BY id DESC");
                while ($case = $cases->fetch_assoc()) {
                    echo "<tr>
                            <td>{$case['date']}</td>
                            <td>{$case['time']}</td>
                            <td>{$case['buy_sell']}</td>
                            <td>{$case['win_loss']}</td>
                            <td>{$case['reason']}</td>
                            <td>
                                <a href='view_case.php?id={$case['id']}'>View</a> | 
                                <a href='edit_case.php?id={$case['id']}'>Edit</a> | 
                                <a href='delete_case.php?id={$case['id']}'>Delete</a>
                            </td>
                          </tr>";
                }
                ?>
            </tbody>
        </table>
    </main>
</body>
</html>