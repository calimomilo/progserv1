<?php

//EXERCICE 1

/*
 * Question : Quels sont les principaux problèmes de sécurité que l'on peut rencontrer lorsque l'on utilise des formulaires HTML ?
 * Quelles sont les solutions pour les éviter ?
 *
 * Réponse : Il existe deux types de problèmes de sécurité principaux :

    Injection SQL : cela se produit lorsque des données non filtrées sont insérées directement dans une requête SQL. Cela peut permettre à un attaquant d'exécuter des commandes SQL arbitraires sur la base de données.

    Solution : utiliser des requêtes préparées pour éviter l'injection SQL.

    Cross-Site Scripting (XSS) : cela se produit lorsque des données non filtrées sont affichées sur une page web. Cela peut permettre à un attaquant d'injecter du code JavaScript malveillant dans la page, qui sera exécuté par le navigateur de l'utilisateur.

    Solution : échapper les données avant de les afficher sur la page web.
 */

//EXERCICE 2

/*
 * Question : En quoi consiste le fait d'utiliser des requêtes préparées ? Pourquoi est-ce important ?
 *
 *Réponse : Les requêtes préparées sont une technique utilisée pour éviter les injections SQL.
 * Elles permettent de séparer la logique SQL de la donnée.
 *
 * Exemple :

// Requête non préparée
$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";

$result = $pdo->query($sql);
$result = $result->fetch();

// Requête préparée
$sql = "SELECT * FROM users WHERE username = :username AND password = :password";

$stmt = $pdo->prepare($sql);

$stmt->bindValue(':username', $username);
$stmt->bindValue(':password', $password);

$stmt->execute();
$result = $stmt->fetch();
 */

//EXERCICE 3

/*
 * Question : En quoi consiste le fait d'échapper les données affichées à l'écran ? Pourquoi est-ce important ?
 *
 * Réponse : L'échappement des données affichées à l'écran consiste à transformer les caractères spéciaux en entités
 * HTML avant de les afficher sur une page web.
 * Cela permet d'éviter les attaques XSS en empêchant l'exécution de code JavaScript malveillant.
 */

// Données saisies par l'utilisateur
$userInput = "<script>alert('I can execute JavaScript code')</script>";

// Affichage non échappé
echo $userInput;

// Affichage échappé
echo htmlspecialchars($userInput);

//EXERCICE 4

/*
 * Problèmes avec l'ancien code :
 *
1. Injection SQL : la requête SQL pour ajouter un.e artiste favori.te utilise directement la variable $bandName
sans la filtrer ou la préparer. Cela permet à un attaquant d'injecter du code SQL malveillant.

2. Cross-Site Scripting (XSS) : les données affichées sur la page ne sont pas échappées, ce qui permet à un attaquant
d'injecter du code JavaScript malveillant dans la page.

3. Aucune validation des données : le code ne valide pas les données saisies par l'utilisateur, ce qui peut entraîner
des erreurs ou des comportements inattendus.

 * nouveau code :
 */

// Constante pour le fichier de base de données SQLite
const DATABASE_FILE = "./favorite-artists.db";

// Connexion à la base de données
$pdo = new PDO("sqlite:" . DATABASE_FILE);

// Création d'une table `favorite_artists`
$sql = "CREATE TABLE IF NOT EXISTS favorite_artists (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    band_name TEXT NOT NULL
)";

// On exécute la requête SQL pour créer la table
$pdo->exec($sql);

// Gère la soumission du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // On récupère les données du formulaire
    $bandName = $_POST["band-name"];

    // On prépare la requête SQL pour ajouter un.e artiste favori.te
    $sql = "INSERT INTO favorite_artists (band_name) VALUES (:bandName)";

    // On prépare la requête
    $stmt = $pdo->prepare($sql);

    // On lie les paramètres
    $stmt->bindValue(':bandName', $bandName);

    // On exécute la requête SQL pour ajouter l'artiste favori.te
    $stmt->execute();
}

// On prépare la requête SQL pour récupérer tous les artistes favori.tes
$sql = "SELECT * FROM favorite_artists";

// On exécute la requête SQL pour récupérer les artistes favori.tes
$favoriteArtists = $pdo->query($sql);

// On transforme le résultat en tableau
$favoriteArtists = $favoriteArtists->fetchAll();
?>

<!-- Gère l'affichage du formulaire -->
<!DOCTYPE html>
<html>

<head>
    <title>Mes artistes favori.tes</title>
</head>

<body>
    <h1>Mes artistes favori.tes</h1>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
        <p>L'artiste favori.te a été rajouté.</p>
    <?php } ?>

    <ul>
        <?php foreach ($favoriteArtists as $favoriteArtist) : ?>
            <li><?= htmlspecialchars($favoriteArtist["band_name"]) ?></li>
        <?php endforeach; ?>
    </ul>

    <h2>Ajouter un.e artiste favori.te</h2>

    <form action="favorite-artists.php" method="POST">
        <label for="band-name">Artiste</label><br>
        <input
            type="text"
            id="band-name"
            name="band-name" />

        <br>

        <button type="submit">Envoyer</button>
    </form>
</body>

</html>