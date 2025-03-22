<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$file_path = __DIR__ . '/data/data.json';

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

// Process the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newUser = [
        "id" => count($users) + 1,
        "name" => $_POST['name'],
        "email" => $_POST['email']
    ];

    $users[] = $newUser;

    // Save the updated user list to the JSON file
    file_put_contents($file_path, json_encode($users, JSON_PRETTY_PRINT));

    echo "User added successfully. <a href='users.php'>Back to User List</a>";
}
?>

