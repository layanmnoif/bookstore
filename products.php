<?php 
include 'header.php'; 

$search = isset($_GET['search']) ? $_GET['search'] : '';
$sort = isset($_GET['sort']) ? $_GET['sort'] : 'asc';

// Simple search query with prepared statement
if ($sort == 'desc') {
    $stmt = $pdo->prepare("SELECT * FROM products WHERE title LIKE ? ORDER BY price DESC");
} else {
    $stmt = $pdo->prepare("SELECT * FROM products WHERE title LIKE ? ORDER BY price ASC");
}
$stmt->execute(["%$search%"]);
$books = $stmt->fetchAll();

// Get total count of books for the requirement
$countQuery = $pdo->query("SELECT COUNT(*) as total FROM products");
$countResult = $countQuery->fetch();
?>

<h2>Books Catalog (Total books in system: <?php echo $countResult['total']; ?>)</h2>

<!-- Simple search form -->
<form method="GET" action="products.php" style="margin: 20px 0;">
    <input type="text" name="search" value="<?php echo clean($search); ?>" placeholder="Search books...">
    <select name="sort">
        <option value="asc" <?php if($sort=='asc') echo 'selected'; ?>>Price: Low to High</option>
        <option value="desc" <?php if($sort=='desc') echo 'selected'; ?>>Price: High to Low</option>
    </select>
    <button type="submit" class="btn">Search</button>
</form>

<div>
    <?php foreach ($books as $b): ?>
        <div class="book-box">
            <h3><?php echo clean($b['title']); ?></h3>
            <p>Author: <?php echo clean($b['author']); ?></p>
            <p>Price: $<?php echo clean($b['price']); ?></p>
            <br>
            <a href="detail.php?id=<?php echo $b['id']; ?>" class="btn" style="background-color: gray;">Details</a>
        </div>
    <?php endforeach; ?>
</div>

<?php include 'footer.php'; ?>
