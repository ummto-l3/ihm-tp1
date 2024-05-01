<?php

$dbhost = 'localhost';
$dbuser = 'root';
// $dbpass = 'something';  // DONT DO THAT !
$dbpass = getenv('DB_PASSWORD'); // DO THAT

$conn = mysqli_connect($dbhost, $dbuser, $dbpass);

if ($conn) {
    echo "Connected to MySQL successfully\n";
} else {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "CREATE DATABASE tp";

if (mysqli_query($conn, $sql)) {
    echo "Database 'tp' created successfully\n";
} else {
    echo "Error creating database: " . mysqli_error($conn) . "\n";
}

mysqli_close($conn);
?>