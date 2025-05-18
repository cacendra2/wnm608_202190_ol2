<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Contact Us - Ciacbo</title>
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
          <li><a href="about.php">About Us</a></li>
        </ul>
      </div>
    </div>
  </div>

  <h1 style="text-align:center; margin-top: 40px;">Contact Us</h1>

  <div class="login-form">
    <form method="post">
      <input type="text" name="name" class="form-input" placeholder="Your Name" required>
      <input type="email" name="email" class="form-input" placeholder="Your Email" required>
      <textarea name="message" class="form-input" rows="5" placeholder="Your Message" required></textarea>
      <button type="submit" class="form-button">Send Message</button>
    </form>
  </div>

</body>
</html>
