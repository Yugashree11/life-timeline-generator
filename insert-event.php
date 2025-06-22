<?php
include("db.php");

// Escape input to avoid SQL errors
$title = mysqli_real_escape_string($conn, $_POST['title']);
$event_date = mysqli_real_escape_string($conn, $_POST['event_date']);
$description = mysqli_real_escape_string($conn, $_POST['description']);
$category = mysqli_real_escape_string($conn, $_POST['category']);
$status = mysqli_real_escape_string($conn, $_POST['status']);

$sql = "INSERT INTO events (title, event_date, description, category, status)
        VALUES ('$title', '$event_date', '$description', '$category', '$status')";

if ($conn->query($sql) === TRUE) {
  header("Location: view-timeline.php");
  exit();
} else {
  echo "Error: " . $conn->error;
}
?>