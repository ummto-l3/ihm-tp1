<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        input {
            display: block;
            border-radius: .5em;
            margin: .5em;
        }
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Example PHP</title>
</head>
<body>
    <h1>Formulaire inscription</h1>
    <form action="" method="get">
        <input type="text" name="nom">
        <input type="text" name="prenom">
        <button>Envoyer</button>
    </form>
    <?php
    $nom = $_GET["nom"];
    $prn = $_GET["prenom"];
    
    echo "<h1>"."Vous êtes: ".$nom." ".$prn."</h1>";
    ?>
    
</body>
</html>