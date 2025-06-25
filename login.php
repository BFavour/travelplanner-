<?php
include 'config.php';
session_start();
$email = $_POST['email'];
$password = $_POST['password'];

$result = $conn->query("SELECT * FROM users WHERE email='$email'");
if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  if (password_verify($password, $row['password'])) {
    $_SESSION['user'] = $row['id'];
    header("Location: ../dashboard.html");
  } else {
    echo "Invalid password.";
  }
} else {
  echo "No account found with that email.";
}
?>