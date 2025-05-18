<?php
session_start();
include('connection.php');

// Base product list
$products = [
  ["name" => "Baby Shower Invite", "image" => "babyshowerinvite.jpeg", "price" => 4],
  ["name" => "Baptism Invite", "image" => "baptisminvite.jpeg", "price" => 4],
  ["name" => "Beach Party Invite", "image" => "beachparty.jpeg", "price" => 4],
  ["name" => "Christmas Invite", "image" => "christmasinvite.jpeg", "price" => 4],
  ["name" => "Corporate Invite", "image" => "corporateinvite.jpeg", "price" => 4],
  ["name" => "First Communion", "image" => "firstcomunioninvite.jpeg", "price" => 4],
  ["name" => "Graduation Invite", "image" => "gradinvite.jpeg", "price" => 4],
  ["name" => "Passport Invite", "image" => "passportinvite.jpeg", "price" => 4],
  ["name" => "Summer Invite", "image" => "summerinvite.jpeg", "price" => 4],
  ["name" => "Thanksgiving Invite", "image" => "thanksgivinginvite.jpeg", "price" => 4],
  ["name" => "Wedding Invite", "image" => "weddinginvite.jpeg", "price" => 4],
  ["name" => "Wild One Invite", "image" => "wildoneinvite.jpeg", "price" => 4],
];

// Filter by search keyword
if (isset($_GET['search']) && $_GET['search'] !== '') {
  $keyword = strtolower($_GET['search']);
  $products = array_filter($products, function ($product) use ($keyword) {
    return strpos(strtolower($product['name']), $keyword) !== false;
  });
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>All Invitations - Ciacbo</title>
  <link rel="stylesheet" href="storetheme.css">
</head>
<body>

  <div class="navbar">
    <div class="navbar-container">
      <div class="left-section">
        <div class="logo-container">
          <h2 style="color:white;">Ciacbo</h2>
        </div>
        <form method="get" action="productlist.php" class="form-control hotdog">
          <span>🔍</span>
          <input type="text" name="search" placeholder="Search invitations..." value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
        </form>
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

  <h1 style="text-align:center; margin: 30px 0;">Our Collection</h1>

  <div class="grid-container">
    <?php if (empty($products)): ?>
      <p style="text-align:center;">No products found for your search.</p>
    <?php else: ?>
      <?php foreach ($products as $product): ?>
        <div class="product">
          <img src="<?= $product['image'] ?>" alt="<?= $product['name'] ?>">
          <div class="figure"><h4><?= $product['name'] ?></h4></div>
          <div class="price">$<?= $product['price'] ?></div>
          <form method="post" action="add_to_cart.php">
            <input type="hidden" name="name" value="<?= $product['name'] ?>">
            <input type="hidden" name="price" value="<?= $product['price'] ?>">
            <input type="hidden" name="image" value="<?= $product['image'] ?>">
            <button type="submit" class="form-button">Add to Cart</button>
          </form>
        </div>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>

</body>
</html>

