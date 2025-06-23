<?php

require 'database.php';
function getPets() {
    global $pdo;

    $sql = 'SELECT * FROM pets';

    // On prépare la requête SQL
    $stmt = $pdo->prepare($sql);

    // On exécute la requête SQL
    $stmt->execute();

    // On récupère tous les animaux
    $pets = $stmt->fetchAll();

    foreach ($pets as $pet) {
        if (!empty($pet['personalities'])) {
            $pet['personalities'] = explode(",", $pet['personalities']);
        }
    }
    return $pets;
}

function getPet($id) {
    global $pdo;

    $sql = "SELECT * FROM pets WHERE id = :id";

    // On prépare la requête SQL
    $stmt = $pdo->prepare($sql);

    // On lie le paramètre
    $stmt->bindValue(':id', $id);

    // On exécute la requête SQL
    $stmt->execute();

    // On récupère le résultat comme tableau associatif
    $pet = $stmt->fetch();

    if ($pet && !empty($pet['personalities'])) {
        $pet['personalities'] = explode(",", $pet['personalities']);
    }

    return $pet;
}

function addPet(
    $name,
    $species,
    $nickname,
    $sex,
    $age,
    $colour,
    $personalities,
    $size,
    $notes) {

    global $pdo;

    $personalitiesAsString = implode(",", $personalities);

    $sql = "INSERT INTO pets (
        name,
        species,
        nickname,
        sex,
        age,
        colour,
        personalities,
        size,
        notes
    ) VALUES (
        :name,
        :species,
        :nickname,
        :sex,
        :age,
        :colour,
        :personalities,
        :size,
        :notes
        )";

    // On prépare la requête SQL
    $stmt = $pdo->prepare($sql);

    // On lie les paramètres
    $stmt->bindValue(':name', $name);
    $stmt->bindValue(':species', $species);
    $stmt->bindValue(':nickname', $nickname);
    $stmt->bindValue(':sex', $sex);
    $stmt->bindValue(':age', $age);
    $stmt->bindValue(':colour', $colour);
    $stmt->bindValue(':personalities', $personalitiesAsString);
    $stmt->bindValue(':size', $size);
    $stmt->bindValue(':notes', $notes);

    $stmt->execute();

    $petId = $pdo->lastInsertId();

    return $petId;
}


function updatePet(
    $id,
    $name,
    $species,
    $nickname,
    $sex,
    $age,
    $colour,
    $personalities,
    $size,
    $notes
) {
    // On utilise le mot-clé `global` pour accéder à la variable `$pdo`.
    // Même si c'est une mauvaise pratique, c'est nécessaire ici.
    global $pdo;

    // On transforme le tableau `$personalities` en chaîne de caractères avec `implode`
    $personalitiesAsString = implode(',', $personalities);

    // On définit la requête SQL pour mettre à jour un animal
    $sql = "UPDATE pets SET
        name = :name,
        species = :species,
        nickname = :nickname,
        sex = :sex,
        age = :age,
        colour = :colour,
        personalities = :personalities,
        size = :size,
        notes = :notes
    WHERE id = :id";

    // On prépare la requête SQL
    $stmt = $pdo->prepare($sql);

    // On lie les paramètres
    $stmt->bindValue(':id', $id);
    $stmt->bindValue(':name', $name);
    $stmt->bindValue(':species', $species);
    $stmt->bindValue(':nickname', $nickname);
    $stmt->bindValue(':sex', $sex);
    $stmt->bindValue(':age', $age);
    $stmt->bindValue(':colour', $colour);
    $stmt->bindValue(':personalities', $personalitiesAsString);
    $stmt->bindValue(':size', $size);
    $stmt->bindValue(':notes', $notes);

    // On exécute la requête SQL pour mettre à jour un animal
    return $stmt->execute();
}

function removePet($id) {
    global $pdo;

    $sql = "DELETE FROM pets WHERE id = :id";

    // On prépare la requête SQL
    $stmt = $pdo->prepare($sql);

    // On lie le paramètre
    $stmt->bindValue(':id', $id);

    return $stmt->execute();
}