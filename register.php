<?php
include 'config.php';
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);

$check = $conn->query("SELECT * FROM users WHERE email='$email'");
if ($check->num_rows > 0) {
  echo "Account with that email already exists.";
} else {
  $conn->query("INSERT INTO users (name, email, phone, address, password) VALUES ('$name','$email','$phone','$address','$password')");
  header("Location: ../login.html");
}
?>