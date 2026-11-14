<?php 
include 'header.php'; 

$msg = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $type = $_POST['form_type'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    if ($type == 'login') {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();
        
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            header("Location: index.php");
            exit;
        } else { $msg = "Wrong email or password!"; }
    } else {
        $username = $_POST['username'];
        $hashed = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $stmt->execute([$username, $email, $hashed]);
        $msg = "Registration done! Please login below.";
    }
}
?>

<div style="max-width: 400px; margin: 0 auto;">
    <p class="error-text"><?php echo $msg; ?></p>

    <h2>Login Form</h2>
    <form id="checkForm" method="POST" action="login.php">
        <input type="hidden" name="form_type" value="login">
        <label>Email:</label><br><input type="email" id="email" name="email"><br><br>
        <label>Password:</label><br><input type="password" id="password" name="password"><br><br>
        <button type="submit" class="btn">Login</button>
    </form>
    <hr style="margin: 20px 0;">
    <h2>Register Form</h2>
    <form method="POST" action="login.php">
        <input type="hidden" name="form_type" value="register">
        <label>Username:</label><br><input type="text" name="username" required><br><br>
        <label>Email:</label><br><input type="email" name="email" required><br><br>
        <label>Password:</label><br><input type="password" name="password" required><br><br>
        <button type="submit" class="btn" style="background-color: green;">Register</button>
    </form>
</div>
<?php include 'footer.php'; ?>
