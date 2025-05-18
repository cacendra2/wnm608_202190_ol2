<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    echo "<h2>User created successfully:</h2>";
    echo "<p><strong>Name:</strong> $name</p>";
    echo "<p><strong>Email:</strong> $email</p>";
    echo "<p><strong>Username:</strong> $username</p>";
    echo "<p><strong>Password:</strong> $password</p>";
    echo '<p><a href="add_user_form.php">Add another user</a></p>';
    echo '<p><a href="index.php">Back to Home</a></p>';
} else {
    echo "<p>No data submitted.</p>";
}
?>
