<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add User - Ciacbo</title>
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

  <h1 style="text-align:center; margin-top: 40px;">Add New User</h1>

  <div class="login-form">
    <form action="add_user.php" method="post">
      <input type="text" name="name" class="form-input" placeholder="Full Name" required>
      <input type="email" name="email" class="form-input" placeholder="Email Address" required>
      <input type="text" name="username" class="form-input" placeholder="Username" required>
      <input type="password" name="password" class="form-input" placeholder="Password" required>
      <button type="submit" class="form-button">Create User</button>
    </form>
  </div>

</body>
</html>
