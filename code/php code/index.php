<?php
// Set a cookie that expires in 1 hour
setcookie("pc", "1", time() + 3600, "/"); // "/" makes it available across the site
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Form</title>
</head>
<body>
    <h1>Register</h1>
    <form action="submit.php" method="post">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" required><br><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Submit">
    </form>

    <h2>View Users</h2>
    <p><a href="retrieve.php">See All Registered Users</a></p>
</body>
</html>
