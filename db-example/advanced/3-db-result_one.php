<?php

require 'db_config.php';
$conn = new mysqli($dbhost, $dbuser, $dbpassword, $dbname);

if ($conn->connect_error) {
    die('Error connecting to MySQL: ' . $conn->connect_error);
}

$username = $_GET['username'];

$sql = "SELECT * FROM users WHERE username = '$username'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row['id'] . " - Username: " . $row['username'] . " - Email: " . $row['email'] . "\n";
    }
} else {
    echo "No user found with username: " . $username;
}

$conn->close();
?>