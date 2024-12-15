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
    <title>Edit Case</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Edit Case</h1>
        <a href="index.php">Back to Home</a>
    </header>
    <main>
        <form action="update_case.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $case['id']; ?>">

            <label for="date">Date:</label>
            <input type="date" id="date" name="date" value="<?php echo $case['date']; ?>" required>

            <label for="time">Time:</label>
            <select id="time" name="time" required>
                <option value="3 AM" <?php echo $case['time'] == '3 AM' ? 'selected' : ''; ?>>3 AM</option>
                <option value="6 AM" <?php echo $case['time'] == '6 AM' ? 'selected' : ''; ?>>6 AM</option>
                <option value="9 AM" <?php echo $case['time'] == '9 AM' ? 'selected' : ''; ?>>9 AM</option>
                <option value="12 PM" <?php echo $case['time'] == '12 PM' ? 'selected' : ''; ?>>12 PM</option>
            </select>

            <label for="buy_sell">Buy/Sell:</label>
            <select id="buy_sell" name="buy_sell" required>
                <option value="Buy" <?php echo $case['buy_sell'] == 'Buy' ? 'selected' : ''; ?>>Buy</option>
                <option value="Sell" <?php echo $case['buy_sell'] == 'Sell' ? 'selected' : ''; ?>>Sell</option>
            </select>

            <label for="win_loss">Win/Loss:</label>
            <select id="win_loss" name="win_loss" required>
                <option value="Win" <?php echo $case['win_loss'] == 'Win' ? 'selected' : ''; ?>>Win</option>
                <option value="Loss" <?php echo $case['win_loss'] == 'Loss' ? 'selected' : ''; ?>>Loss</option>
            </select>

            <label for="reason">Reason:</label>
            <textarea id="reason" name="reason" required><?php echo $case['reason']; ?></textarea>

            <button type="submit">Update Case</button>
        </form>
    </main>
</body>
</html>
