<?php
$email = $_POST['email'];
$current_region = $_POST['current_region'];
$destination_region = $_POST['destination_region'];

$admin_email = "contact@certificatesandscores.com";
$subject = "New Inter-region Travel Booking";

// Email to Admin
$message = "New Region Travel Booking:\nEmail: $email\nFrom: $current_region\nTo: $destination_region";
mail($admin_email, $subject, $message, "From: $email");

// Email to User
$user_message = "Thanks for booking travel from $current_region to $destination_region.\nWe'll contact you soon.";
mail($email, "Regional Travel Confirmation", $user_message, "From: $admin_email");

echo "Region travel request submitted.";
?>
