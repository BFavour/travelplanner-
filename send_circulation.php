<?php
$email = $_POST['email'];
$current_location = $_POST['current_location'];
$destination = $_POST['destination'];
$time = $_POST['departure_time'];

$admin_email = "contact@certificatesandscores.com";
$subject = "New In-Town Circulation Booking";

// Email to Admin
$message = "New In-town Booking:\nEmail: $email\nFrom: $current_location\nTo: $destination\nTime: $time";
mail($admin_email, $subject, $message, "From: $email");

// Email to User
$user_message = "Thanks for your in-town booking from $current_location to $destination at $time.\n\nWe'll confirm shortly.";
mail($email, "In-Town Booking Confirmation", $user_message, "From: $admin_email");

echo "Booking sent.";
?>
