<?php
include 'database.php';

$id = $_GET['id'];

$sql = "DELETE FROM cases WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    header("Location: index.html");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
