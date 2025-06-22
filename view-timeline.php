<?php
include 'db.php';

$result = $conn->query("SELECT * FROM events ORDER BY event_date ASC");

echo "<link rel='stylesheet' href='style.css'>";
echo "<h1>My Life Timeline</h1>";
echo "<div style='width:600px;margin:auto;border-left:4px solid #4CAF50;padding-left:20px;'>";

while ($row = $result->fetch_assoc()) {
  $color = ($row['status'] == 'achieved') ? 'green' :
           (($row['status'] == 'missed') ? 'red' : 'gray');

  echo "<div style='margin:20px 0'>";
  echo "<span style='color:$color;font-size:18px;'>●</span> ";
  echo "<strong>{$row['event_date']}</strong> - <strong>{$row['title']}</strong> ";
  echo "<em>({$row['category']})</em><br>";
  echo "<p>{$row['description']}</p>";
  echo "</div>";
}

echo "</div>";
?>