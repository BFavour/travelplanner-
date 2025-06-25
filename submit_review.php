<?php
include 'config.php';
$hotel = $_POST['hotel'];
$review = $_POST['review'];
$conn->query("INSERT INTO reviews (hotel, review) VALUES ('$hotel', '$review')");
header("Location: ../reviews.html");
?>