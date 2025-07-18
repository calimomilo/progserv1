<?php

use classes\Database;

require 'Database.php';
require 'Pet.php';

class PetsManager {
    private $database;

    public function __construct() {
        $this->database = new Database();
    }

    public function getPets() {
        // On définit la requête SQL pour récupérer tous les animaux
        $sql = "SELECT * FROM pets";

        // On prépare la requête SQL
        $stmt = $this->database->getPdo()->prepare($sql);

        // On exécute la requête SQL
        $stmt->execute();

        // On récupère tous les animaux
        $pets = $stmt->fetchAll();

        // On transforme la chaîne `personalities` en tableau pour chaque animal
        foreach ($pets as &$pet) {
            if (!empty($pet['personalities'])) {
                $pet['personalities'] = explode(',', $pet['personalities']);
            }
        }

        // On retourne tous les animaux
        return $pets;
    }

    public function getPet($id) {
        // On définit la requête SQL pour récupérer un animal
        $sql = "SELECT * FROM pets WHERE id = :id";

        // On prépare la requête SQL
        $stmt = $this->database->getPdo()->prepare($sql);

        // On lie le paramètre
        $stmt->bindValue(':id', $id);

        // On exécute la requête SQL
        $stmt->execute();

        // On récupère le résultat comme tableau associatif
        $pet = $stmt->fetch();

        // On transforme la chaîne `personalities` en tableau si elle existe
        if ($pet && !empty($pet['personalities'])) {
            $pet['personalities'] = explode(',', $pet['personalities']);
        }

        // On retourne l'animal
        return $pet;
    }

    public function addPet($pet) {
        // On transforme le tableau `$personalities` en chaîne de caractères avec `implode`
        $personalitiesAsString = implode(',', $pet->getPersonalities());

        // On définit la requête SQL pour ajouter un animal
        $sql = "INSERT INTO pets (
            name,
            species,
            nickname,
            sex,
            age,
            color,
            personalities,
            size,
            notes
        ) VALUES (
            :name,
            :species,
            :nickname,
            :sex,
            :age,
            :color,
            :personalities,
            :size,
            :notes
        )";

        // On prépare la requête SQL
        $stmt = $this->database->getPdo()->prepare($sql);

        // On lie les paramètres
        $stmt->bindValue(':name', $pet->getName());
        $stmt->bindValue(':species', $pet->getSpecies());
        $stmt->bindValue(':nickname', $pet->getNickname());
        $stmt->bindValue(':sex', $pet->getSex());
        $stmt->bindValue(':age', $pet->getAge());
        $stmt->bindValue(':color', $pet->getColor());
        $stmt->bindValue(':personalities', $personalitiesAsString);
        $stmt->bindValue(':size', $pet->getSize());
        $stmt->bindValue(':notes', $pet->getNotes());

        // On exécute la requête SQL pour ajouter un animal
        $stmt->execute();

        // On récupère l'identifiant de l'animal ajouté
        $petId = $this->database->getPdo()->lastInsertId();

        // On retourne l'identifiant de l'animal ajouté.
        return $petId;
    }

    public function updatePet($id, $pet) {
        // On transforme le tableau `$personalities` en chaîne de caractères avec `implode`
        $personalitiesAsString = implode(',', $pet->getPersonalities());

        // On définit la requête SQL pour mettre à jour un animal
        $sql = "UPDATE pets SET
            name = :name,
            species = :species,
            nickname = :nickname,
            sex = :sex,
            age = :age,
            color = :color,
            personalities = :personalities,
            size = :size,
            notes = :notes
        WHERE id = :id";

        // On prépare la requête SQL
        $stmt = $this->database->getPdo()->prepare($sql);

        // On lie les paramètres
        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':name', $pet->getName());
        $stmt->bindValue(':species', $pet->getSpecies());
        $stmt->bindValue(':nickname', $pet->getNickname());
        $stmt->bindValue(':sex', $pet->getSex());
        $stmt->bindValue(':age', $pet->getAge());
        $stmt->bindValue(':color', $pet->getColor());
        $stmt->bindValue(':personalities', $personalitiesAsString);
        $stmt->bindValue(':size', $pet->getSize());
        $stmt->bindValue(':notes', $pet->getNotes());

        // On exécute la requête SQL pour mettre à jour un animal
        return $stmt->execute();
    }

    public function removePet($id) {
        // On définit la requête SQL pour supprimer un animal
        $sql = "DELETE FROM pets WHERE id = :id";

        // On prépare la requête SQL
        $stmt = $this->database->getPdo()->prepare($sql);

        // On lie le paramètre
        $stmt->bindValue(':id', $id);

        // On exécute la requête SQL pour supprimer un animal
        return $stmt->execute();
    }
}