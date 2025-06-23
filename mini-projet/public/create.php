<?php
require '../src/PetsManager.php';

$petsManager = new PetsManager();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["name"];
    $species = $_POST["species"];
    $nickname = $_POST["nickname"];
    $sex = $_POST["sex"];
    $age = $_POST["age"];
    $color = $_POST["color"];
    $personalities = $_POST["personalities"] ?? []; // équivalent de isset($_POST["personalities"]) ? $_POST["personalities"] : [];
    $size = $_POST["size"];
    $notes = $_POST["notes"];

    // On crée un nouvel objet 'Pet'
    $pet = new Pet(
        $name,
        $species,
        $nickname,
        $sex,
        $age,
        $color,
        $personalities,
        $size,
        $notes
    );

    // On valide les données
    $errors = $pet->validate();

    // Si le formulaire est valide, on met à jour l'animal
    if (empty($errors)) {
        // On ajoute l'animal à la base de données
        $petId = $petsManager->addPet($pet);

        // On redirige vers la page d'accueil avec tous les animaux
        header("Location: index.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Crée un nouvel animal de compagnie | Gestionnaire d'animaux de compagnie</title>

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
<h1>Crée un nouvel animal de compagnie</h1>
<p><a href="index.php">Retour à l'accueil</a></p>
<p>Utilise cette page pour créer un nouvel animal de compagnie.</p>

<?php if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
    <?php if (empty($errors)) { ?>
        <p style="color: green;">Le formulaire a été soumis avec succès !</p>
    <?php } else { ?>
        <p style="color: red;">Le formulaire contient des erreurs :</p>
        <ul>
            <?php foreach ($errors as $error) { ?>
                <li><?php echo $error; ?></li>
            <?php } ?>
        </ul>
    <?php } ?>
<?php } ?>

<form action="create.php" method="post">
    <label for="name">Nom :</label>
    <br>
    <input type="text" id="name" name="name"
           value="<?php if (isset($name)) echo htmlspecialchars($name); ?>"
           required minlength="2">

    <br>

    <label for="species">Espèce :</label>
    <br>
    <select id="species" name="species" required>
        <?php foreach (Pet::SPECIES as $key => $value) {?>
        <option value="<?= $key ?>" <?php if (isset($species) && $species=="dog") echo "selected"?>>
            <?= $value ?>
        </option>
        <?php } ?>
    </select>

    <br>

    <label for="nickname">Surnom</label>
    <br>
    <input type="text" id="nickname" name="nickname"
           value="<?php if (isset($nickname)) echo htmlspecialchars($nickname); ?>">

    <br>

    <fieldset>
        <legend>Sexe :</legend>

        <?php foreach (Pet::SEXES as $key => $value) { ?>
            <input type="radio" id="<?= $key ?>" name="sex" value="<?= $key ?>" <?php echo (isset($sex) && $sex == $key) ? 'checked' : ''; ?> required />
            <label for="<?= $key ?>"><?= $value ?></label>
        <?php } ?>
    </fieldset>

    <br>

    <label for="age">Âge :</label>
    <br>
    <input type="number" id="age" name="age"
           value="<?php if (isset($age)) echo htmlspecialchars($age); ?>"
           required min="0">

    <br>

    <label for="color">Couleur :</label>
    <br>
    <input type="color" id="color" name="color"
           value="<?php if (isset($color)) echo htmlspecialchars($color); ?>">

    <br>

    <fieldset>
        <legend>Personnalité :</legend>

        <?php foreach (Pet::PERSONALITIES as $key => $value) { ?>
            <div>
                <input type="checkbox" id="<?= $key ?>" name="personalities[]" value="<?= $key ?>" <?= (!empty($personalities) && in_array($key, $personalities)) ? 'checked' : ''; ?> />
                <label for="<?= $key ?>"><?= $value ?></label>
            </div>
        <?php } ?>
    </fieldset>

    <br>

    <label for="size">Taille :</label>
    <br>
    <input type="number" id="size" name="size"
    value="<?php if (isset($size)) echo htmlspecialchars($size);?>" min="0" step="0.1">

    <br>

    <label for="notes">Notes :</label>
    <br>
    <textarea id="notes" name="notes" rows="4" cols="50"><?php if (isset($notes)) echo htmlspecialchars($notes); ?></textarea>

    <br>
    <br>

    <button type="submit">Créer</button>
    <br>
    <button type="reset">Réinitialiser</button>
</form>
</body>

</html>
