<?php
$name = $_POST['name'];
$email = $_POST['email'];
$hotel = $_POST['hotel'];

$subject = "New Booking Request - $hotel";
$admin_email = "contact@certificatesandscores.com";

// Email to Admin
$admin_message = "New booking received:\nName: $name\nEmail: $email\nHotel: $hotel";
mail($admin_email, $subject, $admin_message, "From: $email");

// Email to User
$user_message = "Hi $name,\n\nThanks for booking $hotel via Cameroon Tour Planner. We'll reach out to you soon!";
mail($email, "Booking Received - $hotel", $user_message, "From: $admin_email");

echo "Booking sent successfully!";
?>
