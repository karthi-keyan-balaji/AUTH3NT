<?php
  // Replace with your database name

// Create a connection to the database
$conn = mysqli_connect('localhost:3306','root','','tlas1');

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else
{ 
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $keyr= $_POST["keyrandom"];

    // You can perform any additional validation or checks here

    // Insert data into the database
    $sql = "INSERT INTO details (uname, paswd,rkey) VALUES  ('$username', '$password','$keyr')";

    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("User registered successfully.");';
        echo 'window.location="BUTTON1.html";</script>';
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
}

// Handle form submission


// Close the database connection
$conn->close();
?>
