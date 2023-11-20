<?php

require 'db_config.php';

// $conn = mysqli_connect($dbhost, $dbuser, $dbpassword);

// if ($conn) {
//     echo "Connected to MySQL successfully\n";
// } else {
//     die("Connection failed: " . mysqli_connect_error());
// }

// // Insert data into the 'users' table
// $sql = "INSERT INTO users (username, email) VALUES ('johndoe', 'johndoe@example.com')";

// if (mysqli_query($conn, $sql)) {
//     echo "User 'johndoe' created successfully\n";
// } else {
//     echo "Error inserting user: " . mysqli_error($conn) . "\n";
// }

// mysqli_close($conn);

$conn = new mysqli($dbhost, $dbuser, $dbpassword);

if ($conn->connect_error) {
    die('Error connecting to MySQL: ' . $conn->connect_error);
}

// Insert data into the 'users' table
$sql = "INSERT INTO users (username, email) VALUES ('johndoe', 'johndoe@example.com')";

if ($conn->query($sql) === TRUE) {
    echo "User 'johndoe' created successfully\n";
} else {
    echo "Error inserting user: " . $conn->error . "\n";
}

$conn->close();

?>