<?php

use classes\ProjectManager;

require './classes/ProjectManager.php';

// On crée une instance de ProjectManager
$projectManager = new ProjectManager();

// On récupère tous les projets
$projects = $projectManager->getProjects();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="color-scheme" content="light dark">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <link rel="stylesheet" href="css/custom.css">

    <title>Page d'accueil | Gestionnaire de projets</title>
</head>

<body>
    <main class="container">

        <div class="logo">
            <img src="images/logo.svg" alt="Logo du gestionnaire de projets">
        </div>

        <h1>Page d'accueil du gestionnaire de projets</h1>

        <p>Bienvenue sur la page d'accueil du gestionnaire de projets !</p>
        <p>Utilisez cette page pour visualiser et gérer tous les projets.</p>

        <h2>Liste des projets</h2>

        <p><a href="create.php"><button>Créer un nouveau projet</button></a></p>

        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Statut</th>
                    <th>Priorité</th>
                    <th>Catégories</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($projects as $project) { ?>
                    <tr>
                        <td><?= htmlspecialchars($project['name']) ?></td>
                        <td><?= htmlspecialchars($project['description']) ?></td>
                        <td><?= htmlspecialchars($project['status']) ?></td>
                        <td><?= htmlspecialchars($project['priority']) ?></td>
                        <td>
                            <?php
                            if (!empty($project['categories'])) {
                                if (is_array($project['categories'])) {
                                    echo htmlspecialchars(implode(', ', $project['categories']));
                                } else {
                                    echo htmlspecialchars($project['categories']);
                                }
                            }
                            ?>
                        </td>
                        <td>
                            <a href="delete.php?id=<?= htmlspecialchars($project['id']) ?>"><button>Supprimer</button></a>
                            <a href="edit.php?id=<?= htmlspecialchars($project['id']) ?>"><button>Éditer</button></a>
                            <a href="view.php?id=<?= htmlspecialchars($project['id']) ?>"><button>Visualiser</button></a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </main>
</body>

</html>