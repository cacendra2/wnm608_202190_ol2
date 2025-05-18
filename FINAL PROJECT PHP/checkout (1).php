<?php
session_start();

// Check if cart is set and not empty
$total = 0;
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    echo "<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <title>No Purchase Found - Ciacbo</title>
        <link rel='stylesheet' href='storetheme.css'>
    </head>
    <body>
        <div class='container'>
            <h1>No Purchase Found</h1>
            <p>Your cart is empty or the session has expired.</p>
            <a href='productlist.php' class='form-button'>Return to Shop</a>
        </div>
    </body>
    </html>";
    exit;
}

// Calculate total and clear the cart
foreach ($_SESSION['cart'] as $item) {
    $total += $item['price'] * $item['quantity'];
}
$_SESSION['cart'] = [];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order Confirmation - Ciacbo</title>
    <link rel="stylesheet" href="storetheme.css">
</head>
<body>

    <!-- Navbar -->
    <div class="navbar">
        <div class="navbar-container">
            <div class="left-section">
                <div class="logo-container">
                    <img src="logo.svg" alt="Ciacbo Logo">
                </div>
                <div class="form-control hotdog">
                    <span>🔍</span>
                    <input type="text" placeholder="Search invitations...">
                </div>
            </div>
            <div class="nav">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="productlist.php">Shop</a></li>
                    <li><a href="cart.php">Cart</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="add_user_form.php">Add User</a></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Confirmation Content -->
    <div class="container">
        <h1>Thank You for Your Purchase!</h1>
        <p>Your order was completed successfully.</p>
        <p><strong>Total Paid:</strong> $<?= number_format($total, 2) ?></p>
        <a href="productlist.php" class="form-button">Continue Shopping</a>
    </div>

</body>
</html>


