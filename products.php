<?php
// Database connection settings
$host = "localhost";
$user = "YOUR_USERNAME";
$password = "YOUR_PASSWORD";
$dbname = "ciacbo";

// Create the connection
$conn = new mysqli($host, $user, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query the products table
$sql = "SELECT * FROM products";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ciacbo Invitations</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            padding: 20px;
        }
        h1 {
            text-align: center;
            margin-bottom: 40px;
        }
        .grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }
        .card {
            background: white;
            border: 1px solid #ccc;
            border-radius: 10px;
            width: 260px;
            padding: 15px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        .card img {
            max-width: 100%;
            height: auto;
            border-radius: 6px;
        }
        .card h3 {
            margin: 12px 0 6px;
            font-size: 18px;
        }
        .card p {
            font-size: 14px;
            margin: 6px 0;
        }
        .price {
            font-weight: bold;
            color: #27ae60;
        }
    </style>
</head>
<body>

<h1>Our Invitation Collection</h1>

<div class="grid">
    <?php if ($result->num_rows > 0): ?>
        <?php while($row = $result->fetch_assoc()): ?>
            <div class="card">
                <img src="https://ciacbo.com/<?php echo htmlspecialchars($row['images']); ?>" alt="<?php echo htmlspecialchars($row['name']); ?>">
                <h3><?php echo htmlspecialchars($row['name']); ?></h3>
                <p class="price">$<?php echo number_format($row['price'], 2); ?></p>
                <p><?php echo htmlspecialchars($row['description']); ?></p>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p>No products found.</p>
    <?php endif; ?>
</div>

</body>
</html>

<?php
$conn->close();
?>
