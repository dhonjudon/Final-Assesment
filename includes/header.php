<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patio Management System</title>
    <link rel="stylesheet" href="../assets/css/style.css?v=<?= time() ?>">
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/patio_fav/favicon.ico">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/img/patio_fav/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/img/patio_fav/favicon-16x16.png">
    <link rel="apple-touch-icon" href="../assets/img/patio_fav/apple-touch-icon.png">
    <link rel="manifest" href="../assets/img/patio_fav/site.webmanifest">
</head>

<body style="padding-top: 120px !important;">
    <header
        style="position: fixed !important; top: 0; left: 0; right: 0; width: 100%; z-index: 1000; background: #5d4037; box-shadow: 0 2px 8px rgba(0,0,0,0.2);">
        <h1>Patio Café Management System</h1>
        <nav>
            <a href="menu.php">Menu</a>
            <?php if (empty($_SESSION['admin_logged_in'])): ?>
                <a href="cart.php" class="cart-link">Cart <span class="cart-count" id="cartCount"></span></a>
            <?php else: ?>
                | <a href="index.php">Admin Home</a>
                | <a href="orders.php">Orders</a>
                | <a href="revenue.php">Revenue</a>
                | <a href="search.php">Search</a>
                | <a href="categories.php">Categories</a>
                | <a href="logout.php">Logout</a>
            <?php endif; ?>
        </nav>
    </header>
    <main>