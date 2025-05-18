<?php
session_start();
$total = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order Confirmation</title>
    <style>
        body { font-family: Arial; padding: 20px; }
        .container { max-width: 600px; margin: auto; }
        .product { margin-bottom: 10px; }
        .total { font-weight: bold; margin-top: 20px; }
        a { display: inline-block; margin-top: 20px; text-decoration: none; background: #333; color: #fff; padding: 10px 15px; border-radius: 5px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Thank you for your purchase!</h1>
        <p>Here is a summary of your order:</p>

        <?php if (!empty($_SESSION['cart'])): ?>
            <?php foreach ($_SESSION['cart'] as $item): ?>
                <div class="product">
                    <strong><?php echo htmlspecialchars($item['name']); ?></strong> – 
                    Quantity: <?php echo $item['quantity']; ?> –
                    Price: $<?php echo number_format($item['price'], 2); ?>
                </div>
                <?php $total += $item['price'] * $item['quantity']; ?>
            <?php endforeach; ?>

            <div class="total">Total: $<?php echo number_format($total, 2); ?></div>
        <?php else: ?>
            <p>Your cart was empty.</p>
        <?php endif; ?>

        <a href="productlist.php">Continue Shopping</a>
    </div>
</body>
</html>

<?php
// Optionally clear cart after confirmation
unset($_SESSION['cart']);
?>
