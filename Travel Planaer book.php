<?php
require 'config.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user_id'];
    $hotel_id = intval($_POST['hotel_id']);
    $days = intval($_POST['days']);

    $pdo = getPDO();
    $stmt = $pdo->prepare("SELECT price_per_night FROM hotels WHERE id = ?");
    $stmt->execute([$hotel_id]);
    $hotel = $stmt->fetch();

    if ($hotel) {
        $total_price = $days * $hotel['price_per_night'];
        $stmt = $pdo->prepare("INSERT INTO bookings (user_id, hotel_id, days, total_price) VALUES (?, ?, ?, ?)");
        $stmt->execute([$user_id, $hotel_id, $days, $total_price]);
        echo "<p>Booking successful! Total cost: " . number_format($total_price, 2) . " XAF.</p>";
        echo "<p><a href='dashboard.php'>Back to Dashboard</a></p>";
    }
}
?>