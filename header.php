<?php include 'config.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Simple Bookstore</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <div class="nav-container">
        <a href="index.php" class="logo">MyBookstore</a>
        <ul class="nav-links">
            <li><a href="index.php">Home</a></li>
            <li><a href="products.php">All Books</a></li>
            <li><a href="about.php">About Us</a></li>
            <?php if(isset($_SESSION['user_id'])): ?>
                <li><a href="order.php">Order Now</a></li>
                <li><a href="logout.php">Logout (<?php echo clean($_SESSION['username']); ?>)</a></li>
            <?php else: ?>
                <li><a href="login.php">Login / Register</a></li>
            <?php endif; ?>
        </ul>
    </div>
</header>

<div class="main-content">
