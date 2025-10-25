<?php
header('Content-Type: application/json');

$mysqli = new mysqli("localhost", "root", "", "acess");

if ($mysqli->connect_error) {
  echo json_encode(["error" => "Database connection failed."]);
  exit;
}

$sql = "SELECT id, date, title FROM events ORDER BY date ASC";
$result = $mysqli->query($sql);

if (!$result) {
  echo json_encode(["error" => "Query failed: " . $mysqli->error]);
  exit;
}

$events = [];
while ($row = $result->fetch_assoc()) {
  $events[] = $row;
}

echo json_encode($events);
$mysqli->close();
?>
