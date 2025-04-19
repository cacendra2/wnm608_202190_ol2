<?php
session_start();
include('connection.php');

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_to_cart'])) {
    $item = [
        'id' => $_POST['product_id'],
        'name' => $_POST['product_name'],
        'price' => floatval($_POST['product_price']),
        'image' => $_POST['product_image'],
        'size' => $_POST['size'],
        'color' => $_POST['color'],
        'quantity' => intval($_POST['quantity'])
    ];

    $found = false;
    foreach ($_SESSION['cart'] as &$existing) {
        if ($existing['id'] == $item['id'] && $existing['size'] == $item['size'] && $existing['color'] == $item['color']) {
            $existing['quantity'] += $item['quantity'];
            $found = true;
            break;
        }
    }
    if (!$found) {
        $_SESSION['cart'][] = $item;
    }
    header("Location: cart.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_cart'])) {
    foreach ($_POST['quantities'] as $index => $qty) {
        $_SESSION['cart'][$index]['quantity'] = max(1, intval($qty));
    }
    header("Location: cart.php");
    exit;
}

if (isset($_GET['remove'])) {
    array_splice($_SESSION['cart'], $_GET['remove'], 1);
    header("Location: cart.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Cart - Ciacbo</title>
    <link rel="stylesheet" href="storetheme.css">
</head>
<body>

<div class="navbar">
  <div class="navbar-container">
    <div class="left-section">
      <div class="logo-container">
        <img src="logo.svg" alt="Ciacbo Logo">
      </div>
    </div>
    <div class="nav">
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="productlist.php">Shop</a></li>
        <li><a href="cart.php">Cart</a></li>
        <li><a href="checkout.php">Checkout</a></li>
      </ul>
    </div>
  </div>
</div>

<div class="container">
    <h1>Your Shopping Cart</h1>

    <?php if (empty($_SESSION['cart'])): ?>
        <p>Your cart is empty.</p>
    <?php else: ?>
        <form method="POST" action="cart.php">
            <table style="width:100%; border-collapse: collapse;">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Size</th>
                        <th>Color</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total = 0;
                    foreach ($_SESSION['cart'] as $index => $item):
                        $subtotal = $item['price'] * $item['quantity'];
                        $total += $subtotal;
                    ?>
                        <tr>
                            <td><?= htmlspecialchars($item['name']) ?></td>
                            <td><?= htmlspecialchars($item['size']) ?></td>
                            <td><?= htmlspecialchars($item['color']) ?></td>
                            <td>
                                <input type="number" name="quantities[<?= $index ?>]" value="<?= $item['quantity'] ?>" min="1">
                            </td>
                            <td>$<?= number_format($subtotal, 2) ?></td>
                            <td><a href="cart.php?remove=<?= $index ?>" class="form-button">Remove</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <p><strong>Total: $<?= number_format($total, 2) ?></strong></p>
            <button class="form-button" type="submit" name="update_cart">Update Cart</button>
            <a href="checkout.php" class="form-button">Proceed to Checkout</a>
        </form>
    <?php endif; ?>
</div>

</body>
</html>

