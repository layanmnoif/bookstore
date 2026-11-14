<?php 
include 'header.php'; 

$id = isset($_GET['id']) ? $_GET['id'] : 0;
$stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
$stmt->execute([$id]);
$book = $stmt->fetch();

if (!$book) {
    echo "<h3>Book not found!</h3>";
} else {
?>
    <h2>Book Details</h2>
    <div class="book-box">
        <h3>Title: <?php echo clean($book['title']); ?></h3>
        <p><strong>Author:</strong> <?php echo clean($book['author']); ?></p>
        <p><strong>Price:</strong> $<?php echo clean($book['price']); ?></p>
        <br>
        <!-- JS Feature show/hide toggler -->
        <button class="btn" onclick="toggleDesc(<?php echo $book['id']; ?>)">Show/Hide Description</button>
        <p id="desc-<?php echo $book['id']; ?>" style="display: none; margin-top:10px; color: #555;">
            <?php echo clean($book['description']); ?>
        </p>
        <br><br>
        <a href="order.php?book_id=<?php echo $book['id']; ?>" class="btn">Buy This Book</a>
    </div>
<?php 
}
include 'footer.php'; 
?>
