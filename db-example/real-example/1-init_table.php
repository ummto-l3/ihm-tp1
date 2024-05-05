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

$sql = "CREATE TABLE `PFE`.`reservation` (`id` INT NOT NULL , `melmi` DATETIME NOT NULL , `valid` INT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";

if (mysqli_query($conn, $sql)) {
    echo "Table 'Reservation' a été bien créée\n";
} else {
    echo "Error creating database: " . mysqli_error($conn) . "\n";
}

mysqli_close($conn);
?>