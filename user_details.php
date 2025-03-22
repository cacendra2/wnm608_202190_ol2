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
$user = array_filter($users, function ($user) use ($id) {
    return $user['id'] == $id;
});

// Check if the user exists
if (empty($user)) {
    die("User not found.");
}

$user = array_values($user)[0];

// Display user details
echo "<h1>User Details</h1>";
echo "ID: {$user['id']}<br>";
echo "Name: {$user['name']}<br>";
echo "Email: {$user['email']}<br>";

echo "<br><a href='users.php'>Back to User List</a>";
?>
