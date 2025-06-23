<?php
// echo "Bienvenue dans le mini-projet de l'unité d'enseignement Programmation serveur 1 !";
require "functions.php";

$pets = getPets();
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
        <th>Espèce</th>
        <th>Sexe</th>
        <th>Age</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($pets as $pet) { ?>
        <tr>
            <td><?= htmlspecialchars($pet['name']) ?></td>
            <td><?= htmlspecialchars($pet['species']) ?></td>
            <td><?= htmlspecialchars($pet['sex']) ?></td>
            <td><?= htmlspecialchars($pet['age']) ?></td>
            <td>
                <a href="delete.php?id=<?= htmlspecialchars($pet['id']) ?>"><button>Supprimer</button></a>
                <a href="edit.php?id=<?= htmlspecialchars($pet['id']) ?>"><button>Éditer</button></a>
                <a href="view.php?id=<?= htmlspecialchars($pet['id']) ?>"><button>Visualiser</button></a>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>

</body>

</html>
