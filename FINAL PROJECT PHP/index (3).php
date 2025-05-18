<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Welcome to Ciacbo</title>
  <link rel="stylesheet" href="storetheme.css">
</head>
<body>

<div class="navbar">
  <div class="navbar-container">
    <div class="left-section">
      <div class="logo-container">
        <h2 style="color:white;">Ciacbo</h2>
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

<h1 style="text-align:center; margin: 30px 0;">Featured Invitations</h1>

<div class="grid-container">
  <?php
  $featured = [
    ["name" => "Baby Shower Invite", "image" => "babyshowerinvite.jpeg", "price" => 4],
    ["name" => "Wedding Invite", "image" => "weddinginvite.jpeg", "price" => 4],
    ["name" => "Graduation Invite", "image" => "gradinvite.jpeg", "price" => 4],
  ];

  foreach ($featured as $product) {
    echo '<div class="product">';
    echo '<img src="' . $product['image'] . '" alt="' . $product['name'] . '">';
    echo '<div class="figure"><h4>' . $product['name'] . '</h4></div>';
    echo '<div class="price">$' . $product['price'] . '</div>';
    echo '<form method="post" action="add_to_cart.php">';
    echo '<input type="hidden" name="name" value="' . $product['name'] . '">';
    echo '<input type="hidden" name="price" value="' . $product['price'] . '">';
    echo '<input type="hidden" name="image" value="' . $product['image'] . '">';
    echo '<button type="submit" class="form-button">Add to Cart</button>';
    echo '</form>';
    echo '</div>';
  }
  ?>
</div>

</body>
</html>

