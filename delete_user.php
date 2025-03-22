<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$file_path = $_SERVER['DOCUMENT_ROOT'] . '/data/data.json';

// Check if the JSON file exists
if (!file_exists($file_path)) {
    die("Error: The file data.json was not found in " . $file_path);
}

// Read the JSON file
$jsondata = file_get_contents($file_path);
$users = json_decode($jsondata, true);

// Check if the user ID is provided in the URL
if (!isset($_GET['id'])) {
    die("Error: No user ID provided.");
}

$id = $_GET['id'];

// Remove the user from the array
$updatedUsers = array_filter($users, function ($user) use ($id) {
    return $user['id'] != $id;
});

// Save the updated user list to the JSON file
file_put_contents($file_path, json_encode(array_values($updatedUsers), JSON_PRETTY_PRINT));

echo "User deleted successfully. <a href='users.php'>Back to User List</a>";
?>
