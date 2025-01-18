



<?php
// Database configuration
$servername = "<db_servername>"; //host
$username = "<username>";        // MySQL username
$password = "<password>";            // MySQL password
$dbname = "<database_name>";     // The name of your database

// Create a connection to MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from the database
$sql = "SELECT id, name FROM users";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
</head>
<body>
    <h1>User List</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["id"]. "</td><td>" . htmlspecialchars($row["name"]) . "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='2'>No users found</td></tr>";
        }
        ?>
    </table>

    <br>
    <a href="index.php">Go Back to Form</a>
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>

