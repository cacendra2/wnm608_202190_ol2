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
                    <li><a href="add_user_form.php">Add User</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container">
        <?php
        include('connection.php');

        if (isset($_GET['id'])) {
            $id = intval($_GET['id']);
            $sql = "SELECT * FROM products WHERE id = $id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();

                echo '<div class="product">';
                echo '<img src="' . $row['images'] . '" alt="' . $row['name'] . '" style="max-width:500px; width:100%; border-radius:10px; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">';
                echo '<h1>' . $row['name'] . '</h1>';
                echo '<p class="price">$' . $row['price'] . '</p>';
                echo '<p>' . $row['description'] . '</p>';
                echo '<button class="form-button">Add to Cart</button>';
                echo '</div>';
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

