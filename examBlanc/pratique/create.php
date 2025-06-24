<?php

use classes\Project;
use classes\ProjectManager;

require './classes/ProjectManager.php';

$projectManager = new ProjectManager();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $status = $_POST['status'];
    $priority = $_POST['priority'];
    $categories = isset($_POST['categories']) ? $_POST['categories'] : [];

    $project = new Project($name, $description, $status, $priority, $categories);

    $errors = $project->validate();

    if (empty($errors)) {
        $projectManager->addProject($project);
        header("Location: index.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="color-scheme" content="light dark">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <title>Créer un projet | Gestionnaire de projet</title>
</head>

<body>
    <main class="container">
        <h1>Créer un nouveau projet</h1>
        <p><a href="index.php">Retour à l'accueil</a></p>
        <p>Utilisez ce formulaire pour créer un nouveau projet.</p>

        <?php if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
            <?php if (empty($errors)) { ?>
                <p style="color: green;">Le formulaire a été soumis avec succès !</p>
            <?php } else { ?>
                <p style="color: red;">Le formulaire contient des erreurs :</p>
                <ul>
                    <?php foreach ($errors as $error) { ?>
                        <li><?php echo htmlspecialchars($error); ?></li>
                    <?php } ?>
                </ul>
            <?php } ?>
        <?php } ?>

        <form action="create.php" method="POST">
            <label for="name">Nom du projet :</label>
            <input type="text" id="name" name="name" value="<?php if (isset($name)) echo htmlspecialchars($name); ?>" required minlength="2" maxlength="100">

            <label for="description">Description :</label>
            <textarea id="description" name="description" rows="4" required minlength="10" maxlength="500"><?php if (isset($description)) echo htmlspecialchars($description); ?></textarea>

            <label for="status">Statut :</label>
            <select id="status" name="status" required>
                <?php foreach (Project::VALID_STATUSES as $statusOption) { ?>
                    <option value="<?= htmlspecialchars($statusOption) ?>" <?php if (isset($status) && $status == $statusOption) echo "selected"; ?>>
                        <?= htmlspecialchars($statusOption) ?>
                    </option>
                <?php } ?>
            </select>

            <label for="priority">Priorité :</label>
            <select id="priority" name="priority" required>
                <?php foreach (Project::VALID_PRIORITIES as $priorityOption) { ?>
                    <option value="<?= htmlspecialchars($priorityOption) ?>" <?php if (isset($priority) && $priority == $priorityOption) echo "selected"; ?>>
                        <?= htmlspecialchars($priorityOption) ?>
                    </option>
                <?php } ?>
            </select>

            <fieldset>
                <legend>Catégories :</legend>
                <?php foreach (Project::VALID_CATEGORIES as $categoryOption) { ?>
                    <div>
                        <input type="checkbox" id="cat_<?= htmlspecialchars($categoryOption) ?>" name="categories[]" value="<?= htmlspecialchars($categoryOption) ?>"
                            <?php if (!empty($categories) && in_array($categoryOption, $categories)) echo "checked"; ?>>
                        <label for="cat_<?= htmlspecialchars($categoryOption) ?>"><?= htmlspecialchars($categoryOption) ?></label>
                    </div>
                <?php } ?>
            </fieldset>

            <button type="submit">Créer</button>
            <button type="reset">Réinitialiser</button>
        </form>
    </main>
</body>

</html>