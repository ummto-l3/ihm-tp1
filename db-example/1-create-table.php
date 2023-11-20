<?php

require 'db_config.php';
$mysqli = new mysqli($dbhost, $dbuser, $dbpassword, $dbname);

// $stmt = $mysqli->prepare('CREATE TABLE users (
//     id INT PRIMARY KEY AUTO_INCREMENT,
//     username VARCHAR(255) NOT NULL,
//     email VARCHAR(255) UNIQUE NOT NULL
// )');

$stmt = $mysqli->prepare('CREATE TABLE users (
    username PRIMARY KEY VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL
)');

// -> means access to object propriety

if ($stmt->execute()) {
    echo "Table 'users' created successfully";
} else {
    echo "Error creating table: " . $stmt->error;
}

?>