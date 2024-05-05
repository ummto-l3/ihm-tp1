<?php

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'PFE';

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if ($conn) {
    echo "Connected to MySQL successfully\n";
} else {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO `reservation` (`id`, `melmi`, `valid`) VALUES ('5687441', '2024-05-05 16:14:48.000000', '0'), ('5687442', '2024-05-29 15:14:48', '1'), ('5687445', '2024-05-19 19:15:29', '0')";

if (mysqli_query($conn, $sql)) {
    echo "Table 'Reservation' a été bien remplie\n";
} else {
    echo "Error creating database: " . mysqli_error($conn) . "\n";
}

mysqli_close($conn);
?>