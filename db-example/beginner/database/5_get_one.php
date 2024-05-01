PHP
<?php

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'IHM';

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// Prepare the SQL statement with a placeholder for the id
$sql = "SELECT * FROM `tp` WHERE `id` = ?";

// Prepare the statement
$stmt = $conn->prepare($sql);
$idd = 450;

if (!$stmt) {
  echo "Error preparing statement: " . $conn->error . "\n";
} else {

  // Bind parameter to the statement (prevents SQL injection)
  $stmt->bind_param("i", $idd);

  // Execute the prepared statement
  $stmt->execute();

  // Get the result set
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    // Record found, fetch data
    $row = $result->fetch_assoc();
    echo "Record retrieved successfully:\n";
    echo "  ID: " . $row['id'] . "\n";
    echo "  Salle: " . $row['salle'] . "\n";
    echo "  Heure: " . $row['heure'] . "\n";
    echo "  Enseignant: " . $row['enseignant'] . "\n";
  } else {
    echo "No record found with the provided ID.\n";
  }

  // Free the result set and close the statement
  $result->free();
  $stmt->close();
}

mysqli_close($conn);

?>