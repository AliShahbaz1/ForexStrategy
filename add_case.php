<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Case</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Add New Case</h1>
        <nav><a href="index.php">Back to Dashboard</a></nav>
    </header>
    <main>
        <form action="save_case.php" method="POST">
            <label for="date">Date:</label>
            <input type="date" name="date" required>

            <label for="time">Time:</label>
            <select name="time" required>
                <option value="3 AM">3 AM</option>
                <option value="6 AM">6 AM</option>
                <option value="9 AM">9 AM</option>
                <option value="12 PM">12 PM</option>
            </select>

            <label for="trend_15m">15m Trend:</label>
            <select name="trend_15m" required>
                <option value="Bullish">Bullish</option>
                <option value="Bearish">Bearish</option>
            </select>

            <label for="trend_5m">5m Trend:</label>
            <select name="trend_5m" required>
                <option value="Bullish">Bullish</option>
                <option value="Bearish">Bearish</option>
            </select>

            <label for="trend_1m">1m Trend:</label>
            <select name="trend_1m" required>
                <option value="Bullish">Bullish</option>
                <option value="Bearish">Bearish</option>
            </select>

            <label for="pricing">Pricing (P/D):</label>
            <select name="pricing" required>
                <option value="Premium">Premium</option>
                <option value="Discount">Discount</option>
            </select>

            <label for="buy_sell">Buy/Sell:</label>
            <select name="buy_sell" required>
                <option value="Buy">Buy</option>
                <option value="Sell">Sell</option>
            </select>

            <label for="win_loss">Win/Loss:</label>
            <select name="win_loss" required>
                <option value="Win">Win</option>
                <option value="Loss">Loss</option>
            </select>

            <label for="reason">Reason:</label>
            <textarea name="reason" rows="3" required></textarea>

            <label for="max_pips">Max Pips:</label>
            <input type="number" step="0.1" name="max_pips" placeholder="e.g., 1.2" required> pips

            <label for="sl">SL:</label>
            <input type="number" step="0.1" name="sl" placeholder="e.g., 3.1" required> pips

            <label for="supply_demand">15m Supply/Demand (S/D):</label>
            <select name="supply_demand" required>
                <option value="Supply">Supply</option>
                <option value="Demand">Demand</option>
            </select>

            <label for="candle_break">Strong/Weak 5m Candle Break:</label>
            <select name="candle_break" required>
                <option value="Strong">Strong</option>
                <option value="Weak">Weak</option>
            </select>

            <button type="submit">Save Case</button>
        </form>
    </main>
</body>
</html>
