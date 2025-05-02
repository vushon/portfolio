<?php

// Connect to MySQL database
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "contact_form3";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Sanitize user input
$name = mysqli_real_escape_string($conn, $_POST['name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$message = mysqli_real_escape_string($conn, $_POST['message']);

// Insert data into contacts table
$sql = "INSERT INTO contacts (name, email, message) VALUES ('$name', '$email', '$message')";
if ($conn->query($sql) === TRUE) {
    echo "Message sent successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close database connection
$conn->close();

?>
