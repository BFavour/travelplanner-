<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $hotel = htmlspecialchars($_POST['hotel']);
  $review = htmlspecialchars($_POST['review']);

  $stmt = $conn->prepare("INSERT INTO reviews (hotel, review) VALUES (?, ?)");
  $stmt->bind_param("ss", $hotel, $review);

  if ($stmt->execute()) {
    echo "Review submitted successfully.";
  } else {
    echo "Error: Could not submit review.";
  }
}
?>
