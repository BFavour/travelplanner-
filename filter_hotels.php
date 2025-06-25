<?php
include 'config.php';

$budget = $_POST['budget'];
$visit_date = $_POST['visit_date'];

$sql = "SELECT * FROM hotels WHERE price <= ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $budget);
$stmt->execute();
$result = $stmt->get_result();

$hotels = [];
while ($row = $result->fetch_assoc()) {
  $hotels[] = $row;
}

header('Content-Type: application/json');
echo json_encode($hotels);
?>
