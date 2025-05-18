<?php
session_start();
include('connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Product Details - Ciacbo</title>
  <link rel="stylesheet" href="storetheme.css">
</head>
<body>

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
      </ul>
    </div>
  </div>
</div>

<div class="container">
  <?php
  if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "SELECT * FROM products WHERE id = $id";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
      $row = $result->fetch_assoc();
  ?>
      <div class="product">
        <img src="<?= htmlspecialchars($row['images']) ?>" alt="<?= htmlspecialchars($row['name']) ?>" style="max-width:500px; width:100%;">
        <h1><?= htmlspecialchars($row['name']) ?></h1>
        <p class="price">$<?= number_format($row['price'], 2) ?></p>
        <p><?= htmlspecialchars($row['description']) ?></p>

        <form action="cart.php" method="POST">
          <input type="hidden" name="product_id" value="<?= $row['id'] ?>">
          <input type="hidden" name="product_name" value="<?= htmlspecialchars($row['name']) ?>">
          <input type="hidden" name="product_price" value="<?= $row['price'] ?>">
          <input type="hidden" name="product_image" value="<?= htmlspecialchars($row['images']) ?>">

          <label for="size">Size:</label>
          <select name="size" required>
            <option value="">Select Size</option>
            <option value="Small">Small</option>
            <option value="Medium">Medium</option>
            <option value="Large">Large</option>
          </select>

          <label for="color">Color:</label>
          <select name="color" required>
            <option value="">Select Color</option>
            <option value="Red">Red</option>
            <option value="Blue">Blue</option>
            <option value="Green">Green</option>
          </select>

          <label for="quantity">Quantity:</label>
          <input type="number" name="quantity" value="1" min="1" required>

          <button class="form-button" type="submit" name="add_to_cart">Add to Cart</button>
        </form>
      </div>
  <?php
    } else {
      echo "<p>Invitation not found.</p>";
    }
  } else {
    echo "<p>No invitation selected.</p>";
  }

  $conn->close();
  ?>
</div>

</body>
</html>
