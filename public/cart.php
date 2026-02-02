<?php
// cart.php: Customer shopping cart page
session_start();
require_once '../config/db.php';
require_once '../includes/functions.php';
include '../includes/header.php';

// Initialize cart if not set
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Handle add/remove actions
if (isset($_GET['add'])) {
    $id = intval($_GET['add']);
    $_SESSION['cart'][$id] = ($_SESSION['cart'][$id] ?? 0) + 1;
    header('Location: cart.php');
    exit;
}
if (isset($_GET['remove'])) {
    $id = intval($_GET['remove']);
    unset($_SESSION['cart'][$id]);
    header('Location: cart.php');
    exit;
}

// Fetch cart items
$cart = $_SESSION['cart'];
$items = [];
$total = 0;
if ($cart) {
    $ids = implode(',', array_map('intval', array_keys($cart)));
    $stmt = $pdo->query("SELECT * FROM menu_items WHERE id IN ($ids)");
    $items = $stmt->fetchAll();
    foreach ($items as &$item) {
        $item['quantity'] = $cart[$item['id']];
        $item['subtotal'] = $item['quantity'] * $item['price'];
        $total += $item['subtotal'];
    }
}
?>
<h2>Your Cart</h2>
<?php if (!$items): ?>
    <p>Your cart is empty.</p>
<?php else: ?>
    <table class="table">
        <tr><th>Name</th><th>Price</th><th>Qty</th><th>Subtotal</th><th>Action</th></tr>
        <?php foreach ($items as $item): ?>
        <tr>
            <td><?= sanitize($item['name']) ?></td>
            <td>रु <?= number_format($item['price'],2) ?></td>
            <td><?= $item['quantity'] ?></td>
            <td>रु <?= number_format($item['subtotal'],2) ?></td>
            <td><a href="cart.php?remove=<?= $item['id'] ?>" class="button">Remove</a></td>
        </tr>
        <?php endforeach; ?>
        <tr><td colspan="3"><strong>Total</strong></td><td colspan="2"><strong>रु <?= number_format($total,2) ?></strong></td></tr>
    </table>
    <a href="checkout.php" class="button">Checkout</a>
<?php endif; ?>
<?php include '../includes/footer.php'; ?>
