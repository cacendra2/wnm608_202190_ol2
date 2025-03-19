<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "parts/meta.php"; ?>
    <title>Product Item</title>
</head>
<body>

<?php include "parts/navbar.php"; ?>

<div class="container">
    <div class="card soft">
        <h2>Product Item</h2>
        <p>This is item #<?php echo $_GET['id']; ?></p>
        <a href="cart.php?id=<?php echo $_GET['id']; ?>" class="button">Add to Cart</a>
    </div>
</div>

<?php include "parts/footer.php"; ?>

</body>
</html>
