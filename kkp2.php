<?php
// Replace with your database details
$conn = mysqli_connect('localhost:3306','root','','tlas1');

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get data from the form
    $keypp= $_POST["keyp"];
    $colour1 = $_POST["clpass"];

    // Update data in the database
    $sql = "UPDATE details SET colour='$colour1' WHERE rkey='$keypp'";

    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("User registered successfully.");';
        echo 'window.location="PUZZLE1.html";</script>';
        exit();
    } else {
        echo "Error updating user data: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
