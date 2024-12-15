<?php
include 'database.php';
$id = $_GET['id'];

// Fetch the case record
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

            <label for="trend_15m">15m Trend:</label>
            <select id="trend_15m" name="trend_15m" required>
                <option value="N/A" <?php echo $case['trend_15m'] == 'N/A' ? 'selected' : ''; ?>>N/A</option>
                <option value="Bullish" <?php echo $case['trend_15m'] == 'Bullish' ? 'selected' : ''; ?>>Bullish</option>
                <option value="Bearish" <?php echo $case['trend_15m'] == 'Bearish' ? 'selected' : ''; ?>>Bearish</option>
                <option value="Unknown" <?php echo $case['trend_15m'] == 'Unknown' ? 'selected' : ''; ?>>Unknown</option>
            </select>

            <label for="trend_5m">5m Trend:</label>
            <select id="trend_5m" name="trend_5m" required>
                <option value="Bullish" <?php echo $case['trend_5m'] == 'Bullish' ? 'selected' : ''; ?>>Bullish</option>
                <option value="Bearish" <?php echo $case['trend_5m'] == 'Bearish' ? 'selected' : ''; ?>>Bearish</option>
                <option value="Unknown" <?php echo $case['trend_5m'] == 'Unknown' ? 'selected' : ''; ?>>Unknown</option>
            </select>

            <label for="trend_1m">1m Trend:</label>
            <select id="trend_1m" name="trend_1m" required>
                <option value="Bullish" <?php echo $case['trend_1m'] == 'Bullish' ? 'selected' : ''; ?>>Bullish</option>
                <option value="Bearish" <?php echo $case['trend_1m'] == 'Bearish' ? 'selected' : ''; ?>>Bearish</option>
                <option value="Unknown" <?php echo $case['trend_1m'] == 'Unknown' ? 'selected' : ''; ?>>Unknown</option>
            </select>

            <label for="pricing">Pricing (P/D):</label>
            <select id="pricing" name="pricing" required>
                <option value="Premium" <?php echo $case['pricing'] == 'Premium' ? 'selected' : ''; ?>>Premium</option>
                <option value="Discount" <?php echo $case['pricing'] == 'Discount' ? 'selected' : ''; ?>>Discount</option>
                <option value="Fair" <?php echo $case['pricing'] == 'Fair' ? 'selected' : ''; ?>>Fair</option>
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
                <option value="BE" <?php echo $case['win_loss'] == 'BE' ? 'selected' : ''; ?>>BE</option>
            </select>

            <label for="reason">Reason:</label>
            <textarea id="reason" name="reason" rows="3" required><?php echo $case['reason']; ?></textarea>

            <label for="max_pips">Max Pips:</label>
            <input type="number" step="0.1" name="max_pips" value="<?php echo $case['max_pips']; ?>" required> pips

            <label for="sl">SL:</label>
            <input type="number" step="0.1" name="sl" value="<?php echo $case['sl']; ?>" required> pips

            <label for="supply_demand">15m Supply/Demand (S/D):</label>
            <select id="supply_demand" name="supply_demand" required>
                <option value="Supply" <?php echo $case['supply_demand'] == 'Supply' ? 'selected' : ''; ?>>Supply</option>
                <option value="Demand" <?php echo $case['supply_demand'] == 'Demand' ? 'selected' : ''; ?>>Demand</option>
                <option value="N/A" <?php echo $case['supply_demand'] == 'N/A' ? 'selected' : ''; ?>>N/A</option>
            </select>

            <label for="candle_break">Strong/Weak 5m Candle Break:</label>
            <select id="candle_break" name="candle_break" required>
                <option value="Strong" <?php echo $case['candle_break'] == 'Strong' ? 'selected' : ''; ?>>Strong</option>
                <option value="Weak" <?php echo $case['candle_break'] == 'Weak' ? 'selected' : ''; ?>>Weak</option>
            </select>

            <button type="submit">Update Case</button>
        </form>
    </main>
</body>
</html>
