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
        <a href="index.html">Back to Home</a>
    </header>
    <main>
        <form action="save_case.php" method="POST">
            <label for="date">Date:</label>
            <input type="date" id="date" name="date" required>

            <label for="time">Time:</label>
            <select id="time" name="time" required>
                <option value="3 AM">3 AM</option>
                <option value="6 AM">6 AM</option>
                <option value="9 AM">9 AM</option>
                <option value="12 PM">12 PM</option>
            </select>

            <label for="buy_sell">Buy/Sell:</label>
            <select id="buy_sell" name="buy_sell" required>
                <option value="Buy">Buy</option>
                <option value="Sell">Sell</option>
            </select>

            <label for="win_loss">Win/Loss:</label>
            <select id="win_loss" name="win_loss" required>
                <option value="Win">Win</option>
                <option value="Loss">Loss</option>
            </select>

            <label for="reason">Reason:</label>
            <textarea id="reason" name="reason" required></textarea>

            <button type="submit">Save Case</button>
        </form>
    </main>
</body>
</html>
