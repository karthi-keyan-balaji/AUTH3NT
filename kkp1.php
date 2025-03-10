<?php
// Replace with your database name

// Create a connection to the database
$conn = mysqli_connect('localhost:3306', 'root', '', 'tlas1');

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    // Get values from the form
    $uname = $_POST['username'];
    $paswd = $_POST['password'];
    $rkey = $_POST['rkeypass'];

    // Sanitize inputs (to prevent SQL injection, use prepared statements instead)
    $uname = mysqli_real_escape_string($conn, $uname);
    $paswd = mysqli_real_escape_string($conn, $paswd);
    $rkey = mysqli_real_escape_string($conn, $rkey);

    // Query to check if the username, password, and rkey match
    $sql = "SELECT * FROM details WHERE uname = '$uname' AND paswd = '$paswd' AND rkey = '$rkey'";
    
    $result = $conn->query($sql);

    if ($result === false) {
        // Query execution failed
        echo "Error: " . $conn->error;
    } elseif ($result->num_rows > 0) {
        // Login successful
        echo "<script> alert('Login successful!');";
        echo 'window.location="BUTTON2.html";</script>';
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
