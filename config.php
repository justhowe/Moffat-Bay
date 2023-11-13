<?php
// Database connection
$conn = new mysqli('localhost', 'Christeen.S', 'admin', 'Register.sql');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>
