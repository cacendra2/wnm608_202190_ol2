<?php
// Connect to your database
include("connection.php");

// Prepare a default response
header('Content-Type: application/json');

// Try the query
$sql = "SELECT * FROM products";
$result = $conn->query($sql);

// Make sure the result is good
$products = [];

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
}

// Show the data
echo json_encode($products);

// Close the connection
$conn->close();
?>
