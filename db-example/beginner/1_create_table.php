<?php

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'IHM';

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if ($conn) {
    echo "Connected to MySQL successfully\n";
} else {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "CREATE TABLE `ihm`.`tp` (`id` INT NOT NULL , `salle` INT NOT NULL , `heure` DATETIME NOT NULL , `enseignant` VARCHAR(100) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";

if (mysqli_query($conn, $sql)) {
    echo "Table 'TP' a été bien créée\n";
} else {
    echo "Error creating database: " . mysqli_error($conn) . "\n";
}

mysqli_close($conn);
?>