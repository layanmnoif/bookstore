<?php 
include 'header.php'; 

if (!isset($_SESSION['user_id'])) {
    echo "<h3>Please login first to buy books.</h3>";
    include 'footer.php'; exit;
}

$book_id = isset($_GET['book_id']) ? $_GET['book_id'] : 0;
$status = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $b_id = $_POST['b_id'];
    $qty = $_POST['quantity'];
    $u_id = $_SESSION['user_id'];
    
    $stmt = $pdo->prepare("INSERT INTO orders (user_id, product_id, quantity) VALUES (?, ?, ?)");
    $stmt->execute([$u_id, $b_id, $qty]);
    $status = "Success";
}
?>

<h2>Order Form</h2>
<?php if($status == "Success"): ?>
    <p class="success-text">Thank you! Your order was saved successfully.</p>
<?php endif; ?>

<form method="POST" action="order.php" style="margin-top: 20px;">
    <input type="hidden" name="b_id" value="<?php echo $book_id; ?>">
    <label>Quantity:</label><br>
    <input type="number" name="quantity" min="1" value="1" style="padding: 5px;"><br><br>
    <button type="submit" class="btn">Submit Order</button>
</form>
<?php include 'footer.php'; ?>
