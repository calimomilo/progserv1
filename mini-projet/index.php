<?php
// echo "Bienvenue dans le mini-projet de l'unité d'enseignement Programmation serveur 1 !";
require "functions.php";
addPet("Caramel", 3);
addPet("Rex", 8);
addPet("Tweety", 1);
addPet("Godzilla", 4);

$pets = getPets();

$rex = getPet("Rex");
print_r($rex);
echo "<br>";

$rex = updatePet("Rex", 9);
print_r($rex);
echo "<br>";

$success = removePet("Tweety");
var_dump($success);
echo "<br>";

$tweety = getPet("Tweety");
var_dump($tweety);
echo "<br>";
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Page d'accueil | Gestionnaire d'animaux de compagnie</title>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 8px;
        }
    </style>
</head>

<body>
<h1>Page d'accueil du gestionnaire d'animaux de compagnie</h1>
<p>Bienvenue sur la page d'accueil du gestionnaire d'animaux de compagnie !</p>
<p>Utilise cette page pour visualiser et gérer tous les animaux de compagnie.</p>
<table>
    <thead>
    <tr>
        <th>Nom</th>
        <th>Age</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($pets as $pet) { ?>
    <tr>
        <td><?= $pet['name'] ?></td>        <!-- <\?= ?> équivalent à <\?php echo ?> -->
        <td><?= $pet['age'] ?> an(s)</td>
    </tr>
    <?php } ?>
    </tbody>
</table>

</body>

</html>
