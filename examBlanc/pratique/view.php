<?php

use classes\ProjectManager;

require './classes/ProjectManager.php';

$projectManager = new ProjectManager();

// Retrieve project by ID from URL, redirect if not found
if (isset($_GET["id"])) {
    $projectId = $_GET["id"];
    $project = $projectManager->getProject($projectId);

    if (!$project) {
        header("Location: index.php");
        exit();
    }
} else {
    header("Location: index.php");
    exit();
}
?>
<!-- HTML for displaying project details in read-only mode -->

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="color-scheme" content="light dark">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <link rel="stylesheet" href="css/custom.css">

    <title>Visualiser un projet | Gestionnaire de projets</title>
</head>

<body>
    <main class="container">
        <h1>Visualiser un projet</h1>
        <p><a href="index.php">Retour à l'accueil</a></p>
        <p>Utilisez cette page pour visualiser un projet.</p>

        <form>
            <label for="name">Nom du projet :</label>
            <input type="text" id="name" value="<?= htmlspecialchars($project["name"]) ?>" disabled />

            <label for="description">Description :</label>
            <textarea id="description" rows="4" disabled><?= htmlspecialchars($project["description"]) ?></textarea>

            <label for="status">Statut :</label>
            <input type="text" id="status" value="<?= htmlspecialchars($project["status"]) ?>" disabled />

            <label for="priority">Priorité :</label>
            <input type="text" id="priority" value="<?= htmlspecialchars($project["priority"]) ?>" disabled />

            <label for="categories">Catégories :</label>
            <input type="text" id="categories" value="<?php
                                                        if (!empty($project['categories'])) {
                                                            if (is_array($project['categories'])) {
                                                                echo htmlspecialchars(implode(', ', $project['categories']));
                                                            } else {
                                                                echo htmlspecialchars($project['categories']);
                                                            }
                                                        }
                                                        ?>" disabled />

            <a href="delete.php?id=<?= htmlspecialchars($project['id']) ?>">
                <button type="button">Supprimer</button>
            </a>
            <a href="edit.php?id=<?= htmlspecialchars($project['id']) ?>">
                <button type="button">Mettre à jour</button>
            </a>
        </form>
    </main>
</body>

</html>