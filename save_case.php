<?php
include 'database.php';

$date = $_POST['date'];
$time = $_POST['time'];
$trend_15m = $_POST['trend_15m'];
$trend_5m = $_POST['trend_5m'];
$trend_1m = $_POST['trend_1m'];
$pricing = $_POST['pricing'];
$buy_sell = $_POST['buy_sell'];
$win_loss = $_POST['win_loss'];
$reason = $_POST['reason'];
$max_pips = $_POST['max_pips'];
$sl = $_POST['sl'];
$supply_demand = $_POST['supply_demand'];
$candle_break = $_POST['candle_break'];

$sql = "INSERT INTO cases (date, time, trend_15m, trend_5m, trend_1m, pricing, buy_sell, win_loss, reason, max_pips, sl, supply_demand, candle_break) 
        VALUES ('$date', '$time', '$trend_15m', '$trend_5m', '$trend_1m', '$pricing', '$buy_sell', '$win_loss', '$reason', '$max_pips', '$sl', '$supply_demand', '$candle_break')";

if ($conn->query($sql) === TRUE) {
    header("Location: index.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
