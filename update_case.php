<?php
include 'database.php';

$id = $_POST['id'];
$date = $_POST['date'];
$time = $_POST['time'];
$buy_sell = $_POST['buy_sell'];
$win_loss = $_POST['win_loss'];
$reason = $_POST['reason'];

$sql = "UPDATE cases SET 
        date = '$date', 
        time = '$time', 
        buy_sell = '$buy_sell', 
        win_loss = '$win_loss', 
        reason = '$reason' 
        WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    header("Location: index.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
