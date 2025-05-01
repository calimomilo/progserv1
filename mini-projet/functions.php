<?php

require 'database.php';
function getPets() {
    global $pdo;

    $sql = 'SELECT * FROM pets';

    $pets = $pdo->query($sql);

    $pets = $pets->fetchAll();

    foreach ($pets as $pet) {
        if (!empty($pet['personalities'])) {
            $pet['personalities'] = explode(",", $pet['personalities']);
        }
    }
    return $pets;
}

function getPet($id) {
    global $pdo;

    $sql = "SELECT * FROM pets WHERE id = '$id'";

    $pet = $pdo->query($sql);

    $pet = $pet->fetch();

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
        '$name',
        '$species',
        '$nickname',
        '$sex',
        '$age',
        '$colour',
        '$personalitiesAsString',
        '$size',
        '$notes'
        )";

    $pdo->exec($sql);

    $petId = $pdo->lastInsertId();
    return $petId;
}

function updatePet($name, $age) {
    global $pets;
    if (array_key_exists($name, $pets)) {
        $pets[$name]['age'] = $age;
        return $pets[$name];
    } else {
        return false;
    }
}

function removePet($id) {
    global $pdo;

    $sql = "DELETE FROM pets WHERE id = '$id'";

    return $pdo->exec($sql);
}