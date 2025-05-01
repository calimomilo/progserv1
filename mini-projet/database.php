<?php
const DATABASE_FILE = './petsmanager.db';

$pdo = new PDO("sqlite:" . DATABASE_FILE);

$sql = "CREATE TABLE IF NOT EXISTS pets (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT NOT NULL,
    species TEXT NOT NULL,
    nickname TEXT,
    sex TEXT NOT NULL,
    age INTEGER NOT NULL,
    colour TEXT,
    personalities TEXT,
    size FLOAT,
    notes TEXT
);";

// On exécute la requête SQL pour créer la table
$pdo->exec($sql);