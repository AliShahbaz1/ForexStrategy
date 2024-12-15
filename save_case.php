<?php
include 'database.php';

$date = $_POST['date'];
$time = $_POST['time'];
$buy_sell = $_POST['buy_sell'];
$win_loss = $_POST['win_loss'];
$reason = $_POST['reason'];

$sql = "INSERT INTO cases (date, time, buy_sell, win_loss, reason) VALUES ('$date', '$time', '$buy_sell', '$win_loss', '$reason')";

if ($conn->query($sql) === TRUE) {
    header("Location: index.html");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
