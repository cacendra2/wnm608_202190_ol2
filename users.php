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

// Validate JSON data
if ($users === null) {
    die("Error decoding JSON: " . json_last_error_msg());
}

echo "<h1>User List</h1>";

foreach ($users as $user) {
    echo "ID: {$user['id']} - Name: {$user['name']} - Email: {$user['email']} ";
    echo "<a href='user_details.php?id={$user['id']}'>[View Details]</a> ";
    echo "<a href='delete_user.php?id={$user['id']}' style='color: red;'>[Delete]</a><br>";
}

echo "<br><a href='add_user_form.php'>[Add New User]</a>";

?>

