<?php
$host = 'localhost';
$db = 'u110566178_tplanner';
$user = 'u110566178_tplanner';
$pass = '@ssignment4God';
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
  die('Database connection failed: ' . $conn->connect_error);
}
?>