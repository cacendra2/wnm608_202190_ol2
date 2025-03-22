<!DOCTYPE html>
<html>
<head>
    <title>Add New User</title>
</head>
<body>
    <h1>Add New User</h1>
    <form action="add_user.php" method="post">
        <label>Name:</label>
        <input type="text" name="name" required><br>
        <label>Email:</label>
        <input type="email" name="email" required><br>
        <button type="submit">Add User</button>
    </form>
    <br>
    <a href="users.php">Back to User List</a>
</body>
</html>

