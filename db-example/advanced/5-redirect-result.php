<?php

require 'db_config.php';
$conn = new mysqli($dbhost, $dbuser, $dbpassword, $dbname);

if ($conn->connect_error) {
    die('Error connecting to MySQL: ' . $conn->connect_error);
}

$sql = "SELECT * FROM users";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    header('Location: results.php');
    exit;
} else {
    echo "No users found";
}

$conn->close();
?>