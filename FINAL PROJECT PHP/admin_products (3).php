<?php
session_start();
require_once 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add_product"])) {
    $stmt = $pdo->prepare("INSERT INTO products (name, description, price) VALUES (?, ?, ?)");
    $stmt->execute([$_POST["name"], $_POST["description"], $_POST["price"]]);
    header("Location: admin_products.php");
    exit;
}

if (isset($_GET["delete"])) {
    $stmt = $pdo->prepare("DELETE FROM products WHERE id = ?");
    $stmt->execute([$_GET["delete"]]);
    header("Location: admin_products.php");
    exit;
}

$stmt = $pdo->query("SELECT * FROM products ORDER BY id DESC");
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product Admin</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 10px; border: 1px solid #ccc; text-align: left; }
        input[type="text"], input[type="number"] { width: 100%; padding: 8px; margin: 5px 0; }
        button { padding: 10px 20px; margin-top: 10px; }
    </style>
</head>
<body>
    <h1>Product Administration</h1>

    <h3>Add New Product</h3>
    <form method="POST">
        <input type="hidden" name="add_product" value="1">
        <input type="text" name="name" placeholder="Product name" required><br>
        <input type="text" name="description" placeholder="Description"><br>
        <input type="number" step="0.01" name="price" placeholder="Price" required><br>
        <button type="submit">Add Product</button>
    </form>

    <h3>Product List</h3>
    <table>
        <tr>
            <th>ID</th><th>Name</th><th>Description</th><th>Price</th><th>Actions</th>
        </tr>
        <?php foreach ($products as $product): ?>
        <tr>
            <td><?= htmlspecialchars($product["id"]) ?></td>
            <td><?= htmlspecialchars($product["name"]) ?></td>
            <td><?= htmlspecialchars($product["description"]) ?></td>
            <td>$<?= number_format($product["price"], 2) ?></td>
            <td>
                <a href="?delete=<?= $product["id"] ?>" onclick="return confirm('Delete this product?')">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>

