<?php
include 'includes/header.php';
require 'config.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$pdo = getPDO();
$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $budget = floatval($_POST['budget']);
    $stmt = $pdo->prepare("UPDATE users SET budget = ? WHERE id = ?");
    $stmt->execute([$budget, $user_id]);
}

$stmt = $pdo->prepare("SELECT budget FROM users WHERE id = ?");
$stmt->execute([$user_id]);
$user = $stmt->fetch();
$budget = $user['budget'] ?? 0;

$stmt = $pdo->prepare("SELECT * FROM hotels WHERE price_per_night <= ? ORDER BY price_per_night ASC");
$stmt->execute([$budget]);
$hotels = $stmt->fetchAll();
?>

<h2>Dashboard</h2>
<form method="POST" action="">
    <label>Enter your budget (XAF):<br><input type="number" name="budget" value="<?php echo htmlspecialchars($budget); ?>" required></label><br><br>
    <button type="submit">Update Budget</button>
</form>

<h3>Hotels within your budget:</h3>
<?php foreach ($hotels as $hotel): ?>
    <div class="card">
        <h4><?php echo htmlspecialchars($hotel['name']); ?> - <?php echo htmlspecialchars($hotel['region']); ?></h4>
        <img src="<?php echo htmlspecialchars($hotel['image_url']); ?>" alt="<?php echo htmlspecialchars($hotel['name']); ?>">
        <p><?php echo htmlspecialchars($hotel['description']); ?></p>
        <p>Price per night: <?php echo number_format($hotel['price_per_night'], 2); ?> XAF</p>
        <form method="POST" action="book.php">
            <input type="hidden" name="hotel_id" value="<?php echo $hotel['id']; ?>">
            <label>Number of days:<br><input type="number" name="days" min="1" required></label><br><br>
            <button type="submit">Book Now</button>
        </form>
    </div>
<?php endforeach; ?>

<?php include 'includes/footer.php'; ?>