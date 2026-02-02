<?php
// _admin_login.php: Hidden admin login page
require_once '../config/db.php';
require_once '../includes/functions.php';
session_start();

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    $stmt = $pdo->prepare('SELECT * FROM admins WHERE username = ? LIMIT 1');
    $stmt->execute([$username]);
    $admin = $stmt->fetch();

    if ($admin && password_verify($password, $admin['password'])) {
        $_SESSION['admin_logged_in'] = true;
        header('Location: index.php');
        exit;
    } else {
        $error = 'Invalid username or password.';
    }
}
?>
<?php include '../includes/header.php'; ?>
<h2>Admin Login</h2>
<?php if ($error): ?>
    <p style="color:red;"><?= $error ?></p><?php endif; ?>
<form method="post" action="" autocomplete="off">
    <label>Username: <input type="text" name="username" required autocomplete="off" readonly
            onfocus="this.removeAttribute('readonly');"></label>
    <label>Password: <input type="password" name="password" required autocomplete="off" readonly
            onfocus="this.removeAttribute('readonly');"></label>
    <button type="submit" class="button">Login</button>
</form>
<?php include '../includes/footer.php'; ?>