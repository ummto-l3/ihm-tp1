PHP
<?php

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'IHM';

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// Prepare the SQL statement with a placeholder for the id
$sql = "SELECT * FROM `tp`";

// Prepare the statement
$stmt = $conn->prepare($sql);

if (!$stmt) {
  echo "Error preparing statement: " . $conn->error . "\n";
} else {

  // Execute the prepared statement
  $stmt->execute();

  // Get the result set
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    echo "Records retrieved successfully:\n";
    
    // Loop through each row in the result set
    while ($row = $result->fetch_assoc()) {
      echo "  ID: " . $row['id'] . "\n";
      echo "  Salle: " . $row['salle'] . "\n";
      echo "  Heure: " . $row['heure'] . "\n";
      echo "  Enseignant: " . $row['enseignant'] . "\n";
      echo "-------\n"; // Separator between records
    }
  } else {
    echo "No records found in the table.\n";
  }

  // Free the result set and close the statement
  $result->free();
  $stmt->close();
}

mysqli_close($conn);

?>