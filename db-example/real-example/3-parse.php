<?php

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'PFE';

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

$sql = "SELECT * FROM `reservation`";

// Prepare the statement
$stmt = $conn->prepare($sql);

if (!$stmt) {
  echo "Error preparing statement: " . $conn->error . "\n";
} else {

  $stmt->execute();

  $result = $stmt->get_result();

  if ($result->num_rows > 0) 
  {

    // ici on commence à mettre du HTML, et comme le premier DIV ne boucle pas, on le met en dehors de la boucle
    echo "<ol>";
    while ($row = $result->fetch_assoc()) 
    {
        // ici on met ce qu'il faut afficher dans le DIV ou OL, la partie statique "string" seront des balises, la partie dynamique $row['le_nom_de_attribut_de_la_table']  
      echo "<li>Id de notre élément est " . $row['id'] . ", il a été réservé le " . $row['melmi'] . " Et cette réservation ".($row['valid'] == '0' ? 'Pas encore réservée' : 'Est réservée') . "</li>";
    }
    // Explication du Tenary Operator : Est une astuce pour écrire IF/ELSE mais dans une seule ligne ($row['valid'] == '0' ? 'Pas encore réservée' : 'Est réservée') Veut dire : (condition ? en cas true execute ceci : en case false execute cela)
    echo "</ol>";
  
} 
  else {
    echo "No records found in the table.\n";
  }

  $result->free();
  $stmt->close();
}

mysqli_close($conn);

?>