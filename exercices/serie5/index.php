<?php

const DATABASE_FILE = './grades.db';
$pdo = new PDO("sqlite:" . DATABASE_FILE);

$sql = "CREATE TABLE IF NOT EXISTS courses (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT NOT NULL,
    acronym TEXT,
    grade FLOAT NOT NULL
);";

$pdo->exec($sql);

function addGrade($name, $grade, $acronym = null){
    global $pdo;
    $sql = "INSERT INTO courses (name, acronym, grade) VALUES ('$name', '$acronym', '$grade');";
    $pdo->exec($sql);

    $gradeId = $pdo->lastInsertId();
    return $gradeId;
}

$analyseMarId = addGrade('Analyse de marché', 4.5, 'AnalyseMar');
$comVisId = addGrade('Communication visuelle', 4.8, 'ComVis');
$ecrireWebId = addGrade('Ecrire pour le web', 4.2, 'EcrireWeb');
$baseProg2Id = addGrade('Bases de la programmation 2', 4.9, 'BaseProg2');
$evolMetMedId = addGrade('Evolution et métiers des média', 5, 'EvolMetMed');
$droit1Id = addGrade('Droit des médias 1', 4.1, 'Droit1');
$introDuraId = addGrade('Introduction à la durabilité', 4.4, 'IntroDura');
$progServ1Id = addGrade('Programmation serveur 1', 5.3, 'ProgServ1');

