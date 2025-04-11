<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    var_dump($_POST);
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    $message = $_POST["message"];
    $consent = $_POST["consent"];

    $errors = [];

    if (empty($firstName)) {
        array_push($errors, "Le prénom est obligatoire.");
    }

    if (strlen($firstName) < 2) {
        array_push($errors, "Le prénom doit contenir au moins 2 caractères.");
    }

    if (empty($lastName)) {
        array_push($errors, "Le nom est obligatoire.");
    }

    if (strlen($lastName) < 2) {
        array_push($errors, "Le nom doit contenir au moins 2 caractères.");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($errors, "L'adresse email n'est pas valide.");
    }

    if (empty($message)) {
        array_push($errors, "Le message est obligatoire.");
    }

    if (strlen($message) < 2 || strlen($message) > 500) {
        array_push($errors, "Le message doit contenir entre 2 et 500 caractères.");
    }

    if (empty($consent)) {
        array_push($errors, "Le consentement au traitement des données est obligatoire.");
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Formulaire de contact</title>
</head>

<body>

<h1>Formulaire de contact</h1>

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

<form action="index.php" method="post">

    <label for="firstName">Prénom :</label>
    <input type="text" id="firstName" name="firstName"
           value="<?php echo $firstName ?? ''?>" required minlength="2">

    <br>

    <label for="lastName">Nom :</label>
    <input type="text" id="lastName" name="lastName"
           value="<?php echo $lastName ?? '' ?>" required minlength="2">

    <br>

    <label for="email">Adresse e-mail :</label>
    <input type="email" id="email" name="email"
           value="<?php echo $email ?? ''?>">

    <br>
    <br>

    <label for="message">Message :</label>
    <textarea id="message" name="message" required minlength="2" maxlength="500"><?php echo $message ?? ''?></textarea>

    <br>
    <br>

    <label for="consent">
        <input type="checkbox" id="consent" name="consent"
            <?php echo isset($consent) ? "checked" : ''?> required>
        J'accepte le traitement de mes données personnelles.
    </label>

    <br>
    <br>

    <button type="submit">Envoyer</button>
    <button type="reset">Réinitialiser</button>
</form>

</body>

</html>