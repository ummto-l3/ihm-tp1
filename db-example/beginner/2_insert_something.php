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

$sql = "INSERT INTO `tp` (`id`, `salle`, `heure`, `enseignant`) VALUES ('450', '10', '2024-05-02 08:00:00', 'aliane')";

if (mysqli_query($conn, $sql)) {
    echo "Quelques chose a été inseréée avec succès\n";
} else {
    echo "Error creating database: " . mysqli_error($conn) . "\n";
}

mysqli_close($conn);
?>