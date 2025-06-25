<?php
session_start();
require 'config.php';

if (!isset($_SESSION['user_id'])) {
  http_response_code(403);
  echo "Login required.";
  exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $hotel = $_POST['hotel'];
  $user_id = $_SESSION['user_id'];

  $stmt = $conn->prepare("INSERT INTO wishlist (user_id, hotel_name) VALUES (?, ?)");
  $stmt->bind_param("is", $user_id, $hotel);

  if ($stmt->execute()) {
    echo "Hotel added to wishlist.";
  } else {
    echo "Failed to add.";
  }
}
?>
