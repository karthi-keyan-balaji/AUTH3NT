<?php
// Replace with your database name

// Create a connection to the database
$conn = mysqli_connect('localhost:3306', 'root', '', 'tlas1');

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    // Get values from the form
    $colour = $_POST['clpass'];
    $rkey = $_POST['keyp'];

    // Sanitize inputs (to prevent SQL injection, use prepared statements instead)
    $colour1 = mysqli_real_escape_string($conn, $colour);
    $rkey1 = mysqli_real_escape_string($conn, $rkey);

    // Query to check if the username, password, and rkey match
    $sql = "SELECT * FROM details WHERE colour='$colour1' AND rkey = '$rkey1'";
    
    $result = $conn->query($sql);

    if ($result === false) {
        // Query execution failed
        echo "Error: " . $conn->error;
    } elseif ($result->num_rows > 0) {
        // Login successful
        echo "<script> alert('Login successful!');";
        echo 'window.location="PUZZLE2.html";</script>';
    } else {
        // Login failed
        echo "Login failed. Please check your username, password, and rkey.";
    }

    // Close the result set
    $result->close();
}

// Close the database connection
$conn->close();
?>
