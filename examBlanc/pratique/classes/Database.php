<?php

namespace classes;
use PDO;

class Database
{
    const DATABASE_FILE = './projectManager.db';

    private $pdo;

    public function __construct()
    {
        $this->pdo = new PDO('sqlite:' . self::DATABASE_FILE);

        $sql = "CREATE TABLE IF NOT EXISTS projets (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            name TEXT NOT NULL,
            description TEXT,
            status TEXT NOT NULL,
            priority TEXT NOT NULL,
            categories TEXT
        );";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
    }

    public function getPdo()
    {
        return $this->pdo;
    }
}
