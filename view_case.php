<?php
include 'database.php';
$id = $_GET['id'];

$case = $conn->query("SELECT * FROM cases WHERE id = $id")->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Case</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Case Details</h1>
        <a href="index.php">Back to Home</a>
    </header>
    <main>
        <p><strong>Date:</strong> <?php echo $case['date']; ?></p>
        <p><strong>Time:</strong> <?php echo $case['time']; ?></p>
        <p><strong>Buy/Sell:</strong> <?php echo $case['buy_sell']; ?></p>
        <p><strong>Win/Loss:</strong> <?php echo $case['win_loss']; ?></p>
        <p><strong>Reason:</strong> <?php echo $case['reason']; ?></p>
    </main>
</body>
</html>
