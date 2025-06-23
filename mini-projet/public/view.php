<?php
require '../src/PetsManager.php';

$petsManager = new PetsManager();

if (isset($_GET["id"])) {
    $petId = $_GET["id"];

    $pet = $petsManager->getPet($petId);

    if (!$pet) {
        header("Location: index.php");
        exit();
    }
} else {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Visualise et modifie un animal de compagnie | Gestionnaire d'animaux de compagnie</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
        }

        h1 {
            text-align: center;
            color: #444;
        }

        p {
            text-align: center;
        }

        form {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        label {
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"],
        input[type="color"],
        textarea,
        select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="radio"],
        input[type="checkbox"] {
            margin-right: 5px;
        }

        input[type="radio"]+label,
        input[type="checkbox"]+label {
            display: inline-block;
            margin-right: 15px;
        }

        fieldset div {
            display: inline-block;
            margin-right: 10px;
        }

        fieldset {
            margin-top: 5px;
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        legend {
            font-weight: bold;
        }

        button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #5cb85c;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #4cae4c;
        }

        a {
            color: #5cb85c;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
<h1>Visualise un animal de compagnie</h1>
<p><a href="index.php">Retour à l'accueil</a></p>
<p>Utilise cette page pour visualiser un animal de compagnie.</p>

<form>
    <label for="name">Nom :</label><br>
    <input type="text" id="name" value="<?= htmlspecialchars($pet["name"]) ?>" disabled />

    <br>

    <label for="species">Espèce :</label>
    <select id="species" disabled>

        <!--
        <option value="dog" <.?= htmlspecialchars($pet["species"]) == "dog" ? "selected" : "" ?>>Chien</option>
        -->

        <?php foreach (Pet::SPECIES as $key => $value) { ?>
            <option value="<?= $key ?>" <?= $pet["species"] == $key ? "selected" : "" ?>><?= $value ?></option>
        <?php } ?>
    </select>

    <br>

    <label for="nickname">Surnom :</label><br>
    <input type="text" id="nickname" value="<?= htmlspecialchars($pet["nickname"]) ?>" disabled />

    <fieldset>
        <legend>Sexe :</legend>

        <!--
        <input type="radio" id="male" <.?= htmlspecialchars($pet["sex"]) == "male" ? "checked" : "" ?> disabled />
        <label for="male">Mâle</label><br>
        -->

        <?php foreach (Pet::SEXES as $key => $value) { ?>
            <input type="radio" id="<?= $key ?>" <?= $pet["sex"] == $key ? "checked" : "" ?> disabled />
            <label for="<?= $key ?>"><?= $value ?></label>
        <?php } ?>
    </fieldset>

    <br>

    <label for="age">Âge :</label><br>
    <input type="number" id="age" value="<?= $pet["age"] ?>" disabled />

    <br>

    <label for="color">Couleur :</label><br>
    <input type="color" id="color" value="<?= $pet["color"] ?>" disabled />

    <fieldset>
        <legend>Personnalité :</legend>

        <!--
        <div>
            <input type="checkbox" id="curious" <.?= !empty($pet["personalities"]) && in_array("curious", $pet["personalities"]) ? "checked" : "" ?> disabled />
            <label for="curious">Curieux</label>
        </div>
        -->

        <?php foreach (Pet::PERSONALITIES as $key => $value) { ?>
            <div>
                <input type="checkbox" id="<?= $key ?>" <?= !empty($pet["personalities"]) && in_array($key, $pet["personalities"]) ? "checked" : "" ?> disabled />
                <label for="<?= $key ?>"><?= $value ?></label>
            </div>
        <?php } ?>
    </fieldset>

    <br>

    <label for="size">Taille :</label><br>
    <input type="number" id="size" value="<?= $pet["size"] ?>" disabled />

    <br>

    <label for="notes">Notes :</label><br>
    <textarea id="notes" rows="4" cols="50" disabled><?= $pet["notes"] ?></textarea>

    <br>
    <br>

    <a href="delete.php?id=<?= htmlspecialchars($pet['id'])?>">
        <button type="button">Supprimer</button>
    </a><br>
    <a href="edit.php?id=<?= htmlspecialchars($pet['id'])?>">
        <button type="button">Mettre à jour</button>
    </a>
</form>
</body>

</html>