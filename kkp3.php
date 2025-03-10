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
    $keyr = $_POST["rkey"];
    $puzPass=$_POST["puzzlepass"];
    $phrPass=$_POST["phrasepass"];
    error_log("Received data: " . print_r($_POST, true));
    // Update data in the database
    echo "$puzPass";
    $sql = "UPDATE details SET puzzle='$puzPass' WHERE rkey='$keyr'";
    $sql1="UPDATE details SET phrase='$phrPass' where rkey='$keyr'";
    if ($conn->query($sql) && $conn->query($sql1) === TRUE) {
        echo '<script>alert("User registered successfully.");';
        echo 'window.location="https://www.google.com";</script>';
        exit();
    } else {
        echo "Error updating user data: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
