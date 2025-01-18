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

// Get the data from the form
$name = $_POST['name'];
$password = $_POST['password'];

// Hash the password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Prepare and bind the SQL statement
$stmt = $conn->prepare("INSERT INTO users (name, password) VALUES (?, ?)");
$stmt->bind_param("ss", $name, $hashed_password);

// Execute the statement
if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
