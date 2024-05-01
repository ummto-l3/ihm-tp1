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

// récupérer les résultats du formulaire
$idd = $_POST["id"];
$sal = $_POST["salle"];
$hr = $_POST["heure"];
$ens = $_POST["enseignant"];
    
$sql = "INSERT INTO `tp` (`id`, `salle`, `heure`, `enseignant`) VALUES (?, ?, ?, ?)";

// Prepare the statement
$stmt = $conn->prepare($sql);

if (!$stmt) 
{
  echo "Error preparing statement: " . $conn->error . "\n";
} 
else
{
// Bind parameters to the statement (prevents SQL injection)
// iiss : chaque lettre est le type de l'élément : integer, string, string, integer

$stmt->bind_param("iiss", $idd, $sal, $hr, $ens);

  // Execute the prepared statement
  if ($stmt->execute()) {
    echo "Quelques chose a été insérée \n";  // More informative success message
  } else {
    echo "OOps, erreur ....: " . $stmt->error . "\n";
  }

  // Close the statement (not strictly necessary here, but good practice)
  $stmt->close();
}