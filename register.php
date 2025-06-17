<?php
include 'includes/header.php';
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $email    = trim($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $pdo = getPDO();
    $stmt = $pdo->prepare("INSERT INTO users (username, email, password_hash) VALUES (?, ?, ?)");
    try {
        $stmt->execute([$username, $email, $password]);
        echo "<p>Registration successful. <a href='login.php'>Login here</a>.</p>";
    } catch (Exception $e) {
        echo "<p>Error: " . $e->getMessage() . "</p>";
    }
}
?>

<h2>Register</h2>
<form method="POST" action="">
    <label>Username:<br><input type="text" name="username" required></label><br><br>
    <label>Email:<br><input type="email" name="email" required></label><br><br>
    <label>Password:<br><input type="password" name="password" required></label><br><br>
    <button type="submit">Register</button>
</form>

<?php include 'includes/footer.php'; ?>